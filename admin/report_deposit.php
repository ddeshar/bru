<?php
$page = 'Admin';
$title = 'Admin Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>

<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          แสดงรายงานการฝาก และถอนเงินสัจจะออมทรัพย์
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
              รายงานการฝาก และถอนเงินสัจจะออมทรัพย์
            </li>
        </ol>
    </section>
    <section class="content">
      <div class="portlet-body">
          <?php
            $query = "SELECT * FROM `deposit`";
            $select_all_deposit = mysqli_query($link,$query);
            $deposit_count = mysqli_num_rows($select_all_deposit);
          ?>
    </section>
  </aside>
<div id="container" style="width: 1100px;
height: 500px;
position: absolute;
top: 32%;
left: 26%;
margin-top: -100px;
margin-left: -100px;"></div>

<script type="text/javascript">
$.getJSON('https://www.highcharts.com/samples/data/jsonp.php?filename=aapl-v.json&callback=?', function (data) {
    // create the chart
    Highcharts.stockChart('container', {
        chart: {
            alignTicks: false
        },

        rangeSelector: {
            selected: 0
        },

        title: {
            text: 'รายงานการฝาก'
        },

        series: [{
            type: 'column',
            name: 'AAPL Stock Volume',
            data: data,
            dataGrouping: {
                units: [[
                    'week', // unit name
                    [1] // allowed multiples
                ], [
                    'month',
                    [1, 2, 3, 4, 6]
                ]]
            }
        }]
    });
});
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
