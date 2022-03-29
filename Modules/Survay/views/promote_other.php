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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/land');?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/promote');?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('survay/manage/promote-other');?>';">ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/problem');?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/need');?>';">ความต้องการส่งเสริม</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลการส่งเสริมและสนับสนุนของ หน่วยงานอื่น</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">หน่วยงาน</th>
                                    <th scope="col">รายละเอียด</th>
                                    <th scope="col">
                                        <a href="#" class="btn btn-info">เพิ่มข้อมูล</a>
                                    </th>                                 
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <input type="text" class="form-control">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control">
                                        </td>
                                        <td>
                                        <div class="buttons">                                            
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
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
</section>
<?=$this->endSection()?>

<?=$this->section("scripts")?>

<?=$this->endSection()?>
  