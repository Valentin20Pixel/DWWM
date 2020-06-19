
<hr>
<p id="zone">* Ces zones sont obligatoire </p>
<!-- Début du formulaire -->
<form action="#" method="POST">
  <fieldset>
    <legend>Vos coordonnées</legend>
    <div class="form-row">
      <!-- Le nom -->
      <div class="form-group col-md-6">
        <label for="nom"> Votre nom*: </label>
        <input type="text" id="nom" name="nom" class="form-control" value="">
        <small id="Errnom" class="form-text text-danger"></small>
      </div>
      <!-- Le prénom -->
      <div class="form-group col-md-6">
        <label for="prenom"> Votre prénom*: </label>
        <input type="text" name="prenom" class="form-control" id="prenom" value="">
        <small id="Errprenom" class="form-text text-danger "></small>
      </div>
    </div>
    <!-- Le sexe -->
    <div class="form-row">
      <label class="col-form-label" for="sex">Sexe*:</label>
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="sex" id="feminin" value="femme" >
        <label class="custom-control-label" for="feminin">Féminin</label>
      </div>
      <div class="custom-control custom-radio custom-control-inline">
        <input class="custom-control-input" type="radio" name="sex" id="masculin" value="homme" >
        <label class="custom-control-label" for="masculin">Masculin</label>
      </div>
      <small id="Errsexe" class="form-text text-danger"></small>
    </div>
    <!-- La date de naissance -->
    <div class="form-group">
      <label for="naissance"> Date de naissance*: </label>
      <input type="date" id="naissance" name="naissance" class="form-control" value="">
      <small id="Errnaissance" class="form-text text-danger"></small>
    </div>
    <!-- Le code postale -->
    <div class="form-group">
      <label for="code"> Code Postal: </label>
      <input type="text" pattern="^[0-9]+$" id="code" name="code" class="form-control" value="">
      <small id="Errcode" class="form-text text-danger"></small>
    </div>
    <!-- L'adresse -->
    <div class="form-group">
      <label for="adresse"> Adresse: </label>
      <input type="text" id="adresse" class="form-control" name="adresse" placeholder="123 rue du deve" value="">
      <small id="Erradrs" class="form-text text-danger"></small>
    </div>
    <!-- La ville -->
    <div class="form-group">
      <label for="ville"> Ville: </label>
      <input type="text" id="ville" name="ville" class="form-control" value="">
      <small id="Errville" class="form-text text-danger"></small>
    </div>
    <!-- L'email -->
    <div class="form-group">
      <label for="email"> Email*: </label>
      <input type="email" id="mail" class="form-control" name="email" placeholder="dave.loper@afpa.fr" value="">
      <small id="Errmail" class="form-text text-danger"></small>
    </div>
  </fieldset>
  <fieldset>
    <legend>Votre demande</legend>
    <!-- Le sujet -->
    <div class="form-row">
      <label for="choix"> Sujet*: </label>
      <select name="choix" id="choix" class="form-control">
        <option value="sujet" >Sujet</option>
        <option value="commandes" >Mes commandes</option>
        <option value="produit" >Question sur un produit</option>
        <option value="reclamation" >Reclamation</option>
        <option value="autres" >Autres</option>
      </select>
      <small id="Errsujet" class="form-text text-danger"></small>
    </div>
    <!-- La question -->
    <div class="form-group">
      <label for="question"> Votre question*: </label>
      <textarea class="form-control" name="question" id="question" cols="20" rows="3"></textarea>
      <small id="Errquestion" class="form-text text-danger"></small>
    </div>
  </fieldset>
  <!-- Check de formulaire -->
  <div class="custom-control custom-checkbox">
    <input class="custom-control-input" name="check" type="checkbox" id="accepte" value="info">
    <label class="custom-control-label" for="accepte">J'accepte le traitement informatique de ce formulaire.*</label>
    <small id="Erraccpt" class="form-text text-danger"></small>
  </div>
  <hr>
  <!-- Les boutons Envoyer et Annuler -->
  <div class="form-group">
    <input type="submit" value="Envoyer" id="Envoyer" class="btn btn-primary" name="Envoyer"></input>
    <button type="reset" value="Annuler" name="annuler" class="btn btn-danger">Annuler</button>
  </div>
</form>
