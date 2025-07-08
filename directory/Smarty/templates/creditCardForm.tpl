<!DOCTYPE html>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> 


    <script src="/DuplexDrive/directory/Smarty/js/payment-method.js"></script>


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

                <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/carSearcher/">Acquista</a></li>

                <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/showCarsForRent/">Noleggia</a></li>

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
                        <a class="dropdown-item" href="/DuplexDrive/User/showProfile">Profilo</a>
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

    <!-- Page Content -->

      <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
    <div class="progress-bar" style="width: 50%"></div>
  </div>

  

  
  <div class="services" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/other-image-fullscren-1-1920x900.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-6 mb-5">
          <div class="custom-license-card">
          <div class="card-header"><h5 style="color:white">Riepilogo</h5></div>
              <div class="card-body">
                <h7  style="color:white"> Dal: {$start}</h7><br>
                <h7  style="color:white"> Al:   {$end}</h7><br>
                <h7  style="color:white"> Prezzo totale: {$amount}</h7>
                
              </div>
          </div>

          <div class="custom-license-card mt-4">
            
          <div class="card-header">
            <h5 style="color:white"> le tue carte </h5>
          </div>

            <form class="needs-validation"  method="post" action="/DuplexDrive/User/showOverview">
                  
            <div class="card-body">        
              <div class="form-group ">
                <label style="color:white" for="card-select">Seleziona una carta salvata (opzionale)</label>
                  <select class="form-control" name="cardNumber" id="card-select" onchange="toggleManualFields(this)"
                    {if !$cards || $cards|count == 0}disabled{/if}>
                    <option value="">-- <p style="color:white">Seleziona una carta</p> --</option>
                      {foreach from=$cards item=card}
                        <option value="{$card}">
                          Carta: **** **** **** {$card|substr:-4}
                    </option>
                    {/foreach}
                  </select>
              </div>


              <hr class="md-6 mb-3">
              <button class="btn btn-primary btn-lg btn-block" id="selected-button" type="submit">Continue to checkout</button>
           </div>
            </form>        
        </div>
        </div>

         
          <div class="col-md-6 ">
           <div class="custom-license-card">
              <h5  style="color:white" class="card-header">Pagamento</h5>
                <form class="needs-validation"  method="post" action="/DuplexDrive/User/showOverview">
                  
            <div class="card-body ">
            <div class="d-block  pl-0 pr-0">
              <div class="custom-control custom-radio" >
                <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                <label class="custom-control-label" for="credit"  style="color:white" >Credit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="debit"  style="color:white" >Debit card</label>
              </div>
              <div class="custom-control custom-radio">
                <input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required="">
                <label class="custom-control-label" for="paypal"  style="color:white" >Paypal</label>
              </div>
            </div>
            <div id="credit-fields">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="cc-name" style="margin-top: 10px">Name on card</label>
                <input type="text" class="form-control" id="cc-name" placeholder="" required="" name="cardName">
                <small class="text-muted">Full name as displayed on card</small>
                <div class="invalid-feedback">
                Name on card is required
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="cc-number" style="margin-top: 10px">Credit card number</label>
                <input type="text" class="form-control" id="cc-number" name="cardNumber" placeholder="" pattern="[0-9]&#123;13,16&#125;">
                <div class="invalid-feedback">
                Credit card number is required
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3 mb-3">
                <label for="cc-expiration"  style="color:white" >Expiration</label>
                <input type="text" class="form-control" id="cc-expiration" name="cardExpiry" placeholder="MM/YY" required="" pattern="(0[1-9]|1[0-2])/[0-9]&#123;2&#125;" title="Formato MM/YY">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="cc-expiration">CVV</label>
                <input type="text" class="form-control" id="cc-cvv" name="cardCVV" placeholder="123" required="" pattern="[0-9]&#123;3,4&#125;" >
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>
            </div>
            <div id="paypal-fields" style="display: none;">
              <div class="row">
                <div class="col-md-6 mb-3">
                  <label for="paypal-email">PayPal Email</label>
                  <input type="email" class="form-control" id="paypal-email" name="paypal-email" placeholder="email@paypal.com">
                </div>
                <div class="col-md-6 mb-3">
                  <label for="paypal-password">PayPal Password</label>
                  <input type="password" class="form-control" id="paypal-password" name="paypal-password" placeholder="••••••••">
                </div>
              </div>
            </div>
            <hr class="mb-4">
            <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
           
          </form>
        </div> <!-- chiusura col-md-6 per il form -->
      </div> <!-- chiusura row -->
    </div> <!-- chiusura container -->
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
    <script src="/DuplexDrive/directory/Smarty/vendor/jquery/jquery.min.js"></script>
    <script src="/DuplexDrive/directory/Smarty/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="/DuplexDrive/directory/Smarty/assets/js/custom.js"></script>
    <script src="/DuplexDrive/directory/Smarty/assets/js/owl.js"></script>

    

  </body>


</html>
