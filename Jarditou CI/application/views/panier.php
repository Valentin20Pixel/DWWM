<?php include "header.php"; ?>

<body>
  <h1>Mon panier</h1>

<?php
// Si le panier n'existe pas encore  
if ($this->session->panier != null) {
?>
  <div class="row">
    <div class="col-12">
      <table>
        <thead>
          <tr>
            <th class="text-center">Produit</th>
            <th class="text-center">Prix</th>
            <th class="text-center">Quantité</th>
            <th class="text-center">Prix total</th>
            <th class="text-center">Ajout</th>
            <th class="text-center">Suppression</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $iTotal = 0+0;
          ?>
          <?php 
          foreach ($this->session->panier as $row) { 
            ?>
            <tr class="bobytable">
              <td class="text-center"><?php echo $row["pro_libelle"]; ?></td>
              <td class="text-center"><?= $row["pro_prix"]; ?></td>
              <td class="text-center"><?= $row["pro_qte"];?></td>
              <td class="text-center"><?= $total[] = ($row["pro_prix"]*$row["pro_qte"]); ?></td>
              <td class="text-center"><a class="btn btn-primary" href="<?= site_url("panier/modifierQte/" . $row["pro_id"]); ?>">Ajouter un produit</a></td>
              <td class="text-center"><a class="btn btn-danger" href="<?= site_url("panier/supprimerPanier/" . $row["pro_id"]); ?>">Supprimer le produit</a></td>

            </tr>
            <?php } ?>
        </tbody>
      </table>
    </div>
    <div>
      <div>
        <h3>Récapitulatif</h3>
        <div>
          <p>TOTAL : <?= $sum = array_sum($total) ?> &euro;</p>
          
          <a href="<?= site_url("produits/liste"); ?>" class="btn btn-warning">Retour liste des produits</a>
          <a href="<?= site_url("panier/supprimerPanier"); ?>" class="btn btn-outline-danger">Supprimer le panier</a>
        </div>
      </div>
    </div>
  </div>
<?php } else { ?>
<div class="alert alert-danger">Votre panier est vide. Pour le remplir, vous pouvez consulter <a href="<?= site_url("produits/liste"); ?>">la liste des produits</a>.</div>
<?php } ?>
</body>
<?php include "footer.php"; ?>
