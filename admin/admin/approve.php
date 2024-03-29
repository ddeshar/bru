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
                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>ลำดับที่</th>
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
                                  <?php $i=1;
                      							if (isset($_GET["sub_id"])) {
                      								$sub_id = $_GET["sub_id"];
                      								$sql = "delete from submitted where sub_id='$sub_id'";
                      								$result = mysqli_query($link, $sql);
                      							}

                      							$sql = "SELECT * FROM submitted left JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp WHERE status_app = 'อนุมัติ'";
                      							$result = mysqli_query($link, $sql);
                      							while ($row = mysqli_fetch_array($result)){
                      								$sub_id = $row["sub_id"];
                      								$mem_id = $row["mem_id"];
                      								$mem_name = $row["mem_name"];
                      								$sub_moneyloan = $row["sub_moneyloan"];
                                      $sub_date = $row["sub_date"];
                                      $id_sapp = $row["status_app"];
                                      ?>
                      							<tr>
                                          <td><?php echo $i++; ?></td>
                      										<td><?=$sub_id?></td>
                      										<td><?=$mem_id?></td>
                      										<td><?=$mem_name?></td>
                      										<td><?php echo number_format($sub_moneyloan);?></td>
                                          <td><?=$sub_date?></td>
                                          <td><?=$id_sapp?></td>

                                          <td align='center'>
                                            <!-- <a href='admin_submitted_edit.php?sub_id=<//?=$sub_id?>' class='btn default btn-xs purple'><i class='fa fa-edit'></i></a> | -->
                                            <a href='admin_submitted_view.php?sub_id=<?=$sub_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a> |
                      					    <a href='submitted.php?sub_id=<?=$sub_id?>' class='btn warning btn-xs purple'><i class='fa fa-trash-o' onclick='return confirm(\"ยืนยันการลบ\");'></a></td>
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
