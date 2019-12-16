<form method="POST" action="">
    <select name="list" onchange="this.form.submit()"> 
        <option value="">Choisissez une option :</option>
        <option value="neuf">Liste des vehicules neufs</option>    
        <option value="occas">Liste des vehicules d'occasion</option>    
        <option value="client">Liste des vehicules clients</option>    
    </select>
</form>

<?php
if(isset($_GET["delete"]) && !empty($_GET["delete"])) {
    $cAdmin->deleteVehicule($_GET["delete"]);
}
$array = ['neuf', 'occas', 'client'];
if(isset($_POST['list']))
{
    $value = array_search($_POST['list'], $array);
} elseif (isset($_GET['select'])) {
    $value = array_search($_GET['select'], $array);
}

if (isset($value)) {
    switch($value)
    {
        case 0 :  
            $data = $cAdmin->selectAllVehNeufs();
            require "vue/vue_veh_neufs.php" ; break ;
        case 1 :  
            $data = $cAdmin->selectAllVehOccas();
            require "vue/vue_veh_occas.php" ; break ;
        case 2 :  
            $data = $cAdmin->selectAllVehClients();
            require "vue/vue_veh_clients.php" ; break ;
    }
} else {
    $data = $cAdmin->selectAllVehClients();
    require "vue/vue_veh_clients.php" ;
}
?>