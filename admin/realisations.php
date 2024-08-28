<?php include('./navbar_footer/navbar.php') ?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "majdoub";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die('connection failed :' . mysqli_connect_error());
}


if (isset($_POST['enregistrer_mail'])) {


    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $terms = $_POST["terms"];
    $architect = $_POST["architect"];
    $client = $_POST["client"];
    $strategy = $_POST["strategy"];
    $project_type = $_POST["project_type"];
    $date = $_POST["date"];

    $sql = "INSERT INTO `portfolio`(`titre`,`description`,`terms`,`architect`,`client`,`strategy`,`project_type`,`date`) VALUES ('$titre','$description','$terms','$architect','$client','$strategy','$project_type','$date')";
    $file = '';
    $file_tmp = '';
    $location = "../assets/portfolio/";
    $data = '';
    foreach ($_FILES['images']['name'] as $key => $val) {
        $file = $_FILES['images']['name'][$key];
        $file_tmp = $_FILES['images']['tmp_name'][$key];
        move_uploaded_file($file_tmp, $location . $file);
        $data .= $file . " ";
    }
    $query = "insert into portfolio_images (titre,image) values('$titre','$data')";
    $fire = mysqli_query($conn, $query);
    if ($fire) {
        echo "Successful";
    } else {
        echo "Failed";
    }

    if (mysqli_query($conn, $sql)) {

        echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="realisations.php?ID=' . $id . '&suc=1" </SCRIPT>';


    } else {
        echo ' <div class="alert alert-custom alert-indicator-bottom indicator-danger" role="alert">
        <div class="alert-content">
            <span class="alert-title">Failed!</span>
        </div>
    </div>' . mysqli_error($conn);
    }
}

$titre = "";
$architect = "";
$client = "";
$strategy = "";
$date = "";
$description = "";
$project_type = "";
$terms = "";

?>

<div class="app-content">
    <?php if (isset($_GET['suc'])) { ?>
        <?php if ($_GET['suc'] == '1') { ?>
            <br />
            <div class="alert alert-custom alert-indicator-top indicator-success" role="alert">
                <div class="alert-content">
                    <span class="alert-title">Success!</span>
                    <span class="alert-text">project est mis à jour...</span>
                </div>
            </div>
        <?php }
    } ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h3>Projects Content</h3>
                    </div>
                </div>
            </div>

            <form class="row g-3 needs-validation" action="" method="POST" enctype="multipart/form-data">



                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Title</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="titre" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Architect</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="architect" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Client</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="client" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Strategy</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="strategy" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Project Type</label>
                    <select class="form-control select2" name="project_type" id="project_type" required>
                        <option value=""> Select a project Type </option>
                        <?php
                        $req = "select * from projecttype ";
                        $query = mysqli_query($conn, $req);
                        while ($enreg = mysqli_fetch_array($query)) {
                            ?>
                            <option value="<?php echo $enreg['title']; ?>" <?php if ($project_type == $enreg['title']) { ?> selected
                                <?php } ?>>
                                <?php echo $enreg['title']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Date</label>
                    <input type="date" class="form-control" id="validationTooltip02" name="date" required>
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Terms</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="terms">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Images</label>
                    <input type="file" class="form-control" id="validationTooltip02" name="images[]" id="images"
                        multiple>
                  
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label for="validationTooltip02" class="form-label">Description</label>
                        <div class="card">

                            <div class="card-body">
                                <textarea id='makeMeSummernote' name='description' class="form-control"></textarea>
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

            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h3>Projects : </h3>
                    </div>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">description</th>
                                <th scope="col">Architect</th>
                                <th scope="col">Client</th>
                                <th scope="col">Terms</th>
                                <th scope="col">Strategy</th>
                                <th scope="col">Date</th>
                                <th scope="col">Images</th>
                                <th scope="col">Project Type</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $req = "select * from portfolio";
                            $query = mysqli_query($conn, $req);
                            while ($enreg = mysqli_fetch_array($query)) {
                                $id = $enreg["id"];
                                $titre = $enreg["titre"];
                                $description = $enreg["description"];
                                $architect = $enreg["architect"];
                                $terms = $enreg["terms"];
                                $client = $enreg["client"];
                                $strategy = $enreg["strategy"];
                                $project_type = $enreg["project_type"];
                                $date = $enreg["date"];
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $titre ?>
                                    </td>
                                    <td>
                                        <?php echo $description ?>
                                    </td>
                                    <td>
                                        <?php echo $architect ?>
                                    </td>
                                    <td>
                                        <?php echo $terms ?>
                                    </td>
                                    <td>
                                        <?php echo $client ?>
                                    </td>
                                    <td>
                                        <?php echo $strategy ?>
                                    </td>
                                    <td>
                                        <?php echo $date ?>
                                    </td>
                                    <td>
                                        <?php
                                        $i = "";
                                        $query2 = "SELECT * FROM `portfolio_images` WHERE `titre` = '" . $enreg['titre'] . "' ";
                                        $fire = mysqli_query($conn, $query2);
                                        $data = mysqli_fetch_array($fire);
                                        $res = $data['image'];
                                        $res = explode(" ", $res);
                                        $count = count($res) - 1;
                                        for ($i = 0; $i < $count; ++$i) {
                                            ?>
                                            <img src="../assets/portfolio/<?= $res[$i] ?>" height="100px" width="100px" />
                                            <?php
                                        }
                                        echo "<p style='color:green;font-size:12px'>Total " . $count . " images found.";
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                       echo $project_type ; 
                                        ?>

                                    </td>
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

            document.location.href = "./pages_supp/delete_project.php?ID=" + id;
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