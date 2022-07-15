
<div class="form-group row">
    <label for="prename" class="col-sm-3 col-form-label">คำนำหน้าชื่อ</label>
    <div class="col-sm-9">
        <select name="person_prename" id="person_prename" class="form-control" required="">
            <option value="">เลือก</option>
            <?php foreach ($prename as $key => $value) :?>
                <option <?=@$data['person_prename'] == $value['prefix_id'] ? 'selected':'';?> value="<?=$value['prefix_id'];?>"><?=$value['name'];?></option>
            <?php endforeach?>
        </select>     
        <div class="invalid-feedback">
            กรุณากรอกคำนำหน้า
        </div>   
    </div>
</div>
<div class="form-group row">
    <label for="prename" class="col-sm-3 col-form-label">ชื่อ</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="person_name" value="<?=@$data['person_name'];?>" required="">                            
        <div class="invalid-feedback">
            กรุณากรอกชื่อ
        </div>  
    </div>
</div>
<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">นามสกุล</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="person_lastname" value="<?=@$data['person_lastname'];?>" required="">
        <div class="invalid-feedback">
            กรุณากรอกนามสกุล
        </div>    
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">รหัสประจำตัวประชาชน</label>
    <div class="col-sm-9">
        <input type="text" class="form-control" name="person_number" value="<?=@$data['person_number'];?>" oninput="validateDecimal(this)" required="">
        <div class="invalid-feedback">
            กรุณากรอกรหัสประจำตัวประชาชน
        </div>  
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">ประเภทบัตร</label>
    <div class="col-sm-9">
        <select name="person_type_number" id="person_type_number" class="form-control" required="">
            <option <?=@$data['person_type_number'] == 1 ? 'selected':'';?> value="1">บัตรประชาชน</option>
            <option <?=@$data['person_type_number'] == 2 ? 'selected':'';?> value="2">บัตรต่างดาว</option>
        </select>
        <div class="invalid-feedback">
            กรุณากรอกประเภทบัตร
        </div>   
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">วันเดือนปี เกิด</label>
    <div class="col-sm-9">
        <input type="text" class="form-control datepicker" name="person_birthdate" value="<?=@$data['person_birthdate'];?>">
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">สถานภาพ</label>
    <div class="col-sm-9">
        <select name="person_status" id="person_status" class="form-control" required="">
                <option <?=@$data['person_status'] == 1 ? 'selected':'';?> value="1">โสด</option>
            <option <?=@$data['person_status'] == 2 ? 'selected':'';?> value="2">แต่งงาน</option>
            <option <?=@$data['person_status'] == 3 ? 'selected':'';?> value="3">อย่าล้าง</option>
        </select>
        <div class="invalid-feedback">
            กรุณากรอกสถานภาพ
        </div>    
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">หัวหน้าครอบครัว</label>
    <div class="col-sm-3">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" <?=@$data['person_header'] == 1 ? 'checked':'';?> id="person_header" name="person_header" value="1">
            <label class="form-check-label" for="person_header">
            ใช่
            </label> 
        </div>
    </div>
    <div class="col-sm-3">
        <div class="form-check form-check-inline">
        <input class="form-check-input" type="checkbox" <?=@$data['person_header'] == 2 ? 'checked':'';?> id="person_header" name="person_header" value="2">
            <label class="form-check-label" for="person_header">
            ไม่ใช่
            </label> 
        </div>
    </div>
</div>


