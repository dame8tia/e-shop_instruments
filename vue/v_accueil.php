<?php $this->titre = "My e-shop"; ?>

<div class="container border_red my-5">
  <div class="row justify-content-between">
    <?php foreach ($instruments as $instrument): ?>

      <div class="col-12 col-sm-6 col-lg-4 mb-3">

        <div class="card card_container mx-auto shadow-lg p-3 mb-5 bg-grey">

          <div class="card--title text-center">
            <a class="text-decoration-none" href="<?= "index.php?action=instrument&id=" . $instrument['id_inst'] ?>">
              <h3 class="nomInstrument"><?= $instrument['nom_inst'] ?></h3>
            </a>
          </div>

          <div class="card--entete text-center">
            <?php if ($instrument['id_cat']==2): ?>
              <img src=<?=$instrument['img_inst']?> alt="photo instrument de musique" width="50%" height="100%">
            <?php else: ?>
              <img src=<?=$instrument['img_inst']?> alt="photo instrument de musique" width="30%" height="100%">
            <?php endif ?>
          </div>

          <div class="card--body mt-3">
            <div class="row">
              <div class="col">
                <p><?= $instrument['fabricant_inst'] ?></p>
                <p><?= $instrument['ref_fabricant_inst'] ?></p>
              </div>
              <div class="col">
                <p class="card-text">Tarif HT : <?= $instrument['prix_inst'] ?>€</p>
              </div>              
            </div>
          </div>

          <div class="card--footer">
            <a href="<?= "index.php?action=instrument&id=". $instrument['id_inst'] ?>" class="btn btn-primary">Voir</a>
          </div>

        </div>
      </div>

    <?php endforeach; ?>
  </div>
</div>

