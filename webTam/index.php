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
                        <a type="button" class="btn btn-primary" href="giris.php"> 
                            <?php
                                if (isset($_SESSION["oturumVar"])) {
                                    if ($_SESSION["oturumVar"] == "evet") {
                                        echo "Hoş geldiniz ".$_SESSION["kullaniciAdi"];
                                    }
                                }   else
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
    <div class="container-fluid mt-5 p-5 bg-warning text-black text-center">
        <h2 class="text-danger">Haydi Yapalım</h2>
        <h1>AMP12A - Bootstrap PHP Sitesi 2022</h1>
        <p>Responsive sitemiz!</p>
    </div>
    <div class="container mt-5">
        <div class="row">
            <?php
            $baglan = mysqli_connect("localhost", "root", "" ,"webtam");
            $sorgu = mysqli_query( $baglan ,"SELECT * FROM urun");
            while($gelen = mysqli_fetch_assoc($sorgu)){
                    echo '<div class="col-sm-4 p-3"><h3>'.$gelen["urunAdi"].'</h3><p>'.$gelen["fiyat"]."₺</p>";
                    echo "<a href='detay.php?id=".$gelen["kimlik"]."'>";
                    echo '<img src="uploads/'.$gelen["resmi"].'" class="img-fluid img-thumbnail  rounded-3 mx-auto d-block">';                    
                    echo "</a></div>";
            }
            ?>                        
        </div>
    </div>
    <div class="container mt-3">
        <h2>Kampanya Ürünlerimiz</h2>
        <p>Burada son çıkan ve sevilen ürünün bilgileri var</p>
        <div class="card img-fluid" style="width:300px">
            <img class="card-img-top" src="https://picsum.photos/300/200?random=4" alt="Card image" style="width:100%">
            <div class="card-img-overlay">
                <h4 class="card-title">iPhone 15</h4>
                <p class="card-text text-primary">1TB bellek ve 32 GB RAM.</p>
                <a href="#" class="btn btn-primary">Detaylar</a>
            </div>
        </div>
    </div>
    <hr>
    <!-- Carousel -->
    <div id="demo" class="carousel slide p-4" data-bs-ride="carousel">

        <!-- Indicators/dots -->
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>

        <!-- The slideshow/carousel -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/1080/300?random=5" alt="İstanbul" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3 class="text-primary">İstanbul</h3>
                    <p>2 Kıtanın birleştiği şehir!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1080/300?random=6" alt="Ankara" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3 class="text-primary">Ankara</h3>
                    <p>Teşekkürler Başkent!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://picsum.photos/1080/300?random=7" alt="Antalya" class="d-block" style="width:100%">
                <div class="carousel-caption">
                    <h3 class="text-primary">Antalya</h3>
                    <p>Turizm merkezimiz!</p>
                </div>
            </div>
        </div>

        <!-- Left and right controls/icons -->
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
    </div>

    <hr>
    <div class="alert alert-success alert-dismissible mx-5">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <strong>Başarılı!</strong> Mesajınız gönderildi.
    </div>

    <form action="" class="m-5 p-2 border">
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Epostanız:</label>
            <input type="email" class="form-control" id="email" placeholder="Eposta Adresiniz" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Mesajınız:</label>
            <textarea class="form-control" placeholder="Mesajınız" name="mesaj"></textarea>
        </div>
        <div class="form-check mb-3">
            <label class="form-check-label">
      <input class="form-check-input" type="checkbox" name="remember">Mesajımda sorun yoktur
    </label>
        </div>
        <button type="submit" class="btn btn-primary">Yolla</button>
    </form>
    <div class="mt-5 p-4 bg-dark text-white text-center">
        <p>Dipnotta Facebook, Instagram gibi linkler olsun</p>
    </div>
</body>

</html>