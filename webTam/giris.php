<?php
    session_start(); //oturum desteği verdik
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BS Site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" fill-rule="evenodd" class="navbar-nav-svg d-inline-block align-text-top" viewBox="0 0 40 41" role="img"><title>Open Collective</title><path fill-opacity=".4" d="M32.8 21c0 2.4-.8 4.9-2 6.9l5.1 5.1c2.5-3.4 4.1-7.6 4.1-12 0-4.6-1.6-8.8-4-12.2L30.7 14c1.2 2 2 4.3 2 7z"></path><path d="M20 33.7a12.8 12.8 0 0 1 0-25.6c2.6 0 5 .7 7 2.1L32 5a20 20 0 1 0 .1 31.9l-5-5.2a13 13 0 0 1-7 2z"></path></svg>                Tuzla Bilişim 
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
            <div class="collapse navbar-collapse" id="mynavbar">
                <div class="navbar-nav me-auto">
                    <div class="btn-group btn-group">
                        <a href="index.php" type="button" class="btn btn-warning">Ana Sayfa</a>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown">Kategoriler</button>
                            <div class="dropdown-menu">
                                <?php
                                    $baglan = mysqli_connect("localhost", "root", "" ,"webtam");
                                    $sorgu = mysqli_query( $baglan ,"SELECT * FROM kategori");
                                    while($gelen = mysqli_fetch_assoc($sorgu)){
                                            echo '<a class="dropdown-item" href="urunler.php?id='.$gelen["kimlik"].'">'.$gelen["kategoriAdi"]."</a>";
                                    }
                                ?>                                
                            </div>
                        </div>
                        <a type="button" class="btn btn-primary"  href="giris.php"> 
                            <?php
                                if (isset($_SESSION["oturumVar"])) {
                                    if ($_SESSION["oturumVar"] == "evet") {
                                        echo "Hoş geldiniz ".$_SESSION["kullaniciAdi"];
                                    }
                                } else
                                echo "Giriş" ;    
                            ?>
                        </a>
                    </div>
                </div>
                <form class="d-flex" action="urunlerListe.php" method="get">
                    <input class="form-control me-2" type="text" name="ara" placeholder="Arama" autofocus>
                    <input class="btn btn-primary" type="submit">Ara</button>
                </form>
            </div>
        </div>
    </nav>  
    <div class="container mt-5 p-5">
        <div class="row">
            <div class="col-6" >
                <form action="" method="POST" >
                    Ad <input type="text" name="ad" value="<?php if(isset($_COOKIE["cerez"])) echo $_COOKIE["cerez"];?>"> <br>
                    Parola <input type="password" name="sifre"> <br>
                    <input type="submit" value="Giriş"> <label><input type="checkbox" name="hatirla" value="evet" > Beni Hatırla</label>
                </form>  
                <br>
                <a class="btn btn-danger" type="button" href="giris.php?cikis=evet">Çıkış</a>  <a class="btn btn-danger" type="button" href="giris.php?unut=evet">Beni Unut</a>     
                <?php
                    $baglan = mysqli_connect("localhost", "root", "" , "webtam");
                    if(isset($_POST["ad"])){
                         $sorgu = mysqli_query($baglan, "SELECT * FROM kullanici WHERE ad = '".$_POST["ad"]."' AND parola = '".$_POST["sifre"]."' ")  ;
                         $kayit = mysqli_num_rows($sorgu); //kaç kayıt var
                         if($kayit >0 ) {
                             echo "Hoş geldiniz...";
                             $_SESSION["kullaniciAdi"] = $_POST["ad"];
                             $_SESSION["oturumVar"] = "evet";
                             if(isset($_POST["hatirla"]) && $_POST["hatirla"] == "evet") {
                                 setcookie("cerez",  $_POST["ad"], time() + (86400 * 30));
                             }
                         } else 
                            echo "Hatalı kullanıcı adı veya parola girdiniz.";
                     }
                     if(isset($_GET["cikis"])){
                          session_destroy();  
                     }
                     if(isset($_GET["unut"])){
                        setcookie("cerez",  "boş", time() - (86400 * 30));
                     }
                ?>       
           </div>   
        </div>
    </div>
   
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Dipnotta Facebook, Instagram gibi linkler olsun</p>
    </div>
</body>

</html>