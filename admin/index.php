<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


<div class="container">
    <div class="row">
        <br><br><br><br>
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <title>Yönetici Girişi</title>
                <div class="panel-heading">
                    <center>
                        <h3 class="panel-title"><i class="fas fa-user"></i> Yönetici Girişi</h3>

                        <div class="panel-body">
                            <form action="" method="POST">
                    </center>
                </div>
                <fieldset>
                    <div class="form-group">
                        <input class="form-control" placeholder="Kullanıcı adınız" name="kadi" type="text">
                        <br>
                        <input class="form-control" placeholder="Şifreniz" name="sifre" type="password">
                        <br>
                        <input class="btn btn-lg btn-info btn-block" name="gonder" type="submit" value="Giriş Yap">
                    </div>
                </fieldset>
                </form>


                <?php
                session_start();

                if (isset($_POST['gonder'])) {
                    $kullanici = $_POST['kadi'];
                    $sifre = $_POST['sifre'];

                    if (empty($_POST['kadi'] || $_POST['sifre'])) {
                        ?>
                        <div class="alert alert-danger" role="alert"><strong><i class="fas fa-ban"></i> Boş
                                Bırakma!</strong></div>
                        <?php
                    } else {
                        include '../baglan/config.php';
                        $cek = $db->query("SELECT * FROM admin WHERE kadi = '{$kullanici}' AND sifre = '{$_POST['sifre']}'", PDO::FETCH_ASSOC);

                        $count = $cek->rowCount();
                        if ($count >= 1) {
                            ?>
                            <div class="alert alert-success" role="alert"><strong><i class="fas fa-check"></i>Giriş
                                    Yapıldı!</strong></div><?php
                            $_SESSION["oturum"] = true;
                            $_SESSION["kadi"] = $_POST['kadi'];
                            $_SESSION["sifre"] = $_POST['sifre'];
                            header("Refresh:2; url=dashboard.php");
                        } else {
                            ?>
                            <div class="alert alert-danger" role="alert"><strong><i class="fas fa-ban"></i> Bilgileriniz
                                    Hatalı!</strong></div><?php
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
</div>