<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
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
                            <li><a href="<?php echo base_url('api/agriWork')?>">ประเภทแรงงาน</a></li>
                            <li><a href="<?php echo base_url('api/areaTarget')?>">พื้นที่เป้าหมาย</a></li>
                            <li><a href="<?php echo base_url('api/diseaseGroup')?>">ประเภทโรคประจำตัว</a></li>
                            <li><a href="<?php echo base_url('api/education')?>">ระดับการศึกษา</a></li>
                            <li><a href="<?php echo base_url('api/expenses')?>">ประเภทรายจ่าย</a></li>
                            <li><a href="<?php echo base_url('api/hospital')?>">สถานพยาบาล</a></li>
                            <li><a href="<?php echo base_url('api/jobs')?>">ประเภทอาชีพ</a></li>
                            <li><a href="<?php echo base_url('api/jobsGroup')?>">ประเภทกลุ่มอาชีพ</a></li>
                            <li><a href="<?php echo base_url('api/landOwner')?>">ประเภทที่พักอาศัย</a></li>
                            <li><a href="<?php echo base_url('api/problemType')?>">ประเภทปัญหา</a></li>
                            <li><a href="<?php echo base_url('api/product')?>">ประเภทผลผลิต</a></li>
                            <li><a href="<?php echo base_url('api/publicHealth')?>">ประเภทสิทธิ์การรักษาพยาบาล</a></li>
                            <li><a href="<?php echo base_url('api/religion')?>">ศาสนา</a></li>
                            <li><a href="<?php echo base_url('api/tribe')?>">ชนเผ่า</a></li>
                            <li><a href="<?php echo base_url('api/landUse')?>">ประเภทการใช้ประโยชน์ที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/landprivilege')?>">ประเภทเอกสิทธิ์ที่ดิน</a></li>
                            <li><a href="<?php echo base_url('api/location')?>">พื้นที่</a></li>
                        </ul>
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
  