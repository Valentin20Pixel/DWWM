<?php
include "header.php";
echo validation_errors();
echo form_open_multipart();
?>

<body>
   <div>
      <fieldset>
         <div class="form-group container-fluid row">
            <div class="form-group col-auto">
               <img src="<?php echo base_url("assets/img/$produit->pro_id.$produit->pro_photo") ?>" alt="" id="pro_photo" class="" width="300">
            </div>
            <div class="form-group col">
               <div class="form-group">
                  <label for="ID">ID</label>
                  <input type="text" name="ID" class="form-control" id="ID" value="<?php echo $produit->pro_id; ?>" readonly>
               </div>
               <div class="form-group">
                  <label for="reference">Référence</label>
                  <input type="text" name="reference" class="form-control" id="reference" value="<?php echo set_value('pro_ref', $produit->pro_ref); ?>" readonly>
               </div>
               <div class="form-group">
                  <label for="categorie">Catégorie</label>
                  <input type="text" name="categorie" class="form-control" id="categorie" value="<?php echo set_value('pro_cat_id', $produit->pro_cat_id); ?>" readonly>
               </div>
               <div class="form-group">
                  <label for="libelle">Libellé</label>
                  <input type="text" name="libelle" class="form-control" id="libelle" value="<?php echo set_value('pro_libelle', $produit->pro_libelle); ?>" readonly>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="description" readonly><?php echo set_value('pro_description', $produit->pro_description); ?></textarea>
         </div>
         <div class="form-group">
            <label for="prix">Prix</label>
            <input type="text" name="prix" class="form-control" id="prix" value="<?php echo set_value('pro_prix', $produit->pro_prix); ?>" readonly>
         </div>
         <div class="form-group">
            <label for="stock">Stock</label>
            <input type="text" name="stock" class="form-control" id="stock" value="<?php echo set_value('pro_stock', $produit->pro_stock); ?>" readonly>
         </div>
         <div class="form-group">
            <label for="couleur">Couleur</label>
            <input type="text" name="couleur" class="form-control" id="couleur" value="<?php echo set_value('pro_couleur', $produit->pro_couleur); ?>" readonly>
         </div>
         <div class="form">
            <label class="col-form-label" for="bloque">Produit bloqué:</label>
            <div class="custom-control custom-radio custom-control-inline">
               <input class="custom-control-input" type="radio" name="bloque" id="oui" value="oui" <?php if ((set_value('pro_bloque')) == 1) echo 'checked'; ?> disabled>
               <label class="custom-control-label" for="oui">Oui</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
               <input class="custom-control-input" type="radio" name="bloque" id="non" value="non" <?php if ((set_value('pro_bloque')) == 0) echo 'checked'; ?> disabled>
               <label class="custom-control-label" for="non">Non</label>
            </div>
         </div>
         <div class="form-group">
            <label for="ajout">Date d'ajout : </label>
            <p><?php echo set_value('pro_d_ajout', $produit->pro_d_ajout); ?></p>
            <label for="modif">Date de modification : </label>
            <p><?php echo set_value('pro_d_modif', $produit->pro_d_modif); ?></p>
         </div>
         </form>
         <?php echo form_open("panier/ajouter"); ?>

         <!-- champ visible pour indiquer la quantité à commander -->
         <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
         <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $produit->pro_prix ?>">
         <input type="hidden" name="pro_id" id="pro_id" value="<?= $produit->pro_id ?>">
         <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $produit->pro_libelle ?>">

         <!-- Bouton 'Ajouter au panier' -->
         <div class="form-group">
            <input type="submit" value="Ajouter au panier" class="btn btn-default btn-sm">
         </div>
         </form>
         <!-- j'ai inserer 2 boutons pour la modif et la suppression -->
         <a href="<?= site_url("produits/liste"); ?>" class="btn btn-success"> Retour aux produits</a>
         <?php if ($this->session->role == "admin") { ?>
            <a href="<?= site_url("produits/supprimer/" . $produit->pro_id); ?>" class="btn btn-danger">Supprimer</a>
            <a href="<?= site_url("produits/modifier/" . $produit->pro_id); ?>" class="btn btn-warning">Modifier</a>
         <?php } ?>
      </fieldset>

   </div>
</body>
<?php include "footer.php"; ?>