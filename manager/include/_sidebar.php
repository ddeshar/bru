<style>
.report_black{
color: white;

}
</style>


<ul id="menu" class="page-sidebar-menu">
    <li  <?php if($page == 'manager') echo 'class="active" id="active"'; ?> >
        <a href="../manager/manager.php">
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
                <a href="funds.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลกองทุนหมู่บ้าน
                </a>
            </li>
            <li <?php if($page == 'adduser') echo 'class="active" id="active"'; ?> >
                <a href="committee.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลกรรมการ
                </a>
            </li>

          <!--  <li <?php// if($page == 'view_user') echo 'class="active" id="active"'; ?> >
                <a href="member.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลสมาชิก
                </a>
            </li>
            <li <?php// if($page == 'deleted_users') echo 'class="active" id="active"'; ?> >
                <a href="user.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลผู้ใช้งานระบบ
                </a>
            </li> -->
        </ul>
    </li>


    </li>
    <li <?php if(($page == 'animatedicons') || ($page == 'buttons') || ($page == 'advanced_buttons') || ($page == 'tabs_accordions') || ($page == 'panels') || ($page == 'icon') || ($page == 'color') || ($page == 'grid') || ($page == 'carousel') || ($page == 'advanced_modals') || ($page == 'tagsinput') || ($page == 'nestable') || ($page == 'toastr') || ($page == 'notifications') || ($page == 'session_timeout') || ($page == 'portlet_draggable')) echo 'class="active"'; ?> >
        <a href="#">
            <i class="livicon" data-name="list" data-c="#F89A14" data-hc="#F89A14" data-size="18" data-loop="true"></i>
            <span class="title">ออกรายงาน</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li <?php if($page == 'animatedicons') echo 'class="active" id="active"'; ?> >
              <h5 class="report_black"><i class ="re">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายงานข้อมูลพื้นฐาน</i></h5>
                <a href="report_history.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลประวัติการเข้าใช้งาน
                </a>
            </li>
            <li <?php if($page == 'report_member') echo 'class="active" id="active"'; ?> >
                <a href="report_member.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลสมาชิก
                </a>
            </li>
            <li <?php if($page == 'report_committee') echo 'class="active" id="active"'; ?> >
                <a href="report_committes.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลกรรมการ
                </a>
            </li>
            <li <?php if($page == 'report_deposit') echo 'class="active" id="active"'; ?> >
              <h5 class="report_black"> <i class ="re">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายงานข้อมูลสัจจะออมทรัพย์</i> </h5>
                <a href="report_deposit.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการฝาก - ถอน
                </a>
            </li>

            <li <?php if($page == 'report_stopmember') echo 'class="active" id="active"'; ?> >
                <a href="report_stopmember.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการยกเลิกบัญชี
                </a>
            </li>
            <li <?php if($page == 'report_submitted.php') echo 'class="active" id="active"'; ?> >
            <h5 class="report_black">  <i class ="re" class="report_black">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;รายงานข้อมูลกองทุนหมู่บ้าน</i> </h5>
                <a href="report_submitted.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการยื่นกู้
                </a>
            </li>
            <li <?php if($page == 'report_approve') echo 'class="active" id="active"'; ?> >
                <a href="report_approves.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลอนุมัติเงินกู้
                </a>
            </li>
            <li <?php if($page == 'report_promise') echo 'class="active" id="active"'; ?> >
                <a href="report_promises.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการทำสัญญากู้ยืมเงิน
                </a>
            </li>
            <li <?php if($page == 'report_repayment') echo 'class="active" id="active"'; ?> >
                <a href="report_repayments.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการจ่ายเงินกู้ให้ผู้กู้
                </a>
            </li>
            <li <?php if($page == 'report_refund') echo 'class="active" id="active"'; ?> >
                <a href="report_refund.php">
                    <i class="fa fa-angle-double-right"></i>
                    ข้อมูลการชำระเงินกู้และดอกเบี้ย
                </a>
            </li>
        </ul>
    </li>
