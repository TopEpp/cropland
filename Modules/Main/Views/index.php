<?=$this->extend("layouts/main")?>

<!-- content -->
<?php $this->section('content') ?>

<div class="row" style="padding-top: 50px;">
    <div class="col-md-4" >
        <a href="<?php echo base_url('/survay_house')?>">
        <div class="card shadow mb-4"  style="border-radius: 10px; height: 400px; background:linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(220, 255, 220, 0.3)), url(<?php echo base_url('public/assets/img/house.jpeg')?>); background-size: cover; ">
            <span style="text-align: center; color: #fff; margin-top: 350px">
                <h2>ข้อมูลครัวเรือน</h2>
            </span>
        </div>
        </a>
    </div>
    <div class="col-md-4" >
        <a href="<?php echo base_url('/survay')?>">
        <div class="card shadow mb-4"  style="border-radius: 10px; height: 400px; background:linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(220, 255, 220, 0.3)), url(<?php echo base_url('public/assets/img/land.jpeg')?>); background-size: cover; ">
            <span style="text-align: center; color: #fff; margin-top: 350px">
                <h2>ข้อมูลที่ดินรายแปลง</h2>
            </span>
        </div>
        </a>
    </div>
    <div class="col-md-4" >
        <a href="<?php echo base_url('/api')?>">
        <div class="card shadow mb-4"  style="border-radius: 10px; height: 400px; background:linear-gradient(0deg, rgba(0, 0, 0, 0.7), rgba(220, 255, 220, 0.3)), url(<?php echo base_url('public/assets/img/setting.jpeg')?>); background-size: cover; ">
            <span style="text-align: center; color: #fff; margin-top: 350px">
                <h2>ตั้งค่าระบบ</h2>
            </span>
        </div>
        </a>
    </div>
</div>

<?php $this->endSection() ?>

