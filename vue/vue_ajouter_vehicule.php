<?php

?>

<div class="block-panel_admin">
    <?php if(isset($error)){ echo "<div class='error-message'>".$error."</div>";} ?>
    <h3>Ajouter un véhicule</h3>
    <form action="" method="POST">
        <div class="ajout_vehicule_type">
            <label>Ajouter un véhicule de type : </label>
            <select name="type_ajout" onchange='this.form.submit()'>
                <option value=""><?php if(isset($_POST['type_ajout'])) { echo "----- Ajout de type ".$_POST['type_ajout']." -----"; } ?></option>
                <option value="neuf">Neuf</option>
                <option value="occasion">Occasion</option>
                <option value="client">Client</option>
            </select>
        </div>
    </form>
    <?php
        if (isset($_POST['type_ajout'])) {
            if ($_POST['type_ajout'] == "neuf") {
                ?>
                <div class="form-panel_admin">
                    <form action="" method="POST">
                        <div>
                            <label for="immatriculation">Immatriculation : </label>
                            <input type="text" id="immatriculation" name="immatriculation" />
                        </div>
                        <div>
                            <label>Type : </label>
                            <select name="type">
                                <option value=""></option>
                                <option value="2 Roues">2 Roues</option>
                                <option value="4 Roues">4 Roues</option>
                            </select>
                        </div>
                        <div>
                            <label for="modele">Modele : </label>
                            <input type="text" id="modele" name="modele" />
                        </div>
                        <div>
                            <label for="millesime">Millesime : </label>
                            <input type="text" id="millesime" name="millesime" />
                        </div>
                        <div>
                            <label for="cylindree">Cylindree : </label>
                            <input type="text" id="cylindree" name="cylindree" />
                        </div>
                        <div>
                            <label>energie : </label>
                            <select name="energie">
                                <option value=""></option>
                                <option value="Essence">Essence</option>
                                <option value="Electrique">Electrique</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Hybride">Hybride</option>
                            </select>
                        </div>
                        <div>
                            <label>Type de boite : </label>
                            <select name="typeBoite">
                                <option value=""></option>
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                        <div>
                            <label for="prix">Prix : </label>
                            <input type="text" id="prix" name="prix" />
                        </div>
                        <div>
                            <label for="dateImma">Date 1er immatriculation : </label>
                            <input type="date" id="dateImma" name="dateImma" />
                        </div>
                        <div>
                            <label for="img_vehicule">Url de l'image : </label>
                            <input type="text" id="img_vehicule" name="img_vehicule" />
                        </div>
                        <div>
                            <input type="submit" name="add_vehicule_neuf" />
                        </div>
                    </form>
                </div>
                
                <?php
            } elseif ($_POST['type_ajout'] == "occasion") {
                ?>
                <div class="form-panel_admin">
                    <form action="" method="POST">
                        <div>
                            <label for="immatriculation">Immatriculation : </label>
                            <input type="text" id="immatriculation" name="immatriculation" />
                        </div>
                        <div>
                            <label>Type : </label>
                            <select name="type">
                                <option value=""></option>
                                <option value="2 Roues">2 Roues</option>
                                <option value="4 Roues">4 Roues</option>
                            </select>
                        </div>
                        <div>
                            <label for="modele">Modele : </label>
                            <input type="text" id="modele" name="modele" />
                        </div>
                        <div>
                            <label for="millesime">Millesime : </label>
                            <input type="text" id="millesime" name="millesime" />
                        </div>
                        <div>
                            <label for="cylindree">Cylindree : </label>
                            <input type="text" id="cylindree" name="cylindree" />
                        </div>
                        <div>
                            <label>energie : </label>
                            <select name="energie">
                                <option value=""></option>
                                <option value="Essence">Essence</option>
                                <option value="Electrique">Electrique</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Hybride">Hybride</option>
                            </select>
                        </div>
                        <div>
                            <label>Type de boite : </label>
                            <select name="typeBoite">
                                <option value=""></option>
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                        <div>
                            <label for="km">Kilométrage : </label>
                            <input type="text" id="km" name="km" />
                        </div>
                        <div>
                            <label for="prix">Prix : </label>
                            <input type="text" id="prix" name="prix" />
                        </div>
                        <div>
                            <label for="dateImma">Date 1er immatriculation : </label>
                            <input type="date" id="dateImma" name="dateImma" />
                        </div>
                        <div>
                            <label for="descriptif">Descriptif : </label>
                            <textarea name="descriptif" id="descriptif"></textarea>
                        </div>
                        <div>
                            <label>Vehicule Valide : </label>
                            <select name="valide_vehicule">
                                <option value=""></option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </div>
                        <div>
                            <label for="img_vehicule">Url de l'image : </label>
                            <input type="text" id="img_vehicule" name="img_vehicule" />
                        </div>
                        <div>
                            <input type="submit" name="add_vehicule_occasion" />
                        </div>
                    </form>
                </div>
                <?php
            } elseif ($_POST['type_ajout'] == "client") {
                require ('controleur/controleur.php');
                $unControleur = new Controleur("localhost", "bmwppe", "root", "");
                ?>
                <div class="form-panel_admin">
                    <form action="" method="POST">
                        <div class="users_select">
                            <label>Ajouter un véhicule Pour : </label>
                            <select name="user"'>
                                <option value=""><?php if(isset($_POST['user'])) { echo $_POST['user']; } ?></option>
                                <?php
                                $users = $unControleur->selectAllUsers();
                                while($data = $users->fetch()){
                                    ?><option value="<?= $data['pseudo']?>"><?= $data['pseudo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div>
                            <label for="immatriculation">Immatriculation : </label>
                            <input type="text" id="immatriculation" name="immatriculation" />
                        </div>
                        <div>
                            <label>Type : </label>
                            <select name="type">
                                <option value=""></option>
                                <option value="2 Roues">2 Roues</option>
                                <option value="4 Roues">4 Roues</option>
                            </select>
                        </div>
                        <div>
                            <label for="modele">Modele : </label>
                            <input type="text" id="modele" name="modele" />
                        </div>
                        <div>
                            <label for="millesime">Millesime : </label>
                            <input type="text" id="millesime" name="millesime" />
                        </div>
                        <div>
                            <label for="cylindree">Cylindree : </label>
                            <input type="text" id="cylindree" name="cylindree" />
                        </div>
                        <div>
                            <label>energie : </label>
                            <select name="energie">
                                <option value=""></option>
                                <option value="Essence">Essence</option>
                                <option value="Electrique">Electrique</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Hybride">Hybride</option>
                            </select>
                        </div>
                        <div>
                            <label>Type de boite : </label>
                            <select name="typeBoite">
                                <option value=""></option>
                                <option value="Manuelle">Manuelle</option>
                                <option value="Automatique">Automatique</option>
                            </select>
                        </div>
                        <div>
                            <label for="km">Kilométrage : </label>
                            <input type="text" id="km" name="km" />
                        </div>
                        <div>
                            <label for="prix">Prix : </label>
                            <input type="text" id="prix" name="prix" />
                        </div>
                        <div>
                            <label for="dateImma">Date 1er immatriculation : </label>
                            <input type="date" id="dateImma" name="dateImma" />
                        </div>
                        <div>
                            <label for="descriptif">Descriptif : </label>
                            <textarea name="descriptif" id="descriptif"></textarea>
                        </div>
                        <div>
                            <label>Vehicule Valide : </label>
                            <select name="valide_vehicule">
                                <option value=""></option>
                                <option value="Oui">Oui</option>
                                <option value="Non">Non</option>
                            </select>
                        </div>
                        <div>
                            <label for="img_vehicule">Url de l'image : </label>
                            <input type="text" id="img_vehicule" name="img_vehicule" />
                        </div>
                        <div>
                            <input type="submit" name="add_vehicule_client" />
                        </div>
                    </form>
                </div>
                <?php
            }  
        }
    ?>
</div>