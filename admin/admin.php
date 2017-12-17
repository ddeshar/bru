<?php
$page = 'Admin';
$title = 'Admin Page';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/fullcalendar/css/fullcalendar.css" rel="stylesheet" type="text/css" />
<link href="asset/css/pages/calendar_custom.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" media="all" href="asset/vendors/jvectormap/jquery-jvectormap.css" />
<link rel="stylesheet" href="asset/vendors/animate/animate.min.css">
<link rel="stylesheet" href="asset/css/only_dashboard.css" />

<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>
<aside class="right-side">
    <section class="content-header">
        <h1>ยินดีต้อนรับคุณ <?=$s_login_name?></h1>
        อีเมล์<?=$s_login_email?>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInLeftBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 text-right">
                                    <span>
                                        เงินกองทุน (เงินต้น)
                                    </span>
                                    <div class="number">
                                      <?php
                                        $thoon = "SELECT sum(fund_money) FROM `fund`";
                                        $thoonresult = mysqli_query($link,$thoon);
                                        while ($row = mysqli_fetch_array($thoonresult)){
                                          $thoonmoney = $row["sum(fund_money)"];
                                        }
                                      ?>
                                      <?php echo number_format($thoonmoney);?>
                                    </div>
                                </div> <i class="livicon  pull-right" data-name="briefcase" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <!-- <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement1.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement1.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInUpBig">
                <!-- Trans label pie charts strats here-->
                <div class="lightbluebg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>
                                        จำนวนเงินที่อนุมัติไปแล้ว
                                    </span>
                                    <div class="number">
                                      <?php
                                        $apppice = "SELECT sum(app_pice) FROM `promise`";
                                        $apppiceres = mysqli_query($link,$apppice);
                                        while ($row = mysqli_fetch_array($apppiceres)){
                                          $pice = $row["sum(app_pice)"];
                                        }
                                      ?>
                                      <?php echo number_format($pice);?>
                                    </div>
                                </div>
                                <i class="livicon pull-right" data-name="check" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <!-- <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement2.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement2.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-md-6 margin_10 animated fadeInDownBig">
                <!-- Trans label pie charts strats here-->
                <div class="goldbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>
                                        รายได้จากดอกเบี้ยทั้งหมด
                                    </span>
                                    <div class="number">

                                    <?php
                                      $percentage = ($pice * 6 * 2) / 100;

                                      $performat = number_format($percentage, 0, '.', ',');

                                      echo $performat;
                                    ?></div>
                                </div>
                                <i class="livicon pull-right" data-name="piggybank" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <!-- <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement3.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement3.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 margin_10 animated fadeInRightBig">
                <!-- Trans label pie charts strats here-->
                <div class="palebluecolorbg no-radius">
                    <div class="panel-body squarebox square_boxs">
                        <div class="col-xs-12 pull-left nopadmar">
                            <div class="row">
                                <div class="square_box col-xs-7 pull-left">
                                    <span>
                                        ยอดคงเหลือเงินกองทุน
                                    </span>
                                    <div class="number">
                                      <?php
                                        $subtract = $thoonmoney - $pice;
                                        $subtracts = number_format($subtract, 0, '.', ',');


                                        echo $subtracts;
                                      ?>
                                    </div>
                                </div>
                                <i class="livicon pull-right" data-name="money" data-l="true" data-c="#fff" data-hc="#fff" data-s="70"></i>
                            </div>
                            <!-- <div class="row">
                                <div class="col-xs-6">
                                    <small class="stat-label">Last Week</small>
                                    <h4 id="myTargetElement4.1"></h4>
                                </div>
                                <div class="col-xs-6 text-right">
                                    <small class="stat-label">Last Month</small>
                                    <h4 id="myTargetElement4.2"></h4>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/row-->

    </section>
</aside>
<?php
require_once('include/_footer.php');
?>
<!--  todolist-->
<script src="asset/js/todolist.js"></script>
<!-- EASY PIE CHART JS -->
<script src="asset/vendors/charts/easypiechart.min.js"></script>
<script src="asset/vendors/charts/jquery.easypiechart.min.js"></script>
<!--for calendar-->
<script src="asset/vendors/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>
<script src="asset/vendors/fullcalendar/calendarcustom.min.js" type="text/javascript"></script>
<!--   Realtime Server Load  -->
<script src="asset/vendors/charts/jquery.flot.min.js" type="text/javascript"></script>
<script src="asset/vendors/charts/jquery.flot.resize.min.js" type="text/javascript"></script>
<!--Sparkline Chart-->
<script src="asset/vendors/charts/jquery.sparkline.js"></script>
<!-- Back to Top-->
<script type="text/javascript" src="asset/vendors/countUp/countUp.js"></script>
<!--   maps -->
<script src="asset/vendors/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="asset/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<script src="asset/vendors/jscharts/Chart.js"></script>
<script src="asset/js/dashboard.js" type="text/javascript"></script>


</body>
</html>
