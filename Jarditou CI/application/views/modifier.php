<?php
include "header.php";
echo validation_errors();
echo form_open_multipart();
?>

<body>
    <div class="container-fluid">

        <div class="form-group">
            <label for="pro_photo">Téléchargement</label>
            <input type="file" name="pro_photo" id="pro_photo">
            <?php echo form_error('errors'); ?>
            <?php echo form_error('pro_photo'); ?>
        </div>

        <div class="form-group">
            <label>ID</label>
            <input type="text" name="pro_id" id="pro_id" class="form-control" value="<?php echo $produit->pro_id; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="pro_ref">Référence</label>
            <input type="text" name="pro_ref" id="pro_ref" class="form-control" value="<?php echo set_value('pro_ref', $produit->pro_ref); ?>">
            <?php echo form_error('pro_ref'); ?>

        </div>

        <div class="form-group">
            <label for="pro_cat_id">Catégorie</label>
            <select class="custom-select" name="pro_cat_id" id="selectcat">
                <option selected value="">Catégorie</option>
                <?php foreach ($categories as $categorie) { ?>
                    <option value="<?php echo set_value('pro_cat_id', $categorie->cat_id); ?>" <?= ($produit->pro_cat_id == $categorie->cat_id) ? 'selected' : '' ?>> <?= $categorie->cat_id . '.' . $categorie->cat_nom ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="pro_libelle">Libellé</label>
            <input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo set_value('pro_libelle', $produit->pro_libelle); ?>">
            <?php echo form_error('pro_libelle'); ?>
        </div>

        <div class="form-group">
            <label for="pro_description">Description</label>
            <textarea name="pro_description" class="form-control" id="pro_description"><?php echo set_value('pro_description', $produit->pro_description); ?></textarea>
            <?php echo form_error('pro_description'); ?>
        </div>
        <div class="form-group">
            <label for="pro_prix">Prix</label>
            <input type="text" name="pro_prix" class="form-control" id="pro_prix" value="<?php echo set_value('pro_prix', $produit->pro_prix); ?>">
            <?php echo form_error('pro_prix'); ?>
        </div>

        <div class="form-group">
            <label for="pro_stock">Stock</label>
            <input type="text" name="pro_stock" class="form-control" id="pro_stock" value="<?php echo set_value('pro_stock', $produit->pro_stock); ?>">
            <?php echo form_error('pro_stock'); ?>
        </div>

        <div class="form-group">
            <label for="pro_couleur">Couleur</label>
            <input type="text" name="pro_couleur" class="form-control" id="pro_couleur" value="<?php echo set_value('pro_couleur', $produit->pro_couleur); ?>">
            <?php echo form_error('couleur'); ?>
        </div>

        <p>Produit bloqué:</p>

        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="pro_bloque" id="bloque" value="1" <?php if ((set_value('pro_bloque')) == 1) echo 'checked'; ?>>
            <label class="custom-control-label" for="bloque">Oui</label>
        </div>

        <div class="custom-control custom-radio custom-control-inline">
            <input class="custom-control-input" type="radio" name="pro_bloque" id="bloque" value="0" <?php if ((set_value('pro_bloque')) == 0) echo 'checked'; ?>>
            <label class="custom-control-label" for="bloque">Non</label>
        </div>

        <button type="submit" class="btn btn-dark">Modifier</button>
        </form>
    </div>
    <?php include("footer.php"); ?>
</body>