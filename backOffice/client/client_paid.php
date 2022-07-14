<?php
session_start();
$pageTitle = "Vos factures";
require_once($_SERVER['DOCUMENT_ROOT'].'/database/database.php');
require "../../struct/head.php";
require "bdd-connexions.php";
?>

<?php include "client_leftmenu.php" ?>

<body class="bgfontdark">
    
<div class="pl-5">
    <div class="pl-5">
        <div class="pl-5">
            <div class="row pt-3 pl-3">
                <div class="col pl-5 pb-5 pt-3">
                    <span class="title pt-3 textcolor px-5">Vos factures</span>
                </div>
                <div class="col pt-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb bg-transparent right">
                            <li class="breadcrumb-item"><a href="client_dashboard.php">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bills</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="pl-5">
                    <form action="" class="my-4">
                        <div class="from-group row">
                        </div>
                    </form>
                    <div class="col">
                        <table>

                            <tr>
                                <th class="table_border table_font_1 textcolor center px-4">Contenu</th>
                                <th class="table_border table_font_1 textcolor center px-5">Status</th>
                                <th class="table_border table_font_1 textcolor center px-5">Date de paiement</th>
                                <th class="table_border table_font_1 textcolor center px-5">Facture en PDF</th>
                            </tr>

                            <?php for ($t = 0; $t < $nbBills; $t++) { ?>
                                <?php if($resultBills[$t] != null ){ ?>

                                <tr>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultBills[$t]['product']); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultBills[$t]['status']); ?></td>
                                    <td class="table_border table_font_2 center text-white"><?php echo ($resultBills[$t]['date_created']); ?></td>
                                    <td class="table_border table_font_2 center text-white"><a href="/bill.php?id=<?php echo($_SESSION['id']) ?>&facture_id=<?php echo($resultBills[$t]['id']) ?>&order=<?php echo($resultBills[$t]['product']) ?>"><button class="btn bgfontgreen px-3"><span class="text-white center"><i class="fa-solid fa-paperclip"></i></span></button></td>

                                </tr>
                                <?php } ?>
                            <?php } ?>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
        </div>
    </div>
</div>

</body>