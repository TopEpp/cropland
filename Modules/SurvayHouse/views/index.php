<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลแบบสอบถามครัวเรือน</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('survay_house/manage');?>" class="btn btn-info">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">

                    <h5>ค้นหาข้อมูล</h5>
                        <div>
                            <form action="" id="form-search">
                                <div class="row">                                
                                    <div class="form-group col-md-3">
                                        <label>ปีสำรวจ</label>
                                        <select name="interview_year" id="interview_year" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach (getYear() as $key => $value) :?>
                                                <option <?=@$search['interview_year'] == $value ?'selected':''?> value="<?=$value;?>"><?=$value;?></option>
                                            <?php endforeach;?>                                           
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ชื่อผู้บันทึกข้อมูล</label>                                       
                                        <select name="interview_user" id="interview_user" class="form-control select2-ajax-user">
                                            <?php if(!empty($search['interview_user'])):?>
                                                <option value="<?=$search['interview_user'];?>"><?=$data_search['user']['fullname'];?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>โครงการ</label>                                       
                                        <select name="interview_project" id="interview_project" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Description'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>พื้นที่</label>                                       
                                        <select name="interview_area" id="interview_area" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_area'] == $value['Name']?'selected':'';?> value="<?=$value['Name'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>จังหวัด</label>                                       
                                        <select name="province" id="province" class="form-control ">                                            
                                            <?php if(!empty($search['province'])):?>
                                                <option value="<?=$search['province'];?>"><?=$data_search['house']['Name']?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>                                          
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>อำเภอ</label>                                       
                                        <select name="amphur" id="amphur" class="form-control">
                                            <?php if(!empty($search['amphur'])):?>
                                                <option value="<?=$search['amphur'];?>"><?=$data_search['person']['person_name'].' '.$data_search['person']['person_lastname'];?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ตำบล</label>                                       
                                        <select name="tambon" id="tambon" class="form-control ">                                            
                                            <?php if(!empty($search['tambon'])):?>
                                                <option value="<?=$search['tambon'];?>"><?=$data_search['land']['land_code'];?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>                                     
                                        </select>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">ค้นหา</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.replace('<?=site_url('survay');?>');">ล้างค่า</button>
                                    </div>                                    
                                </div>
                            </form>
                        </div>
                      
                        <br>

                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th width="5%" scope="col">ลำดับ</th>
                                    <th width="15%" scope="col">ชื่อโครงการ</th>
                                    <th width="10%" scope="col">ปีที่สำรวจ</th>
                                    <th width="15%" scope="col">ชื่อ-นามสกุล</th>
                                    <th width="30%" scope="col">ที่อยู่</th>
                                    <th width="10%" scope="col">จำนวนสมาชิก</th>
                                    <!-- <th width="10%" scope="col">จำนวนที่ดิน</th> -->
                                    
                                    <th width="10%" scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th class="text-center" scope="row"><?=$key+1;?></th>
                                        <td><?=@$value['interview_project_name'];?></td>
                                        <td><?=@$value['interview_year'];?></td>
                                        <td><?=@$value['person_name'].' '.@$value['person_lastname'] ?></td>
                                        <td><?=$value['person_address'];?></td>
                                        <td class="text-center"><?=$value['total_person'];?></td>
                                      
                                        <td class="text-center">
                                            <div class="buttons">
                                                <a href="<?=base_url('survay_house/manage/'.$value['house_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                                <button onclick="deleteItem(<?=$value['house_id'];?>)" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                               

                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            <?php if ($pager) :?>
                            <?php $pagi_path='member'; ?>
                            <?php $pager->setPath($pagi_path); ?>               
                            <?= $pager->links('page','default_pagination'); ?>
                            <?php endif ?>
                        </div>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?= script_tag('public/assets/js/modules/ajax_select2.js') ?>
<script>
    
    function deleteItem(elm){
        swal({
        title: 'Are you sure?',
        text: 'ยืนยันลบข้อมูลนี้!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: domain+'survay_house/delete_house/'+elm,
                    success : function(res){
                        window.location.reload();
                    }
                });
            } 
        });
        
    }
</script>
<?=$this->endSection()?>
  