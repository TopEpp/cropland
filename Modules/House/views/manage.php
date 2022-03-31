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
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('house/manage/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/members/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/benefits/'.@$house_id);?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('house/accounts/'.@$house_id);?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>                        

                            <h6>ข้อมูลพื้นฐาน</h6>
                            <form action="<?=base_url('house/save_manage');?>"  method="post" id="form_manage">
                                <input type="hidden" name="house_id" value="<?=@$house_id;?>">
                                <input type="hidden" name="interview_id" value="<?=@$interview_id;?>">                                
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ประเภทโครงการ</label>                                        
                                        <select name="interview_project" id="interview_project" class="form-control">
                                            <option value="1">1</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อโครงการ</label>
                                        <input type="text" class="form-control" name="interview_project_name">
                                    </div>     
                                    <div class="form-group col-md-4">
                                        <label>ปีที่สำรวจ</label>                                        
                                        <select name="interview_year" id="interview_year" class="form-control">
                                            <option value="2565">2565</option>
                                        </select>
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label>ชื่อหมู่บ้าน</label>
                                        <input type="text" class="form-control" name="house_moo_name">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>บ้านเลขที่</label>
                                        <input type="text" class="form-control" name="house_number">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>หมู่ที่</label>
                                        <input type="text" class="form-control" name="house_moo">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>จังหวัด</label>                                        
                                        <select name="house_province" id="house_province" class="form-control">
                                            <option value="2565">2565</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>อำเภอ</label>                                        
                                        <select name="house_district" id="house_district" class="form-control">
                                            <option value="2565">2565</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ตำบล</label>                                        
                                        <select name="house_subdistrict" id="house_subdistrict" class="form-control">
                                            <option value="2565">2565</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>บ้าน</label>                                        
                                        <select name="house_home" id="house_home" class="form-control">
                                            <option value="2565">2565</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>กลุ่มบ้าน</label>
                                        <input type="text" class="form-control" name="house_label">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ประเภทที่พักอาศัย</label>
                                        <select name="house_type" id="house_type" class="form-control">
                                            <option value="2565">2565</option>
                                        </select>
                                    </div>          
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">บันทึก</button>
                                        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('house');?>';" >ยกเลิก</button>
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
  