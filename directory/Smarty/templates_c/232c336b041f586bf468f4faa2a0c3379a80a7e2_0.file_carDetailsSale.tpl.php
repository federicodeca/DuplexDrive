<?php
/* Smarty version 5.5.1, created on 2025-07-11 22:38:01
  from 'file:carDetailsSale.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_687176295b2519_34815649',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '232c336b041f586bf468f4faa2a0c3379a80a7e2' => 
    array (
      0 => 'carDetailsSale.tpl',
      1 => 1752265733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_687176295b2519_34815649 (\Smarty\Template $_smarty_tpl) {
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
   
    <title>PHPJabbers.com | Free Car Rental Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="/DuplexDrive/directory/Smarty/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   

    <!-- Additional CSS Files -->

    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/fontawesome.css">
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/style.css">
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/owl.css">
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/calendar-custom.css">

          <!-- Additional icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> 

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    
   
  
      <?php echo '<script'; ?>
>
    const indisp = <?php echo json_encode($_smarty_tpl->getValue('indisp'));?>
;
    const surcharges = <?php echo json_encode($_smarty_tpl->getValue('surcharges'));?>
;
    const basePrice=<?php echo (($tmp = $_smarty_tpl->getValue('basePrice') ?? null)===null||$tmp==='' ? 50 ?? null : $tmp);?>
;
    <?php echo '</script'; ?>
>
   

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
          <a class="navbar-brand" href="/DuplexDrive/User/home"><h2>Duplex  <em>Drive</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/DuplexDrive/User/home">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

              <li class="nav-item"><a class="nav-link active" href="/DuplexDrive/Sale/carSearcher/">Acquista</a></li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Rent/showCarsForRent/">Noleggia</a></li>


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
                        <a class="dropdown-item" href="/DuplexDrive/User/ordersHistory">Ordini</a>
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
    <div class="page-heading about-heading header-text" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
             
              <h2><?php echo $_smarty_tpl->getValue('car')->getBrand();?>
 <?php echo $_smarty_tpl->getValue('car')->getModel();?>
</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
     <div class="send-message">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
              <h2>Acquista ora </h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              
              <form action="/DuplexDrive/Sale/loginAndCreditRequirementSale/" method="post">
              

                <div class="col-lg-12">
                    <fieldset>
                      
                      <h2>Prezzo totale: <?php echo $_smarty_tpl->getValue('amount');?>
 €</h2>
                      <br>
                      <p>Per procedere all'acquisto, è necessario effettuare il login<br> o registrarsi se non si è ancora iscritti.</p>
                      
                      
                    </fieldset>
                  </div>

                <div class="col-lg-12" style= "margin-top: 20px">
                    <fieldset>
                      <?php if ($_smarty_tpl->getValue('permission') == 'admin' || $_smarty_tpl->getValue('permission') == 'owner') {?>
                      <?php } else { ?>
                      <button type="submit" id="form-submit"  class="filled-button">Acquista</button>
                      <?php }?>
                    </fieldset>

                    
                  </div>

                </form>
            </div>
          </div>

          <div class="col-md-4">
              <div class="left-content">

                <p>Seguici sulle nostre pagine social per rimanere aggiornato sulle novità e per ricevere sconti</p>

                <br> 

                <ul class="social-icons">
                  <li><a href="#"> <i class="fa-brands fa-facebook"></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-square-x-twitter"></i></i></a></li>
                  <li><a href="#"><i class="fa-brands fa-linkedin"></i></a></li>
                  <li><a href="#"><<i class="fa-brands fa-behance"></i></a></li>
                </ul>
              </div>
            </div>
        </div>
      </div>
    </div>


    <div style="margin-top:100px"></div>
  
   

      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">

              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('car')->getPhoto(), 'photo', false, NULL, 'carosello', array (
  'first' => true,
  'iteration' => true,
  'index' => true,
));
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('photo')->value) {
$foreach0DoElse = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_carosello']->value['iteration']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_carosello']->value['index']++;
$_smarty_tpl->tpl_vars['__smarty_foreach_carosello']->value['first'] = !$_smarty_tpl->tpl_vars['__smarty_foreach_carosello']->value['index'];
?>
                    <div class="carousel-item <?php if (($_smarty_tpl->getValue('__smarty_foreach_carosello')['first'] ?? null)) {?>active<?php }?>">
                                           <img src="data:<?php echo $_smarty_tpl->getValue('photo')->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('photo')->getEncodedData();?>
" class="d-block w-100 img-fluid image-carousel-custom" alt="Immagine <?php echo ($_smarty_tpl->getValue('__smarty_foreach_carosello')['iteration'] ?? null);?>
">
                    </div>
                  <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                </div>
                  <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              </div>
            </div>
            </div>
          </div>
        </div>
      </div>
      
    
    

    <div class="products">
      <div class="container" >
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Informazioni</h2>
              </div>
            </div>

            <div class="col-md-8">
                <h5><i class="fa-solid fa-car mr-2"></i>Marca: <?php echo $_smarty_tpl->getValue('car')->getBrand();?>
</h5>

                <br>

                <h5><i class="fa-solid fa-gear mr-2"></i> Modello: <?php echo $_smarty_tpl->getValue('car')->getModel();?>
</h5>

                <br>

                <h5><i class="fa-solid fa-bolt-lightning mr-2"></i>Cavalli: <?php echo $_smarty_tpl->getValue('car')->getHorsePower();?>
</h5>

                <br>

                  <h5 ><i class="fa-solid fa-fire mr-2"></i>Cilindrata: <?php echo $_smarty_tpl->getValue('car')->getDisplacement();?>
</h5>
                
                <br>

                <h5><i class="fa-solid fa-user mr-2"></i>Numero Posti: <?php echo $_smarty_tpl->getValue('car')->getSeats();?>
</h5>

                <br>
                
                <h5><i class="fas fa-gas-pump mr-2"></i>Alimentazione: <?php echo $_smarty_tpl->getValue('car')->getFuelType();?>
</h5>
 
            </div>

            <div class="col-md-4">
              <div class="left-content">
                <h5>Regole di contratto</h5>

                <br>
                
                <p>Vieni in concessionaria per informazioni riguardo finanziamenti disponibili </p>
                <p>Si ricorda che in caso di acquisto online bisogna effettuare il pagamento tramite ...</p>

              </div>
            </div>
        </div>

        
                
 
      </div>
    </div>

   


  
 



    <!-- Bootstrap core JavaScript -->
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/vendor/jquery/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"><?php echo '</script'; ?>
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
 src="/DuplexDrive/directory/Smarty/js/calendar.js"><?php echo '</script'; ?>
>
 


  </body>
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
              <i class="fa-solid fa-phone"></i><h4> +39 123 456 789</h4>

            </div>
          </div>
        </div>
      </div>
  </footer>

</html >
<?php }
}
