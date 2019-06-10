<?php
	include "includes/header.php";
?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" type="text/css" href="css/product.css">
<head>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>




<!-- CONTENT -->

<div class="bd-example">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
      <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/carousel.jpg" class="d-block w-100 img_carousel_index" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3> BMW AUTO & MOTO </h3>
          <p> Notre concession se charge autant des automobiles que des deux roues. Pas de favoritisme. </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carousel2.jpg" class="d-block w-100 img_carousel_index" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3> BMW X7 2019 </h3>
          <p> SUV Sportif de luxe. Une élégance marquant.
          	<br> À partir de 94,400€ TTC.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carousel1.jpg" class="d-block w-100 img_carousel_index" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3> BMW S1000RR 2019 </h3>
          <p> Le renouveau d'une hypersportive révolutionnaire. 207ch pour 197kg tous pleins faits.
          	<br> À partir de 19,200€ TTC.
          </p>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only"> Précédent </span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only"> Suivant </span>
    </a>
  </div>
</div>


</head>
<body>
<div class="container">
    <br>
    <h4>Nos Véhicules Neufs:</h4>
	<br>
	<div class="row" id="ads">
    <!-- Category Card -->
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">Bmw Serie 1</span>
                <span class="card-notify-year">2019</span>
                <img class="img-fluid" src="img/image1" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
              <p>les details de la perfections</p>
          
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                    <h5>Honda Accord LX</h5>
                </div>
                <a class="ad-btn" href="#">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">Bmw M7</span>
                <span class="card-notify-year">2018</span>
                <img class="img-fluid" src="img/image2" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
               <p>conçue pour l'émotion</p>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                </div>
                <a class="ad-btn" href="#">View</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">Bmw X7</span>
                <span class="card-notify-year">2018</span>
                <img class="img-fluid" src="img/image3" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
       <p>Une élégence marquante</p>
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                </div>
                <a class="ad-btn" href="#">View</a>
            </div>
        </div>
    </div>

</div>
</div>
<div class="container">
    <br>
    <h4>Nos Véhicules D'occasions :</h4>
	<br>
	<div class="row" id="ads">
    <!-- Category Card -->
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge">Bmw X2</span>
                <span class="card-notify-year">2018</span>
                <img class="img-fluid" src="img/image4" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
                <span class="card-detail-badge">Occasion</span>
                <span class="card-detail-badge">14,700.00 €</span>
                <span class="card-detail-badge">80 000 Kms</span>
            </div>
</body>
</html>