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
                                  <th>วันที่ปิดบัญชี</th>
                                  <!-- <th>สถานะ</th> -->
                              </tr>
                          </thead>
                          <tbody>
      <?php
        if (isset($_GET["mem_id"])) {
          $mem_id = $_GET["mem_id"];
          $sql = "delete from member where mem_id='$mem_id'";
          $result = mysqli_query($link, $sql);
        }

        $sql = "SELECT * FROM stop_member  ";
        $result = mysqli_query($link, $sql);
        $i = 1;
        while ($row = mysqli_fetch_array($result)){
          $stopmem_id = $row["stopmem_id"];
          $mem_id = $row["mem_id"];
          $mem_name = $row["mem_name"];
          $stop_date = $row["stop_date"];
?>
          <tr>
              <td><?=$i++?></td>
              <td><?=$mem_id?></td>
              <td><?=$mem_name?></td>
              <td><?=$stop_date?></td>
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
