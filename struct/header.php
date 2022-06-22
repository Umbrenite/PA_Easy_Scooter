<header>
    <div class="navbar">

        <div class="col-12">

            <div class="container">
                <div class="row">

                    <div class="col-sm-3 d-flex align-items-center">
                        <a class="navbar-brand" href="">
                            <img src="img/logo/electrotst.png" width="30" height="30" class="d-inline-block align-top" alt="">
                            Electrot
                        </a>
                    </div>

                    <div class="col-sm-6 d-flex align-items-center">
                        <a href="/index.php">
                            Home
                        </a>
                        <a href="/index.php#offers">
                            Forfaits
                        </a>
                        <a href="/index.php#accessories">
                            Accessoires
                        </a>
                        <a href="/index.php#about">
                            Pourquoi Electrot ?
                        </a>
                    </div>

                    <?php
                    if (!isset($_SESSION['id'])) { ?>
                    <div class="col-sm-3 d-flex align-items-center">
                        <button type="button" onclick="window.location.href='./login.php'" class="btn btn-outline-success">Connexion</button>
                        <button type="button" onclick="window.location.href='./register.php'" class="btn btn-success">Inscription</button>
                    </div>
                    <?php }
                    if (isset($_SESSION['id']) && $_SESSION['role'] == 'client') { ?>
                        <div class="col-sm-3 d-flex align-items-center">
                            <button type="button" onclick="window.location='./backOffice/client/client_dashboard.php?id=<?php echo($_SESSION['id']); ?>'" class="btn btn-outline-success">Panel client</button>
                        </div>
                    <?php }

                    if (isset($_SESSION['id']) && $_SESSION['role'] == 'admin') { ?>
                        <div class="col-sm-3 d-flex align-items-center">
                            <button type="button" onclick="window.location.href='./backOffice/admin/admin_dashboard.php?id=<?php echo($_SESSION['id']); ?>'" class="btn btn-outline-success">Panel Administrateur</button>
                        </div>
                    <?php } 
                    ?>
                </div>
            </div>

        </div>
    </div>
</header>