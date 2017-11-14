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
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          รายงานข้อมูลการทำสัญญา
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
              รายงานข้อมูลการทำสัญญากู้ยืมเงิน
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Second Data Table -->
        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN EXAMPLE TABLE PORTLET-->
                <div class="portlet box success">
                    <div class="portlet-title">
                        <div class="caption"> <i class="livicon" data-name="table" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                          ตารางรายงานข้อมูลการทำสัญญากู้ยืมเงินกองทุน
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">

                            <div class="btn-group pull-right">
                            <button id="test_prints" class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                    Print
                            </button>
                        </div>
                        </div>
                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>จำนวนเงินที่อนุมัติ</th>
                                        <th>วันที่ทำสัญญา</th>
                                        <th><div align ='center'>ดูข้อมูล</div></th>

                                    </tr>
                                </thead>
                                <tbody>
						<?php
							if (isset($_GET["pro_id"])) {
								$pro_id = $_GET["pro_id"];
								$sql = "DELETE FROM promise WHERE pro_id ='$pro_id'";
								$result = mysqli_query($link, $sql);
							}

							$sql = "SELECT * FROM promise LEFT JOIN member ON promise.mem_id = member.mem_id";
							$result = mysqli_query($link, $sql);
							while ($row = mysqli_fetch_array($result)){
								$pro_id = $row["pro_id"];
								$mem_id = $row["mem_id"];
								$mem_name = $row["mem_name"];
								$app_pice = $row["app_pice"];
                $sub_date = $row["sub_date"];
                $pro_date = $row["pro_date"];
?>
<tr>
										<td><?=$mem_id?></td>
										<td><?=$mem_name?></td>
										<td><?php echo number_format($app_pice);?></td>
                    <td><?=$pro_date?></td>
                    <td align='center'><a href='admin_promise_view.php?pro_id=<?=$pro_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a>
                    </tr>
                    <?php
              }
						?>
					</tbody>
                            </table>
                        </div>
                        <!-- END EXAMPLE TABLE PORTLET--> </div>
                </div>
            </div>
        </div>
    </section>
    <!-- content -->
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
<script type="text/javascript">
  $('#test_prints').click(function(){
    var view_open = window.open('report_promise_print.php','Print-Window','width=1024,height=768,top=100,left=100');
    view_open.print();
  });
</script>
