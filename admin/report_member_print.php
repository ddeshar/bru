<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลสมาชิก</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
    <thead>
        <tr role="row">

            <th width="5%" align="left">รหัส</th>
            <th width="18%" align="left">ชื่อ-สกุล</th>
            <th width="14%" align="left">เลขบัตรปชช.</th>
            <th width="10%" align="left">ว/ด/ปเกิด</th>
            <th width="5%" align="left">ที่อยู่</th>
            <th width="10%" align="left">เบอร์โทร</th>
            <th width="8%" align="left">สถานะ</th>


        </tr>
    </thead>
    <tbody>
      <?php
        if (isset($_GET["mem_id"])) {
          $mem_id = $_GET["mem_id"];
          $sql = "delete from member where mem_id='$mem_id'";
          $result = mysqli_query($link, $sql);
        }

        $sql = "SELECT * FROM member
                LEFT JOIN gender
                ON member.id_gender = gender.id_gender
                LEFT JOIN title
                ON member.id_title = title.id_title
                LEFT JOIN status
                ON member.id_status = status.id_status
                ORDER BY mem_id ASC	";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){

          $mem_id = $row["mem_id"];
          $title = $row["title"];
          $mem_name = $row["mem_name"];
          $mem_idcard = $row["mem_idcard"];
          $mem_birthday = $row["mem_birthday"];
          $mem_address = $row["mem_address"];
          $mem_tel = $row["mem_tel"];
          $status_mem = $row["status_mem"];


          echo "<tr>

              <td>$mem_id</td>
              <td>$title $mem_name</td>
              <td>$mem_idcard</td>
              <td>$mem_birthday</td>
              <td>$mem_address</td>
              <td>$mem_tel</td>
              <td>$status_mem</td>


            </tr>";
        }
      ?>
    </tbody>
</table>
