<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">                        
                        <h4 class="text-dark"><a href="<?php echo base_url('survay_house')?>">ข้อมูลแบบสอบถามครัวเรือน</a> > จัดการข้อมูลครัวเรือน</h4>
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
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay_house/manage/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/members/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/jobs/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/income/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลรายได้</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('survay_house/outcome/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>                        

                            <h6>ข้อมูลพื้นฐาน</h6>
                            <form action="<?=base_url('survay_house/save_manage');?>"  method="post" id="form_manage" class="needs-validation" novalidate="">
                                <input type="hidden" name="house_id" value="<?=@$data['house_id'];?>">
                                <input type="hidden" name="interview_id" value="<?=@$data['interview_id'];?>">                                
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ประเภทโครงการ</label>                                        
                                        <select name="interview_project" id="interview_project" class="form-control select2" required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects_type as $key => $value) :?>
                                                <option <?=@$data['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกประเภทโครงการ
                                        </div>      
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อโครงการ</label>
                                        <!-- <input type="text" class="form-control" name="interview_project_name" value="<?=@$data['interview_project_name'];?>"> -->
                                        <select name="interview_project_name" id="interview_project_name" class="form-control select2"  required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$data['interview_project_name'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกชื่อโครงการ
                                        </div>  
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อหมู่บ้าน</label>                                        
                                        <select name="house_home" id="house_home" class="form-control" required="">
                                            <option value=""></option>
                                            <?php foreach ($villages as $key => $value) :?>
                                                <option <?=@$data['house_home'] == $value['VILL_CODE'] ? 'selected':'';?>  value="<?=$value['VILL_CODE'];?>"><?=$value['VILL_T'];?></option>
                                            <?php endforeach?>
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกชื่อหมู่บ้าน
                                        </div> 
                                    </div>
                                                                       
                                    <div class="form-group col-md-4">
                                        <label>บ้านเลขที่</label>
                                        <input type="text" class="form-control" name="house_number" value="<?=@$data['house_number'];?>" required="">
                                        <div class="invalid-feedback">
                                           กรุณากรอกบ้านเลขที่
                                        </div> 
                                    </div>
                                  
                                    
                                    <div class="form-group col-md-4">
                                        <label>จังหวัด</label>                                        
                                        <select name="house_province" id="house_province" class="form-control select2-ajax-province" required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($province as $key => $value) :?>
                                                <option <?=@$data['house_province'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach?>
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกจังหวัด
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>อำเภอ</label>                                        
                                        <select name="house_district" id="house_district" class="form-control select2-ajax-amphur" required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($amphurs as $key => $value) :?>
                                                <option <?=@$data['house_district'] == $value['AMP_CODE'] ? 'selected':'';?>  value="<?=$value['AMP_CODE'];?>"><?=$value['AMP_T'];?></option>
                                            <?php endforeach?>
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกอำเภอ
                                        </div> 
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ตำบล</label>                                        
                                        <select name="house_subdistrict" id="house_subdistrict" class="form-control select2-ajax-tambon" required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($tambons as $key => $value) :?>
                                                <option <?=@$data['house_subdistrict'] == $value['TAM_CODE'] ? 'selected':'';?>  value="<?=$value['TAM_CODE'];?>"><?=$value['TAM_T'];?></option>
                                            <?php endforeach?>
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกตำบล
                                        </div> 
                                    </div>
                                   
                                    <div class="form-group col-md-4">
                                        <label>ปีที่สำรวจ</label>                                        
                                        <select name="interview_year" id="interview_year" class="form-control" required="">
                                            <?php foreach (getYear() as $key => $value) :?>
                                                <option value="<?=$value;?>"><?=$value;?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกปีที่สำรวจ
                                        </div>  
                                    </div>  
                                    
                                    <div class="form-group col-md-4">
                                        <label>ประเภทที่พักอาศัย</label>
                                        <select name="house_type" id="house_type" class="form-control" required="">
                                            <option value="">เลือก</option>
                                            <?php foreach ($landomner as $key => $value) :?>
                                                <option <?=@$data['house_type'] == $value['landowner_id'] ? 'selected':'';?>  value="<?=$value['landowner_id'];?>"><?=$value['name'];?></option>
                                            <?php endforeach?>
                                        </select>
                                        <div class="invalid-feedback">
                                           กรุณาเลือกประเภทที่พักอาศัย
                                        </div> 
                                    </div>          
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">                                       
                                        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('survay_house');?>';" >ยกเลิก</button>
                                        <button type="submit" class="btn btn-info" onclick="saveData($(this));">บันทึก</button>
                                        <button type="button" class="btn btn-primary" <?=!$interview_id ?'disabled':'' ?> onclick="location.href='<?=base_url('survay_house/members/'.$interview_id.'/'.@$house_id);?>';" >ถัดไป</button>
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

<!-- //load select2 ajax/ -->
<?= script_tag('public/assets/js/modules/ajax_select2.js') ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $(function(){
        $("#house_province").change(function(){
            var province = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-amphur?province='+province,
                success : function(options){
                    $("#house_district").html(options)
                    $("#house_district").select2();
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
                    $("#house_subdistrict").select2();
                }
            });
        })

        // $("#house_subdistrict").change(function(){
        //     var tambon = $(this).val();
        //     var amphur = $("#house_district").val();
        //     var province = $("#house_province").val();
        //     $.ajax({
        //         type: "GET",
        //         url: domain+'common/get-villages?amphur='+amphur+'&province='+province+'&tambon='+tambon,
        //         success : function(options){
        //             // $("#house_home").html(options)
        //             // $("#house_home").select2();
        //         }
        //     });
        // })

        $("#interview_project").change(function(){
            var project_type = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-projects?project_type='+project_type,
                success : function(options){
                    $("#interview_project_name").html(options)
                    $("#interview_project_name").select2();
                }
            });
        })

        $("#interview_project_name").change(function(){
            var project = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-projectVillages?project='+project,
                success : function(options){
                    $("#house_home").html(options)
                    $("#house_home").select2();
                }
            });
        })

        $("#house_home").change(function(){
            var village = $(this).val();
            var project=  $("#interview_project_name").val()
            var type=  $("#interview_project").val()
            $.ajax({
                type: "GET",
                url: domain+'common/get-projectAddress?village='+village+'&project='+project+'&type='+type,
                success : function(res){
                    $(".select2-ajax-province").val(res.PROVINCE_ID).trigger("change");

                    setTimeout(() => {
                        $(".select2-ajax-amphur").val(res.AMPHUR_ID).trigger("change");
                    }, 1000);

                    setTimeout(() => {
                        $(".select2-ajax-tambon").val(res.AMPHUR_ID).trigger("change");
                    }, 1000);
                  
                }
            });
        })
    })

    function saveData(elm){
        elm.preventDefault();
        $.ajax({
            type: "GET",
            url: domain+'survay_house/get-duplicateHouse',
            type: "POST",
            data:$('#form_manage').serialize(),
            success : function(res){
                if (res > 0){
                    swal({
                        title: 'พบบ้านเลขที่ซ้ำในระบบ?',
                        text: 'ยืนยันข้อมูลนี้!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((success) => {
                        return false;
                    });
                }
                return true;
                
            }
        });

    
    }
</script>

<?=$this->endSection()?>
  