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

            <th width="5%" align="left">รหัส</th>
            <th width="20%" align="left">ชื่อ-สกุล</th>
            <th width="6%" align="left">สัญญา</th>
            <th width="17%" align="left">จำนวนเงินที่ขอกู้</th>
            <th width="16%" align="left">ครบกำหนดส่ง</th>
            <th width="17%" align="left">จำนวนเงินที่จ่าย</th>
            <th width="14%" align="left">วันที่จ่ายเงินกู้</th>




        </tr>
    </thead>
    <tbody>
      <?php

        $sql = "SELECT DISTINCT repayment.pay_id,
        repayment.mem_id,
        member.mem_name,
        promise.pro_id,
        submitted.sub_moneyloan,
        promise.pro_redate,
        repayment.pay_date,
        repayment.pay_pice
        FROM repayment
        LEFT JOIN member ON repayment.mem_id=member.mem_id
        LEFT JOIN promise ON repayment.pro_id=promise.pro_id
        LEFT JOIN submitted ON repayment.sub_moneyloan=submitted.sub_moneyloan";
        $result = mysqli_query($link, $sql);

        while ($row = mysqli_fetch_array($result)){

          $pay_id = $row["pay_id"];
          $mem_id = $row["mem_id"];
          $mem_name = $row["mem_name"];
          $pro_id = $row["pro_id"];
          $sub_moneyloan = $row["sub_moneyloan"];
          $pro_redate = $row["pro_redate"];
          $pay_date = $row["pay_pice"];
          $pay_pice = $row["pay_date"];
?>
            <tr>
              <td><?=$pay_id?></td>
              <td><?=$mem_name?></td>
              <td><?=$pro_id?></td>
              <td><?php echo number_format($sub_moneyloan);?></td>
              <td><?=$pro_redate?></td>
              <td><?php echo number_format($pay_date);?></td>
              <td><?=$pay_pice?></td>

            </tr>
      <?php
        }
      ?>
    </tbody>
</table>
