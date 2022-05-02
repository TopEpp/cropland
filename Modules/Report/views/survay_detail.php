<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">              
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">รายงานแบบสอบถามข้อมูลที่ดินรายแปลง</h4>
                      
                    </div>
                    <div class="card-body">
                       
                      
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="button" class="btn btn-primary">Export Excel</button>
                            </div>
                        </div>
                        
                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-info">
                                    <tr>
                                        <th rowspan="2" scope="col" width="200px">โครงการ</th>
                                        <th rowspan="2" scope="col">พื้นที่</th>
                                        <th rowspan="2" scope="col">กลุ่มบ้าน</th>
                                        <th rowspan="2" scope="col">รหัสแปลง</th>
                                        <th rowspan="2" scope="col">ชื่อ-สกุล</th>
                                        <th rowspan="2" scope="col">ประเภทบัตร</th>
                                        <th rowspan="2" scope="col">บ้านเลขที่</th>
                                        <th rowspan="2" scope="col">กลุ่มบ้าน</th>
                                        <th rowspan="2" scope="col">หมู่ที่</th>
                                        <th rowspan="2" scope="col">ตำบล</th>
                                        <th rowspan="2" scope="col">อำเภอ</th>
                                        <th rowspan="2" scope="col">จังหวัด</th>
                                        <th  width="30%" colspan="10" scope="col" class="text-center">การใช้ประโยชน์ที่ดิน</th>
                                        <th  width="10%" colspan="8" scope="col" class="text-center">รายจ่าย (บาท)/รอบการปลูก</th>                                      
                                        <th  width="20%" colspan="6" scope="col" class="text-center">ผลผลิต/รอบการปลูก</th>                                
                                        <th rowspan="2">ตลาด</th>    
                                    </tr>
                                    <tr>
                                        <th>ประเภท</th>
                                        <th>ชนิด</th>
                                        <th>พันธุ์</th>
                                        <th>พื้นที่ปลูก (ไร่)</th>
                                        <th>อายุ(ปี)</th>
                                        <th>จำนวนปลูกต่อหน่วย</th>
                                        <th>หน่วยปลูก</th>
                                        <th>ช่วงเวลา ปลูก -เก็บเกี่ยว</th>
                                        <th>การส่งเสริมจากสถาบัน</th>
                                        <th>ได้รับผลผลิต</th>          
                                        

                                        <th>เมล็ด<br/>/กล้าพันธ์ุ</th>
                                        <th>ปุ๋ย</th>
                                        <th>ยา</th>
                                        <th>ฮอร์โมน</th>
                                        <th>แรงงาน</th>
                                        <th>น้ำมัน</th>
                                        <th>อื่นๆ</th>
                                        <th  class="text-center">รวมรายจ่าย<br/>(บาท/รอบ)</th>                      

                                        <th>ผลผลิต<br/>บริโภค</th>
                                        <th>หน่วย<br/>บริโภค</th>
                                        <th>ลักษณะการขาย</th>
                                        <th>ผลผลิต</th>
                                        <th>ราคาขายต่อหน่วย<br/>(บาท)</th>
                                        <th>รวมรายได้<br/>(บาท)</th>
                                                                                          
                                    </tr>
                                </thead>
                         
                                <tbody>
                                    <?php foreach ($data as $key => $interviews) :?>
                                        <?php foreach ($interviews as $key => $value) :?>
                                            <?php if (!empty($value)):?>
                                                <!-- แสดง รายการย่อย -->
                                                <?php if (count($value['product']) > 0):?>
                                                    <?php $cout = 0;?>
                                                   <?php foreach ($value['product'] as $key => $item):?>
                                                    
                                                        <?php 
                                                            $seed =$value['cost_seed'] * $value['seed_value'];
                                                            $sum_cost = $seed + $value['dressing'] + $value['drug']+ $value['hormone']+$value['staff']+$value['cost_oil']+$value['cost_other'];
                                                            $cout = $cout+1;
                                                        ?>    
                                                        <tr>
                                                                 <td> 
                                                                    <div style="width: 150px" ><?=$value['project_name'];?></div>
                                                                </td>
                                                                <td><?=$value['project_area'];?></td>
                                                                <td><?=$value['project_village'];?></td>
                                                                <td>
                                                                    <a href="<?=base_url('report/survay/'.$value['interview_code']);?>">
                                                                        <?=$value['interview_code'];?>
                                                                    </a>
                                                                </td>
                                                                <td><?=$value['person_name'];?></td>
                                                                <td></td>
                                                                <td><?=$value['house_number'];?></td>
                                                                <td><?=$value['house_label'];?></td>   
                                                                <td><?=$value['house_moo'];?></td>
                                                                <td><?=$value['tam_name_t'];?></td>
                                                                <td><?=$value['amp_name_t'];?></td>
                                                                <td><?=$value['pro_name_t'];?></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td><?=$value['product_name'];?></td>
                                                                <?php if ($cout > 1):?>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td></td>
                                                                <?php else:?>
                                                                    <td><?=$value['detail_area'];?></td>                                                                                                                
                                                                    <td><?=$value['detail_age'];?></td>
                                                                    <td><?=$value['seed_value'];?></td>
                                                                    <td><?=$value['seed_unit'];?></td>
                                                                    <td><?=$value['detail_start_date'];?></td>
                                                                    <td><?=$value['detail_hrdi'];?></td>
                                                                    <td><?=$value['detail_hrdi'];?></td>
                                                                    <td><?=$seed;?></td>
                                                                    <td><?=$value['dressing'];?></td>
                                                                    <td><?=$value['drug'];?></td>
                                                                    <td><?=$value['hormone'];?></td>
                                                                    <td><?=$value['staff'];?></td>
                                                                    <td><?=$value['cost_oil'];?></td>
                                                                    <td><?=$value['cost_other'];?></td>
                                                                    <td><?=$sum_cost;?></td> 
                                                                    <td><?=$value['detail_consume'];?></td>
                                                                    <td></td>
                                                                <?php endif;?>
                                                                
                                                                <td><?=$item['product_type'];?></td>
                                                                <td><?=$item['product_value'];?></td>
                                                                <td><?=$item['product_price'];?></td>
                                                                <td><?=$item['product_price'] * $item['product_value'];?></td>
                                                                <td><?=$item['product_market'];?></td>                                            
                                                                
                                                        </tr>
                                                   <?php endforeach;?>
                                                <?php else:?>
                                                    <?php 
                                                        $seed =$value['cost_seed'] * $value['seed_value'];
                                                        $sum_cost = $seed + $value['dressing'] + $value['drug']+ $value['hormone']+$value['staff']+$value['cost_oil']+$value['cost_other'];
                                                    ?>    
                                                    <tr>
                                                             <td> 
                                                                <div style="width: 150px" ><?=$value['project_name'];?></div>
                                                            </td>
                                                            <td><?=$value['project_area'];?></td>
                                                            <td><?=$value['project_village'];?></td>
                                                            <td>
                                                                <a href="<?=base_url('report/survay/'.$value['interview_code']);?>">
                                                                    <?=$value['interview_code'];?>
                                                                </a>
                                                            </td>
                                                            <td><?=$value['person_name'];?></td>
                                                            <td></td>
                                                            <td><?=$value['house_number'];?></td>
                                                            <td><?=$value['house_label'];?></td>   
                                                            <td><?=$value['house_moo'];?></td>
                                                            <td><?=$value['tam_name_t'];?></td>
                                                            <td><?=$value['amp_name_t'];?></td>
                                                            <td><?=$value['pro_name_t'];?></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><?=$value['product_name'];?></td>
                                                            <td><?=$value['detail_area'];?></td>                                                                                                                
                                                            <td><?=$value['detail_age'];?></td>
                                                            <td><?=$value['seed_value'];?></td>
                                                            <td><?=$value['seed_unit'];?></td>
                                                            <td><?=$value['detail_start_date'];?></td>
                                                            <td><?=$value['detail_hrdi'];?></td>
                                                            <td><?=$value['detail_hrdi'];?></td>
                                                            <td><?=$seed;?></td>
                                                            <td><?=$value['dressing'];?></td>
                                                            <td><?=$value['drug'];?></td>
                                                            <td><?=$value['hormone'];?></td>
                                                            <td><?=$value['staff'];?></td>
                                                            <td><?=$value['cost_oil'];?></td>
                                                            <td><?=$value['cost_other'];?></td>
                                                            <td><?=$sum_cost;?></td>  
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                             
                                                            
                                                    </tr>
                                                <?php endif;?>
                                            <?php endif;?>
                                        <?php endforeach;?>
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
<?=$this->endSection()?>

<?=$this->section("css")?>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<?=$this->endSection()?>
  