
<div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลการใช้ที่ดิน</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">                               
                        <div class="form-group col-md-3">
                            <label>การใช้ประโยชน์ที่ดิน</label>     
                            <input type="hidden" name="detail_use_type">                                   
                            <select name="detail_use" id="detail_use" class="form-control select2"  required="">
                                <option value="">เลือก</option>
                                <?php foreach ($landuse as $key => $value) :?>
                                    <option <?=@$result['data']['detail_use'] == $value['landuse_id'] ? 'selected':'';?> value="<?=$value['landuse_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>              
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกการใช้ประโยชน์ที่ดิน
                            </div>  
                        </div>
                        <div class="form-group col-md-3">
                            <label>พันธุ์</label>
                            <select name="detail_type" id="detail_type" class="form-control select2" required="">
                                <option value="">เลือก</option>       
                                <?php foreach ($products as $key => $value) :?>
                                    <option <?=@$result['data']['detail_type'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?>                                                               
                            </select>    
                            <div class="invalid-feedback">
                                กรุณาเลือกพันธุ์
                            </div>                    
                        </div>                      
                        <div class="form-group col-md-3">
                            <label>อายุ (ปี)</label>                                        
                            <input type="text" class="form-control" name="detail_age" value="<?=@$result['data']['detail_age'];?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>พื้นที่ปลูก (ไร่)</label>                                        
                            <input type="text" class="form-control" name="detail_area" value="<?=@$result['data']['detail_area'];?>" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>ช่วงเวลาปลูก</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_start_date" value="<?=@$result['data']['detail_start_date'];?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_finish_date" value="<?=@$result['data']['detail_finish_date'];?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ช่วงเวลาเก็บเกี่ยว</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_keep_start_date" value="<?=@$result['data']['detail_keep_start_date'];?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_keep_finish_date" value="<?=@$result['data']['detail_keep_finish_date'];?>">
                        </div>
                    </div>
                    <p>เมล็ด/กล้าพันธุ์</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>จำนวน</label>                                        
                            <input type="text" class="form-control" name="seed_value" value="<?=@$result['data']['seed_value'];?>" required="">
                            <div class="invalid-feedback">
                                กรุณาระบุจำนวน
                            </div>    
                        </div>
                        <div class="form-group col-md-3">
                            <label>หน่วยนับ</label>                                                                    
                            <select name="seed_unit" id="seed_unit" class="form-control" required="">
                                <option value="">เลือก</option>                                
                                <?php foreach ($units as $key => $value) :?>
                                    <option <?=@$result['data']['seed_unit'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?> 
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกหน่วยนับ
                            </div>    
                        </div>
                        <div class="form-group col-md-3">
                            <label>ราคาต่อหน่วย (บาท)</label>                                        
                            <input type="text" class="form-control" name="cost_seed" value="<?=@$result['data']['cost_seed'];?>" required="">
                            <div class="invalid-feedback">
                                กรุณาระบุราคาต่อหน่วย
                            </div> 
                            
                        </div>
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="detail_hrdi1" name="detail_hrdi" value="1" <?=@$result['data']['detail_hrdi'] == '1' ?'checked':"";?>"  >
                                        <label class="form-check-label" for="detail_hrdi1">
                                        การส่งเสริมจากสถาบันฯ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="detail_hrdi2" name="detail_hrdi" value="2" <?=@$result['data']['detail_hrdi'] == '2' ?'checked':"";?>">
                                        <label class="form-check-label" for="detail_hrdi2">
                                        เก็บผลผลิต
                                        </label>
                                    </div>
                                </div>
                            </div>                                             
                        </div>
                    </div>

                    <!-- //multi form -->
                    <h5>รายจ่าย/รอบการปลูก</h5>
                    <p>ปุ๋ย</p>
                    <div class="row repeater-dressing">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ยี่ห้อปุ๋ย</th>
                                        <th width="10%">สูตรปุ๋ย</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="dressing">
                                    <?php if (empty($result['dressing'])):?>
                                        <tr data-repeater-item>
                                            <td>
                                                1
                                                <input type="hidden" name="rec_id">
                                            </td>
                                            <td>                                            
                                                <select name="product_branch" id="product_branch" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($chemical as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_branch_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุยี่ห้อปุ๋ย
                                                </div>    
                                            </td>
                                            <td >                                            
                                                <select name="product_type" id="product_type" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    
                                                    <?php foreach ($chemical_formula as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?>                                          
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุสูตรปุ๋ย
                                                </div>  
                                            </td>
                                           
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>  
                                            </td>
                                            <td>                                            
                                                <select name="product_unit"  class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_unit_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วย
                                                </div>  
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>  
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                    <?php else:?>
                                        <?php foreach ($result['dressing'] as $key => $product) :?>
                                            <tr data-repeater-item>
                                            <td>
                                                <?=$key+1;?>
                                                <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                            </td>
                                          
                                            <td>                                            
                                                <select name="product_branch" id="product_branch" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($chemical as $key => $value) :?>
                                                        <option <?=$product['product_branch'] == $value['Code']? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_branch_label" value="<?=@$value['product_branch_label'];?>">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุยี่ห้อปุ๋ย
                                                </div>    
                                            </td>
                                            <td>                                            
                                                <select name="product_type" id="product_type" class="form-control " onchange="selecttype($(this))" required="">
                                                    <option value=""></option>                                                    
                                                    <?php foreach ($chemical_formula as $key => $value) :?>
                                                        <option <?=$product['product_type'] == $value['Code']? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?>                                          
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label" value="<?=@$value['product_type_label'];?>">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุสูตรปุ๋ย
                                                </div>  
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" value="<?=$product['product_value'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div> 
                                            </td>
                                            <td>                                            
                                                <select name="product_unit"  class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                        <option <?=$product['product_unit'] == $value['Code']? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_unit_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วย
                                                </div>  
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" value="<?=$product['product_price'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <p>ยา</p>
                    <div class="row repeater-drug">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ประเภท</th>
                                        <th width="10%">ยี่ห้อ</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm"  type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="drug">
                                <?php if (empty($result['drug'])):?>
                                    <tr data-repeater-item>
                                        <td>1
                                        <input type="hidden" name="rec_id">
                                        </td>
                                        <td>                                            
                                            <select name="product_type" id="product_type" class="form-control"  onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($medical_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                            <input class="label_type" type="hidden" name="product_type_label">
                                            <div class="invalid-feedback">
                                                    กรุณาเลือกประเภท
                                                </div>
                                        </td>
                                        <td>                                            
                                            <select name="product_branch" id="product_branch" class="form-control"  onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($medical as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                            <input class="label_type" type="hidden" name="product_branch_label">
                                            <div class="invalid-feedback">
                                                    กรุณาเลือกยี่ห้อ
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>
                                        </td>
                                        <td>                                            
                                            <select name="product_unit" id="" class="form-control"  onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($units as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?>                                             
                                            </select>
                                            <input class="label_type" type="hidden" name="product_unit_label">
                                            <div class="invalid-feedback">
                                                กรุณาเลือหน่วย
                                            </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                กรุณาระบุราคา
                                            </div>
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                <?php else:?>
                                    <?php foreach ($result['drug'] as $key => $product) :?>
                                        <tr data-repeater-item>
                                        <td>1
                                            <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                        </td>
                                        <td>                                            
                                            <select name="product_type" id="product_type" class="form-control"  onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($medical_type as $key => $value) :?>
                                                    <option <?=$product['product_type'] == $value['Code'] ?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                            <input class="label_type" type="hidden" name="product_type_label">
                                            <div class="invalid-feedback">
                                                    กรุณาเลือกประเภท
                                                </div>
                                        </td>
                                        <td>                                            
                                            <select name="product_branch" id="product_branch" class="form-control"  onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($medical as $key => $value) :?>
                                                    <option <?=$product['product_branch'] == $value['Code'] ?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                            <input class="label_type" type="hidden" name="product_branch_label">
                                            <div class="invalid-feedback">
                                                    กรุณาเลือกยี่ห้อ
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control" value="<?=$product['product_value'];?>" required="">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>
                                        </td>
                                        <td>                                            
                                            <select name="product_unit" id="" class="form-control"  onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($units as $key => $value) :?>
                                                    <option <?=$product['product_unit'] == $value['Code'] ?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?>                                             
                                            </select>
                                            <input class="label_type" type="hidden" name="product_unit_label">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุหน่วย
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control" value="<?=$product['product_price'];?>" required="">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>ฮอร์โมน</p>
                    <div class="row repeater-hormone">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>                                        
                                        <th width="20%">ยี่ห้อ</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="hormone">
                                <?php if (empty($result['hormone'])):?>
                                        <tr data-repeater-item>
                                            <td>1
                                            <input type="hidden" name="rec_id">
                                            </td>
                                            <td>                                            
                                                <select name="product_type" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($hormone as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label">
                                                <div class="invalid-feedback">
                                                    กรุณาเลือกยี่ห้อ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>
                                            </td>
                                            <td>                                            
                                                <select name="product_unit" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_unit_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วยนับ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                <?php else:?>
                                    <?php foreach ($result['hormone'] as $key => $product) :?>
                                        <tr data-repeater-item>
                                            <td>1
                                            <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                            </td>
                                            <td>                                            
                                                <select name="product_type" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($hormone as $key => $value) :?>
                                                        <option <?=$product['product_type'] == $value['Code'] ?"selected":'' ;?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุยี่ห้อ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" value="<?=$product['product_value'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>
                                            </td>
                                            <td>                                            
                                                <select name="product_unit" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                        <option <?=$product['product_unit'] == $value['Code'] ?"selected":'' ;?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_unit_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วยนับ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" value="<?=$product['product_price'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>แรงงาน</p>
                    <div class="row repeater-staff">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ลักษณะการจ้าง</th>
                                        <th width="10%">การจ้างแรงงาน</th>
                                        <th width="10%">จำนวนคน</th>
                                        <th width="10%">จำนวนวันจ้าง</th>
                                        <th width="10%">บาท/วัน</th>
                                        <th width="10%">ค่าจ้างรวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="staff">
                                <?php if (empty($result['staff'])):?>
                                    <tr data-repeater-item>
                                        <td>1
                                        <input type="hidden" name="rec_id">
                                        </td>
                                        <td>                                            
                                            <select name="product_type"  class="form-control" onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                 <?php foreach ($employ_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                            <input class="label_type" type="hidden" name="product_type_label">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุลักษณะการจ้าง
                                                </div>
                                        </td>
                                        <td>                                            
                                            <select name="product_branch" class="form-control" onchange="selecttype($(this))" required="">
                                                <option value=""></option>
                                                <?php foreach ($labor_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                            <input class="label_type" type="hidden" name="product_branch_label">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุการจ้างแรงงาน
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุจำนวนคน
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_unit" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุวันจ้าง
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control" required="">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุบาท/วัน
                                                </div>
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                <?php else:?>
                                    <?php foreach ($result['staff'] as $key => $product) :?>
                                        <tr data-repeater-item>
                                            <td>1
                                            <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                            </td>
                                            <td>                                            
                                                <select name="product_type"  class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($employ_type as $key => $value) :?>
                                                        <option  <?=$product['product_type'] == $value['Code'] ? 'selected':'' ;?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุลักษณะการจ้าง
                                                </div>
                                            </td>
                                            <td>                                            
                                                <select name="product_branch" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($labor_type as $key => $value) :?>
                                                        <option <?=$product['product_branch'] == $value['Code'] ? 'selected':'' ;?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                                <input class="label_type" type="hidden" name="product_branch_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุการจ้างแรงงาน
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" value="<?=$product['product_value'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวนคน
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_unit" class="form-control" value="<?=$product['product_unit'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุวันจ้าง
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" value="<?=$product['product_price'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุบาท/วัน
                                                </div>
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>รายจ่ายอื่นๆ</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>น้ำมัน</label>                                        
                            <input type="text" class="form-control" name="cost_oil" value="<?=@$result['data']['cost_oil'];?>" >
                        </div>
                        <div class="form-group col-md-3">
                            <label>อื่นๆ</label>                                        
                            <input type="text" class="form-control" name="cost_other" value="<?=@$result['data']['cost_other'];?>">
                        </div>
                    </div>

                    <p>ผลผลิต</p>
                    <div class="row repeater-product">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ลักษณะการขาย</th>                                        
                                        <th width="10%">จำนวนการขาย</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">รวมรายได้(บาท)</th>
                                        <th width="10%">ตลาด</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="product">
                                    <?php if (empty($result['product'])):?>
                                        <tr data-repeater-item>
                                            <td>1
                                            <input type="hidden" name="rec_id" >
                                            </td>
                                            <td>                                            
                                                <select name="product_type" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <option value="1">ข้าวเปลือก</option>
                                                    <option value="2">ข้าวสาร</option>
                                                    <option value="3">เชอรี่</option>
                                                    <option value="4">กะลา</option>
                                                    <option value="5">แปรรูป</option>
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุลักษณะการขาย
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>
                                            </td>
                                            <td>                                                                                       
                                                <select name="product_unit" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                            <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                        <?php endforeach?>
                                                </select>
                                                <input class="label_type" type="hidden" name="product_unit_label">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วยนับ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>                                            
                                                <select name="product_market" id="product_market" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($markets as $key => $value) :?>
                                                            <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                        <?php endforeach?>
                                                    
                                                </select>
                                                <input class="label_type" type="hidden" name="product_market_label" >
                                                <div class="invalid-feedback">
                                                    กรุณาระบุตลาด
                                                </div>
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                    <?php else:?>
                                        <?php foreach ($result['product'] as $key => $product) :?>
                                            <tr data-repeater-item>
                                            <td>1
                                            <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                            </td>
                                            <td>                                            
                                                <select name="product_type" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <option <?=@$product['product_type'] == 1 ? 'selected':'';?> value="1">ข้าวเปลือก</option>
                                                    <option <?=@$product['product_type'] == 2 ? 'selected':'';?> value="2">ข้าวสาร</option>
                                                    <option <?=@$product['product_type'] == 3 ? 'selected':'';?> value="3">เชอรี่</option>
                                                    <option <?=@$product['product_type'] == 4 ? 'selected':'';?> value="4">กะลา</option>
                                                    <option <?=@$product['product_type'] == 5 ? 'selected':'';?> value="5">แปรรูป</option>
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label" value="<?=@$product['product_type_label'];?>">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุลักษณะการขาย
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control" value="<?=@$product['product_value'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>
                                            </td>
                                            <td>                                                                                       
                                                <select name="product_unit" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                            <option <?=@$product['product_unit'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                        <?php endforeach?>
                                                </select>
                                                <input class="label_type" type="hidden" name="product_unit_label" value="<?=@$product['product_unit_label'];?>">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วยนับ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control" value="<?=@$product['product_price'];?>" required="">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>                                            
                                                <select name="product_market" id="product_market" class="form-control" onchange="selecttype($(this))"  required="">
                                                    <option value=""></option>
                                                    <?php foreach ($markets as $key => $value) :?>
                                                            <option <?=@$product['product_market'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                        <?php endforeach?>
                                                    
                                                </select>
                                                <input class="label_type" type="hidden" name="product_market_label" value="<?=@$product['product_market_label'];?>">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุตลาด
                                                </div>
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>จำนวนบริโภค</label>                                        
                            <input type="text" class="form-control" name="detail_consume" value="<?=@$result['data']['detail_consume'];?>">
                        </div>
                        <div class="form-group col-md-3">
                            <label>หน่วยนับ</label>                                        
                            <select  class="form-control" name="detail_comsume_unit">
                                <option value=""></option>
                                <?php foreach ($units as $key => $value) :?>
                                    <option <?=@$result['data']['detail_comsume_unit'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?> 
                            </select>
                        </div>
                    </div>

                 
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="sumbit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>

                        
<script>
   function selecttype(element){
        var $option = element.find('option:selected');
        var value = $option.val();
        var text = $option.text();
        element.closest('td').find('.label_type').val(text)
   }
 
   $(function () {
        $(".select2").select2();
        $(".datepicker").datepicker({
            language: "th-th",
            format: "dd/mm/yyyy",
            autoclose: true,

            // daysOfWeekDisabled: [0, 6],
        });

        var $repeaterDressing = $('.repeater-dressing').repeater({
            initEmpty: false,
            defaultValues: {
                // 'family': '1'
            },

            show: function () {
                $(this).slideDown();
                // $('#myTable tr:last').remove();
                // if ($(".select2:last").length) {
                //     $(".select2").select2();
				// }
                
            },

            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                // $(".select2").select2();
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
             
            },
            isFirstItemUndeletable: false
        });

        var $repeaterDrug = $('.repeater-drug').repeater({
            initEmpty: false,
            defaultValues: {
                // 'family': '1'
            },

            show: function () {
                $(this).slideDown();
                // $('#myTable tr:last').remove();
                // if ($(".select2").length) {
                //     $(".select2").select2();
				// }
                
            },

            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
                // $(".select2").select2();
            },
            isFirstItemUndeletable: false
        });

        var $repeaterHormone = $('.repeater-hormone').repeater({
            initEmpty: false,
            defaultValues: {
                // 'family': '1'
            },

            show: function () {
                $(this).slideDown();
                // $('#myTable tr:last').remove();
                
            },

            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        });


        var $repeaterStaff = $('.repeater-staff').repeater({
            initEmpty: false,
            defaultValues: {
                // 'family': '1'
            },

            show: function () {
                $(this).slideDown();
                // $('#myTable tr:last').remove();
                
            },

            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        });

        var $repeaterProduct = $('.repeater-product').repeater({
            initEmpty: false,
            defaultValues: {
                // 'family': '1'
            },

            show: function () {
                $(this).slideDown();
                // $('#myTable tr:last').remove();
                
            },

            hide: function (deleteElement) {
                if(confirm('Are you sure you want to delete this element?')) {
                    $(this).slideUp(deleteElement);
                }
            },
            ready: function (setIndexes) {
                
                // console.log(setIndexes);
                // $dragAndDrop.on('drop', setIndexes);
            },
            isFirstItemUndeletable: false
        });





        $(".datepicker").datepicker({
            language: "th-th",
            format: "dd/mm/yyyy",
            autoclose: true,

            // daysOfWeekDisabled: [0, 6],
        });
    });
   
</script>