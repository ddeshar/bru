<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลประวัติการเข้าใช้งาน</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
    <thead>
        <tr role="row">

            <th width="5%" align="left">รหัส</th>
            <th width="18%" align="left">เวลาเข้าใช้งาน</th>
            <th width="14%" align="left">ip</th>



        </tr>
    </thead>
    <tbody>
      <?php
        if (isset($_GET["id_history"])) {
          $id_history = $_GET["id_history"];
          $sql = "delete from member where mem_id='$mem_id'";
          $result = mysqli_query($link, $sql);
        }

        $sql = "SELECT * FROM user_history";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){

          $id_history = $row["id_history"];
          $session = $row["session"];
          $timein = $row["timein"];
          $user_id = $row["user_id"];
          $action = $row["action"];
          $ip = $row["ip"];


          echo "<tr>

          <td>$user_id</td>
          <td>$timein</td>
          <td>$ip</td>


            </tr>";
        }
      ?>
    </tbody>
</table>
