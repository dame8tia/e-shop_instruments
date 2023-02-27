<div class="row">
    <div class="col">
        <button>
            <a href="index.php?action=clearPanier">Vider le panier</a>
        </button>
        <button>
            <a class="btn btn-primary" href="index.php" role="button">Revenir à l'accueil</a>
        </button>        
    </div>
</div>

<?php //echo "<pre>" ; ?>
<?php //var_dump($data) ; ?>
<?php //echo "</pre>" ; ?>

<?php $this->titre = "My e-shop"; ?>



<div class="container">
    <h1 >Mon panier</h1> 

    <?php if (!empty($panier)): ?>

    <table id="tab_favorite" class="table table-responsive table-striped overflow-auto table-hover table-bordered border-primary-subtle mt-5">
    <caption style="caption-side:bottom">Liste des instruments du panier </caption>
        <thead>
            <tr>
                <th scope="col">Nom</th>
                <th scope="col">Fabricant</th>
                <th scope="col">Réf Fabricant</th>
                <th scope="col">Prix(€)</th>
                <th scope="col">Nb_en_stock</th>
                <th scope="col">Chemin photo</th>
                <th scope="col">Quantité demandée</th>
                <th scope="col">Retirer</th>
            </tr>
        </thead>    
        
        <tbody class="table-group-divider">
            <?php
            // On affiche chaque recette une à une
            foreach ($data as $ligne) :
            ?>
            <tr>
                <?php $id = $ligne['id_inst'] ;?>
                <th scope="row" ><?=$ligne['nom_inst'];?></th>
                <td><?= $ligne['fabricant_inst'];?></td>
                <td><?= $ligne['ref_fabricant_inst'] ?></a></td>
                <td><?= $ligne['prix_inst']?></td>
                <td><?= $ligne['nb_stock_inst']?></td>
                <td>
                    <img src="<?= $ligne['img_inst']?>" alt="image de l'instrument" width=50px height="50px">                
                </td>
                <td>
                    <input type="number" value="<?= $panier[$id]?>">
                </td>
                <td>
                  <a href="index.php?action=retirerInstr" class="delete" title="Delete"><span><i class="bi bi-trash3-fill"></i><span></a>
              </td>
            </tr>
            <?php
                endforeach ;
            ?>
        </tbody>       
    </table>
    <?php else : echo "Panier vide" ; ?>
    <?php endif ?>
</div>