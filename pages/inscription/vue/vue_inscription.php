<div class="background-inscription">
    <form action="" method="POST">
        <div class="header-inscription">
        <?php
                if(isset($erreur)) {
                    echo "<div class='error-message'>".$erreur."</div>";
                }
                ?>
            <div class="inscription">
                <div class="inscription-block">
                    <h3>Info personnel</h3>
                    <div class="element_inscription">
                        <label for="nom">Nom :</label>
                        <input id="nom" type="text" name="nom" />
                    </div>
                    <div class="element_inscription">
                        <label for="prenom">Prenom :</label>
                        <input id="prenom" type="text" name="prenom" />
                    </div>
                    <div class="element_inscription">
                        <label for="adresse">Adresse:</label>
                        <input id="adresse" type="text" name="adresse" />
                    </div>
                    <div class="element_inscription">
                        <label for="tel">tel :</label>
                        <input id="tel" type="tel" name="tel" />
                    </div>
                </div>
                <div class="inscription-block">
                    <div class="element_inscription">
                        <label for="mail">Mail :</label>
                        <input id="mail" type="mail" name="mail" />
                    </div>
                    <div class="element_inscription">
                        <label for="mdp">Mot de passe :</label>
                        <input id="mdp" type="password" name="mdp" />
                    </div>
                    <div class="element_inscription">
                        <input type="submit" name="inscription" value="inscription" />
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>