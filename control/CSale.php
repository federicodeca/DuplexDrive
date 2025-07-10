<?php

class CSale {
       //=================================
    // --- CAR FOR SALE MANAGEMENT ---
    //=================================

    /**     * this method is used to show the car searcher page, where the user can search for cars for sale
     * @return void
     */
     public static function carSearcher(){
        $brandList= FPersistentManager::getInstance()->getAllBrands();
       

        $models=[];
        foreach ($brandList as $brand) {
                $models[$brand]= FPersistentManager::getInstance()->getAllModels($brand);
        }
        
        $view = new VSale();
        $infout = CUser::getUserStatus();
        $view->showCarSearcher($infout,$models);
    }

    /**
     * this method is used to show the list of cars for sale
     * @param int $currentPage
     */
    public static function showCarsForSale($currentPage) {

        $brandList= FPersistentManager::getInstance()->getAllBrands();
       

        $models=[];
        foreach ($brandList as $brand) {
                $models[$brand]= FPersistentManager::getInstance()->getAllModels($brand);
        }

        $carsPerPage = 6;

        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance();
        }
        
        $price = UHTTPMethods::postOrNull('price') ?? null;
        $brand = UHTTPMethods::postOrNull('brand') ?? null;
        $model = UHTTPMethods::postOrNull('model') ?? null;

        if (isset($brand)) {
            USession::setElementInSession('brand', $brand);
        }else{
            $brand = USession::getElementFromSession('brand');}
            
        if (isset($model)) {
            USession::setElementInSession('model', $model);
        }else{
            $model = USession::getElementFromSession('model');}
        if (isset($price)) {
            USession::setElementInSession('price', $price);
        }else{
            $price = USession::getElementFromSession('price');}

        $offset = ($currentPage - 1) * $carsPerPage;
          

        
        $filteredCars = FPersistentManager::getInstance()->searchCarsForSale($brand, $model, $price, $offset, $carsPerPage);
        
        $filteredCarsNumber = FPersistentManager::getInstance()->countSearchedCars($brand, $model,$price);
        $totalPages = intval(ceil($filteredCarsNumber / $carsPerPage));

        $infout = CUser::getUserStatus();
        $view = new VSale();
        $view->showCarsForSale($filteredCars, $infout, $currentPage, $totalPages, $models);
    }



    /**
     * this method is used to select a cars for sale, it will redirect to the car detail page
     * @param int $carId
     */
    public static function selectCarForSale($idAuto) {

        $infout=CUser::getUserStatus();

        USession::setElementInSession('type', 'Sale'); 
        USession::setElementInSession('idAuto', $idAuto); // Store the car ID in the session
         // Get the car ID from the request, if not set, it will be null
        
    
        $car= FPersistentManager::getInstance()->getObjectbyId(ECarForSale::class, $idAuto);
        $amount=$car->getPrice();
        $view = new VSale();
        $view->showCarSaleDetails($car,$infout,$amount);
    } 

    public static function showOverviewSale() {

        if (CUser::isLogged()) {

            $infout=CUser::getUserStatus();
            
            $idUser = USession::getElementFromSession('user');
            $user=FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
            
            
            $cardNumber= UHTTPMethods::post('cardNumber');

            $existingMethod=FPersistentManager::getInstance()->verifyCardNumber($cardNumber);
            if (!$existingMethod) {
                $cardName= UHTTPMethods::post('cardName');
                $cardExpiry= UHTTPMethods::post('cardExpiry');
                $cardCVV= UHTTPMethods::post('cardCVV');
                $cardDate=explode("/",$cardExpiry);
                $cardMonth=$cardDate[0];
                $cardYear="20".$cardDate[1];
                $cardExp= new DateTime("$cardYear-$cardMonth-01");  
                $card= new ECreditCard( $cardNumber, $cardExp, $cardCVV, $user);

            }
            else {
                $card=FPersistentManager::getInstance()->retrieveObjectByfield(ECreditCard::class,'cardNumber',$cardNumber);
            }
            $idAuto=USession::getElementFromSession('idAuto');
            $car=FPersistentManager::getInstance()->getObjectbyId(ECarForSale::class, $idAuto);

            $amount=USession::getElementFromSession('amount');


                // Store the credit card in the session
            FPersistentManager::getInstance()->uploadObj($card);
            USession::setElementInSession('creditCard', $card->getCardId()); // Persist the credit card
            $view = new VSale();
            $view->showOverviewSale($amount,$car,$infout); //button for confirm o to go back to the form

        } else {
            header('Location: /DuplexDrive/User/Home');
        }
    }

    public static function confirmSale() {

        if (CUser::isLogged()) {

            $infout=CUser::getUserStatus();



            $idAuto=USession::getElementFromSession('idAuto');
            $car= FPersistentManager::getInstance()->getObjectByIdlock(ECarForSale::class, $idAuto);
            

            if ($car->isAvailable()) { //metodo clu
                
                $car->setAvailable(false); // Set the car as not available
                FPersistentManager::getInstance()->persistInTransaction($car); // persist+flush the car object to the database       
               


                $now = new DateTime("now", new DateTimeZone("Europe/Rome"));
                $idMethod = USession::getElementFromSession('creditCard');
                $method = FPersistentManager::getInstance()->getObjectById(ECreditCard::class, $idMethod);
                $idUser = USession::getElementFromSession('user');
                $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
                $amount=USession::getElementFromSession('amount');
                $idUser= USession::getElementFromSession('user');

                $sale= new ESale($now,$method,$user,$car,$amount);
                FPersistentManager::getInstance()->persistInTransaction($sale); //  persist+flush the car object to the database       
                 
                FPersistentManager::getInstance()->unlock(); // commit ends the transaction and unlocks the table
                UMail::sendSaleConfirm($user,$sale,$car,$amount);
                $view = new VSale();
                $view->showSaleConfirmation($sale,$infout); // Show confirmation of the car rent
            }
            else {
                FPersistentManager::getInstance()->unlock(); // UNLOCK the table if the car is not available
                $view = new VUser();
                $view->showErrorUnavailability(); // Show error message if the car is not available
                
            }
        }

    }

    public static function loginAndCreditRequirementSale() {

        if (CUser::isLogged()) {

             // Check if the user has a verified document

                $infout=CUser::getUserStatus();
 
                $idAuto= USession::getElementFromSession('idAuto');
           
                $car=FPersistentManager::getInstance()->getObjectbyId(ECarForSale::class, $idAuto);

                $amount=$car->getPrice();
                

                USession::setElementInSession('amount', $amount);

                USession::setElementInSession('idAuto', $idAuto);

 
                $cardList= FPersistentManager::getInstance()->getAllCreditCardsByUser(USession::getElementFromSession('user'));
                $cards=[]; // Array to store card numbers
                foreach($cardList as $card) {
                    $cards[] = $card->getCardNumber();}


                $view = new VSale();
                $view->showCreditCardFormSale($amount,$car,$infout,$cards);

            } 

        }

}