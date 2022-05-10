
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
                            
                            <select name="detail_use" id="detail_use" class="form-control select2"  required="" onchange="selectProductType($(this))">
                                <option value="">เลือก</option>
                                <?php foreach ($product_group as $key => $value) :?>
                                    <option <?=@$result['data']['detail_use'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?>              
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกการใช้ประโยชน์ที่ดิน
                            </div>  
                        </div>
                        <div class="form-group col-md-3">
                            <label>ประเภท</label>     
                            <select name="detail_use_type" id="detail_use_type" class="form-control select2"  required="" onchange="selectProduct($(this))">
                                <option value="">เลือก</option>
                                <?php foreach ($product_type as $key => $value) :?>
                                    <option <?=@$result['data']['detail_use_type'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?>              
                            </select>
                            <div class="invalid-feedback">
                                กรุณาเลือกประเภท
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
                    </div>
                    <div class="row">
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
                        <?php $detail_hrdi = @explode(',',$result['data']['detail_hrdi']);?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="detail_hrdi1" name="detail_hrdi[]" value="1" <?=@in_array("1", $detail_hrdi) ?'checked':''?>   >
                                        <label class="form-check-label" for="detail_hrdi1">
                                        การส่งเสริมจากสถาบันฯ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="detail_hrdi2" name="detail_hrdi[]" value="2" <?=@in_array("2", $detail_hrdi) ?'checked':''?> >
                                        <label class="form-check-label" for="detail_hrdi2">
                                        ได้รับผลผลิต
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
                            <table class="table table-bordered" id="tableDressing">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ยี่ห้อปุ๋ย</th>
                                        <th width="10%">สูตรปุ๋ย</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create id="add-dressing" >เพิ่มข้อมูล</button></th>                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="dressing">
                                    <?php if (empty($result['dressing'])):?>
                                        <tr data-repeater-item data-id="">
                                            <td>
                                                1
                                                <input type="hidden" name="rec_id">
                                            </td>
                                            <td>                                            
                                                <select name="product_branch" id="product_branch" class="form-control" onchange="selecttype($(this)); selectdressing($(this));" required="">
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
                                                <input type="text" name="product_value" class="form-control label_amount" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวน
                                                </div>  
                                            </td>
                                            <td>                                            
                                                <select name="product_unit"  class="form-control" onchange="selecttype($(this));" required="">
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
                                                <input type="text" name="product_price" class="form-control label_price" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>  
                                            </td>
                                            <td  class="text-center">                                            
                                                <p class="label_sum_price"></p>
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                    <?php else:?>
                                        <?php foreach ($result['dressing'] as $key => $product) :?>
                                            <tr data-repeater-item data-id="<?=$product['rec_id'];?>">
                                            <td>
                                                <?=$key+1;?>
                                                <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                            </td>
                                          
                                            <td>                                            
                                                <select name="product_branch" id="product_branch" class="form-control" onchange="selecttype($(this)); selectdressing($(this));" required="">
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
                                                <input type="text" name="product_value" class="form-control label_amount" value="<?=$product['product_value'];?>" required="" onchange="priceCal($(this))">
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
                                                <input type="text" name="product_price" class="form-control label_price" value="<?=$product['product_price'];?>" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td  class="text-center">                                            
                                              <p class="label_sum_price"><?= $product['product_value'] * $product['product_price'] ;?></p>
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
                            <table class="table table-bordered" id="tableDrug">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ประเภท</th>
                                        <th width="10%">ยี่ห้อ</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm"  type="button" data-repeater-create id="add-drug">เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="drug">
                                <?php if (empty($result['drug'])):?>
                                    <tr data-repeater-item data-id="">
                                        <td>1
                                        <input type="hidden" name="rec_id">
                                        </td>
                                        <td>                                            
                                            <select name="product_type" id="product_type" class="form-control"  onchange="selecttype($(this))" required="">                                                
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
                                            <input type="text" name="product_value" class="form-control label_amount" required="" onchange="priceCal($(this))">
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
                                            <input type="text" name="product_price" class="form-control label_price" required="" onchange="priceCal($(this))">
                                            <div class="invalid-feedback">
                                                กรุณาระบุราคา
                                            </div>
                                        </td>
                                        <td  class="text-center">                                             
                                           <p class="label_sum_price"></p>
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                <?php else:?>
                                    <?php foreach ($result['drug'] as $key => $product) :?>
                                        <tr data-repeater-item data-id="<?=$product['rec_id'];?>">
                                        <td>1
                                            <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                        </td>
                                        <td>                                            
                                            <select name="product_type" id="product_type" class="form-control"  onchange="selecttype($(this))" required="">
                                                <!-- <option value=""></option> -->
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
                                            <input type="text" name="product_value" class="form-control label_amount" value="<?=$product['product_value'];?>" required="" onchange="priceCal($(this))">
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
                                            <input type="text" name="product_price" class="form-control label_price" value="<?=$product['product_price'];?>" required="" onchange="priceCal($(this))">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                        </td>
                                        <td  class="text-center">                                             
                                            <p class="label_sum_price"><?= $product['product_value'] * $product['product_price'] ;?></p>
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
                            <table class="table table-bordered" id="tableHormone">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>                                        
                                        <th width="20%">ยี่ห้อ</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create id="add-hormone">เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="hormone">
                                <?php if (empty($result['hormone'])):?>
                                        <tr data-repeater-item data-id="">
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
                                                <input type="text" name="product_value" class="form-control label_amount" required="" onchange="priceCal($(this))">
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
                                                <input class="label_type" type="hidden" name="product_unit_label" >
                                                <div class="invalid-feedback">
                                                    กรุณาระบุหน่วยนับ
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control label_price" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td  class="text-center">                                            
                                                <p class="label_sum_price"></p>
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
                                <?php else:?>
                                    <?php foreach ($result['hormone'] as $key => $product) :?>
                                        <tr data-repeater-item  data-id="<?=$product['rec_id'];?>">
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
                                                <input type="text" name="product_value" class="form-control label_amount" value="<?=$product['product_value'];?>" required="" onchange="priceCal($(this))">
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
                                                <input type="text" name="product_price" class="form-control label_price" value="<?=$product['product_price'];?>" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td  class="text-center">                                             
                                                <p class="label_sum_price"><?= $product['product_value'] * $product['product_price'] ;?></p>
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
                            <table class="table table-bordered"  id="tableStaff">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ลักษณะการจ้าง</th>
                                        <th width="10%">การจ้างแรงงาน</th>
                                        <th width="10%">จำนวนคน</th>
                                        <th width="10%">จำนวนวันจ้าง</th>
                                        <th width="10%">บาท/วัน</th>
                                        <th width="10%">ค่าจ้างรวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create id="add-staff">เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="staff">
                                <?php if (empty($result['staff'])):?>
                                    <tr data-repeater-item data-id="">
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
                                            <input type="text" name="product_value" class="form-control label_staff" required="" onchange="priceCalStaff($(this))">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุจำนวนคน
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_unit" class="form-control label_day" required="" onchange="priceCalStaff($(this))">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุวันจ้าง
                                                </div>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control label_price" required="" onchange="priceCalStaff($(this))">
                                            <div class="invalid-feedback">
                                                    กรุณาระบุบาท/วัน
                                                </div>
                                        </td>
                                        <td  class="text-center">                                            
                                           <p class="label_sum_price"></p>
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                <?php else:?>
                                    <?php foreach ($result['staff'] as $key => $product) :?>
                                        <tr data-repeater-item  data-id="<?=$product['rec_id'];?>">
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
                                                <input type="text" name="product_value" class="form-control label_staff" value="<?=$product['product_value'];?>" required="" onchange="priceCalStaff($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุจำนวนคน
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_unit" class="form-control label_day" value="<?=$product['product_unit'];?>" required="" onchange="priceCalStaff($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุวันจ้าง
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control label_price" value="<?=$product['product_price'];?>" required="" onchange="priceCalStaff($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุบาท/วัน
                                                </div>
                                            </td>
                                            <td class="text-center">                                            
                                                <p class="label_sum_price">
                                                    <?=$product['product_unit'] * $product['product_price'] * $product['product_value'];?>
                                                </p>
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
                            <table class="table table-bordered" id="tableProduct">
                                <thead>
                                    <tr>
                                        <th width="5%">ลำดับ</th>
                                        <th width="10%">ลักษณะการขาย</th>                                        
                                        <th width="10%">จำนวนการขาย</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">รวมรายได้(บาท)</th>
                                        <th width="10%">ตลาด</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create id="add-product">เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="product">
                                    <?php if (empty($result['product'])):?>
                                        <tr data-repeater-item data-id="">
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
                                                <input type="text" name="product_value" class="form-control label_amount" required="" onchange="priceCal($(this))">
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
                                                <input type="text" name="product_price" class="form-control label_price" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td  class="text-center">                                             
                                                <p class="label_sum_price"></p>
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
                                            <tr data-repeater-item  data-id="<?=$product['rec_id'];?>">
                                            <td>1
                                            <input type="hidden" name="rec_id" value="<?=$product['rec_id'];?>">
                                            </td>
                                            <td>                                            
                                                <select name="product_type" id="" class="form-control" onchange="selecttype($(this))" required="">
                                                    <option value=""></option>
                                                    
                                                    <?php foreach ($product_sale as $key => $value) :?>
                                                            <option <?=@$product['product_type'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?>
                                                  
                                                </select>
                                                <input class="label_type" type="hidden" name="product_type_label" value="<?=@$product['product_type_label'];?>">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุลักษณะการขาย
                                                </div>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control label_amount" value="<?=@$product['product_value'];?>" required="" onchange="priceCal($(this))">
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
                                                <input type="text" name="product_price" class="form-control label_price" value="<?=@$product['product_price'];?>" required="" onchange="priceCal($(this))">
                                                <div class="invalid-feedback">
                                                    กรุณาระบุราคา
                                                </div>
                                            </td>
                                            <td  class="text-center">                                            
                                                <p class="label_sum_price">
                                                    <?=$product['product_price'] * $product['product_value'];?>
                                                </p>
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

function selectProductType(elm){
        var $option = elm.find('option:selected');
        var value = $option.val();
         $.ajax({
            type: "GET",
            url: domain+'common/get-product_type?group='+value,
            success : function(options){
                $("#detail_use_type").html(options)
            }
        });
    }

    function selectProduct(elm){
        var $option = elm.find('option:selected');
        var value = $option.val();
         $.ajax({
            type: "GET",
            url: domain+'common/get-product?type='+value,
            success : function(options){
                $("#detail_type").html(options)
            }
        });
    }

    function selectdressing(elm){
        var $option = elm.find('option:selected');
        var value = $option.val();
        $.ajax({
            type: "GET",
            url: domain+'common/get-dressing?id='+value,
            success : function(options){
                // if(options){
                //     $("#detail_type").html(options)
                // }
               
            }
        });
    }

   function selecttype(element){
        var $option = element.find('option:selected');
        var value = $option.val();
        var text = $option.text();
        element.closest('td').find('.label_type').val(text)
   }


   function priceCal(element){
       var amount = element.closest('tr').find('.label_amount').val()
       var price = element.closest('tr').find('.label_price').val()
       if (typeof amount !== "undefined" && typeof price !== "undefined"  ){
           var sum = amount * price;
           element.closest('tr').find('.label_sum_price').text(sum)
       }       
   }

   function priceCalStaff(element){
       var staff = element.closest('tr').find('.label_staff').val()
       var day = element.closest('tr').find('.label_day').val()
       var price = element.closest('tr').find('.label_price').val()
       if (typeof staff !== "undefined" && typeof price !== "undefined" && typeof day !== "undefined"  ){
           var sum = staff * price * day;
           element.closest('tr').find('.label_sum_price').text(sum)
       }       
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
                var id = $(this).attr("data-id");
                if (id !== ''){
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
                                    async: false,
                                    url: domain+'survay/delete_product/'+id,
                                    success : function(res){
                                        $(this).slideUp(deleteElement);
                                    }
                                });
                            } 
                    }); 
                }else{                    
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
                var id = $(this).attr("data-id");
                if (id !== ''){
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
                                    async: false,
                                    url: domain+'survay/delete_product/'+id,
                                    success : function(res){
                                        $(this).slideUp(deleteElement);
                                    }
                                });
                            } 
                    }); 
                }else{                    
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
                var id = $(this).attr("data-id");
                if (id !== ''){
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
                                    async: false,
                                    url: domain+'survay/delete_product/'+id,
                                    success : function(res){
                                        $(this).slideUp(deleteElement);
                                    }
                                });
                            } 
                    }); 
                }else{                    
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
                var id = $(this).attr("data-id");
                if (id !== ''){
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
                                    async: false,
                                    url: domain+'survay/delete_product/'+id,
                                    success : function(res){
                                        $(this).slideUp(deleteElement);
                                    }
                                });
                            } 
                    }); 
                }else{                    
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

                var id = $(this).attr("data-id");
                if (id !== ''){
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
                                    async: false,
                                    url: domain+'survay/delete_product/'+id,
                                    success : function(res){
                                        $(this).slideUp(deleteElement);
                                    }
                                });
                            } 
                    }); 
                }else{                    
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

        $("#add-dressing").click(function () {
			$repeaterDressing.repeaterVal()["dressing"].map(function (fields, row) {                
                $("#tableDressing tr").last().attr("data-id",'');              
			});
		});

        $("#add-drug").click(function () {
			$repeaterDrug.repeaterVal()["drug"].map(function (fields, row) {                
                $("#tableDrug tr").last().attr("data-id",'');              
			});
		});

        $("#add-hormone").click(function () {
			$repeaterHormone.repeaterVal()["hormone"].map(function (fields, row) {                
                $("#tableHormone tr").last().attr("data-id",'');              
			});
		});

        $("#add-staff").click(function () {
			$repeaterStaff.repeaterVal()["staff"].map(function (fields, row) {                
                $("#tableStaff tr").last().attr("data-id",'');              
			});
		});

        $("#add-product").click(function () {
			$repeaterProduct.repeaterVal()["product"].map(function (fields, row) {                
                $("#tableProduct tr").last().attr("data-id",'');              
			});
		});
    });
   
</script>