<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>

<section class="section">
    <div class="section-body">
        <div class="row" style="margin-bottom:15px">
            <div class="col-md-12" style="text-align: center;">
                <a href="<?= base_url('api');?>" class="btn btn-info" style="width: 200px;">ข้อมูลอ้างอิงแบบสอบถาม</a>
                <a href="<?= base_url('member');?>" class="btn btn-info" style="width: 200px;">ข้อมูลผู้ใช้งาน</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลอ้างอิงแบบสอบถาม</h4>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><a href="<?php echo base_url('api/manage/projectType')?>">ประเภทโครงการ</a></li>
                            <li><a href="<?php echo base_url('api/manage/project')?>">โครงการ</a></li>
                            <!-- <li><a href="<?php echo base_url('api/manage/cardType')?>">ประเภทบัตร</a></li> -->
                            <li><a href="<?php echo base_url('api/manage/productGroup')?>">ประเภทการใช้ประโยชน์ที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/manage/productType')?>">การใช้ที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/manage/product')?>">พันธุ์</a></li>
                            <li><a href="<?php echo base_url('api/manage/chemicalType')?>">ประเภทปุ๋ย</a></li>
                            <li><a href="<?php echo base_url('api/manage/chemicalBrand')?>">ยี่ห้อปุ๋ย</a></li>
                            <li><a href="<?php echo base_url('api/manage/chemicalFormular')?>">สูตรปุ๋ย</a></li>
                            <li><a href="<?php echo base_url('api/manage/medicalType')?>">ประเภทยา</a></li>
                            <li><a href="<?php echo base_url('api/manage/medicalBrand')?>">ยี่ห้อยา</a></li>
                            <li><a href="<?php echo base_url('api/manage/employType')?>">ลักษณธการจ้าง</a></li>
                            <li><a href="<?php echo base_url('api/manage/laborType')?>">การจ้างแรงงาน</a></li>
                            <li><a href="<?php echo base_url('api/manage/productSale')?>">ลักษณะการขาย</a></li>
                            <li><a href="<?php echo base_url('api/manage/possessRight')?>">เอกสารสิทธิที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/manage/supportType')?>">การสนับสนุนจาก สวพส.</a></li>
                            <li><a href="<?php echo base_url('api/manage/wantSupportType')?>">ความต้องการ การสนับสนุนจากหน่วยงาน</a></li>
                            <li><a href="<?php echo base_url('api/manage/department')?>">หน่วยงาน</a></li>
                            <li><a href="<?php echo base_url('api/manage/problemType')?>">ปัญหาทางด้านการเกษตร</a></li>
                            <li><a href="<?php echo base_url('api/manage/market')?>">ตลาด</a></li>
                            <li><a href="<?php echo base_url('api/manage/unit')?>">หน่วยนับ</a></li>

                            <li><a href="<?php echo base_url('api/manage/jobsGroup')?>">ประเภทกลุ่มอาชีพ</a></li>
                            <li><a href="<?php echo base_url('api/jobs')?>">ประเภทอาชีพ</a></li>
                            <li><a href="<?php echo base_url('api/manage/education')?>">ระดับการศึกษา</a></li>
                            <li><a href="<?php echo base_url('api/manage/expenses')?>">ประเภทรายจ่าย</a></li>
                            <li><a href="<?php echo base_url('api/manage/religion')?>">ศาสนา</a></li>
                            <li><a href="<?php echo base_url('api/manage/tribe')?>">ชนเผ่า</a></li>
                            <li><a href="<?php echo base_url('api/manage/publicHealth')?>">ประเภทสิทธิ์การรักษาพยาบาล</a></li>
                            <li><a href="<?php echo base_url('api/manage/diseaseGroup')?>">ประเภทโรคประจำตัว</a></li>
                            <li><a href="<?php echo base_url('api/manage/hospital')?>">สถานพยาบาล</a></li>
                            
                            
                        </ul>
                       <!--  <ul>
                            <li><a href="<?php echo base_url('api/manage/agriWork')?>">ประเภทแรงงาน</a></li>
                            <li><a href="<?php echo base_url('api/areaTarget')?>">พื้นที่เป้าหมาย</a></li>
                            
                            <li><a href="<?php echo base_url('api/manage/landOwner')?>">ประเภทที่พักอาศัย</a></li>
                            <li><a href="<?php echo base_url('api/manage/problemType')?>">ประเภทปัญหา</a></li>
                            <li><a href="<?php echo base_url('api/manage/product')?>">ประเภทผลผลิต</a></li>
                            
                            
                            <li><a href="<?php echo base_url('api/manage/landUse')?>">ประเภทการใช้ประโยชน์ที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/manage/landprivilege')?>">ประเภทเอกสิทธิ์ที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/manage/location')?>">พื้นที่</a></li>
                        </ul> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<!-- <script src="<?= base_url('public/js/script.js') ?>"></script> -->
<?=$this->endSection()?>
  