<?php
$page = 'manager';
$title = 'manager Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<!--end of page level css-->
EOT;
require_once('include/connect.php');
require_once('include/_sdate.php');

 include ("include/fcdate.php");
$startdate= (isset($_REQUEST['startdate'])) ? $_REQUEST['startdate']: '';
$enddate= (isset($_REQUEST['enddate'])) ? $_REQUEST['enddate']: '';

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="1;url=report_history.php"> <?php //code ปริ้น   ?>
<title>ระบบบริหารจัดการกองทุนหมู่บ้านและสัจจะออมทรัพย์</title>
</head>
<body  onload="window.print()"> <?php //code ปริ้น   ?>
<form  class="form-horizontal">
<center><img src="asset/img/logos.png" width="90" /></center>
</form> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<center><font face = "TH SarabunPSK", size="6"><b>รายงานข้อมูลประวัติการเข้าใช้งาน</b></font></center>
                <center><font face = "TH SarabunPSK", size="5">หมู่บ้านสวนครัว<br>
                																			73  ม.14  ตำบลอิสาณ  อำเภอเมือง  จังหวัดบุรีรัมย์ 31000 </font></center><br>

            <table align="center">
                                <tr>
                                <td>ระหว่างวันที่</td>
                                    <td><?php $strDate = "$startdate";	echo DateThai($strDate);?></td>
                                    <td>&nbsp;ถึงวันที่&nbsp;</td>
                                    <td><?php $strDate = "$enddate";	echo DateThai($strDate);?></td>
									     </tr>
										</table>   <br>
        <table border="1" align="center" width="1000"  cellpadding="0"   cellspacing="0">
                                    <thead>
                                        <tr>



                                          <th><center>No.</center></th>
                                          <th>รหัสผู้เข้าใช้</th>
                                          <th>เวลาที่เข้าใช้งาน</th>
                                          <th>ip</th>

                                        </tr>
                                    </thead>

                                    <?php

                                    $i=1;
                                    if (isset($_GET["user_id"])) {
                                      $user_id = $_GET["user_id"];
                                      $sql = "delete from member where mem_id='$mem_id'";
                                      $result = mysqli_query($link, $sql);
                                    							}

                                                      $sql = "SELECT * FROM user_history
                                                      WHERE  timein BETWEEN '$startdate' AND '$enddate'
                                                      GROUP BY
                                                      id_history";

                                                      $result = mysqli_query($link, $sql);
                                                      while ($row = mysqli_fetch_array($result)){
                                                        $id_history = $row["id_history"];
                                                        $session = $row["session"];
                                                        $timein = $row["timein"];
                                                        $user_id = $row["user_id"];
                                                        $action = $row["action"];
                                                        $ip = $row["ip"];
                                    ?>
                                      									<tr>
                                                          <td><?=$i?></td>
                                                          <td><?=$user_id?></td>
                                                          <td><?php $strDate = "$timein";	echo DateThai($strDate);?></td>
                                                          <td><?=$ip?></td>
                                      							</tr>

                                            	 <?php
                                    			 $i++; }

                                    			 ?>


</body>
</html>
<?php //code ปริ้น   ?>
<script type="text/javascript">
function printDiv(divName) {
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;

document.body.innerHTML = printContents;
window.print();

document.body.innerHTML = originalContents;
}
</script>
