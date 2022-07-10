
<div class="row">
<div class="col-md-6">
    กรอกข้อมูลด้านอาชีพ : อาชีพเกษตร
</div>
<div class="col-md-6 text-right">
    <button type="button" class="btn btn-info" data-repeater-create id="job-add-detail" >เพิ่มข้อมูลการปลูกพืช</button><br/><br/>
</div>
<div class="col-md-12">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="5%" scope="col">ลำดับ</th>
                <th width="20%" scope="col">ประเภทพืชที่ปลูก</th>
                <th width="10%" scope="col">ชนิดพืชที่ปลูก</th>
                <th width="10%" scope="col">จำนวน</th>
                <th width="10%" scope="col">หน่วย</th>
                <th width="10%" scope="col">ต้นทุนบาท/ปี</th>
                <th width="10%" scope="col">รายได้บาท/ปี</th>
                <th width="10%" scope="col">หมายเหตุ</th>
            </tr>
        </thead>
        <tbody data-repeater-list="job-detail">
            <?php if (empty(!$data['detail'])):?>
                <?php foreach ($data['detail'] as $key => $item) :?>
                    <tr data-repeater-item>
                        <td class="key_data"><?=$key+1;?></td>
                        <td>
                            <input type="hidden" name="detail_id" value="<?=$item['detail_id'];?>">
                            <select name="type_group" id="type_group" class="form-control select2"  onchange="selectProduct($(this))">
                                <option value="">เลือก</option>
                                <?php foreach ($product_type as $key => $value) :?>
                                    <option <?=$item['type_group'] == $value['Code']?'selected':''?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?>              
                            </select> 
                        </td>
                        <td>       
                            <select name="type_id" id="type_id" class="form-control select2">
                                <option value="">เลือก</option>       
                                <?php foreach ($products as $key => $value) :?>
                                    <option <?=$item['type_id'] == $value['Code']?'selected':''?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                <?php endforeach?>                                                               
                            </select> 
                        </td>
                        <td> <input type="text" class="form-control" name="detail_value" oninput="validateDecimal(this)" value="<?=$item['detail_value'];?>" ></td>
                        <td>                                             
                            <select name="detail_unit" id="detail_unit" class="form-control">
                                <option value="">เลือก</option>
                                <option <?=$item['detail_unit'] == 'ไร่'?'selected':''?> value="ไร่">ไร่</option>
                                <option <?=$item['detail_unit'] == 'โรงเรือน'?'selected':''?> value="โรงเรือน">โรงเรือน</option>
                            </select>
                        </td>
                        <td> <input type="text" class="form-control" name="detail_cost" oninput="validateDecimal(this)" value="<?=$item['detail_cost'];?>"></td>
                        <td> <input type="text" class="form-control" name="detail_income" oninput="validateDecimal(this)" value="<?=$item['detail_income'];?>"></td>
                        <td> <input type="text" class="form-control" name="detail_remark" value="<?=$item['detail_remark'];?>"></td>
                    </tr>
                <?php endforeach;?>
            <?php else:?>
                <tr data-repeater-item>
                    <td class="key_data">1</td>
                    <td>       
                        <select name="type_group" id="type_group" class="form-control select2"  onchange="selectProduct($(this))">
                            <option value="">เลือก</option>
                            <?php foreach ($product_type as $key => $value) :?>
                                <option  value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                            <?php endforeach?>              
                        </select> 
                    </td>
                    <td>       
                        <select name="type_id" id="type_id" class="form-control select2">
                            <option value="">เลือก</option>       
                            <?php foreach ($products as $key => $value) :?>
                                <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                            <?php endforeach?>                                                               
                        </select> 
                    </td>
                    <td> <input type="text" class="form-control" name="detail_value" oninput="validateDecimal(this)"></td>
                    <td>                                             
                        <select name="detail_unit" id="detail_unit" class="form-control">
                            <option value="">เลือก</option>
                            <option value="ไร่">ไร่</option>
                            <option value="โรงเรือน">โรงเรือน</option>
                        </select>
                    </td>
                    <td> <input type="text" class="form-control" name="detail_cost" oninput="validateDecimal(this)"></td>
                    <td> <input type="text" class="form-control" name="detail_income" oninput="validateDecimal(this)"></td>
                    <td> <input type="text" class="form-control" name="detail_remark"></td>
                </tr>
            <?php endif;?>
            
        </tbody>
    </table>
</div>
</div>
<script>
    function selectProduct(elm){        
        var $option = elm.find('option:selected');
        var value = $option.val();
         $.ajax({
            type: "GET",
            url: domain+'common/get-product_type?group='+value,
            success : function(options){
                elm.parent().parent().find('#type_id').html(options)
            }
        });
    }

    $(document).ready(function () {
      
      // $(".select2-group").select2();
      var $repeater = $('.inner-repeater').repeater({
              initEmpty: false,
              isFirstItemUndeletable: false,
              // defaultValues: { 'text-input': 'outer-default' },
              show: function () {
                  $(this).slideDown(function(){
                      $(this).find('.select2').select2({
                          placeholder: ''
                      });
                  });
              },
              hide: function (deleteElement) {
                  console.log('outer delete');
                  $(this).slideUp(deleteElement);
              },
              ready: function (setIndexes) {
                  setTimeout(() => {
                      $('.select2').select2({
                          placeholder: ''
                      });
                  }, 1000);
              },
             
          });

      $("#job-add-detail").click(function () {
          $repeater.repeaterVal()["job-detail"].map(function (fields, row) {            
              // $('.select2-job').each(function(i, obj) {
            
              //     $( obj ).data('select2').destroy();
              // });
              
              $(".key_data:last").text(row+1);
              // $(".family_key:last").attr('data-id', (row));               
              // $(`input[name='group[${row}][family]']`).val((row))
              // $('[data-repeater-list]').empty();
              // $('[data-repeater-item]').slice(1).empty();
          });
      });

  });

</script>