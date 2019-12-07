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
    $value = 0;    
    if(isset($_POST['list']))
    {
        if($_POST['list'] == 'client')
        {
            $value = 1;
        } elseif ($_POST['list'] == 'technicien') 
        {
            $value = 2;
        } elseif ($_POST['list'] == 'admin')
        {
            $value = 3;
        }
    } elseif (isset($_GET['select'])) {
        if($_GET['select'] == 'client')
        {
            $value = 1;
        } elseif ($_GET['select'] == 'technicien') 
        {
            $value = 2;
        } elseif ($_GET['select'] == 'admin')
        {
            $value = 3;
        }
    }
    switch($value)
    {
        case 1 :  
            $data = $controleur->selectAllClients();
            require "vue/vue_list_clients.php" ; break ;
        case 2 :  
            $data = $controleur->selectAllTechniciens();
            require "vue/vue_list_techniciens.php" ; break ;
        case 3 :  
            $data = $controleur->selectAllAdmins();
            require "vue/vue_list_admins.php" ; break ;
        default : require "vue/vue_list_clients.php" ; break ;
    }
?>