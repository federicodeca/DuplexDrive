<?php

class CAdmin {




    /**
     * this method show an home page for the admin, if the admin is logged in
     * @return void
     */
    public static function home() {
        if (CAdmin::isLogged()) {


                $infout=CAdmin::getAdminStatus();

                $view = new VAdmin();

                $view->showHomePage($infout);

        }

    }

      /**
     * this method is used to get info about the status of admin
     * @return void
     */
    public static function getAdminStatus(): array {

        if (session_status() === PHP_SESSION_NONE) USession::getInstance();

        $isLogged = USession::isSetSessionElement('admin'); 
        $username = $isLogged ? USession::getElementFromSession('username') : null; //if is logged..

        return [
            'isLogged' => $isLogged,
            'username' => $username,
            'permission' => 'admin' // permission level for admin
        ];
}

    /**
     * this method is used to check if the admin is logged in, if not it will redirect to the login page
     * @return void
     */
    public static function isLogged(): bool {

        $logged= false;
        
        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance(); //control PHPSESSID , eventually start session
        }
        
        if(USession::isSetSessionElement('admin')) {
            $logged = true; // Admin is logged in
            
        }
        if(!$logged) {
        
        header('Location: /DuplexDrive/User/home'); // Redirect to home of user if not logged in
        exit();}

