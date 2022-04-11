<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card repeater">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลครัวเรือน</h4>
                        <div class="card-header-action">
                            <button  data-repeater-create class="btn btn-info" id="add-family">เพิ่มครอบครัว</button>
                        </div>
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
                        <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/members/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/income/'.@$house_id);?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('house/outcome/'.@$house_id);?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลสมาชิกในครัวเรือน</h6>      
                                <div data-repeater-list="group">

                                    <!-- //template list -->
                                    <div data-repeater-item style="display:none;">
                                        <input type="hidden" name="family" value="1" />
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>ครอบครัว <span class="key_data">1</span></h4>
                                                <div class="card-header-action">                                        
                                                    <a href="#" class="btn btn-info family_key" data-id="1" onclick="addFimaly($(this))">เพิ่มข้อมูลสมาชิก</a>
                                                </div>
                                            </div>
                                            <div class="collapse show" id="mycard-collapse">
                                                <div class="card-body">
                                                    <table class="table table-bordered">
                                                        <thead >
                                                            <tr>
                                                            <th scope="col">ลำดับ</th>
                                                            <th scope="col">รหัสประจำตัวประชาชน</th>
                                                            <th scope="col">ชื่อ-นามสกุล</th>
                                                            <th scope="col">การศึกษา</th>
                                                            <th scope="col">สถานะครอบครัว</th>
                                                            <th scope="col">เครื่องมือ</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      
                                    <?php if (!empty($data)):?>
                                        <?php foreach ($data as $keys => $value) :?>
                                            <div data-repeater-item>
                                                <input type="hidden" name="family" value="<?=$keys;?>" />
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h4>ครอบครัว <span class="key_data"><?=$keys;?></span></h4>
                                                        <div class="card-header-action">                                        
                                                            <a href="#" class="btn btn-info family_key" data-id="<?=$keys;?>" onclick="addFimaly($(this))">เพิ่มข้อมูลสมาชิก</a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse show" id="mycard-collapse">
                                                        <div class="card-body">
                                                            <table class="table table-bordered" id="myTable<?=$keys;?>">
                                                                <thead >
                                                                    <tr>
                                                                    <th scope="col">ลำดับ</th>
                                                                    <th scope="col">รหัสประจำตัวประชาชน</th>
                                                                    <th scope="col">ชื่อ-นามสกุล</th>
                                                                    <th scope="col">การศึกษา</th>
                                                                    <th scope="col">สถานะครอบครัว</th>
                                                                    <th scope="col">เครื่องมือ</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($value as $key => $val) :?>
                                                                         <tr>
                                                                            <th scope="row"><?=$key+1;?></th>
                                                                            <td><?=$val['person_number'];?></td>
                                                                            <td><?=$val['name'].' '.$val['person_name'].$val['person_lastname'];?></td>
                                                                            <td><?=$val['education_name'];?></td>
                                                                            <td><?=$val['person_header'] ? 'หัวหน้าครอบครัว':'';?></td>
                                                                            <td>
                                                                                <div class="buttons">
                                                                                    <button data-id="<?=$keys;?>" onclick="editFimaly($(this),<?=$val['person_id'];?>)" class="btn btn-icon btn-primary btn-sm"><i class="far fa-edit"></i></button>                                    
                                                                                    <a href="#" class="btn btn-icon btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    <?php endforeach;?>
                                                                  
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- <input type="text" name="text-input" value="A"/> -->
                                                <!-- <input data-repeater-delete type="button" value="Delete"/> -->
                                            </div>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <div data-repeater-item>
                                            <input type="hidden" name="family" value="1" />
                                            <div class="card">
                                                <div class="card-header">
                                                    <h4>ครอบครัว <span class="key_data">1</span></h4>
                                                    <div class="card-header-action">                                        
                                                        <a href="#" class="btn btn-info family_key" data-id="1" onclick="addFimaly($(this))">เพิ่มข้อมูลสมาชิก</a>
                                                    </div>
                                                </div>
                                                <div class="collapse show" id="mycard-collapse">
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead >
                                                                <tr>
                                                                <th scope="col">ลำดับ</th>
                                                                <th scope="col">รหัสประจำตัวประชาชน</th>
                                                                <th scope="col">ชื่อ-นามสกุล</th>
                                                                <th scope="col">การศึกษา</th>
                                                                <th scope="col">สถานะครอบครัว</th>
                                                                <th scope="col">เครื่องมือ</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                              
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <input type="text" name="text-input" value="A"/> -->
                                            <!-- <input data-repeater-delete type="button" value="Delete"/> -->
                                        </div>
                                    <?php endif;?>                
                                   
                                </div>                                                                       
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="FamilyModal">
    <div class="modal-dialog modal-xl" role="document">
        <form action="<?=base_url('house/save_members/'.@$house_id);?>" method="post">
            <input type="hidden" name="family_id" id="family_id">
            <input type="hidden" name="person_id" id="person_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลสมาชิกครัวเรือน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                               
                        <div class="form-group col-md-4">
                            <label>รหัสประจำตัวประชาชน</label>                                        
                            <input type="text" class="form-control" name="person_number">
                        </div>
                        <div class="form-group col-md-2">
                            <label>ชื่อ</label>      
                            <select name="person_prename" id="person_prename" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($prename as $key => $value) :?>
                                    <option value="<?=$value['prefix_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>
                            </select>                
                        </div>
                        <div class="form-group col-md-2">
                            <label>&nbsp;</label>
                            <input type="text" class="form-control" name="person_name">                            
                        </div>
                        <div class="form-group col-md-4">
                            <label>นามสกุล</label>                                        
                            <input type="text" class="form-control" name="person_lastname">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ประเภทบัตร</label>                                        
                            <select name="person_type_number" id="person_type_number" class="form-control">
                                <option value="1">บัตรประชาชน</option>
                                <option value="2">บัตรต่างดาว</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>สถานภาพ</label>                                        
                            <select name="person_status" id="person_status" class="form-control">
                                <option value="1">โสด</option>
                                <option value="2">แต่งงาน</option>
                                <option value="3">อย่าล้าง</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>สถานะครอบครัว</label>                                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="person_header" name="person_header" value="1">
                                <label class="form-check-label" for="person_header">
                                หัวหน้าครอบครัว
                                </label>
                            </div>                           
                        </div>
                        <div class="form-group col-md-4">
                            <label>วันเดือนปี เกิด</label>                                        
                            <input type="text" class="form-control" name="person_birthdate">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ศาสนา</label>                                        
                             <select name="person_religion" id="person_religion" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($religion as $key => $value) :?>
                                    <option value="<?=$value['religion_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>สัญชาติ</label>                                        
                             <select name="person_nation" id="person_nation" class="form-control">
                                <option value="1">1</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>ชนเผ่า</label>                                        
                             <select name="person_tribe" id="person_tribe" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($tribes as $key => $value) :?>
                                    <option value="<?=$value['tribe_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>การศึกษา</label>                                        
                             <select name="person_educate" id="person_educate" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($educations as $key => $value) :?>
                                    <option value="<?=$value['education_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="d-block">อ่านออก/เขียนได้</label>    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="person_read"name="person_read" value="1">
                                <label class="form-check-label" for="person_read">อ่านออก</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="person_read"name="person_read" value="2">
                                <label class="form-check-label" for="person_read">เขียนได้</label>
                            </div>                            
                        </div>
                        <div class="form-group col-md-4">
                            <label>ช่วยเหลือตัวเอง</label>                                        
                             <select name="person_helpyourslef" id="person_helpyourslef" class="form-control">
                                <option value="1">ได้</option>
                                <option value="2">ไม่ได้</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="d-block">สถานะทางร่างกาย</label>    
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="person_disabled"name="person_disabled" value="1">
                                <label class="form-check-label" for="person_disabled">พิการ</label>
                            </div> 
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" id="person_bed"name="person_bed" value="1">
                                <label class="form-check-label" for="person_bed">ป่วยติดเตียง</label>
                            </div>                            
                        </div>
                        <div class="form-group col-md-4">
                            <label>ที่อยู่ปัจจุบัน (กรณีไม่ได้อาศัยที่บ้าน)</label>                                        
                            <input type="text" class="form-control" name="person_address">
                        </div>
                        <div class="form-group col-md-4">
                            <label>สิทธิการรักษาพยาบาล</label>                                        
                             <select name="person_medical" id="person_medical" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($publichealth as $key => $value) :?>
                                    <option value="<?=$value['publichealth_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>สถานพยาบาล</label>                                        
                             <select name="person_medical" id="person_medical" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($hospital as $key => $value) :?>
                                    <option value="<?=$value['hospital_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>           
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>ได้รับวัคซีนโควิด-19</label>                                        
                             <select name="person_vac_covid" id="person_vac_covid" class="form-control">
                                <option value="1">ได้รับ</option>
                                <option value="2">ยังไม่ได้รับ</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <label>หมายเหตุ</label>                                        
                            <input type="text" class="form-control" name="person_remark">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="sumbit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script>
    // var $repeater = '';
    $(document).ready(function () {

        var $repeater = $('.repeater').repeater({
            initEmpty: false,
            defaultValues: {
                // 'family': '1'
            },
            show: function () {
                $(this).slideDown();
                // $('#myTable tr:last').remove();
                
            },
            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        })

        $("#add-family").click(function () {
			$repeater.repeaterVal()["group"].map(function (fields, row) {
                
				$(".key_data:last").text(row);
                $(".family_key:last").attr('data-id', (row));               
                $(`input[name='group[${row}][family]']`).val((row))
                // $('[data-repeater-list]').empty();
                // $('[data-repeater-item]').slice(1).empty();
			});
		});
        
    });

    function addFimaly(elm){
        $("#family_id").val(elm.data('id'));
        $("#FamilyModal").modal();
    }

    function editFimaly(elm,id){
     
        $("#family_id").val(elm.data('id'));
        $("#person_id").val(id);
        $("#FamilyModal").modal();
    }

</script>
<?=$this->endSection()?>
  