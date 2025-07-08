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

     <!-- Additional icon  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" /> 



 
    <script>
      const rentPerDay={$rentPerDay|@json_encode|default:'[]'};
      const salePerDay={$salePerDay|@json_encode|default:'[]'};
      
    </script>
  </head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="/DuplexDrive/directory/Smarty/js/home-chart.js"></script>


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
              <!-- Spazio riservato al login/user box -->
              <li id="user-box" class="nav-item d-flex align-items-center"></li>

              <li class="nav-item active">
                <a class="nav-link" href="/User/home">Home <span class="sr-only">(current)</span></a>
              </li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Owner/showSaleStatsForPeriod">Numero vendite</a></li>

              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Owner/showClientStats/">Clienti</a></li>


              <li class="nav-item"><a class="nav-link" href="/DuplexDrive/Owner/showRentStatsForPeriod/">Statistiche noleggi</a></li>


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

    


  
        
    <div class="services">
        <div class="container">
            <div class="row my-5">
                
   
            <!-- row -->
          
                <!--- Lista degli ordini -->
                <div class="col-12 tm-block-col my-4">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll" style="height: 500px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                        <h2 class="tm-block-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                            <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                            </svg>
                            Lista Vendite</h2>
                        <table class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">NUM. ORDINE</th>
                                    <th scope="col">NOME</th>
                                    <th scope="col">COGNOME</th>
                                    <th scope="col">MARCA AUTO</th>
                                    <th scope="col">MODELLO AUTO</th>
                                    <th scope="col">DATA ORDINE</th>
                                    <th scope="col">TOTALE</th>
                                </tr>
                            </thead>
                            <tbody>
                        

                                
                         
                                <!--- Lista auto vendita -->
                                {assign var="total" value=0}
                                {foreach from=$saleOrders item=sale}
                                    <tr>
                                        <td>{$sale->getOrderId()}</td>
                                        <td>{$sale->getUser()->getFirstName()}</td>
                                        <td>{$sale->getUser()->getLastName()}</td>
                                        <td>{$sale->getCarForSale()->getBrand()}</td>
                                        <td>{$sale->getCarForSale()->getModel()}</td>
                                        <td>{$sale->getOrderDate()->format("Y/m/d")}</td>
                                        <td>{$sale->getPrice()}</td>
                                        {assign var="total" value=$total + $sale->getPrice()}
                                    </tr>
                                {/foreach} 
                                </tbody>
                        </table> 
                    </div>
                </div>
        
            
                <div class="col-sm-12 col-md-12 my-4">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                            </svg>
                            Totale vendite:  <small>€ {$total|number_format:2:",":"."}</small></h2>
                        <canvas id="lineChart"></canvas>
                    </div>
                </div>
                <!-- Scatter chart Vendite (Data vs Prezzo) -->
                <div class="col-12 tm-block-col mb-5">
                  <div class="tm-bg-primary-dark tm-block">
                    <h2 class="tm-block-title">Vendite </h2>
                    <canvas id="salesScatterChart" class="graphic-custom"></canvas>
                  </div>
                </div>
            </div>
        </div>

            
        <div class="container">
            <div class="row ">
                <div class="col-12 tm-block-col" >    
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll" style="height: 500px; overflow-y: auto; border: 1px solid #ccc; padding: 10px;">
                        <h2 class="tm-block-title">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-card-list" viewBox="0 0 16 16">
                    <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2z"/>
                    <path d="M5 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 5 8m0-2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m0 5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-1-5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0M4 8a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0m0 2.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0"/>
                    </svg>
                    Lista ordini</h2>

                        <table class="table" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th scope="col">NUM. ORDINE</th>
                                    <th scope="col">NOME</th>
                                    <th scope="col">COGNOME</th>
                                    <th scope="col">MARCA AUTO</th>
                                    <th scope="col">MODELLO AUTO</th>
                                    <th scope="col">DATA ORDINE</th>
                                    <th scope="col">TOTALE</th>
                                </tr>
                            </thead>
                            <tbody>  
                                <!--- Lista auto noleggio-->
                                {assign var="totalRent" value=0}
                                {foreach from=$rentOrders item=rent}
                                <tr>
                                    <td>{$rent->getOrderId()}</td>
                                    <td>{$rent->getUser()->getFirstName()}</td>
                                    <td>{$rent->getUser()->getLastName()}</td>
                                    <td>{$rent->getAuto()->getBrand()}</td>
                                    <td>{$rent->getAuto()->getModel()}</td>
                                    <td>{$rent->getOrderDate()->format("Y/m/d")}</td>
                                    <td>{$rent->getTotalPrice()}</td>
                                    {assign var="totalRent" value=$totalRent + $rent->getTotalPrice()}
                                </tr>
                                {/foreach}
                            </tbody>
                        </table>
                    </div>
                </div>
  
        
                <div class="col-sm-12 col-md-12 my-4">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cash-stack" viewBox="0 0 16 16">
                            <path d="M1 3a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1zm7 8a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M0 5a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V7a2 2 0 0 1-2-2z"/>
                            </svg>
                            Totale noleggi:  <small>€ {$totalRent|number_format:2:",":"."}</small></h2>
                        <canvas id="barChart"></canvas>
                    </div>
                </div>
                                <!-- Scatter chart Vendite (Data vs Prezzo) -->
                <div class="col-12 tm-block-col my-4">
                  <div class="tm-bg-primary-dark tm-block">
                    <h2 class="tm-block-title">Noleggi </h2>
                    <canvas id="rentScatterChart" class="graphic-custom"></canvas>
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
              <i class="fa-solid fa-phone mr-2"></i><h4> +39 123 456 789</h4> 
                

            </div>
          </div>
        </div>
      </div>
    </footer>





    <!-- Chart.js scatter chart for Vendite (Data vs Prezzo) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-moment@1.0.0"></script>
    
   

    <!-- Bootstrap core JavaScript -->
    <script src="/DuplexDrive/directory/Smarty/vendor/jquery/jquery.min.js"></script>
    <script src="/DuplexDrive/directory/Smarty/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="/DuplexDrive/directory/Smarty/assets/js/custom.js"></script>
    <script src="/DuplexDrive/directory/Smarty/assets/js/owl.js"></script>
     
</body>
</html>