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
                            <button type="button" class="btn btn-info" <?=@$house_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay_house/income/'.@$house_id);?>';">ข้อมูลรายได้</button>
                            <button type="button" class="btn btn-secondary" <?=@$house_id ? '':'disabled' ?>  onclick="location.href='<?=base_url('survay_house/outcome/'.@$house_id);?>';">ข้อมูลรายจ่าย</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลด้านรายได้จากสวัสดิการ</h6>
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th scope="col">ลำดับ</th>
                                        <th scope="col">ชื่อ-นามสกุล</th>
                                        <th scope="col">เงินผู้สูงอายุ</th>
                                        <th scope="col">บัตรประชารัฐ</th>
                                        <th scope="col">บุตรส่งเงิน</th>
                                        <th scope="col">บัตรผู้พิการ</th>
                                        <th scope="col">เงินช่วยเหลือภัยพิบัติ</th>
                                        <th scope="col">เงินค่าประกันสินค้าเกษตร</th>
                                        <th scope="col">อื่นๆ</th>
                                        <th scope="col">รวม</th>
                                        <th scope="col">เพิ่มข้อมูลรายได้</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $cout = 1;?>
                                    <?php foreach ($data as $key => $value) :?>
                                        <?php if (!empty($value['person_id'])):?>
                                            <?php 
                                                $val1 = @$value[1]['income_value'] * @$value[1]['income_month'];
                                                $val2 = @$value[2]['income_value'] * @$value[2]['income_month'];
                                                $val3 = @$value[3]['income_value'] * @$value[3]['income_month'];
                                                $val4 = @$value[4]['income_value'] * @$value[4]['income_month'];
                                                $val5 = @$value[5]['income_value'] * @$value[5]['income_month'];
                                                $val6 = @$value[6]['income_value'] * @$value[6]['income_month'];
                                                $val7 = @$value[7]['income_value'] * @$value[7]['income_month'];                                              
                                                $sum = $val1+$val2+$val3+$val4+$val5+$val6+$val7
                                    
                                            ?>
                                            <tr>
                                                <th scope="row"><?=$cout;?></th>
                                                <td>
                                                    <?=$value['person_name'].' '.$value['person_lastname'];?>
                                                </td>
                                                <td><?=@number_format($val1)?></td>
                                                <td><?=@number_format($val2);?></td>
                                                <td><?=@number_format($val3);?></td>
                                                <td><?=@number_format($val4);?></td>
                                                <td><?=@number_format($val5);?></td>
                                                <td><?=@number_format($val6);?></td>
                                                <td><?=@number_format($val7);?></td>
                                                <td><?=@number_format($sum);?></td>
                                                <td  class="text-center">                                                
                                                    <button  data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูล" onclick="addIncome(<?=$value['person_id'];?>)" class="btn btn-icon btn-info"><i class="fas fa-plus"></i></button>
                                                </td>
                                                
                                            </tr>
                                       
                                        <?php else:?>

                                            <tr>
                                                <th scope="row"><?=$cout;?></th>
                                                <td>
                                                    <?=$value['person_name'].' '.$value['person_lastname'];?>
                                                </td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>
                                                <td>-</td>     
                                                <td>-</td>  
                                                <td class="text-center">                                                    
                                                    <button  data-toggle="tooltip" data-placement="bottom" title="เพิ่มข้อมูล" onclick="addIncome(<?=$value['person_id'];?>)" class="btn btn-icon btn-info"><i class="fas fa-plus"></i></button>
                                                </td>                                              
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
                                <button type="button" class="btn btn-primary" onclick="location.href='<?=base_url('survay_house/outcome/'.@$house_id);?>';" >ถัดไป</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="IncomeModal">
    <div class="modal-dialog modal-lg" role="document">
        <form action="<?=base_url('survay_house/save_income/'.@$house_id);?>" method="post" class="needs-validation" novalidate="">
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
                            <p id="person_name">-</p>
                        </div>
                    </div>
                    <div class="row">                               
                        <div class="form-group col-md-6">
                            <label>เงินผู้สูงอายุ</label>                                        
                            <input type="text" class="form-control" name="income[1][income_value]" required="" oninput="validateDecimal(this)">
                            <div class="invalid-feedback">
                                กรุณากรอกเงินผู้สูงอายุ
                            </div>  
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[1][income_month]" id="income[1][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>บัตรประชารัฐ</label>                                        
                            <input type="text" class="form-control" name="income[2][income_value]" required="" oninput="validateDecimal(this)">
                            <div class="invalid-feedback">
                                กรุณากรอกบัตรประชารัฐ
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[2][income_month]" id="income[2][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>บุตรส่งเงิน</label>                                        
                            <input type="text" class="form-control" name="income[3][income_value]" required="" oninput="validateDecimal(this)">
                            <div class="invalid-feedback">
                                กรุณากรอกบุตรส่งเงิน
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[3][income_month]" id="income[3][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>บัตรผู้พิการ/เดือน</label>                                        
                            <input type="text" class="form-control" name="income[4][income_value]" oninput="validateDecimal(this)">

                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[4][income_month]" id="income[4][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>เงินช่วยเหลือภัยพิบัติ</label>                                        
                            <input type="text" class="form-control" name="income[5][income_value]" oninput="validateDecimal(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[5][income_month]" id="income[5][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>เงินค่าประกันสินค้าเกษตร</label>                                        
                            <input type="text" class="form-control" name="income[6][income_value]" oninput="validateDecimal(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[6][income_month]" id="income[6][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label>อื่นๆ</label>                                        
                            <input type="text" class="form-control" name="income[7][income_value]" oninput="validateDecimal(this)">
                        </div>
                        <div class="form-group col-md-6">
                            <label>จำนวนเดือนที่ได้รับ/เดือน</label>
                            <select name="income[7][income_month]" id="income[7][income_month]" class="form-control">
                                <option value="">เลือก</option>
                                <?php foreach ($month as $key => $value) :?>
                                    <option value="<?=$value;?>"><?=$value;?></option>
                                <?php endforeach;?>                                
                            </select>
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
    var validateDecimal = function(e) {
        var t = e.value;
        t = t.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');
        e.value = (t.indexOf(".") >= 0) ? (t.substr(0, t.indexOf(".")) + t.substr(t.indexOf("."), 3)) : t;
    }

    function addIncome(id){
        $("#person_id").val(id);

        $.ajax({
            type: "GET",
            url: domain+'house/load-income/'+id,
            success : function(response){
                const data = response.data
                
                data.forEach(async (val) => {
                    $("#person_name").text(val.person_name +' '+val.person_lastname)
                    $("input[name='income["+val.income_type+"][income_value]']").val(val.income_value)
                    $("select[name='income["+val.income_type+"][income_month]']").val(val.income_month)
                });
                // $("#item_modal").html(response)
            }
        });

        $("#IncomeModal").modal();
    }
</script>
<?=$this->endSection()?>
  