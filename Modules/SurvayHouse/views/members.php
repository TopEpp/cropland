<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card repeater">
                    <div class="card-header">
                        <h4 class="text-dark"><a href="<?php echo base_url('survay_house')?>">ข้อมูลแบบสอบถามครัวเรือน</a> > จัดการข้อมูลครัวเรือน</h4>
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
                        <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay_house/manage/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/members/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/income/'.@$house_id);?>';">ข้อมูลรายได้</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('survay_house/outcome/'.@$house_id);?>';">ข้อมูลรายจ่าย</button>
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
                                                    <a href="#" class="btn btn-info family_key" data-id="1" onclick="addFimaly('<?=$house_id;?>',$(this))">เพิ่มข้อมูลสมาชิก</a>
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
                                                            <a href="#" class="btn btn-info family_key" data-id="<?=$keys;?>" onclick="addFimaly('<?=$house_id;?>',$(this))">เพิ่มข้อมูลสมาชิก</a>
                                                        </div>
                                                    </div>
                                                    <div class="collapse show" id="mycard-collapse">
                                                        <div class="card-body">
                                                            <table class="table table-bordered" id="myTable<?=$keys;?>">
                                                                <thead class="bg-info">
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
                                                                    <?php $cout = 1;?>
                                                                    <?php foreach ($value as $key => $val) :?>                                                                       
                                                                         <tr>
                                                                            <th class="text-center" scope="row"><?=$cout;?></th>
                                                                            <td><?=$val['person_number'];?></td>
                                                                            <td><?=$val['name'].''.$val['person_name'].' '.$val['person_lastname'];?></td>
                                                                            <td><?=$val['education_name'];?></td>
                                                                            <td><?=$val['person_header'] ? 'หัวหน้าครอบครัว':'';?></td>
                                                                            <td>
                                                                                <div class="buttons">
                                                                                    <button data-id="<?=$keys;?>" onclick="editFimaly('<?=$house_id;?>',$(this),<?=$val['person_id'];?>)" class="btn btn-icon btn-primary btn-sm"><i class="far fa-edit"></i></button>                                    
                                                                                    <button onclick="deleteItem(<?=$val['person_id'];?>)" class="btn btn-icon btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                        <?php $cout = $cout+1;?>
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
                                                        <a href="#" class="btn btn-info family_key" data-id="1" onclick="addFimaly('<?=$house_id;?>',$(this))">เพิ่มข้อมูลสมาชิก</a>
                                                    </div>
                                                </div>
                                                <div class="collapse show" id="mycard-collapse">
                                                    <div class="card-body">
                                                        <table class="table table-bordered">
                                                            <thead  class="bg-info">
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
                                <div class="row">
                                    <div class="col-md-12 text-right">                                                                             
                                        <button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('survay_house/jobs/'.@$house_id);?>';" >ถัดไป</button>
                                    </div>
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
        <form action="<?=base_url('survay_house/save_members/'.@$house_id);?>" method="post" class="needs-validation" novalidate="">
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
                    <div id="item_modal" />                   
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

<?=$this->section("css")?>
<?= link_tag('public/assets/datepicker/css/datepicker.css') ?>
<?=$this->endSection()?>


<?=$this->section("scripts")?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker.js') ?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker-thai.js') ?>
<?= script_tag('public/assets/datepicker/js/locales/bootstrap-datepicker.th.js') ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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

    function addFimaly(house_id,elm){
        $("#family_id").val(elm.data('id'));
        $("#person_id").val('');

        $.ajax({
            type: "GET",
            url: domain+'house/load-members/'+house_id,
            success : function(response){
                $("#item_modal").html(response)
            }
        });

        $("#FamilyModal").modal();
    }

    function editFimaly(house_id,elm,id){
     
        $("#family_id").val(elm.data('id'));
        $("#person_id").val(id);

        $.ajax({
            type: "GET",
            url: domain+'house/load-members/'+house_id+'/'+id,
            success : function(response){
                $("#item_modal").html(response)
            }
        });

        $("#FamilyModal").modal();
    }

    function deleteItem(elm){
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
                    url: domain+'house/delete_member/'+elm,
                    success : function(res){
                        window.location.reload();
                    }
                });
            } 
        });
        
    }

</script>
<?=$this->endSection()?>
  