<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Album example · Bootstrap v5.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/home.css" rel="stylesheet" >
    <script src="assets/methods/helper.js"></script>
    <script src="modules/utilitiesjs.js"></script>
</head>

<body>
    
    <header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">A proppos de nous </h4>
              <p class="text-muted">Nous nous occupons de vos animaux . Notre mission ,  rendre la diginite  animal . 
                  Nous mettons aussi des animaux bien portants à votre disposition à la vente .
                   . </p>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Contact</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">suivez nous sur  Twitter</a></li>
                <li><a href="#" class="text-white">Suivez nous sur  Facebook</a></li>
                <li><a href="contactez-nous" class="text-white">Contactez nous maintenant</a></li>
              </ul>
              <a href="login"> Espace Administrateur </a>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">
            <div>
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
                    <strong>IGS Animalerie</strong>
                </a>
            </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
               
                
            </div>
        </div>
      </div>
    </header>
    <section id="cash-slip-block" class="p-2">
        <div class="row">
            <div class="col">
              <button class="btn text-light" id="open-betslip-btn">...</button>
            </div>
            <div class="col d-flex">
              <img src="assets/solid_svg/shopping-cart.svg" class="shopping-cart  "> <span class="shopping-cart-no text-success" id="shopping-cart-no">0</span>
            </div>
        </div>

        <div class="d-flex mt-2">
          <div class="w-75">1</div>
          <div class="w-25" id="meselection-block">
            <div class="bg-danger w-100 p-2 mb-1 d-flex justify-content-between"> <span class="">Mes selection</span> <span> <img src="assets/solid_svg/trash-alt.svg" class="trash-cash" id="trash-meselection"></span></div>
            <div class="" id="cash-card-block">

            </div>
            <div id="cash-total-block"  class="d-flex justify-content-around bg-warning mb-1 p-2">
              <p>Total: </p>
              <p id="total-cash" class=""> 0 FCFA</p>
            </div>
            <div class="btn-group">
                <button class="btn btn-sm btn-success" id="btn-valid-cash" onclick="valid_cash();"> Validez </div>
            </div>
          </div>
        </div>
    </section>

    <main>
    <?=$content ?>
    </main>
    
<script src="assets/cdn/bootstrap.min.js"></script>
<script src="assets/cdn/popper.min.js"></script>
<script src="assets/cdn/query-3.2.1.slim.min.js"></script>
</body>
</html>


