<?php include('./navbar_footer/navbar.php') ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bytewave";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('connection failed :' . mysqli_connect_error());
}
if (isset($_POST['enregistrer_mail'])) {
    $presentation = $_POST["presentation"];
    
     $sql = "UPDATE `presentation` SET `presentation`='" . $presentation . "' where id=1";
    if (mysqli_query($conn, $sql)) {
        echo ' <br/><div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
        <div class="alert-content">
            <span class="alert-title">Success!</span>
            <span class="alert-text">Paramétrage de base est mis à jour...</span>
        </div>
    </div>';
    } else {
        echo ' <div class="alert alert-custom alert-indicator-bottom indicator-danger" role="alert">
        <div class="alert-content">
            <span class="alert-title">Failed!</span>
        </div>
    </div>' . mysqli_error($conn);
    }
}


$req = "select * from presentation where id = 1";
$query = mysqli_query($conn, $req);
while ($enreg = mysqli_fetch_array($query)) {
    $id = $enreg["id"];
    $presentation = $enreg["presentation"];
}
?>
<div><?php echo $presentation ?></div>
<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h3>Presentation</h3>
                    </div>
                </div>
            </div>
            <form class="row g-3 needs-validation" action="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <textarea id='makeMeSummernote' name='presentation' class="form-control"
                                    value=""><?php echo $presentation ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <button type="" class="btn btn-primary"
                        style="background-color:#0d7cbc;border-color: #8833ff;">Enregistrer</button>
                    <input class="form-control" type="hidden" name="enregistrer_mail">

                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$('#makeMeSummernote').summernote({
    height: 200,
});
</script>
<?php include('./navbar_footer/footer.php') ?>