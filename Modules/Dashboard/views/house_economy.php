<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        <h4 class="text-dark">รายงานสรุปข้อมูลด้านเศรฐกิจในครัวเรือน</h4>
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
                                    <h6>ข้อมูลด้านรายได้ของครัวเรือน</h6>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">ข้อมูลด้านรายได้ของครัวเรือน</th>
                                            </tr>
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>การขายงานด้านหัตถกรรม</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td>การขายผลผลิตทางการเกษตร</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>ค้าขาย</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>บุตร/ญาติพี่น้องส่งมาให้</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>รับจ้าง</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>   
                                            <tr>
                                                <td>อื่นๆ</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>   
                                            <tr>
                                                <td>เงินเดือน</td>
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
                                    <h6>ข้อมูลด้านรายจ่ายของครัวเรือน</h6>
                                    <canvas id="myChart1" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">ข้อมูลด้านรายจ่ายของครัวเรือน</th>
                                            </tr>
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>รายจ่ายนอกภาคการเกษตร</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>รายจ่ายในการบริโภค</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>รายจ่ายในการอุปโภค</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>รายจ่ายในด้านการเกษตร</td>
                                                <td>0</td>
                                                <td>0</td>
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
                                    <h6>อาชีพหลักของประชากร</h6>
                                    <canvas id="myChart2" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">อาชีพหลักของประชากร</th>
                                            </tr>
                                            <tr>
                                                <th>อาชีพ</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ทำงานในหน่วยงานราชการ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ทำนา</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ทำสวน</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>                                         
                                            <tr>
                                                <td>ทำไร่</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ธุรกิจส่วนตัว</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>นักเรียน / นักศึกษา</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>พนักงานบริษัทเอกชน</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>รับจ้าง</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>หัตถกรรม / อุตสาหกรรมบ้าน</td>
                                                <td>0</td>
                                                <td>0</td>
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
            type: 'bar',
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
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx1 = document.getElementById('myChart1');
        const myChart1 = new Chart(ctx1, {
            type: 'bar',
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
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctx2 = document.getElementById('myChart2');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
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
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    })

</script>
<?=$this->endSection()?>
  