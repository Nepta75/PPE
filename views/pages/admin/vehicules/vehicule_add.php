<?php
if (isset($_POST['type_ajout'])) {
    $array = ['neuf', 'occasion', 'client'];
    $value = array_search($_POST['type_ajout'], $array);
} elseif (isset($_GET['type_ajout'])) {
    $array = ['neuf', 'occasion', 'client'];
    $value = array_search($_POST['type_ajout'], $array);
}

if (isset($_POST['add_vehicule_neuf'])) {
    $this->cAdmin->addVehiculeNeuf($_POST);
}
if (isset($_POST['add_vehicule_occasion'])) {
    $this->cAdmin->addVehiculeOccas($_POST);
}
if (isset($_POST['add_vehicule_client'])) {
    $this->cAdmin->addVehiculeClient($_POST);
}

if (isset($value)) {
    switch ($value) {
        case 0: 
            require VIEW.'pages/admin/vehicules/vue/vue_add/veh_neuf_add.php'; break;
        case 1: 
            require VIEW.'pages/admin/vehicules/vue/vue_add/veh_occas_add.php'; break;
        case 2: 
            $users = $this->cAdmin->selectAllClients();
            require VIEW.'pages/admin/vehicules/vue/vue_add/veh_client_add.php'; break;
    }
} else { ?>
    <div class="block-panel_admin">
        <?php if(isset($erreur)){ echo "<div class='error-message'>".$erreur."</div>";} ?>
        <h3>Ajouter un véhicule</h3>
        <form action="" method="POST">
            <div style="text-align: center;">
                <label>Ajouter un véhicule de type : </label>
                <select name="type_ajout" onchange='this.form.submit()'>
                    <option value=""><?php if(isset($_POST['type_ajout'])) { echo "----- Ajout de type ".$_POST['type_ajout']." -----"; } ?></option>
                    <option value="neuf">Neuf</option>
                    <option value="occasion">Occasion</option>
                    <option value="client">Client</option>
                </select>
            </div>
        </form>
    </div>
<?php } ?>
