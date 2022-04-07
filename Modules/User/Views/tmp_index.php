<?php $session = session(); ?>
<?php $this->extend('templates/main') ?>

<?=$this->section("stylesheet")?>
<link rel="stylesheet" href="<?php echo base_url('public/js/easyui/themes/metro/easyui.css')?>">
<link rel="stylesheet" href="<?php echo base_url('public/js/easyui/themes/icon.css')?>">
<style type="text/css">
  .tree-icon{
    display: none;
  }
</style>
<?php $this->endSection() ?>

<?php $this->section('content') ?>

<div class="card shadow mb-4">
    <div class="card-body">
      <div class="row">
        <div class="col-md-6">
          <h5 class="h5 mb-0 text-gray-800">จัดการหน่วยงาน / ผู้ใช้งาน</h5>
        </div>
        <div class="col-md-6" align="right">
          <button class="btn btn-orange" onclick="addOrg(0,0)">เพิ่มกระทรวง</button>
        </div>
      </div>
      <br>
      <table id="tgOrg" style="width:100%;padding-bottom: 20px"></table>
    </div>
</div>

<div class="modal fade" id="modal_org" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    <form id="form_org" method="post">
      <input type="hidden" name="org_id" id="org_id" value="">
      <input type="hidden" name="org_parent" id="org_parent" value="">
      <div class="modal-header">
        <h5 class="modal-title">จัดการหน่วยงาน</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="org_name">ชื่อหน่วยงาน</label>
          <input type="text" class="form-control" id="org_name" name="org_name" placeholder="">
        </div>   
        <div class="form-group">
          <label for="org_name_short">ชื่อย่อหน่วยงาน</label>
          <input type="text" class="form-control" id="org_name_short" name="org_name_short" placeholder="">
        </div>   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-ban"></i> ยกเลิก</button>
        <button type="button" id="budget_submit" class="btn btn-primary" onclick="update_org()"><i class="fa fa-save"></i> บันทึก</button>
        
      </div>
    </form>
    </div>

  </div>
</div>


<div class="modal fade" id="user_profile_setting" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <form id="form_user_set" method="post" action="#" enctype="multipart/form-data" >
      <div class="modal-header">
        <h5 class="modal-title">จัดการผู้ใช้งาน</h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
          <div class="form-group row">
            <div class="col-md-12" align="center">
              <img id="output_set" src="<?php echo base_url('public/uploads/user/images.png'); ?>" width="250px" height="200px"  style="margin-bottom: 10px;"/>
            </div>
            <div class="col-md-12">
              <div class="custom-file">
                <input type="file" name="user_img" class="custom-file-input" id="user_img_set" accept="image/*" onchange="loadFile(event)" >
                <label class="custom-file-label" for="user_img">เลือกไฟล์</label>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="username">ชื่อผู้ใช้งาน</label>
            <input type="text" class="form-control username" id="username_set" name="username"  placeholder="ชื่อผู้ใช้งาน">
          </div>
          <div class="form-group">
            <label for="password">รหัสผ่าน</label>
            <input type="password" class="form-control" id="password_set" name="password"  placeholder="รหัสผ่าน">
          </div>
          <div class="form-group">
            <label for="password_re">ยืนยันรหัสผ่านอีกครั้ง</label>
            <input type="password" class="form-control" id="password_re_set" name="password_re"  placeholder="ยืนยันรหัสผ่านอีกครั้ง">
          </div>
          <div class="form-group">
            <label for="first_name">ชื่อ</label>
            <input type="text" class="form-control" id="first_name_set" name="first_name" placeholder="ชื่อ">
          </div>
          <div class="form-group">
            <label for="last_name">นามสกุล</label>
            <input type="text" class="form-control" id="last_name_set" name="last_name" placeholder="นามสกุล">
          </div>
          <div class="form-group">
            <label for="email">อีเมล</label>
            <input type="text" class="form-control emails" id="email_set" name="email" placeholder="อีเมล">
          </div>
          <div class="form-group">
            <label for="phone">เบอร์โทรศัพท์</label>
            <input type="text" class="form-control phone" id="phone_set" name="phone" placeholder="เบอร์โทรศัพท์">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">ประเภทผู้ใช้งาน</label>
            <select class="form-control" name="user_type" id="user_type_set">
              <option value="1">ผู้ดูแลระบบ</option>
              <option value="2">ผู้ใช้งานทั่วไป</option>
            </select>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">สถานะ</label>
            <select class="form-control" name="status" id="status_set">
              <option value="1">ใช้งาน</option>
              <option value="0">ไม่ใช้งาน</option>
            </select>
          </div>
          <input type="hidden" name="user_id" id="user_id_set" value="">
          <input type="hidden" name="user_org_id" id="user_org_id_set" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-ban"></i> ยกเลิก</button>
        <button type="submit" id="user-submit" class="btn btn-primary" ><i class="fa fa-save"></i> บันทึก</button>
      </div>
    </form>
    </div>
  </div>
