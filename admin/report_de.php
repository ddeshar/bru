<?php
$page = 'blank';
$title = 'Blank Page';
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
    <section class="content-header">
        <h1>Blank page</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    ข้อความใส้ตรงนี้นะจะ
                </a>
            </li>
            <li>Pages</li>
            <li class="active">Blank page</li>
        </ol>
    </section>
    <section class="content">
      <div id="container" style="width: 1100px;
      height: 500px;
      position: absolute;
      top: 32%;
      left: 26%;
      margin-top: -100px;
      margin-left: -100px;"></div>
    </section>

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
          text: 'AAPL Stock Volume'
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

</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
<script type="text/javascript" src="asset/vendors/datatables/select2.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/js/pages/table-editable.js"></script>
</body>
</html>
