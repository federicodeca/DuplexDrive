<?php
/* Smarty version 5.5.1, created on 2025-07-05 15:49:15
  from 'file:licenseList.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68692d5b20f658_35265094',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cbd4969bc0330a9b5d74b31afbeb5600431549a5' => 
    array (
      0 => 'licenseList.tpl',
      1 => 1751717372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68692d5b20f658_35265094 (\Smarty\Template $_smarty_tpl) {
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



  </head>

  <body>
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

              <li class="nav-item active">
                <a class="nav-link" href="/DuplexDrive/Admin/home/">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Admin/showCarForm/">Aggiungi auto</a></li>

          

              <li class="nav-item dropdown">
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
<body>
<div class="services">
<div class="container mt-5">

    <h2 class="text-center mb-4">Patenti Da Verificare</h2>


    <table class="table table-bordered table-hover align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Email</th>
                <th>Data Scadenza</th>
                <th>Immagine Patente</th>
                <th>Azioni</th>
            </tr>
        </thead>
        <tbody>
            <?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('licenses'), 'license');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('license')->value) {
$foreach0DoElse = false;
?>
                <tr>
                    <td><?php echo $_smarty_tpl->getValue('license')->getUserId()->getFirstname();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('license')->getUserId()->getLastname();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('license')->getUserId()->getEmail();?>
</td>
                    <td><?php echo $_smarty_tpl->getValue('license')->getExp()->format("Y/m/d");?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->getValue('license')->getPhoto()) {?>
                            <img src="data:<?php echo $_smarty_tpl->getValue('license')->getPhoto()->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('license')->getPhoto()->getEncodedData();?>
" alt="patente" class="img-fluid" />

                        <?php } else { ?>
                            <em>Nessuna immagine</em>
                        <?php }?>
                    </td>
                    <td>
                        <a href="/DuplexDrive/Admin/checkLicense/<?php echo $_smarty_tpl->getValue('license')->getIdLicense();?>
" 
                           class="btn btn-primary btn-lg btn-block">
                           Accetta
                        </a>
                        <a href="/DuplexDrive/Admin/refuseLicense/<?php echo $_smarty_tpl->getValue('license')->getIdLicense();?>
" 
                           class="btn btn-primary btn-lg btn-block">
                           Rifiuta
                        </a>
                    </td>
                </tr>
            <?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
        </tbody>
    </table>

</div>
</div>



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
