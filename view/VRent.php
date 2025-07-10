<?php

class VRent{

    private $smarty;


      public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

            /**
     * login not required
     */
    public function showCarsForRent($cars,$infout) {
        $this->smarty->assign('cars', $cars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('carsForRentlist.tpl');
       
    }


     public function showCreditCardForm($amount,$start,$end,$infout,$cards) {
        $this->smarty->assign('amount',$amount);
        $this->smarty->assign('start',$start);
        $this->smarty->assign('end',$end);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('cards', $cards);
    
        $this->smarty->display('creditCardForm.tpl');
    }

    public function showOverview($start,$end,$amount,$car,$infout) {
        $this->smarty->assign('car', $car);
        $this->smarty->assign('start', $start);
        $this->smarty->assign('end', $end);
        $this->smarty->assign('amount', $amount);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->display('overview.tpl');
        
    }

        public function showCarRentConfirmation($rent, $indisp, $infout) {
        $this->smarty->assign('rent', $rent);
        $this->smarty->assign('indisp', $indisp);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
      
        $this->smarty->display('confirmRent.tpl');
    }






        public function showCarDetails($car,$indisp,$infout,$surcharges,$basePrice) {
        $this->smarty->assign('indisp', $indisp);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('car', $car);
        $this->smarty->assign('surcharges', $surcharges);
        $this->smarty->assign('basePrice', $basePrice);
        $this->smarty->display('CarDetails.tpl');
    }


}