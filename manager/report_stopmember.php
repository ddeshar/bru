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
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
          รายงานการยกเลิกบัญชีของสมาชิก
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="index.php"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Home
                </a>
            </li>
            <li>ยกเลิกบัญชี</li>
            <li class="active">
                รายงานการยกเลิกบัญชีของสมาชิก
            </li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h4 class="panel-title"> <i class="livicon" data-name="table" data-size="18" data-c="#ffffff" data-hc="#ffffff"></i>
                          ตางรางรายงานการยกเลิกบัญชีของสมาชิก
                    </h4>
                </div>
                <div class="panel-body">
                  <div class="portlet-body">
                      <div class="table-toolbar">
                          <div class="btn-group pull-right">
                            <div class="table-toolbar">
                                <div class="btn-group pull-right">
                                <button id="test_print" class="btn dropdown-toggle btn-custom" data-toggle="dropdown">
                                                        Print
                                </button>
                            </div>
                          </div>
                      </div>

                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                          <thead>
                              <tr role="row">

                                  <th>รหัสสมาชิก</th>
                                  <th>ชื่อ-สกุล</th>
                                  <th>เบอร์โทร</th>
                              </tr>
                          </thead>
                          <tbody>
      <?php
        if (isset($_GET["mem_id"])) {
          $mem_id = $_GET["mem_id"];
          $sql = "delete from member where mem_id='$mem_id'";
          $result = mysqli_query($link, $sql);
        }

        $sql = "SELECT * FROM  member
                LEFT JOIN title ON member.id_title=title.id_title WHERE status_mem = 'unpublish' ";
        $result = mysqli_query($link, $sql);
        while ($row = mysqli_fetch_array($result)){
          $mem_id = $row["mem_id"];
          $title = $row["title"];
          $mem_name = $row["mem_name"];
          $mem_birthday = $row["mem_birthday"];
          $mem_tel = $row["mem_tel"];
          $status_mem = $row["status_mem"];

          echo "<tr>
              <td>$mem_id</td>
              <td>$title $mem_name</td>
              <td>$mem_tel</td>
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
