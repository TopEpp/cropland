<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<?php 
    $cal_type = ['1'=>'ในภาคการเกษตร','2'=>'นอกภาคการเกษตร'];
?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="text-dark"><a href="<?php echo base_url('survay_house')?>">ข้อมูลครัวเรือน</a> > จัดการข้อมูลครัวเรือน</h4>
                    </div>
                    <div class="card-body">
                    <?php if (session()->getFlashdata("message")):?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                    </button>
                                    <?= session()->getFlashdata("message");?>
                                </div>
                            </div>
                        <?php endif;?>
                        
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay_house/manage/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/members/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/jobs/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/income/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลรายได้</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('survay_house/outcome/'.$interview_id.'/'.@$house_id);?>';">ข้อมูลรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านอาชีพ</h6>
                            <br>
                            <?php foreach ($datas as $keys => $data) :?>
                                <h5>ครอบครัว <span class="key_data"><?=$keys;?></span></h5>
                                <table class="table table-bordered">
                                    <thead class="bg-info">
                                        <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">เพิ่มข้อมูลด้านอาชีพ</th>
                                        <th scope="col">ดูข้อมูล</th>
                                        <th scope="col">จำนวนอาชีพที่ประกอบ</th>
                                        <th scope="col">รวมรายได้บาท/ปี</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $cout = 1;?>
                                        <?php foreach ($data as $key => $value) :?>
                                            <tr>
                                                <th scope="row" class="text-center"><?=$cout;?></th>
                                                <td>
                                                    <?=$value['person_name'].' '.$value['person_lastname'];?>
                                                </td>
                                                <td  class='text-center'> 
                                                    <button  data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูล" onclick="loadJobs(<?=$value['person_id'];?>)" class="btn btn-icon btn-info"><i class="fas fa-plus"></i></button>
                                                </td>
                                                <td class='text-center'> 
                                                    <button  data-toggle="tooltip" data-placement="bottom" title="ดูรายละเอียด" onclick="loadJobsEdit(<?=$value['person_id'];?>)" class="btn btn-icon btn-primary"><i class="fas fa-eye"></i></button>
                                                </td>                                               
                                                <td class="text-right"><?=$value['job_count'];?></td>
                                                <td class="text-right"><?=$value['job_salary'] ? number_format($value['job_salary']).' บาท':'-';?></td>
                                            </tr>
                                            <?php $cout = $cout + 1;?>
                                        <?php endforeach;?>

                                    </tbody>
                                </table>
                            <?php endforeach;?>
                          
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">                                                                      
                                <button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('survay_house/income/'.$interview_id.'/'.@$house_id);?>';" >ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="JobModal">
    <div class="modal-dialog modal-xl" role="document">
        <input type="hidden" id="house_id" value="<?=$house_id;?>">
        <form action="<?=base_url('survay_house/save_jobs/'.@$house_id);?>" method="post" id="form-jobs">
            <input type="hidden" name="interview_id" id="interview_id" value="<?=$interview_id;?>">
            <input type="hidden" name="person_id" id="person_id">
            <!-- <input type="hidden" name="job_id" id="job_id"> -->
            <div class="modal-content outer-repeater">
                <div id="item_modal" />
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?>

<?=$this->section("css")?>
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->

<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
<script>
    $(function(){
        $('#JobModal').on('hidden.bs.modal', function () {
            window.location.reload();
        })
    })
    function loadJobsEdit(id){
        $("#person_id").val(id)
        $.ajax({
            type: "GET",
            url: domain+'house/load-jobs/'+id+'?type=edit',
            success : function(response){
                
                $("#item_modal").html(response)
            }
        });
        
        $("#JobModal").modal();
    }

    function loadJobs(id){
        $("#person_id").val(id)
        $.ajax({
            type: "GET",
            url: domain+'house/load-jobs/'+id+'?type=create',
            success : function(response){                
                $("#item_modal").html(response)
            }
        });
        
        $("#JobModal").modal();
    }

    function saveJobs(type){
        var data = $('#form-jobs').serialize();
        var id = $("#house_id").val()
        $.ajax({
            type: "POST",
            url: domain+'survay_house/save_jobs/'+id+'?type='+type,
            data:data,
            success : function(response){
                if (type == 'create'){
                    window.location.reload();
                }else{

                    $('.alert-success').removeClass('show').addClass( 'show' );
                    $("#message_success").text(response)
                    loadJobsEdit($('#person_id').val())
                }
               
               
            }
        }); 
    }
</script>

<?=$this->endSection()?>
  