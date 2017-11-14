<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการจ่ายเงินกู้ให้ผู้กู้</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
    <thead>
        <tr role="row">

            <th width="10%" align="left">รหัสยื่นกู้</th>
            <th width="13%" align="left">รหัสสมาชิก</th>
            <th width="20%" align="left">ชื่อ-สกุล</th>
            <th width="15%" align="left">เงินที่ขอกู้</th>
            <th width="15%" align="left">วันที่ขอกู้</th>
            <th width="15%" align="left">สถานะ</th>





        </tr>
    </thead>
    <tbody>
      <?php

        $sql = "SELECT * FROM submitted left JOIN statusb_app ON submitted.id_sapp = statusb_app.id_sapp";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){

          $sub_id = $row["sub_id"];
          $mem_id = $row["mem_id"];
          $mem_name = $row["mem_name"];
          $sub_moneyloan = $row["sub_moneyloan"];
          $sub_date = $row["sub_date"];
          $id_sapp = $row["id_sapp"];
          $status_app = $row["status_app"];
          ?>

          <tr>
              <td><?=$sub_id?></td>
              <td><?=$mem_id?></td>
              <td><?=$mem_name?></td>
              <td><?php echo number_format($sub_moneyloan);?></td>
              <td><?=$sub_date?></td>
              <td><?=$status_app?></td>

            </tr>
      <?php
        }
      ?>
    </tbody>
</table>
