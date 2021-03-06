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

    <title>社區資源</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                <a class="navbar-brand" href="index.php">龍門國小遊學特色網</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="culture.php">文化遺產</a>
                    </li>
                    <li>
                        <a href="community.php">社區資源</a>
                    </li>
                    <li>
                        <a href="route.php">路線</a>
                    </li>
                    <li>
                        <a href="media.php">數位串流</a>
                    </li>
                    <li>
                        <a href="download.php">下載區</a>
                    </li>
                <?php if(($_SESSION['username'] != null)&&(($_SESSION['au'] != 0)||$_SESSION['au'] == 0)){ ?>
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
    <div class="row">
    <div class="col-lg-12 page-header">
      <h2 class="col-lg-offset-2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;社區資源</h2>
    </div>
  </div>
    <div class="container">
       <div class="col-lg-4 col-sm-12 text-center"> <img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="img/龍門村落/1.jpg" data-holder-rendered="true">
        <h3>龍門村落</h3>
        <p>龍門村為澎湖知名漁港，漁產品量相當豐富，其中海膽捕撈量本島最豐，可做為本遊學計畫海洋創作的材料來源；村落為濱海自行車步道的起點，是本計畫執行時最安全的行進路線，沿途經過海洋休閒活動盛行的後灣沙灘、潮間帶螺貝撿拾點的土地公前海蝕平台、抱墩與石滬等漁法場域的菓葉潮間帶、南寮聚落與北寮聚落等。</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="img/南寮村落/2.jpg" data-holder-rendered="true">
        <h3>南寮村落</h3>
        <p>南寮村位於湖西鄉北寮村的南邊小聚落，舊名龜壁港社，隨著時代的變遷，留在村莊裡的多為老年人及小孩，正因如此，村中仍然保留傳統咾咕石古厝、水井、菜宅等傳統農村聚落特色。近年來，社區居民積極進行農村再造，以凸顯南寮村在地意象，同時傳承社區耆老的古早記憶，賦予古老農村新生命，於是魚灶煠魚、乘坐牛車、牛屎餅製作、菅芒箄編織…等，成為大家來南寮村必定體驗的行程活動。
</p>
      </div>
      <div class="col-lg-4 col-sm-12 text-center"><img class="img-circle" alt="140x140" style="width: 140px; height: 140px;" src="img/尖山村落/1.jpg" data-holder-rendered="true">
        <h3>尖山村落</h3>
        <p>尖山村為澎湖縣知名的羊隻畜牧場，此外顯濟殿(舊廟)具有多項在地特色與文化資產價值，包括：廟貌形式師承本縣國定古蹟「澎湖天后宮」，為已故的著名大木匠師葉根壯師傅設計規劃；廟顏之木雕鑿花，為雕鑿大師黃良師傅弟子之作，具有美學價值；門神及彩繪作品，為文化部指定保存技術者(人間國寶)黃友謙師傅及其父黃文華作品。尖山發電廠，是臺灣的一座火力暨風力發電廠，位於澎湖縣湖西鄉，由台灣電力公司經營管理，是目前澎湖本島唯一一座火力發電廠；廠區設有能源體驗教室與廠區導覽服務，是學習能源教育的重要場域，並與龍門國小合作完成「走讀湖西」教材與荸薺復育區，為深耕在地的機關與社區合作的良好示範。</p>
      </div>
      <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; 虎尾科技大學資工系 2017</p>
                </div>
            </div>
        </footer>
      </div>
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
</body>
</html>
