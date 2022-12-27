<?php
session_start();

if (isset($_SESSION["oturum"])) {
    ?>


    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../favicon.ico">

        <title>İşlemler </title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
              integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
              crossorigin="anonymous">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
              integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp"
              crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
              integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
              crossorigin="anonymous">

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
                integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
                crossorigin="anonymous"></script>

    </head>

    <body>

    <div class="container">
        <!-- Menü -->

        <?php include 'menu.php'; ?>
        <!-- Menü -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <center>Yönetici Paneli</center>
            </div>
            <div class="panel-body">


                <?php
                include '../baglan/config.php';
                $sorgu = $db->prepare("SELECT COUNT(*) FROM accounts");
                $sorgu->execute();
                $say = $sorgu->fetchColumn();
                $adms = $db->prepare("SELECT COUNT(*) FROM accounts WHERE admin != 0 AND admin < 100 ORDER BY admin DESC");
                $adms->execute();
                $admssay = $adms->fetchColumn();

                ?>


                <center><label>Hoşgeldin <?php echo $_SESSION["kadi"]; ?>!</label><br>
                    <label>Toplamda <strong style="color:red"><?php echo $say ?></strong> Account var.</label><br>
                    <label>Toplamda <strong style="color:red"><?php echo $admssay ?></strong> Admin var.</label><br>


                </center>
            </div>
        </div>


    </body>
    </html>


    <?php
} else {
    header("Location: index.php");
}


?>