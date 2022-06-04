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
                                        <select name="interview_project" id="interview_project" class="form-control select2" onchange="selectProject($(this))">
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
                                                <option <?=@$search['interview_area'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>กลุ่มบ้าน</label>                                       
                                        <select name="interview_house_id" id="interview_house_id" class="form-control select2-ajax-house">                                            
                                            <?php if(!empty($search['interview_house_id'])):?>
                                                <option value="<?=$search['interview_house_id'];?>"><?=$data_search['house']['Name']?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                                
                                            <?php endif;?>                                          
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ชื่อเจ้าของแปลง</label>                                       
                                        <select name="interview_person_id" id="interview_person_id" class="form-control select2-ajax-person">
                                            <?php if(!empty($search['interview_person_id'])):?>
                                                <option value="<?=$search['interview_person_id'];?>"><?=$data_search['person']['person_name'].' '.$data_search['person']['person_lastname'];?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>รหัสแปลง</label>                                       
                                        <select name="interview_code" id="interview_code" class="form-control select2-ajax-land">                                            
                                            <?php if(!empty($search['interview_code'])):?>
                                                <option value="<?=$search['interview_code'];?>"><?=$data_search['land']['land_code'];?></option>
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
                                    <th width="3%" scope="col">ลำดับ</th>
                                    <th width="15%" scope="col">โครงการ</th>
                                    <th width="10%" scope="col">พื้นที่</th>
                                    <th width="10%" scope="col">กลุ่มบ้าน</th>
                                    <th width="10%" scope="col">รหัสแปลง</th>
                                    <th width="10%" scope="col">ชื่อ-สกุล เจ้าของแปลง</th>
                                    <th width="15%">ที่อยู่</th>
                                    <th width="10%">กลุ่มบ้าน</th>
                                    <th width="10%">การใช้ประโยชน์ที่ดิน</th>
                                    <th width="5%">ปีสำรวจ</th>
                                    <th width="5%">พื้นที่แปลงรวม (ไร่)</th>
                                    <th width="10%"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['project_name'];?></td>
                                        <td><?=$value['project_area'];?></td>
                                        <td><?=$value['project_village'];?></td>
                                        <td><?=$value['land_code'];?></td>
                                        <td><?=$value['person_name'];?></td>
                                        <td><?=$value['person_address'];?></td>
                                        <td><?=$value['person_village'];?></td>
                                        <td><?=$value['land_use'];?></td>
                                        <td><?=$value['interview_year'];?></td>
                                        <td><?=$value['land_address'];?></td>
                                        <td class="text-center">
                                            <div class="buttons">
                                                <a data-toggle="tooltip" title="แก้ไขข้อมูล" href="<?=base_url('survay/manage/'.$value['interview_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                                <button  data-toggle="tooltip" data-placement="bottom" title="ลบข้อมูล" class="btn btn-icon btn-danger" onclick="deleteItem(<?=$value['interview_id'];?>)"><i class="fas fa-trash"></i></button>
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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- //load select2 ajax/ -->
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
                    url: domain+'survay/delete_survay/'+elm,
                    success : function(res){
                        window.location.reload();
                    }
                });
            } 
        });
        
    }

    function selectProject(elm){
        var value = elm.val();
        let selText = $("#interview_project option:selected").text();
        // const land = selText.split('/');
        
        //set land
        $("#interview_area").val(value).trigger('change');
        
        $.ajax({
            type: "GET",
            url: domain+'common/get-village?project='+value,
            success : function(options){

                $("#interview_house_id").html(options)
                $("#interview_house_id").select2();
            }
        });
    }
   
</script>
<?=$this->endSection()?>
  