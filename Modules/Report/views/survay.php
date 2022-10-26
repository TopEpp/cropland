<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>

<section class="section">
    <div class="section-body">
        <div class="row" style="margin-bottom:15px">
            <div class="col-md-12" style="text-align: center;">
                <a href="<?= base_url('survay');?>" class="btn btn-info" style="width: 240px;">ข้อมูลแบบสำรวจที่ดินรายแปลง</a>
                <a href="<?= base_url('dashboard/survay');?>" class="btn btn-info" style="width: 240px;">แดชบอร์ดแบบสำรวจที่ดินรายแปลง</a>
                <a href="<?= base_url('report/survay');?>" class="btn btn-info" style="width: 240px;">รายงานสรุปแบบสำรวจที่ดินรายแปลง</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">รายงานแบบสอบถามข้อมูลที่ดินรายแปลง</h4>

                    </div>
                    <div class="card-body">
                        <h5>ค้นหาข้อมูล</h5>
                        <div>
                            <form action="">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label>ปีสำรวจ</label>
                                        <select name="interview_year" id="interview_year" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach (getYear() as $key => $value) :?>
                                                <option <?=@$search['interview_year'] == $value ?'selected':''?> value="<?=$value;?>"><?=$value;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ลุ่มน้ำหลัก</label>
                                        <select name="interview_basin" id="interview_basin" class="form-control select2">
                                            <option value="">เลือก</option>
                                            <?php foreach ($basins as $key => $value) :?>
                                                <option <?=@$search['interview_basin'] == $value['Name']?'selected':'';?> value="<?=$value['Name'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ประเภทโครงการ</label>
                                        <select name="interview_type" id="interview_type" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects_type as $key => $value) :?>
                                                    <option <?=@$search['interview_type'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ชื่อโครงการ</label>
                                        <select name="interview_project" id="interview_project" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>
                                    <!-- <div class="form-group col-md-3">
                                        <label>กลุ่มบ้าน</label>
                                        <select name="interview_house_id" id="interview_house_id" class="form-control select2-ajax-house">
                                            <?php if(!empty($search['interview_house_id'])):?>
                                                <option value="<?=$search['interview_house_id'];?>"><?=$data_search['house']['Name']?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>ชื่อเจ้าของแปลง</label>
                                        <select name="interview_person_id" id="interview_person_id" class="form-control select2-ajax-person">
                                         <?php if(!empty($search['interview_person_id'])):?>
                                                <option value="<?=$search['interview_person_id'];?>"><?=$data_search['person']['person_name'].' '.$data_search['person']['person_lastname'];?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>รหัสแปลง</label>
                                        <select name="interview_code" id="interview_code" class="form-control select2-ajax-land">
                                            <?php if(!empty($search['interview_code'])):?>
                                                <option value="<?=$search['interview_code'];?>"><?=$data_search['land']['land_code']?></option>
                                            <?php else:?>
                                                <option value="">ทั้งหมด</option>
                                            <?php endif;?>
                                        </select>
                                    </div> -->
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">ค้นหา</button>
                                        <button type="button" class="btn btn-secondary" onclick="window.location.replace('<?=site_url('report/survay');?>');">ล้างค่า</button>
                                        <button type="button" class="btn btn-primary" onclick="generateExcel()">Export Excel</button>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="row">
                            <div class="col-md-2">จำนวนแปลง <?= count(array_count_values(array_column($data, 'land_code')));?> แปลง</div>
                            <div class="col-md-2">จำนวนเกษตรกร <?= count(array_count_values(array_column($data, 'person_id')));?> ราย</div>
                            <div class="col-md-2">พื้นที่แปลงรวม <?= array_sum(array_column($data, 'land_address'));?> ไร่</div>
                        </div>

                        <br>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="table_with_data">
                                <thead class="bg-info">
                                    <tr>
                                        <th scope="col">ลุ่มน้ำหลัก</th>
                                        <th scope="col">โครงการ</th>
                                        <th scope="col">พื้นที่</th>
                                        <th scope="col">กลุ่มบ้าน</th>
                                        <th scope="col">รหัสแปลง</th>
                                        <th scope="col">ชื่อ-สกุล</th>
                                        <th scope="col">ประเภทบัตร</th>
                                        <th scope="col">หมายเลขบัตร</th>
                                        <th scope="col">บ้านเลขที่</th>
                                        <th scope="col">กลุ่มบ้าน</th>
                                        <th scope="col">หมู่ที่</th>
                                        <th scope="col">ตำบล</th>
                                        <th scope="col">อำเภอ</th>
                                        <th scope="col">จังหวัด</th>
                                        <th scope="col">การใช้ประโยชน์ที่ดิน</th>
                                        <th scope="col">ปีสำรวจ</th>
                                        <th scope="col">พื้นที่แปลงรวม (ไร่)</th>
                                        <th scope="col">เอกสารสิทธิที่ดิน</th>
                                        <th scope="col">การใช้ประโยชน์</th>
                                        <th scope="col">การใช้ที่ดิน</th>
                                        <th scope="col">การวิเคราะห์ดินและน้ำ</th>
                                        <th scope="col">การสนับสนุนของ สวพส.</th>
                                        <th scope="col">การสนับสนุนของหน่วยงานอื่น</th>
                                        <th scope="col">ความต้องการ การสนับสนุนจากหน่วยงาน</th>
                                        <th scope="col">ปัญหาทางด้านการเกษตร 3 อันดับแรก</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($data)):?>
                                        <?php foreach ($data as $key => $value) :?>
                                            <tr>
                                                <td scope="row">
                                                    <div style="width: 100px" >
                                                        <?=@$value['BasinName'];?>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div style="width: 150px" ><?=@$value['project_name'];?></div>
                                                </td>
                                                <td>
                                                    <div style="width: 80px" ><?=@$value['project_area'];?></div>
                                                </td>
                                                <td>
                                                    <div style="width: 80px" ><?=$value['project_village'];?></div>
                                                </td>
                                                <td>
                                                    <div style="width: 50px" >
                                                        <a href="<?=base_url('report/survay/'.$value['interview_code']);?>">
                                                            <?=$value['land_code'];?>
                                                        </a>
                                                    </div>

                                                </td>
                                                <td><div style="width: 100px"><?=$value['person_name'];?></div></td>
                                                <td><div style="width: 100px"><?=house_person_type($value['person_type_number']);?></div></td>
                                                <td><div style="width: 110px"><?=$value['person_number'];?></div></td>
                                                <td><?=$value['house_number'];?></td>
                                                <td><div style="width: 100px"><?=$value['person_village'];?></div></td>
                                                <td><?=$value['house_moo'];?></td>
                                                <td><?=$value['tam_name_t'];?></td>
                                                <td><?=$value['amp_name_t'];?></td>
                                                <td><?=$value['pro_name_t'];?></td>
                                                <td><div style="width: 120px"><?=$value['land_detail'];?></div></td>
                                                <td><?=$value['interview_year'];?></td>
                                                <td><?=$value['land_address'];?></td>
                                                <td><?=$value['land_possess'];?></td>
                                                <td><div style="width: 100px"><?=utilization_type($value['interview_land_utilization_type']);?></div></td>
                                                <td><div style="width: 50px"><?=land_use_type($value['interview_land_use_type']);?></div></td>
                                                <td><div style="width: 50px"><?=land_water_process($value['intervew_land_water_process']);?></div></td>

                                                <td><div style="width: 100px"><?=$value['land_supports'];?></div></td>
                                                <td><div style="width: 100px"><?=$value['land_support_org'];?></div></td>
                                                <td><div style="width: 100px"><?=$value['land_needs'];?></div></td>
                                                <td><div style="width: 100px"><?=$value['land_problems'];?></div></td>



                                            </tr>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <tr>
                                            <td colspan="18" class="text-center">ไม่พบข้อมูล</td>
                                        </tr>
                                    <?php endif;?>

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

<!-- //load select2 ajax/ -->
<?= script_tag('public/assets/js/modules/ajax_select2.js') ?>


<?= script_tag('public/assets/tableExport/libs/FileSaver/FileSaver.min.js') ?>
<?= script_tag('public/assets/tableExport/libs/js-xlsx/xlsx.core.min.js') ?>
<?= script_tag('public/assets/tableExport/tableExport.min.js') ?>

<script>
    function generateExcel() {
        //getting data from our table
        $('#table_with_data').tableExport({fileName: 'export-survay',
            type: 'xlsx'
        });
    }

    $(function(){
        //search
        $("#interview_type").change(function(){
            var project_type = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-projects?project_type='+project_type,
                success : function(options){
                    $("#interview_project").html(options)
                    $("#interview_project").select2();
                }
            });
        })
    });

</script>

<?=$this->endSection()?>
