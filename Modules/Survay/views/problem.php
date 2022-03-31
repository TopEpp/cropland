<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลแบบสอบถาม</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage');?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/land');?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/promote');?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/promote-other');?>';">ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay/problem');?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/need');?>';">ความต้องการส่งเสริม</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลปัญหาด้านการเกษตร</h6>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        โครงสร้างปัจจัยพื้นฐาน
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        ทรัพยากรธรรมชาติและสิ่งแวดล้อม
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        ตลาด
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        เศรษฐกิจ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                        <label class="form-check-label" for="defaultCheck1">
                                        สังคม
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">บันทึก</button>
                                    <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('survay');?>';" >ยกเลิก</button>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>

<?=$this->section("scripts")?>

<?=$this->endSection()?>
  