<?php
$page = 'Admin';
$title = 'Admin Page';
$css = <<<EOT
<!--page level css -->
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/select2.css" />
<link rel="stylesheet" type="text/css" href="asset/vendors/datatables/css/dataTables.bootstrap.css" />
<link href="asset/css/pages/tables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../vendors/datatables/css/dataTables.bootstrap.css" />
<link href="../css/pages/tables.css" rel="stylesheet" type="text/css" />
<!-- end page css -->
EOT;
require_once('include/_header.php');
?>
<aside class="right-side">

    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="users-remove" data-size="18" data-c="#ffffff" data-hc="#ffffff"></i>
                          ตางรางข้อมูลยกการเลิกบัญชี
                    </h4>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                          <thead>
                              <tr role="row">
                                  <th>ลำดับที่</th>
                                  <th>รหัสสมาชิก</th>
                                  <th>ชื่อ-สกุล</th>
                                  <th>สถานะ</th>
                                  <th><div align ='center'>ดูข้อมูล</div></th>
                                  <th><div align ='center'>อนุมัติให้เป็นสมาชิกอีกครั้ง </div></th>
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
        WHERE member.status_mem = 'unpublish'
        ORDER BY mem_id ASC	";
        $result = mysqli_query($link, $sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result)){
          $mem_id = $row["mem_id"];
          $id_title = $row["title"];
          $mem_name = $row["mem_name"];
          $status_mem = $row["status_mem"];
?>
          <tr>
              <td><?=$i++?></td>
              <td><?=$mem_id?></td>
              <td><?=$id_title?> <?=$mem_name?></td>
              <td><?=$status_mem?></td>
              <td align='center'><a href='admin_stopmem_view.php?mem_id=<?=$mem_id?>' class='btn info btn-xs purple'><i class='fa fa-eye'></i></a>
              <td align='center'><a href='admin_stopmember_add.php?approve=<?=$mem_id?>' class="btn btn-responsive button-alignment btn-success"><i class='fa  fa-check'></i></a>

              </tr>
            </tr>
            <?php } ?>
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
</body>
</html>
<script type="text/javascript" src="../vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/select2.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="asset/vendors/datatables/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="asset/js/pages/table-editable.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    });
    </script>
