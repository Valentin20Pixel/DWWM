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
			<input type="text" class="form-control" value="" readonly>
		</div>

		<div class="form-group">
			<label for="pro_ref">Référence</label>
			<input type="text" name="pro_ref" id="pro_ref" class="form-control"  value="<?php echo set_value('pro_ref'); ?>">
			<?php echo form_error('pro_ref'); ?>
		</div>

		<div class="form-group">
			<label for="pro_cat_id">Catégorie</label>
			<select class="custom-select" name="pro_cat_id" id="pro_cat_id">
				<option selected value="">Catégorie</option>
				<?php foreach ($categories as $categorie) { ?>
					<option value="<?php echo $datre=set_value('pro_cat_id', $categorie->cat_id); ?>"> <?= $categorie->cat_id . '.' . $categorie->cat_nom ?></option>
				<?php } ?>
			</select>
		</div>
		
		<div class="form-group">
			<label for="pro_libelle">Libellé</label>
			<input type="text" name="pro_libelle" id="pro_libelle" class="form-control" value="<?php echo set_value('pro_libelle'); ?>">
			<?php echo form_error('pro_libelle'); ?>
		</div>

		<div class="form-group">
			<label for="pro_description">Description</label>
			<textarea name="pro_description" class="form-control" id="pro_description" value="<?php echo set_value('pro_description'); ?>"></textarea>
			<?php echo form_error('pro_description'); ?>
		</div>

		<div class="form-group">
			<label for="pro_prix">Prix</label>
			<input type="text" name="pro_prix" class="form-control" id="pro_prix" value="<?php echo set_value('pro_prix'); ?>">
			<?php echo form_error('pro_prix'); ?>
		</div>

		<div class="form-group">
			<label for="pro_stock">Stock</label>
			<input type="text" name="pro_stock" class="form-control" id="pro_stock" value="<?php echo set_value('pro_stock'); ?>">
			<?php echo form_error('pro_stock'); ?>
		</div>

		<div class="form-group">
			<label for="pro_couleur">Couleur</label>
			<input type="text" name="pro_couleur" class="form-control" id="pro_couleur" value="<?php echo set_value('pro_couleur'); ?>">
			<?php echo form_error('pro_couleur'); ?>
		</div>
		<p>Produit bloqué:</p>

		<div class="custom-control custom-radio custom-control-inline">
			<input class="custom-control-input" type="radio" name="pro_bloque" id="bloque1" value="1">
			<label class="custom-control-label" for="bloque1">Oui</label>
		</div>

		<div class="custom-control custom-radio custom-control-inline">
			<input class="custom-control-input" type="radio" name="pro_bloque" id="bloque0" value="0">
			<label class="custom-control-label" for="bloque0">Non</label>
		</div>

		<button type="submit" class="btn btn-success">Ajouter</button>
		</form>
	</div>
</body>
		<?php include("footer.php"); ?>
		