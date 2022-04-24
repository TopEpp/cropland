<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">              
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลแบบสอบถาม</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('survay/manage');?>" class="btn btn-info">
                            เพิ่มแบบสอบถาม
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5>ค้นหาข้อมูล</h5>
                        <div>
                            <form action="">
                                <div class="row">                                
                                    <div class="form-group col-md-3">
                                        <label>ปีสำรวจ</label>
                                        <select name="interview_year" id="interview_year" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <option <?=@$search['interview_year'] == '2565'?'selected':''?> value="2565">2565</option>
                                            <option <?=@$search['interview_year'] == '2564'?'selected':''?> value="2664">2564</option>
                                            <option <?=@$search['interview_year'] == '2563'?'selected':''?> value="2663">2563</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ชื่อผู้บันทึกข้อมูล</label>                                       
                                        <select name="interview_user" id="interview_user" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($users as $key => $value) :?>
                                                <option <?=@$search['interview_user'] == $value['prs_id']?'selected':'';?> value="<?=$value['prs_id'];?>"><?=$value['fullname'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>โครงการ</label>                                       
                                        <select name="interview_project" id="interview_project" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Description'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>พื้นที่</label>                                       
                                        <select name="interview_area" id="interview_area" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_area'] == $value['Name']?'selected':'';?> value="<?=$value['Name'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>กลุ่มบ้าน</label>                                       
                                        <select name="interview_house_id" id="interview_house_id" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($users as $key => $value) :?>
                                                <option <?=@$search['interview_house_id'] == $value['emp_id']?'selected':'';?> value="<?=$value['emp_id'];?>"><?=$value['fullname'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ชื่อเจ้าของแปลง</label>                                       
                                        <select name="interview_person_id" id="interview_person_id" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($users as $key => $value) :?>
                                                <option <?=@$search['interview_person_id'] == $value['emp_id']?'selected':'';?> value="<?=$value['emp_id'];?>"><?=$value['fullname'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>รหัสแปลง</label>                                       
                                        <select name="interview_code" id="interview_code" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($lands as $key => $value) :?>
                                                <option <?=@$search['interview_code'] == $value['land_id']?'selected':'';?> value="<?=$value['land_id'];?>"><?=$value['land_code'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">ค้นหา</button>
                                        <button type="button" class="btn btn-secondary">ล้างค่า</button>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                      
                        <br>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">โครงการ</th>
                                    <th scope="col">พื้นที่</th>
                                    <th scope="col">กลุ่มบ้าน</th>
                                    <th scope="col">รหัสแปลง</th>
                                    <th scope="col">ชื่อ-สกุล เจ้าของแปลง</th>
                                    <th>ที่อยู่</th>
                                    <th>กลุ่มบ้าน</th>
                                    <th>การใช้ประโยชน์ที่ดิน</th>
                                    <th>ปีสำรวจ</th>
                                    <th>พื้นที่แปลงรวม (ไร่)</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['project_name'];?></td>
                                        <td><?=$value['project_area'];?></td>
                                        <td><?=$value['project_village'];?></td>
                                        <td><?=$value['interview_code'];?></td>
                                        <td><?=$value['person_name'];?></td>
                                        <td><?=$value['person_address'];?></td>
                                        <td><?=$value['house_label'];?></td>
                                        <td><?=$value['land_use'];?></td>
                                        <td><?=$value['interview_year'];?></td>
                                        <td><?=$value['land_address'];?></td>
                                        <td>
                                            <div class="buttons">
                                                <a href="<?=base_url('survay/manage/'.$value['interview_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                                <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>

<?=$this->section("css")?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?=$this->endSection()?>
  