        return $logged;
        
    }

    // add cars in the database
    public static function addCar()
    {    
         if (CAdmin::isLogged()) {
        $view = new VAdmin();

        if (UHTTPMethods::post('carType') == 'rental_car') {
            $car = new ECarForRent(UHTTPMethods::post('carModel'), UHTTPMethods::post('carBrand'), UHTTPMethods::post('carColor'), UHTTPMethods::post('carHorsepower'),UHTTPMethods::post('carDisplacement'), UHTTPMethods::post('carSeats'),UHTTPMethods::post('carFuelType'),UHTTPMethods::post('carPrice'), UHTTPMethods::post('carDescription'));
            $check = FPersistentManager::getInstance()->uploadObj($car);
            
        } elseif (UHTTPMethods::post('carType') == 'car_for_sale') {
            $car = new ECarForSale(UHTTPMethods::post('carModel'), UHTTPMethods::post('carBrand'), UHTTPMethods::post('carColor'), UHTTPMethods::post('carHorsepower'),UHTTPMethods::post('carDisplacement'), UHTTPMethods::post('carSeats'),UHTTPMethods::post('carFuelType'),UHTTPMethods::post('carPrice'), 1, UHTTPMethods::post('condition'));
            $check = FPersistentManager::getInstance()->uploadObj($car);
        }

        $photos= UHTTPMethods::multipleFiles('carImages');
        foreach ($photos as $photo) {
            $blobFile=file_get_contents($photo['tmp_name']);
            $image = new EImage($photo['name'],$photo['size'], $photo['type'],$blobFile);
            $image->setCar($car); // link image to car
            FPersistentManager::getInstance()->uploadObj($image);
        }

        if ($check) {
            $view->showCarSuccess();
            } else {$view->showCarError(); }
        }    
    }

    /**
     * this method is used to show the form to add a car, if the admin is logged in
     */

    public static function showCarForm() {
         if (CAdmin::isLogged()) {
        $infout=CAdmin::getAdminStatus();
        $view = new VAdmin();
        $view->showAddCarForm($infout);
         }
    }

    //CONTROLLO PATENTE(license check)

    /**
     * this method is used to show all the unchecked license, if the admin is logged in
     */

    public static function showLicenseNotChecked () {
         if (CAdmin::isLogged()) {
        $infout=CAdmin::getAdminStatus();
        $licenseList = [];
        $licenseList= FPersistentManager::getInstance()->getNotCheckedLicense(ELicense::class);

        $view = new VAdmin();
        $view->showLicenseList($licenseList,$infout);
         }
    }

    /**
     * this method is used to check a license, if the admin is logged in,
     * the admin has to check if data expiration inserted match with data on the license photo
     */
    
    public  static function checkLicense (int $id) {
         if (CAdmin::isLogged()) {
        $license = FPersistentManager::getInstance()->retriveLicense($id);
        $license->setChecked(true);
        $user = $license->getUserId();
        if ($user) {
            $user->setVerified(true);
        }
        $entityManager = FEntityManager::getEntityManager();
        $entityManager->flush();

        $view = new VAdmin();
        $view->showCheckSuccess();
        }
    }


    //INSERIMENTO PRENOTAZIONE (insert unavailability)

    /**
     * this method is used to show all the cars for rent in the database
     * @return void
     */
    public static function showAllRentCarsForUnavailabilities(){
         if (CAdmin::isLogged()) {
        $cars= FPersistentManager::getInstance()->retriveAllRentCars();
        $infout=CAdmin::getAdminStatus();    
        $view = new VAdmin();
        $view->showAllRentCars($cars, $infout);
        }
    }

    /**
     * this method is used to show the unavailability of a car for rent, if the admin is logged in
     * also show all the cars for rent in the database
     */

    public static function showUnavailabilities() {
        if (CAdmin::isLogged()) {


            $carId = UHTTPMethods::postOrNull('idAuto');
            if ($carId === null) {
                $carId=USession::getElementFromSession('idAuto'); // Retrieve carId from session if not provided
            }
            else {
                USession::setElementInSession('idAuto', $carId); // Clear session if carId is provided
            }
            $cars= FPersistentManager::getInstance()->retriveAllRentCars();
            $selectedCar = FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $carId);
            $infout=CAdmin::getAdminStatus();  
            $unav=FPersistentManager::getAllValidUnavailabilities($carId);
            $view = new VAdmin();
            $view->showUnavailabilities($cars,$infout,$unav, $selectedCar);
        }
    }
    
    /**
     * this method is used to insert an unavailability for a car for rent, if the admin is logged in
     * it checks if the car is available in the selected date range
     */
    public static function insertUnavailability() {
        if (CAdmin::isLogged()) {
            $view = new VAdmin();
            $carId = USession::getElementFromSession('idAuto'); // Retrieve carId from session
            $start = new DateTime(UHTTPMethods::post('start'));
            $end = new DateTime(UHTTPMethods::post('end'));
            $car= FPersistentManager::getInstance()->getObjectByIdLock(ECarForRent::class, $carId); 
            FPersistentManager::getInstance()->lockAllIndispForCar($carId); // Lock all unavailability records for the car
            $indisp= new EUnavailability($start, $end, $car);
            if($car->checkAvailability($start, $end)) {
                
                FPersistentManager::getInstance()->uploadObjAndUnlock($indisp);
              
                $view->showSuccessInsert();
                

                
            }
            else{             

                FPersistentManager::getInstance()::unlock();
            
             $view->showOverlappingError();
            }
        }
    }



    public static function deleteUnavailability($id) {
        
        if (CAdmin::isLogged()) {
            $view = new VAdmin();
            $unavailability = FPersistentManager::getInstance()->getObjectById(EUnavailability::class ,$id);
            
            if(FPersistentManager::getInstance()->retrieveObjectByField(ERent::class,'Unavailability', $id) ) {
                $view->showRentError();

                
            }else{
            FPersistentManager::getInstance()->removeObject($unavailability);
            header('location: /DuplexDrive/Admin/showUnavailabilities');
            exit();
            }
        }
    }   
    

    
    public static function showAllRentCarsForSurcharges() {
        if (CAdmin::isLogged()) {
            $cars= FPersistentManager::getInstance()->retriveAllRentCars();
            $infout=CAdmin::getAdminStatus();    
            $view = new VAdmin();
            $view->showAllRentCarsForSurcharges($cars, $infout);
        }
    }

    public static function showSurcharges() {
    if (CAdmin::isLogged()) {
        $carId = UHTTPMethods::postOrNull('idAuto');
        if ($carId === null) {
            $carId=USession::getElementFromSession('idAuto'); // Retrieve carId from session if not provided
        }
        else {
            USession::setElementInSession('idAuto', $carId); // Clear session if carId is provided
        }
        $cars= FPersistentManager::getInstance()->retriveAllRentCars();
        $selectedCar = FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $carId);
        $infout=CAdmin::getAdminStatus();  
        $sur=FPersistentManager::getAllValidSurcharges($carId);
        $view = new VAdmin();
        $view->showSurcharges($cars,$infout,$sur, $selectedCar);
    }
}

    public static function deleteSurcharge($id) {
    if (CAdmin::isLogged()) {
        $view = new VAdmin();
        $surcharge = FPersistentManager::getInstance()->getObjectById(ESurcharge::class, $id);
        
        
        FPersistentManager::getInstance()->removeObject($surcharge);
        header('location: /DuplexDrive/Admin/showSurcharges');
        exit();
        }
    }
 





    public static function insertSurcharge() {
        if (CAdmin::isLogged()) {
            $view = new VAdmin();
            $carId = UHTTPMethods::post('idAuto');
            $start = new DateTime(UHTTPMethods::post('start'));
            $end = new DateTime(UHTTPMethods::post('end'));
            $car = FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $carId); // Lock the car object
            if($car->checkExistingSurcharges($start, $end)) {
                $surcharge= new ESurcharge($start, $end, UHTTPMethods::post('price'), $car);
                FPersistentManager::getInstance()->uploadObj($surcharge); //TRANSACTION
                $view->showSurchargeInsert();
        

            }
            else {
                $view->showOverlappingError();
            }
        }

    }


    public static function showAllCars($type){
        if (CAdmin::isLogged()) {

            USession::setElementInSession('type', $type); // Store type in session for later use
            if ($type=='Rent'){
                $cars = FPersistentManager::getInstance()->retriveAllRentCars();
            } else if ($type=='Sale') {
                $cars = FPersistentManager::getInstance()->retriveAllAvailableSaleCars();
            }
            $infout=CAdmin::getAdminStatus();    
            $view = new VAdmin();
            $view->showCars($cars, $infout);
        }
    }

  public static function showFormModify(){
    if (CAdmin::isLogged()) {


        $type = USession::getElementFromSession('type'); // Retrieve type from session
        $carId = UHTTPMethods::post('idAuto');
        USession::setElementInSession('idAuto', $carId); // Store selected car in session for later use




        if ($type == 'Rent') {
            $cars = FPersistentManager::getInstance()->retriveAllRentCars();
            $selectedCar = FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $carId);
        } else if ($type == 'Sale') {
            $cars = FPersistentManager::getInstance()->retriveAllAvailableSaleCars();
            $selectedCar = FPersistentManager::getInstance()->getObjectbyId(ECarForSale::class, $carId);
        }

        if ($selectedCar === null) {
            error_log("showFormModify: selectedCar is NULL for carId: $carId");
        }

        $infout = CAdmin::getAdminStatus();

        USession::setElementInSession('idAuto', $carId); // Store selected car in session for later use
        $view = new VAdmin();
        $view->showModifyCarForm($selectedCar, $cars, $infout);
        }
    }

    public static function modifyCar() {
        if (CAdmin::isLogged()) {
            $view = new VAdmin();
            $carId = USession::getElementFromSession('idAuto'); // Retrieve carId from session
            $car = FPersistentManager::getInstance()->getObjectByIdLock(EAuto::class, $carId); // Lock the car object 

            if ($car->getEntity()=='ECarForRent') {
                $car->setModel(UHTTPMethods::post('model'));
                $car->setBrand(UHTTPMethods::post('brand'));
                $car->setColor(UHTTPMethods::post('color'));
                $car->setHorsepower(UHTTPMethods::post('horsepower'));
                $car->setDisplacement(UHTTPMethods::post('displacement'));
                $car->setSeats(UHTTPMethods::post('seats'));
                $car->setFuelType(UHTTPMethods::post('fuelType'));
                $car->setBasePrice(UHTTPMethods::post('price'));
                $car->setDescription(UHTTPMethods::post('description'));

            } elseif ($car->getEntity()== 'ECarForSale') {
                $car->setModel(UHTTPMethods::post('model'));
                $car->setBrand(UHTTPMethods::post('brand'));
                $car->setColor(UHTTPMethods::post('color'));
                $car->setHorsepower(UHTTPMethods::post('horsepower'));
                $car->setDisplacement(UHTTPMethods::post('displacement'));
                $car->setSeats(UHTTPMethods::post('seats'));
                $car->setFuelType(UHTTPMethods::post('fuelType'));
                $car->setPrice(UHTTPMethods::post('price'));
                $car->setKm0ornew(UHTTPMethods::post('condition')); // Assuming 'condition' is the field for Km0 or New
            }

            FPersistentManager::getInstance()->uploadObjAndUnlock($car); // Save changes and unlock the object
            header("Location: /DuplexDrive/Admin/showAllCars/" . USession::getElementFromSession('type')); // Redirect to the car list page
            exit();
        }
    }


    public static function refuseLicense($id) {
        if (CAdmin::isLogged()) {
            $view = new VAdmin();
            $license = FPersistentManager::getInstance()->getObjectById(ELicense::class, $id);
            $user = $license->getUserId();
            if ($user) {
                $user->setVerified(false);
            }

            FPersistentManager::getInstance()->beginTransaction();
            FPersistentManager::getInstance()->persistInTransaction($user); // Save changes to user
            FPersistentManager::getInstance()->removeInTransaction($license);
            FPersistentManager::getInstance()->unlock();

            header('Location: /DuplexDrive/Admin/showLicenseNotChecked');
            exit();
        }
    }

}