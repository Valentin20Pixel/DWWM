<?php include "header.php";
echo validation_errors(); ?>

<body>
  <a class="btn btn-outline-danger" href="<?= site_url("Categories/ListCategorie"); ?>"> Retour aux catégories</a>
  <?php echo form_open(); ?>

  <div class="group_form mt-3">
    <label for="cat_id">Quelle catégorie voulez vous efface de liste?</label>
    <select class="custom-select" name="cat_id" id="cat_id">
      <option selected value="">Catégorie</option>
      <?php foreach ($categories as $categorie) { ?>
        <option value="<?php echo set_value('cat_id', $categorie->cat_id); ?>"> <?= $categorie->cat_id . '.' . $categorie->cat_nom ?></option>
      <?php } ?>
    </select>
  </div>
  <button class="btn btn-outline-secondary mt-3" name="btnsuppcat" type="submit" value="true">Valider</button>

  </form>
</body>