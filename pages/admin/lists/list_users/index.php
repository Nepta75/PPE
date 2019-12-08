<?php
include_once "controleur/controleur_admin.php";
$controleur = new Administrateur('localhost', 'bmwv2', 'root', '');
?>

<form method="POST" action="">
    <select name="list" onchange="this.form.submit()"> 
        <option value="">Choisissez une option :</option>
        <option value="client">Liste des clients</option>    
        <option value="technicien">Liste des techniciens</option>    
        <option value="admin">Liste des admins</option>    
    </select>
</form>

<?php
    $array = ['client', 'technicien', 'admin'];
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
            $data = $controleur->selectAllClients();
            require "vue/vue_list_clients.php" ; break ;
        case 1 :  
            $data = $controleur->selectAllTechniciens();
            require "vue/vue_list_techniciens.php" ; break ;
        case 2 :  
            $data = $controleur->selectAllAdmins();
            require "vue/vue_list_admins.php" ; break ;
        default : require "vue/vue_list_clients.php" ; break ;
    }
?>