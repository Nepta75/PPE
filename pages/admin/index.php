<div class="admin-container">
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-users"></i></div>
        <p>Clients</p>
        <div><?= $cAdmin->countFromTable('view_client'); ?></div>
        <a href="admin.php?page=6&select=client">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-car"></i></div>
        <p>Vehicules Neufs</p>
        <div><?= $cAdmin->countFromTable('view_veh_neuf'); ?></div>
        <a href="admin.php?page=5&select=neuf">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-car-crash"></i></div>
        <p>Vehicules Occasions</p>
        <div><?= $cAdmin->countFromTable('view_veh_occas'); ?></div>
        <a href="admin.php?page=5&select=occas">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-car-side"></i></div>
        <p>Vehicules Clients</p>
        <div><?= $cAdmin->countFromTable('view_veh_client'); ?></div>
        <a href="admin.php?page=5&select=client">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-sticky-note"></i></div>
        <p>Devis</p>
        <div><?= $cAdmin->countFromTable('view_devis'); ?></div>
        <a href="admin.php?page=4">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-comments"></i></div>
        <p>Demandes d'essayages</p>
        <div><?= $cAdmin->countFromTable('view_essayer'); ?></div>
        <a href="admin.php?page=7">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-tools"></i></div>
        <p>Techniciens</p>
        <div><?= $cAdmin->countFromTable('view_technicien'); ?></div>
        <a href="admin.php?page=6&select=technicien">voir</a>
    </div>
    <div class="admin-container__admin-stats">
        <div><i class="fas fa-users-cog"></i></div>
        <p>Administrateurs</p>
        <div><?= $cAdmin->countFromTable('view_admin'); ?></div>
        <a href="admin.php?page=6&select=admin">voir</a>
    </div>
</div>