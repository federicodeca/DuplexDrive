<?php
/* Smarty version 5.5.1, created on 2025-07-08 15:32:55
  from 'file:home.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686d1e077b8710_71370120',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ceb77e82756225437088e59849a6138a42c2b418' => 
    array (
      0 => 'home.tpl',
      1 => 1751981572,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686d1e077b8710_71370120 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\DuplexDrive\\directory\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">

  <head>

  
   
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/DuplexDrive/directory/Smarty/assets/images/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <title>Duplex Drive</title>

    <!-- Bootstrap core CSS -->
    <link href="/DuplexDrive/directory/Smarty/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/style.css">
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/owl.css">

    <!-- Additional icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> 


 

  </head>


  <body>


    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
 

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="/DuplexDrive/User/home"><h2>Duplex <em>Drive</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <!-- Spazio riservato al login/user box -->
              <li id="user-box" class="nav-item d-flex align-items-center"></li>

              <li class="nav-item active">
                <a class="nav-link" href="/User/home">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/carSearcher/">Acquista</a></li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/showCarsForRent/">Noleggia</a></li>


              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/showAboutUs/">About Us</a></li>

              <?php if ($_smarty_tpl->getValue('isLogged')) {?>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      benvenuto <?php echo $_smarty_tpl->getValue('username');?>
 <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMore">
                      <?php if ($_smarty_tpl->getValue('permission') === 'admin') {?> <a class="dropdown-item" href="/DuplexDrive/Admin/home">admin</a> <?php }?>
                      <?php if ($_smarty_tpl->getValue('permission') === 'user') {?> 
                        <a class="dropdown-item" href="/DuplexDrive/User/insertLicense">Patente</a>
                        <a class="dropdown-item" href="/DuplexDrive/User/insertReview">Recensione</a>
                        <a class="dropdown-item" href="/DuplexDrive/User/showProfile">Profilo</a>
                      <?php }?>
                      <?php if ($_smarty_tpl->getValue('permission') === 'owner') {?>
                        <a class="dropdown-item" href="/DuplexDrive/Owner/home">Resoconto Azienda</a>
                      <?php }?>
                      <a class="dropdown-item" href="/DuplexDrive/User/logout">Esci</a>
                    </div>
                  </li>
  


              <?php } else { ?>
                  <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                          </a>
                          <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="loginDropdown" style="min-width: 250px;">
                            <form method="post" action="/DuplexDrive/User/checkLoginAuto">
                              <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
                              <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                              <input type="hidden" name="actualMethod" value="<?php echo htmlspecialchars((string)$_SERVER['REQUEST_URI'], ENT_QUOTES, 'UTF-8', true);?>
">
                              <button type="submit" class="btn btn-primary btn-block">Accedi</button>
                             
                            </form>

                              <button type="button" onclick='window.location.href="/DuplexDrive/User/showRegistrationForm"' class="btn btn-secondary btn-block mt-2">Registrati</button>
                              <div id="login-message" class="text-danger mt-2"></div>
                          
                          </div>
                        </li>
              <?php }?>          
            

            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
      <div class="owl-banner owl-carousel">
        <div class="banner-item-01">
          <div class="text-content">
            <h4>Qualità</h4>
            <h2>Le migliori auto al miglior prezzo!</h2>
          </div>
        </div>
        <div class="banner-item-02">
          <div class="text-content">
            <h4>Accoglienza</h4>
            <h2>Impegno e dedizione ogni giorno</h2>
          </div>
        </div>
        <div class="banner-item-03">
          <div class="text-content">
            <h4>Dal 1998</h4>
            <h2>Regaliamo felicità ai clienti</h2>
          </div>
        </div>
      </div>
    </div>
    <!-- Banner Ends Here -->

    <div class="mt-3"></div>

    <div class="offers">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Occasioni</h2>
              <a href="/DuplexDrive/User/carSearcher">scopri di più <i class="fa fa-angle-right"></i></a>
            </div>
          </div>

          <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('offers')) > 2) {?>
   
            <div class="col-md-4">
                <a href='/DuplexDrive/User/selectCarForSale/<?php echo $_smarty_tpl->getValue('offers')[0]->getIdAuto();?>
'>
                  <div class="product-item">
                    <?php if ($_smarty_tpl->getValue('offers')[0]->getIcon()) {?>
                      <img class="product-item-icon" src="data:<?php echo $_smarty_tpl->getValue('offers')[0]->getIcon()->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('offers')[0]->getIcon()->getEncodedData();?>
" loading="lazy" alt="Img">
                    <?php } else { ?>
                      <img src="/DuplexDrive/directory/Smarty/assets/images/default-car.jpg" loading="lazy" alt="Nessuna immagine disponibile">
                    <?php }?>
                    <div class="down-content">
                      <h4><i class="fas fa-gas-pump mr-2"></i><?php echo $_smarty_tpl->getValue('offers')[0]->getBrand();?>
 <?php echo $_smarty_tpl->getValue('offers')[0]->getModel();?>
</h4>
                      <h6><i class="fa-solid fa-money-check-dollar mr-2"></i> <small>from:</small> <?php echo $_smarty_tpl->getValue('offers')[0]->getPrice();?>
€ <small>prezzo listino</small></h6>
                      <h6><i class="fa-solid fa-hourglass-start mr-2"></i><small>condizione: </small> <?php echo $_smarty_tpl->getValue('offers')[0]->getKm0OrNew();?>
</h4>
                      <h6><i class="fa-solid fa-droplet mr-2"></i><small>alimentazione: </small><?php echo $_smarty_tpl->getValue('offers')[0]->getFuelType();?>
 </h4>
                    </div>    
                  </div>
                </a>
              </div>

            <div class="col-md-4">
                <a href='/DuplexDrive/User/selectCarForSale/<?php echo $_smarty_tpl->getValue('offers')[1]->getIdAuto();?>
'>
                  <div class="product-item">
                    <?php if ($_smarty_tpl->getValue('offers')[1]->getIcon()) {?>
                      <img class="product-item-icon" src="data:<?php echo $_smarty_tpl->getValue('offers')[1]->getIcon()->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('offers')[1]->getIcon()->getEncodedData();?>
" loading="lazy" alt="Img">
                    <?php } else { ?>
                      <img src="/DuplexDrive/directory/Smarty/assets/images/default-car.jpg" loading="lazy" alt="Nessuna immagine disponibile">
                    <?php }?>
                    <div class="down-content">
                      <h4><i class="fas fa-gas-pump mr-2"></i><?php echo $_smarty_tpl->getValue('offers')[1]->getBrand();?>
 <?php echo $_smarty_tpl->getValue('offers')[1]->getModel();?>
</h4>
                      <h6><i class="fa-solid fa-money-check-dollar mr-2"></i> <small>from:</small> <?php echo $_smarty_tpl->getValue('offers')[1]->getPrice();?>
€ <small>prezzo listino</small></h6>
                      <h6><i class="fa-solid fa-hourglass-start mr-2"></i><small>condizione: </small> <?php echo $_smarty_tpl->getValue('offers')[1]->getKm0OrNew();?>
</h6>
                      <h6><i class="fa-solid fa-droplet mr-2"></i><small>alimentazione: </small><?php echo $_smarty_tpl->getValue('offers')[1]->getFuelType();?>
 </h6>
                    </div>    
                  </div>
                </a>
              </div>

           <div class="col-md-4">
                <a href='/DuplexDrive/User/selectCarForSale/<?php echo $_smarty_tpl->getValue('offers')[2]->getIdAuto();?>
'>
                  <div class="product-item">
                    <?php if ($_smarty_tpl->getValue('offers')[2]->getIcon()) {?>
                      <img class="product-item-icon" src="data:<?php echo $_smarty_tpl->getValue('offers')[2]->getIcon()->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('offers')[2]->getIcon()->getEncodedData();?>
" loading="lazy" alt="Img">
                    <?php } else { ?>
                      <img src="/DuplexDrive/directory/Smarty/assets/images/default-car.jpg" loading="lazy" alt="Nessuna immagine disponibile">
                    <?php }?>
                    <div class="down-content">
                      <h4><i class="fas fa-gas-pump mr-2"></i><?php echo $_smarty_tpl->getValue('offers')[1]->getBrand();?>
 <?php echo $_smarty_tpl->getValue('offers')[2]->getModel();?>
</h4>
                      <h6><i class="fa-solid fa-money-check-dollar mr-2"></i> <small>from:</small> <?php echo $_smarty_tpl->getValue('offers')[2]->getPrice();?>
€ <small>prezzo listino</small></h6>
                      <h6><i class="fa-solid fa-hourglass-start mr-2"></i><small>condizione: </small> <?php echo $_smarty_tpl->getValue('offers')[2]->getKm0OrNew();?>
</h6>
                      <h6><i class="fa-solid fa-droplet mr-2"></i><small>alimentazione: </small><?php echo $_smarty_tpl->getValue('offers')[2]->getFuelType();?>
 </h6>
                    </div>    
                  </div>
                </a>
              </div>

        <?php } else { ?>
          <div class="col-md-12">
            <p class="text-center">Nessuna offerta disponibile al momento.</p>
          </div>
        <?php }?>

        </div>
      </div>
    </div>

    <div class="find-us">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
              <div class="section-heading">
                <h2>Vieni a trovarci</h2>
              </div>
          </div>
          <div class="col-md-12">
            <div id="map">
             <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11793.047504139136!2d13.385407245971683!3d42.35825798648915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sit!2sit!4v1750455923682!5m2!1sit!2sit" width="1200" height="400" style="border:0; cursor: pointer;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>  

    <div class="mt-3"></div>

    <div class="services" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/other-image-fullscren-1-1920x900.jpg);" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Dicono di noi</h2>

            </div>
          </div>
          <div class="col-12">
        <div class="owl-carousel reviews-carousel" id="reviews-carousel">
          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('reviews'), 'review');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('review')->value) {
$foreach0DoElse = false;
?>
          <div class="service-item mx-2">
            <div class="service-item">
              <div class="services-item-image"><img src="/DuplexDrive/directory/Smarty/assets/images/reviewbox.jpg" class="img-fluid" alt=""></div>

              <div class="down-content">
                <h4><a href="#"><?php
$_smarty_tpl->assign('i', null);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? ($_smarty_tpl->getValue('review')->getRating()-1)+1 - (0) : 0-(($_smarty_tpl->getValue('review')->getRating()-1))+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?><i class="fa-solid fa-star mr-2"></i><?php }
}
?></a></h4>
                <p style = "font-style: italic; font-size: 18px" > <?php echo $_smarty_tpl->getValue('review')->getUser()->getFirstname();?>
 &nbsp <?php echo substr((string) $_smarty_tpl->getValue('review')->getUser()->getLastname(), (int) 0, (int) 1);?>
. </h7>
                <p style="margin: 0;"><?php echo $_smarty_tpl->getValue('review')->getContent();?>
</p>
              </div>
            </div>
          </div>
          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </div>
      </div>
    </div>
     </div>
    </div>

   


    <div class="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
              <div class="row">
                <div class="col-md-8">
                  <h7>Siamo lieti di accoglierti nel nostro store.</h7>
                  <br></br>
                  <h7>Contattaci:</h7><br>
                  <h7><i class="fa-solid fa-phone mr-2"></i>+39 123 456 789</h7><br>
                  <h7><i class="fa-solid fa-envelope mr-2"></i>duplexdrive@pippo.it</h7>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    
      <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
                    <div class="row ">
        <div class="col-md-12">
          <i class="fa-brands fa-cc-paypal fa-2x mr-2"></i>
          <i class="fa-brands fa-cc-visa fa-2x mr-2"></i>
          <i class="fa-brands fa-cc-diners-club fa-2x mr-2"></i>
          <i class="fa-brands fa-cc-mastercard fa-2x mr-2"></i>
          <i class="fa-brands fa-cc-discover fa-2x mr-2"></i>
          <i class="fa-brands fa-cc-amex fa-2x"></i>
            
         </div>
        </div>

              <p> Duplex Drive  <a href="/DuplexDrive/User/home"></a> </p>
              <p>Copyright © 2020 Company Name - Template by: PHPJabbers.com</p>
              <i class="fa-solid fa-phone mr-2"></i><h4> +39 123 456 789</h4>

            </div>
          </div>
        </div>
      </div>
    </footer>



    <!-- Bootstrap core JavaScript -->
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>


    <!-- Additional Scripts -->
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/assets/js/custom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/assets/js/owl.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/assets/js/owl.carousel.min.js"><?php echo '</script'; ?>
>
    
    <?php echo '<script'; ?>
 src="\DuplexDrive\directory\Smarty\js\carousel-home.js"><?php echo '</script'; ?>
>

  </body>
</html><?php }
}
