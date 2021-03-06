<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><a href="<?php echo base_url('api')?>">ข้อมูลอ้างอิงแบบสอบถาม</a> > <?php echo $label?></h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-info" onclick="openForm()">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col" width="5%" style="text-align: center;">ลำดับ</th>
                                <th scope="col" width="10%" style="text-align: center;">รหัสโครงการ</th>
                                <th scope="col" style="text-align: center;"><?php echo $label?></th>
                                <?php if(@$type_select){ ?><th scope="col" style="text-align: center;"><?php echo $type_label?></th> <?php }?>
                                <th scope="col" width="15%" style="text-align: center;">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?=$i++;?></th>
                                        <th scope="row" style="text-align: center;"><?php echo $value['Code']?></th>
                                        <td><?php echo $value[$input_name]?></td>
                                        <?php if(@$type_select){ ?>
                                        <td><?php echo @$type_select[$value[$input_type_key]][$type_name]?></td>
                                        <?php }?>
                                        <td style="text-align: center;">
                                            <div class="buttons">
                                                <a href="#" onclick="openForm('<?php echo $value[$input_id]?>')" class="btn btn-icon btn-primary" ><i class="far fa-edit"></i></a>
                                                <a href="#" onclick="delData('<?php echo $table?>','<?php echo $input_id?>','<?php echo $value[$input_id]?>')" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <input type="hidden" class="input_code" id="code_<?php echo $value[$input_id]?>" value="<?php echo $value['Code']?>">
                                    <input type="hidden" id="id_<?php echo $value[$input_id]?>" value="<?php echo $value[$input_id]?>">
                                    <input type="hidden" id="name_<?php echo $value[$input_id]?>" value="<?php echo $value[$input_name]?>">
                                    <?php if(@$type_select){ ?>
                                    <input type="hidden" id="type_<?php echo $value[$input_id]?>" value="<?php echo $value[$input_type_key]?>">
                                    <?php }?>
                                <?php endforeach;?>
                               

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- The Modal -->
<div class="modal fade" id="modal_form" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-m">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h5 class="modal-title">จัดการ<?php echo $label?></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form_data">
      
      <!-- Modal body -->
      <div class="modal-body">
        <?php if(@$type_select){ ?>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="name" ><?php echo $type_label?></label>
              <select class="form-control" name="<?php echo $input_type_key?>" id="<?php echo $input_type_key?>">
                <option value="">เลือก</option>
              <?php foreach ($type_select as $key => $value) {?>
                <option value="<?php echo $value[$type_id]?>"><?php echo $value[$type_name]?></option>
              <?php  } ?>
              </select>
            </div>
          </div>
        </div>
       <?php } ?>
       <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="name" >รหัส<?php echo $label?></label>
              <input class="form-control " type="text" name="Code" id="Code">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="name" >ชื่อ<?php echo $label?></label>
              <input class="form-control " type="text" name="<?php echo $input_name?>" id="<?php echo $input_name?>">
            </div>
          </div>
        </div>
      </div>

      <!-- <input class="form-control" type="hidden" name="<?php echo $input_id?>" id="<?php echo $input_id?>" value=""> -->
      <input class="form-control" type="hidden" name="table" id="table" value="<?php echo $table?>">
      <input class="form-control" type="hidden" name="key" id="key" value="<?php echo $input_id?>">
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban"></i> ยกเลิก</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="saveData()"><i class="fa fa-save"></i> บันทึก</button>
      </div>
      </form>
    </div>
  </div>
</div>
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<!-- <script src="<?= base_url('public/js/script.js') ?>"></script> -->

<script type="text/javascript">
    function openForm(id='') {
        $('#<?php echo $input_name?>').val('');
        $('#<?php echo $input_id?>').val('');
        $('#<?php echo $input_type_key?>').val('');
        $('#Code').val('');

        if(id){
            var id = $('#id_'+id).val();
            var code = $('#code_'+id).val();
            var name = $('#name_'+id).val();
            var type = $('#type_'+id).val();

            $('#<?php echo $input_name?>').val(name);
            $('#<?php echo $input_id?>').val(id);
            $('#Code').val(code);
            $('#<?php echo $input_type_key?>').val(type);
        }

        $('#modal_form').modal('show');
    }

    function saveData(){
        if ($('#name').val() == '') {
          $.toast({
            heading: 'Warning',
            text: 'กรุณากรอก ชื่อโครงการ',
            icon: 'warning',
            loaderBg : '#dd690b'
          });
          $('#name').focus();
          return false;
        }

        if ($('#Code').val() == '') {
          $.toast({
            heading: 'Warning',
            text: 'กรุณากรอก รหัสโครงการ',
            icon: 'warning',
            loaderBg : '#dd690b'
          });
          $('#Code').focus();
          return false;
        }

        var check_code = false;
        $('.input_code').each(function(){
            var code = $(this).val();
            if(code==$('#Code').val()){
              var id = $('#<?php echo $input_id?>').val();
               if($('#Code').val()!=$('#code_'+id).val()){
                check_code = true;
               }
               
            }
        });

        if(check_code){
          $.toast({
              heading: 'Warning',
              text: 'มีรหัสโครงการนี้อยู่ในระบบแล้ว',
              icon: 'warning',
              loaderBg : '#dd690b'
            });

          $('#Code').focus();
           return false;
        }


        $.ajax({
          url: domain+"api/saveData",
          type: "POST",
          data:$('#form_data').serialize(),
          success: function (data) {
            $.toast({
               heading: 'success',
               text: 'บันทึกข้อมูลเรียบร้อย',
               icon: 'success',
               loaderBg : '#109657'
             });

             window.location.reload();

          },
        });
      }

    function delData(table,key,id) {
        swal({
          title: "ยืนยันการลบข้อมูล?",
          text: "คุณต้องการลบข้อมูลนี้หรือไม่!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "ยืนยัน ",
          cancelButtonText: "ยกเลิก ",
        }).then(function () {
          $.ajax({
            url: domain+"api/deleteData/"+table+'/'+key+'/'+id,
            type: "GET",
            success: function (data) {
              $.toast({
                 heading: 'success',
                 text: 'ลบข้อมูลเรียบร้อย',
                 icon: 'success',
                 loaderBg : '#109657'
               });

              window.location.reload();

            },
          });
        });
    }

</script>
<?=$this->endSection()?>
  