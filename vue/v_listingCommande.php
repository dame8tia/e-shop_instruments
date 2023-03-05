<?php $this->titre = "My e-shop"; ?>

<div class="container">
  <h1 >Gestion des commandes</h1>
  
<!--   <div>
    <div class="row">
      <div class="col">
        <a class="btn btn-primary" href="view/form_create.php" role="button">Ajouter un instrument</a>
      </div>
      <div class="col">
      <a class="btn btn-primary" href="index.php?action=seDeconnecter" role="button">Se déconnecter</a>
      </div>
    </div>
  </div> -->
  
  <table id="tab_favorite" class="table table-responsive table-striped overflow-auto table-hover table-bordered border-primary-subtle mt-5">
  <caption style="caption-side:bottom">Liste des commandes </caption>
      <thead>
          <tr>
              <th scope="col">Numéro de commande</th>
              <th scope="col">Date</th>
              <th scope="col">Statut</th>
              <th scope="col">Montant €</th>
              <th scope="col">Client</th>
          </tr>
      </thead>    
      
      <tbody class="table-group-divider">
          <?php
          // On affiche chaque recette une à une
          foreach ($commandes as $commande) :
          ?>
          <tr>
              <th scope="row" ><?=$commande['id_cde'];?></th>
              <td><?= $commande['date_cde'];?></td>
              <td><?= $commande['statut_cde'];?></td>
              <td><?= $commande['montant'] ?></a></td>
              <td><?= $commande['nom_clt']?></td>

              <td>
                  <!-- Création des deux icones, dans une balise HTML <a> -->
                  <a href="index.php?action=suppCde&idCde=<?= $commande['id_cde']?>" class="edit" title="Edit"><span><i class="bi bi-pencil-square"></i><span></a>
                  <!-- Bouton delete : En JS function (id_à_su^pirmer) ouverture d'un message de confirmation ; si oui lancement du script delete.php -->
                  <a href="index.php?action=updateCde&idCde=<?= $commande['id_cde']?>" class="delete" title="Delete" ><span><i class="bi bi-trash3-fill"></i><span></a>
              </td>
          </tr>
          <?php
            endforeach;
          ?>
      </tbody>       
  </table>
</div>



