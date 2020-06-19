<?php include "header.php";
echo validation_errors();
echo form_open_multipart();
?>

<body>
  <div class="container-fluid row">
    <div class="col-lg-8">
      <div>
      <label for="deconnexion" class="mt-5">Etes vous sur de vouloir vous deconnecter?</label>
    </div>
    <button type="submit" class="btn btn-warning mt-3 ml-2" id="deconnexion" name="deconnexion">Valider</button>
    </div>
    <div class="col-lg-4 col-sm-6 position-relative">
      <img src="<?php echo base_url("assets/img/landscape_logo.jpg") ?>" class="LoGo offset-1" width="100%" alt="Pelle">
    </div>
  </div>
</form>

</body>
<?php include "footer.php"; ?>