<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ประเภทแรงงาน</h4>
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
                                <th scope="col" style="text-align: center;">ประเภท</th>
                                <th scope="col" width="15%" style="text-align: center;">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?=$key+1;?></th>
                                        <td><?php echo $value['name']?></td>
                                        <td style="text-align: center;">
                                            <div class="buttons">
                                                <a href="#" onclick="openForm(<?php echo $value['agriwork_id']?>)" class="btn btn-icon btn-primary" ><i class="far fa-edit"></i></a>
                                                <a href="#" onclick="delData(<?php echo $value['agriwork_id']?>)" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                    <input type="hidden" id="id_<?php echo $value['agriwork_id']?>" value="<?php echo $value['agriwork_id']?>">
                                    <input type="hidden" id="name_<?php echo $value['agriwork_id']?>" value="<?php echo $value['name']?>">
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
        <h5 class="modal-title">จัดการประเภทแรงงาน</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form_data">
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label for="name" >ชื่อประเภทแรงงาน</label>
              <input class="form-control act_data" type="text" name="name" id="name">
            </div>
          </div>
        
      </div>

      <input class="form-control" type="hidden" name="agriwork_id" id="agriwork_id" value="">
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
        $('#name').val('');
        $('#id').val('');

        if(id){
            var id = $('#id_'+id).val();
            var name = $('#name_'+id).val();

            $('#name').val(name);
            $('#id').val(id);
        }

        $('#modal_form').modal('show');
    }

    function saveData(){
        if ($('#name').val() == '') {
          $.toast({
            heading: 'Warning',
            text: 'กรุณากรอก ชื่อประเภทแรงงาน',
            icon: 'warning',
            loaderBg : '#dd690b'
          });
          $('#name').focus();
          return false;
        }


        $.ajax({
          url: domain+"api/saveArgiwork",
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

    function delData(id) {
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
            url: domain+"api/deleteArgiwork/"+id,
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
  