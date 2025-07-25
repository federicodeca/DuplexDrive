<?php
/* Smarty version 5.5.1, created on 2025-07-11 23:02:48
  from 'file:saleOverview.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68717bf86d2248_23532168',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e9a419d62b898f5c03e157eb7c9372b2d4526f8e' => 
    array (
      0 => 'saleOverview.tpl',
      1 => 1752265733,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68717bf86d2248_23532168 (\Smarty\Template $_smarty_tpl) {
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
                        <a class="dropdown-item" href="/DuplexDrive/User/ordersHistory">Ordini</a>      
                        <a class="dropdown-item" href="/DuplexDrive/User/showProfile">Profilo</a>
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
    <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar" style="width: 75%"></div>
</div>
 
      <div class="services" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/other-image-fullscren-1-1920x900.jpg);">
        <div class="container">

        <div class="row">

          <div class="col-md-6">
            <div class="card">
              <div class="card-header"><h5>Riepilogo ordine</h5></div>
              <div class="card-body">
                <h7>La tua auto sarà pronta entro un mese </h7><br>
                <h7>dal pagamento</h7><br>
              </div>
            </div> <!--fine card-->
          </div>


          <div class="col-md-6">
           <div class="card">
              <h5 class="card-header">Dettagli auto</h5>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <ul class="list-group mb-3 p-4"> 
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                  <h6 class="my-0">Marca:</h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getBrand();?>
</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                  <h6 class="my-0">Modello:</h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getModel();?>
</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                  <h6 class="my-0">Colore: </h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getColor();?>
</span>
                          </li>
                          
                          <li class="list-group-item d-flex justify-content-between ">
                              <div>
                                  <h6 class="my-0">Potenza: </h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getHorsepower();?>
</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                  <h6 class="my-0">Cilindrata: </h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getDisplacement();?>
</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                  <h6 class="my-0">Posti: </h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getSeats();?>
</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between lh-condensed">
                              <div>
                                  <h6 class="my-0">Alimentazione: </h6>
                              </div>
                              <span class="text-muted"><?php echo $_smarty_tpl->getValue('car')->getFuelType();?>
</span>
                          </li>

                          <li class="list-group-item d-flex justify-content-between">
                              <span>Total (EUR)</span>
                              <strong>Totale: <?php echo $_smarty_tpl->getValue('amount');?>
 </strong>
                          </li>
                      </ul>
                        
                      <hr class="mb-4">
                      <a href="/DuplexDrive/Sale/confirmSale" class="btn btn-primary btn-lg btn-block">Acquista</a>
                     
                    </div>
                </div>
              </div>
            </div>
          </div> <!-- chiusura col-md-6 per il form -->
        </div> <!-- chiusura row -->
      </div> <!-- chiusura container -->
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
              <i class="fa-solid fa-phone"></i><h4> +39 123 456 789</h4>

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

  </body>

</html>
<?php }
}
