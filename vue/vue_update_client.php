<div class="background-inscription">
    <form action="" method="POST">
        <div class="header-inscription">
        <?php
                if(isset($erreur)) {
                    echo "<div class='error-message'>".$erreur."</div>";
                }
                if(isset($succes)) {
                    echo "<div class='succes-message'>".$succes."</div>";
                }
                ?>
            <div class="inscription">
                <div class="inscription-block">
                    <h3>Info personnel</h3>
                    <div class="element_inscription">
                        <label for="nom">Nom :</label>
                        <input id="nom" type="text" value="<?= $user['nom'] ?>" name="nom" />
                    </div>
                    <div class="element_inscription">
                        <label for="prenom">Prenom :</label>
                        <input id="prenom" type="text" value="<?= $user['prenom'] ?>" name="prenom" />
                    </div>
                    <div class="element_inscription">
                        <label for="adresse_rue">Adresse rue:</label>
                        <input id="adresse_rue" type="text" value="<?= $user['adresse_rue'] ?>" name="adresse_rue" />
                    </div>
                    <div class="element_inscription">
                        <label for="adresse_rue">Adresse CP :</label>
                        <input id="adresse_cp" type="text" value="<?= $user['adresse_cp'] ?>" name="adresse_cp" />
                    </div>
                    <div class="element_inscription">
                        <label for="ville">Ville :</label>
                        <input id="ville" type="text" value="<?= $user['adresse_ville'] ?>" name="ville" />
                    </div>
                    <div class="element_inscription">
                        <label for="tel">tel :</label>
                        <input id="tel" type="tel" value="0<?= $user['tel'] ?>" name="tel" />
                    </div>
                </div>
                <div class="inscription-block">
                    <h3> Info de inscription </h3>
                    <div class="element_inscription">
                        <label for="pseudo">Pseudo :</label>
                        <input id="pseudo" type="text" value="<?= $user['pseudo'] ?>" name="pseudo" />
                    </div>
                    <div class="element_inscription">
                        <label for="mail">Mail :</label>
                        <input id="mail" type="mail" value="<?= $user['email'] ?>" name="mail" />
                    </div>
                    <div class="element_inscription">
                        <label for="admin_lvl">Admin lvl :</label>
                        <input id="admin_lvl" type="text" value="<?= $user['admin_lvl'] ?>" name="admin_lvl" />
                    </div>
                    <div class="element_inscription">
                        <label for="mdp">Mot de passe :</label>
                        <input id="mdp" type="password" value="<?= $user['mdp'] ?>" name="mdp" />
                    </div>
                    <div class="element_inscription">
                        <input type="submit" name="update_client" value="update" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>