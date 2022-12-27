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
    <title>Admin Listesi</title>
    <?php include 'menu.php';


    include '../baglan/config.php';

    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <center>Admin Listesi</center>
        </div>

        <div class="panel">
            <table id="responsecontainer" class="table">
                <thead>
                <tr>
                    <th scope="col">Account ID</th>
                    <th scope="col">Username</th>
                    <th scope="col">Son Girşi Tarihi</th>
                    <th scope="col">Admin</th>
                    <th scope="col">Raporlar</th>
                    <th scope="col">Serial</th>
                </tr>
                </thead>
                <tbody>
                <?php $query = $db->query("SELECT * FROM accounts WHERE admin != 0 AND admin < 100 ORDER BY admin DESC", PDO::FETCH_ASSOC);
                foreach ($query as $yazi) {
                    ?>
                    <tr>

                        <th><?php echo $yazi['id']; ?></th>
                        <th><?php echo $yazi['username']; ?></th>
                        <th><?php echo $yazi['lastlogin']; ?></th>
                        <th><?php echo $yazi['admin']; ?></th>
                        <th><?php echo $yazi['adminreports']; ?></th>
                        <th><?php echo $yazi['mtaserial']; ?></th>
                    </tr>
                    <?php

                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </div><?

    ?>  </div>


    <?php
} else {
    header("Location: index.php");
}


?>