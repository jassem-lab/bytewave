<?php include('./navbar_footer/navbar.php') ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bytewave";

$conn = mysqli_connect($servername, $username, $password, $dbname); ?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-4">
                    <div class="card widget widget-stats">
                        <div class="card-body">
                            <div class="widget-stats-container d-flex">
                                <div class="widget-stats-icon widget-stats-icon-warning">
                                    <i class="material-icons-outlined">person</i>
                                </div>
                                <div class="widget-stats-content flex-fill">
                                    <span class="widget-stats-title">Visitors</span>
                                    <span class="widget-stats-amount">
                                        <?php 
                                                    $req = "select * from visites where id = 1" ; 
                                                    $query = mysqli_query($conn,$req);
                                                    while ($enreg = mysqli_fetch_array($query)) {
                                                        echo $enreg["visites"] ; }
                                                    ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
</div>
</div>
<?php include('./navbar_footer/footer.php') ?>