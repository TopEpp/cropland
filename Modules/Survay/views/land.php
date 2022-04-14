<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลแบบสอบถาม</h4>                     
                    </div>
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/'.@$interview_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-info" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                        </div>
                        
                        <div class="p-2 border">
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
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead >
                                                    <tr>
                                                    <th rowspan="2" scope="col">การใช้ประโยชน์ที่ดิน</th>
                                                    <th rowspan="2" scope="col">พันธุ์</th>
                                                    <th rowspan="2" scope="col">อายุ (ปี)</th>
                                                    <th rowspan="2" scope="col">ช่วงเวลา ปลูก-เก็บเกี่ยว</th>
                                                    <th colspan="6" scope="col" class="text-center">รายจ่าย (บาท)</th>
                                                    <th colspan="2" scope="col" class="text-center">ผลผลิต</th>
                                                    <th rowspan="2" scope="col">ราคาขายต่อหน่วย(บาท/กก.)</th>
                                                    <th rowspan="2" scope="col">รวมรายได้ บาท/ปี</th>
                                                    <th rowspan="2" scope="col">ตลาด</th>
                                                    <th rowspan="2" scope="col">การส่งเสริมจากสถาบันฯ</th>
                                                    </tr>
                                                    <tr>
                                                        <th>เมล็ด/กล้าพันธ์ุ</th>
                                                        <th>ปุ๋ย</th>
                                                        <th>ยา</th>
                                                        <th>แรงงาน</th>
                                                        <th>น้ำมัน</th>
                                                        <th>อื่นๆ</th>
                                                        <th>บริโภค</th>
                                                        <th>ขาย</th>
                                                    </tr>
                                                </thead>
                                                <tbody>     
                                                    <?php foreach ($data as $key => $value) :?>
                                                        <tr>                                                            
                                                            <td><?=$value['detail_use'];?></td>
                                                            <td><?=$value['detail_type'];?></td>
                                                            <td><?=$value['detail_age'];?></td>
                                                            <td><?=$value['detail_start_date'];?></td>                                                         
                                                            <td><?=$value['cost_seed'];?></td>
                                                            <td><?=$value['cost_fertilizer'];?></td>
                                                            <td><?=$value['cost_drug'];?></td>
                                                            <td><?=$value['cost_labor'];?></td>
                                                            <td><?=$value['cost_oil'];?></td>
                                                            <td><?=$value['cost_other'];?></td>

                                                            <td><?=$value['detail_product'];?></td>
                                                            <td><?=$value['detail_sell'];?></td>
                                                            <td><?=$value['detail_price'];?></td>
                                                            <td><?=$value['detail_price_year'];?></td>
                                                            <td><?=$value['detail_market'];?></td>
                                                            <td><?=$value['detail_hrdi'];?></td>
                                                            
                                                        </tr>
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
                        <div class="form-group col-md-4">
                            <label>การใช้ประโยชน์ที่ดิน</label>     
                            <input type="hidden" name="detail_use_type">                                   
                            <select name="detail_use" id="detail_use" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($landuse as $key => $value) :?>
                                    <option value="<?=$value['landuse_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>              
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label>พันธุ์</label>
                            <select name="detail_type" id="detail_type" class="form-control">
                                <option value="">เลือก</option>                             
                            </select>                      
                        </div>                      
                        <div class="form-group col-md-4">
                            <label>อายุ (ปี)</label>                                        
                            <input type="text" class="form-control" name="detail_age">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ช่วงเวลาปลูก</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_start_date">
                        </div>
                        <div class="form-group col-md-4">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_finish_date">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>ช่วงเวลาเก็บเกี่ยว</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_keep_start_date">
                        </div>
                        <div class="form-group col-md-4">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_keep_finish_date">
                        </div>
                    </div>
                    <p>รายจ่าย (บาท)</p>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>เมล็ด/กล้าพันธุ์</label>                                        
                            <input type="text" class="form-control" name="cost_seed">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ปุ๋ย</label>                                        
                            <input type="text" class="form-control" name="cost_fertilizer">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ยา</label>                                        
                            <input type="text" class="form-control" name="cost_drug">
                        </div>
                        <div class="form-group col-md-4">
                            <label>แรงงาน</label>                                        
                            <input type="text" class="form-control" name="cost_labor">
                        </div>
                        <div class="form-group col-md-4">
                            <label>น้ำมัน</label>                                        
                            <input type="text" class="form-control" name="cost_oil">
                        </div>
                        <div class="form-group col-md-4">
                            <label>อื่นๆ</label>                                        
                            <input type="text" class="form-control" name="cost_other">
                        </div>
                    </div>
                    <p>รายจ่าย (บาท)</p>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>บริโภค</label>                                        
                            <input type="text" class="form-control" name="detail_product">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ขาย</label>                                        
                            <input type="text" class="form-control" name="detail_sell">
                        </div>
                        <div class="form-group col-md-4">
                           &nbsp;
                        </div>
                        <div class="form-group col-md-4">
                            <label>ราคาขายต่อหน่วย (บาท/กก.)</label>                                        
                            <input type="text" class="form-control" name="detail_price">
                        </div>
                        <div class="form-group col-md-4">
                            <label>รวมรายได้บาท/ปี</label>                                        
                            <input type="text" class="form-control" name="detail_price_year">
                        </div>
                        <div class="form-group col-md-4">
                            <label>ตลาด</label>                                        
                            <input type="text" class="form-control" name="detail_market">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="detail_hrdi" name="detail_hrdi" value="1">
                                <label class="form-check-label" for="detail_hrdi">
                                การส่งเสริมจากสถาบันฯ
                                </label>
                            </div>
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
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker.js') ?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker-thai.js') ?>
<?= script_tag('public/assets/datepicker/js/locales/bootstrap-datepicker.th.js') ?>

<script>
    $(function () {
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
  