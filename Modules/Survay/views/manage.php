<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">                        
                        <h4 class="text-dark"><a href="<?php echo base_url('survay')?>">ข้อมูลแบบสอบถาม</a> > จัดการข้อมูลแบบสอบถาม</h4>
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
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay/manage/').@$interview_id;?>';">ข้อมูลเบื้องต้น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/picture/'.@$interview_id);?>';">รูปภาพ</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลเบื้องต้น</h6>
                            <form action="<?=base_url('survay/save_manage');?>"  method="post" id="form_manage">
                                <input type="hidden" name="interview_id" value=<?=$interview_id;?>>
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ชื่อผู้เก็บข้อมูล</label>                                       
                                        <select name="interview_user" id="interview_user" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($users as $key => $value) :?>
                                                <option <?=@$data['interview_user'] == $value['emp_id']?'selected':'';?> value="<?=$value['emp_id'];?>"><?=$value['fullname'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>วันที่เก็บข้อมูล</label>
                                        <input type="text" class="form-control" name="interview_date" id="datepicker" value="<?=@$data['interview_date'];?>">
                                    </div>     
                                    <div class="form-group col-md-4">
                                        <label>รหัสแปลง</label>
                                        <input type="text" class="form-control" name="interview_code" value="<?=@$data['interview_code'];?>">
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label>โครงการ</label>
                                     
                                        <select name="interview_project" id="interview_project" class="form-control" onchange="selectProject($(this))">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$data['interview_project'] == $value['Runno']?'selected':'';?> value="<?=$value['Runno'];?>"><?=$value['Description'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>พื้นที่</label>
                                        <select name="interview_area" id="interview_area" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($lands as $key => $value) :?>
                                                <option <?=@$data['interview_area'] == $value['land_id']?'selected':'';?>  value="<?=$value['land_id'];?>"><?=$value['land_number'].' '.$value['land_no'];?></option>
                                            <?php endforeach;?>
                                        </select>                                      
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>กลุ่มบ้าน</label>
                                         <select name="interview_house_id" id="interview_house_id" class="form-control" onchange="selectHouse($(this))">
                                            <option value="">เลือก</option>
                                            <?php foreach ($houses as $key => $value) :?>
                                                <option <?=@$data['interview_house_id'] == $value['house_id']?'selected':'';?>  value="<?=$value['house_id'];?>"><?=$value['house_number'];?></option>
                                            <?php endforeach;?>
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อเจ้าของแปลง</label>
                                         <select name="interview_person_id" id="interview_person_id" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php   foreach ($persons as $key => $person) :?>
                                                <?php foreach ($person as $key => $value) :?>
                                                    <?php if ($value['person_header'] == 1):?>
                                                        <option  <?=$data['interview_person_id'] == $value['person_id'] ? 'selected':'' ;?> value="<?=$value['person_id'];?>"><?=$value['person_name'].' '.$value['person_lastname'];?></option>
                                                    <?php endif;?>                                                    
                                                <?php endforeach;?>
                                            <?php endforeach;?>
                                        </select>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>เอกสารสิทธิ์ที่ดิน</label>
                                        <!-- <input type="text" class="form-control" name="interview_land_holding"  value="<?=@$data['interview_land_holding'];?>"> -->
                                        <select name="interview_land_holding" id="interview_land_holding" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>  
                                    <div class="form-group col-md-4">
                                        <label>ปีสำรวจ</label>                                        
                                        <select name="interview_year" id="interview_year" class="form-control">
                                            <option value="2665">2565</option>
                                            <option value="2664">2564</option>
                                            <option value="2663">2563</option>
                                        </select>
                                    </div>       
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5>ข้อมูลครัวเรือน</h5>
                                        <p>ชื่อเจ้าของแปลง</p>
                                        <p>บ้านเลขที่ 39/1 หมู่ 8 ต.แม่ตื่น อ.แม่ระมาด จ.ตาก 63140</p>   
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>การเก็บตัวอย่างวิเคราะห์ดินและน้ำจาก สวพส.</label>
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    ดิน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="defaultCheck1">
                                                    <label class="form-check-label" for="defaultCheck1">
                                                    น้ำ
                                                    </label>
                                                </div>
                                            </div>
                                        </div>                                     
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label>การใช้ประโยชน์</label>
                                        <div class="row mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_utilization_type1" name="interview_land_utilization_type" value="1">
                                                    <label class="form-check-label" for="interview_land_utilization_type1">
                                                    ทำปีปัจจุบัน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_utilization_type2" name="interview_land_utilization_type" value="3">
                                                    <label class="form-check-label" for="interview_land_utilization_type2">
                                                    ไม่ได้ทำประโยชน์
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_utilization_type3" name="interview_land_utilization_type" value="2">
                                                    <label class="form-check-label" for="interview_land_utilization_type3">
                                                    ไร่หมุนเวียน
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="interview_land_utilization_year" id="interview_land_utilization_year">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>แหล่งน้ำที่ใช้</label>
                                        <div class="row  mb-2">
                                            <div class="col-md-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="intervew_land_water_type1" name="intervew_land_water_type" value="1">
                                                    <label class="form-check-label" for="intervew_land_water_type1">
                                                    น้ำฝน
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="intervew_land_water_type2" name="intervew_land_water_type" value="2">
                                                    <label class="form-check-label" for="intervew_land_water_type2">
                                                    แหล่งน้ำธรรมชาติ
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">&nbsp;</div>
                                            <div class="col-md-4  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_water_allyear1" name="interview_land_water_allyear" value="1">
                                                    <label class="form-check-label" for="interview_land_water_allyear1">
                                                    พอใช้ตลอดปี
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_water_allyear2" name="interview_land_water_allyear" value="2">
                                                    <label class="form-check-label" for="interview_land_water_allyear2">
                                                    ไม่พอใช้ตลอดปี
                                                    </label>
                                                </div>
                                            </div>                                      
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-6">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="intervew_land_water_type3" name="intervew_land_water_type" value="3">
                                                    <label class="form-check-label" for="intervew_land_water_type3">
                                                    แหล่งน้ำที่สร้างขึ้น
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">&nbsp;</div>
                                            <div class="col-md-4  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_water_self_allyear1" name="interview_land_water_self_allyear" value="1">
                                                    <label class="form-check-label" for="interview_land_water_self_allyear1">
                                                    พอใช้ตลอดปี
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-4  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_water_self_allyear2" name="interview_land_water_self_allyear" value="2">
                                                    <label class="form-check-label" for="interview_land_water_self_allyear2">
                                                    ไม่พอใช้ตลอดปี
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
                                                    <input class="form-check-input" type="radio" id="interview_land_use_type1" name="interview_land_use_type" value="1">
                                                    <label class="form-check-label" for="interview_land_use_type1">
                                                    ทำเอง
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-md-12  mb-2">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" id="interview_land_use_type2" name="interview_land_use_type" value="2">
                                                    <label class="form-check-label" for="interview_land_use_type2">
                                                    ให้ผู้อื่นเช่า
                                                    </label>
                                                </div>
                                            </div>                                      
                                        </div>
                                      
                                        <div class="row  mb-2">
                                            <div class="col-md-3 text-right">
                                               <label for="">ชื่อผู้เช่า</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="interview_land_renter" id="interview_land_renter">
                                            </div>                                      
                                        </div>
                                        <div class="row  mb-2">
                                            <div class="col-md-3  text-right">
                                               <label for="">ค่าเช้าต่อปี</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" name="interview_land_rentalfee" id="interview_land_rentalfee">
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

<?=$this->section("css")?>
<?= link_tag('public/assets/datepicker/css/datepicker.css') ?>
<?=$this->endSection()?>


<?=$this->section("scripts")?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker.js') ?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker-thai.js') ?>
<?= script_tag('public/assets/datepicker/js/locales/bootstrap-datepicker.th.js') ?>

<script>

    $(function () {
        $("#datepicker").datepicker({
            language: "th-th",
            format: "dd/mm/yyyy",
            autoclose: true,

            // daysOfWeekDisabled: [0, 6],
        });
    });
    function selectProject(elm){
        var value = elm.val();
        $.ajax({
            type: "GET",
            url: domain+'common/get-house?interview='+value,
            success : function(options){
                $("#interview_house_id").html(options)
            }
        });
    }

    function selectHouse(elm){
        var value = elm.val();
        $.ajax({
            type: "GET",
            url: domain+'common/get-person?house='+value,
            success : function(options){
                $("#interview_person_id").html(options)
            }
        });
    }

    
</script>

<?=$this->endSection()?>
  