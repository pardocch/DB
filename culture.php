<?php session_start(); ?>
<?php error_reporting(0);?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>文化遺產</title>
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <link href="./css/modern-business.css" rel="stylesheet">
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="./index.php">龍門國小遊學特色網</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="./culture.php">文化遺產</a>
                    </li>
                    <li>
                        <a href="./community.php">社區資源</a>
                    </li>
                    <li>
                        <a href="./route.php">路線</a>
                    </li>
                    <li>
                        <a href="./media.php">數位串流</a>
                    </li>
                    <li>
                        <a href="./download.php">下載區</a>
                    </li>
                <?php if(($_SESSION['username'] != null)&&(($_SESSION['au'] != 0)||($_SESSION['au'] == 0))){ ?>
                    <li>
                        <a href="./logout.php">登出</a>
                    </li>
                <?php }else{?>
                    <li>
                        <a href="./logon.php">登入</a>
                    </li>
                <?php }?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><strong>文化遺產</strong> </h1>
            </div>
        </div>
      	<div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="img/南寮村落/1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><strong>南寮村落</strong></h3>
                <h4>與本校距離 2.7 km</h4>
                <p>南寮聚落具有豐富澎湖傳統文化足跡，其特色活動牛屎窟、坐牛車等體驗活動，以及修復完成的閩南式古厝，更是不可錯過的知性景點，近年來為各大媒體競相採訪的熱門觀光景點。</p>
                <strong><a class="btn btn-primary" href="https://www.google.com.tw/search?q=%E5%8D%97%E5%AF%AE%E6%9D%91%E8%90%BD&oq=%E5%8D%97%E5%AF%AE%E6%9D%91%E8%90%BD&aqs=chrome..69i57j0l4.6065j0j1&sourceid=chrome&ie=UTF-8">GOOGLE !</a></strong>
            </div>
        </div>
      <hr>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="img/北寮奎壁山/1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><strong>北寮奎壁山</strong></h3>
                <h4>與本校距離 4.2 km</h4>
                <p>北寮奎壁山的「奎壁聯輝」為澎湖舊八景之一，岸邊退潮時會露出約 300 公尺的礫石步道，可踏浪步行至無人小島「赤嶼」。當潮水漸退，海中緩緩浮現的通道，接連著山與島，彷若「摩西分海」的壯闊，是近年澎湖本島最熱鬥的景點。奎壁山亦為「澎湖地質公園」的一園區，是一處陸連島地形，其東方有一岩脈延伸至赤嶼。附近海崖主要為不規則柱狀玄武岩所構成，周圍地質地形有：斷層、岩脈、岩床、壺穴、海蝕柱、柱狀玄武岩。</p>
                <a class="btn btn-primary" href="https://www.google.com.tw/search?q=%E5%8C%97%E5%AF%AE%E5%A5%8E%E5%A3%81%E5%B1%B1&oq=%E5%8C%97%E5%AF%AE%E5%A5%8E%E5%A3%81%E5%B1%B1&gs_l=serp.12..35i39k1j0l2j0i5i30k1.133236.133236.0.134286.1.1.0.0.0.0.87.87.1.1.0....0...1.1.64.serp..0.1.85.AUik8JpM9Ko">GOOGLE ! <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
      </div>
      <hr>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="img/青螺濕地/1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><strong>青螺濕地</strong></h3>
                <h4>與本校距離 5.2 km</h4>
                <p>青螺濕地位於湖西鄉青螺村北岸，溼地廟前蔚然成林的紅樹林、海茄苳是由人工復育而成，區域總面積達 100 公頃，為本縣唯一的「國家級溼地」。<br>
                青螺沙嘴是澎湖本島最大的鉤形沙嘴，長度約 150 公尺，沙嘴附近的海域有冬季紫菜養殖區及豐富多樣的鳥類及海洋生物，是居民進行潮間帶活動的重要場域。多樣化的環境，也提供了招潮蟹生長所需，每到秋冬季節，更有許多候鳥前來過冬，其中以黑面琵鷺的發現最令人振奮。
				</p>
                <a class="btn btn-primary" href="https://www.google.com.tw/search?q=%E9%9D%92%E8%9E%BA%E6%BF%95%E5%9C%B0&oq=%E9%9D%92%E8%9E%BA%E6%BF%95%E5%9C%B0&gs_l=serp.3..35i39k1j0i5i30k1.16337.16337.0.17660.1.1.0.0.0.0.70.70.1.1.0....0...1.1.64.serp..0.1.69.f8MxSvz3-kA">GOOGLE ! <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
      </div>
      <hr>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="img/紅羅磚窯場/1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><strong>紅羅磚窯廠</strong></h3>
                <h4>與本校距離 4.7 km</h4>
                <p>於本鄉西溪國小附近的紅羅磚窯廠，是澎湖唯一之「階梯窯」形式磚廠，南北共有三座窯場。全盛時期每座登窯滿載產量，可產四十多萬塊磚，曾是台灣重要的紅磚供應來源。然時光流轉，機械化磚業取代了傳統的紅羅磚窯場，現今斑駁外牆磚窯，訴說著歲月的故事。
				</p>
                <a class="btn btn-primary" href="https://www.google.com.tw/search?q=%E7%B4%85%E7%BE%85%E7%A3%9A%E7%AA%AF%E5%A0%B4&oq=%E7%B4%85%E7%BE%85%E7%A3%9A%E7%AA%AF%E5%A0%B4&gs_l=serp.3..35i39k1.22437.22437.0.23344.1.1.0.0.0.0.71.71.1.1.0....0...1.1.64.serp..0.1.69.yC5vMNkQVRg">GOOGLE ! <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
      </div>
      <hr>
        <div class="row">
            <div class="col-md-7">
                <a href="#">
                    <img class="img-responsive" src="img/西溪貝扣工廠/1.jpg" alt="">
                </a>
            </div>
            <div class="col-md-5">
                <h3><strong>西溪貝扣工廠</strong></h3>
                <h4>與本校距離 4.7 km</h4>
                <p>西溪昭日貝扣工廠（後更名為大光工業社）創建於日昭和年間，是澎湖唯一貝殼磨製鈕扣工廠，利用鐘螺等貝殼經鑽台加工、漂白、拋光、鑽孔後製成鈕扣，外銷到美日等國，成為最具特色貝殼鈕扣工廠。後來經營轉向花生油、沙丁魚、紅螺、小管、魚丸、海菜、海膽、珊瑚等，也名噪一時。
				</p>
                <a class="btn btn-primary" href="https://www.google.com.tw/search?q=%E8%A5%BF%E6%BA%AA%E8%B2%9D%E6%89%A3%E5%B7%A5%E5%BB%A0&oq=%E8%A5%BF%E6%BA%AA%E8%B2%9D%E6%89%A3%E5%B7%A5%E5%BB%A0&gs_l=serp.3..35i39k1.29961.29961.0.31105.1.1.0.0.0.0.71.71.1.1.0....0...1.1.64.serp..0.1.70.WdV4811k1vE">GOOGLE ! <span class="glyphicon glyphicon-chevron-right"></span></a>
            </div>
      </div>
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <script src="./js/jquery.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>
