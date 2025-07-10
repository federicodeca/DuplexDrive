<?php

class VSale{

    private $smarty;


      public function __construct(){

        $this->smarty = StartSmarty::configuration();

    }

    // ======================== CAR SALE ========================

    public function showCarsForSale($filteredCars, $infout, $currentPage,$totalPages,$models) {
        $this->smarty->assign('filteredCars', $filteredCars);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('currentPage', $currentPage);
        $this->smarty->assign('totalPages', $totalPages);
        $this->smarty->assign('models', $models);
        $this->smarty->display('carsForSaleList.tpl');
    }

    /**
     * login not required
     */

    public function showCarSaleDetails($car,$infout,$amount) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('amount', $amount);
        $this->smarty->assign('car', $car);
        
        $this->smarty->display('carDetailsSale.tpl');
    }

    
    public function showCarSearcher($infout, $models) {
        $this->smarty->assign('models', $models);
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->display('carSearcher.tpl');
    }

    public function showCreditCardFormSale($amount,$car, $infout,$cards) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('car', $car);
        $this->smarty->assign('amount', $amount);
        $this->smarty->assign('cards', $cards);
        $this->smarty->display('creditCardFormSale.tpl');
    }

    public function showOverviewSale( $amount,$car, $infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);
        $this->smarty->assign('car', $car);
        $this->smarty->assign('amount', $amount);
        $this->smarty->display('saleOverview.tpl');
    }
    public function showSaleConfirmation($sale, $infout) {
        $this->smarty->assign('isLogged', $infout['isLogged']);
        $this->smarty->assign('username', $infout['username']);
        $this->smarty->assign('permission', $infout['permission']);

        $this->smarty->assign('sale', $sale);
        $this->smarty->display('confirmSale.tpl');
    }

}

