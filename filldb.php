<?php
require_once __DIR__.'/config/bootstrap.php';
require_once __DIR__.'/config/autoloader.php';
require_once __DIR__.'/config/config.php';

FEntityManager::getInstance();
$entityManager = FEntityManager::getEntityManager();

// echo("Filling the database with initial data...\n");


$c1= new EUser('Federico', 'Rossi', 'federico@gmail.com',34334343,'user', 'user', 'London', 12345, '123 Main St');
$c1->setVerified(true);
$c2 = new EUser('Luca', 'Bianchi', 'luca.bianchi@example.com', 98765432, 'user1', 'user', 'Rome', 54321, '456 Elm St');
$c2->setVerified(true);
$c3 = new EUser('Maria', 'Verdi', 'maria.verdi@example.com', 12345678, 'user2', 'user', 'Milan', 67890, '789 Oak St');
$c4 = new EUser('Giulia', 'Neri', 'giulia.neri@example.com', 87654321, 'user3', 'user', 'Naples', 11223, '321 Pine St');
$c5 = new EUser('Marco', 'Russo', 'marco.russo@example.com', 23456789, 'user4', 'user', 'Turin', 44556, '654 Maple St');
$c6 = new EUser('Sara', 'Gallo', 'msara@gmail.com', 34567890, 'user5', 'user', 'Florence', 77889, '987 Cedar St');
$c7 = new EUser('Alessandro', 'Conti', 'alessandro@gmail.com', 45678901, 'user6', 'user', 'Bologna', 99000, '159 Birch St');
$c8 = new EUser('Chiara', 'Fontana', 's@gi.it', 56789012, 'user7', 'user', 'Palermo', 22334, '753 Spruce St');
$c9 = new EUser('Matteo', 'Rinaldi', 'matte@f.it', 67890123, 'user8', 'user', 'Genoa', 55667, '852 Fir St');
$c10 = new EUser('Elena', 'Marino', 'elena.marino@er.it', 78901234, 'user9', 'user', 'Verona', 88990, '369 Cypress St');
$c11 = new EUser('Francesco', 'Leone', 'francesco.leone@gmail.com', 89012345, 'user10', 'user', 'Catania', 11223, '258 Redwood St');
$c12 = new EUser('Laura', 'Barbieri', 'laura.barb@mertini.it', 90123456, 'user11', 'user', 'Padua', 44556, '147 Walnut St');


$entityManager->persist($c1);
$entityManager->persist($c2);
$entityManager->persist($c3);
$entityManager->persist($c4);
$entityManager->persist($c5);  
$entityManager->persist($c6);
$entityManager->persist($c7);
$entityManager->persist($c8);
$entityManager->persist($c9);
$entityManager->persist($c10);      
$entityManager->persist($c11);
$entityManager->persist($c12);
      
$entityManager->flush();


