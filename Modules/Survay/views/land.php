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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage');?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay/land');?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/promote');?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/promote-other');?>';">ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/problem');?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/need');?>';">ความต้องการส่งเสริม</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>ตารางเก็บรายละเอียดข้อมูลการใช้ที่ดินในรอบ 1 ปีที่ผ่านมา</h4>
                                        <div class="card-header-action">
                                            <!-- <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a> -->
                                            <a href="#" class="btn btn-info">เพิ่มข้อมูล</a>
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
                                                    <th colspan="6" scope="col">รายจ่าย (บาท)</th>
                                                    <th colspan="2" scope="col">ผลผลิต</th>
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
<?=$this->endSection()?>

<?=$this->section("scripts")?>

<?=$this->endSection()?>
  