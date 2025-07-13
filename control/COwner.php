<?php

class COwner {




    /**
     * this method is used to check if the owner is logged in, if not it will redirect to the user home  page
     * @return void
     */
    public static function isLogged(): bool {

        $logged= false;
        
        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance(); //control PHPSESSID , eventually start session
        }

        
        if(USession::isSetSessionElement('owner')) {
            $logged = true; // 
            
        }
        if(!$logged) {
        
        header('Location: /DuplexDrive/User/home'); // Redirect to home page if not logged in
        exit();}

        return $logged;
        
    }

    /**
     * this method is used to show the user profile, if the user is logged in
     * @return void
     */
    public static function getOwnerStatus() {

        if (session_status() === PHP_SESSION_NONE) USession::getInstance();

        $isLogged = USession::isSetSessionElement('owner'); 
        $username = $isLogged ? USession::getElementFromSession('username') : null;

        return [
            'isLogged' => $isLogged,
            'username' => $username,
            'permission' => 'owner'
        ];
    }

    

    /**
     * this method show an home page for the owner, if the owner is logged in this method will show the home page  with the sale and rent orders
     * @return void
     */
    public static function home() {

    if (COwner::isLogged()) {
    
        
        $saleOrders = [];
        $rentOrders = [];

        
        

        $infout=COwner::getOwnerStatus();

        $saleOrders = FPersistentManager::getInstance()->getSaleOrders(ESale::class);
        $rentOrders = FPersistentManager::getInstance()->getRentOrders(ERent::class);




        $rentTotalPerDay = [];
        foreach ($rentOrders as $order) {
            $date = $order->getOrderDate()->format('Y-m-d');
            if (!isset($rentTotalPerDay[$date])) {
                $rentTotalPerDay[$date] = 0;
            }
            $rentTotalPerDay[$date] += $order->getTotalPrice();
            
        }

        $saleTotalPerDay = [];  
        foreach ($saleOrders as $order) {
            $date = $order->getOrderDate()->format('Y-m-d');
            if (!isset($saleTotalPerDay[$date])) {
                $saleTotalPerDay[$date] = 0;
            }
            $saleTotalPerDay[$date] += $order->getPrice();
            
        }

        $view = new VOwner();
        $view->showOwnerHome($saleOrders, $rentOrders,$rentTotalPerDay,$saleTotalPerDay,$infout);

        }
    }


    /**
    * this method is used to show the period selector for period
     */
    public static function showRentStatsForPeriod() {
        if (COwner::isLogged()){
            $infout=COwner::getOwnerStatus();
            $view=new VOwner();
            $view->showDateSelection($infout);
        }
    }

    /**
     * this method is used to get the rent stats for a specific selected period, it will return the total price of the rents for each day in the period even for the days with zero rents

     */
    public static function getRentStatsForPeriod() {

        if (COwner::isLogged()) {
            $period = UHTTPMethods::post('period');
            $MonthYear=explode('-', $period);
            $month = (int)$MonthYear[1];
            $year = (int)$MonthYear[0];
          

            $start = new DateTime("$year-$month-01");
            $end = (clone $start)->modify('+1 month'); // add an entire month to include the last day of the month ex= 01 jan till 01 feb excluded
            $AllDay = [];
            error_log("Start: " . $start->format('Y-m-d H:i:s'));
            error_log("End: " . $end->format('Y-m-d H:i:s'));

            $period = new DatePeriod($start, new DateInterval('P1D'), $end); 
            // Create a period of one day intervals from start to end
            foreach ($period as $data) {
                $AllDay[] = $data->format('Y-m-d');
            }

            $rentsPerPeriod = FPersistentManager::getInstance()->getRentsForPeriod($start, $end);

            $rentTotalPerDay = [];
            

            foreach ($rentsPerPeriod as $order) {
                $date = $order->getUnavailability()->getStart()->format('Y-m-d');
                if (!isset($rentTotalPerDay[$date])) {
                    $rentTotalPerDay[$date] = $order->getTotalPrice();
                }
                else{$rentTotalPerDay[$date] += $order->getTotalPrice();
                }
            }
        
            foreach ($AllDay as $day) {
                if (!isset($rentTotalPerDay[$day])) {
                    $rentTotalPerDay[$day] = 0;
                }
            }
            ksort($rentTotalPerDay);

            $infout = COwner::getOwnerStatus();
            $view = new VOwner();
            $view->showSelectedPeriodStats($infout, $rentTotalPerDay);
        }
    }

    /**
     * this method is used to show the period selector for sale info
     */
    public static function showSaleStatsForPeriod() {
        if (COwner::isLogged()){
            $infout=COwner::getOwnerStatus();
            $view=new VOwner();
            $view->showDateSelectionSale($infout);
        }
    }

    /**
     * this method is used to get the number of sales for each month in a specific year
     */
    public static function getNumberOfSalePerPeriod() {
    
        if (COwner::isLogged()) {
            $year= UHTTPMethods::post('year');
            $start = new DateTime("$year-01-01");
            $end = (clone $start)->modify('+1 year');

      
     
            
            $salesPerPeriod=FPersistentManager::getInstance()->getSalesForPeriod($start, $end);
            $salesPerMonth = [];
            $salesPerName = [];

            if(!empty($salesPerPeriod)){
                foreach ($salesPerPeriod as $order) {
                    $date = $order->getOrderDate()->format('Y-m-d');
                    $month = (int)$order->getOrderDate()->format('m'); // month as 01 became 1 
                    if (!isset($salesPerMonth[$month])) {
                        $salesPerMonth[$month] = 0;
                    }
                    $salesPerMonth[$month] += 1;
                }
                
                $salesPerName['January']=$salesPerMonth[1] ?? 0;
                $salesPerName['February']=$salesPerMonth[2] ?? 0;
                $salesPerName['March']=$salesPerMonth[3] ?? 0; 
                $salesPerName['April']=$salesPerMonth[4] ?? 0;
                $salesPerName['May']=$salesPerMonth[5] ?? 0;
                $salesPerName['June']=$salesPerMonth[6] ?? 0;
                $salesPerName['July']=$salesPerMonth[7] ?? 0;
                $salesPerName['August']=$salesPerMonth[8] ?? 0;
                $salesPerName['September']=$salesPerMonth[9] ?? 0;
                $salesPerName['October']=$salesPerMonth[10] ?? 0;
                $salesPerName['November']=$salesPerMonth[11] ?? 0;
                $salesPerName['December']=$salesPerMonth[12] ?? 0;

                
            }    
            
           
            $infout = COwner::getOwnerStatus();
            $view = new VOwner();
            $view->showCountPerMonth($infout,$salesPerName);
        }
    }


    /**
     * this method is used to show the client stats, it provides the average review and the number of reviews for each rating from 1 to 5
     */
    public static function showClientStats() {
        if (COwner::isLogged()) {
            $infout = COwner::getOwnerStatus();
            $view = new VOwner();
            $clientReviews=FPersistentManager::getInstance()->retrieveAllReviews();
            $numberReviews=FPersistentManager::getInstance()->countReviews();

          
            if($numberReviews){
                $totalValue=0;
                foreach($clientReviews as $review) {
                    $totalValue +=$review->getRating();
                }
                $averageReview=round($totalValue/$numberReviews,1);

            }else{
                $averageReview=0;
                
            }
            $clientStats = [];
            $clientStats[1] = 0;
            $clientStats[2] = 0;
            $clientStats[3] = 0;  
            $clientStats[4] = 0;
            $clientStats[5] = 0;
            foreach ($clientReviews as $review) {
                $rating = $review->getRating();
                $clientStats[$rating]++;
            }




            $view->showClientStats($infout,$averageReview,$clientStats,$numberReviews);


        }
    }
    






}