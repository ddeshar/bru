<?php
$page = 'Admin';
$title = 'Admin Page';
$css = <<<EOT
<!--page level css -->
 <script type="text/javascript" src="https://www.google.com/jsapi"></script>
<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          ข้อมูลกรรมการกองทุนหมู่บ้าน
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="18" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">DataTables</a>
            </li>
            <li class="active">
              ข้อมูลกรรมการกองทุนหมู่บ้าน
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box default">
                    <div class="portlet-title">
                        <div class="caption"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                          ตารางข้อมูลกองกรรมการกองทุนหมู่บ้าน
                        </div>
                    </div>
                    <div class="portlet-body">
                        <?php
                        // count data by today
                          // เลือกทั้งหมดจากฐานข้อมูลโดยเข้าเงื่อนไขว่า (เลือกเฉพาะวันนี้)
                          $query = "SELECT * FROM `deposit` WHERE fak_date = CURRENT_DATE()";
                          // คำสั่งการเชื่อมต่อฐานข้อมูล
                          $select_all_deposit = mysqli_query($link,$query);
                          // นับจำนวนตามเงื่อนไขในฐานข้อมูล
                          $deposit_count = mysqli_num_rows($select_all_deposit);

                          // count data by month and year
                          $query = "SELECT * FROM `deposit` WHERE YEAR(fak_date) = 2017 AND MONTH(fak_date) =9";
                          $select_date_month = mysqli_query($link,$query);
                          $month = mysqli_num_rows($select_date_month);

                          // count data by member sex Male
                          $query = "SELECT * FROM member WHERE id_gender = 1";
                          $select_all_boy = mysqli_query($link,$query);
                          $boy_count = mysqli_num_rows($select_all_boy);

                          // count data by member sex Female
                          $query = "SELECT * FROM member WHERE id_gender = 2";
                          $select_all_girl = mysqli_query($link,$query);
                          $girl_count = mysqli_num_rows($select_all_girl);
                        ?>
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <div id="chart_div" style="width: 'auto'; height: 500px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
</aside>
<!-- right-side -->

<script type="text/javascript">
  google.load("visualization", "1.1", {packages:["bar"]});
  google.setOnLoadCallback(drawChart);

    function drawChart() {
    var data = google.visualization.arrayToDataTable([
      ['ข้อมูลสถิติ', 'จำนวน'],
      <?php
        $element_text = ['ชาย','หญิง','ญิง','กรกฎา'];
        $element_count = [$boy_count,$deposit_count,$girl_count,$month];

        for($i =0;$i <4; $i++){
          echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
        }
      ?>
    ]);

    var options = {
      chart: {
        title: 'This is test document',
        subtitle: 'Hello wortld',
      }
    };

    var chart = new google.charts.Bar(document.getElementById('chart_div'));

    chart.draw(data, options);
}
</script>
<?php
require_once('include/_footer.php');
?>


<script type="text/javascript" src="asset/vendors/datatables/select2.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/js/pages/table-editable.js"></script>
</body>
</html>
