<?php
/* Smarty version 5.5.1, created on 2025-07-05 14:13:53
  from 'file:carsForSaleList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68691701868907_51841215',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7f614a51a1ec9a2f3e382b993af1e300c1d538c7' => 
    array (
      0 => 'carsForSaleList.tpl',
      1 => 1751717372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68691701868907_51841215 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\xampp\\htdocs\\DuplexDrive\\directory\\Smarty\\templates';
?><!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/Webapp/directory/Smarty/assets/images/favicon.ico">

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


    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/js/select-car.js"><?php echo '</script'; ?>
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
          <a class="navbar-brand"   href="index.html"><h2>Duplex <em>Drive</em></h2></a>
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
    
              <li class="nav-item"><a class="nav-link active" href="/DuplexDrive/User/carSearcher/">Acquista</a></li>

              <li class="nav-item "><a class="nav-link " href="/DuplexDrive/User/showCarsForRent/">Noleggia</a></li>

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
   <div class="page-heading about-heading header-text"  style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/other-image-fullscren-1-1920x900.jpg);"">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="custom-license-card">
              <form method="post" action="/DuplexDrive/User/showCarsForSale/1" >
                <div class="card-header">
                  <h4 class=" mb-3" style="color:white">Che auto cerchi?</h4>
                </div>
       
                <div class="row">
                  <div class="col-md-4 mt-5">
                    <div class="input-group input-group-sm mb-3">
                      <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Brand</button>
                      <ul class="dropdown-menu">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('models'), 'modelList', false, 'brand');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('brand')->value => $_smarty_tpl->getVariable('modelList')->value) {
$foreach0DoElse = false;
?>
                          <li><a class="dropdown-item" href="#" onclick="selectBrand('<?php echo $_smarty_tpl->getValue('brand');?>
')"><?php echo $_smarty_tpl->getValue('brand');?>
</a></li>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>
                      <div style="width: 50%;">
                        <input type="text" class="form-control" name="brand" readonly id="brandInput" placeholder="brand">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-4 mt-5">
                    <div class="input-group mb-3">
                      <button class="btn btn-outline-secondary dropdown-toggle" disabled="" id="modelButton" type="button" data-bs-toggle="dropdown" aria-expanded="false">model</button>
                      <ul class="dropdown-menu"  id="modelDropdown">
                        <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('models'), 'modelList', false, 'brand');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('brand')->value => $_smarty_tpl->getVariable('modelList')->value) {
$foreach1DoElse = false;
?>
                          <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('modelList'), 'model');
$foreach2DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('model')->value) {
$foreach2DoElse = false;
?>
                            <li class="dropdown-model-item" data-brand="<?php echo $_smarty_tpl->getValue('brand');?>
">
                              <a class="dropdown-item" href="#" onclick="selectModel('<?php echo $_smarty_tpl->getValue('model');?>
')"><?php echo $_smarty_tpl->getValue('model');?>
</a>
                            </li>
                          <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                        <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
                      </ul>
                      <div style="width: 50%;">
                      <input type="text" class="form-control" name="model"  id="modelInput" aria-label="Text input with dropdown button" placeholder="model" readonly>
                      </div>
                    </div>
                  </div>
               
                  <div class="col-md-4 mt-5">
                    <div class="form-group">
                      <label for="formControlRange" class="text-white">Prezzo max: <span id="priceValue">0</span> €</label>
                      <input type="range" class="form-control-range" id="formControlRange" name="price" min="0" max="100000" step="1000" value="100000" >
                    </div>
                  </div>
                </div>
                
                  <div class="row">
                  <div class="col md-12 mt-5">
                      <button type="submit" class="btn btn-primary btn-primary-center" style="color:aliceblue">Cerca</button>
                    </div>
                  </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    
<div class="products">
  <div class="container">
  
    <?php $_smarty_tpl->assign('index', 0, false, NULL);?> <!--gestisco la paginazione 3 per riga -->

    <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('filteredCars')) == 0) {?>
      <div class="col-md-12">
        <div class="alert alert-info" role="alert">
          Nessuna auto trovata per i criteri di ricerca selezionati.
        </div>
      </div>
    <?php }?>

    <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('filteredCars'), 'car');
$foreach3DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('car')->value) {
$foreach3DoElse = false;
?>
      <?php if ($_smarty_tpl->getValue('index')%3 == 0) {?>
        <div class="row">
      <?php }?>

      <div class="col-md-4">
        <a href='/DuplexDrive/User/selectCarForSale/<?php echo $_smarty_tpl->getValue('car')->getIdAuto();?>
'>
          <div class="product-item">
            <?php if ($_smarty_tpl->getValue('car')->getIcon()) {?>
              <img class="product-item-icon" src="data:<?php echo $_smarty_tpl->getValue('car')->getIcon()->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('car')->getIcon()->getEncodedData();?>
" loading="lazy" alt="Img">
            <?php } else { ?>
              <img src="/DuplexDrive/directory/Smarty/assets/images/default-car.jpg" loading="lazy" alt="Nessuna immagine disponibile">
            <?php }?>
            <div class="down-content">
              <h4><?php echo $_smarty_tpl->getValue('car')->getModel();?>
</h4>
              <h6><small>from:</small> <?php echo $_smarty_tpl->getValue('car')->getPrice();?>
€ <small>prezzo listino</small></h6>
              <br>
              <h6>condizione: <?php echo $_smarty_tpl->getValue('car')->getKm0OrNew();?>
</h6>
            </div>    
          </div>
        </a>
      </div>
           
      <?php if ($_smarty_tpl->getValue('index')%3 == 2 || $_smarty_tpl->getValue('index') == $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('filteredCars'))-1) {?>
        </div>
      <?php }?>
      <?php $_smarty_tpl->assign('index', $_smarty_tpl->getValue('index')+1, false, NULL);?> 
    <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

  </div>
</div>
            
            

          

 <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-12">
            <div class="inner-content">
          <nav aria-label="Pagination">
            <ul class="pagination">
              
                            <?php if ($_smarty_tpl->getValue('currentPage') > 1) {?> 
                <li class="page-item"> 
                  <a class="page-link" href="/DuplexDrive/User/showCarsForSale/<?php echo $_smarty_tpl->getValue('currentPage')-1;?>
">Previous</a>
                </li>
              <?php } else { ?>
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
              <?php }?>

                            <?php $_smarty_tpl->assign('prevPage', $_smarty_tpl->getValue('currentPage')-1, false, NULL);?>
              <?php $_smarty_tpl->assign('nextPage', $_smarty_tpl->getValue('currentPage')+1, false, NULL);?>

              <?php if ($_smarty_tpl->getValue('prevPage') >= 1) {?>
                <li class="page-item">
                  <a class="page-link" href="/DuplexDrive/User/showCarsForSale/<?php echo $_smarty_tpl->getValue('prevPage');?>
"><?php echo $_smarty_tpl->getValue('prevPage');?>
</a>
                </li>
              <?php }?>

              <li class="page-item active " aria-current="page">
                <a class="page-link" href="/DuplexDrive/User/showCarsForSale/<?php echo $_smarty_tpl->getValue('currentPage');?>
"><?php echo $_smarty_tpl->getValue('currentPage');?>
</a>
              </li>

              <?php if ($_smarty_tpl->getValue('nextPage') <= $_smarty_tpl->getValue('totalPages')) {?>
                <li class="page-item">
                  <a class="page-link" href="/DuplexDrive/User/showCarsForSale/<?php echo $_smarty_tpl->getValue('nextPage');?>
"><?php echo $_smarty_tpl->getValue('nextPage');?>
</a>
                </li>
              <?php }?>

                            <?php if ($_smarty_tpl->getValue('currentPage') < $_smarty_tpl->getValue('totalPages')) {?>
                <li class="page-item">
                  <a class="page-link" href="/DuplexDrive/User/showCarsForSale/<?php echo $_smarty_tpl->getValue('currentPage')+1;?>
">Next</a>
                </li>
              <?php } else { ?>
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Next</a>
                </li>
              <?php }?>
            </ul>
          </nav>
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
 src= "/DuplexDrive/directory/Smarty/vendor/bootstrap/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>


    <!-- Additional Scripts -->
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/assets/js/custom.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/assets/js/owl.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/js/login-box.js"><?php echo '</script'; ?>
>
    <!-- Popper.js (necessario per Bootstrap dropdown) -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap JS -->
    <?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"><?php echo '</script'; ?>
>
  </body>
  

</html>
<?php }
}