</div>

<?php $this->endSection() ?>

<?=$this->section("scripts")?>
<script type="text/javascript" src="<?php echo base_url('public/js/easyui/jquery.easyui.min.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/easyui/datagrid-filter.js')?>"></script>
<script type="text/javascript" src="<?php echo base_url('public/js/easyui/treegrid-dnd.js')?>"></script>

<!-- Page level plugins -->
<script src="<?= base_url('public/vendor/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?= base_url('public/vendor/datatables/dataTables.bootstrap4.min.js'); ?>"></script>
<!-- Page level custom scripts -->

<script type="text/javascript">
  var loadFile = function(event) {
  var reader = new FileReader();
  reader.onload = function(){
  var output = document.getElementById('output');
  output.src = reader.result;
   };
   reader.readAsDataURL(event.target.files[0]);
  };

  var $tgOrg = $('#tgOrg');

  $(document).ready(function() {
    $('#form_user_set').on('submit', function(e){  
      var user_name = $('#user_name_set').val();
      var first_name = $('#first_name_set').val();
      var last_name = $('#last_name_set').val();
      var phone = $('#phone_set').val();
      var email = $('#email_set').val();
      var status = $('#status_set').val();
      var user_type = $('#user_type_set').val();
      var user_id = $('#user_id_set').val();
      var password = $('#password_set').val();
      var password_re = $('#password_re_set').val();

    if($('#user_id_set').val()==''){
      if(password==''){
        $.toast({
          heading: 'Warning',
          text: 'กรุณากรอก รหัสผ่าน',
          icon: 'warning',
          loaderBg : '#dd690b'
        });
        $('#password_set').focus();
        return false;
      }
    }

    if(password!=''){
      if(password!=password_re){
        $.toast({
          heading: 'Warning',
          text: 'รหัสผ่านไม่ถูกต้อง กรุณากรอกใหม่อีกครั้ง',
          icon: 'warning',
          loaderBg : '#dd690b'
        });
        $('#password_re_set').focus();
        return false;
      }
    }

    if (user_name == '') {
      $.toast({
        heading: 'Warning',
        text: 'กรุณากรอก ชื่อผู้ใช้งาน',
        icon: 'warning',
        loaderBg : '#dd690b'
      });
      $('#user_name_set').focus();
      return false;
    }else if (first_name == '') {
      $.toast({
        heading: 'Warning',
        text: 'กรุณากรอก ชื่อ',
        icon: 'warning',
        loaderBg : '#dd690b'
      });
      $('#first_name_set').focus();
      return false;
    }else if (last_name == '') {
      $.toast({
        heading: 'Warning',
        text: 'กรุณากรอก นามสกุล',
        icon: 'warning',
        loaderBg : '#dd690b'
      });
      $('#last_name_set').focus();
      return false;
    }else if (phone == '') {
      $.toast({
        heading: 'Warning',
        text: 'กรุณากรอก เบอร์โทรศัพท์',
        icon: 'warning',
        loaderBg : '#dd690b'
      });
      $('#phone_set').focus();
      return false;
    }else if (email == '') {
      $.toast({
        heading: 'Warning',
        text: 'กรุณากรอก อีเมลล์',
        icon: 'warning',
        loaderBg : '#dd690b'
      });
      $('#email_set').focus();
      return false;
    }else {
      e.preventDefault();  
      $.ajax({  
         url: $('#base_url').val()+"/user/user_update",
         method:"POST",  
         data:new FormData(this),  
         contentType: false,  
         cache: false,  
         processData:false,  
         dataType: "json",
         success:function(res){  
            // $.toast({
            //    heading: 'success',
            //    text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
            //    icon: 'success',
            //    loaderBg : '#109657'
            //  });

            // $('#user_profile').modal('hide');
            // $tgOrg.treegrid('reload');
         }  
      });  

      $.toast({
         heading: 'success',
         text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
         icon: 'success',
         loaderBg : '#109657'
       });

      $('#user_profile').modal('hide');
      $tgOrg.treegrid('reload');
            
    }  
   }); 

    $('#username_set').keyup(function(event) {
       var username = $('#username_set').val();
       var user_id = $('#user_id_set').val();
       if(user_id!=''){
        $.ajax({
           url: $('#base_url').val()+'/user/check_username',
           type: 'POST',
           data: {username:username, user_id:user_id},
           success:function(data) {
           if (data == 1) {
                 $.toast({
                   heading: 'Warning',
                   text: 'ชื่อผู้ใช้งานซ้ำ กรุณากรอกใหม่',
                   icon: 'warning',
                   loaderBg : '#dd690b'
                 });
                 $('#user_name_set').focus();
                 $("#user-submit").attr("disabled", true);
           }else {
             $("#user-submit").attr("disabled", false);
           }
           }
         });
       }
       
     });

    $tgOrg.treegrid({
        url: $('#base_url').val()+'/user/getDataTree',
        rownumbers: false,
        animate: true,
        collapsible: true,
        showLines: true,
        method: 'get',
        idField: 'id',
        treeField: 'text',
        height: 'auto',
        onLoadSuccess: function(row){
            // $(this).treegrid('enableDnd', row?row.id:null);
        },
        onBeforeDrop : function(target,drag,e){

        },
        onDrop : function(target,drag,e){

            // var target_id = target.id.split('_');
            // target_id = target_id[1];

            // var drag_id = drag.id.split('_');
            // drag_id = drag_id[1];

            // var target = {'id':target_id,'level':target.is_level};
            // var drag = {'id':drag_id,'level':drag.is_level};

            // var URL = Common.base_url('project/sortActivity');
            // var data = {'target':target ,'drag':drag ,'e':e}
            // $.ajax({
            //     url: URL,
            //     type: 'post',
            //     dataType: 'json',
            //     data: data,
            //     success: function (res) {
            //         $tgActivity.treegrid('reload');
            //     }
            // });

        },
        columns: [[
            {title: 'กระทรวง / หน่วยงาน / ผู้ใช้งาน', field: 'text', width: '90%'},
            {title: 'เครื่องมือ', field: 'id',halign:'center', align: 'right', width: '10%',formatter: function (value, row) {
                
                if(row.is_level == 'org_root'){
                  var addOrgBtn = '<button onclick="addOrg('+row.data.org_id+')"  class="btn btn-primary btn-sm edit-org" ><i class="fas fa-plus"></i> </button>';
                  var button = addOrgBtn+
                        '<input type="hidden" id="data_org_name'+row.data.org_id+'" value="'+row.data.org_name+'">'+
                        '<input type="hidden" id="data_org_name_short'+row.data.org_id+'" value="'+row.data.org_name_short+'">'+
                        '<button onclick="editOrg('+row.data.org_parent+','+row.data.org_id+')" id="'+row.data.org_id+'" class="btn btn-primary btn-sm edit-org" ><i class="fas fa-edit"></i> </button>'+
                        '<button onclick="delOrg('+row.data.org_id+')" class="btn btn-primary btn-sm"><i class="fas fa-trash-alt"></i></button>';
                }else if(row.is_level == 'org'){
                  var addOrgBtn = '<button onclick="addUser('+row.data.org_id+')"  class="btn btn-primary btn-sm edit-org" ><i class="fas fa-plus"></i> </button>';
                  var button = addOrgBtn+
                        '<input type="hidden" id="data_org_name'+row.data.org_id+'" value="'+row.data.org_name+'">'+
                        '<input type="hidden" id="data_org_name_short'+row.data.org_id+'" value="'+row.data.org_name_short+'">'+
                        '<button onclick="editOrg('+row.data.org_parent+','+row.data.org_id+')" id="'+row.data.org_id+'" class="btn btn-primary btn-sm edit-org" ><i class="fas fa-edit"></i> </button>'+
                        '<button onclick="delOrg('+row.data.org_id+')" class="btn btn-primary btn-sm"><i class="fas fa-trash-alt"></i></button>';
                }else{
                  if(row.data.user_type==1){
                    var button = '<button class="btn btn-primary btn-sm disabled" ><i class="fas fa-edit"></i> </button>'+
                               '<button class="btn btn-primary btn-sm disabled"><i class="fas fa-trash-alt"></i></button>';
                  }else{
                    var button = '<button onclick="UserEditSet('+row.data.org_id+','+row.data.user_id+')" id="'+row.data.user_id+'" class="btn btn-primary btn-sm " ><i class="fas fa-edit"></i> </button>'+
                               '<button onclick="UserDel('+row.data.user_id+')" class="btn btn-primary btn-sm"><i class="fas fa-trash-alt"></i></button>';
                  }
                  
                }

               return button;

            }}
        ]]
    });

  });

  function addOrg(parent,id){
    $('#org_parent').val(parent);
    $('#modal_org').modal('show');
    $('#org_id').val('');
    $('#org_name').val('');
    $('#org_name_short').val(' ');
    
  }

  function editOrg(parent,id){
    var data_org_name = $('#data_org_name'+id).val();
    var data_org_name_short = $('#data_org_name_short'+id).val();

    $('#org_id').val(id);
    $('#org_parent').val(parent);
    $('#org_name').val(data_org_name);
    if(data_org_name_short!='null'){
      $('#org_name_short').val(data_org_name_short);
    }else{
      $('#org_name_short').val(' ');
    }
    
    $('#modal_org').modal('show');
  }

  function delOrg(id){
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
        url: $('#base_url').val()+"/user/delete_org/"+id,
        type: "GET",
        success: function (data) {
          $.toast({
             heading: 'success',
             text: 'ลบข้อมูลเรียบร้อย',
             showHideTransition: 'slide',
             icon: 'success',
             position: 'bottom-right'
           });

          $tgOrg.treegrid('reload');
        },
      });
    });
  }

  function addUser(org_id){
    $ ('#output_set').attr('src',$('#base_url').val()+'/public/uploads/user/images.png');
    $('#user_org_id_set').val(org_id);
    $('#username_set').val('');
    $('#password_set').val('');
    $('#first_name_set').val('');
    $('#last_name_set').val('');
    $('#phone_set').val('');
    $('#email_set').val('');
    $('#status_set').val('');
    $('#user_id_set').val('');
    $('#status_set').val(1);
    $('#user_profile_setting').modal('show');
  }

  function UserEditSet(org_id,user_id){
    $('#user_org_id_set').val(org_id);
    $('#user_profile_setting').modal('show');
    $.ajax({
      url: $('#base_url').val()+'/user/get_user',
      method:"POST",
      data:{user_id:user_id},
      success:function(data){
        var obj = JSON.parse(data);
         $('#username_set').val(obj.username);
         // $('#password').val(obj.password);
         $('#first_name_set').val(obj.first_name);
         $('#last_name_set').val(obj.last_name);
         $('#phone_set').val(obj.phone);
         $('#email_set').val(obj.email);
         $('#status_set').val(obj.status);
         $('#user_id_set').val(obj.user_id);
         if (obj.user_img != '') {
           $('#output_set').attr('src',$('#base_url').val()+'/public/uploads/user/'+obj.user_img);
         }
      }
    });
  }
  

  function update_org(){
    $.ajax({
      url: $('#base_url').val()+"/user/update_org",
      type: "POST",
      data:$('#form_org').serialize(),
      success: function (data) {
       
        $.toast({
           heading: 'success',
           text: 'บันทึกข้อมูลเรียบร้อยแล้ว',
           icon: 'success'
         });

        $('#modal_org').modal('hide');
        $tgOrg.treegrid('reload');

      },
    });
  }

  function UserDel(id) {
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
        url: $('#base_url').val()+"/user/delete_user/"+id,
        type: "GET",
        success: function (data) {
          // swal("ลบข้อมูลเรียบร้อย!", "", "success").then((value) => {
          //    $tgOrg.treegrid('reload');
          // });

          $.toast({
             heading: 'success',
             text: 'ลบข้อมูลเรียบร้อย',
             icon: 'success',
             loaderBg : '#109657'
           });

          $tgOrg.treegrid('reload');

        },
      });
    });
  }

  
</script>
<?=$this->endSection()?>
