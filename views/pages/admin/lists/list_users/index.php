<form method="POST" action="">
    <select name="list" onchange="this.form.submit()"> 
        <option value="">Choisissez une option :</option>
        <option value="client">Liste des clients</option>    
        <option value="technicien">Liste des techniciens</option>    
        <option value="admin">Liste des admins</option>    
    </select>
</form>

<?php

    if(isset($_GET["delete"]) && !empty($_GET["delete"])) {
        $this->cAdmin->deleteUser($_GET["delete"]);
    }
    $array = ['client', 'technicien', 'admin'];
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
            $data = $this->cAdmin->selectAllClients();
            require VIEW."pages/admin/lists/list_users/vue/vue_list_clients.php" ; break ;
        case 1 :  
            $data = $this->cAdmin->selectAllTechniciens();
            require VIEW."pages/admin/lists/list_users/vue/vue_list_techniciens.php" ; break ;
        case 2 :  
            $data = $this->cAdmin->selectAllAdmins();
            require VIEW."pages/admin/lists/list_users/vue/vue_list_admins.php" ; break ;
    }
} else {
    $data = $this->cAdmin->selectAllClients();
    require VIEW."pages/admin/lists/list_users/vue/vue_list_clients.php" ;
}
?>