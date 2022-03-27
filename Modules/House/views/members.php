<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลครัวเรือน</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-info">เพิ่มครอบครัว</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage');?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('house/manage/members');?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/jobs');?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/benefits');?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/accounts');?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลสมาชิกในครัวเรือน</h6>
                                <div class="card">
                                    <div class="card-header">
                                        <h4>ครอบครัว 1</h4>
                                        <div class="card-header-action">
                                            <!-- <a data-collapse="#mycard-collapse" class="btn btn-icon btn-info" href="#"><i class="fas fa-minus"></i></a> -->
                                            <a href="#" class="btn btn-info">เพิ่มข้อมูลสมาชิก</a>
                                        </div>
                                    </div>
                                    <div class="collapse show" id="mycard-collapse">
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead >
                                                    <tr>
                                                    <th scope="col">ลำดับ</th>
                                                    <th scope="col">รหัสประจำตัวประชาชน</th>
                                                    <th scope="col">ชื่อ-นามสกุล</th>
                                                    <th scope="col">การศึกษา</th>
                                                    <th scope="col">สถานะครอบครัว</th>
                                                    <th scope="col">เครื่องมือ</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <th scope="row">1</th>
                                                        <td>9-999-9999-99-99-9</td>
                                                        <td>ชาญชัย วหคชลชี</td>
                                                        <td>ม. 6</td>
                                                        <td>หัวหน้าครอบครัว 1</td>
                                                        <td>
                                                            <div class="buttons">
                                                                <a href="#" class="btn btn-icon btn-primary btn-sm"><i class="far fa-edit"></i></a>                                    
                                                                <a href="#" class="btn btn-icon btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                                            </div>
                                                        </td>
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
        </div>
    </div>
</section>
<?=$this->endSection()?>

<?=$this->section("scripts")?>

<?=$this->endSection()?>
  