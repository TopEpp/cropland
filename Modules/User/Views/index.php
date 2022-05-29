<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลผู้ใช้งาน</h4>
                    </div>
                    <div class="card-body">
                        <h5>ค้นหาข้อมูล</h5>
                        <div>
                            <form action="" id="form-search">
                                <div class="row">                                
                                    <div class="form-group col-md-3">
                                        <label>ชื่อ - นามสกุล</label>
                                        
                                        <input type="text" class="form-control" name="name" id="name" value="">
                                    </div>
                                   
                                    <div class="col-md-9 text-right" style="padding-top: 25px;">
                                        <button type="submit" class="btn btn-info">ค้นหา</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.replace('<?=site_url('survay');?>');">ล้างค่า</button>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                      </div>
                        <br>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead  class="bg-info">
                                <tr>
                                <th scope="col" style="text-align: center;">ลำดับ</th>
                                <th scope="col" style="text-align: center;">ชื่อ-นามสกุล</th>
                                <th scope="col" style="text-align: center;">ตำแหน่ง</th>
                                <th scope="col" style="text-align: center;">เบอร์โทรศัพท์</th>                            
                                <th scope="col" style="text-align: center;">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $value) :?>
                                    <tr>
                                        <th scope="row"  style="text-align: center;"><?=$key+1;?></th>
                                        <td><?=$value['fullname'];?></td>
                                        <td><?=$value['department'];?></td>
                                        <td><?=$value['mbl_phn'];?></td>                                        
                                        <td class="text-center">
                                            <div class="buttons">
                                                <a href="#" onclick="openForm(<?php echo $value['emp_id']?>,'<?php echo $value['fullname']?>')" class="btn btn-icon btn-primary"><i class="far fa-cog"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                               

                            </tbody>
                        </table>

                         <!-- Pagination -->
                        <div class="d-flex justify-content-end">
                            <?php if ($pager) :?>
                            <?php $pagi_path='member'; ?>
                            <?php $pager->setPath($pagi_path); ?>               
                            <?= $pager->links('page','default_pagination'); ?>
                            <?php endif ?>
                        </div>
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
        <h5 class="modal-title">จัดการสิทธิ์ <span id="name_label"></span></h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <form id="form_data">
      
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
             <label><input type="checkbox" name="permission[]" id="permission1" value="1" class="check_perm"> จัดการข้อมูลครัวเรือน</label><br>
             <label><input type="checkbox" name="permission[]" id="permission2" value="2" class="check_perm"> จัดการข้อมูลแบบสอบถามครัวเรือน</label><br>
             <label><input type="checkbox" name="permission[]" id="permission3" value="3" class="check_perm"> จัดการข้อมูลที่ดินรายแปลง</label><br>
             <label><input type="checkbox" name="permission[]" id="permission4" value="4" class="check_perm"> จัดการข้อมูลแบบสอยถามที่ดินรายแปลง</label><br>
             <label><input type="checkbox" name="permission[]" id="permission5" value="5" class="check_perm"> จัดการข้อมูลอ้างอิง</label><br>
             <label><input type="checkbox" name="permission[]" id="permission6" value="6" class="check_perm"> จัดการข้อมูลสิทธิ์ผู้ใช้งาน</label><br>
             <label><input type="checkbox" name="permission[]" id="permission7" value="7" class="check_perm"> รายงาน</label><br>

            </div>
          </div>
        </div>
      </div>

      <input class="form-control" type="hidden" name="emp_id" id="emp_id" value="">
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
    function openForm(id='',fullname='') {
        $('#emp_id').val('');
        document.getElementById("permission1").checked = false;
        document.getElementById("permission2").checked = false;
        document.getElementById("permission3").checked = false;
        document.getElementById("permission4").checked = false;
        document.getElementById("permission5").checked = false;
        document.getElementById("permission6").checked = false;
        document.getElementById("permission7").checked = false;


        if(id){
            $('#emp_id').val(id);
            $('#name_label').html(fullname);
        }

        $.ajax({
          url: domain+"member/getPermission?emp_id="+id,
          type: "GET",
          data:'',
          success: function (data) {
            $( data ).each(function(i,v) {
              document.getElementById("permission"+v.permission_id).checked = true;
            });
            $('#modal_form').modal('show');
          },
        });


        
    }

    function saveData(){
        
        $.ajax({
          url: domain+"member/saveDataPermission",
          type: "POST",
          data:$('#form_data').serialize(),
          success: function (data) {
            $.toast({
               heading: 'success',
               text: 'บันทึกข้อมูลเรียบร้อย',
               icon: 'success',
               loaderBg : '#109657'
             });

             // window.location.reload();

          },
        });
      }


</script>
<?=$this->endSection()?>
  