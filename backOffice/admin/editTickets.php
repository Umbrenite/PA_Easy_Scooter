<?php
$pageTitle = "Modification Ticket";
require "admin_leftmenu.php";
require "../../struct/head.php";
?>

<link href="../../css/dashboard.css" rel="stylesheet" type="text/css">
<link href="../../css/style.css" rel="stylesheet" type="text/css">
<link href="../../css/view.css" rel="stylesheet" type="text/css">
</head>

<body class="bgfontdark">

    <div class="pl-5">
        <div class="pl-5">
            <div class="pl-5">
                <div class="row pt-3 pl-3">

                    <div class="col pl-5 pb-5 pt-3">
                        <span class="title pt-3 textcolor px-5"><?php echo($pageTitle); ?></span>
                    </div>

                    <div class="col pt-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-transparent right">
                                <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="admin_list_tickets.php">Tickets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>

                </div>

                <div class="row">
                    <div class="col">
                        <div class="rat-form">
                            <form>
                                <div class="card">
                                    <figcaption class="blockquote-footer">
                                        <cite title="Source Title">
                                            <?php echo ("Le 10/08/2021"); ?>
                                        </cite>
                                    </figcaption>
                                    <h6>Note</h6>
                                    </p>
                                    <hr>
                                    <h6>Commentaire</h6>
                                    <textarea class="form-control" placeholder="" disabled></textarea>
                                    <center>
                                        <div class="row">
                                            <div class="col">
                                                <a class="btn btn-success" href=""><i class='bx bxs-like'></i></a>
                                                <a class="btn btn-success" href=""><i class='bx bxs-trash'></i></a>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>