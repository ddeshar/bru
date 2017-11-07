<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลกรรมการ</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
    <thead>
        <tr role="row">

            <th width="5%" align="left">รหัส</th>
            <th width="18%" align="left">ชื่อ-สกุล</th>
            <th width="13%" align="left">เลขบัตรปชช.</th>
            <th width="10%" align="left">ว/ด/ปเกิด</th>
            <th width="10%" align="left">ตำแหน่ง</th>
            <th width="5%" align="left">ที่อยู่</th>
            <th width="10%" align="left">เบอร์โทร</th>



        </tr>
    </thead>
    <tbody>
      <?php

        $sql = "SELECT * FROM committee
        LEFT JOIN title
        ON committee.id_title = title.id_title
        LEFT JOIN position
        ON committee.id_position = position.id_position
        ORDER BY id_committee ASC ";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){

          $id_committee = $row["id_committee"];
          $title = $row["title"];
          $com_name = $row["com_name"];
          $com_idcard = $row["com_idcard"];
          $com_birthday = $row["com_birthday"];
          $name_position = $row["name_position"];
          $com_address = $row["com_address"];
          $com_tel = $row["com_tel"];



          echo "<tr>

              <td>$id_committee</td>
              <td>$title $com_name</td>
              <td>$com_idcard</td>
              <td>$com_birthday</td>
              <td>$name_position</td>
              <td>$com_address</td>
              <td>$com_tel</td>



            </tr>";
        }
      ?>
    </tbody>
</table>
