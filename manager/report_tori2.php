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
        <h1>กราฟแสดงการฝากและถอนเงินสัจจะออมทรัพย์</h1>
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

$stmt = mysqli_prepare($link, "SELECT date_format(fak_date, '%d-%b-%y') as pDate, sum(fak_sum) as pAmount FROM deposit GROUP BY pDate ASC");
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


/* Getting demo_viewer table data */
$sql = "SELECT SUM(fak_sum) as count FROM deposit
    GROUP BY MONTH(fak_date) ORDER BY fak_date";
$faksum = mysqli_query($link,$sql);
$faksum = mysqli_fetch_all($faksum,MYSQLI_ASSOC);
$faksum = json_encode(array_column($faksum, 'count'),JSON_NUMERIC_CHECK);

/* Getting demo_click table data */
$sql = "SELECT SUM(withdraw) as count FROM deposit
    GROUP BY MONTH(fak_date) ORDER BY fak_date";
$withdraw = mysqli_query($link,$sql);
$withdraw = mysqli_fetch_all($withdraw,MYSQLI_ASSOC);
$withdraw = json_encode(array_column($withdraw, 'count'),JSON_NUMERIC_CHECK);



$stmt = mysqli_prepare($link, "SELECT date_format(fak_date, '%d-%b-%y') as pDate FROM deposit
GROUP BY pDate ASC");
$result = array('day' => array());
  if ($stmt) {
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $day);
    while (mysqli_stmt_fetch($stmt)) {
      $result['day'][] = $day;
      // $result['amount'][] = (int)$amount;
  }
  // mysqli_stmt_close($stmt);
}


        ?>

        <div id="container"></div>
    </section>

</aside>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script type="text/javascript">

$(function () {

  var data_withdraw = <?php echo $withdraw; ?>;
  var data_faksum = <?php echo $faksum; ?>;

    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'อัตราส่วนต่อเดือน'
        },
        colors: ['black','pink'],
        xAxis: {
          categories: <?php echo json_encode($result['day']) ?>

            // categories: ['1','2','3', '4']
        },
        yAxis: {
            title: {
                text: 'Rate'
            }
        },
        series: [{
            name: 'จำนวนฝาก',
            data: data_faksum
        }, {
            name: 'จำนวนถอน',
            data: data_withdraw
        }]
    });
});

</script>
<?php
require_once('include/_footerChart.php');
?>
</body>
</html>
