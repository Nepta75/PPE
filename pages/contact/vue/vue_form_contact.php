<form action="" method="POST">
    <div class="form_contact">
        <h3>Nous contacter</h3>
        <hr class="separator">
        <div class="block-contact">
            <div class="test">
                <div>
                    <i class="fas fa-user"></i>
                    <label for="nom">Nom : </label>
                    <input type="text" id="nom" name="nom" />
                </div>
                <div>
                    <i class="far fa-user"></i>
                    <label for="prenom">Prénom : </label>
                    <input type="text" id="prenom" name="prenom" />
                </div>
                <div>
                    <i class="fas fa-at"></i>
                    <label for="mail">Mail : </label>
                    <input type="mail" id="mail" name="mail" />
                </div>
                <div>
                    <i class="fas fa-phone-square-alt"></i>
                    <label for="numero">Numero : </label>
                    <input type="tel" pattern="0[1-68]([-. ]?[0-9]{2}){4}" id="numero" name="numero" />
                </div>
            </div>
            <div class="test2">
                <div class="objet_form_contact">
                    <i class="fas fa-question"></i>
                    <label for="numero">Objet : </label>
                    <input type="text" id="objet" name="objet" />
                </div>
                <div class="test2-sub-block">
                    <i class="fas fa-sticky-note"></i>
                    <label for="message">Message :</label>
                    <textarea id="message" name="message"></textarea>
                </div>
                <div class="submit_form_contact">
                    <input type="submit" value="Envoyer" name="envoyer" />
                </div>
            </div>
        </div>
    </div>
</form>