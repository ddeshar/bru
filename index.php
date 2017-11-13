<!DOCTYPE html>
<html lang="en">

    <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>บ้านสวนครัว</title>
    <LINK REL="icon" type="img/png" href="index_page/img/111.png">

    <!-- Bootstrap core CSS -->
    <link href="index_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="index_page/css/half-slider.css" rel="stylesheet">
    <style>
    #pichead {
    border:solid 1px white;
    width:45px;
    height:45px;
    -webkit-border-radius:10px;
    -moz-border-radius:10px;
    border-radius:10px;
    background:white;
    }
    </style>
    </head>

    <body >

        <!-- Navigation -->
          <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
              <img id="pichead" src="index_page/img/111.png" width="45" height="45"> &nbsp; &nbsp; &nbsp; &nbsp;
                <a class="navbar-brand" href="#">การพัฒนาระบบบริหารจัดการสัจจะออมทรัพย์และกองทุนหมู่บ้าน</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item active"><a class="nav-link" href="index.php">หน้าแรก<span class="sr-only">(current)</span></a></li>
                  <li class="nav-item"><a class="nav-link" href="index_page/data.php">ข้อมูล</a></li>
                  <li class="nav-item"><a class="nav-link" href="index_page/knowledge.php">กฎหมายและระเบียบ</a></li>
                  <li class="nav-item"><a class="nav-link" href="admin/index.php">เข้าสู่ระบบ</a></li>
                  <li class="nav-item"><a class="nav-link" href="index_page/contact.php">ติดต่อ</a></li>
                </ul>
              </div>
            </div>
          </nav>
          <br>
          <br>


            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>

              <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->

                <div class="carousel-item active" style="background-image: url('index_page/img/1.png')">
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>กองทุนหมู่บ้าน</h3> -->
                    <!-- <p>ลดรายจ่ายเพิ่มราย</p> -->
                  </div>
                </div>

                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('index_page/img/s1.png')">
                  <div class="carousel-caption d-none d-lg-block">
                    <!-- <h3>Second Slide</h3>
                    <p>This is a description for the second slide.</p> -->
                  </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('index_page/img/s2.png') " height="250" width="704">
                  <div class="carousel-caption d-none d-md-block">
                    <!-- <h3>Third Slide</h3>
                    <p>This is a description for the third slide.</p> -->
                  </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url('index_page/img/s3.png') " height="250" width="704">
                <div class="carousel-caption d-none d-md-block">
                  <!-- <h3>Third Slide</h3>
                  <p>This is a description for the third slide.</p> -->
                </div>
              </div>
              </div>

              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>

          <!-- Page Content -->
          <section class="py-5">
          <div class="container">
          <h1>ข่าวประชาสัมพันธ์</h1>
          <p>แบบฟอร์มสมัครสมาชิก</p>
          <p>   <a href="index_page/file/memberadd.pdf" target="_blank">CLICK! </a></P>
          <p>แบบฟอร์มการขอกู้เงินกองทุน</p>
          <p>   <a href="index_page/file/frm_submitted.pdf" target="_blank">CLICK! </a></P>

          </div>
          </section>

            <!-- Footer -->
            <?php require_once("index_page/include/_foot.php"); ?>

</body>
</html>