<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">ศาสนา</label>
    <div class="col-sm-9">
        <select name="person_religion" id="person_religion" class="form-control">
        <option value="">เลือก</option>
        <?php foreach ($religion as $key => $value) :?>
            <option <?=@$data['person_religion'] == $value['religion_id'] ? 'selected':'';?> value="<?=$value['religion_id'];?>"><?=$value['name'];?></option>
        <?php endforeach?>  
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">ชนเผ่า</label>
    <div class="col-sm-9">
        <select name="person_tribe" id="person_tribe" class="form-control" required="">
            <option value="">เลือก</option>
            <?php foreach ($tribes as $key => $value) :?>
                <option <?=@$data['person_tribe'] == $value['tribe_id'] ? 'selected':'';?> value="<?=$value['tribe_id'];?>"><?=$value['name'];?></option>
            <?php endforeach?>
        </select>
        <div class="invalid-feedback">
            กรุณากรอกชนเผ่า
        </div>   
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">การศึกษา</label>
    <div class="col-sm-9">
        <select name="person_educate" id="person_educate" class="form-control" required="">
            <option value="">เลือก</option>
            <?php foreach ($educations as $key => $value) :?>
                <option <?=@$data['person_educate'] == $value['education_id'] ? 'selected':'';?> value="<?=$value['education_id'];?>"><?=$value['name'];?></option>
            <?php endforeach?>
        </select>
        <div class="invalid-feedback">
            กรุณากรอกการศึกษา
        </div>   
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">อ่านออก/เขียนได้</label>
    <div class="col-sm-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="person_read"name="person_read[]" value="1" <?=@in_array("1", $read) ?'checked':''?>>
            <label class="form-check-label" for="person_read">อ่านออก</label>
        </div> 
    </div>
    <div class="col-sm-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="person_read"name="person_read[]" value="2" <?=@in_array("2", $read) ?'checked':''?>>
            <label class="form-check-label" for="person_read">เขียนได้</label>
        </div>  
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">สามารถช่วยเหลือตัวเอง</label>
    <div class="col-sm-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="person_helpyourslef"name="person_helpyourslef" value="1" <?=@$data['person_helpyourslef'] == 1 ? 'selected':'';?>>
            <label class="form-check-label" for="person_helpyourslef">ได้</label>
        </div> 
    </div>
    <div class="col-sm-3">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="person_helpyourslef"name="person_helpyourslef" value="2" <?=@$data['person_helpyourslef'] == 2 ? 'selected':'';?>>
            <label class="form-check-label" for="person_helpyourslef">ไม่ได้</label>
        </div>  
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">สถานะทางร่างกาย</label>
    <div class="col-sm-3">
    <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="person_disabled"name="person_disabled" value="1" <?=@$data['person_disabled'] == 1 ? 'checked':'';?>>
            <label class="form-check-label" for="person_disabled">พิการ</label>
        </div> 
    </div>
    <div class="col-sm-3">
    <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="person_bed"name="person_bed" value="1" <?=@$data['person_bed'] == 1 ? 'checked':'';?>>
            <label class="form-check-label" for="person_bed">ป่วยติดเตียง</label>
        </div> 
    </div>
</div>


<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">สิทธิการรักษาพยาบาล</label>
    <div class="col-sm-9">
        <?php $person_medical = explode(',',@$data['person_medical']);?>        
            <select name="person_medical[]" id="person_medical" class="form-control js-multiple" multiple="multiple">
            <option value="">เลือก</option>
            <?php foreach ($publichealth as $key => $value) :?>
                <option <?=@in_array($value['publichealth_id'], $person_medical) ?'selected':''?> value="<?=$value['publichealth_id'];?>"><?=$value['name'];?></option>
            <?php endforeach?>                      
        </select>
    </div>
</div>


<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">สถานพยาบาล</label>
    <div class="col-sm-9">
        <?php $person_hospital = explode(',',@$data['person_hospital']);?>                                     
            <select name="person_hospital[]" id="person_hospital" class="form-control js-multiple" multiple="multiple">
            <option value="">เลือก</option>
            <?php foreach ($hospital as $key => $value) :?>
                <option <?=@in_array($value['hospital_id'], $person_hospital) ?'selected':''?> value="<?=$value['hospital_id'];?>"><?=$value['name'];?></option>
            <?php endforeach?>           
        </select>
    </div>
</div>
<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">ได้รับวัคซีนโควิด-19</label>
    <div class="col-sm-9">
        <select name="person_vac_covid" id="person_vac_covid" class="form-control">
            <option <?=@$data['person_vac_covid'] == 1 ? 'selected':'';?> value="1">ได้รับ</option>
            <option <?=@$data['person_vac_covid'] == 2 ? 'selected':'';?> value="2">ยังไม่ได้รับ</option>
        </select>
    </div>
</div>

<div class="form-group row">
    <label for="person_prename" class="col-sm-3 col-form-label">ที่อยู่ปัจจุบัน (กรณีไม่ได้อาศัยที่บ้าน)</label>
    <div class="col-sm-9">
        
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="person_address"name="person_address" value="1" <?=@$data['person_address'] == 1 ? 'checked':'';?>>
            <label class="form-check-label" for="person_address">อาศัยอยู่</label>
        </div> 
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" id="person_address"name="person_address" value="2" <?=@$data['person_address'] == 2 ? 'checked':'';?>>
            <label class="form-check-label" for="person_address">ไม่ได้อาศัย</label>
        </div>  
    </div>
</div>




<script>

    var validateDecimal = function(e) {
        var t = e.value;
        var max_chars = 13;
        if(t.length > max_chars) {
            t = t.substr(0, max_chars);
        }
        e.value = t.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
    }


    $(function () {
        $(".datepicker").datepicker({
            language: "th-th",
            format: "dd/mm/yyyy",
            autoclose: true,

            // daysOfWeekDisabled: [0, 6],
        });
        $('.js-multiple').select2();
    });
    
    
</script>
