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
        <h1>กราฟแสดงรายงานการกู้เงินกองทุนหมู่บ้าน</h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    กองทุนหมู่บ้าน
                </a>
            </li>
            <li>รายงาน</li>
            <li class="active">รายงานการกู้เงินกองทุนหมู่บ้าน</li>
        </ol>
    </section>
    <section class="content">
      <div class="portlet-body">
        <?php

$stmt = mysqli_prepare($link, "SELECT date_format(sub_id, '%d-%b-%y') as pDate, sum(mem_id) as pAmount FROM promise GROUP BY pDate ASC");
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
$sql = "SELECT sum(sub_moneyloan) as count FROM promise
    GROUP BY MONTH(sub_date) ORDER BY sub_date";
$faksum = mysqli_query($link,$sql);
$faksum = mysqli_fetch_all($faksum,MYSQLI_ASSOC);
$faksum = json_encode(array_column($faksum, 'count'),JSON_NUMERIC_CHECK);

/* Getting demo_click table data */
$sql = "SELECT SUM(app_pice) as count FROM promise
    GROUP BY MONTH(sub_date) ORDER BY sub_date";
$withdraw = mysqli_query($link,$sql);
$withdraw = mysqli_fetch_all($withdraw,MYSQLI_ASSOC);
$withdraw = json_encode(array_column($withdraw, 'count'),JSON_NUMERIC_CHECK);



$stmt = mysqli_prepare($link, "SELECT date_format(sub_date, '%d-%b-%y') as pDate FROM promise
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
        colors: ['black','purple','pink','green'],
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
            name: 'สมาชิกทั้งหมด(คน)',
            data: data_faksum
        }, {
            name: 'สมาชิกยื่นกู้(คน)',
            data: data_faksum
        }, {
            name: 'จำนวนเงินกู้',
            data: data_faksum
        }, {
            name: 'จำนวนเงินอนุมัติ',
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
