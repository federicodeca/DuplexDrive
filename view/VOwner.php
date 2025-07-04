<?php

class VOwner{

    private $smarty;


    public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    public function showOwnerHome($saleOrders, $rentOrders,$rentTotalPerDay,$saleTotalPerDay,$infout) {
        $this->smarty->assign('saleOrders', $saleOrders);
        $this->smarty->assign('rentOrders', $rentOrders);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('rentPerDay', $rentTotalPerDay);
        $this->smarty->assign('salePerDay', $saleTotalPerDay);
        $this->smarty->display('homeOwner.tpl');
    }

    public function showDateSelection($infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('infoRentOwner.tpl');

       
       
    }

       public function showSelectedPeriodStats($infout,$rentTotalPerDay) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('rentTotalPerDay', $rentTotalPerDay);
        
        $this->smarty->display('infoRentOwner.tpl');

       
       
    }


    public function showDateSelectionSale($infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('infoSaleOwner.tpl');

       
       
    }

    public function showCountPerMonth($infout,$salesPerMonth) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('salesPerMonth', $salesPerMonth);
        $this->smarty->display('infoSaleOwner.tpl');
    }


    public function showClientStats($infout,$averageReview,$clientStats,$numberReviews){
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('averageReview', $averageReview);
        $this->smarty->assign('clientStats', $clientStats);  
        $this->smarty->assign('numberReviews', $numberReviews);
        $this->smarty->display('infoClientOwner.tpl');
 
    
    }


}