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
                        <div class="card-header-action w-25">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">หมู่บ้าน :</label>
                                <div class="col-sm-8">
                                    <select name="" id="" class="form-control">
                                        <option value="">เลือก</option>
                                    </select>
                                </div>                                  
                            </div>
                        </div>
                    </div>        
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h6>โครงสร้างประชากร จำแนกตามช่วงอายุ</h6>
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
                                                <td>250</td>
                                            </tr>
                                        </tfooter>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="text-center">
                                    <h6>จำนวนประชากร จำแนกตามเพศ</h6>
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
                                            <tr><td></td></tr>                                          
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
                                                <th>ชนเผ่าน</th>
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

<?=$this->section("scripts")?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.min.js"></script>
<script>
    $(function(){
        const ctx = document.getElementById('myChart');
        const myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
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
  