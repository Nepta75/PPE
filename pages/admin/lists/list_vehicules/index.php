<?php
include_once "controleur/controleur_admin.php";
$controleur = new Administrateur('localhost', 'bmwv2', 'root', '');
?>

<form method="POST" action="">
    <select name="list" onchange="this.form.submit()"> 
        <option value="">Choisissez une option :</option>
        <option value="neuf">Liste des vehicules neufs</option>    
        <option value="occas">Liste des vehicules d'occasion</option>    
        <option value="client">Liste des vehicules clients</option>    
    </select>
</form>

<?php
    $array = ['neuf', 'occas', 'client'];
    $value = null;
    if(isset($_POST['list']))
    {
       $value = array_search($_POST['list'], $array);
    } elseif (isset($_GET['select'])) {
        $value = array_search($_GET['select'], $array);
    }
    switch($value)
    {
        case 0 :  
            $data = $controleur->selectAllVehNeufs();
            require "vue/vue_veh_neufs.php" ; break ;
        case 1 :  
            $data = $controleur->selectAllVehOccas();
            require "vue/vue_veh_occas" ; break ;
        case 2 :  
            $data = $controleur->selectAllVehClients();
            require "vue/vue_list_clients.php" ; break ;
        default : require "vue/vue_list_clients.php" ; break ;
    }
?>