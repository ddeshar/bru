<style media="screen">
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
</style>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">

                <h2>จำนวนเงินคุณคือ</h2>
                <h1><?php echo number_format($budget);?></h1>
                <div class="error-details">
                  ไม่สามารถทำการกู้เงินได้
                </div>
                <div class="error-actions">
                    <a href="all_member_loan.php" class="btn btn-primary btn-lg"><span class="fa fa-reply"></span> ถอยกลับ </a>
                    <a href="all_member_loan.php" class="btn btn-primary btn-lg"><span class="#"></span> ตกลง </a>
                </div>
            </div>
        </div>
    </div>
</div>



<h2></h2>
