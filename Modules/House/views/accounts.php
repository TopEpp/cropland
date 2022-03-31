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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/members/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/benefits/'.@$house_id);?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('house/accounts/'.@$house_id);?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านรายจ่าย</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th rowspan="2" scope="col">ลำดับ</th>
                                        <th rowspan="2" scope="col">ชื่อ-นามสกุล</th>
                                        <th colspan="8" class="text-center" scope="col">รายจ่ายการอุปโภค</th>
                                        <th rowspan="2" scope="col">รายจ่ายในการบริโภค</th>
                                        <th rowspan="2" scope="col">หมายเหตุ</th>
                                    </tr>
                                    <tr>
                                        <th>ค่าเครื่องนุ่มห่ม</th>
                                        <th>ค่าที่อยู่อาศัย</th>
                                        <th>ค่าการศึกษา</th>
                                        <th>ค่ายารักษาโรค</th>
                                        <th>ค่าน้ำมัน</th>
                                        <th>ค่าเติมเงินมือถือ</th>
                                        <th>ค่าทำบุญ</th>
                                        <th>ค่าหวย/สุรา</th>
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
                                        <td> - </td>
                                        <td>800</td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
                                        <td> - </td>
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
  