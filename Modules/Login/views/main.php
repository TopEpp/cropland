<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body text-centerr" style="cursor:pointer" onclick="location.href='<?=base_url('survay_house');?>';">
                        <h5>ข้อมูลสำรวจรายครัวเรือน</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body text-center" style="cursor:pointer" onclick="location.href='<?=base_url('survay');?>';">
                        <h5>ข้อมูลที่ดินรายแปลง</h5>
                    </div>
                </div>
            </div>
            <div class="col-4 col-md-4 col-lg-4">
                <div class="card">
                    <div class="card-body text-center" style="cursor:pointer" onclick="location.href='<?=base_url('api');?>';">
                        <h5>ตั้งค่าระบบ</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>