<?php
$page = 'Member';
$title = 'Member Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<!--end of page level css-->
EOT;
require_once('include/_header.php');
require_once('include/_bdate.php');
?>
<aside class="right-side">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          ข้อมูลการยื่นกู้
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
              ข้อมูลการยื่นกู้
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
                          ข้อมูลการยื่นกู้
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-toolbar">
                            <!-- <div class="btn-group">
                              <a href="admin_submitted_add.php"   class=" btn btn-custom">
                                    เพิ่ม
                                    <i class="fa fa-plus"></i>
                                </button> </a>
                            </div> -->

                        </div>
                        <div id="sample_editable_1_wrapper" class="">
                          <div id="sample_editable_1_wrapper" class="">
                              <table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
                                  <thead>
                                      <tr role="row">
                                          <th>รหัสสมาชิก</th>
                                          <th>ชื่อ-สกุล</th>
                                          <th>วัน/เดือน/ปีเกิด</th>
                                          <th>เบอร์โทร</th>
                                          <th>สถานะ</th>
                                          <th><div align ='center'>จัดการข้อมูล</div></th>
                                      </tr>
                                  </thead>
                                  <tbody>
                        						<?php
                        							if (isset($_GET["mem_id"])) {
                        								$mem_id = $_GET["mem_id"];
                        								$sql = "delete from member where mem_id='$mem_id'";
                        								$result = mysqli_query($link, $sql);
                        							}

                                      $sql = "SELECT member.mem_id, title.title, member.mem_name, member.mem_birthday, member.mem_tel, member.status_mem FROM member
                                      LEFT JOIN title
                                      ON member.id_title = title.id_title
                                      LEFT JOIN status
                                      ON member.id_status = status.id_status
                                      WHERE member.fund_status ='0' AND  member.mem_id = '$s_login_mem_id'
                                      ORDER BY mem_id ASC	";
                        							$result = mysqli_query($link, $sql);
                        							while ($row = mysqli_fetch_array($result)){
                        								$mem_id = $row["mem_id"];
                        								$id_title = $row["title"];
                        								$mem_name = $row["mem_name"];
                        								$mem_birthday = $row["mem_birthday"];
                                        $mem_tel = $row["mem_tel"];
                                        $status_mem = $row["status_mem"];
                        								?>
                                        <tr>
                        										<td><?=$mem_id?></td>
                        										<td><?=$id_title,$mem_name?></td>
                        										<td><?php $strDate = "$mem_birthday"; echo DateThai($strDate);?></td>
                                            <td><?=$mem_tel?></td>
                                            <td><?=$status_mem?></td>
                                            <td align='center'><a href='member_submitted_add.php?loan=$mem_id' class='btn default btn-xs purple'><i class='fa fa-money'></i></a> </td>
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
