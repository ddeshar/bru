<?php
$page = 'Admin';
$title = 'Admin Page';
$css = <<<EOT
<!--page level css -->
<!--end of page level css-->
EOT;
require_once('include/_header.php');
?>

<aside class="right-side">
    <section class="content-header">
        <h1>กราฟแสดงการกู้เงินกองทุนหมู่บ้าน</h1>
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
      <div class="portlet-body">
        <?php

$stmt = mysqli_prepare($link, "SELECT date_format(fak_date, '%d-%b-%y') as pDate, sum(fak_sum) as pAmount FROM deposit
GROUP BY pDate ASC");
$result = array('day' => array(), 'amount' => array());
  if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $day, $amount);
    while (mysqli_stmt_fetch($stmt)) {
      $result['day'][] = $day;
      $result['amount'][] = (int)$amount;
  }
  // mysqli_stmt_close($stmt);
}
          //
          // $query = "SELECT * FROM member  ";
          // $select_all_deposit = mysqli_query($link,$query);
          // $deposit_count = mysqli_num_rows($select_all_deposit);
        ?>

        <div id="div-chart"></div>
    </section>

</aside>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script>
		$(function () {
		    $('#div-chart').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Average Purchase'
		        },
		        subtitle: {
		            text: 'Source'
		        },
		        xAxis: {
		            categories: <?php echo json_encode($result['day']) ?>,
		            crosshair: true
		        },
		        yAxis: {
		            min: 0,
		            title: {
		                text: 'Amount (Millions)'
		            }
		        },
		        plotOptions: {
		            column: {
		                pointPadding: 0.2,
		                borderWidth: 0
		            }
		        },
		        series: [{
		            name: 'จำนวนฝาก',
		            data: <?php echo json_encode($result['amount']) ?>
		        }]
		    });
		});
	</script>
<?php
require_once('include/_footerChart.php');
?>
</body>
</html>
