<?php
session_start();
if (!isset($_SESSION['id']) || empty($_SESSION['id'])) {
    header("Location: ../../index.php");
    exit();
}
?>

<div id="sidenav" class="sidenav dashboard_text_color">

    <span class="pl-3"><?php echo ($_SESSION['role']); ?></span>
    <hr>
    <b><span class="pl-3"><?php echo ($_SESSION['firstname'] . " " . $_SESSION['lastname']); ?></span></b>
    <hr>

    <button class="dropdown-btn px-3 pb-2"><span>Analytics</span>
        <i name="icon2" class="right fa-solid fa-angle-left pt-2"></i>
    </button>
    <div class="dropdown-container px-5">
        <ul>
            <li><a href="admin_dashboard.php"><span class="subtitle">Dashboard</span></a>
            <li><a href="admin_revenue.php"><span class="subtitle">Statistiques</span></a>
            <li><a href="admin_logs.php"><span class="subtitle">Logs</span></a>
        </ul>
    </div>

    <button class="dropdown-btn px-3 pb-2"><span>Liste</span>
        <i name="icon3" class="right fa-solid fa-angle-left pt-2"></i>
    </button>
    <div class="dropdown-container px-5">
        <ul>
            <li><a href="admin_list.php"><span class="subtitle">Admins</span></a>
            <li><a href="client_list.php"><span class="subtitle">Clients</span></a>
        </ul>
    </div>

    <a href="admin_list_tickets.php"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Tickets</span></button></a>

    <button class="dropdown-btn px-3 pb-2"><span>Trottinettes</span>
        <i name="icon3" class="right fa-solid fa-angle-left pt-2"></i>
    </button>
    <div class="dropdown-container px-5">
        <ul>
            <li><a href="admin_list_scooter.php"><span class="subtitle">Liste</span></a>
            <li><a href="admin_scooter_gestion.php"><span class="subtitle">Map</span></a>
        </ul>
    </div>

    <a href="admin_profil.php"><button class="btn btn-lg btn-block px-3"><span class="dashboard_text_color left">Profil</span></button></a>

    <a href="../../../logout.php"><button type="button" class="btn btn-dark">Logout</button></a>

</div>

<script src="../JS/dropdown.js"></script>
<script src="../JS/datapicker.js"></script>