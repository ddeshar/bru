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

    if(isset($_GET["approve"])){
        $approve=$_GET["approve"];
        $approvesql = "UPDATE submitted SET id_sapp = '1' , sanya = '1' WHERE sub_id = '$approve'";
        $result=mysqli_query($link, $approvesql);
        if($result==1){
            header('location: approve.php');
        }
    }
    // 0 รอการทำสัญญากู้เงิน
    // 1 อนุมัติให้ทำสัญญาเงินกู้
    // 2 ไม่อนุมัติกู้เงิน
    // 3 อนุมัติกู้เงิน

    if(isset($_GET["unapprove"])){
        $unapprove=$_GET["unapprove"];
        $unapprovesql = "UPDATE submitted SET id_sapp = '2', sanya = '2' WHERE sub_id = '$unapprove'";
        $result=mysqli_query($link, $unapprovesql);
        if($result==1){
            header('location: unapprove.php');
        }
    }

?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          ข้อมูลรอการอนุมัติ
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
              ข้อมูลรอการอนุมัติเงินกู้
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
                          ตารางข้อมูลรอการอนุมัติเงินกู้
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">

                            <div class="btn-group pull-right">
                                <button class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                    Tools
                                    <i class="fa fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <a href="#">Print</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="sample_editable_1_wrapper" class="">
                            <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th>ลำดับที่</th>
                                        <th>รหัสการยื่นกู้</th>
                                        <th>รหัสสมาชิก</th>
                                        <th>ชื่อ-สกุล</th>
                                        <th>จำนวนเงินที่ขอกู้</th>
                                        <th>วันที่กู้ยืม</th>
                                        <th><div align ='center'>ดูข้อมูล</div></th>
                                        <th><div align ='center'>อนุมัติ | ไม่อนุมัติ </div></th>
                                        <!-- <th>สถานะการอนุมัติ</th>
                                        <th><div align ='center'>จัดการข้อมูล</div></th> -->

                                    </tr>
                                </thead>
                                <tbody>
                                <?php   $i = 1;
                                    if (isset($_GET["sub_id"])) {
                                        $sub_id = $_GET["sub_id"];
                                        $sql = "delete from submitted where sub_id='$sub_id'";
                                        $result = mysqli_query($link, $sql);
                                    }

                                    $sql = "SELECT * FROM submitted left JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp WHERE status_app = 'รออนุมัติ'";
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
                                          <td><?php echo $i++;?></td>
                      										<td><?=$sub_id?></td>
                      										<td><?=$mem_id?></td>
                      										<td><?=$mem_name?></td>
                                          <td><?php echo number_format($sub_moneyloan);?></td>
                                          <td><?=$sub_date?></td>
                                          <!-- <td><//?=$id_sapp?></td> -->
                                          <td align='center'><a href='admin_submitted_view1.php?sub_id=<?=$sub_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a>
                                          <td align='center'><a href='submitted.php?approve=<?=$sub_id?>' class="btn btn-responsive button-alignment btn-success"><i class='fa  fa-check'></i></a>
                                          | <a href='submitted.php?unapprove=<?=$sub_id?>' class="btn btn-responsive button-alignment btn-danger"><i class='fa  fa-remove'></i></a>
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
