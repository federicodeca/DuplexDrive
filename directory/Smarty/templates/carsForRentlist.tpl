<!DOCTYPE html>
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
          <a class="navbar-brand"   href="/DuplexDrive/User/home"><h2>Duplex <em>Drive</em></h2></a>
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

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Sale/carSearcher/">Acquista</a></li>

              <li class="nav-item"><a class="nav-link active" href="/DuplexDrive/Rent/showCarsForRent/">Noleggia</a></li>

                <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/showAboutUs/">About Us</a></li>
                
              {if $isLogged}

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMore" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      benvenuto {$username} <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMore">
                      {if $permission ==='admin'} <a class="dropdown-item" href="/DuplexDrive/Admin/home">admin</a> {/if}
                      {if $permission === 'user'} 
                        <a class="dropdown-item" href="/DuplexDrive/User/insertLicense">Patente</a>
                        <a class="dropdown-item" href="/DuplexDrive/User/insertReview">Recensione</a>
                        <a class="dropdown-item" href="/DuplexDrive/User/ordersHistory">Ordini</a>                        
                        <a class="dropdown-item" href="/DuplexDrive/User/showProfile">Profilo</a>
                      {/if}
                      {if $permission === 'owner'}
                        <a class="dropdown-item" href="/DuplexDrive/Owner/home">Resoconto Azienda</a>
                      {/if}
                      <a class="dropdown-item" href="/DuplexDrive/User/logout">Esci</a>
                    </div>
                  </li>
  


              {else}
                  <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="" id="loginDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Login
                          </a>
                          <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="loginDropdown" style="min-width: 250px;">
                            <form method="post" action="/DuplexDrive/User/checkLoginAuto">
                              <input type="text" name="username" placeholder="Username" class="form-control mb-2" required>
                              <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
                              <input type="hidden" name="actualMethod" value="{$smarty.server.REQUEST_URI|escape}">
                              <button type="submit" class="btn btn-primary btn-block">Accedi</button>
                             
                            </form>

                              <button type="button" onclick='window.location.href="/DuplexDrive/User/showRegistrationForm"' class="btn btn-secondary btn-block mt-2">Registrati</button>
                              <div id="login-message" class="text-danger mt-2"></div>
                          
                          </div>
                        </li>
              {/if}     
            
                  

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
      {assign var="perPage" value=6}                       <!-- Number of cars per page -->
      {assign var="page" value=$smarty.get.page|default:1} <!-- Current page, default to 1 if not set reda page=x smarty variable-->
      {assign var="start" value=($page - 1) * $perPage}     <!-- Calculate the starting index for the current page -->
      {assign var="end" value=$start + $perPage}
      {math assign="totalPages" equation="ceil(x / y)" x=$cars|@count y=$perPage}  <!-- Calculate total pages based on the number of cars and perPage -->
      {assign var="index" value=0}  
          <div class="products">
            <div class="container">

      {if $cars|@count > 0}
   
        <!-- mostra auto -->
    

{foreach from=$cars item=car}
  {if $index >= $start && $index < $end}
    {if ($index - $start) % 3 == 0}
      <div class="row">
    {/if}


    <div class="col-md-4"> <!--row in 12,every column start on 4 from 12-->
    <a href='/DuplexDrive/Rent/selectCarForRent/{$car->getIdAuto()}'>
      <div class="product-item" >
        {if $car->getIcon() && $car->getIcon()->getEncodedData()}
       <img class="product-item-icon" src="data:{$car->getIcon()->getType()};base64,{$car->getIcon()->getEncodedData()}" loading="lazy" alt="Img">
        {else}
        <img class="product-item-icon" src="/DuplexDrive/directory/Smarty/assets/images/product-1-370x270.jpg" loading="lazy" alt="Img">
        {/if}
        <div class="down-content">
          <h4>{$car->getBrand()} {$car->getModel()}</h4>
          <h6><small>from</small> {$car->getBasePrice()}€ <small>per day </small></h6>
          <p>{$car->getDescription()}</p>
        </div>
        </a>
      </div>
    </div>

    {if ($index - $start) % 3 == 2 || $index == $end - 1 || $index == $cars|@count - 1}
    </div>{/if}
  {/if}
  {assign var="index" value=$index+1}

{/foreach}

    

 {else}
 <div class="banner-item-03">
  <b class="text-content">  Non ci sono auto disponibili</b>
</div>
{/if}
</div>
</div>

<footer>
   <div class="container align-items-center">
        <div class="row">
          <div class="col-md-12">
            <div class="inner-content">
{if $totalPages > 1}
  
    <ul class="pages d-flex justify-content-center list-unstyled" style="gap:12px">
      {if $page > 1}
 
        <li><a href="?page={$page-1}"><i class="fa fa-angle-double-left"></i></a></li>
      {/if}
 
    
      {section name=i loop=$totalPages}
        {assign var="p" value=$smarty.section.i.index+1}
        <li {if $p == $page} class="active"{/if}>
          <a href="?page={$p}">{$p}</a>
        </li>

      {/section}

      {if $page < $totalPages}
        
        <li><a href="?page={$page+1}"><i class="fa fa-angle-double-right"></i></a></li>
       
      {/if}
    </ul>
  
{/if} 
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
    <script   src="/DuplexDrive/directory/Smarty/vendor/jquery/jquery.min.js"></script>
    <script src= "/DuplexDrive/directory/Smarty/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="/DuplexDrive/directory/Smarty/assets/js/custom.js"></script>
    <script src="/DuplexDrive/directory/Smarty/assets/js/owl.js"></script>
    <script src="/DuplexDrive/directory/Smarty/js/login-box.js"></script>
    <!-- Popper.js (necessario per Bootstrap dropdown) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2/dist/umd/popper.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
