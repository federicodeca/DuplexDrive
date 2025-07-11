<?php

class VUser{

    private $smarty;


      public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    public function loginError() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' ,'credenziali sbagliate');
        $this->smarty->display('error.tpl');
    }



    public function showCars($cars,$infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->assign('cars', $cars);
        $this->smarty->display('carList.tpl');
    }



    /**
     * login not required
     */
    public function showHomePage($infout,$offers,$reviews,$lastCar) {
    $this->smarty->assign('offers', $offers); 
    $this->smarty->assign('reviews',$reviews );
    $this->smarty->assign('lastCar', $lastCar);
    $this->smarty->assign('isLogged', $infout['isLogged']);  
    $this->smarty->assign('username', $infout['username']);
    $this->smarty->assign('permission', $infout['permission']);
    $this->smarty->display('home.tpl');


    }


   

    
    public function showloginError() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "Errore nel login.");
        $this->smarty->display('error.tpl');
    
    }

    public function showRegistrationForm() {
        $this->smarty->display('registrationForm.tpl');
    }

    public function showError($message) {
        $this->smarty->assign('error', $message);
        $this->smarty->display('error.tpl');
    }



    public function showDocNotVerified() {
        $this->smarty->assign('error', 'Document not verified. Please verify your documents to proceed.');
        $this->smarty->display('error.tpl');
    }



 

    public function showErrorUnavailability(){
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "L'auto non è disponibile.");
        $this->smarty->display('error.tpl');
    
    }

    public function showRegistration() {
        $this->smarty->display('registrationForm.tpl');
    }

    public function showSuccessReg() {
        $this->smarty->assign('title', 'Ottimo!');
        $this->smarty->assign('para' , "Il tuo account è pronto per l'uso");
        $this->smarty->display('success.tpl');
    }
    

    public function registrationError() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "Sei già registrato.");
        $this->smarty->display('error.tpl');
    
    }

    public function showLicenseForm($infout,$licenseInserted){

        $this->smarty->assign('licenseInserted', $licenseInserted);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('licenseForm.tpl');
    }

    public function showLicenseConfirm(){
        $this->smarty->assign('title', 'Ottimo!');
        $this->smarty->assign('para' , "La tua patente è stata inserita correttamente");
        $this->smarty->display('success.tpl');

    }

    public function showLoginForm() {
        $this->smarty->display('loginForm.tpl');
    }

    public function showSuccessChangeEmail() {
        $this->smarty->assign('title', 'Ottimo!');
        $this->smarty->assign('para' , "La tua email è stata cambiata correttamente");
        $this->smarty->display('success.tpl');
    }

    public function showSuccessChangePassword() {
        $this->smarty->assign('title', 'Ottimo!');
        $this->smarty->assign('para' , "La tua password è stata cambiata correttamente");
        $this->smarty->display('success.tpl');
    }
    public function showErrorChangePassword() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "Password errata.");
        $this->smarty->display('error.tpl');
    }
    public function showErrorChangeEmail() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "Errore nel cambio dell'email.");
        $this->smarty->display('error.tpl');
    }

    public function showErrorMatchPassword() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "Le password non corrispondono.");
        $this->smarty->display('error.tpl');
    }

    public function showLicenseRequest() {
        $this->smarty->assign('title', 'Attenzione!');
        $this->smarty->assign('para' , "Per procedere con l'acquisto occorre prima inserire una patente.Se hai gia inserito una patente, attendi la verifica da parte di un amministratore.");
        $this->smarty->display('error.tpl');
    }

    public function showUserProfile($user,$license,$infout) {
        $this->smarty->assign('user', $user);
        $this->smarty->assign('license', $license);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('userProfile.tpl');
    }




    //RECENSIONI
    public function showReviewForm($infout, $rating, $content){
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('content', $content);
        $this->smarty->assign('rating', $rating);
        $this->smarty->display('reviewForm.tpl');
    }

    public function showSuccessReview() {
        $this->smarty->assign("title", "Recensione Inviata!");
        $this->smarty->assign("para", "Grazie per aver condiviso la tua esperienza con noi.");
        $this->smarty->display('success.tpl');
    }

    // ABOUT US
    public function showAboutUs($infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('aboutUs.tpl');
    }

    public function showOrdersHistory($orders, $rents,  $infout) {
        $this->smarty->assign('orders', $orders);
        $this->smarty->assign('rents', $rents);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('ordersHistory.tpl');
    }
}