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

    $title = $_POST["title"];

    echo $sql = "INSERT INTO `serviceType`(`title`) VALUES ('$title')";
   
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


$title = "";


?>

<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h3>Service Types</h3>
                    </div>
                </div>
            </div>


            <form class="row g-3 needs-validation" action="" method="POST" enctype="multipart/form-data">



                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Title</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="title" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>

                <div class="col-12">
                    <button type="" class="btn btn-primary"
                        style="background-color:#0d7cbc;border-color: #8833ff;">Enregistrer</button>
                    <input class="form-control" type="hidden" name="enregistrer_mail">

                </div>
            </form>

            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h3>Service Types : </h3>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php 
                                
                            $req = "select * from serviceType";
                            $query = mysqli_query($conn, $req);
                            while ($enreg = mysqli_fetch_array($query)) {
                                $id = $enreg["id"];
                                $title = $enreg["title"];
                            ?>
                            <tr>
                                <td><?php echo $title ?></td>
                                <td><button type="button" onclick="Supprimer('<?php echo $id; ?>')"
                                        class="btn btn-danger btn-burger"><i
                                            class="material-icons">delete_outline</i></button>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
function Supprimer(id) {
    if (confirm('Confirmez-vous cette action?')) {

        document.location.href = "./pages_supp/delete_ServiceType.php?ID=" + id;
    }
}

function myFunction() {
    alert("I am an alert box!");
}
</script>



<script type="text/javascript">
$('#makeMeSummernote').summernote({
    height: 200,
});
</script>
<?php include('./navbar_footer/footer.php') ?>