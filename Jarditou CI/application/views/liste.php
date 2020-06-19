<?php include "header.php"; ?>

<body>
    <div class="container-md bg_container">
        <?php if ($this->session->role == "admin") { ?>
            <a href="<?= site_url("produits/ajouter"); ?>" class="btn btn-success">Ajout de produit</a>
            <a href="<?= site_url("Categories/ListCategorie") ?>" class="btn btn-primary">Categories</a>
        <?php } ?>
        <table class="table table-hover table-sm table-responsive-sm">
            <tr class="headtable text-truncate">
                <th scope="col" class="sticky-top">Photo</th>
                <th scope="col" class="sticky-top ">ID</th>
                <th scope="col" class="sticky-top ">Référence</th>
                <th scope="col" class="sticky-top ">Libelle</th>
                <th scope="col" class="sticky-top ">Prix</th>
                <th scope="col" class="sticky-top ">Stock</th>
                <th scope="col" class="sticky-top ">Couleur</th>
                <th scope="col" class="sticky-top ">Date d'ajout</th>
                <th scope="col" class="sticky-top ">Date de modif</th>
                <th scope="col" class="sticky-top ">Bloqué</th>
                <th scope="col">Détails</th>
            </tr>
            <?php foreach ($liste as $row) { ?>
                <tr class="bobytable">
                    <td> <img src="<?= base_url('assets/img/') . $row->pro_id . '.' . $row->pro_photo; ?>" class="photoliste"> </td>
                    <td><?= $row->pro_id ?></td>
                    <td><?= $row->pro_ref ?></td>
                    <td><?= $row->pro_libelle ?></td>
                    <td><?= $row->pro_prix ?></td>
                    <td><?= $row->pro_stock ?></td>
                    <td><?= $row->pro_couleur ?></td>
                    <td><?= $row->pro_d_ajout ?></td>
                    <td><?= $row->pro_d_modif ?></td>
                    <td><?= $row->pro_bloque ?></td>
                    <td>
                        <?php echo form_open("panier/ajouter"); ?>
                        <!-- champ visible pour indiquer la quantité à commander -->
                        <input type="number" class="form-control" name="pro_qte" id="pro_qte" value="1">
                        <input type="hidden" name="pro_prix" id="pro_prix" value="<?= $row->pro_prix ?>">
                        <input type="hidden" name="pro_id" id="pro_id" value="<?= $row->pro_id ?>">
                        <input type="hidden" name="pro_libelle" id="pro_libelle" value="<?= $row->pro_libelle ?>">

                        <!-- Bouton 'Ajouter au panier' -->
                        <div class="form-group">
                            <input type="submit" value="Ajouter au panier" class="btn btn-default btn-sm">
                        </div>
                    </td>
                    </form>
                    <td><a href="<?= site_url("produits/detail/" . $row->pro_id); ?>" class="btn btn-outline-warning">Détails</a></td>

                </tr>
            <?php }; ?>
        </table>
        <?php if ($this->session->role == "admin") { ?>
            <a href="<?= site_url("produits/ajouter"); ?>" class="btn btn-success">Ajout de produit</a>
            <a href="<?= site_url("Categories/ListCategorie") ?>" class="btn btn-primary">Categories</a>
        <?php } ?>
</body>
<?php include "footer.php"; ?>