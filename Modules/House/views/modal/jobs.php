<?php 
    $cal_type = ['1'=>'ในภาคการเกษตร','2'=>'นอกภาคการเกษตร'];
?>

<div class="modal-header">
    <h5 class="modal-title">ข้อมูลด้านอาชีพ</h5>
    <button type="button" class="btn btn-info" data-repeater-create value="Add Inner" onclick="">เพิ่มอาชีพ</button>
</div>
<div class="modal-body">
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
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">รายได้</th>
                        <th scope="col">สถานประกอบการ</th>
                        <th scope="col">หมายเหตุ</th>
                        <th scope="col">เครื่องมือ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $key => $value) :?>
                        <?php if (!empty($value['jobs_id'])):?>
                            <tr>
                                <td class="text-center"><?=$key+1;?></td>
                                <td><?=$value['name'];?></td>
                                <td><?=$value['job_descript'];?></td>
                                <td><?=@$cal_type[$value['job_cal_type']];?></td>
                                <td class="text-right"><?=$value['job_salary'];?></td>
                                <td><?=$value['job_address'];?></td>
                                <td><?=$value['job_remark'];?></td>
                                <td>
                                        <div class="buttons">                                    
                                            <button type="button" onclick="editItem(<?=$value['job_id'];?>)" class="btn btn-icon btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                            <button type="button" onclick="deleteItem(<?=$value['job_id'];?>)" class="btn btn-icon btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </div>
                                </td>
                            </tr> 
                        <?php endif;?>
                    <?php endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="row">
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
                            <select name="job_type" id="job_type" class="form-control" onchange="selectJobs($(this))">
                                <option value="">เลือก</option>
                                <?php foreach ($jobs as $key => $value) :?>
                                    <option value="<?=$value['jobs_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>&nbsp;</label>                                        
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="job_main" name="job_main" value="1">
                                <label class="form-check-label" for="job_main">
                                อาชีพหลัก
                                </label>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label>&nbsp;</label>                                        
                            <div id="text_cal_type"></div>
                            <!-- <p>ประเภท : ในภาคการเกษตร</p> -->
                            <input type="hidden" name="job_cal_type" id="job_cal_type">
                        </div>

                        <div class="form-group col-md-4 show_salary"  style="display:block">
                            <label id="label_salary">รายได้ต่อรอบ</label>                                        
                            <input type="text" class="form-control" name="job_salary" id="job_salary">
                        </div>
                        <div class="form-group col-md-4 show_salary_month"  style="display:block">
                            <label id="label_salary_month">จำนวนรอบต่อปี</label>                                        
                            <input type="text" class="form-control" name="job_salary_month" id="job_salary_month">
                        </div>

                        <div class="form-group col-md-4">
                            <label>สถานที่ประกอบการ</label>                                        
                            <input type="text" class="form-control" name="job_address" id="job_address">
                        </div>
                        <div class="form-group col-md-12 " id="remark_show" style="display:none">
                            <label>รายละเอียด</label>                                        
                            <input type="text" class="form-control" name="job_remark" id="job_remark">
                        </div>
                        <div class="form-group col-md-12">
                            <label>หมายเหตุ</label>                                        
                            <input type="text" class="form-control" name="job_descript" id="job_descript">
                        </div>
                    </div>
                    
                    <div class="row inner-repeater" style="display:none">
                        <div class="col-md-6">
                            รายละเอียด
                        </div>
                        <div class="col-md-6 text-right">
                            <button type="button" class="btn btn-info" data-repeater-create >เพิ่มรายละเอียด</button>
                        </div>
                        <div class="col-md-12 ">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชนิด</th>
                                    <th scope="col">จำนวน</th>
                                    <th scope="col">หน่วย</th>
                                    <th scope="col">ต้นทุน/ปี</th>
                                    <th scope="col">รายได้/ปี</th>
                                    <th scope="col">หมายเหตุ</th>
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="job-detail">
                                    <tr data-repeater-item>
                                        <th>1</th>
                                        <td>                                             
                                            <select name="type_id" id="type_id" class="form-control">
                                                <option value="">เลือก</option>
                                                <?php foreach ($products as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </td>
                                        <td> <input type="text" class="form-control" name="detail_value"></td>
                                        <td>                                             
                                            <select name="detail_unit" id="detail_unit" class="form-control">
                                                <option value="">เลือก</option>
                                                <option value="ไร่">ไร่</option>
                                                <option value="โรงเรือน">โรงเรือน</option>
                                            </select>
                                        </td>
                                        <td> <input type="text" class="form-control" name="detail_cost"></td>
                                        <td> <input type="text" class="form-control" name="detail_income"></td>
                                        <td> <input type="text" class="form-control" name="detail_remark"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    
</div>
<div class="modal-footer bg-whitesmoke br">
    <button type="sumbit" class="btn btn-primary">บันทึก</button>
    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>


    $(document).ready(function () {

        var $repeater = $('.outer-repeater').repeater({
                initEmpty: false,
                isFirstItemUndeletable: false,
                // defaultValues: { 'text-input': 'outer-default' },
                show: function () {
                    console.log('outer show');
                    $(this).slideDown();
                },
                hide: function (deleteElement) {
                    console.log('outer delete');
                    $(this).slideUp(deleteElement);
                },
                repeaters: [{
                    isFirstItemUndeletable: false,
                    selector: '.inner-repeater',
                    // defaultValues: { 'inner-text-input': 'inner-default' },
                    show: function () {
                        console.log('inner show');
                        $(this).slideDown();
                    },
                    hide: function (deleteElement) {
                        console.log('inner delete');
                        $(this).slideUp(deleteElement);
                    }
                }]
            });

        // var $repeater1 = $('.repeater1').repeater({
        //     initEmpty: false,
        //     defaultValues: {
        //         // 'family': '1'
        //     },
        //     // repeaters: [{
        //     //     selector: '.inner-list',
        //     //     // repeaters: [{ 
        //     //     //     selector: '.deep-inner-repeater' 
        //     //     // }]
        //     // }],
            
        //     show: function () {
        //         $(this).slideDown();
        //         // $('#myTable tr:last').remove();
                
        //     },

        //     hide: function (deleteElement) {
        //         if(confirm('Are you sure you want to delete this element?')) {
        //             $(this).slideUp(deleteElement);
        //         }
        //     },
        //     ready: function (setIndexes) {
                
        //         // console.log(setIndexes);
        //         // $dragAndDrop.on('drop', setIndexes);
        //     },
        //     isFirstItemUndeletable: false
        // })

            // $("#add-family").click(function () {
            //     $repeater.repeaterVal()["group"].map(function (fields, row) {
                    
            //         $(".key_data:last").text(row);
            //         $(".family_key:last").attr('data-id', (row));               
            //         $(`input[name='group[${row}][family]']`).val((row))
            //         // $('[data-repeater-list]').empty();
            //         // $('[data-repeater-item]').slice(1).empty();
            //     });
            // });

    });

    function selectJobs(elm){
        var id = elm.val();

        if (id == 1 || id == 2 || id == 3){
            $("#job_cal_type").val(1)
            $("#text_cal_type").html('<p>ประเภท : ในภาคการเกษตร</p>')
            $("#remark_show").hide();
            $(".show_salary_month").show();
            $(".show_salary").show();
            $(".inner-repeater").show();
        }else if (id == 6){
            $("#job_cal_type").val(2)
            $("#text_cal_type").html('<p>ประเภท : นอกภาคการเกษตร</p>')
            $("#remark_show").show();
            $(".show_salary_month").show();
            $(".show_salary").show();
            $("#label_salary").text('รายได้ต่อครั้ง');
            $("#label_salary_month").text('จำนวนครั้งต่อเดือน');
            $(".inner-repeater").hide();
        }else{
            $("#job_cal_type").val(2)
            $(".show_salary_month").show();
            $(".show_salary").hide();        
            $("#label_salary_month").text('รายได้ต่อเดือน');
            $("#text_cal_type").html('<p>ประเภท : นอกภาคการเกษตร</p>')
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
                    $("#job_type").val(data.job_type)
                    $("#job_cal_type").val(data.job_cal_type)
                    if (data.job_main == 1){
                        $('#job_main').prop('checked', true);                        
                    }else{
                        $('#job_main').prop('checked', false);    
                    }
                    $("#job_salary").val(data.job_salary)
                    $("#job_salary_month").val(data.job_salary_month)
                    $("#job_address").val(data.job_address)
                    $("#job_descript").val(data.job_descript)
                    $("#job_remark").val(data.job_remark)
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
                    success : function(res){
                        window.location.reload();
                    }
                });
            } 
        });
        
    }
</script>