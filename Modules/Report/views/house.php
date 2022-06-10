<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">              
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">รายงานแบบสอบถามครัวเรือน</h4>
                      
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-center w-100">
                            <div class="btn-group" role="group" aria-label="menu-nabbar">
                                <button type="button" class="btn <?=@$type == '1' || $type == '' ? 'btn-info':'btn-secondary' ?> mx-2" onclick="location.href='<?=base_url('report/house?interview_project='.@$search['interview_project']);?>';">ข้อมูลครัวเรือน</button>
                                <button type="button" class="btn <?=@$type == '2' ? 'btn-info':'btn-secondary' ?> mx-2" onclick="location.href='<?=base_url('report/house/2?interview_project='.@$search['interview_project']);?>';">ข้อมูลด้านอาชีพ</button>
                                <button type="button" class="btn <?=@$type == '3' ? 'btn-info':'btn-secondary' ?> mx-2" onclick="location.href='<?=base_url('report/house/3?interview_project='.@$search['interview_project']);?>';">การถือครองที่ดินของครัวเรือน</button>
                                <button type="button" class="btn <?=@$type == '4' ? 'btn-info':'btn-secondary' ?> mx-2" onclick="location.href='<?=base_url('report/house/4?interview_project='.@$search['interview_project']);?>';">การใช้ประโยชน์และผลผลิตของครัวเรือน</button>
                            </div>                          
                        </div>
                      
                        <hr>
                        <h5>ค้นหาข้อมูล</h5>
                        <div>
                            <form action="">
                                <div class="row d-flex justify-content-center w-100">                                                                 
                                    <div class="form-group col-md-4">                                    
                                        <label>โครงการ</label>                                       
                                        <select name="interview_project" id="interview_project" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Description'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>                                   
                                                                     
                                </div>
                                <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-info">ค้นหา</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location.replace('<?=site_url('report/house');?>');">ล้างค่า</button>
                                    <button type="button" class="btn btn-primary" onclick="generateExcel()">Export Excel</button>
                                </div>  
                            </form>
                        </div>
                    
                        
                        <br>
                        <?php if ($type == '1' || $type == ''):?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_with_data">
                                    <thead class="bg-info">
                                        <tr>
                                        <th colspan="17" class="text-center">ข้อมูลรายครัวเรือน</th>
                                        </tr>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>พื้นที่</th>
                                            <th>บ้าน</th>
                                            <th>บ้านเลขที่</th>
                                            <th>หมู่ที่</th>
                                            <th>ต.</th>
                                            <th>อ.</th>
                                            <th>จ.</th>
                                            <th>จำนวนคนในครัวเรือน</th>
                                            <th>ใช้เพื่อการอุปโภค / บริโภคจากแหล่งใด</th>
                                            <th>ข้อมูลด้านการออมของครัวเรือน</th>
                                            <th>ข้อมูลด้านรายได้ของครัวเรือน</th>                                            
                                            <th>ข้อมูลด้านรายจ่ายของครัวเรือน</th>
                                            <th>เปรียบเทียบรายได้</th>
                                            <th>การเป็นสมาชิกกลุ่มของครัวเรือน</th>
                                            <th>ข้อเสนอแนะ</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)):?>
                                            <?php foreach ($data as $key => $value) :?>
                                            <tr>
                                                <td><?=$key+1;?></td>
                                                <td><?=$value['area'];?></td>
                                                <td><?=$value['house_moo_name'];?></td>
                                                <td><?=$value['house_number'];?></td>
                                                <td><?=$value['house_moo'];?></td>
                                                <td><?=$value['tam_name_t'];?></td>
                                                <td><?=$value['amp_name_t'];?></td>
                                                <td><?=$value['pro_name_t'];?></td>
                                                <td class="text-center"><?=$value['person_count'];?></td>
                                                <td></td>
                                                <td></td>
                                                <td><?=$value['income_value'];?></td>
                                                <td><?=$value['outcome_value'];?></td>
                                                <td><?=$value['income_value'] - $value['outcome_value'];?></td>
                                                
                                                

                                            </tr>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <!-- <tr>
                                                <td colspan="18" class="text-center">ไม่พบข้อมูล</td>
                                            </tr> -->
                                            <tr>
                                                <td>1</td>
                                                <td>แม่สามแลบ</td>
                                                <td>ชิวาเดอร์</td>
                                                <td>0/89</td>
                                                <td>3</td>
                                                <td>แม่สามแลบ</td>
                                                <td>สบเมย</td>
                                                <td>แม่ฮ่องสอน</td>
                                                <td>3</td>
                                                <td>ประปาหมู่บ้าน</td>
                                                <td>500</td>
                                                <td>50000</td>
                                                <td>5350</td>
                                                <td>44650</td>
                                                <td></td>
                                                <td></td>
                                            </tr>  
                                        <?php endif;?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($type == '2'):?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_with_data">
                                    <thead class="bg-info">
                                        <tr>
                                        <th colspan="17" class="text-center">ข้อมูลรายครัวเรือน (อาชีพ)</th>
                                        </tr>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>พื้นที่</th>
                                            <th>บ้าน</th>
                                            <th>บ้านเลขที่</th>
                                            <th>หมู่ที่</th>
                                            <th>ต.</th>
                                            <th>อ.</th>
                                            <th>จ.</th>
                                            <th>ชื่อ-สกุล</th>
                                            <th>บัตรประชาชน</th>
                                            <th>อาชีพหลัก</th>
                                            <th>อาชีพรอง</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)):?>
                                            <?php foreach ($data as $key => $value) :?>
                                            <tr>
                                                <td><?=$key+1;?></td>
                                                <td><?=$value['area'];?></td>
                                                <td><?=$value['house_moo_name'];?></td>
                                                <td><?=$value['house_number'];?></td>
                                                <td><?=$value['house_moo'];?></td>
                                                <td><?=$value['tam_name_t'];?></td>
                                                <td><?=$value['amp_name_t'];?></td>
                                                <td><?=$value['pro_name_t'];?></td>
                                                <td><?=$value['person_name'];?></td>
                                                <td><?=$value['person_number'];?></td>
                                                <td><?=$value['job_main'];?></td>
                                                <td><?=$value['job_second'];?></td>
                                                

                                            </tr>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <!-- <tr>
                                                <td colspan="18" class="text-center">ไม่พบข้อมูล</td>
                                            </tr> -->
                                            <tr>
                                                <td>1</td>
                                                <td>วังไผ่</td>
                                                <td>วังไผ่</td>
                                                <td>43</td>
                                                <td>8</td>
                                                <td>น่าไร่หลวง</td>
                                                <td>สองแคว</td>
                                                <td>แม่ฮ่องสอน</td>                                                
                                                <td>นายเกาออน แซ่จ๋าว</td>
                                                <td>8560674000572</td>
                                                <td>ไม่ระบุ</td>
                                                <td>ทำไร่</td>                                              
                                            </tr>  
                                        <?php endif;?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($type == '3'):?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_with_data">
                                    <thead class="bg-info">
                                        <tr>
                                        <th colspan="17" class="text-center">การถือครองที่ดินของครัวเรือน</th>
                                        </tr>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>พื้นที่</th>
                                            <th>บ้าน</th>
                                            <th>บ้านเลขที่</th>
                                            <th>หมู่ที่</th>
                                            <th>ต.</th>
                                            <th>อ.</th>
                                            <th>จ.</th>
                                            <th>เลขที่แปลง</th>
                                            <th>พื้นที่ (ไร่)</th>
                                            <th>การใช้ประโยชน์ที่ดิน</th>
                                            <th>สิทธิถือครอง</th>
                                            <th>แหล่งน้ำที่ใช้ในการเกษตร</th>
                                            <th>ลักษณะการถือครอง</th>
                                            <th>พื้นที่ตั้ง</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)):?>
                                            <?php foreach ($data as $key => $value) :?>
                                            <tr>
                                                <td><?=$key+1;?></td>
                                                <td><?=$value['area'];?></td>
                                                <td><?=$value['house_moo_name'];?></td>
                                                <td><?=$value['house_number'];?></td>
                                                <td><?=$value['house_moo'];?></td>
                                                <td><?=$value['tam_name_t'];?></td>
                                                <td><?=$value['amp_name_t'];?></td>
                                                <td><?=$value['pro_name_t'];?></td>
                                                <td><?=$value['land_number'];?></td>
                                                <td><?=$value['land_area'];?></td>
                                                <td><?=$value['landuse'];?></td>
                                                <td><?=$value['land_holding'];?></td>
                                                <td><?=$value['land_resource'];?></td>
                                                
                                                
                                            </tr>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <!-- <tr>
                                                <td colspan="18" class="text-center">ไม่พบข้อมูล</td>
                                            </tr> -->
                                            <tr>
                                                <td>1</td>
                                                <td>วารี</td>
                                                <td>ดอยช้าง</td>
                                                <td></td>
                                                <td>27</td>
                                                <td>วารี</td>
                                                <td>แม่สรวย</td>
                                                <td>เชียงราย</td>
                                                <td></td>
                                                <td>7</td>
                                                <td>ไม้ผล</td>
                                                <td>ไม่มีเอกสารสิทธิ์</td>
                                                <td>ของตนเอง</td>
                                                <td>แหล่งน้ำธรรมชาติ</td>
                                                <td>นอกเขตป่า</td>
                                            </tr>   
                                        <?php endif;?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        <?php elseif($type == '4'):?>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table_with_data">
                                    <thead class="bg-info">
                                        <tr>
                                        <th colspan="17" class="text-center">การใช้ประโยชน์และผลผลิตของครัวเรือน</th>
                                        </tr>
                                        <tr>
                                            <th>ลำดับ</th>
                                            <th>พื้นที่</th>
                                            <th>บ้าน</th>
                                            <th>บ้านเลขที่</th>
                                            <th>หมู่ที่</th>
                                            <th>ต.</th>
                                            <th>อ.</th>
                                            <th>จ.</th>
                                            <th>เลขที่แปลง</th>
                                            <th>ชนิดผลผลิต</th>
                                            <th>พันธุ์</th>
                                            <th>มูลค่ารวม (บาท)</th>
                                            <th>ช่องทางตลาด</th>
                                            <th>การรับรอง GAP/อินทรีย์</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(!empty($data)):?>
                                            <?php foreach ($data as $key => $value) :?>
                                            <tr>
                                                <td><?=$key+1;?></td>
                                                <td><?=$value['area'];?></td>
                                                <td><?=$value['house_moo_name'];?></td>
                                                <td><?=$value['house_number'];?></td>
                                                <td><?=$value['house_moo'];?></td>
                                                <td><?=$value['tam_name_t'];?></td>
                                                <td><?=$value['amp_name_t'];?></td>
                                                <td><?=$value['pro_name_t'];?></td>
                                                <td><?=$value['land_number'];?></td>
                                                <td><?=$value['product_type'];?></td>
                                                <td><?=$value['product_name'];?></td>
                                                <td class="text-right"><?=number_format($value['product_value']);?></td>
                                                <td><?=$value['markets'];?></td>
                                                
                                                
                                            </tr>
                                            <?php endforeach;?>
                                        <?php else:?>
                                            <tr>
                                                <td>1</td>
                                                <td>แม่จริม</td>
                                                <td>ตองเจริญราษฏร์</td>
                                                <td>1</td>
                                                <td>6</td>
                                                <td>แม่จริม</td>
                                                <td>แม่จริม</td>
                                                <td>น่าน</td>
                                                <td></td>
                                                <td>ข้าวไร่</td>
                                                <td></td>
                                                <td>24000</td>
                                                <td>บริโภค</td>
                                                <td>ไม่ได้รับการรับรอง</td>
                                            </tr>                                            
                                            <!-- <tr>
                                                <td colspan="18" class="text-center">ไม่พบข้อมูล</td>
                                            </tr> -->
                                        <?php endif;?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        <?php endif;?>
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

<!-- //load select2 ajax/ -->
<?= script_tag('public/assets/js/modules/ajax_select2.js') ?>


<?= script_tag('public/assets/tableExport/libs/FileSaver/FileSaver.min.js') ?>
<?= script_tag('public/assets/tableExport/libs/js-xlsx/xlsx.core.min.js') ?>
<?= script_tag('public/assets/tableExport/tableExport.min.js') ?>

<script>
    function generateExcel() {
        //getting data from our table
        $('#table_with_data').tableExport({fileName: 'export-house',
            type: 'xlsx'
        });
    }
</script>

<?=$this->endSection()?>
  

