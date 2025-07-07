<?php
/* Smarty version 5.5.1, created on 2025-07-05 14:13:45
  from 'file:carsForRentlist.tpl' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.5.1',
  'unifunc' => 'content_686916f9555bf3_51017261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '562e5792466e1b8a5bf8fea65729824da505cea5' => 
    array (
      0 => 'carsForRentlist.tpl',
      1 => 1751717372,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_686916f9555bf3_51017261 (\Smarty\Template $_smarty_tpl) {
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

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/carSearcher/">Acquista</a></li>

              <li class="nav-item"><a class="nav-link active" href="/DuplexDrive/User/showCarsForRent/">Noleggia</a></li>

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

 <!-- Page Content pagination (smarty side only)-->
 


     <div class="page-heading about-heading header-text" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
              <h4>I nostri veicoli</h4>
              <h2>Noleggio</h2>
     
            </div>
          </div>
        </div>
      </div>
    </div>
      <?php $_smarty_tpl->assign('perPage', 6, false, NULL);?>                       <!-- Number of cars per page -->
      <?php $_smarty_tpl->assign('page', (($tmp = $_GET['page'] ?? null)===null||$tmp==='' ? 1 ?? null : $tmp), false, NULL);?> <!-- Current page, default to 1 if not set reda page=x-->
      <?php $_smarty_tpl->assign('start', ($_smarty_tpl->getValue('page')-1)*$_smarty_tpl->getValue('perPage'), false, NULL);?>     <!-- Calculate the starting index for the current page -->
      <?php $_smarty_tpl->assign('end', $_smarty_tpl->getValue('start')+$_smarty_tpl->getValue('perPage'), false, NULL);?>
      <?php echo $_smarty_tpl->getSmarty()->getFunctionHandler('math')->handle(array('assign'=>"totalPages",'equation'=>"ceil(x / y)",'x'=>$_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('cars')),'y'=>$_smarty_tpl->getValue('perPage')), $_smarty_tpl);?>
  <!-- Calculate total pages based on the number of cars and perPage -->
      <?php $_smarty_tpl->assign('index', 0, false, NULL);?>  
          <div class="products">
            <div class="container">

      <?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('cars')) > 0) {?>
   
        <!-- mostra auto -->
    

<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('cars'), 'car');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('car')->value) {
$foreach0DoElse = false;
?>
  <?php if ($_smarty_tpl->getValue('index') >= $_smarty_tpl->getValue('start') && $_smarty_tpl->getValue('index') < $_smarty_tpl->getValue('end')) {?>
    <?php if (($_smarty_tpl->getValue('index')-$_smarty_tpl->getValue('start'))%3 == 0) {?>
      <div class="row">
    <?php }?>


    <div class="col-md-4"> <!--row in 12,every column start on 4 from 12-->
    <a href='/DuplexDrive/User/selectCarForRent/<?php echo $_smarty_tpl->getValue('car')->getIdAuto();?>
'>
      <div class="product-item" >
        <?php if ($_smarty_tpl->getValue('car')->getIcon() && $_smarty_tpl->getValue('car')->getIcon()->getEncodedData()) {?>
       <img class="product-item-icon" src="data:<?php echo $_smarty_tpl->getValue('car')->getIcon()->getType();?>
;base64,<?php echo $_smarty_tpl->getValue('car')->getIcon()->getEncodedData();?>
" loading="lazy" alt="Img">
        <?php } else { ?>
        <img class="product-item-icon" src="/DuplexDrive/directory/Smarty/assets/images/product-1-370x270.jpg" loading="lazy" alt="Img">
        <?php }?>
        <div class="down-content">
          <h4><?php echo $_smarty_tpl->getValue('car')->getModel();?>
</h4>
          <h6><small>from</small> <?php echo $_smarty_tpl->getValue('car')->getBasePrice();?>
€ <small>per weekend </small></h6>
          <p><?php echo $_smarty_tpl->getValue('car')->getDescription();?>
</p>
        </div>
        </a>
      </div>
    </div>

    <?php if (($_smarty_tpl->getValue('index')-$_smarty_tpl->getValue('start'))%3 == 2 || $_smarty_tpl->getValue('index') == $_smarty_tpl->getValue('end')-1 || $_smarty_tpl->getValue('index') == $_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('cars'))-1) {?>
    </div><?php }?>
  <?php }?>
  <?php $_smarty_tpl->assign('index', $_smarty_tpl->getValue('index')+1, false, NULL);?>

<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>

    

 <?php } else { ?>
 <div class="banner-item-03">
  <b class="text-content">  Non ci sono auto disponibili</b>
</div>
<?php }?>
</div>
</div>

<footer>
   <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
<?php if ($_smarty_tpl->getValue('totalPages') > 1) {?>
  
    <ul class="pages d-flex justify-content-center list-unstyled" style="gap:12px">
      <?php if ($_smarty_tpl->getValue('page') > 1) {?>
 
        <li><a href="?page=<?php echo $_smarty_tpl->getValue('page')-1;?>
"><i class="fa fa-angle-double-left"></i></a></li>
      <?php }?>
 
    
      <?php
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->getValue('totalPages')) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new \Smarty\Variable(array());
if ($__section_i_0_total !== 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
        <?php $_smarty_tpl->assign('p', ($_smarty_tpl->getValue('__smarty_section_i')['index'] ?? null)+1, false, NULL);?>
        <li <?php if ($_smarty_tpl->getValue('p') == $_smarty_tpl->getValue('page')) {?> class="active"<?php }?>>
          <a href="?page=<?php echo $_smarty_tpl->getValue('p');?>
"><?php echo $_smarty_tpl->getValue('p');?>
</a>
        </li>

      <?php
}
}
?>

      <?php if ($_smarty_tpl->getValue('page') < $_smarty_tpl->getValue('totalPages')) {?>
        
        <li><a href="?page=<?php echo $_smarty_tpl->getValue('page')+1;?>
"><i class="fa fa-angle-double-right"></i></a></li>
       
      <?php }?>
    </ul>
  
<?php }?> 
            </div>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="contact-form">
              <form action="#" id="contact">
                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up location" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return location" required="">
                          </fieldset>
                       </div>
                  </div>

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Pick-up date/time" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Return date/time" required="">
                          </fieldset>
                       </div>
                  </div>
                  <input type="text" class="form-control" placeholder="Enter full name" required="">

                  <div class="row">
                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter email address" required="">
                          </fieldset>
                       </div>

                       <div class="col-md-6">
                          <fieldset>
                            <input type="text" class="form-control" placeholder="Enter phone" required="">
                          </fieldset>
                       </div>
                  </div>
              </form>
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary">Book Now</button>
          </div>
        </div>
      </div>
    </div>




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

</html>
<?php }
}
