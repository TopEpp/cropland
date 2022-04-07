<div class="modal-header">
    <h5 class="modal-title">ข้อมูลด้านอาชีพ</h5>
    <button type="button" class="btn btn-info" data-repeater-create value="Add Inner" onclick="">เพิ่มอาชีพ</button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <p>ชาญชัย วหคชลชี</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <h6>ข้อมูลด้านอาชีพ</h6>
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th scope="col">ลำดับ</th>
                    <th scope="col">อาชีพ</th>
                    <th scope="col">รายละเอียด</th>
                    <th scope="col">ประเภท</th>
                    <th scope="col">รายได้</th>
                    <th scope="col">สถานประกอบการ</th>
                    <th scope="col">หมายเหตุ</th>
                    </tr>
                </thead>
                <tbody>
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
                    <div class="row">                               
                        <div class="form-group col-md-4">
                            <label>อาชีพ</label>                                        
                            <select name="job_type" id="job_type" class="form-control">
                                <option value="1">1</option>
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
                            <p>ประเภท : ในภาคการเกษตร</p>
                            <input type="hidden" name="job_cal_type" value="1">
                        </div>

                        <div class="form-group col-md-4">
                            <label>รายได้ต่อรอบ</label>                                        
                            <input type="text" class="form-control" name="job_salary">
                        </div>
                        <div class="form-group col-md-4">
                            <label>จำนวนรอบต่อปี</label>                                        
                            <input type="text" class="form-control" name="job_salary_month">
                        </div>
                        <div class="form-group col-md-4">
                            <label>สถานที่ประกอบการ</label>                                        
                            <input type="text" class="form-control" name="job_address">
                        </div>
                        <div class="form-group col-md-12">
                            <label>หมายเหตุ</label>                                        
                            <input type="text" class="form-control" name="job_descript">
                        </div>
                    </div>
                    
                    <div class="row inner-repeater">
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
                                        <td> <input type="text" class="form-control" name="type_id"></td>
                                        <td> <input type="text" class="form-control" name="detail_value"></td>
                                        <td> <input type="text" class="form-control" name="detail_unit"></td>
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
</script>