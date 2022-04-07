<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<?php $month = ["",1,2,3,4,5,6,7,8,9,10,11,12];?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">จัดการข้อมูลครัวเรือน</h4>
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
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('house/manage/'.@$house_id);?>';">ข้อมูลพื้นฐาน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/members/'.@$house_id);?>';">ข้อมูลสมาชิกในครัวเรือน</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('house/income/'.@$house_id);?>';">ข้อมูลด้านรายได้จากสวัสดิการ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('house/outcome/'.@$house_id);?>';">ข้อมูลด้ายรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านรายได้จากสวัสดิการ</h6>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                    <th scope="col">ลำดับ</th>
                                    <th scope="col">ชื่อ-นามสกุล</th>
                                    <th scope="col">เงินผู้สูงอายุ/เดือน</th>
                                    <th scope="col">บัตรประชารัฐ/เดือน</th>
                                    <th scope="col">บัตรผู้พิการ/เดือน</th>
                                    <th scope="col">เงินช่วยเหลือภัยพิบัติ/ปี</th>
                                    <th scope="col">เงินค่าประกันสินค้าเกษตร/ปี</th>
                                    <th scope="col">อื่นๆ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $key => $value) :?>
                                        <tr>
                                            <th scope="row"><?=$key+1;?></th>
                                            <td>
                                                <a class="text-info" onclick="addIncome(<?=$value['person_id'];?>)" style="cursor: pointer;"><?=$value['person_name'].' '.$value['person_lastname'];?></a>
                                            </td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                            
                                        </tr>
                                    <?php endforeach;?>
                                  

                                </tbody>
                            </table>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="IncomeModal">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=base_url('house/save_income/'.@$house_id);?>" method="post">
            <input type="hidden" name="interview_id" id="interview_id">
            <input type="hidden" name="person_id" id="person_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลด้านรายได้จากสวัสดิการ</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p>ชาญชัย วหคชลชี</p>
                        </div>
                    </div>
                    <div class="row">                               
                        <div class="form-group col-md-6">
                            <label>เงินผู้สูงอายุ/เดือน</label>                                        
                            <input type="text" class="form-control" name="income[1][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือน</label>
                            <select name="income[1][income_month]" id="income[1][income_month]" class="form-control">
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>บัตรประชารัฐ/เดือน</label>                                        
                            <input type="text" class="form-control" name="income[2][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือน</label>
                            <select name="income[2][income_month]" id="income[2][income_month]" class="form-control">
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>บุตรส่งเงิน</label>                                        
                            <input type="text" class="form-control" name="income[3][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือน</label>
                            <select name="income[3][income_month]" id="income[3][income_month]" class="form-control">
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>บัตรผู้พิการ/เดือน</label>                                        
                            <input type="text" class="form-control" name="income[4][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือน</label>
                            <select name="income[4][income_month]" id="income[4][income_month]" class="form-control">
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>เงินช่วยเหลือภัยพิบัติ/ปี</label>                                        
                            <input type="text" class="form-control" name="income[5][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" class="form-control" name="income[5][income_month]" value="1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>เงินค่าประกันสินค้าเกษตร/ปี</label>                                        
                            <input type="text" class="form-control" name="income[6][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="income[6][income_month]" value="1">
                        </div>
                        <div class="form-group col-md-6">
                            <label>อื่นๆ</label>                                        
                            <input type="text" class="form-control" name="income[7][income_value]">
                        </div>
                        <div class="form-group col-md-6">
                        <input type="hidden" class="form-control" name="income[7][income_month]" value="1">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="sumbit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?=$this->endSection()?>

<?=$this->section("scripts")?>

<script>
    function addIncome(id){
        $("#IncomeModal").modal();
    }
</script>
<?=$this->endSection()?>
  