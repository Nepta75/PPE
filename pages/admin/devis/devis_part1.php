<div class="header_gestiondevis">
    <h2>Etape 1 : </h2>
    <form action="" method="POST">
        <div>
            <label> Faire un devis pour : </label>
            <select name="user">
                <option value="">--- Selectionner un client ---</option>
                <?php foreach($clients as $client){ ?>
                <option value="<?= $client['id_user']?>"><?= $client['nom'].', '.$client['prenom'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label> Selectionner le sujet du devis : </label>
            <select name="subject">
                <option value="">--- Selectionner un sujet ---</option>
                <option value="vente">--- Vente de vehicule ---</option>
                <option value="location">--- Location de vehicule ---</option>
            </select>
        </div>
        <div>
            <input type="submit" name="valide1" value="Continuer" />
        </div>
    </form>
</div>