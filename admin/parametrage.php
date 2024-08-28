<?php include ('./navbar_footer/navbar.php') ?>

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

    $email = $_POST["email"];
    $url = $_POST["url"];
    $signature = $_POST["signature"];
    $nom = $_POST["nom"];
    $tel1 = $_POST["tel1"];
    $tel2 = $_POST["tel2"];
    $adresse = $_POST["adresse"];

    $facebook = $_POST["facebook"];
    $instagram = $_POST["instagram"];
    $behance = $_POST["behance"];
    $twitter = $_POST["twitter"];


    $type1 = pathinfo(basename($_FILES["uploadfile"]["name"]), PATHINFO_EXTENSION);
    $file1 = md5($_FILES["uploadfile"]["name"] . time()) . "." . $type1;
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];
    $folder = "../assets/images/" . $file1;
    if ($type1 == "jpg" or $type1 == "JPG" or $type1 == "jpeg" or $type1 == "JPEG" or $type1 == "png" or $type1 == "PNG" or $type1 == "bmp" or $type1 == "BMP" or $type1 == "gif" or $type1 == "GIF") {
        echo $sql = "UPDATE `parametres` SET `nom`='" . $nom . "',`mail`='" . $email . "',`url`='" . $url . "',`signature`='" . $signature . "'
        ,`tel1`='" . $tel1 . "',`tel2`='" . $tel2 . "',`logo`='" . $file1 . "',
        `adresse`='" . $adresse . "',`facebook`='" . $facebook . "',`instagram`='" . $instagram . "' ,`twitter`='" . $twitter . "' ,`behance`='" . $behance . "' 
         where id=1";
    } else {
        echo $sql = "UPDATE `parametres` SET `nom`='" . $nom . "',`mail`='" . $email . "',`url`='" . $url . "',`signature`='" . $signature . "'
        ,`tel1`='" . $tel1 . "',`tel2`='" . $tel2 . "',
        `adresse`='" . $adresse . "',`facebook`='" . $facebook . "',`instagram`='" . $instagram . "' ,`twitter`='" . $twitter . "' ,`behance`='" . $behance . "' 
         where id=1";
    }
    if (move_uploaded_file($tempname, $folder)) {
        echo "<h3>  Image uploaded successfully!</h3>";
    } else {
        echo "<h3>  Failed to upload image!</h3>";
    }
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

$mail = "";
$url = "";
$Signature = "";
$nom = "";
$logo = "";
$tel1 = "";
$tel2 = "";
$tel3 = "";
$mail1 = "";
$mail2 = "";
$mail3 = "";
$adresse = "";
$adresse2 = "";

$facebook = "";
$instagram = "";
$twitter = "";
$behance = "";

$req = "select * from parametres where id = 1";
$query = mysqli_query($conn, $req);
while ($enreg = mysqli_fetch_array($query)) {
    $mail = $enreg["mail"];
    $url = $enreg["url"];
    $signature = $enreg["signature"];
    $nom = $enreg["nom"];
    $logo = $enreg["logo"];
    $tel1 = $enreg["tel1"];
    $tel2 = $enreg["tel2"];
    $adresse = $enreg["adresse"];

    $facebook = $enreg["facebook"];
    $instagram = $enreg["instagram"];

}

?>




<div class="app-content">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="page-description">
                        <h3>Paramétrage de base</h3>
                    </div>
                </div>
            </div>
            <form class="row g-3 needs-validation" action="" method="POST" enctype="multipart/form-data">

                <div class="col-md-4 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">URL de platform</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="url"
                        value="<?php echo $url ?>">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-4 position-relative mb-5">
                    <label for="validationTooltipUsername" class="form-label">Adresse mail d'envoi</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                        <input type="text" class="form-control" id="validationTooltipUsername"
                            aria-describedby="validationTooltipUsernamePrepend" name="email"
                            value="<?php echo $mail ?>">
                        <div class="invalid-tooltip">
                            Please choose a unique and valid address.
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="page-description">
                        <h3>Coordobnnées</h3>
                    </div>
                </div>

                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Nom du site</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="nom"
                        value="<?php echo $nom ?>">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">signature</label>
                    <input type="text" class="form-control" id="validationTooltip02" name="signature"
                        value="<?php echo $signature ?>">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip02" class="form-label">Logo</label>
                    <input type="file" class="form-control" id="validationTooltip02" name="uploadfile" id="uploadfile"
                        value="<?php echo $logo ?>" placeholder="value=" <?php echo $logo ?>">
                    <img src="../assets/images/<?php echo $logo; ?>" style="width:50px ; background-color : gray ; ">
                    <div class="valid-tooltip">
                        Looks good!
                    </div>
                </div>

                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip03" class="form-label">Téléphone 1 </label>
                    <input type="number" class="form-control" name="tel1" value="<?php echo $tel1 ?>"
                        id="validationTooltip03">
                    <div class="invalid-tooltip">
                        Please provide a valid phone number.
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip03" class="form-label">Téléphone 2 </label>
                    <input type="number" class="form-control" name="tel2" value="<?php echo $tel2 ?>"
                        id="validationTooltip03">
                    <div class="invalid-tooltip">
                        Please provide a valid phone number.
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip03" class="form-label">Adresse</label>
                    <input type="text" class="form-control" name="adresse" value="<?php echo $adresse ?>"
                        id="validationTooltip03">
                    <div class="invalid-tooltip">
                        Please provide a valid Adresse.
                    </div>
                </div>

                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip05" class="form-label">Facebook</label>
                    <input type="text" class="form-control" name="facebook" value="<?php echo $facebook ?>"
                        id="validationTooltip05">
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip05" class="form-label">Instagram</label>
                    <input type="text" class="form-control" name="instagram" value="<?php echo $instagram ?>"
                        id="validationTooltip05">
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip05" class="form-label">Behance</label>
                    <input type="text" class="form-control" name="behance" value="<?php echo $behance ?>"
                        id="validationTooltip05">
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
                    </div>
                </div>
                <div class="col-md-3 position-relative mb-5">
                    <label for="validationTooltip05" class="form-label">Twitter</label>
                    <input type="text" class="form-control" name="twitter" value="<?php echo $twitter ?>"
                        id="validationTooltip05">
                    <div class="invalid-tooltip">
                        Please provide a valid zip.
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
<?php include ('./navbar_footer/footer.php') ?>