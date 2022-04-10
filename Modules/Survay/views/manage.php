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
                        <?php if (session()->getFlashdata("message")):?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                    </button>
                                    <?= session()->getFlashdata("message");?>
                                </div>
                            </div>
                        <?php endif;?>
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay/manage/').@$interview_id;?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลพื้นฐาน</h6>
                            <form action="<?=base_url('survay/save_manage');?>"  method="post" id="form_manage">
                                <input type="hidden" name="interview_id" value=<?=$interview_id;?>>
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ชื่อผู้สัมภาษณ์</label>                                       
                                        <select name="interview_user" id="interview_user" class="form-control">
                                            <option value="">เลือก</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>วันที่สัมภาษณ์</label>
                                        <input type="text" class="form-control" name="interview_date">
                                    </div>     
                                    <div class="form-group col-md-4">
                                        <label>เลขที่แบบสัมภาษณ์</label>
                                        <input type="text" class="form-control" name="interview_code">
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label>โครงการ</label>
                                        <input type="hidden" name="interview_year">
                                        <select name="interview_project" id="interview_project" class="form-control">
                                            <option value="">เลือก</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>พื้นที่</label>
                                        <select name="interview_area" id="interview_area" class="form-control">
                                            <option value="">เลือก</option>
                                        </select>                                      
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ครัวเรือน เลขที่</label>
                                         <select name="interview_house_id" id="interview_house_id" class="form-control">
                                            <option value="">เลือก</option>
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อเจ้าของแปลง</label>
                                         <select name="interview_person_id" id="interview_person_id" class="form-control">
                                            <option value="">เลือก</option>
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>เอกสารสิทธิ์ที่ดิน</label>
                                        <input type="text" class="form-control" name="interview_land_holding">
                                    </div>       
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>การใช้ประโยชน์</label>
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ทำปีปัจจุบัน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ไม่ได้ทำประโยชน์
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
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
                                        <div class="row  mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    น้ำฝน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
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
                                        <div class="row  mb-2">
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
                                            <div class="col-md-12  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ตลอดปี
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12  mb-2">
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
                                            <div class="col-md-12  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ทำเอง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ให้ผู้อื่นเช่า
                                                    </label>
                                                </div>
                                            </div>                                      
                                        </div>
                                        <div class="row  mb-2">
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
                                        <div class="row  mb-2">
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
  