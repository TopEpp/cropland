<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลครัวเรือน</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay/manage');?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/land');?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/promote');?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/promote-other');?>';">ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/problem');?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/need');?>';">ความต้องการส่งเสริม</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลพื้นฐาน</h6>
                            <form action="">
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ชื่อผู้สัมภาษณ์</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>วันที่สัมภาษณ์</label>
                                        <input type="text" class="form-control">
                                    </div>     
                                    <div class="form-group col-md-4">
                                        <label>เลขที่แบบสัมภาษณ์</label>
                                        <input type="text" class="form-control">
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label>โครงการ</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>พื้นที่</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ครัวเรือน เลขที่</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อเจ้าของแปลง</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>เอกสารสิทธิ์ที่ดิน</label>
                                        <input type="text" class="form-control">
                                    </div>       
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>การใช้ประโยชน์</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ทำปีปัจจุบัน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ไม่ได้ทำประโยชน์
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ไร่หมุนเวียน
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>แหล่งน้ำที่ใช้</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    น้ำฝน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    แหล่งน้ำธรรมชาติ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    แหล่งน้ำที่สร้างขึ้น
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ตลอดปี
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    บางช่วง
                                                    </label>
                                                </div>
                                            </div>                                      
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>การใช้ที่ดิน</label>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ทำเอง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ให้ผู้อื่นเช่า
                                                    </label>
                                                </div>
                                            </div>                                      
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ชื่อผู้เช่า
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>                                      
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    จำนวน
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>                                      
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">บันทึก</button>
                                        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('survay');?>';" >ยกเลิก</button>
                                    </div>
                                </div>
                            </form>
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
  