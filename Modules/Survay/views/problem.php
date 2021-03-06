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
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-info" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/picture/'.@$interview_id);?>';">รูปภาพ</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลปัญหาด้านการเกษตร</h6>
                            <br>
                            <form action="<?=base_url('survay/save_problem/'.@$interview_id);?>"  method="post" id="form_problem" class="needs-validation" novalidate="">
                                <input type="hidden" name="interview_id">
                                <input type="hidden" name="land_id">  
                                <div class="row repeater">
                                    <table class="table table-bordered" id="tableProblem">
                                        <thead>
                                            <tr>
                                            <th scope="col">ลำดับ</th>
                                            <th scope="col">ประเภทปัญหา</th>
                                            <th scope="col">รายละเอียด</th>
                                            <th scope="col">
                                                <a href="#" class="btn btn-info" data-repeater-create id="add-problems">เพิ่มข้อมูล</a>
                                            </th>                                 
                                            </tr>
                                        </thead>
                                        <tbody data-repeater-list="problems">

                                        <?php if(empty($data)):?>
                                            <tr data-repeater-item data-id="" class="data_list">
                                                <th scope="row" class="text-center">
                                                <p class="key_data">1</p>
                                                    <input type="hidden" name="problem_id">
                                                </th>
                                                <td>
                                                    <select name="problem_type" id="problem_type" class="form-control" required="">
                                                        <option value="">เลือก</option>
                                                        <?php foreach ($problem as $key => $value) :?>
                                                            <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                        <?php endforeach?> 
                                                    </select>
                                                    <div class="invalid-feedback">
                                                    กรุณาเลือกประเภท
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="problem_detail" required="">
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
                                                    <tr data-repeater-item data-id="<?=$value['problem_id'];?>">
                                                        <th scope="row" class="text-center">
                                                            <p class="key_data"><?=$key+1;?></p>
                                                            <input type="hidden" name="problem_id" value="<?=$value['problem_id'];?>">
                                                        </th>
                                                        <td>
                                                            <select name="problem_type" id="problem_type" class="form-control" required="">
                                                                <option value="">เลือก</option>
                                                                <?php foreach ($problem as $key => $val) :?>
                                                                    <option <?=$value['problem_type']  == $val['Code'] ? "selected":'';?> value="<?=$val['Code'];?>"><?=$val['Name'];?></option>
                                                                <?php endforeach?> 
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                กรุณาเลือกประเภท
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <input type="text" class="form-control" name="problem_detail" value="<?=$value['problem_detail'];?>" required=""> 
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
                                    url: domain+'survay/delete_problem/'+id,
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

        $("#add-problems").click(function () {
			$repeater.repeaterVal()["problems"].map(function (fields, row) {
                $("#tableProblem tr").last().attr("data-id",'');
                $(".key_data:last").text(row + 1);
                // $('[data-repeater-list]').empty();
                // $('[data-repeater-item]').slice(1).empty();
			});
		});
        
    });
</script>

<?=$this->endSection()?>
  