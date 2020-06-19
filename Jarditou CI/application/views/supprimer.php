<?php include "header.php";
echo validation_errors();?>
<?php echo form_open(); ?>

<body>
<button class="btn btn-outline-danger"><a href="<?= site_url("produits/liste"); ?>"> Retour aux produits</a></button>
<div class="form-group">
    <label for="supp" class="form-check-label">Etes vous sur de vouloir supprimer le produit?</label>
</div>
<button class="btn btn-outline-secondary" name="btnsupp" type="submit" value="true" >Valider</button>
</form>
</body>