$e1= new EImage('about-1-570x350.jpg', 76218, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/about-1-570x350.jpg'));
$l1= new ELicense(new DateTime('2025-12-31'),$e1, $c1);
$l1->setChecked(true);
$e8= new EImage('about-1-570x350.jpg', 76218, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/about-1-570x350.jpg'));
$l2= new ELicense(new DateTime('2025-12-31'),$e8, $c2);
$l2->setChecked(true);

$entityManager->persist($e1);
$entityManager->persist($l1);
$entityManager->persist($e8);
$entityManager->persist($l2);
$entityManager->flush();




$a1= new EAdmin('Alice', 'Smith', 'alice@example.com', 'admin', 'admin');
$entityManager->persist($a1);
$entityManager->flush();

$o1=new EOwner('John', 'Doe', 'john@gmail.com', 'owner', 'owner');
$entityManager->persist($o1);
$entityManager->flush();




$carS1 = new ECarForSale('Model S', 'Tesla', 'Red', 150, 2500, 5, 'Electric', 100.000, false, 'New');

$carS2 = new ECarForSale('Astra', 'Opel', 'Blue', 95, 1600, 5, 'Petrol', 21000, true, 'New');
$e10= new EImage('astra_ST_ice_edition-white_4x3_960x720.avif', 11570, 'image/avif', file_get_contents(__DIR__.'/directory/Smarty/assets/images/astra_ST_ice_edition-white_4x3_960x720.avif'));
$e10->setCar($carS2);
$carS3 = new ECarForSale('Corsa', 'Opel', 'Red', 85, 1400, 5, 'Diesel', 18000, true, 'Km0');
 $e11= new EImage('opel-corsa-front-view.jpg', 35048, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/opel-corsa-front-view.jpg'));
 $e11->setCar($carS3);
$carS4 = new ECarForSale('Crossland', 'Opel', 'White', 90, 1500, 5, 'Petrol', 19500, false, 'New');
$carS5 = new ECarForSale('Grandland', 'Opel', 'Grey', 110, 2000, 5, 'Diesel', 27000, false, 'Km0');
$carS6 = new ECarForSale('Mokka', 'Opel', 'Black', 100, 1600, 5, 'Petrol', 23000, true, 'New');
$e12= new EImage('Opel_MOKKA960x540.avif', 19529, 'image/avif', file_get_contents(__DIR__.'/directory/Smarty/assets/images/Opel_MOKKA960x540.avif'));
$e12->setCar($carS6);
$carS7 = new ECarForSale('Zafira', 'Opel', 'Silver', 120, 1900, 7, 'Diesel', 25000, true, 'Km0');
$e13= new EImage('opelZafira.jpg',70564, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/download.jpeg'));
$e13->setCar($carS7);
$carS8 = new ECarForSale('Insignia', 'Opel', 'Blue', 130, 2200, 5, 'Petrol', 30000, true, 'New');
$e14= new EImage('download.jpeg',6496, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/download.jpeg'));
$e14->setCar($carS8);
$carS9 = new ECarForSale('Combo', 'Opel', 'White', 80, 1400, 5, 'Diesel', 17000, true, 'Km0');
$e15= new EImage('opelCombo.jpeg',74272, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/opelCombo.jpeg'));
$e15->setCar($carS9);
$carS10 = new ECarForSale('Model 3', 'Tesla', 'Black', 140, 2200, 5, 'Electric', 85000, true, 'New');
$e16= new EImage('teslamodel3.jpg',51046, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/teslamodel3.jpg'));
$e16->setCar($carS10);
$carS11= new ECarForSale('Panda', 'Fiat', 'White', 70, 1000, 5, 'Petrol', 15000, true, 'Km0');
$e17= new EImage('fiat-panda.jpeg', 67417, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/fiat-panda.jpeg'));
$e17->setCar($carS11);
$carS12 = new ECarForSale('Corsa', 'Opel', 'Blue', 90, 1400, 5, 'Diesel', 18000, false, 'Km0');
$e18= new EImage('images.jpeg', 6230, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/images.jpeg'));
$e18->setCar($carS12);
$carS13 = new ECarForSale('Tucson', 'Hyundai', 'Silver', 110, 1800, 5, 'Diesel', 25000, true, 'New');
$e19= new EImage('Hyundai-Tucson-Go_-2_Single Image Mobile.avif',26498, 'image/avif', file_get_contents(__DIR__.'/directory/Smarty/assets/images/Hyundai-Tucson-Go_-2_Single Image Mobile.avif'));
$e19->setCar($carS13);
$carS14 = new ECarForSale('Astra', 'Opel', 'Red', 95, 1500, 5, 'Petrol', 20000, true, 'Km0');
$e20= new EImage('astraRed.jpeg', 120223, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/astraRed.jpeg'));
$e20->setCar($carS14);
$carS15 = new ECarForSale('Santa Fe', 'Hyundai', 'Black', 130, 2000, 7, 'Diesel', 30000, true, 'New');
$e21= new EImage('hyundai-santa-fe-2024_02.jpg', 189724, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/hyundai-santa-fe-2024_02.jpg'));
$e21->setCar($carS15);
$carS16 = new ECarForSale('500', 'Fiat', 'Yellow', 80, 1100, 4, 'Petrol', 17000, false, 'Km0');
$carS17 = new ECarForSale('i30', 'Hyundai', 'White', 100, 1600, 5, 'Petrol', 22000, true, 'New');
$e22= new EImage('hyundai30.avif', 49902, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/hyundai30.avif'));
$e22->setCar($carS17);



$carR18= new ECarForRent( 'Panda','Fiat', 'Blue',  70, 1000, 5,  'Petrol', 50, 'id=23e3d');
$e23= new EImage('fiat-panda.jpeg', 67417, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/fiat-panda.jpeg'));
$e23->setCar($carR18);


$carR19 = new ECarForRent('500', 'Fiat', 'Red', 85, 1200, 4, 'Petrol', 60, 'id=243ff');
$e24= new EImage('fiat-500-tributo-trepiuno.jpg', 32561, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/fiat-500-tributo-trepiuno.jpg'));
$e24->setCar($carR19);
$carR20 = new ECarForRent('Punto', 'Fiat', 'White', 65, 1100, 5, 'Diesel', 55, 'id=33hdh');
$e25= new EImage('punto.jpeg', 31055, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/punto.jpeg'));
$e25->setCar($carR20);
$carR21 = new ECarForRent('Astra', 'Opel', 'Black', 90, 1400, 5, 'Petrol', 65, 'id=44jdh');
$e26= new EImage('astraRed.jpeg', 120223, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/astraRed.jpeg'));
$e26->setCar($carR21);
$carR22 = new ECarForRent('Corsa', 'Opel', 'Grey', 75, 1300, 4, 'Diesel', 58, 'id=55kdh');
$e27= new EImage('opel-corsa-front-view.jpg', 35048, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/opel-corsa-front-view.jpg'));
$e27->setCar($carR22);
$carR23 = new ECarForRent('Crossland', 'Opel', 'Blue', 80, 1350, 4, 'Petrol', 62, 'id=66ldh');
$e28= new EImage('opelcrossland.jpg', 29752, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/opelcrossland.jpg'));
$e28->setCar($carR23);
$carR24 = new ECarForRent('i30', 'Hyundai', 'Silver', 95, 1500, 5, 'Petrol', 70, 'id=77mdh');
$e29= new EImage('hyundai30.avif', 49902, 'image/avif', file_get_contents(__DIR__.'/directory/Smarty/assets/images/hyundai30.avif'));
$e29->setCar($carR24);
$carR25 = new ECarForRent('Tucson', 'Hyundai', 'White', 110, 1800, 5, 'Diesel', 75, 'id=88ndh');
$e30= new EImage('Hyundai-Tucson-Go_-2_Single Image Mobile.avif',26498, 'image/avif', file_get_contents(__DIR__.'/directory/Smarty/assets/images/Hyundai-Tucson-Go_-2_Single Image Mobile.avif'));
$e30->setCar($carR25);
$carR26 = new ECarForRent('Santa Fe', 'Hyundai', 'Black', 130, 2000, 7, 'Diesel', 80, 'id=99odh');
$e31= new EImage('hyundai-santa-fe-2024_02.jpg', 189724, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/hyundai-santa-fe-2024_02.jpg'));
$e31->setCar($carR26);


$e2= new EImage('offer-4-370x270.jpg', 43553, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/offer-4-370x270.jpg'));
$e2->setCar($carS2);
$e3= new EImage('product-4-370x270.jpg', 38554, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/product-4-370x270.jpg'));
$e3->setCar($carS2);
$e5= new EImage('offer-2-370x270.jpg', 61873, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/offer-2-370x270.jpg'));
$e5->setCar($carS2);
$e4= new EImage('product-5-370x270.jpg',44101, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/product-5-370x270.jpg'));
$e4->setCar($carR18);
$e6= new EImage('offer-3-370x270.jpg', 51234, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/offer-3-370x270.jpg'));
$e6->setCar($carR18);
$e7= new EImage('product-6-370x270.jpg', 56075, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/product-6-370x270.jpg'));
$e7->setCar($carR18); 

$entityManager->persist($e2);
$entityManager->persist($e3);
$entityManager->persist($e4);
$entityManager->persist($e5);
$entityManager->persist($e6);
$entityManager->persist($e7); 
$entityManager->persist($e10);
$entityManager->persist($e11);
$entityManager->persist($e12);
$entityManager->persist($e13);
$entityManager->persist($e14);
$entityManager->persist($e15);
$entityManager->persist($e16);
$entityManager->persist($e17);
$entityManager->persist($e18);
$entityManager->persist($e19);
$entityManager->persist($e20);
$entityManager->persist($e21);
$entityManager->persist($e22);
$entityManager->persist($e23);
$entityManager->persist($e24);
$entityManager->persist($e25);
$entityManager->persist($e26);
$entityManager->persist($e27);
$entityManager->persist($e28);
$entityManager->persist($e29);
$entityManager->persist($e30);
$entityManager->persist($e31);

$entityManager->persist($carS1);
$entityManager->persist($carS2);            
$entityManager->persist($carS3);
$entityManager->persist($carS4);
$entityManager->persist($carS5);
$entityManager->persist($carS6);
$entityManager->persist($carS7);
$entityManager->persist($carS8);
$entityManager->persist($carS9);
$entityManager->persist($carS10);
$entityManager->persist($carS11);
$entityManager->persist($carS12);
$entityManager->persist($carS13);
$entityManager->persist($carS14);
$entityManager->persist($carS15);
$entityManager->persist($carS16);
$entityManager->persist($carS17);
$entityManager->persist($carR18);
$entityManager->persist($carR19);
$entityManager->persist($carR20);
$entityManager->persist($carR21);
$entityManager->persist($carR22);
$entityManager->persist($carR23);
$entityManager->persist($carR24);
$entityManager->persist($carR25);
$entityManager->persist($carR26);
$entityManager->flush();

$cr1 = new ECreditCard('1234567890123456', new DateTime('2029-01-01'), '123', $c1);
$cr2 = new ECreditCard('2345678901234567', new DateTime('2028-06-30'), '456', $c1);
$cr3 = new ECreditCard('3456789012345678', new DateTime('2030-12-31'), '789', $c2);
$cr4 = new ECreditCard('4567890123456789', new DateTime('2027-03-15'), '321', $c3);
$cr5 = new ECreditCard('5678901234567890', new DateTime('2026-09-01'), '654', $c4);


$un1= new EUnavailability(new DateTime('2025-05-01'), new DateTime('2025-05-10'), $carR18);
$un2= new EUnavailability(new DateTime('2025-11-01'), new DateTime('2025-11-05'), $carR18);
$un3= new EUnavailability(new DateTime('2025-08-01'), new DateTime('2025-08-15'), $carR18);
$un4= new EUnavailability(new DateTime('2025-08-11'), new DateTime('2025-08-14'), $carR18);
$un5= new EUnavailability(new DateTime('2025-07-22'), new DateTime('2025-07-25'), $carR18);

$entityManager->persist($un1);
$entityManager->persist($un2);
$entityManager->persist($un3);
$entityManager->persist($un4);
$entityManager->persist($un5);
$entityManager->flush();    
$sur=new ESurcharge(new DateTime('2025-10-01'), new DateTime('2025-10-10'), 100.0, $carR18);
$sur2=new ESurcharge(new DateTime('2025-11-01'), new DateTime('2025-11-05'), 40.0, $carR18);
$sur3=new ESurcharge(new DateTime('2025-07-28'), new DateTime('2025-07-30'), 80.0, $carR18);
$sur4=new ESurcharge(new DateTime('2025-08-01'), new DateTime('2025-08-15'), 20.0, $carR18);


$entityManager->persist($sur);
$entityManager->persist($sur2);     
$entityManager->persist($sur3);
$entityManager->persist($sur4);
$entityManager->flush();

$R1 = new ERent(new DateTime('2025-03-01'),$cr1,$c1, $un1, $carR18);
$R1->setTotalPrice(1500.0);
$R2 = new ERent(new DateTime('2025-04-01'),$cr2,$c1, $un2, $carR18);
$R2->setTotalPrice(450.0);
$R3 = new ERent(new DateTime('2025-04-04'),$cr1,$c2, $un3, $carR18);
$R3->setTotalPrice(600.0);
$R4 = new ERent(new DateTime('2025-04-07'),$cr1,$c2, $un4, $carR18);
$R4->setTotalPrice(300.0);
$R5 = new ERent(new DateTime('2025-05-10'),$cr2,$c2, $un5, $carR18);    
$R5->setTotalPrice(400.0);

$entityManager->persist($cr1);
$entityManager->persist($cr2);      
$entityManager->persist($cr3);
$entityManager->persist($cr4);
$entityManager->persist($cr5);
$entityManager->persist($R1);
$entityManager->persist($R2);
$entityManager->persist($R3);
$entityManager->persist($R4);
$entityManager->persist($R5);
$entityManager->flush();    

$S1= new ESale(new DateTime('2025-01-01'), $cr4, $c3, $carS1, 100000);
$S2= new ESale(new DateTime('2025-01-12'), $cr5, $c4, $carS4, 18000);
$S3= new ESale(new DateTime('2025-02-01'), $cr1, $c5, $carS5, 27000);
$S4= new ESale(new DateTime('2025-02-15'), $cr2, $c1, $carS12, 18000);
$S5= new ESale(new DateTime('2025-03-01'), $cr3, $c2, $carS16, 17000);


$entityManager->persist($S1);
$entityManager->persist($S2);
$entityManager->persist($S3);           
$entityManager->persist($S4);
$entityManager->persist($S5);
$entityManager->flush();





$carS26= new ECarForSale('Model S', 'Tesla', 'Red', 160, 2600, 5, 'Electric', 95000, true, 'New');
$e9= new EImage('teslaModelS.jpg', 51234, 'image/jpeg', file_get_contents(__DIR__.'/directory/Smarty/assets/images/teslaModelS.jpg'));
$e9->setCar($carS26);
$entityManager->persist($carS26);
$entityManager->persist($e9);
$entityManager->flush();



$w1=new EReview('Great service!', 5, $c1);
$w2=new EReview('Very satisfied with my purchase.', 4, $c2);
$w3=new EReview('Bad Experience', 2, $c3);
$w4=new EReview('Fast and reliable service.', 4, $c4);
$w5=new EReview('Highly recommend this dealership.', 5, $c5);   
$w6=new EReview('Good selection of cars.', 3, $c6);
$w7=new EReview('Friendly staff and great service.', 5, $c7);
$w8=new EReview('Very happy with my new car.', 4, $c8);
$w9=new EReview('Professional and helpful team.', 5, $c9);
$w10=new EReview('Smooth transaction and great car.', 4, $c10);
$w11=new EReview('it sucks.', 1, $c11);
$w12=new EReview('Satisfied with my purchase.', 4, $c12);

$entityManager->persist($w1);
$entityManager->persist($w2);
$entityManager->persist($w3);   
$entityManager->persist($w4);
$entityManager->persist($w5);
$entityManager->persist($w6);
$entityManager->persist($w7);
$entityManager->persist($w8);
$entityManager->persist($w9);
$entityManager->persist($w10);
$entityManager->persist($w11);
$entityManager->persist($w12);
$entityManager->flush();