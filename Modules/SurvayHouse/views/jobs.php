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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay_house/manage/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/members/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/income/'.@$house_id);?>';">ข้อมูลรายได้</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('survay_house/outcome/'.@$house_id);?>';">ข้อมูลรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านอาชีพ</h6>
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">อาชีพหลัก</th>
                                    <th scope="col">ประเภท</th>
                                    <th scope="col">รายได้ / ปี</th>
                                    <th scope="col">สถานประกอบการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) :?>
                                        <tr>
                                            <th scope="row" class="text-center"><?=$key+1;?></th>
                                            <td>
                                                <a class="text-info" onclick="addJobs(<?=$value['person_id'];?>)" style="cursor: pointer;"><?=$value['person_name'].' '.$value['person_lastname'];?></a>
                                            </td>
                                            <td><?=$value['name']?$value['name']:'-';?></td>
                                            <td><?=@$cal_type[$value['job_cal_type']] ? $cal_type[$value['job_cal_type']] :'-';?></td>
                                            <td class="text-right"><?=$value['job_salary'] ? number_format($value['job_salary']).' บาท':'-';?></td>
                                            <td>
                                                <?=$value['job_address']?$value['job_address']:'-';?>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>

                                </tbody>
                            </table>
                          
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">                                                                      
                                <button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('survay_house/income/'.@$house_id);?>';" >ถัดไป</button>
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
        <form action="<?=base_url('survay_house/save_jobs/'.@$house_id);?>" method="post" class="needs-validation" novalidate="">
            <input type="hidden" name="interview_id" id="interview_id">
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
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>

    function addJobs(id){
        $("#person_id").val(id)
        $.ajax({
            type: "GET",
            url: domain+'house/load-jobs/'+id,
            success : function(response){
                $("#item_modal").html(response)
            }
        });
        
        $("#JobModal").modal();
    }
</script>

<?=$this->endSection()?>
  