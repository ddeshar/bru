<?php
$page = 'Admin';
$title = 'Hello admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');

if (isset($_POST["btnsubmit"])) {
		$app_id = $_POST["app_id"];
		$mem_id = $_POST["mem_id"];
		$mem_name = $_POST["mem_name"];
		$sub_id = $_POST["sub_id"];
		$sub_date = $_POST["sub_date"];
		$sub_moneyloan = $_POST["sub_moneyloan"];
		$app_status = $_POST["app_status"];
		$app_number = $_POST["app_number"];
		$app_date = $_POST["app_date"];
		$id_commit = $_POST["id_commit"];

		$sql = "INSERT INTO approve (app_id,mem_id,mem_name,sub_id,sub_date,sub_moneyloan,app_status,app_number,app_date,id_commit)
		VALUES('$app_id','$mem_id','$mem_name','$sub_id','$sub_date','$sub_date','$sub_moneyloan','$app_status','$app_number','$app_date','$id_commit')";
		$result = mysqli_query($link, $sql);
		if ($result) {
			echo "<script type='text/javascript'>";
			echo "alert('เพิมเสร็จแล้ว');";
			echo "window.location='approve.php';";
			echo "</script>";
		}else{
			die("Query Failed" . mysqli_error($link));
		}
	}
?>


<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <!--section starts-->
        <h1>
            เพิ่มข้อมูลอนุมัติเงินกู้
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลอนุมัติเงินกู้</a>
            </li>
            <li class="active">
                เพิ่มข้อมูลอนุมัติเงินกู้
            </li>
        </ol>
    </section>
    <!--section ends-->
    <section class="content">
        <!--main content-->
        <div class="row">
            <!--row starts-->
            <div class="col-lg-12">
                <!--lg-6 starts-->
                <!--basic form starts-->
                <div class="panel panel-primary" id="hidepanel1">
									<div class="panel-heading">
											<h3 class="panel-title"> <i class="livicon" data-name="plus" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
													เพิ่มรายการอนุมัติเงินกู้
											</h3>
										</div>

                    <div class="panel-body">
											<?php
											if (isset($_GET["loan"])) {
													$loan = $_GET["loan"];

													$sql = "SELECT mem_id ,fak_total, MAX(fak_date) AS fak_date FROM deposit WHERE mem_id = $loan GROUP BY fak_total  desc LIMIT 1";
													$result = mysqli_query($link, $sql);
													$row = mysqli_fetch_assoc($result);
													$budget = $row["fak_total"];

														if ($budget>=2000) {
															  include 'include/loan/accepted.php';
														}else {
															include 'include/loan/notaccepted.php';
														}
													}else {
														// echo "string";
													}
												?>
                    </div>
                </div>

        <!--main content ends-->
    </section>
    <!-- content -->
</aside>
<!-- right-side -->
<?php
require_once('include/_footer.php');
?>
<!-- begining of page level js -->
<script src="asset/vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<!-- end of page level js -->
</body>
</html>
