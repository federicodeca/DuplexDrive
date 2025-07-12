  
 <?php

  class CRent {
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

        $view = new VRent();
        $view->showCarsForRent($cars,$infout);
    }

    /**
     * this method is used to select a cars for rent, it will redirect to the cars details page
     */
    public static function selectCarForRent($idAuto) {

        if (session_status() === PHP_SESSION_NONE) {
            USession::getInstance();
        }


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
        $view = new VRent();
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


            $view = new VRent();
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
            $view = new VRent();
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
            if($idAuto==null) {
                header('Location: /DuplexDrive/User/home');
                exit;
            }
            
           
          

            $car= FPersistentManager::getInstance()->getObjectByIdLock(ECarForRent::class, $idAuto); //get the car object by id and lock the tuples and start transaction 
            FPersistentManager::getInstance()->lockAllIndispForCar($idAuto); // Lock all unavailability records for the car

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
                
               
                FPersistentManager::getInstance()->unlock();
                UMail::sendRentConfirm($user,$rent,$car,$amount,$startD,$endD);

                USession::unsetElementFromSession('type');
                USession::unsetElementFromSession('idAuto'); 

                 
                $view = new VRent();
                $view->showCarRentConfirmation($rent, $indisp,$infout); // Show confirmation of the car rent
                
            }
            else {


                FPersistentManager::getInstance()->unlock(); // Unlock the table if the car is not available
                $view = new VUser();
                $view->showErrorUnavailability(); // Show error message if the car is not available
                
            }
        }
    } 
    

}

