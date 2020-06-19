<?php include "header.php";
echo validation_errors();
echo form_open_multipart();
?>

<body>
   <div class="container-fluid row">
      <div class="col-lg-8">
         <div class="text-danger mt-3">
            <small><strong>* Ces champs sont obligatoire</strong></small>
         </div>
         <div class="form-group">
            <label for="login">Entrez un identifiant : *</label>
            <input type="text" name="login" id="login" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Entrez un nom d'utilisateur.">
            <?php echo form_error('login'); ?>
         </div>
         <div class="form-group">
            <label for="password">Entrez un mot de passe : *</label>
            <input type="text" name="password" id="password" class="form-control form-control-sm" data-toggle="tooltip" data-placement="right" title="Entrez une combinaison d'au moins 6 caractères pouvant contenir de la ponctuation (_, ., etc).">
            <?php echo form_error('password'); ?>
         </div>
         <button type="submit" class="btn btn-success ml-2" id="sign">Valider</button>
      </div>
      <div class="col-lg-4 col-sm-6 position-relative">
         <img src="<?php echo base_url("assets/img/landscape_logo.jpg") ?>" class="LoGo offset-1" width="100%" alt="Pelle">
      </div>
   </div>
   </form>

</body>
<?php include "footer.php"; ?>