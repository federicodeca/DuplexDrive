<?php
/* Smarty version 5.5.1, created on 2025-07-05 14:40:35
  from 'file:userProfile.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_68691d436bd035_53914515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6f70cc121c0f1bd4ef845cb7f3dd6c9244829f9e' => 
    array (
      0 => 'userProfile.tpl',
      1 => 1751717372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_68691d436bd035_53914515 (\Smarty\Template $_smarty_tpl) {
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


    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"><?php echo '</script'; ?>
>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    

  
  <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/js/license-calendar.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="/DuplexDrive/directory/Smarty/js/change-info.js"><?php echo '</script'; ?>
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
          <a class="navbar-brand" href="index.html"><h2>Duplex <em>Drive</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="RentalTopGear/User/home">Home
                      <span class="sr-only">(current)</span>
                    </a>
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

      <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 50%"></div>
  </div>
  
      <div class="services" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/other-image-fullscren-1-1920x900.jpg); max-height: auto;">
        <div class="container">
        <div class="row">
          <div class="col-md-10 ">
            <div class="custom-license-card">
            <div class="card-header">
              <div class="row align-items-center pr-3">
                <div class="col-md-8">
                  <h2 style="color:white; padding: auto;">Profile</h2>
                </div>
                <div class="col-md-4 text-md-right ">
                  <button class="btn btn-primary px-4" style="color: aliceblue; " onclick="window.location.href='/DuplexDrive/User/home/'">home</button>  
                </div>  
            </div>
          
            <div class="card-body">

              <h4 class="mb-3" style="color:white">Username: <?php echo $_smarty_tpl->getValue('user')->getUsername();?>
</h4>

              <h4 class="mb-3" style="color:white; ">Email: <?php echo $_smarty_tpl->getValue('user')->getEmail();?>
</h4>

                  

              <form method="post" action="/DuplexDrive/User/changeEmail">

         
         
              <div class="row align-items-center mb-3">
                <div class="col-md-8">
                  <input type="email" class="form-control w-50" id="inputEmail" name="email" placeholder="Enter new email" required>
                   <div class="invalid-feedback">
                    Please enter a valid email address.
                   </div>
                </div>
                 <div class="col-md-4 text-md-right">
                  <button class="btn btn-primary" style="color: aliceblue;" onclick="submit">Cambia Email</button>
                 </div> 
                </div>
              </div>
              </form>
                  
              <h4 class="mb-3 ml-3" style="color:white">Nome: <?php echo $_smarty_tpl->getValue('user')->getFirstname();?>
</h4> 
              <h4 class="mb-3 ml-3" style="color:white">Cognome: <?php echo $_smarty_tpl->getValue('user')->getLastname();?>
</h4>
              <h4 class="mb-3 ml-3" style="color:white">Patente: <?php if ($_smarty_tpl->getValue('user')->getIsVerified()) {?>inserita<?php } else { ?>non inserita<?php }?></h4>
              <h4 class="mb-3 ml-3" style="color:white">Telefono: <?php echo $_smarty_tpl->getValue('user')->getPhone();?>
</h4>
              <h4 class="mb-3 ml-3" style="color:white">Indirizzo: <?php echo $_smarty_tpl->getValue('user')->getAddress();?>
</h4>
              <h4 class="mb-3 ml-3" style="color:white">Città: <?php echo $_smarty_tpl->getValue('user')->getCity();?>
</h4>

              <button class="btn btn-primary px-4 mb-4" style="color:aliceblue; margin-top: 20px;" data-toggle="modal" data-target="#passwordModal">Cambia Password</button>. <!-- data target= id del modal-->

              <!-- Modal per cambio password -->
              <div class="modal fade" id="passwordModal" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h5 class="modal-title" id="passwordModalLabel">Cambia Password</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Chiudi">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form method="post" action="/DuplexDrive/User/changePassword">
                      <div class="modal-body">

                        <div class="form-group">
                          <label for="currentPassword">Password Corrente</label>
                          <input type="password" class="form-control" id="currentPassword" name="current" required>
                        </div>
                        <div class="form-group">
                          <label for="newPassword">Nuova Password</label>
                          <input type="password" class="form-control" id="newPassword" name="new" required>
                        </div>
                        <div class="form-group">
                          <label for="confirmPassword">Conferma Password</label>
                          <input type="password" class="form-control" id="confirmPassword" name="confirm" required>
                        </div>
                      </div>

                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-primary">Conferma</button>
                      </div>
                    </form>

                  </div>
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
              <i class="fa-solid fa-phone"></i><h4> +39 123 456 789</h4>

            </div>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript -->
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
