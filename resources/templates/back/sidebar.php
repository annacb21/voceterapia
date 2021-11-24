<input type="checkbox" id="sidebar-toggle">
<nav class="sidebar">
    <div class="sidebar-brand">
        <h1>Admin</h1>
    </div>
    <div class="sidebar-menu">
        <ul>
            <li>
                <a href="admin.php" class="<?php if(!isset($_GET['users']) && !isset($_GET['news']) && !isset($_GET['edit-user']) && !isset($_GET['edit-news'])){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-chart-line"></i><span>Dashboard</span></a>
            </li>
            <li>
                <a href="admin.php?news" class="<?php if(isset($_GET['news']) || isset($_GET['edit-news'])){echo "admin-active";} else {echo "";} ?>"><i class="far fa-newspaper"></i><span>News</span></a>
            </li>
            <li>
                <a href="admin.php?users" class="<?php if(isset($_GET['users']) || isset($_GET['edit-user'])){echo "admin-active";} else {echo "";} ?>"><i class="fas fa-users"></i><span>Utenti</span></a>
            </li>
            <li>
                <a href="admin.php?logout"><i class="fas fa-sign-out-alt"></i><span>Logout</span></a>
            </li>
        </ul>
    </div>
</nav>