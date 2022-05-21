<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">                        
                        <h4 class="text-dark"><a href="<?php echo base_url('house')?>">ข้อมูลครัวเรือน</a> > จัดการข้อมูลครัวเรือน</h4>
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
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/income/'.@$house_id);?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('house/outcome/'.@$house_id);?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>                        

                            <h6>ข้อมูลพื้นฐาน</h6>
                            <form action="<?=base_url('house/save_manage');?>"  method="post" id="form_manage">
                                <input type="hidden" name="house_id" value="<?=@$data['house_id'];?>">
                                <input type="hidden" name="interview_id" value="<?=@$data['interview_id'];?>">                                
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ประเภทโครงการ</label>                                        
                                        <select name="interview_project" id="interview_project" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects_type as $key => $value) :?>
                                                <option <?=@$data['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อโครงการ</label>
                                        <!-- <input type="text" class="form-control" name="interview_project_name" value="<?=@$data['interview_project_name'];?>"> -->
                                        <select name="interview_project_name" id="interview_project_name" class="form-control select2"  required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$data['interview_project_name'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Description'].'/'.$value['Name'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                    </div>     
                                    <div class="form-group col-md-4">
                                        <label>ปีที่สำรวจ</label>                                        
                                        <select name="interview_year" id="interview_year" class="form-control">
                                            <?php foreach (getYear() as $key => $value) :?>
                                                <option value="<?=$value;?>"><?=$value;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label>ชื่อหมู่บ้าน</label>
                                        <input type="text" class="form-control" name="house_moo_name" value="<?=@$data['house_moo_name'];?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>บ้านเลขที่</label>
                                        <input type="text" class="form-control" name="house_number" value="<?=@$data['house_number'];?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>หมู่ที่</label>
                                        <input type="text" class="form-control" name="house_moo" value="<?=@$data['house_moo'];?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>จังหวัด</label>                                        
                                        <select name="house_province" id="house_province" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($province as $key => $value) :?>
                                                <option <?=@$data['house_province'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>อำเภอ</label>                                        
                                        <select name="house_district" id="house_district" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($amphurs as $key => $value) :?>
                                                <option <?=@$data['house_district'] == $value['AMP_CODE'] ? 'selected':'';?>  value="<?=$value['AMP_CODE'];?>"><?=$value['AMP_T'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ตำบล</label>                                        
                                        <select name="house_subdistrict" id="house_subdistrict" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($tambons as $key => $value) :?>
                                                <option <?=@$data['house_subdistrict'] == $value['TAM_CODE'] ? 'selected':'';?>  value="<?=$value['TAM_CODE'];?>"><?=$value['TAM_T'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>บ้าน</label>                                        
                                        <select name="house_home" id="house_home" class="form-control">
                                            <option value=""></option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>กลุ่มบ้าน</label>
                                        
                                        <select class="form-control select2" name="house_label">
                                        <?php foreach ($villages as $key => $value) :?>
                                            <option <?=@$data['house_label'] == $value['Code'] ? 'selected':'';?>  value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                        <?php endforeach?>
                                        </select>
                                        
                                      
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ประเภทที่พักอาศัย</label>
                                        <select name="house_type" id="house_type" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($landomner as $key => $value) :?>
                                                <option <?=@$data['house_type'] == $value['landowner_id'] ? 'selected':'';?>  value="<?=$value['landowner_id'];?>"><?=$value['name'];?></option>
                                            <?php endforeach?>
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

<?=$this->section("css")?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(function(){
        $("#house_province").change(function(){
            var province = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-amphur?province='+province,
                success : function(options){
                    $("#house_district").html(options)
                }
            });
        })

        $("#house_district").change(function(){
            var amphur = $(this).val();
            var province = $("#house_province").val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-tambon?amphur='+amphur+'&province='+province,
                success : function(options){
                    $("#house_subdistrict").html(options)
                }
            });
        })
    })
</script>
<?=$this->endSection()?>
  