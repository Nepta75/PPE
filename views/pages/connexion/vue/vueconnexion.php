<div class="background-connexion">
    <form action="" method="POST">
        <div class="connexion">
            <?php
            if(isset($erreur)) {
                echo "<div class='error-message'>".$erreur."</div>";
            }
            if (isset($succes)) {
                 echo "<div class='succes-message'>".$succes."</div>";
             }
            ?>
            <h3>Connexion</h3>
            <div class="element_connexion">
                <label for="mail">email :</label>
                <input id="mail" type="text" name="mail" />
            </div>
            <div class="element_connexion">
                <label for="mdp">Mot de passe :</label>
                <input id="mdp" type="password" name="mdp" />
            </div>
            <div class="element_connexion">
                <input type="submit" name="connexion" value="Connexion" />
            </div>
            <div>
                <p style="color: #fff">Pas encore inscrit ?</b><a href="inscription"> Inscrivez-vous maintenant !</a><b>
            </div>
        </div>
    </form>
</div>