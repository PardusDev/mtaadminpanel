<?php
session_start();

if (isset($_SESSION["oturum"])) {
    ?>


    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="jquery-1.3.2.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <?php include 'menu.php';


    include '../baglan/config.php';

    ?>
    <title>Yönetici Sil</title>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <center>Yönetici Sil</center>
        </div>
        <div class="panel-heading">

            <form action="" method="post">

                <center><strong style="color:black">Kullanıcı adı</strong></center>
                <br>
                <input class="form-control form-control-sm" name="yon_kadi" type="text" placeholder="Kullanıcı adı">

                <br>
                <center>
                    <button class="btn btn-danger" name="sil"><strong>Yönetici Sil</strong></button>
                </center>


                </center>

            </form>


            <?php
            include '../baglan/config.php';
            if (isset($_POST['sil'])) {
                $yonetici = $_POST['yon_kadi'];
                if (empty($yonetici)) {
                    ?>
                    <center>
                        <div class="alert alert-danger" role="alert"><strong><i class="fas fa-ban"></i> Boş Bırakma
                                !</strong></div>
                    </center>
                    <?php
                } else {
                    $query = $db->prepare("DELETE FROM admin WHERE kadi = :kadi");
                    $delete = $query->execute(array(
                        'kadi' => $_POST['yon_kadi']
                    ));
                    if ($delete) {
                        $last_id = $db->lastInsertId();
                        ?>
                        <center>
                            <div class="alert alert-success" role="alert"><strong><i class="fas fa-check"></i> Başarıyla
                                    Silindi !</strong></div>
                        </center>
                        <?php
                    }
                }

            }

            ?>


        </div>


    <?php
} else {
    header("Location: index.php");
}


?>