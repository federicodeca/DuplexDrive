<?php


class CUser {

    //=================================
    // --- LOGIN USER MANAGEMENT ---
    //=================================

    /**
     * this method is used to check if the user is logged in, if not it will redirect to the login page
     * @return void
     */
    public static function isLogged(): bool {

        $logged= false;
        
        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance(); //control PHPSESSID , eventually start session
        }
        
        if(USession::isSetSessionElement('user')) {
            $logged = true; // User is logged in
            
        }
        if(!$logged) {
        
        header('Location: /DuplexDrive/User/login'); // Redirect to login page if not logged in
        exit();}

        return $logged;
        
    }

    /**
    * check if exist the Username inserted, and for this username check the password. If is everything correct the session is created and
    * the User is redirected in the carDetails page of the car selected for rent or for sale
    */
    public static function checkLogin(){
        $view = new VUser();
        $username = FPersistentManager::getInstance()->verifyUserUsername(UHTTPMethods::post('username'));                                            
        if($username){
            $user = FPersistentManager::getInstance()->retriveUserOnUsername(UHTTPMethods::post('username'));
            if(password_verify(UHTTPMethods::post('password'), $user->getPassword())){


                if(USession::getSessionStatus() === PHP_SESSION_NONE){
                    USession::getInstance();

                }
                USession::setElementInSession('user', $user->getId());
                USession::setElementInSession('username', $user->getUsername());
                $idAuto=USession::getElementFromSession('idAuto');
                $type=USession::getElementFromSession('type'); // Get the type of car (Rent or Sale)

                $url = "/DuplexDrive/User/selectCarFor$type/" . $idAuto;
                header('Location: ' . $url); // Redirect to the cars for rent page

            }else{
                $view->loginError();
            }

        }else{
            $view->loginError();
        }
    }



    /**
     * this method is used to show the login form, if the user is already logged in it will redirect to the home page
     */
    public static function login(){

        
        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance();
        }
        
        if(USession::isSetSessionElement('user')) { //user is logged direct to homepage
            header('Location: /DuplexDrive/User/home');
        }
        $view= new VUser();
        $view->showLoginForm();

    }
    
    /**
     * this method can logout the User, unsetting all the session element and destroing the session. Return the user to the Login Page
     */
    public static function logout(){
        USession::getInstance();
        USession::unsetAllElementsInSession();// Unset all session elements
        USession::killSession();
        setcookie('PHPSESSID','',time()-42000); //??
        header('Location: /DuplexDrive/User/Home');
    }



    //========================================
    // --- USER, ADMIN, OWNER CHECK LOGIN ---
    //========================================

    /**
     * this method is used to login the user, if so it will redirect to the actual page
     */
    public static function checkLoginAuto() {


        $view = new VUser();
        $redirect= UHTTPMethods::post('actualMethod');
        $user=UHTTPMethods::post('username');
        $password=UHTTPMethods::post('password');
        $user = FPersistentManager::getInstance()->retrivePersonOnUsername($user);

        if($user && password_verify($password, $user->getPassword())) {

            if (USession::getSessionStatus() === PHP_SESSION_NONE) {
                USession::getInstance();
            }
            
            USession::setElementInSession('username', $user->getUsername());

            if ($user->getEntity()=='EUser') {
                USession::setElementInSession('user', $user->getId());
            }
            if ($user->getEntity()=='EAdmin') {
                USession::setElementInSession('admin', $user->getId());    
            }
            if ($user->getEntity()=='EOwner') {
                USession::setElementInSession('owner', $user->getId());    
            }
  
            header("Location: " . $redirect);
            exit;

            } else {
                
                $view->loginError(); // Show error message if the login fails
                   }
            }

            /**
     * this method is used to get the user or admin or owner status, it will return an array with the  status, username and permission
     * different from th getOwnerStatus method,getAdminStatus this method is also used to get the permissions and to modifiy the home dashboard 
     */
    public static function getUserStatus(): array {

    if (session_status() === PHP_SESSION_NONE) {
        USession::getInstance();
    }

    $isAdmin = USession::isSetSessionElement('admin');
    $isUser = USession::isSetSessionElement('user');
    $isOwner = USession::isSetSessionElement('owner'); // Check if the user is an owner
    $isLogged = $isAdmin || $isUser|| $isOwner; // User is logged in if any of these session elements are set

    if ($isAdmin) {
        $username = USession::getElementFromSession('username');
        $permission = 'admin';
    } elseif ($isUser) {
        $username = USession::getElementFromSession('username');
        $permission = 'user';

    } elseif ($isOwner) {
        $username = USession::getElementFromSession('username');
        $permission = 'owner'; // Set permission for owner  

    } else {
        $username = null;
        $permission = null;
    }

    return [
        'isLogged' => $isLogged,
        'username' => $username,
        'permission' => $permission,
    ];
    }





            
    //=================================
    // --- REGISTRATION MANAGEMENT ---
    //=================================
    
    public static function showRegistrationForm() {
        $view = new VUser();
        $view->showRegistration();
    }

    /**
     * this method is used to register a new user, it will check if the email and username are already in use, if not it will create a new user
     */
    public static function registration()
    {
        $view = new VUser();
        if(FPersistentManager::getInstance()->verifyPersonEmail(UHTTPMethods::post('email')) == false && FPersistentManager::getInstance()->verifyPersonUsername(UHTTPMethods::post('username')) == false){
                $user = new EUser(UHTTPMethods::post('name'), UHTTPMethods::post('surname'), UHTTPMethods::post('email'), UHTTPMethods::post('phone'),UHTTPMethods::post('username'), UHTTPMethods::post('password'),UHTTPMethods::post('city'),UHTTPMethods::post('zip'),UHTTPMethods::post('address'));
                $check = FPersistentManager::getInstance()->uploadObj($user);
                if($check){
                    $view->showSuccessReg();
                }
        }else{
                $view->registrationError();
            }
    }

    


    /**
     * this method show an home page for the user, if the user is logged in
     * @return void
     */
    public static function home() {
    

    $infout=CUser::getUserStatus();
        
    $offers=FPersistentManager::getInstance()->getOffers(); // Retrieve offers for the home page
    $reviews=FPersistentManager::getInstance()->retrieveAllReviews(); // Retrieve all reviews for the home page
    
    $view = new VUser();
    $view->showHomePage($infout,$offers, $reviews);

    }






    //=================================
    // --- CAR FOR RENT MANAGEMENT ---
    //=================================

    /**
     * this method is used to show all the cars for sale in the home page
     */
    public static function showCarsForRent() {

        $infout=CUser::getUserStatus();

        $cars=[];
        $cars= FPersistentManager::getInstance()->retriveAllRentCars();

        $view = new VUser();
        $view->showCarsForRent($cars,$infout);
    }

    /**
     * this method is used to select a cars for rent, it will redirect to the cars details page
     */
    public static function selectCarForRent($idAuto) {

        $infout=CUser::getUserStatus();
        USession::setElementInSession('type', 'Rent'); 
        USession::setElementInSession('idAuto', $idAuto); // Store the car ID in the session
         // Get the car ID from the request, if not set, it will be null
        $indisponibility= FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idAuto)->getAllIndispDates();
        $surchar= FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idAuto)->getAllSurcharges();
        $indisp=[];
        $surcharges=[];
        $basePrice= FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idAuto)->getBasePrice();
        
        foreach($indisponibility as $ind) {
            $indisp[] = [
                'start' => $ind->getStart()->format(DateTime::ATOM),
                'end' => $ind->getEnd()->format(DateTime::ATOM)
            ];
        }
        foreach($surchar as $surcharge) {
            $surcharges[] = [
                'start' => $surcharge->getStart()->format(DateTime::ATOM),
                'end' => $surcharge->getEnd()->format(DateTime::ATOM),
                'price' => $surcharge->getPrice()
            ];
        }
        $car= FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idAuto);
        $view = new VUser();
        $view->showCarDetails($car,$indisp,$infout,$surcharges,$basePrice);
    }

    /**
     * this method is used to check if the user is logged in and has a verified license, if so it will redirect to the credit card form
     */
    public static function loginAndCreditRequirement() {

    if (CUser::isLogged()) {
        if (CUser::DocVerified(USession::getElementFromSession('user'))) { // Check if the user has a verified document

            $infout=CUser::getUserStatus();
 
            $idAuto= UHTTPMethods::post('idAuto');
            $start=UHTTPMethods::post("startDate");
            $startD=new DateTime($start);

            $end=UHTTPMethods::post("endDate");
            $endD=new DateTime($end);

            $car=FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idAuto);

            $amount=$car->getTotalPrice($startD,$endD);
            

            USession::setElementInSession('amount', $amount);
            USession::setElementInSession('startDate', $startD->format(DateTime::ATOM));
            USession::setElementInSession('endDate', $endD->format(DateTime::ATOM));
            USession::setElementInSession('idAuto', $idAuto);

            $start=$startD->format('d-m-Y');
            $end=$endD->format('d-m-Y');
            $cardList= FPersistentManager::getInstance()->getAllCreditCardsByUser(USession::getElementFromSession('user'));
            $cards=[]; // Array to store card numbers
            foreach($cardList as $card) {
                $cards[] = $card->getCardNumber();}


            $view = new VUser();
            $view->showCreditCardForm($amount,$start,$end,$infout,$cards);

        } else {

            $view = new VUser();
            $view->showLicenseRequest(); 
        }

    }else {
        $view = new VUser();
        $view->showloginForm(); 
        }
    }

    public static function showOverview() {

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
            $car=FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idAuto);

            $amount=USession::getElementFromSession('amount');
            $startD=USession::getElementFromSession('startDate');
            $endD=USession::getElementFromSession('endDate');
            $start=(new DateTime($startD))->format('l d F Y');
            $end=(new DateTime($endD))->format('l d F Y');

                // Store the credit card in the session
            FPersistentManager::getInstance()->uploadObj($card);
            USession::setElementInSession('creditCard', $card->getCardId()); // Persist the credit card
            $view = new VUser();
            $view->showOverview($start,$end,$amount,$car,$infout); //button for confirm o to go back to the form

        } else {
            header('Location: /DuplexDrive/User/Home');
        }
    }

    public static function confirmRent() {

        if (CUser::isLogged()) {

            $infout=CUser::getUserStatus();

            $startD=USession::getElementFromSession('startDate');
            $endD=USession::getElementFromSession('endDate');
            $start=new DateTime($startD);
            $end=new DateTime($endD);

            $idAuto=USession::getElementFromSession('idAuto');
           
          

            $car= FPersistentManager::getInstance()->getObjectByIdLock(ECarForRent::class, $idAuto); //get the car object by id and lock the tuples and start transaction 
             $indisp= new EUnavailability($start, $end, $car);

            if ($car->checkAvailability($start,$end)) { 
                
                FPersistentManager::getInstance()->persistInTransaction($indisp); /// Save the unavailability object in transaction and locking
               


                $now = new DateTime("now", new DateTimeZone("Europe/Rome"));
             
                $idMethod = USession::getElementFromSession('creditCard');
                $method = FPersistentManager::getInstance()->getObjectById(ECreditCard::class, $idMethod);
                $idUser = USession::getElementFromSession('user');
                $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
                $amount=USession::getElementFromSession('amount');
               

                $rent= new ERent($now,$method,$user,$indisp,$car);
                $rent->setTotalPrice($amount);
                FPersistentManager::getInstance()->persistInTransaction($rent); // Save the rent object in transaction and locking
                
                UMail::sendRentConfirm($user,$rent,$car,$amount,$startD,$endD);
                FPersistentManager::getInstance()->unlock();
                 
                $view = new VUser();
                $view->showCarRentConfirmation($rent, $indisp,$infout); // Show confirmation of the car rent
                
            }
            else {


                FPersistentManager::getInstance()->unlock(); // Unlock the table if the car is not available
                $view = new VUser();
                $view->showErrorUnavailability(); // Show error message if the car is not available
                
            }
        }
    } 
    






    //=================================
    // --- LICENSE MANAGEMENT ---
    //=================================

    public static function insertLicense(){



        $infout=CUser::getUserStatus();
        $idUser=USession::getElementFromSession('user');
       
        $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
        
        $licenseInserted=$user->getIsVerified(); // Check if the user has already inserted a license
        // Check if the user is already verified
        $view =new VUser();
        $view->showLicenseForm($infout,$licenseInserted); // Show the license form if not verified or if the user has not inserted a license yet

    }

    public static function uploadLicense() {


        $infout=CUser::getUserStatus();
        
        $expirationDate = UHTTPMethods::post('exp');
        $expiration= new DateTime($expirationDate, new DateTimeZone("Europe/Rome"));

        $photo= UHTTPMethods::files('photo');
        $blobFile=file_get_contents($photo['tmp_name']);
        $image = new EImage($photo['name'],$photo['size'], $photo['type'],$blobFile);
        FPersistentManager::getInstance()->uploadObj($image);

       
        $user = FPersistentManager::getInstance()->getObjectById(EUser::class, USession::getElementFromSession('user'));
        $user->setVerified(true); 
        FPersistentManager::getInstance()->uploadObj($user); // Save the user object
        $license= New ELicense($expiration,$image,$user); // Save the image object
        $license->setChecked(false);
        FPersistentManager::getInstance()->uploadObj($license); // Save the license object


        $view = new VUser();
        $view->showLicenseConfirm(); // Show success message after uploading the license
    }

    /**
     * this method is used to check if the document is verified, if not it will return false
     */
    public static function DocVerified(): bool {

        $idUser = USession::getElementFromSession('user');
        $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
        $license = FPersistentManager::getInstance()->getObjectByField(ELicense::class, 'user_id', $idUser);

        if ($license === null || $user === null) {
            return false;
        }

        if (!$license->checkExpiration()) {
            $user->setVerified(false);
            FPersistentManager::getInstance()->caricaObj($user);
            // Patente scaduta: eliminiamola e resettiamo lo stato dell’utente
            FPersistentManager::getInstance()->removeObject($license);
            
            return false;
        }
        if($license->getChecked() == false) {
            // License is not checked yet, so we return false
            return false;
        }

        return $user->getIsVerified();
    }





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
        
        $view = new VUser();
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
        $view = new VUser();
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
        $view = new VUser();
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
            $view = new VUser();
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
                $view = new VUser();
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


                $view = new VUser();
                $view->showCreditCardFormSale($amount,$car,$infout,$cards);

            } 

        }





    //=================================
    // --- PROFILE MANAGEMENT ---
    //=================================

    public static function showProfile() {

        $infout=CUser::getUserStatus();
        $idUser = USession::getElementFromSession('user');
        $user = FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
        $license=FPersistentManager::getInstance()->getObjectByField(ELicense::class, 'user_id', $idUser);

        $view = new VUser();
        $view->showUserProfile($user,$license,$infout);
    }


    public static function changeEmail() {

        if (CUser::isLogged()) {

            $infout=CUser::getUserStatus();
            $idUser = USession::getElementFromSession('user');
            $user = FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
            $newEmail= UHTTPMethods::post('email');

            if(FPersistentManager::getInstance()->verifyUserEmail($newEmail) == false) {
                $user->setEmail($newEmail);
                FPersistentManager::getInstance()->uploadObj($user);
                $view = new VUser();
                $view->showSuccessChangeEmail();
            } else {
                $view = new VUser();
                $view->showErrorChangeEmail();
            }
        }
        else {
            header('Location: /DuplexDrive/User/Home');
        }

    }

    public static function changePassword() {


        if( CUser::isLogged()) {
            $infout=CUser::getUserStatus();
            $idUser = USession::getElementFromSession('user');
            $user = FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
            $currentPassword= UHTTPMethods::post('current');
            $newPassword= UHTTPMethods::post('new');
            $confirmPassword= UHTTPMethods::post('confirm');

            if(password_verify($currentPassword, $user->getPassword())) {
                if($newPassword === $confirmPassword) {
                    $user->setPassword($newPassword);
                    FPersistentManager::getInstance()->uploadObj($user);
                    $view = new VUser();
                    $view->showSuccessChangePassword();
                } else {
                    $view = new VUser();
                    $view->showErrorMatchPassword();
                }
            } else {
                $view = new VUser();
                $view->showErrorChangePassword();
            }
        }else {
            header('Location: /DuplexDrive/User/Home');
        }
    }







    //=================================
    // --- REVIEW MANAGEMENT ---
    //=================================

    public static function insertReview(){

        $infout=CUser::getUserStatus();
        if(CUser::isLogged()){
        $idUser = USession::getElementFromSession('user');  
        $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
        if (FPersistentManager::getInstance()->verifyReview($user)) {
            $review = FPersistentManager::getInstance()->getObjectByField(EReview::class, 'user', $user);
            $content = $review->getContent();
            $rating = $review->getRating();
        } else {
            $content = '';
            $rating = '';
        }
        $view = new VUser();
        $view->showReviewForm($infout, $rating, $content); // Show the review form with existing content and rating if available
        } 
    }

    public static function updateReview(){

        if(CUser::isLogged()){
        $idUser = USession::getElementFromSession('user');  
        $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
        $content = UHTTPMethods::post('inputReview');
        $rating = isset($_POST['rating']) ? $_POST['rating'] : null;
        if (FPersistentManager::getInstance()->verifyReview($user)) {

            $review = FPersistentManager::getInstance()->getObjectByField(EReview::class, 'user', $user);
            $review->setContent($content);
            $review->setRating($rating);
            FPersistentManager::getInstance()->uploadObj($review); 
        } else {
            $review = new EReview($content, $rating, $user);
            FPersistentManager::getInstance()->uploadObj($review);
        }
        
        $view = new VUser();
        $view->showSuccessReview(); 
        }



    }

    public static function showPurchasedHistory() {

        if (CUser::isLogged()) {

            $infout=CUser::getUserStatus();
            $idUser = USession::getElementFromSession('user');
            $user = FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
            $purchases = FPersistentManager::getInstance()->getPurchasesByUser($user);

            $view = new VUser();
            $view->showPurchasedHistory($purchases, $infout); // Show the purchase history of the user
        } else {
            header('Location: /DuplexDrive/User/Home');
        }
    }



    //=================================
    // --- ABOUT US ---
    //=================================

    public static function showAboutUs() {
        $view = new VUser();
        $infout = CUser::getUserStatus();
        $view->showAboutUs($infout);
    }
}