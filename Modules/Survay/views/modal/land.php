
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
                            <select name="detail_use" id="detail_use" class="form-control select2">
                                <option value="">เลือก</option>
                                <?php foreach ($landuse as $key => $value) :?>
                                    <option value="<?=$value['landuse_id'];?>"><?=$value['name'];?></option>
                                <?php endforeach?>              
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>พันธุ์</label>
                            <select name="detail_type" id="detail_type" class="form-control select2">
                                <option value="">เลือก</option>       
                                <?php foreach ($products as $key => $value) :?>
                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?>         
                                                      
                            </select>                      
                        </div>                      
                        <div class="form-group col-md-3">
                            <label>อายุ (ปี)</label>                                        
                            <input type="text" class="form-control" name="detail_age">
                        </div>
                        <div class="form-group col-md-3">
                            <label>พื้นที่ปลูก (ไร่)</label>                                        
                            <input type="text" class="form-control" name="">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ช่วงเวลาปลูก</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_finish_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>ช่วงเวลาเก็บเกี่ยว</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_keep_start_date">
                        </div>
                        <div class="form-group col-md-3">
                            <label>&nbsp;</label>                                        
                            <input type="text" class="form-control datepicker" name="detail_keep_finish_date">
                        </div>
                    </div>
                    <p>เมล็ด/กล้าพันธุ์</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>จำนวน</label>                                        
                            <input type="text" class="form-control" name="seed_value">
                        </div>
                        <div class="form-group col-md-3">
                            <label>หน่วยนับ</label>                                                                    
                            <select name="seed_unit" id="seed_unit" class="form-control">
                                <option value="">เลือก</option>                                
                                <?php foreach ($units as $key => $value) :?>
                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?> 
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label>ราคาต่อหน่วย (บาท)</label>                                        
                            <input type="text" class="form-control" name="cost_seed">
                        </div>
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="detail_hrdi1" name="detail_hrdi" value="1">
                                        <label class="form-check-label" for="detail_hrdi1">
                                        การส่งเสริมจากสถาบันฯ
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="detail_hrdi2" name="detail_hrdi" value="2">
                                        <label class="form-check-label" for="detail_hrdi2">
                                        ไม่รับผลผลิต
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
                                        <th width="10%">ประเภท</th>
                                        <th width="10%">ยี่ห้อ</th>
                                        <th width="10%">จำนวน</th>
                                        <th width="10%">หน่วยนับ</th>
                                        <th width="10%">ราคาต่อหน่วย</th>
                                        <th width="10%">ราคารวม</th>
                                        <th width="10%"><button class="btn btn-info btn-sm" type="button" data-repeater-create>เพิ่มข้อมูล</button></th>
                                        
                                    </tr>
                                </thead>
                                <tbody data-repeater-list="dressing">
                                    <tr data-repeater-item>
                                        <td>1</td>
                                        <td>                                            
                                            <select name="product_type" id="product_type" class="form-control ">
                                                <option value=""></option>
                                                 
                                                <?php foreach ($chemical_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?>                                          
                                            </select>
                                        </td>
                                        <td>                                            
                                            <select name="product_branch" id="product_branch" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($chemical as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control">
                                        </td>
                                        <td>                                            
                                            <select name="product_unit"  class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($units as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control">
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
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
                                <tr data-repeater-item>
                                        <td>1</td>
                                        <td>                                            
                                            <select name="product_type" id="product_type" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($medical_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                        </td>
                                        <td>                                            
                                            <select name="product_branch" id="product_branch" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($medical as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control">
                                        </td>
                                        <td>                                            
                                            <select name="product_unit" id="" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($units as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?>                                             
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control">
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
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
                                    <tr data-repeater-item>
                                            <td>1</td>
                                            <td>                                            
                                                <select name="" id="" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($hormone as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_value" class="form-control">
                                            </td>
                                            <td>                                            
                                                <select name="product_unit" id="" class="form-control">
                                                    <option value=""></option>
                                                    <?php foreach ($units as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?> 
                                                </select>
                                            </td>
                                            <td>                                            
                                                <input type="text" name="product_price" class="form-control">
                                            </td>
                                            <td>                                            
                                            -
                                            </td>
                                            <td>
                                                <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                            </td>
                                        </tr>
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
                                    <tr data-repeater-item>
                                        <td>1</td>
                                        <td>                                            
                                            <select name="product_type"  class="form-control">
                                                <option value=""></option>
                                                 <?php foreach ($employ_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                        </td>
                                        <td>                                            
                                            <select name="product_branch" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($labor_type as $key => $value) :?>
                                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach?> 
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control">
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_unit" class="form-control">
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control">
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <p>รายจ่ายอื่นๆ</p>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>น้ำมัน</label>                                        
                            <input type="text" class="form-control" name="cost_oil">
                        </div>
                        <div class="form-group col-md-3">
                            <label>อื่นๆ</label>                                        
                            <input type="text" class="form-control" name="cost_other">
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
                                    <tr data-repeater-item>
                                        <td>1</td>
                                        <td>                                            
                                            <select name="product_type" id="" class="form-control">
                                                <option value=""></option>
                                                <option value="1">ข้าวเปลือก</option>
                                                <option value="2">ข้าวสาร</option>
                                                <option value="3">เชอรี่</option>
                                                <option value="4">กะลา</option>
                                                <option value="5">แปรรูป</option>
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_value" class="form-control">
                                        </td>
                                        <td>                                                                                       
                                            <select name="product_unit" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($units as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?>
                                            </select>
                                        </td>
                                        <td>                                            
                                            <input type="text" name="product_price" class="form-control">
                                        </td>
                                        <td>                                            
                                           -
                                        </td>
                                        <td>                                            
                                            <select name="product_market" id="product_market" class="form-control">
                                                <option value=""></option>
                                                <?php foreach ($markets as $key => $value) :?>
                                                        <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                    <?php endforeach?>
                                                
                                            </select>
                                        </td>
                                        <td>
                                            <button data-repeater-delete class="btn btn-danger" type="button">ลบ</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label>จำนวนบริโภค</label>                                        
                            <input type="text" class="form-control" name="detail_consume">
                        </div>
                        <div class="form-group col-md-3">
                            <label>หน่วยนับ</label>                                        
                            <select  class="form-control" name="detail_comsume_unit">
                                <option value=""></option>
                                <?php foreach ($units as $key => $value) :?>
                                    <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
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