<style>
.report_black{
color: white;

}
</style>


<ul id="menu" class="page-sidebar-menu">
    <li  <?php if($page == 'member') echo 'class="active" id="active"'; ?> >
        <a href="mem.php">
            <i class="livicon" data-name="home" data-size="18" data-c="#418BCA" data-hc="#418BCA" data-loop="true"></i>
            <span class="title">หน้าแรก</span>
        </a>

    </li>
    <li <?php if(($page == 'users') || ($page == 'adduser') || ($page == 'view_user') || ($page == 'deleted_users')) echo 'class="active"'; ?> >
        <a href="#">
            <i class="livicon" data-name="folder" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
            <span class="title">ข้อมูลพื้นฐาน</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($page == 'users') echo 'class="active" id="active"'; ?> >
                <a href="member_view.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลส่วนตัว
                </a>
            </li>
            <li <?php if($page == 'users') echo 'class="active" id="active"'; ?> >
                <a href="member_edit.php">
                    <i class="fa fa-angle-double-right"></i>
                    แก้ไขข้อมูลส่วนตัว
                </a>
            </li>
        </ul>
    </li>
    <li <?php if($page == 'accordionformwizard') echo 'class="active" id="active"'; ?> >
        <a href="#">
            <i class="livicon" data-name="money" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
            <span class="title">สัจจะออมทรัพย์</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($page == 'accordionformwizard') echo 'class="active" id="active"'; ?> >
                <a href="deposit_view.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลฝาก-ถอนเงินสัจจะฯ
                </a>
            </li>
        </ul>
    </li>

    </li>
    <li <?php if(($page == 'animatedicons') || ($page == 'buttons') || ($page == 'advanced_buttons') || ($page == 'tabs_accordions') || ($page == 'panels') || ($page == 'icon') || ($page == 'color') || ($page == 'grid') || ($page == 'carousel') || ($page == 'advanced_modals') || ($page == 'tagsinput') || ($page == 'nestable') || ($page == 'toastr') || ($page == 'notifications') || ($page == 'session_timeout') || ($page == 'portlet_draggable')) echo 'class="active"'; ?> >
        <a href="#">
            <i class="livicon" data-name="list" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
            <span class="title">ข้อมูลการยื่นกู้เงินกองทุน</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">

            <li <?php if($page == 'loan') echo 'class="active" id="active"'; ?> >
                <a href="member_loan.php">
                    <i class="fa fa-angle-double-right"></i>
                    ยื่นกู้
                </a>
            </li>
            <li <?php if($page == 'approve') echo 'class="active" id="active"'; ?> >
                <a href="submitted.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการยื่นกู้
                </a>
            </li>
            <li <?php if($page == 'approve') echo 'class="active" id="active"'; ?> >
                <a href="approve.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลอนุมัติเงินกู้
                </a>
            </li>
            <li <?php if($page == 'report_promise') echo 'class="active" id="active"'; ?> >
                <a href="promise.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการทำสัญญากู้ยืมเงิน
                </a>
            </li>
            <li <?php if($page == 'report_repayment') echo 'class="active" id="active"'; ?> >
                <a href="repayment.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการจ่ายเงินกู้ให้ผู้กู้
                </a>
            </li>
            <li <?php if($page == 'report_refund') echo 'class="active" id="active"'; ?> >
                <a href="refund.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการชำระเงินกู้และดอกเบี้ย
                </a>
            </li>
        </ul>
    </li>
    <li <?php if($page == 'accordionformwizard') echo 'class="active" id="active"'; ?> >
        <a href="history_pdf.php">
            <i class="livicon" data-name="list" data-size="18" data-c="#00bc8c" data-hc="#00bc8c" data-loop="true"></i>
            <span class="title">ประวัติการเข้าใช้งาน</span>
            <span class="fa arrow"></span>
        </a>
      </li>
