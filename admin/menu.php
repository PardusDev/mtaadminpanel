   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
   <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>



   <div class="container">
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/admin/dashboard.php"><i class="fas fa-home"></i> Anasayfa</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Account İşlemleri <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/islem.php"> Hesap İşlemleri</a></li>
                <li><a href="/admin/acadmin_list.php"> Adminler</a></li>
              </ul>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> Yönetici İşlemleri <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/admin/admin_add.php"> Yönetici Ekle</a></li>
                <li><a href="/admin/admin_list.php"> Yönetici Listesi</a></li>
                <li><a href="/admin/admin_remove.php">Yönetici Sil</a></li>
              </ul>

              <li><a href="/admin/cikis.php"><i class="fas fa-sign-out-alt"></i> Çıkış Yap</a></li>

            </li>
          </ul>

        </ul>
      </div>
    </div>
  </nav>
