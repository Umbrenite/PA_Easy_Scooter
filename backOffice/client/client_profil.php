<?php
session_start();
$pageTitle = "Votre Profil";
require "../../database/database.php";
require "../../struct/head.php";
?>

<?php include "client_leftmenu.php" ?>

<body class="bgfontdark">

<div class="pl-5">
    <div class="pl-5">
        <div class="pl-5">
            <div class="row pt-3 pl-3">
                <div class="col pl-5 pb-5 pt-3">
                    <span class="title pt-3 textcolor px-5">Votre profil</span>
                </div>
                <div class="col pt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent right">
                            <li class="breadcrumb-item"><a href="client_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Profil</li>
                        </ol>
                    </nav>
                </div>
            </div>

</body>