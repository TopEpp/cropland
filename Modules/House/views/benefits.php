<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลครัวเรือน</h4>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage');?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/members');?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/jobs');?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('house/manage/benefits');?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/accounts');?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านรายได้จากสวัสดิการ</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">เงินผู้สูงอายุ/เดือน</th>
                                    <th scope="col">บัตรประชารัฐ/เดือน</th>
                                    <th scope="col">บัตรผู้พิการ/เดือน</th>
                                    <th scope="col">เงินช่วยเหลือภัยพิบัติ/ปี</th>
                                    <th scope="col">เงินค่าประกันสินค้าเกษตร/ปี</th>
                                    <th scope="col">อื่นๆ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <a href="">ชาญชัย วหคชลชี</a>
                                        </td>
                                        <td>600</td>
                                        <td>300</td>
                                        <td>500</td>
                                        <td>
                                            800
                                        </td>
                                        <td>-</td>
                                        <td>-</td>
                                        
                                    </tr>

                                </tbody>
                            </table>
                          
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
  