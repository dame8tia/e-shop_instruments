<?php $this->titre = "My e-shop"; ?>

<div class="container">
  <h1 >Gestion des instruments de musique</h1>
  
  <div>
    <div class="row">
      <div class="col">
        <!-- Bouton Ajouter un favori : Lance un formulaire php : form_create.php -->
        <a class="btn btn-primary" href="view/form_create.php" role="button">Ajouter un instrument</a>
      </div>
      <div class="col">
      <a class="btn btn-primary" href="index.php?action=seDeconnecter" role="button">Se déconnecter</a>
      </div>
    </div>

  </div>
  
  <table id="tab_favorite" class="table table-responsive table-striped overflow-auto table-hover table-bordered border-primary-subtle mt-5">
  <caption style="caption-side:bottom">Liste des instruments présents dans la bdd </caption>
      <thead>
          <tr>
              <th scope="col">Nom</th>
              <th scope="col">Catégorie</th>
              <th scope="col">Fabricant</th>
              <th scope="col">Réf Fabricant</th>
              <th scope="col">Description</th>
              <th scope="col">Prix(€)</th>
              <th scope="col">Nb_en_stock</th>
              <th scope="col">Chemin photo</th>
              <th scope="col">Actions</th>
          </tr>
      </thead>    
      
      <tbody class="table-group-divider">
          <?php
          // On affiche chaque recette une à une
          foreach ($instruments as $instrument) :
          ?>
          <tr>
              <th scope="row" ><?=$instrument['nom_inst'];?></th>
              <td><?= $instrument['type_cat'];?></td>
              <td><?= $instrument['fabricant_inst'];?></td>
              <td><?= $instrument['ref_fabricant_inst'] ?></a></td>
              <?php $descriptions=explode(',',$instrument['descript_inst'])?>
              <td>
                <?php foreach ($descriptions as $description): ?>
                  <ul>
                    <li><?= $description;?></li>
                  </ul>      
                <?php endforeach;?>
              </td>
              <td><?= $instrument['prix_inst']?></td>
              <td><?= $instrument['nb_stock_inst']?></td>
              <td><?= $instrument['img_inst']?></td>
              <td>
                  <!-- Création des deux icones, dans une balise HTML <a> -->
                  <a href="view/form_edit.php?id=<?= $instrument['id_inst']?>" class="edit" title="Edit"><span><i class="bi bi-pencil-square"></i><span></a>
                  <!-- Bouton delete : En JS function (id_à_su^pirmer) ouverture d'un message de confirmation ; si oui lancement du script delete.php -->
                  <a href="#" class="delete" title="Delete" onclick ="confirmDelete(<?= $instrument['id_inst']?>)"><span><i class="bi bi-trash3-fill"></i><span></a>
              </td>
          </tr>
          <?php
            endforeach;
          ?>
      </tbody>       
  </table>
</div>



