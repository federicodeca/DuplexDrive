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
    <link rel="stylesheet" href="/DuplexDrive/directory/Smarty/assets/css/calendar-custom.css">
      <!-- Additional icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> 
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    
   

      <script>
    const indisp = {$indisp|json_encode|raw};
    const surcharges = {$surcharges|json_encode|raw};
    const basePrice={$basePrice|default:50};
    </script>
   

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
                    <a class="nav-link" href="/DuplexDrive/User/home">Home
                      <span class="sr-only">(current)</span>
                    </a>
                </li> 

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/User/carSearcher/">Acquista</a></li>

              <li class="nav-item"><a class="nav-link active" href="/DuplexDrive/User/showCarsForRent/">Noleggia</a></li>

                

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

    <!-- Page Content -->
    <div class="page-heading about-heading header-text" style="background-image: url(/DuplexDrive/directory/Smarty/assets/images/heading-6-1920x500.jpg);">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-content">
             
              <h2>{$car->getBrand()} {$car->getModel()}</h2>
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
              <h2>Prenota ora </h2>
            </div>
          </div>
          <div class="col-md-8">
            <div class="contact-form">
              
              <form id="contact-form" action="/DuplexDrive/User/loginAndCreditRequirement" method="post">
                <input type="hidden" id="idAuto" name="idAuto" value="{$car->getIdAuto()}">

                <i class="fa-solid fa-calendar-days mr-2"></i>
                <input type="text"  id="date-range" name="dateRange" class="form-control w-50" placeholder="Seleziona intervallo date" style="length: 20px" />
                <input type="hidden" id="startDate" name="startDate" />
                <input type="hidden" id="endDate" name="endDate" />
               

                <div class="col-lg-12">
                    <fieldset>
                      
                      <div>Prezzo totale: <span id="totalPriceDisplay">0</span> €</div>
                      <br>
                      <p>Per procedere al noleggio è necessario effettuare il login<br> o registrarsi se non si è ancora iscritti.</p>
                      
                    </fieldset>
                  </div>

                <div class="col-lg-12" style= "margin-top: 20px">
                    <fieldset>
                    {if $permission=='admin'|| $permission=='owner'}
                      {else}
                      <button type="submit" id="form-submit"  class="filled-button">Submit</button>
                      {/if}
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
                  <li><a href="#"><i class="fa-brands fa-behance"></i></a></li>
                </ul>
              </div>
            </div>
        </div>
      </div>
    </div>

    <div style="margin-top:100px"></div>
  
   


      
    
    

    <div class="products">
      <div class="container" >
        <div class="row">
            <div class="col-md-12">
              <div class="section-heading">
                <h2>Informazioni</h2>
              </div>
            </div>

            <div class="col-md-8">
                <h5><i class="fa-solid fa-car mr-2"></i>Marca: {$car->getBrand()}</h5>

                <br>

                <h5><i class="fa-solid fa-gear mr-2"></i> Modello: {$car->getModel()}</h5>

                <br>

                <h5><i class="fa-solid fa-bolt-lightning mr-2"></i>Cavalli: {$car->getHorsePower()}</h5>

                <br>

                  <h5 ><i class="fa-solid fa-fire mr-2"></i>Cilindrata: {$car->getDisplacement()}</h5>
                
                <br>

                <h5><i class="fa-solid fa-user mr-2"></i>Numero Posti: {$car->getSeats()}</h5>

                <br>
                
                <h5><i class="fas fa-gas-pump mr-2"></i>Alimentazione: {$car->getFuelType()}</h5>
            </div>

            <div class="col-md-4">
              <div class="left-content">
                <h5>Regole di contratto</h5>

                <br>
                
                <p>Noleggiando un nostro veicolo si acconsente al trattamento dei propri dati </p>
                
                <p>Si ricorda che per procedere con il noleggio di un veicolo si necessita la verifica di possesso di patente europea valida. Procedi al login per inserire il tuo documento. Leggere attentatmente le condizoni di noleggio, in caso di mancato rispetto delle regole verrà trattenuta una mora in percentuale variabile</p>
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

              <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  {foreach from=$car->getPhoto() item=photo name=carosello}
                    <div class="carousel-item {if $smarty.foreach.carosello.first}active{/if}">
                      <img    src="data:{$photo->getType()};base64,{$photo->getEncodedData()}" class="d-block w-100 image-carousel-custom" alt="Immagine {$smarty.foreach.carosello.iteration}">
                    </div>
                  {/foreach}
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
              <form action="RentalTopGear/User/loginAndCreditRequirement" id="modal-contact">
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
    <script src="/DuplexDrive/directory/Smarty/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="/DuplexDrive/directory/Smarty/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    
   

    <!-- Additional Scripts -->
    <script src="/DuplexDrive/directory/Smarty/assets/js/custom.js"></script>
    <script src="/DuplexDrive/directory/Smarty/assets/js/owl.js"></script>
    <script src="/DuplexDrive/directory/Smarty/js/calendar.js"></script>
 


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
