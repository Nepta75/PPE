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
          <p> Notre concession BMW & BMW Motorrad s'occupe aussi bien des automobiles que des deux roues. Pas de favoritisme. </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= IMG."carousel1.jpg"?>" class="d-block w-100 img_carousel_index" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h3> BMW R NINE T SCRAMBLER </h3>
          <p> Le scrambler vintage remis au goût du jour.
          	<br> À partir de 16,050€ TTC.
          </p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="<?= IMG."carousel2.jpg"?>" class="d-block w-100 img_carousel_index" alt="...">
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


<div class="home-last-vehicule">
  <h4>Nos derniers ajout de vehicule neuf :</h4>
  <div class="home-last-vehicule__sub">
    <?php
      foreach($vehiculesNeufs as $data) { ?>
        <div class="vehicule-block">
            <a href="fiche-vehicule?immat=<?=$data['immatriculation'] ?>">
                <img src="<?= IMG.$data['img_1'] ?>" alt='img_vehicule' />
                <div><label>Marque :</label><span><?= $data['marque'] ?></span></div>
                <div><label>Type :</label><span><?= $data['type_vehicule'] ?></span></div>
                <div class="vehicule_prix"><label class="prix_label">Prix :</label><span class="prix_span"><?= $data['prix'] ?>€</span></div>
            </a>
            <div class="reserver"><a href="essayer?&immat=<?= $data['immatriculation']?>">Essayer</a></div>
        </div>
    <?php }?>
  </div>
</div>


