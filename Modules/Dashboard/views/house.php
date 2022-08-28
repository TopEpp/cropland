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
                                        <label>ประเภทโครงการ</label>                                       
                                        <select name="project_type" id="project_type" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects_type as $key => $value) :?>
                                                <option <?=@$data['project_type'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                            
                                        </select>
                                    </div>   
                                    <div class="form-group col-md-4">                                    
                                        <label>โครงการ</label>                                       
                                        <select name="project_name" id="project_name" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach ($projects as $key => $value) :?>
                                                <option <?=@$search['interview_project_name'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                            <?php endforeach;?>
                                        </select>
                                    </div>  
                                    <div class="form-group col-md-4">                                    
                                        <label>ปีสำรวจ</label>                                       
                                        <select name="year" id="year" class="form-control select2">
                                            <option value="">ทั้งหมด</option>
                                            <?php foreach (getYear() as $key => $value) :?>
                                                <option value="<?=$value;?>"><?=$value;?></option>
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
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h6>จำนวนประชากร จำแนกตามเพศ</h6>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">จำนวนประชากร</th>
                                            </tr>
                                            <tr>
                                                <th>เพศ</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ชาย</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td>หญิง</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>ด.ช.</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>ด.ญ.</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>ไม่ระบุ</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>                                              
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td>รวม</td>
                                                <td>263</td>
                                            </tr>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="text-center">
                                    <h6>โครงสร้างประชากร จำแนกตามช่วงอายุ</h6>
                                    <canvas id="myChart1" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">จำนวนประชากร</th>
                                            </tr>
                                            <tr>
                                                <th>ช่วงอายุ</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>วัยสูงอายุ (มากกว่า 60 ปี)</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>วัยแรงงาน (15 - 59 ปี)</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>วัยเด็ก (0 - 14 ปี)	</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ไม่ระบุ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>                                           
                                                                       
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td>รวม</td>
                                                <td>263</td>
                                            </tr>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="text-center">
                                    <h6>โครงสร้างประชากร จำแนกตามชนเผ่า</h6>
                                    <canvas id="myChart2" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">จำนวนประชากร</th>
                                            </tr>
                                            <tr>
                                                <th>ชนเผ่า</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>กะเหรี่ยง</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ลีชู ลีซอ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ไทยพื้นราบ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>                                         
                                            <tr>
                                                <td>ไม่ระบุ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                           
                                        </tbody>
                                        <tfooter>
                                            <tr>
                                                <td>รวม</td>
                                                <td>250</td>
                                            </tr>
                                        </tfooter>
                                    </table>
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

        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['ชาย', 'หญิง', 'เด็กหญิง', 'เด็กชาย'],
                datasets: [{
                    label: '',
                    data: [40, 30, 20, 10],
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
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
            }
        });

        const ctx1 = document.getElementById('myChart1');
        const myChart1 = new Chart(ctx1, {
            type: 'pie',
            data: {
                labels: ['วัยสูงอายุ (มากกว่า 60 ปี)', 'วัยแรงงาน (15 - 59 ปี)', 'วัยเด็ก (0 - 14 ปี)', 'ไม่ระบุ'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
            }
        });

        const ctx2 = document.getElementById('myChart2');
        const myChart2 = new Chart(ctx2, {
            type: 'pie',
            data: {
                labels: ['กะเหรี่ยง', 'ลีชู ลีซอ', 'ไทยพื้นราบ', 'ไม่ระบุ'],
                datasets: [{
                    label: '# of Votes',
                    data: [30, 5, 30, 40],
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
                // scales: {
                //     y: {
                //         beginAtZero: true
                //     }
                // }
            }
        });
    })

</script>
<?=$this->endSection()?>
  