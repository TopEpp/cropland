<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
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
                labels: ['ชาย', 'หญิง', 'เด็กหญิง', 'เด็กชาย'],
                datasets: [{
                    label: '',
                    data: [40, 30, 20, 10],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 200, 132)',
                        'rgb(20, 150, 235)',
                        'rgb(100, 205, 86)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 200, 132)',
                        'rgb(20, 150, 235)',
                        'rgb(100, 205, 86)'
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
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 200, 132)',
                        'rgb(20, 150, 235)',
                        'rgb(100, 205, 86)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 200, 132)',
                        'rgb(20, 150, 235)',
                        'rgb(100, 205, 86)'
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
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 200, 132)',
                        'rgb(20, 150, 235)',
                        'rgb(100, 205, 86)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(255, 200, 132)',
                        'rgb(20, 150, 235)',
                        'rgb(100, 205, 86)'
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
  