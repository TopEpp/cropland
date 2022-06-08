<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลแบบสอบถามครัวเรือน</h4>
                        <!-- <div class="card-header-action">
                            <a href="<?= base_url('survay_house/manage');?>" class="btn btn-info">
                                เพิ่มข้อมูล
                            </a>
                        </div> -->
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
                                            <option value="">ทั้งหมด</option>                                       
                                            <?php foreach ($province as $key => $value) :?>
                                                <option <?=@$search['province'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach?>                                            
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>อำเภอ</label>                                       
                                        <select name="amphur" id="amphur" class="form-control">
                                            <?php foreach ($amphur as $key => $value) :?>
                                                <option <?=@$search['amphur'] == $value['AMP_CODE'] ? 'selected':'';?> value="<?=$value['AMP_CODE'];?>"><?=$value['AMP_T'];?></option>
                                            <?php endforeach?> 
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ตำบล</label>                                       
                                        <select name="tambon" id="tambon" class="form-control ">                                            
                                            <?php foreach ($tambon as $key => $value) :?>
                                                <option <?=@$search['tambon'] == $value['TAM_CODE'] ? 'selected':'';?> value="<?=$value['TAM_CODE'];?>"><?=$value['TAM_T'];?></option>
                                            <?php endforeach?>                                      
                                        </select>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">ค้นหา</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.replace('<?=site_url('survay_house');?>');">ล้างค่า</button>
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
                                                <a data-toggle="tooltip" title="แก้ไขข้อมูล" href="<?=base_url('survay_house/manage/'.$value['house_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                                <button  data-toggle="tooltip" data-placement="bottom" title="ลบข้อมูล" onclick="deleteItem(<?=$value['interview_id'];?>)" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
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
                    url: domain+'survay_house/delete_interview/'+elm,
                    success : function(res){
                        window.location.reload();
                    }
                });
            } 
        });
        
    }

    $(function(){

        $("#province").change(function(){
            var province = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-amphur?province='+province,
                success : function(options){
                    $("#amphur").html(options)
                }
            });
        })

        $("#amphur").change(function(){
            var amphur = $(this).val();
            var province = $("#province").val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-tambon?amphur='+amphur+'&province='+province,
                success : function(options){
                    $("#tambon").html(options)
                }
            });
        })

        $("#tambon").change(function(){
            var tambon = $(this).val();
            var amphur = $("#amphur").val();
            var province = $("#province").val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-villages?amphur='+amphur+'&province='+province+'&tambon='+tambon,
                success : function(options){
                    $("#village").html(options)
                }
            });
        })
    })
</script>
<?=$this->endSection()?>
  