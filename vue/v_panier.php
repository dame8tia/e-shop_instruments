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
                <th scope="col">Photo</th>
                <th scope="col">Quantité demandée</th>
                <th scope="col">Total par instrument (HT)</th>
                <th scope="col">Retirer</th>
            </tr>
        </thead>    
        
        <tbody class="table-group-divider">
            <?php
            // variable pour stocker la somme due par instrument (prix*quantité)
            $sumPerInstr = array();
            // On affiche chaque instrument un à un
            foreach ($data as $ligne) :
            ?>
            <tr>
                <?php $id = $ligne['id_inst'] ;?>
                <th scope="row" ><?=$ligne['nom_inst'];?></th>
                <td><?= $ligne['fabricant_inst'];?></td>
                <td><?= $ligne['ref_fabricant_inst'] ?></a></td>
                <td><?= $ligne['prix_inst']?></td>
                <td><?= $ligne['nb_stock_inst']-$panier[$id]?></td>
                <td>
                    <img src="<?= $ligne['img_inst']?>" alt="image de l'instrument" width=50px height="50px">                
                </td>
                <td> 
                    <input class="InputQt" name="quantite" min=1 type="number" value="<?= $panier[$id]?>" width="15px" > <!-- readonly -->
                    <a href="index.php?action=panier&idplus=<?=$ligne['id_inst'];?>" class="plus" title="Plus"><span><i class="bi bi-plus"></i><span></a>
                    <a href="index.php?action=panier&idmoins=<?=$ligne['id_inst'];?>" class="minus" title="Minus"><span><i class="bi bi-dash"></i><span></a>                
                </td>
                <td>
                    <!-- Somme par instrument -->
                    <?= $ligne['prix_inst']*$panier[$id]?> €
                    <!-- Permet de stocker le total par instrument (Prix unitaire * quantité) -->
                    <?php array_push($sumPerInstr, $ligne['prix_inst']*$panier[$id])?>
                </td>
                <td>                
                  <a href="index.php?action=retirerInstrPanier&id=<?=$ligne['id_inst'];?>" class="delete" title="Delete"><span><i class="bi bi-trash3-fill"></i><span></a>
              </td>
            </tr>
            <?php
                endforeach ;
            ?>
            <td>
                <label for="">Total TH</label>
                <input type="text" value = "<?= array_sum($sumPerInstr)+(array_sum($sumPerInstr)*(TVA/100))?>">€ TTC
                <button>
                    <a class="btn btn-primary" href="index.php?action=validerPanier" role="button">Valider le panier</a>
                </button>  
            </td>
        </tbody>       
    </table>
    <?php else : echo "Panier vide" ; ?>
    <?php endif ?>
</div>