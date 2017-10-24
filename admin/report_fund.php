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
          //
          // $stmt = mysqli_prepare($link, "SELECT date_format(sub_id, '%d-%b-%y') as pDate, sum(mem_id) as pAmount FROM promise GROUP BY pDate ASC");
          // $result = array('day' => array(), 'amount' => array());
          //   if ($stmt) {
          //     mysqli_stmt_execute($stmt);
          //     mysqli_stmt_bind_result($stmt, $day, $amount);
          //     while (mysqli_stmt_fetch($stmt)) {
          //       $result['day'][] = $day;
          //       $result['amount'][] = (int)$amount;
          //   }
          //   // mysqli_stmt_close($stmt);
          // }

          /*member count from db*/
          // $sql_member = "SELECT * FROM `member`";
          // $sql_all_member = mysqli_query($link,$sql_member);
          // $fetch_all_member = mysqli_fetch_all($sql_all_member,MYSQLI_ASSOC);
          // $count_member = json_encode(array_column($fetch_all_member, 'count'),JSON_NUMERIC_CHECK);

          $sql_member = "SELECT count(*) as totalm from member";
          $sql_allmember = mysqli_query($link,$sql_member);
          $data=mysqli_fetch_assoc($sql_allmember);
          $total_mem=  $data['totalm'];
          $count_member =  json_encode($total_mem,JSON_NUMERIC_CHECK);

          /* Getting demo_viewer table data */
          $sql_loan = "SELECT sum(sub_moneyloan) as count FROM promise GROUP BY MONTH(sub_date) ORDER BY sub_date";
          $sum_all_loan = mysqli_query($link,$sql_loan);
          $fetch_all_loan = mysqli_fetch_all($sum_all_loan,MYSQLI_ASSOC);
          $faksum = json_encode(array_column($fetch_all_loan, 'count'),JSON_NUMERIC_CHECK);

          /* Getting demo_click table data */
          $sql_loan = "SELECT SUM(app_pice) as count FROM promise GROUP BY MONTH(sub_date) ORDER BY sub_date";
          $withdraw_loan = mysqli_query($link,$sql_loan);
          $fetch_all_withdraw = mysqli_fetch_all($withdraw_loan,MYSQLI_ASSOC);
          $withdraw = json_encode(array_column($fetch_all_withdraw, 'count'),JSON_NUMERIC_CHECK);

          /* Getting demo_click table data */
          $sql_submitted = "SELECT count(*) as total from submitted WHERE id_sapp = 1";
          $withdraw_sumnit = mysqli_query($link,$sql_submitted);
          $data=mysqli_fetch_assoc($withdraw_sumnit);
          $total_sub =  $data['total'];
          $submitted =  json_encode($total_sub,JSON_NUMERIC_CHECK);
          // $submitted = json_encode(array_column($data, 'total'),JSON_NUMERIC_CHECK);

          // $sql_submitted = "SELECT * FROM `submitted` WHERE id_sapp = 1";
          // $withdraw_sumnit = mysqli_query($link,$sql_submitted);
          // $fetch_all_sumnit = mysqli_fetch_all($withdraw_sumnit,MYSQLI_ASSOC);
          // $submitted = json_encode(array_column($fetch_all_sumnit, 'count'),JSON_NUMERIC_CHECK);

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

      <?php echo $withdraw; ?>
    <?php echo $faksum; ?>
        <?php echo $count_member; ?>
     <?php echo $submitted; ?>

        <div id="container"></div>
    </section>

</aside>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<script type="text/javascript">

$(function () {

  var data_withdraw = <?php echo $withdraw; ?>;
  var data_faksum = <?php echo $faksum; ?>;
  var count_member = <?php echo $count_member; ?>;
  var data_submitted = <?php echo $submitted; ?>;

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
        },
        yAxis: {
            title: {
                text: 'Rate'
            }
        },
        series: [{
            name: 'สมาชิกทั้งหมด(คน)',
            data: count_member
        }, {
            name: 'สมาชิกยื่นกู้(คน)',
            data: data_faksum
        }, {
            name: 'จำนวนเงินกู้',
            data: data_withdraw
        }, {
            name: 'จำนวนเงินอนุมัติ',
            data: data_submitted
        }]
    });
});

</script>
<?php
require_once('include/_footerChart.php');
?>
</body>
</html>
