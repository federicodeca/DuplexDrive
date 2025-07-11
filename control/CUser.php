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
                
                if ($type == 'Sale') {
                    $url = "/DuplexDrive/Sale/selectCarFor$type/" . $idAuto; // Redirect to the car details page for sale
                } else if ($type == 'Rent') {
                    $url = "/DuplexDrive/Rent/selectCarFor$type/" . $idAuto; // Redirect to the car details page for rent
                } else {
                    $url = "/DuplexDrive/User/home"; // Default redirect to home if type is not set
                }
               
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
    $username = null;
    $permission = null;

    if (UCookie::isSet('PHPSESSID')) {
        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance();
        }

        $isAdmin = USession::isSetSessionElement('admin');
        $isUser = USession::isSetSessionElement('user');
        $isOwner = USession::isSetSessionElement('owner');
        $isLogged = $isAdmin || $isUser || $isOwner;

        if ($isAdmin) {
            $username = USession::getElementFromSession('username');
            $permission = 'admin';
        } elseif ($isUser) {
            $username = USession::getElementFromSession('username');
            $permission = 'user';
        } elseif ($isOwner) {
            $username = USession::getElementFromSession('username');
            $permission = 'owner';
        }

        return [
            'isLogged' => $isLogged,
            'username' => $username,
            'permission' => $permission,
        ];
    } else {
        return [
            'isLogged' => false,
            'username' => $username,
            'permission' => $permission,
        ];
    }
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

    if(UCookie::isSet('PHPSESSID') && USession::isSetSessionElement('type')) { 
        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance();
        }
        $idLast= USession::getElementFromSession('idAuto'); // Get the last viewed car from the session
    
        $type= USession::getElementFromSession('type'); // Get the type of car (Rent or Sale)
        if ($type == 'Sale') {
            $lastCar= FPersistentManager::getInstance()->getObjectbyId(ECarForSale::class, $idLast); // Retrieve the car for sale  
        } else if ($type == 'Rent') {
            $lastCar= FPersistentManager::getInstance()->getObjectbyId(ECarForRent::class, $idLast); // Retrieve the car for rent  
            }
        
        
    }
    else {
        $lastCar = null; // If no last viewed car, set to null
    }
    
    $view = new VUser();
    $view->showHomePage($infout,$offers, $reviews, $lastCar);

    }






   


    //=================================
    // --- LICENSE MANAGEMENT ---
    //=================================

    public static function insertLicense(){

        if (CUser::isLogged()) {
         
            


        $infout=CUser::getUserStatus();
        $idUser=USession::getElementFromSession('user');
       
        $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
        
        $licenseInserted=$user->getIsVerified(); // Check if the user has already inserted a license
        // Check if the user is already verified
        $view =new VUser();
        $view->showLicenseForm($infout,$licenseInserted); // Show the license form if not verified or if the user has not inserted a license yet
        }
    }

    public static function uploadLicense() {

        if (CUser::isLogged()) {
 


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
    }

    /**
     * this method is used to check if the document is verified, if not it will return false
     */
    public static function DocVerified() {

        if (CUser::isLogged()){
            $idUser = USession::getElementFromSession('user');
            $user = FPersistentManager::getInstance()->getObjectById(EUser::class, $idUser);
            $license = FPersistentManager::getInstance()->getObjectByField(ELicense::class, 'user_id', $idUser);

            if ($license === null || $user === null) {
                return false;
            }

            if (!$license->checkExpiration()) {
                $user->setVerified(false);
                FPersistentManager::getInstance()->uploadObj($user);
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
    }





  


    //=================================
    // --- PROFILE MANAGEMENT ---
    //=================================

    public static function showProfile() {
        if (CUser::isLogged()) {

        $infout=CUser::getUserStatus();
        $idUser = USession::getElementFromSession('user');
        $user = FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
        $license=FPersistentManager::getInstance()->getObjectByField(ELicense::class, 'user_id', $idUser);

        $view = new VUser();
        $view->showUserProfile($user,$license,$infout);
        }
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
        if (CUser::isLogged()) {

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

    public static function ordersHistory() {

        if (CUser::isLogged()) {

            $infout=CUser::getUserStatus();
            $idUser = USession::getElementFromSession('user');
            $user = FPersistentManager::getInstance()->getObjectbyId(EUser::class, $idUser);
            $purchases = FPersistentManager::getInstance()->getOrdersByUser($user);
            $rents = FPersistentManager::getInstance()->getRentsByUser($user);

            $view = new VUser();
            $view->showOrdersHistory($purchases, $rents, $infout); // Show the purchase history of the user
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