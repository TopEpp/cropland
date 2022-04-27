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
            
            <div id="item_modal"></div>
        </form>
    </div>
</div>

<?=$this->endSection()?>

<?=$this->section("css")?>
<?= link_tag('public/assets/datepicker/css/datepicker.css') ?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker.js') ?>
<?= script_tag('public/assets/datepicker/js/bootstrap-datepicker-thai.js') ?>
<?= script_tag('public/assets/datepicker/js/locales/bootstrap-datepicker.th.js') ?>

<script>

    function addLand(){
        // $("#land_id").val(id)
        $.ajax({
            type: "GET",
            url: domain+'survay/load-land/',
            success : function(response){
                $("#item_modal").html(response)
            }
        });
        
        $("#LandModal").modal();
    }


</script>
<?=$this->endSection()?>
  