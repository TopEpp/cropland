<?php 
    $cal_type = ['1'=>'รายได้ไม่ประจำ','2'=>'รายได้ประจำ'];
    $cal_address = ['1'=>'ในหมู่บ้าน','2'=>'นอกหมู่บ้าน'];
?>


<!-- <div class="modal-header">
    <h5 class="modal-title">ข้อมูลด้านอาชีพ</h5>
    <button type="button" class="btn btn-info" data-repeater-create id="job-add">เพิ่มอาชีพ</button>
</div> -->
<div class="modal-body">
     
    <div class="alert alert-success alert-dismissible fade">
        <div class="alert-body">
            <button class="close" data-dismiss="alert">
            <span>×</span>
            </button>
            <p id="message_success"></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <p>ชื่อ-นามสกุล : <?=$data[0]['person_name'].' '.$data[0]['person_lastname'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <h6>ข้อมูลด้านอาชีพ</h6>
            <table class="table table-bordered">
                <thead class="bg-info">
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">อาชีพ</th>                        
                        <th scope="col">รูปแบบรายได้</th>
                        <th scope="col">รายได้</th>
                        <th scope="col">สถานประกอบการ</th>
                        <th scope="col">หมายเหตุ</th>
                        <th scope="col">แก้ไขข้อมูล</th>
                        <th scope="col">ลบข้อมูล</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $cout = 1;?>
                    <?php foreach ($data as $key => $value) :?>
                        <?php if (!empty($value['jobs_id'])):?>
                            <tr>
                                <td class="text-center"><?=$cout;?></td>
                                <td><?=$value['name'];?></td>                                
                                <td><?=@$cal_type[$value['job_cal_type']];?></td>
                                <td class="text-right"><?=$value['job_salary'];?></td>
                                <td><?=$cal_address[$value['job_address']];?></td>
                                <td><?=$value['job_remark'];?></td>
                                <td class="text-center">
                                    <button type="button" onclick="editItem(<?=$value['job_id'];?>)" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                </td>
                                <td class="text-center">
                                    <button type="button" onclick="deleteItem(<?=$value['job_id'];?>)" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                </td>
                            </tr> 
                            <?php $cout =$cout+ 1;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row" style="display:none" id="form_edit">
        <div class="col-md-12" data-repeater-list="jobs">
                <div class="card" data-repeater-item>
                <div class="card-header bg-secondary">
                    <h4 class="text-dark">อาชีพ</h4>
                </div>
                <div class="card-body">
                <input type="hidden" name="job_id" id="job_id">
                    <div class="row">                               
                        <div class="form-group col-md-4">
                            <label>อาชีพ</label>                                        
                            <select name="job_type" id="job_type" class="form-control select2" onchange="selectJobs($(this))">
                                <option value="">เลือก</option>
                                <?php foreach ($jobs as $key => $value) :?>
                                    <option value="<?=$value['jobs_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>อาชีพหลัก</label>                                        
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="job_main1" name="job_main" value="1">
                                <label class="form-check-label" for="job_main">
                                ใช่
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="job_main2" name="job_main" value="2">
                                <label class="form-check-label" for="job_main">
                                ไม่ใช่
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>รูปแบบรายได้</label>                                        
                            <div id="text_cal_type"></div>
                            <select name="job_cal_type" id="job_cal_type" class="form-control">
                                <option value="1">รายได้ไม่ประจำ</option>
                                <option value="2">รายได้ประจำ</option>
                            </select>
                            
                        </div>

                        <div class="form-group col-md-4" >
                            <label >จำนวนเงิน</label>                                        
                            <input type="text" class="form-control" name="job_salary" id="job_salary" oninput="validateDecimal(this)">
                        </div>
                        <div class="form-group col-md-4" >
                            <label >จำนวนครั้ง/เดือน</label>                                        
                            <input type="text" class="form-control" name="job_salary_month" id="job_salary_month" oninput="validateDecimal(this)">
                        </div>
                        <div class="form-group col-md-4" >
                            <label >จำนวนครั้ง/ปี</label>                                        
                            <input type="text" class="form-control" name="job_salary_year" id="job_salary_year" oninput="validateDecimal(this)">
                        </div>

                        <div class="form-group col-md-4">
                            <label>สถานที่ประกอบการ</label>                                        
                            <!-- <input type="text" class="form-control" name="job_address" id="job_address"> -->
                            <select name="job_address" id="job_address" class="form-control">
                                <option value="1">ในหมู่บ้าน</option>
                                <option value="2">นอกหมู่บ้าน</option>
                            </select>
                        </div>                        
                        <div class="form-group col-md-12">
                            <label>หมายเหตุ</label>                                        
                            <input type="text" class="form-control" name="job_remark" id="job_remark">
                        </div>
                    </div>
                    
                    <div class="inner-repeater" style="display:none">
                        <div id="item_detail_modal" />
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="button" onclick="saveJobs('edit')" class="btn btn-primary" disabled id="data_save">บันทึก</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
</div>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
<script>
 
    var validateDecimal = function(e) {
        var t = e.value;
        t = t.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
    }

    function selectProduct(elm){        
        var $option = elm.find('option:selected');
        var value = $option.val();
         $.ajax({
            type: "GET",
            url: domain+'common/get-product_type?group='+value,
            success : function(options){
                elm.parent().parent().find('#type_id').html(options)
            }
        });
    }

    // $(document).ready(function () {
      
    //     // $(".select2-group").select2();
    //     var $repeater = $('.outer-repeater').repeater({
    //             initEmpty: false,
    //             isFirstItemUndeletable: false,
    //             // defaultValues: { 'text-input': 'outer-default' },
    //             show: function () {
    //                 $(this).slideDown(function(){
    //                     $(this).find('.select2').select2({
    //                         placeholder: ''
    //                     });
    //                 });
    //             },
    //             hide: function (deleteElement) {
    //                 console.log('outer delete');
    //                 $(this).slideUp(deleteElement);
    //             },
    //             ready: function (setIndexes) {
    //                 setTimeout(() => {
    //                     $('.select2').select2({
    //                         placeholder: ''
    //                     });
    //                 }, 1000);
    //             },
    //             repeaters: [{
    //                 isFirstItemUndeletable: false,
    //                 selector: '.inner-repeater',
    //                 // defaultValues: { 'inner-text-input': 'inner-default' },
    //                 show: function () {

    //                     $(this).slideDown(function(){
    //                         $(this).find('.select2').select2({
    //                             placeholder: ''
    //                         });
    //                     });
    //                     // if ($('.select2-group').data('select2')) {
    //                     //     $('.select2-group').select2("destroy"); 
    //                     // }

    //                     // $('.select2-group').select2();
    //                     // $(this).children().find('.select2-group').select2('val', '');
                        
    //                     // $('.select2').remove();
    //                     // $('select.select2').removeAttr('data-select2-id');
    //                     // $('select.select2').select2();
    //                 //     const origin = $(this).children().find('select.select2-group');
    //                 //    // origin.select2('destroy');
    //                 //     const cloned = origin.clone(true);
    //                 //     cloned.removeAttr('data-select2-id').removeAttr('id');
    //                 //     cloned.find('option').removeAttr('data-select2-id');
    //                 //     origin.select2();
    //                 //     cloned.select2().val(null).trigger('change');
    //                     // $(this).children().find("select.select2-hidden-accessible").select2('destroy');
    //                     // console.log($(this).children().find('select.select2-group'));
    //                     // $(this).children().find('select.select2').remove()
    //                     // $(this).children().find('select.select2-group').select2()
    //                     // $("select[name='jobs[0][job-detail][1][type_group]']").select2();
    //                     // $(this).find('select#type_id').select2()
                        
                     
    //                 },
    //                 hide: function (deleteElement) {
    //                     console.log('inner delete');
    //                     $(this).slideUp(deleteElement);
    //                 },  
    //                 ready: function (setIndexes) {      
    //                     setTimeout(() => {
    //                         $('.select2').select2({
    //                             placeholder: ''
    //                         });
    //                     }, 1000);
    //                 },                 
    //             }]
    //         });

    //     // var $repeater1 = $('.repeater1').repeater({
    //     //     initEmpty: false,
    //     //     defaultValues: {
    //     //         // 'family': '1'
    //     //     },
    //     //     // repeaters: [{
    //     //     //     selector: '.inner-list',
    //     //     //     // repeaters: [{ 
    //     //     //     //     selector: '.deep-inner-repeater' 
    //     //     //     // }]
    //     //     // }],
            
    //     //     show: function () {
    //     //         $(this).slideDown();
    //     //         // $('#myTable tr:last').remove();
                
    //     //     },

    //     //     hide: function (deleteElement) {
    //     //         if(confirm('Are you sure you want to delete this element?')) {
    //     //             $(this).slideUp(deleteElement);
    //     //         }
    //     //     },
    //     //     ready: function (setIndexes) {
                
    //     //         // console.log(setIndexes);
    //     //         // $dragAndDrop.on('drop', setIndexes);
    //     //     },
    //     //     isFirstItemUndeletable: false
    //     // })

    //     $("#job-add").click(function () {
    //         $repeater.repeaterVal()["jobs"].map(function (fields, row) {
    //             // $('.select2-job').each(function(i, obj) {
              
    //             //     $( obj ).data('select2').destroy();
    //             // });
                
    //             // $(".key_data:last").text(row);
    //             // $(".family_key:last").attr('data-id', (row));               
    //             // $(`input[name='group[${row}][family]']`).val((row))
    //             // $('[data-repeater-list]').empty();
    //             // $('[data-repeater-item]').slice(1).empty();
    //         });
    //     });

    // });

    function selectJobs(elm){
        var id = elm.val();

        if (id == 1 || id == 2 || id == 3){
            // $("#job_cal_type").val(1)
            // $("#text_cal_type").html('<p>ประเภท : ในภาคการเกษตร</p>')
            // $("#remark_show").hide();
            // $(".show_salary_month").show();
            // $(".show_salary").show();
            $(".inner-repeater").show();
        }else if (id == 6){
            // $("#job_cal_type").val(2)
            // $("#text_cal_type").html('<p>ประเภท : นอกภาคการเกษตร</p>')
            // $("#remark_show").show();
            // $(".show_salary_month").show();
            // $(".show_salary").show();
            // $("#label_salary").text('รายได้ต่อครั้ง');
            // $("#label_salary_month").text('จำนวนครั้งต่อเดือน');
            $(".inner-repeater").hide();
        }else{
            // $("#job_cal_type").val(2)
            // $(".show_salary_month").show();
            // $(".show_salary").hide();        
            // $("#label_salary_month").text('รายได้ต่อเดือน');
            // $("#text_cal_type").html('<p>ประเภท : นอกภาคการเกษตร</p>')
            $("#remark_show").hide();
        }
    }

    function editItem(elm){
        $.ajax({
            type: "GET",
            url: domain+'house/load-jobdetail/'+elm,
            success : function(res){
                                
                if (res.data){
                    var data = res.data;
                    
                    $("#job_id").val(data.job_id)
                    $("#job_type").val(data.job_type).trigger('change');
                    $("#job_cal_type").val(data.job_cal_type)
                    if (data.job_main == 1){
                        $('#job_main1').prop('checked', true);   
                        $('#job_main2').prop('checked', false);                         
                    }else{
                        $('#job_main2').prop('checked', true);   
                        $('#job_main1').prop('checked', false);     
                    }
                    $("#job_salary").val(data.job_salary)
                    $("#job_salary_month").val(data.job_salary_month)
                    $("#job_salary_year").val(data.job_salary_year)
                    $("#job_address").val(data.job_address)
                    // $("#job_descript").val(data.job_descript)
                    $("#job_remark").val(data.job_remark)

                    $("#item_detail_modal").html(res.html)

                    $("#form_edit").show();                    
                    $('#data_save').prop('disabled', false);
                    
                }else{
                    $("#form_edit").hide();
                    $('#data_save').prop('disabled', true);
                }
                // window.location.reload();
            }
        });
        
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
                    url: domain+'house/delete_jobs/'+elm,
                    success : function(response){

                        $('.alert-success').removeClass('show').addClass( 'show' );
                        $("#message_success").text('ลบข้อมูลเรียบร้อย')
                        //refresh job
                        loadJobs($('#person_id').val())
                    }
                });
            } 
        });
        
    }
</script>