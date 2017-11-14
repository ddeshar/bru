<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการทำสัญญา</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
    <thead>
            <tr role="row">
            <th width="8%" align="left">รหัส</th>
             <th width="20%" align="left">ชื่อ-สกุล</th>
             <th width="20%" align="left">เงินที่อนุมัติ</th>
             <th width="19%" align="left">วันที่อนุมัติ</th>
             <th width="19%" align="left">วันที่ทำสัญญา</th>
             <th width="19%" align="left">กำหนดส่ง</th>


           </tr>


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
                $pro_redate = $row["pro_redate"];
                ?>
                <tr>
                    <td><?=$pro_id?></td>
                    <td><?=$mem_name?></td>
                    <td><?php echo number_format($app_pice);?></td>
                    <td><?=$sub_date?></td>
                    <td><?=$pro_date?></td>
                    <td><?=$pro_redate?></td>

            </tr>
      <?php
        }
      ?>
    </tbody>
</table>
