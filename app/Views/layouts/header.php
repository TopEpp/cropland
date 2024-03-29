<?php $session = session();?>
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
        <!-- <ul class="navbar-nav">
        <li class="nav-item active"><a href="#" class="nav-link">Application</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Report Something</a></li>
        <li class="nav-item"><a href="#" class="nav-link">Server Status</a></li>
        </ul> -->
        <div class="container">
            <ul class="navbar-nav">
                <!-- <li class="nav-item active"><a href="#" class="nav-link">Home</a></li> -->
                <!-- <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                    <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
                </ul>
                </li>
                <li class="nav-item active">
                <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
                </li>
                <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                    <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        </ul>
                        </li>
                        <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                    </ul>
                    </li>
                </ul>
                </li> -->
            </ul>
        </div>
    </div>
    <div class="ml-auto">
        <ul class="navbar-nav navbar-right">
            <!-- <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">Messages
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-message">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                        <img alt="image" src="../assets/img/avatar/avatar-1.png" class="rounded-circle">
                        <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                        <b>Kusnaedi</b>
                        <p>Hello, Bro!</p>
                        <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                        <img alt="image" src="../assets/img/avatar/avatar-2.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                        <b>Dedik Sugiharto</b>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-avatar">
                        <img alt="image" src="../assets/img/avatar/avatar-3.png" class="rounded-circle">
                        <div class="is-online"></div>
                        </div>
                        <div class="dropdown-item-desc">
                        <b>Agung Ardiansyah</b>
                        <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                        <img alt="image" src="../assets/img/avatar/avatar-4.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                        <b>Ardian Rahardiansyah</b>
                        <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                        <div class="time">16 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-avatar">
                        <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle">
                        </div>
                        <div class="dropdown-item-desc">
                        <b>Alfa Zulkarnain</b>
                        <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                        <div class="time">Yesterday</div>
                        </div>
                    </a>
                    </div>
                    <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li>
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                    <div class="dropdown-header">Notifications
                    <div class="float-right">
                        <a href="#">Mark All As Read</a>
                    </div>
                    </div>
                    <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                        <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-code"></i>
                        </div>
                        <div class="dropdown-item-desc">
                        Template update is available now!
                        <div class="time text-primary">2 Min Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                        <i class="far fa-user"></i>
                        </div>
                        <div class="dropdown-item-desc">
                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                        <div class="time">10 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-success text-white">
                        <i class="fas fa-check"></i>
                        </div>
                        <div class="dropdown-item-desc">
                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                        <div class="time">12 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-danger text-white">
                        <i class="fas fa-exclamation-triangle"></i>
                        </div>
                        <div class="dropdown-item-desc">
                        Low disk space. Let's clean it!
                        <div class="time">17 Hours Ago</div>
                        </div>
                    </a>
                    <a href="#" class="dropdown-item">
                        <div class="dropdown-item-icon bg-info text-white">
                        <i class="fas fa-bell"></i>
                        </div>
                        <div class="dropdown-item-desc">
                        Welcome to Stisla template!
                        <div class="time">Yesterday</div>
                        </div>
                    </a>
                    </div>
                    <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                    </div>
                </div>
            </li> -->
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="<?= base_url('public/assets/img/avatar/avatar-1.png');?>" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block"><?php echo $session->get('name'); ?></div></a>
                <div class="dropdown-menu dropdown-menu-right" style="width:250px">
                    <!-- <a href="<?=base_url('dashboard/house');?>" class="dropdown-item has-icon">                   
                   แดชบอร์ดแบบสำรวจครัวเรือน
                   </a>
                    <a href="<?=base_url('dashboard/survay');?>" class="dropdown-item has-icon">
                   
                    แดชบอร์ดแบบสำรวจที่ดินรายแปลง
                    </a>
                    <a href="<?=base_url('survay_house');?>" class="dropdown-item has-icon">
                    
                    ระบบบันทึกข้อมูลครัวเรือน
                    </a>
                    <a href="<?=base_url('land');?>" class="dropdown-item has-icon">
                   
                    ข้อมูลที่ดินรายแปลง
                    </a>
                    <a href="<?=base_url('survay');?>" class="dropdown-item has-icon">
                    
                    ข้อมูลแบบสอบถามที่ดินรายแปลง
                    </a>
                    <a href="<?=base_url('report/survay');?>" class="dropdown-item has-icon">                   
                    รายงานสรุปแบบสำรวจที่ดินรายแปลง 
                   </a>
                   <a href="<?=base_url('report/house');?>" class="dropdown-item has-icon">                   
                   รายงานสรุปครัวเรือน
                   </a>
                    <a href="<?=base_url('api');?>" class="dropdown-item has-icon">                 
                    ข้อมูลอ้างอิงแบบสอบถาม
                    </a>
                    <a href="<?=base_url('member');?>" class="dropdown-item has-icon">
                 
                    จัดการข้อมูลสิทธิ์ผู้ใช้งาน
                    </a>
                     -->
                    
                    <!-- <a href="<?=base_url('dashboard/house-land');?>" class="dropdown-item has-icon">
                   
                    รายงานสรุปลักษณะของครัวเรือน
                    </a>
                    <a href="<?=base_url('dashboard/house-economy');?>" class="dropdown-item has-icon">
                   
                    รายงานสรุปข้อมูลด้านเศรฐกิจ<br/>ในครัวเรือน
                    </a>
                    <a href="<?=base_url('dashboard/house-health');?>" class="dropdown-item has-icon">
                   
                    รายงานสรุปข้อมูลด้านสาธารณสุข
                    </a>
                    <a href="<?=base_url('dashboard/house-society');?>" class="dropdown-item has-icon">
                   
                    รายงานสรุปข้อมูลด้านสังคม
                    </a>
                    <a href="<?=base_url('dashboard/house-land');?>" class="dropdown-item has-icon">
                   
                    รายงานข้อมูลด้านการเกษตร<br/>และการถือครองที่ดิน
                    </a>
                    <a href="<?=base_url('dashboard/house-problem');?>" class="dropdown-item has-icon">
                   
                    รายงานสรุปข้อมูลปัญหาทาง<br/>ด้านการเกษตร
                    </a>
                    <a href="<?=base_url('dashboard/house-activity');?>" class="dropdown-item has-icon">
                   
                    รายงานสรุปการเข้าร่วมกิจกรรม<br/>และรวมกลุ่ม
                    </a> -->
                    
                    <div class="dropdown-divider"></div>
                    <a href="<?=base_url('/logout');?>" class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </li>
        </ul>
    </div>

</nav>

      <!-- <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="index-0.html" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="index.html" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li>
            <li class="nav-item active">
              <a href="#" class="nav-link"><i class="far fa-heart"></i><span>Top Navigation</span></a>
            </li>
            <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                  </ul>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav> -->