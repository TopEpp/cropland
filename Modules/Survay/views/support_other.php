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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/'.@$interview_id);?>';">ข้อมูลเบื้องต้น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-info" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/picture/'.@$interview_id);?>';">รูปภาพ</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลการส่งเสริมและสนับสนุนของ หน่วยงานอื่น</h6>
                            <form action="<?=base_url('survay/save_support_other/'.@$interview_id);?>"  method="post" id="form_support" class="needs-validation" novalidate="">
                                <input type="hidden" name="interview_id">
                                <input type="hidden" name="land_id">                             
                                <div class="row repeater">
                                    <table class="table table-bordered" id="tableSupportOther">
                                        <thead>
                                            <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ประเภท</th>
                                            <th scope="col">รายละเอียด</th>
                                            <th scope="col">
                                                <a href="#" class="btn btn-info" data-repeater-create id="add-support">เพิ่มข้อมูล</a>
                                            </th>                                 
                                            </tr>
                                        </thead>
                                        <tbody data-repeater-list="supports">

                                            <!-- <tr data-repeater-item style="display:none">
                                                <th scope="row">
                                                    1
                                                    <input type="hidden" name="support_id">
                                                </th>
                                                <td>
                                                    <select name="org_id" id="org_id" class="form-control" required="">
                                                        <option value="">เลือก</option>
                                                        <?php foreach ($org as $key => $val) :?>
                                                            <option  value="<?=$val['Code'];?>"><?=$val['Name'];?></option>
                                                        <?php endforeach?> 
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    กรุณาเลือกหน่วยงาน
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="support_detail" required="">
                                                    <div class="invalid-feedback">
                                                    กรุณาระบุรายละเอียด
                                                    </div> 
                                                </td>
                                                <td class="text-center">
                                                    <div class="buttons">                                            
                                                        <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                                    </div>
                                                </td>                                      
                                            </tr> -->
                                        <?php if(empty($data)):?>
                                            <tr data-repeater-item data-id="">
                                                <th scope="row">
                                                    1
                                                    <input type="hidden" name="support_id">
                                                </th>
                                                <td>
                                                    <select name="org_id" id="org_id" class="form-control" required="">
                                                        <option value="">เลือก</option>
                                                        <?php foreach ($org as $key => $val) :?>
                                                            <option  value="<?=$val['Code'];?>"><?=$val['Name'];?></option>
                                                        <?php endforeach?> 
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    กรุณาเลือกหน่วยงาน
                                                    </div> 
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="support_detail" required="">
                                                    <div class="invalid-feedback">
                                                    กรุณาระบุรายละเอียด
                                                    </div> 
                                                </td>
                                                <td class="text-center">
                                                    <div class="buttons">                                            
                                                        <button type="button" data-repeater-delete class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                                    </div>
                                                </td>                                      
                                            </tr>
                                            <?php else:?>
                                                <?php foreach ($data as $key => $value) :?>
                                                    <tr data-repeater-item data-id="<?=$value['support_id'];?>">
                                                        <th scope="row">
                                                            1
                                                            <input type="hidden" name="support_id" value="<?=$value['support_id'];?>">
                                                        </th>
                                                        <td>
                                                            <select name="org_id" id="org_id" class="form-control" required="">
                                                                <option value="">เลือก</option>
                                                                <?php foreach ($org as $key => $val) :?>
                                                                    <option  <?=$value['org_id'] == $val['Code'] ?'selected':'';?> value="<?=$val['Code'];?>"><?=$val['Name'];?></option>
                                                                <?php endforeach?> 
                                                            </select>
                                                            <div class="invalid-feedback">
                                                            กรุณาเลือกหน่วยงาน
                                                            </div> 
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="support_detail" value="<?=$value['support_detail'];?>" required=""> 
                                                            <div class="invalid-feedback">
                                                            กรุณาระบุรายละเอียด
                                                            </div> 
                                                        </td>
                                                        <td  class="text-center">
                                                            <div class="buttons">                                            
                                                                <button type="button" data-repeater-delete class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                                            </div>
                                                        </td>                                      
                                                    </tr>
                                                <?php endforeach;?>
                                            <?php endif;?>
                                            

                                        </tbody>
                                    </table>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
                var id = $(this).attr("data-id");
                
                if (id !== ''){
                    swal({
                        title: 'Are you sure?',
                        text: 'ยืนยันลบข้อมูลนี้!',
                        icon: 'warning',
                        buttons: true,
                        dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    type: "POST",
                                    async: false,
                                    url: domain+'survay/delete_other/'+id,
                                    success : function(res){
                                        $(this).slideUp(deleteElement);
                                    }
                                });
                            } 
                    }); 
                }else{
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        })

        $("#add-support").click(function () {
			$repeater.repeaterVal()["supports"].map(function (fields, row) {
                $("#tableSupportOther tr").last().attr("data-id",'');
				// $(".key_data:last").text(row);
                // $(".family_key:last").attr('data-id', (row));               
                // $(`input[name='group[${row}][family]']`).val((row))
                // $('[data-repeater-list]').empty();
                // $('[data-repeater-item]').slice(1).empty();
			});
		});
        
    });
</script>
<?=$this->endSection()?>
  