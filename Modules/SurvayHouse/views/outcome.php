<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<?php $month = [1,2,3,4,5,6,7,8,9,10,11,12];?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><a href="<?php echo base_url('survay_house')?>">ข้อมูลแบบสอบถามครัวเรือน</a> > จัดการข้อมูลครัวเรือน</h4>
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
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/jobs/'.@$house_id);?>';">ข้อมูลด้านอาชีพ</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/income/'.@$house_id);?>';">ข้อมูลรายได้</button>
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('survay_house/outcome/'.@$house_id);?>';">ข้อมูลรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านรายจ่าย</h6>
                            <table class="table table-bordered">
                                <thead  class="bg-info">
                                    <tr>
                                        <th rowspan="2" scope="col">ลำดับ</th>
                                        <th rowspan="2" scope="col">ชื่อ-นามสกุล</th>
                                        <th colspan="8" class="text-center" scope="col">รายจ่ายการอุปโภค</th>
                                        <th rowspan="2" scope="col">รายจ่ายในการบริโภค</th>
                                        <th rowspan="2" scope="col">หมายเหตุ</th>
                                    </tr>
                                    <tr>
                                        <th>ค่าเครื่องนุ่มห่ม</th>
                                        <th>ค่าที่อยู่อาศัย</th>
                                        <th>ค่าการศึกษา</th>
                                        <th>ค่ายารักษาโรค</th>
                                        <th>ค่าน้ำมัน</th>
                                        <th>ค่าเติมเงินมือถือ</th>
                                        <th>ค่าทำบุญ</th>
                                        <th>ค่าหวย/สุรา</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cout = 1;?>
                                    <?php foreach ($data as $key => $value) :?>
                                        <?php if (!empty($value['person_id'])):?>
                                            <tr>
                                                <th scope="row"><?=$cout;?></th>
                                                <td>
                                                    <a class="text-info" onclick="addOutcome(<?=$value['person_id'];?>)" style="cursor: pointer;"><?=$value['person_name'].' '.$value['person_lastname'];?></a>
                                                </td>
                                                <td><?=@$value[1]['outcome_value'] * @$value[1]['outcome_month'];?></td>
                                                <td><?=@$value[2]['outcome_value'] * @$value[2]['outcome_month'];;?></td>
                                                <td><?=@$value[3]['outcome_value'] * @$value[3]['outcome_month'];;?></td>
                                                <td><?=@$value[4]['outcome_value'] * @$value[4]['outcome_month'];;?></td>
                                                <td><?=@$value[5]['outcome_value'] * @$value[5]['outcome_month'];;?></td>
                                                <td><?=@$value[6]['outcome_value'] * @$value[6]['outcome_month'];;?></td>
                                                <td><?=@$value[7]['outcome_value'] * @$value[7]['outcome_month'];;?></td>
                                                <td><?=@$value[8]['outcome_value'] * @$value[8]['outcome_month'];;?></td>
                                                <td><?=@$value[9]['outcome_value'] * @$value[9]['outcome_month'];;?></td>
                                                <td><?=@$value[10]['outcome_value'] * @$value[10]['outcome_month'];;?></td>
                                            </tr>
                                        <?php else:?>
                                            <tr>
                                                <th scope="row"><?=$cout;?></th>
                                                <td>
                                                    <a class="text-info" onclick="addOutcome(<?=$value['person_id'];?>)" style="cursor: pointer;"><?=$value['person_name'].' '.$value['person_lastname'];?></a>
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                
                                            </tr>
                                        <?php endif;?>
                                        <?php $cout = $cout+1;?>
                                    <?php endforeach;?>

                                </tbody>
                            </table>
                          
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 text-right">                                                                      
                                <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay_house/income/'.@$house_id);?>';" >ย้อนกลับ</button>
                                <button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('survay_house/outcome/'.@$house_id);?>';" >ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" tabindex="-1" role="dialog" id="OutComeModal">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=base_url('survay_house/save_outcome/'.@$house_id);?>" method="post" class="needs-validation" novalidate="">
            <input type="hidden" name="interview_id" id="interview_id">
            <input type="hidden" name="person_id" id="person_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลด้านรายจ่าย</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <p id="person_name">-</p>
                        </div>
                    </div>
                    <div class="row">                               
                        <div class="form-group col-md-6">
                            <label>ค่าเครื่องนุ่งห่ม</label>                                        
                            <input type="text" class="form-control" name="outcome[1][outcome_value]" required="">
                            <div class="invalid-feedback">
                                กรุณากรอกค่าเครื่องนุ่งห่ม
                            </div> 
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[1][outcome_month]" id="outcome[1][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่าที่อยู่อาศัย</label>                                        
                            <input type="text" class="form-control" name="outcome[2][outcome_value]" required="">
                            <div class="invalid-feedback">
                                กรุณากรอกค่าที่อยู่อาศัย
                            </div> 
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[2][outcome_month]" id="outcome[2][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่าการศึกษา</label>                                        
                            <input type="text" class="form-control" name="outcome[3][outcome_value]" required="">
                            <div class="invalid-feedback">
                                กรุณากรอกค่าการศึกษา
                            </div> 
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[3][outcome_month]" id="outcome[3][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่ายารักษาโรค</label>                                        
                            <input type="text" class="form-control" name="outcome[4][outcome_value]" required="">
                            <div class="invalid-feedback">
                                กรุณากรอกค่ายารักษาโรค
                            </div> 
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[4][outcome_month]" id="outcome[4][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่าน้ำมัน</label>                                        
                            <input type="text" class="form-control" name="outcome[5][outcome_value]" required="">
                            <div class="invalid-feedback">
                                กรุณากรอกค่าน้ำมัน
                            </div> 
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[5][outcome_month]" id="outcome[5][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่าเติมเงินมือถือ</label>                                        
                            <input type="text" class="form-control" name="outcome[6][outcome_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[6][outcome_month]" id="outcome[6][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่าทำบุญ</label>                                        
                            <input type="text" class="form-control" name="outcome[7][outcome_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[7][outcome_month]" id="outcome[7][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>ค่าหวย/สุรา</label>                                        
                            <input type="text" class="form-control" name="outcome[8][outcome_value]">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[8][outcome_month]" id="outcome[8][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>รายจ่ายในการบริโภค</label>                                        
                            <input type="text" class="form-control" name="outcome[9][outcome_value]" required="">
                            <div class="invalid-feedback">
                                กรุณากรอกรายจ่ายในการบริโภค
                            </div>  
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ</label>
                            <select name="outcome[9][outcome_month]" id="outcome[9][outcome_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>หมายเหตุ</label>
                            <input type="text" class="form-control" name="outcome[10][outcome_value]">
                            <input type="hidden" class="form-control" name="outcome[10][outcome_month]" value="1">
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
    function addOutcome(id){
        $("#person_id").val(id)

        $.ajax({
            type: "GET",
            url: domain+'house/load-outcome/'+id,
            success : function(response){
                const data = response.data
                data.forEach(async (val) => {
                    $("#person_name").text(val.person_name +' '+val.person_lastname)
                    $("input[name='outcome["+val.outcome_type+"][outcome_value]']").val(val.outcome_value)
                    $("select[name='outcome["+val.outcome_type+"][outcome_month]']").val(val.outcome_month)
                });
                // $("#item_modal").html(response)
            }
        });

        $("#OutComeModal").modal();
    }
</script>
<?=$this->endSection()?>
  