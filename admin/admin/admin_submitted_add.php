<?php
$page = 'Admin';
$title = 'Hello Admin';
$css = <<<EOT
<!--page level css -->
<link href="asset/vendors/jasny-bootstrap/css/jasny-bootstrap.css" rel="stylesheet" />
<link href="asset/vendors/select2/select2.css" rel="stylesheet" />
<link rel="stylesheet" href="asset/vendors/select2/select2-bootstrap.css" />

<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css"/>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<!--end of page level css-->
EOT;
require_once('include/_header.php');
	if (isset($_POST["btnsubmit"])) {
			$mem_id = $_POST["mem_id"];
			$mem_name = $_POST["mem_name"];
			$sub_moneyloan = $_POST["sub_moneyloan"];
			$sub_objective = $_POST["sub_objective"];
			$sub_date = $_POST["sub_date"];
			$name1 = $_POST["name1"];
			$name2 = $_POST["name2"];
			$id_commit = $_POST["id_commit"];


			$sql = "INSERT INTO submitted (mem_id,mem_name,sub_moneyloan,sub_objective,sub_date,name1,name2,id_commit)VALUES('$mem_id','$mem_name','$sub_moneyloan','$sub_objective','$sub_date','$name1','$name2','$id_commit')";
      // echo $sql; exit;
      $result = mysqli_query($link, $sql);

			if ($result) {
				echo "<script type='text/javascript'>";
				echo "alert('เพิมเสร็จแล้ว');";
				echo "window.location='submitted.php';";
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
            เพิ่มข้อมูลการยื่นกู้กองทุน
        </h1>
        	<ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="14" data-loop="true"></i>
                    Home
                </a>
            </li>
            <li>
                <a href="#">ข้อมูลการยื่นกู้กองทุน</a>
            </li>
            <li class="active">
                เพิ่มข้อมูลการยื่นกองทุน
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
													เพิ่มการยื่นกู้
											</h3>
										</div>

										<div class="panel-body">
											<?php
												if (isset($_GET["loan"])) {
													$loan = $_GET["loan"];
													$sql = "SELECT mem_id,fak_total, MAX(fak_date) AS fak_date FROM deposit WHERE mem_id = $loan GROUP BY fak_total  desc LIMIT 1";
													$result = mysqli_query($link, $sql);
													$row = mysqli_fetch_assoc($result);
													$budget = $row["fak_total"];

														if ($budget>=2000) {
																include 'include/loan/accepted.php';
														}else {
															include 'include/loan/notaccepted.php';
														}
													}else {
														include 'include/loan/select_users.php';
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
<script src="asset/vendors/select2/select2.js" type="text/javascript"></script>
<script src="asset/js/pages/formelements.js" type="text/javascript"></script>
<script src="asset/vendors/jasny-bootstrap/js/jasny-bootstrap.js"></script>
<!-- end of page level js -->
</body>
</html>
<script type="text/javascript">
	$('#countryname_1').autocomplete({
		source: function( request, response ) {
			$.ajax({
				url : 'ajax_deposit_add.php',
				dataType: "json",
				method: 'post',
			data: {
				 name_startsWith: request.term,
				 type: 'country_table',
				 row_num : 1
			},
			success: function( data ) {
				response( $.map( data, function( item ) {
					var code = item.split("|");
						return {
							label: code[0],
							value: code[0],
							data : item
						}
				}));
			}
			});
		},
		autoFocus: true,
		minLength: 0,
		select: function( event, ui ) {
		var names = ui.item.data.split("|");
		$('#user_id_mem').val(names[1]);
		$('#num2').val(names[2]);
	}
	});

	$(function() {
		$("#num1, #num2").on("keydown keyup", sum);

		function sum() {
			$("#sum").val(Number($("#num2").val()) - Number($("#num1").val()));
		}
	});
</script>
