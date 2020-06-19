<?php
include "header.php";
echo validation_errors();
echo form_open_multipart();
?>
<div class="container-fluid">


  <div class="form-group">
    <label for="cat_nom">Nommer une categorie</label>
    <input type="text" name="cat_nom" id="cat_nom" class="form-control">
  </div>
  <div class="form-group">
    <label for="cat_parent">A t'il une categorie parent? Si oui selectionné une categorie :</label>
    <select class="custom-select" name="cat_parent" id="cat_parent">
      <option selected value="">Catégorie</option>
      <?php foreach ($listcategorie as $row) { ?>
        <option value="<?php echo set_value('cat_parent', $row->cat_id); ?>"> <?= $row->cat_id . '.' . $row->cat_nom ?></option>
      <?php } ?>
    </select>
  </div>

  <button type="submit" class="btn btn-success" name="ajoutcat" value="true">Ajouter la categorie</button>
  </form>

<hr>
<a href="<?= site_url("Categories/supprimcat") ?>" class="btn btn-danger">Supprimer une categorie</a>


<table class="table table-hover table-sm table-responsive-sm">
  <tr class="headtable text-truncate">
    <th scope="col" class="sticky-top ">ID</th>
    <th scope="col" class="sticky-top ">Nom de la catégorie</th>
    <th scope="col" class="sticky-top ">Catégorie parent</th>
    <th scope="col" class="sticky-top ">Modifier</th>

  </tr>
  <?php foreach ($listcategorie as $row) { ?>
    <tr class="bobytable">
      <td name="idcat"><?= $row->cat_id ?></td>
      <td><?= $row->cat_nom ?></td>
      <td><?= $row->cat_parent ?></td>
      <td><a href="<?= site_url("Categories/modifcat/" . $row->cat_id); ?>" class="btn btn-outline-warning">Modifier</a></td>

    </tr>
  <?php }; ?>
</table>
<a href="<?= site_url("Categories/supprimcat") ?>" class="btn btn-danger">Supprimer une categorie</a>

</div>

<?php include("footer.php"); ?>

