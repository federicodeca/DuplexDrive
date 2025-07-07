<?php
/* Smarty version 5.5.1, created on 2025-07-04 12:50:37
  from 'file:adminPriceRent.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_6867b1fde8bba1_50600511',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fc8767f2d7efb09abd001ddf532aa3534d435a51' => 
    array (
      0 => 'adminPriceRent.tpl',
      1 => 1751625916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_6867b1fde8bba1_50600511 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = 'C:\\Users\\Paolo\\Documents\\GitHub\\Progetto_web_concessionario\\RentalTopGear\\directory\\Smarty\\templates';
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
          <a class="navbar-brand" href="/DuplexDrive/Admin/home/"><h2>Dashboard<em></em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <!-- Spazio riservato al login/user box -->
              <li id="user-box" class="nav-item d-flex align-items-center"></li>

              <li class="nav-item">
                <a class="nav-link" href="/DuplexDrive/Admin/home/">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Admin/showCarForm/">Aggiungi auto</a></li>

          

              <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Modifica auto</a>
                    
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="/DuplexDrive/Admin/showAllCars/Rent">Auto Noleggio</a>
                      <a class="dropdown-item" href="/DuplexDrive/Admin/showAllCars/Sale">Auto Acquisto</a>
                      <a class="dropdown-item" href="/DuplexDrive/Admin/showAllRentCarsForUnavailabilities/">Indisponibilità</a>
                      <a class="dropdown-item" href="/DuplexDrive/Admin/showAllRentCarsForSurcharges/">Prezzi </a>

                  
                    </div>
                </li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Admin/showLicenseNotChecked/">Verifica patente</a></li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/home">Vista cliente</a></li>



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

    <div class="banner header-text">
    <div class="container my-5">
      <h2 class="header-text text-center mb-5">inserisci prenotazione</h2>
      <form  method="post" action="/DuplexDrive/Admin/showSurcharges" enctype="multipart/form-data">
        <div class="form-group col-md-12">
          <label for="car">Seleziona auto</label>
          <select class="form-control form-control-sm mb-5" name="car" id="car">
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cars'), 'car');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('car')->value) {
$foreach0DoElse = false;
?>
              <option value="<?php echo $_smarty_tpl->getValue('car')->getIdAuto();?>
"><?php echo $_smarty_tpl->getValue('car')->getBrand();?>
 <?php echo $_smarty_tpl->getValue('car')->getModel();?>
 <?php echo $_smarty_tpl->getValue('car')->getDescription();?>
</option>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
          </select>
        </div>
        <div class="btn btn-primary btn-block mx-auto">
          <button class="btn btn-primary btn-lg btn-block" type="submit">scegli auto </button>
        </div>
      </form>

         <?php if ((true && ($_smarty_tpl->hasVariable('surcharges') && null !== ($_smarty_tpl->getValue('surcharges') ?? null)))) {?>
        <div class="mt-5">
          <h4 class="header-text text-center my-3">modifiche prezzi</h4>
          <div style="max-height: 300px; overflow-y: auto;">
            <table class="table table-sm table-bordered table-striped bg-white">
              <thead class="thead-dark">
                <tr>
                  <th>Inizio</th>
                  <th>Fine</th>
                </tr>
              </thead>
              <tbody>
                <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('surcharges'), 'price');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('price')->value) {
$foreach1DoElse = false;
?>
                  <tr>
                    <td><?php echo $_smarty_tpl->getValue('price')->getStart()->format("d-m-y");?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('price')->getEnd()->format("d-m-y");?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('price')->getPrice();?>
 €</td>
                  </tr>
                <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
              </tbody>
            </table>
          </div>
        </div>


        <form method="post" action="/DuplexDrive/Admin/insertSurcharge" enctype="multipart/form-data" class="mt-4">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="start_date">Data inizio</label>
              <input type="text" class="form-control" id="start_date" name="start" placeholder="dd-mm-yyyy" required>
            </div>
            <div class="form-group col-md-6">
              <label for="end_date">Data fine</label>
              <input type="text" class="form-control" id="end_date" name="end" placeholder="dd-mm-yyyy" required>      
            </div>
            <div class="form-group col-md-6">
              <label for="price">Prezzo</label>
              <input type="number" class="form-control" id="price" name="price" placeholder="Inserisci prezzo" required>
          </div>
          <input type="hidden" name="idAuto" value="<?php echo $_smarty_tpl->getValue('selectedCar')->getIdAuto();?>
">
          <div class="btn btn-primary btn-block mx-auto">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Aggiungi sovrapprezzo</button>
          </div>
        </form>
      <?php }?>
    </div>
    </div>


    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved. 
          
          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link"></a>
        </p>
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
