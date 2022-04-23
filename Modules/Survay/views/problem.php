<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><a href="<?php echo base_url('survay')?>">ข้อมูลแบบสอบถาม</a> > จัดการข้อมูลแบบสอบถาม</h4>
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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/'.@$interview_id);?>';">ข้อมูลเบื้องต้น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-info" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/picture/'.@$interview_id);?>';">รูปภาพ</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลปัญหาด้านการเกษตร</h6>
                            <br>
                            <form action="<?=base_url('survay/save_problem/'.@$interview_id);?>"  method="post" id="form_problem">
                                <input type="hidden" name="interview_id">
                                <input type="hidden" name="land_id">  
                                <div class="row mb-2">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="problem_type_1" name="problem_type[1][type]" value="1" <?=@$data[1]['problem_type'] == 1 ? 'checked':'';?>>
                                            <label class="form-check-label" for="problem_type_1">
                                            โครงสร้างปัจจัยพื้นฐาน
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="problem_type[1][detail]" value="<?=@$data[1]['problem_detail'];?>">
                                        <input type="hidden" class="form-control" name="problem_type[1][id]" value="<?=@$data[1]['problem_id'];?>">
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="problem_type_2" name="problem_type[2][type]" value="1" value="1" <?=@$data[2]['problem_type'] == 2 ? 'checked':'';?>>
                                            <label class="form-check-label" for="problem_type_2">
                                            ทรัพยากรธรรมชาติและสิ่งแวดล้อม
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="problem_type[2][detail]" value="<?=@$data[2]['problem_detail'];?>">
                                        <input type="hidden" class="form-control" name="problem_type[2][id]" value="<?=@$data[2]['problem_id'];?>">
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="problem_type_3" name="problem_type[3][type]" value="1" value="1" <?=@$data[3]['problem_type'] == 3 ? 'checked':'';?>>
                                            <label class="form-check-label" for="problem_type_3">
                                            ตลาด
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="problem_type[3][detail]" value="<?=@$data[3]['problem_detail'];?>">
                                        <input type="hidden" class="form-control" name="problem_type[3][id]" value="<?=@$data[3]['problem_id'];?>">
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="problem_type_4" name="problem_type[4][type]" value="1" value="1" <?=@$data[4]['problem_type'] == 4 ? 'checked':'';?>>
                                            <label class="form-check-label" for="problem_type_4">
                                            เศรษฐกิจ
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="problem_type[4][detail]" value="<?=@$data[4]['problem_detail'];?>">
                                        <input type="hidden" class="form-control" name="problem_type[4][id]" value="<?=@$data[4]['problem_id'];?>">
                                    </div>
                                </div>
                                <div class="row  mb-2">
                                    <div class="col-md-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="problem_type_5" name="problem_type[5][type]" value="1" value="1" <?=@$data[5]['problem_type'] == 5 ? 'checked':'';?>>
                                            <label class="form-check-label" for="problem_type_5">
                                            สังคม
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="problem_type[5][detail]" value="<?=@$data[5]['problem_detail'];?>">
                                        <input type="hidden" class="form-control" name="problem_type[5][id]" value="<?=@$data[5]['problem_id'];?>">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">บันทึก</button>
                                        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('survay');?>';" >ยกเลิก</button>
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
  