<?php
require_once('include/connect.php');
?>


<table width="100%" border="0" cellspacing="1" cellpadding="1" bordercolor="#000" style=" border-collapse: collapse;">
          <tr>
             <td width="50" align="center" style="padding:10px"> <img src="asset/img/logos.png"  width="88" height="88" alt=""> </td>

               <td style="padding:10px;">  <b>กองทุนหมู่บ้านและสัจจะออมทรัพย์หมู่บ้านสวนครัว</b> <br>

                <b> รายงานข้อมูลการชำระเงินกู้และดอกเบี้ย</b>
</table>

<hr width="n" align="center" size="1" noshade color="black">
<table class="table table-striped table-bordered table-hover dataTable no-footer" id="sample_editable_1" role="grid">
    <thead>
        <tr role="row">

            <th width="8%" align="left">รหัส</th>
            <th width="18%" align="left">ชื่อ-สกุล</th>

            <th width="15%" align="left">่ต้องชำระ</th>
            <th width="16%" align="left">ครบกำหนดส่ง</th>
            <th width="14%" align="left">ชำระต่อเดือน</th>
            <th width="14%" align="left">ชำระล่าสุด</th>
            <th width="10%" align="left">คงเหลือ</th>



        </tr>
    </thead>
    <tbody>
      <?php

        $sql = "SELECT DISTINCT refund.ref_id,
        refund.mem_id,
        member.mem_name,
        refund.ref_picetotal,
        refund.ref_date,
        refund.ref_rate,

		    refund.pay,
		    refund.owe
        FROM refund
        LEFT JOIN member ON refund.mem_id=member.mem_id
        LEFT JOIN submitted ON refund.sub_moneyloan=submitted.sub_moneyloan
        ORDER BY ref_id asc
   ";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){

          $ref_id = $row["ref_id"];
          $mem_name = $row["mem_name"];
          $ref_picetotal = $row["ref_picetotal"];
          $ref_date = $row["ref_date"];
          $pay = $row["pay"];
          $ref_rate = $row["ref_date"];
          $owe = $row["owe"];

?>
<tr>

              <td><?=$ref_id?></td>
              <td><?=$mem_name?></td>
              <td><?php echo number_format($ref_picetotal);?></td>
              <td><?=$ref_date?></td>
              <td><?php echo number_format($pay);?></td>
              <td><?=$ref_rate?></td>
              <td><?php echo number_format($owe);?></td>
            </tr>
      <?php
        }
      ?>
    </tbody>
</table>
