<?php $this->titre = "My e-shop"; ?>
  
<div class="text-center">
  <h3><?=$instrument['nom_inst']?></h3>
</div>


<div class="container d-flex flex-row ind rounded my-5 px-3 py-3">

  <div class="row align-items-center justify-content-center">

    <div class="col-12 col-sm-6 col-lg-4 ind--entete">
      <?php if ($instrument['id_cat']==2): ?>
        <img src=<?=$instrument['img_inst']?> alt="photo instrument de musique" width="200px" height="200px">
      <?php else: ?>
        <img src=<?=$instrument['img_inst']?> alt="photo instrument de musique" width="150px" height="450px">
      <?php endif ?>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 ind--body">
      <p><u>Fabricant</u> : <?=$instrument['fabricant_inst']?></p>
      <p><u>Référence Fab.</u> : <?=$instrument['ref_fabricant_inst']?></p>
      <hr/>
      <u>Description</u>
      <br>
      <?php $descriptions=explode(',',$instrument['descript_inst'])?>
      <?php foreach ($descriptions as $description): ?>
        <ul>
          <li><?= $description;?></li>
        </ul>      
      <?php endforeach;?>
    </div>

    <div class="col-12 col-sm-6 col-lg-4 ind--footer">
      <button type="button" class="text-center btn btn-secondary">
        <a class="text-light" href=<?= "index.php?action=panier&id=".$instrument['id_inst']?> >Ajouter au panier</a>
      </button>     
    </div>

  </div>

</div>

