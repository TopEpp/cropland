<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row" style="margin-bottom:15px">
            <div class="col-md-12" style="text-align: center;">
                <a href="<?= base_url('survay_house');?>" class="btn btn-info" style="width: 200px;">ข้อมูลแบบสอบถามครัวเรือน</a>
                <a href="<?= base_url('dashboard/house');?>" class="btn btn-info" style="width: 200px;">แดชบอร์ดแบบสำรวจครัวเรือน</a>
                <a href="<?= base_url('report/house');?>" class="btn btn-info" style="width: 200px;">รายงานสรุปครัวเรือน</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        <h4 class="text-dark">รายงานสรุปโครงสร้างประชากร</h4>                     
                    </div>        
                    <div class="card-body">
                    <h5>ค้นหาข้อมูล</h5>
                        <div>
                            <form action="">
                                <div class="row d-flex justify-content-center w-100">
                                    <div class="form-group col-md-4">                                    
                                        <label>ปีสำรวจ</label>                                       
                                        <select name="year" id="year" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach (getYear() as $key => $value) :?>
                                                <option <?php if($value==$search['year']){ echo 'selected="selected"';}?>  value="<?=$value;?>"><?=$value;?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>                                                                   
                                    <div class="form-group col-md-4">                                    
                                        <label>ประเภทโครงการ</label>                                       
                                        <select name="project_type" id="project_type" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects_type as $key => $value) :?>
                                                <option <?=@$search['project_type'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                    </div>   
                                    <div class="form-group col-md-4">                                    
                                        <label>ชื่อโครงการ</label>                                       
                                        <select name="project_name" id="project_name" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_project_name'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>                 
                                </div>
                                <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-info">ค้นหา</button>
                                    <button type="button" class="btn btn-secondary" onclick="window.location.replace('<?=site_url('report/house');?>');">ล้างค่า</button>
                                    
                                </div>  
                            </form>
                        </div>
                    
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-center" style="height:400px; border: 1px solid #ccc; border-radius: 10px; padding:25px;">
                                    <h6>สรุปข้อมูลด้านรายได้ จำแนกตามประเภท</h6>
                                    <canvas id="chart_income"  height="400px" style="height:400px !important ;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center" style="border: 1px solid #ccc; border-radius: 10px; padding:25px;">
                                    <h6>จำนวนประชากร จำแนกตามเพศ</h6>
                                    <canvas id="myChart" height="400px" style="height:400px !important ;"></canvas>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="text-center" style="height:400px; border: 1px solid #ccc; border-radius: 10px; padding:25px;">
                                    <h6>สรุปข้อมูลด้านรายจ่าย จำแนกตามประเภท</h6>
                                    <canvas id="chart_outcome"  height="400px" style="height:400px !important ;"></canvas>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="text-center" style="border: 1px solid #ccc; border-radius: 10px; padding:25px;">
                                    <h6>สรุปข้อมูลเปรียบเทียบรายรับ รายจ่าย</h6>
                                    <canvas id="chart_sum"  height="400px"></canvas>
                                </div>
                            </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.min.js"></script>
<script>
    $(function(){

        
        //search
        $("#project_type").change(function(){
            var project_type = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-projects?project_type='+project_type,
                success : function(options){
                    $("#project_name").html(options)
                    $("#project_name").select2();
                }
            });
        })

        const ctx1 = document.getElementById('chart_income');
        ctx1.height = 500;
        const chart_income = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ['เงินผู้สูงอายุ','บัตรประชารัฐ','บุตรส่งเงิน','บัตรผู้พิการ','เงินช่วยเหลือภัยพิบัติ','เงินค่าประกันสินค้าเกษตร','อื่นๆ'],
                datasets: [{
                    label: 'จำนวน (บาท)',
                    data: [<?php echo @$sum_income[1]?>,
                            <?php echo @$sum_income[2]?>,
                            <?php echo @$sum_income[3]?>,
                            <?php echo @$sum_income[4]?>,
                            <?php echo @$sum_income[5]?>,
                            <?php echo @$sum_income[6]?>,
                            <?php echo @$sum_income[7]?>],
                    backgroundColor: [
                        'rgba(155, 81, 224, 1)',
                        'rgba(0, 122, 255, 1)',
                        'rgba(118, 214, 132, 1)',
                        'rgba(243, 130, 90, 1)',
                        'rgba(32, 213, 206, 1)',
                        'rgba(234, 84, 85, 1)'
                    ],
                    borderColor: [
                        'rgba(155, 81, 224, 1)',
                        'rgba(0, 122, 255, 1)',
                        'rgba(118, 214, 132, 1)',
                        'rgba(243, 130, 90, 1)',
                        'rgba(32, 213, 206, 1)',
                        'rgba(234, 84, 85, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                    display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                        display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }                        
                    },                   
                }
            }
        });

        const ctx_out = document.getElementById('chart_outcome');
        const chart_outcome = new Chart(ctx_out, {
            type: 'bar',
            data: {
                labels: ['ค่าเครื่องนุ่มห่ม','ค่าที่อยู่อาศัย','ค่าการศึกษา','ค่ายารักษาโรค','ค่าน้ำมัน','ค่าเติมเงินมือถือ','ค่าทำบุญ','ค่าหวย/สุรา','รายจ่ายในการอุปโภค','รายจ่ายในการบริโภค'],
                datasets: [{
                    label: 'จำนวน (บาท)',
                    data: [<?php echo @$sum_outcome[1]?>,
                            <?php echo @$sum_outcome[2]?>,
                            <?php echo @$sum_outcome[3]?>,
                            <?php echo @$sum_outcome[4]?>,
                            <?php echo @$sum_outcome[5]?>,
                            <?php echo @$sum_outcome[6]?>,
                            <?php echo @$sum_outcome[7]?>,
                            <?php echo @$sum_outcome[8]?>,
                            <?php echo @$sum_outcome[9]?>,
                            <?php echo @$sum_outcome[10]?>,],
                    backgroundColor: [
                        'rgba(155, 81, 224, 1)',
                        'rgba(0, 122, 255, 1)',
                        'rgba(118, 214, 132, 1)',
                        'rgba(243, 130, 90, 1)',
                        'rgba(32, 213, 206, 1)',
                        'rgba(234, 84, 85, 1)'
                    ],
                    borderColor: [
                        'rgba(155, 81, 224, 1)',
                        'rgba(0, 122, 255, 1)',
                        'rgba(118, 214, 132, 1)',
                        'rgba(243, 130, 90, 1)',
                        'rgba(32, 213, 206, 1)',
                        'rgba(234, 84, 85, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                    display: false
                    }
                },
                scales: {
                    x: {
                        grid: {
                        display: false
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }                        
                    },                   
                }
            }
        });


        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['ชาย', 'หญิง', 'ไม่ระบุ'],
                datasets: [{
                    label: '',
                    data: [<?php echo $sum_gender['sum_m']?>, <?php echo $sum_gender['sum_f']?>, <?php echo $sum_gender['sum_0']?>],
                    backgroundColor: [
                        'rgb(255, 99, 132,0.5)',
                        'rgb(54, 162, 235,0.5)',
                        'rgb(200, 205, 86,0.5)',
                        'rgb(255, 200, 132,0.5)',
                        'rgb(20, 150, 235,0.5)',
                        'rgb(100, 205, 86,0.5)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132,0.5)',
                        'rgb(54, 162, 235,0.5)',
                        'rgb(200, 205, 86,0.5)',
                        'rgb(255, 200, 132,0.5)',
                        'rgb(20, 150, 235,0.5)',
                        'rgb(100, 205, 86,0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                // responsive: true,
                // maintainAspectRatio: false
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
            }
        });

        const ctx2 = document.getElementById('chart_sum');
        const myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['รายรับ', 'รายจ่าย'],
                datasets: [{
                    label: 'จำนวน (บาท)',
                    data: [<?php echo array_sum($sum_income)?>,<?php echo array_sum($sum_outcome)?>],
                    backgroundColor: [
                        'rgb(255, 99, 132,0.5)',
                        'rgb(54, 162, 235,0.5)',
                        'rgb(255, 205, 86,0.5)',
                        'rgb(255, 200, 132,0.5)',
                        'rgb(20, 150, 235,0.5)',
                        'rgb(100, 205, 86,0.5)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132,0.5)',
                        'rgb(54, 162, 235,0.5)',
                        'rgb(255, 205, 86,0.5)',
                        'rgb(255, 200, 132,0.5)',
                        'rgb(20, 150, 235,0.5)',
                        'rgb(100, 205, 86,0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                // responsive: true,
                // maintainAspectRatio: false
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
            }
        });

        
    });

</script>
<?=$this->endSection()?>
  