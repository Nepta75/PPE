<?php
  include "includes/header.php";
  require "controleur/controleur.php";
  $unControleur = new Controleur ("localhost","bmwppe","root","");
  $vehiculeOccasion = $unControleur->selecttreeVehiculesOccasion();
  $vehiculeNeuf = $unControleur->selecttreeVehiculesNeuf();
  
?>

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
          <p> Notre concession BMW & BMW Motorrad s'occupe autant des automobiles que des deux roues. Pas de favoritisme. </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carousel1.jpg" class="d-block w-100 img_carousel_index" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3> BMW R NINE T SCRAMBLER </h3>
          <p> Le scrambler vintage remis au goût du jour.
          	<br> À partir de 16,050€ TTC.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="img/carousel2.jpg" class="d-block w-100 img_carousel_index" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3> BMW X7 2019 </h3>
          <p> SUV Sportif de luxe. Une élégance marquante.
            <br> À partir de 94,400€ TTC.
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


<div class="container">
    <br>
    <h4>Nos derniers ajout de vehicule neuf:</h4>
  <br>  
  
	<div class="row" id="ads"> 
    <?php if ($vehiculeNeuf->fetchAll() != null) {

    
    while ($data = $vehiculeNeuf->fetch ()) {  

        ?>
    <!-- Category Card -->
 
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge"><?= $data['modele']; ?></span>
                <span class="card-notify-year"><?= $data['millesime']; ?></span>
                <img class="img-fluid" src="<?= $data['img']; ?>" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
              <
          
            </div>
            <div class="card-body text-center">
                <div class="ad-title m-auto">
                </div>
                <a class="ad-btn" href="#">View</a>
           </div> 
        </div> 
    </div>  
    
<?php   }}else{
  echo "nous n'avons pas de véhicules neuf ";
 }  ?>
</div>
</div>
<div class="container">
    <br>
    <h4>Nos derniers ajout de véhicule d'occasion :</h4>
	<br>
	<div class="row" id="ads">
    
  <?php 
  $resultat = $vehiculeOccasion;
   if ($resultat != null) {

    foreach ($resultat as $resultat) {  
     
      ?>
      
 
    <!-- Category Card -->
    
    <div class="col-md-4">
        <div class="card rounded">
            <div class="card-image">
                <span class="card-notify-badge"><?= $resultat['modele']; ?></span>
                <span class="card-notify-year"><?= $resultat['millesime']; ?></span>
                <img class="img-fluid" src="<?= $resultat['img'] ?>" alt="Alternate Text" />
            </div>
            <div class="card-image-overlay m-auto">
                <span class="card-detail-badge">Occasion</span>
                <span class="card-detail-badge"><?= $resultat['prix']; ?>€</span>
                <span class="card-detail-badge"><?= $resultat['kilometrage']; ?>KM</span>
             </div>
        </div>
    </div>
    <?php }}else{
  echo "nous n'avons pas de véhicules d'occasion ";
 }  ?>
</div>
</div>
<?php
  include "includes/footer.php";
?>


