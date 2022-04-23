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
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/'.@$interview_id);?>';">ข้อมูลเบื้องต้น</button>
                            <button type="button" class="btn btn-info" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/picture/'.@$interview_id);?>';">รูปภาพ</button>
                        </div>
                        
                        <div class="p-1 border">
                            <br>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>ตารางเก็บรายละเอียดข้อมูลการใช้ที่ดินในรอบ 1 ปีที่ผ่านมา</h4>
                                        <div class="card-header-action">
                                            <!-- <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a> -->
                                            <a href="#" class="btn btn-info" onclick="addLand()">เพิ่มข้อมูล</a>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="mycard-collapse">
                                        <div class="card-body p-0">
                                            <table class="table table-bordered">
                                                <thead class="bg-info">
                                                    <tr>
                                                        <th rowspan="2">ลำดับ</th>
                                                        <th rowspan="2" scope="col">การใช้ประโยชน์ที่ดิน</th>
                                                        <th rowspan="2" scope="col">พันธุ์</th>
                                                        <th rowspan="2" scope="col">พื้นที่ปลูก<br/>(ไร่)</th>
                                                        <th rowspan="2" scope="col">อายุ<br/>(ปี)</th>
                                                        <th rowspan="2" scope="col">จำนวนปลูกต่อหน่วย</th>
                                                        <th rowspan="2" scope="col">ช่วงเวลา ปลูก-เก็บเกี่ยว</th>
                                                        <th rowspan="2" scope="col">การส่งเสริมจากสถาบันฯ</th>
                                                        <th rowspan="2" scope="col">ไม่รับผลผลิต</th>
                                                        <th colspan="7" scope="col" class="text-center">รายจ่าย (บาท)/รอบการปลูก</th>
                                                        <th colspan="2" scope="col" class="text-center">รวมรายจ่าย(บาท/รอบ)</th>
                                                        <th colspan="6" scope="col" class="text-center">ผลผลิต/รอบการปลูก</th>                                
                                                    </tr>
                                                    <tr>
                                                        <th>เมล็ด/กล้าพันธ์ุ</th>
                                                        <th>ปุ๋ย</th>
                                                        <th>ยา</th>
                                                        <th>ฮอร์โมน</th>
                                                        <th>แรงงาน</th>
                                                        <th>น้ำมัน</th>
                                                        <th>อื่นๆ</th>

                                                        <th>ผลผลิตบริโภค</th>
                                                        <th>ลักษณะการขาย</th>
                                                        <th>ผลผลิต</th>
                                                        <th>ราคาขายต่อหน่วย<br/>(บาท)</th>
                                                        <th>รวมรายได้<br/>(บาท)</th>
                                                        <th>ตลาด</th>                                                       
                                                    </tr>
                                                </thead>
                                                <tbody>     
                                                    <?php foreach ($data as $key => $value) :?>
                                                        
                                                        <!-- <tr>                                                            
                                                            <td><?=$value['detail_use'];?></td>
                                                            <td><?=$value['detail_type'];?></td>
                                                            <td><?=$value['detail_age'];?></td>
                                                            <td><?=$value['detail_start_date'];?></td>                                                         
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>


                                                            
                                                        </tr> -->
                                                    <?php endforeach;?>                                 
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="LandModal">
    <div class="modal-dialog modal-xl" role="document">
        <form action="<?=base_url('survay/save_land/'.@$interview_id);?>" method="post">
            <input type="hidden" name="interview_id" id="interview_id">
            <input type="hidden" name="land_id" id="land_id">
            <input type="hidden" name="detail_id" id="detail_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลการใช้ที่ดิน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                               
                        <div class="form-group col-md-3">
                            <label>การใช้ประโยชน์ที่ดิน</label>     
                            <input type="hidden" name="detail_use_type">                                   
                            <select name="detail_use" id="detail_use" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($landuse as $key => $value) :?>
                                    <option value="<?=$value['landuse_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>              
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>พันธุ์</label>
                            <select name="detail_type" id="detail_type" class="form-control">
                                <option value="">เลือก</option>                             
                            </select>                      
                        </div>                      
                        <div class="form-group col-md-3">
                            <label>อายุ (ปี)</label>                                        
                            <input type="text" class="form-control" name="detail_age">
                        </div>
                        <div class="form-group col-md-3">
                            <label>พื้นที่ปลูก (ไร่)</label>                                        
                            <input type="text" class="form-control" name="detail_age">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ช่วงเวลาปลูก</label>                                        
                            <input type="text" class="form-control" name="detail_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control" name="detail_finish_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ช่วงเวลาเก็บเกี่ยว</label>                                        
                            <input type="text" class="form-control" name="detail_keep_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control" name="detail_keep_finish_date">
                        </div>
                    </div>
                    <p>เมล็ด/กล้าพันธุ์</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>จำนวน</label>                                        
                            <input type="text" class="form-control" name="detail_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>หน่วยนับ</label>                                        
                            <input type="text" class="form-control" name="detail_finish_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ราคาต่อหน่วย (บาท)</label>                                        
                            <input type="text" class="form-control" name="detail_keep_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="interview_land_utilization_type2" name="interview_land_utilization_type" value="3">
                                        <label class="form-check-label" for="interview_land_utilization_type2">
                                        การส่งเสริมจากสถาบันฯ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="interview_land_utilization_type2" name="interview_land_utilization_type" value="3">
                                        <label class="form-check-label" for="interview_land_utilization_type2">
                                        ได้รับผลผลิต
                                        </label>
                                    </div>
                                </div>
                            </div>
                          
                         
                        </div>
                    </div>
                    <h5>รายจ่าย/รอบการปลูก</h5>
                    <p>ปุ๋ย</p>
                    <div class="row repeater-dressing">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ประเภท</th>
                                        <th>ยี่ห้อ</th>
                                        <th>จำนวน</th>
                                        <th>หน่วยนับ</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ราคารวม</th>
                                        <th><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="dressing">
                                    <tr data-repeater-item>
                                        <td><input type="text" name="type" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <p>ยา</p>
                    <div class="row repeater-drug">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ประเภท</th>
                                        <th>ยี่ห้อ</th>
                                        <th>จำนวน</th>
                                        <th>หน่วยนับ</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ราคารวม</th>
                                        <th><button class="btn btn-info btn-sm"  type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="drug">
                                    <tr data-repeater-item>
                                        <td><input type="text" name="type" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>ฮอร์โมน</p>
                    <div class="row repeater-hormone">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>                                        
                                        <th>ยี่ห้อ</th>
                                        <th>จำนวน</th>
                                        <th>หน่วยนับ</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>ราคารวม</th>
                                        <th><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="hormone">
                                    <tr data-repeater-item>
                                        <td><input type="text" name="type" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>แรงงาน</p>
                    <div class="row repeater-staff">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ลักษณะการจ้าง</th>
                                        <th>การจ้างแรงงาน</th>
                                        <th>จำนวนคน</th>
                                        <th>จำนวนวันจ้าง</th>
                                        <th>บาท/วัน</th>
                                        <th>ค่าจ้างรวม</th>
                                        <th><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="staff">
                                    <tr data-repeater-item>
                                        <td><input type="text" name="type" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>รายจ่ายอื่นๆ</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>น้ำมัน</label>                                        
                            <input type="text" class="form-control" name="detail_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>อื่นๆ</label>                                        
                            <input type="text" class="form-control" name="detail_start_date">
                        </div>
                    </div>

                    <p>ผลผลิต</p>
                    <div class="row repeater-product">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>ลำดับ</th>
                                        <th>ลักษณะการขาย</th>                                        
                                        <th>จำนวนการขาย</th>
                                        <th>หน่วยนับ</th>
                                        <th>ราคาต่อหน่วย</th>
                                        <th>รวมรายได้(บาท)</th>
                                        <th>ตลาด</th>
                                        <th><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="product">
                                    <tr data-repeater-item>
                                        <td><input type="text" name="type" class="form-control"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>จำนวนบริโภค</label>                                        
                            <input type="text" class="form-control" name="detail_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>หน่วยนับ</label>                                        
                            <select name="" id="" class="form-control">
                                <option value=""></option>
                            </select>
                        </div>
                    </div>

                 
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker.js') ?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker-thai.js') ?>
<?= script_tag('public/assets/datepicker/js/locales/bootstrap-datepicker.th.js') ?>

<script>

    $(function () {

        var $repeaterDressing = $('.repeater-dressing').repeater({
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
        });

        var $repeaterDrug = $('.repeater-drug').repeater({
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
        });

        var $repeaterHormone = $('.repeater-hormone').repeater({
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
        });


        var $repeaterStaff = $('.repeater-staff').repeater({
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
        });

        var $repeaterProduct = $('.repeater-product').repeater({
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
        });


        


        $(".datepicker").datepicker({
            language: "th-th",
            format: "dd/mm/yyyy",
            autoclose: true,

            // daysOfWeekDisabled: [0, 6],
        });
    });
    function addLand(elm){
        $("#LandModal").modal();
    }

    function editLand(id){
        $("#person_id").val(id);
        $("#LandModal").modal();
    }

</script>
<?=$this->endSection()?>
  