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
          ข้อมูลการทำสัญญา
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
              ข้อมูลการทำสัญญากู้ยืมเงิน
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
                          ตารางข้อมูลการทำสัญญากู้ยืมเงินกองทุน
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <div class="btn-group">
                              <!-- <a href="admin_promise_add.php"   class=" btn btn-custom">
                                    เพิ่ม
                                    <i class="fa fa-plus"></i>
                                </button> </a> -->
                            </div>
                            <div class="btn-group pull-right">
                                <!-- <button class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                    Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#">Print</a>
                                    </li>

                                </ul> -->
                            </div>
                        </div>
                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>ลำดับที่</th>
                                        <!-- <th>รหัสการทำสัญญา</th> -->
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>วันที่อนุมัติ</th>
                                        <th><div align ='center'>ทำสัญญา</div></th>

                                    </tr>
                                </thead>
                                <tbody>
              						<?php $i=1;
              							$sql = "SELECT * FROM `submitted` WHERE sanya = '1'";
              							$result = mysqli_query($link, $sql);
              							while ($row = mysqli_fetch_array($result)){
              								$sub_id = $row["sub_id"];
              								$mem_id = $row["mem_id"];
              								$mem_name = $row["mem_name"];
                              $sub_date = $row["sub_date"];
                          ?>
					               <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?=$mem_id?></td>
                        <td><?=$mem_name?></td>
                        <td><?=$sub_date?></td>
                        <td align='center'><a href='admin_promise_add.php?sub_id=<?=$sub_id?>' class="btn btn-responsive button-alignment btn-success"><i class='fa  fa-pencil'> ทำสัญญา</i></a>
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
