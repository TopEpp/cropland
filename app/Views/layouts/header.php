<?php $session = session();?>
<?php $uri = current_url(true);?>
<nav class="navbar navbar-expand-lg main-navbar">
    <div class="navbar-brand">
        <img src="https://www.hrdi.or.th/public/images/about/logos/Hrdi-logo-a.png" alt="logo" width="40px">
    </div>
    <a href="<?=base_url('/main');?>" class="navbar-brand sidebar-gone-hide">
        ระบบศูนย์กลางข้อมูลชุมชนต้นแบบ<br/>
        เพื่อการจัดการบนพื้นที่สูง
    </a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
        <i class="fas fa-ellipsis-v"></i>
        </a>
  
        <div class="container">
            <ul class="navbar-nav">
               
            </ul>
        </div>
    </div>
    <div class="ml-auto">
        <ul class="navbar-nav navbar-right">
           
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url('public/assets/img/avatar/avatar-1.png');?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo $session->get('name'); ?></div></a>
                <div class="dropdown-menu dropdown-menu-right" style="width:250px">

                    <?php if ($uri->getSegment(1) == 'survay_house' || $uri->getSegment(1) == 'dashboard' || $uri->getSegment(1) == 'report'):?>
                        <a href="<?=base_url('survay_house');?>" class="dropdown-item has-icon">
                         ระบบบันทึกข้อมูลครัวเรือน
                        </a>
                        <a href="<?=base_url('dashboard/house');?>" class="dropdown-item has-icon">                   
                            แดชบอร์ดแบบสำรวจครัวเรือน
                        </a>         
                        <a href="<?=base_url('report/house');?>" class="dropdown-item has-icon">                   
                            รายงานสรุปครัวเรือน
                        </a>            
                    <?php endif;?>   

                    <?php if ($uri->getSegment(1) == 'survay' || $uri->getSegment(1) == 'land' || $uri->getSegment(1) == 'dashboard' || $uri->getSegment(1) == 'report'):?>      
                        <a href="<?=base_url('survay');?>" class="dropdown-item has-icon">
                            ข้อมูลแบบสอบถามที่ดินรายแปลง
                        </a>    
                        <a href="<?=base_url('land');?>" class="dropdown-item has-icon">
                        ข้อมูลที่ดินรายแปลง
                        </a>           
                        <a href="<?=base_url('dashboard/survay');?>" class="dropdown-item has-icon">                   
                            แดชบอร์ดแบบสำรวจที่ดินรายแปลง
                        </a>
                        <a href="<?=base_url('report/survay');?>" class="dropdown-item has-icon">                   
                            รายงานสรุปแบบสำรวจที่ดินรายแปลง 
                        </a>
                    <?php endif;?>     
                    <?php if ($uri->getSegment(1) == 'api' || $uri->getSegment(1) == 'member'):?>                           
                        <a href="<?=base_url('api');?>" class="dropdown-item has-icon">                 
                        ข้อมูลอ้างอิงแบบสอบถาม
                        </a>
                        <a href="<?=base_url('member');?>" class="dropdown-item has-icon">
                    
                        จัดการข้อมูลสิทธิ์ผู้ใช้งาน
                        </a>
                    <?php endif;?>     
                    
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url('/logout');?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>

</nav>
