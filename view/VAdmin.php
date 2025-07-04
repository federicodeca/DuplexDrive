<?php

class VAdmin{

    private $smarty;


    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    public function showHomePage($infout) { 
        
        $this->smarty->assign('isLogged', $infout['isLogged']);  
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('homeAdmin.tpl');

    }

    public function showAddCarForm($infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('addCarForm.tpl');
    }

    public function showCarSuccess(){
        $this->smarty->assign('title', 'Ottimo!');
        $this->smarty->assign('para' , "L'auto è stata inserita correttamente.");
        $this->smarty->display('success.tpl');
    }

    public function showCarError(){
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "L'auto non è stata inserita correttamente.");
        $this->smarty->display('error.tpl');
    }

    public function showLicenseList($licenses,$infout) {
        $this->smarty->assign('licenses', $licenses);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']); 
        $this->smarty->assign('permission', $infout['permission']); 
        $this->smarty->display('licenseList.tpl');
    }

    public function showCheckSuccess() {
        $this->smarty->assign('title', 'Ottimo!');
        $this->smarty->assign('para' , "La patente è stata controllata correttamente.");
        $this->smarty->display('success.tpl');
    }

    public function showAllRentCars($cars, $infout) {
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->display('adminRentCars.tpl');
    }

    public function showUnavailabilities($cars,$infout,$unavailabilities, $selectedCar) {
        $this->smarty->assign('unavailabilities', $unavailabilities);
        $this->smarty->assign('selectedCar', $selectedCar);
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        
        $this->smarty->display('adminRentCars.tpl');
    }

    public function showOverlappingError() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "Esiste gia un'altra prenotazione che si sovrappone a quella che stai cercando di inserire.");
        $this->smarty->display('error.tpl');
    }

    public function showSuccessInsert() {
        $this->smarty->assign('title', 'Successo!');
        $this->smarty->assign('para' , "La prenotazione è stata inserita correttamente.");
        $this->smarty->display('success.tpl');
    }

     public function showSurchargeInsert() {
        $this->smarty->assign('title', 'Successo!');
        $this->smarty->assign('para' , "La fascia di prezzo è stata inserita correttamente.");
        $this->smarty->display('success.tpl');
    }

    public function showAllRentCarsForSurcharges($cars, $infout) {
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->display('adminPriceRent.tpl');
    }

    public function showSurcharges($cars,$infout,$surcharges, $selectedCar) {
        $this->smarty->assign('surcharges', $surcharges);
        $this->smarty->assign('selectedCar', $selectedCar);
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        
        $this->smarty->display('adminPriceRent.tpl');
    }

    public function showRentError() {
        $this->smarty->assign('title', 'Ops!');
        $this->smarty->assign('para' , "L'auto è associata ad una prenotazione, non puoi eliminare l'ordine.");
        $this->smarty->display('error.tpl');
    }

    public function showCars($cars, $infout){
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->display('modifyCar.tpl');
    }

    public function showModifyCarForm($selectedCar,$cars, $infout) {
        $this->smarty->assign('selectedCar', $selectedCar);
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->display('modifyCar.tpl');
    }
}