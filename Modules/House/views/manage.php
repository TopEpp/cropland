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
                            <button type="button" class="btn btn-info" onclick="location.href='<?=base_url('house/manage');?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/members');?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/jobs');?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/benefits');?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/accounts');?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลพื้นฐาน</h6>
                            <form action="">
                                <div class="row">                               
                                    <div class="form-group col-md-4">
                                        <label>ประเภทโครงการ</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ชื่อโครงการ</label>
                                        <input type="text" class="form-control">
                                    </div>     
                                    <div class="form-group col-md-4">
                                        <label>ปีที่สำรวจ</label>
                                        <input type="text" class="form-control">
                                    </div>    
                                    <div class="form-group col-md-4">
                                        <label>ชื่อหมู่บ้าน</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>บ้านเลขที่</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>หมู่ที่</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>จังหวัด</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>อำเถอ</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ตำบล</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>บ้าน</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>กลุ่มบ้าน</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>ประเภทที่พักอาศัย</label>
                                        <input type="text" class="form-control">
                                    </div>          
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">บันทึก</button>
                                        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('house');?>';" >ยกเลิก</button>
                                    </div>
                                </div>
                            </form>
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
  