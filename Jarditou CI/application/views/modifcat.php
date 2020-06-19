<?php
include "header.php";
echo validation_errors();
echo form_open_multipart();
?>

<body>
  <div class="container-fluid">

    <div class="form-group">
      <label>ID</label>
      <input type="text" name="cat_id" id="cat_id" class="form-control" value="<?php echo set_value('cat_id', $cat->cat_id); ?>" readonly>
    </div>

    <div class="form-group">
      <label for="cat_nom">Nom de la categorie</label>
      <input type="text" name="cat_nom" id="cat_nom" class="form-control" value="<?php echo set_value('cat_nom', $cat->cat_nom); ?>">
      <?php echo form_error('cat_nom'); ?>

    </div>
    <div class="form-group">
      <label for="cat_parent">Une categorie parent? Si oui selectionné une categorie :</label>
      <select class="custom-select" name="cat_parent" id="cat_parent">
        <option value="">Catégorie</option>
        <?php foreach ($categories as $categorie) { ?>
          <option value="<?php echo set_value('cat_id', $categorie->cat_id); ?>" <?php if($cat->cat_parent == $categorie->cat_id) echo 'selected';?>> <?= $categorie->cat_id . '.' . $categorie->cat_nom ?></option>
        <?php } ?>
      </select>
    </div>

    <button type="submit" class="btn btn-success">Modifier</button>
    </form>
  </div>

  <?php include("footer.php"); ?>
