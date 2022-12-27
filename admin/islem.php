<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
<?php 
session_start();

if (isset($_SESSION["oturum"])){
include 'menu.php';
include '../baglan/config.php';
?>
<div class="container">
	<div class="row">
		<br><br><br><br>
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-default">			  		
				<title>Oyuncu Sorgulama (Kurucu)</title>
				<div class="panel-heading">
					<center>					
						<h3 class="panel-title"><i class="fas fa-user-alt"></i> Oyuncu Sorgulama (Kurucu)</h3>
					</center>
				</div>
				<div class="panel-body">
					<form action="" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Kullanıcı Adı Giriniz." name="key" type="text">                         
								<br>
                                <input class="btn btn-danger" name="banla" type="submit" value="Banla">
                                <input class="btn btn-danger" name="banac" type="submit" value="Ban Aç">
                                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <label for="select_1">İşlemler</label>
                                &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; <input class="btn btn-success" type="submit" name ="submit"/>
                                <br><br>
                                    <select class="form-control" id="select_1" name="thenumbers">
                                        <option>Rank Seçimi</option>
                                        <option value="0">Rank 0</option>
                                        <option value="1">Rank 1</option>
                                        <option value="2">Rank 2</option>
                                        <option value="3">Rank 3</option>
                                        <option value="4">Rank 4</option>
                                        <option value="5">Rank 5</option>
                                        <option value="6">Rank 6</option>
                                        <option value="7">Rank 7</option>
                                        <option value="8">Rank 8</option>
                                        <option value="9">Rank 9</option>
                                        <option value="10">Rank 10</option>
                                    </select>
                                <br>  
                                <br>
								<input class="btn btn-lg btn-info btn-block" name="gonder" type="submit" value="Sorgula">
                            </div>                                   
						</fieldset>
					</form>
                   
					<?php
    
                    if (isset($_POST["submit"])){
                        if (is_numeric($_POST["thenumbers"])) {
                            $key = $_POST['key'];
                            $queryel = $db->query("UPDATE `accounts` SET admin = '{$_POST["thenumbers"]}'  WHERE username = '{$key}'");
                        }
                    }   
					if (isset($_POST['banla'])){
						$key = $_POST['key'];
						$querye = $db->query("UPDATE `accounts` SET banned='1', banned_by='WebSystem', banned_reason='Sistem Tarafından Banlandınız. İletişime Geçiniz.'  WHERE username = '{$key}'");                                                     										
					}
					if (isset($_POST['banac'])){
						$key = $_POST['key'];
						$queryen = $db->query("UPDATE `accounts` SET banned='0', banned_by='null', banned_reason='null'  WHERE username = '{$key}'");
                    }                                         
					if (isset($_POST['gonder'])){                                                   
						$key = $_POST['key'];
					if (empty($_POST['key'])){
						?><center><div class="alert alert-danger" role="alert"><strong><i class="fas fa-ban"></i>  Kullanıcı adı boş bırakılamaz!</strong> </div></center>
						<?php
					} else {

						$query = $db->query("SELECT * FROM accounts WHERE username = '{$key}'")->fetch(PDO::FETCH_ASSOC);
						if ( $query ){
							$v = $query['adminjail'];
							$b = $query['banned'];
							$bby = $query['banned_by'];
							$bbr = $query['banned_reason'];
							$kad = $query['username'];

							$ar = $query['adminreports'];
							$adm = $query['admin'];
							$adms = "Admin Değil";
							$h = "Bilgi alınamadı!";
							$bs = "Bilgi alınamadı!";
							if($v == 1) {
								$h = "Hapiste";
							} else{
								$h = "Hapiste Değil";
									
							}
							if($b == 1) {
								$bs = "$bby Tarafından Banlandı.";
							} else{
								$bs = "Banlı Değil";
								$bbr = "Banlı Değil";
									
							}
							if($adm >= 1) {
								$adms = "$adm";
							} else{
								$adms = "Admin Değil";
									
							}
							
							?><div class="alert alert-success" role="alert"><strong><i class="fas fa-check"></i> Oyuncu Bulundu</strong> </div>
							<center><strong style="color:red">Bilgileri</strong></center>
							<br>
							<center><strong>Kullanıcı Adı:  <?php echo $query['username']; ?></strong> 
								<br>
								<strong>Admin Seviyesi: <?php echo $adms; ?></strong>

								<br>
								<strong>Baktığı Rapor Sayısı: <?php echo $ar; ?></strong>

								<br>
								<strong>Son Giriş Tarihi: <?php echo $query['lastlogin']; ?></strong>

								<br> 
								<strong>Hapis Durumu: <?php echo $h; ?></strong>

								<br>
								<strong>Ban Durumu: <?php echo $bs; ?></strong>

								<br> 
								<strong>Ban Sebebi: <?php echo $bbr; ?></strong>

								<br>
								<strong>Serial: <?php echo $query['mtaserial']; ?></strong>

								<br></center>
								<br>
								<br>
                       
									<?php
									} else {
										?><div class="alert alert-danger" role="alert"><strong><i class="fas fa-ban"></i> Bu kullanıcı adında oyuncu bulunamadı!</strong> </div>
										<?php
									}
								}
							}
							?>


						</div></div>

					</div>
				</div>
			</div>
		</div>
	</div>
 <?php
	} else {
	  header("Location: index.php");
	}
?>