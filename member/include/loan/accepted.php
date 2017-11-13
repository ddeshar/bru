<h2><center>สามารถกู้ได้ เพราะคุณมีจำนวนเงินคือ<?=$budget?> <center></h2>

<form class="form-horizontal" action="member_submitted_add.php" method="post">
    <fieldset>
        <!-- Name input-->
        <div class="form-group">
            <label class="col-md-3 control-label" for="id">รหัสการยื่นกู้</label>
            <div class="col-md-3">
            <input id="sub_id" name="sub_id" type="text" placeholder="AUTO-ID" class="form-control" readonly></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">รหัสสมาชิก</label>
            <div class="col-md-3">
            <input id="user_id_mem" name="mem_id" type="text" placeholder="MEM-ID" class="form-control" readonly></div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="name">ชื่อ-สกุลสมาชิก</label>
        <div class="col-md-3">
        <input id="countryname_1" name="mem_name" type="text" placeholder="NAME" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="name">จำนวนเงินที่ขอกู้</label>
            <div class="col-md-3">
            <input id="sub_moneyloan" name="sub_moneyloan" type="text" placeholder="MONEY" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="detail">วัตถุประสงค์ในการกู้</label>
            <div class="col-md-4">
            <textarea class="form-control" id="sub_objective" name="sub_objective" placeholder="OBJECTIVE" rows="5"></textarea>
            </div>
        </div>

        <div class="form-group">
        <label class="col-md-3 control-label" for="birth">วันที่ยื่นกู้</label>
        <div class="col-md-3">
        <input type="date" id="datepicker" name="sub_date" class="form-control round-form"  placeholder="DATE"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">เลขที่บัตร ปชช.ผู้ค้ำคนที่ 1</label>
            <div class="col-md-3">
            <input id="sub_idcardBM1" name="sub_idcardBM1" type="text" placeholder="IDCARDBM1" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">ชื่อผู้ค้ำคนที่ 1</label>
            <div class="col-md-3">
            <input id="name1" name="name1" type="text" placeholder="NAME1" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">เลขที่บัตร ปชช.ผู้ค้ำคนที่ 2</label>
            <div class="col-md-3">
            <input id="sub_idcardBM2" name="sub_idcardBM2" type="text" placeholder="IDCARDBM2" class="form-control"></div>
        </div>

        <div class="form-group">
            <label class="col-md-3 control-label" for="money">ชื่อผู้ค้ำคนที่ 2</label>
            <div class="col-md-3">
            <input id="name2" name="name2" type="text" placeholder="NAME2" class="form-control"></div>
        </div>

        <div class="form-group">
          <label class="col-md-3 control-label" for="name">ชื่อกรรมการ</label>
          <div class="col-md-3">
        <select class="form-control" name="id_commit" id="id_commit">
                <option>--เลือก--</option>
                <?php
                  $sql="SELECT * FROM commits";
                  $result = mysqli_query($link, $sql);
                  while ($row=mysqli_fetch_array($result)){
                ?>
                <option value="<?=$row['id_commit']?>"> <?=$row['name_commit']?></option>
                <?php
                  }
                ?>
                </select>
              </div>
        </div>

        <div class="form-group">
            <div class="col-md-12 text-right">

                 <button type="submit" name="btnsubmit" value="send" class="btn btn-success">เพิ่ม</button>
            </div>
        </div>
    </fieldset>
</form>
