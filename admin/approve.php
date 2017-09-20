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
          ข้อมูลการอนุมัติ
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
              ข้อมูลการอนุมัติ
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
                        <div class="caption"> <i class="livicon" data-name="edit" data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                          ตารางรายการอนุมัติเงินกู้
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="btn-group">
                              <a href="approve_add.php"   class=" btn btn-custom">
                                    เพิ่ม
                                    <i class="fa fa-plus"></i>
                                </button> </a>
                            </div>
                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                    Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#">Print</a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Save as PDF
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Export to Excel
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">

                                        <th>รหัสการอนุมัติ</th>
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>จำนวนเงินทีอนุมัติ</th>
                                        <th>วันที่อนุมัติ</th>
                                        <th>สถานะ</th>
                                        <th><div align ='center'>จัดการข้อมูล</div></th>

                                    </tr>
                                </thead>
                                <tbody>
						<?php
							if (isset($_GET["app_id"])) {
								$sub_id = $_GET["app_id"];
								$sql = "delete from approve where app_id='$app_id'";
								$result = mysqli_query($link, $sql);
							}

							$sql = "SELECT * FROM approve";
							$result = mysqli_query($link, $sql);
							while ($row = mysqli_fetch_array($result)){
                $app_id = $row["app_id"];
            		$mem_id = $row["mem_id"];
            		$mem_name = $row["mem_name"];
            		$sub_id = $row["sub_id"];
            		$sub_date = $row["sub_date"];
            		$sub_moneyloan = $row["sub_moneyloan"];
            		$app_status = $row["app_status"];
            		$app_number = $row["app_number"];
            		$app_date = $row["app_date"];
            		$id_commit = $row["id_commit"];

								echo "<tr>
										<td>$app_id</td>
										<td>$mem_id</td>
										<td>$mem_name</td>
										<td>$app_number</td>
                    <td>$app_date</td>
                    <td>$app_status</td>

                    <td align='center'><a href='admin_approve_edit.php?app_id=$app_id' class='btn default btn-xs purple'><i class='fa fa-edit'></i></a> |
                    <a href='admin_approve_view.php?app_id=$app_id' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a> |
										<a href='approve.php?app_id=$app_id' class='btn warning btn-xs purple'><i class='fa fa-trash-o' onclick='return confirm(\"ยืนยันการลบ\");'></a></td>
                    </tr>";
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
