<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12 mb-4">
                <div class="card m-0 p-0">
                    <div class="card-header">
                        <h4 class="text-dark">รายงานสรุปแบบสำรวจที่ดินรายแปลง</h4>
                        <div class="card-header-action w-25">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">ปีสำรวจ :</label>
                                <div class="col-sm-8">
                                    <select name="year" id="year" class="form-control">
                                        <option value="">ทั้งหมด</option>
                                        <option value="2565">2565</option>
                                        <option value="2564">2564</option>
                                    </select>
                                </div>                                  
                            </div>
                        </div>
                    </div>        
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="text-center">
                                    <h6>จำนวนผลผลิต</h6>
                                    <canvas id="myChart" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">จำนวนผลผลิต</th>
                                            </tr>
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>จำนวน(คน)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>บุก</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>
                                            <tr>
                                                <td>ข้าว</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>พริกกะเหรี่ยง</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>กล้วย</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>       
                                            <tr>
                                                <td>กาแฟ</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>   
                                            <tr>
                                                <td>ลิ้นจี่</td>
                                                <td class="text-center">0</td>
                                                <td class="text-center">0</td>
                                            </tr>                                   
                                        </tbody>
                                        <!-- <tfooter>
                                            <tr>
                                                <td>รวม</td>
                                                <td>250</td>
                                            </tr>
                                        </tfooter> -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="text-center">
                                    <h6>รายได้จากผลผลิต</h6>
                                    <canvas id="myChart1" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">รายได้จากผลผลิต</th>
                                            </tr>
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>จำนวน(บาท)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ข้าว</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>กาแฟ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ข้าวโพด</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ลำใย</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>สัก</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>                  
                                        </tbody>
                                        <!-- <tfooter>
                                            <tr>
                                                <td>รวม</td>
                                                <td>250</td>
                                            </tr>
                                        </tfooter> -->
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-4">
                            <div class="text-center">
                                    <h6>รายจ่ายต่อรอบ</h6>
                                    <canvas id="myChart2" width="400" height="400"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">รายจ่ายต่อรอบ</th>
                                            </tr>
                                            <tr>
                                                <th>ประเภท</th>
                                                <th>จำนวน(บาท)</th>
                                                <th>อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ปุ๋ย</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ยา</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>ฮอร์โมน</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>                                         
                                            <tr>
                                                <td>แรงงาน</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <td>อื่นๆ</td>
                                                <td>0</td>
                                                <td>0</td>
                                            </tr>  
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>                                       
                                        </tbody>
                                        <!-- <tfooter>
                                            <tr>
                                                <td>รวม</td>
                                                <td>250</td>
                                            </tr>
                                        </tfooter> -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">แผนที่การสำรวจที่ดินรายแปลง</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">   
                            <div class="col-md-8">
                                <div id="map"></div>
                            </div>   
                            <div class="col-md-4 border-right">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label>รหัสแปลง</label>                                        
                                        <input type="text" class="form-control" name="land_code" id="land_code">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>แปลงที่</label>                                        
                                        <input type="text" class="form-control" name="land_number" id="land_number">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>เลขที่แปลง</label>
                                        <input type="text" class="form-control" name="land_no" id="land_no">                         
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>พื้นที่</label>
                                        <input type="text" class="form-control" name="land_area" id="land_area">                 
                                    </div>                     
                                    <div class="form-group col-md-12">
                                        <label>การใช้ประโยชน์ที่ดิน</label>                                        
                                        <select name="land_use" id="land_use" class="form-control">
                                            <option value="">เลือก</option>
                                            <?php foreach ($landuse as $key => $value) :?>
                                                <option value="<?=$value['landuse_id'];?>"><?=$value['name'];?></option>
                                            <?php endforeach?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>พื้นที่แปลงรวม (ไร่)</label>          
                                        <input type="text" class="form-control" name="land_address" id="land_address">                                 
                                    </div>                                                          
                                </div>

                                <div class="col-md-12 text-right">
                                    <button type="button" class="btn btn-info">ค้นหา</button>
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
<style>
    #map {
  height: 100%;
}
</style>
<?=$this->endSection()?>

<?=$this->section("scripts")?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.esm.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/helpers.esm.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl2s_jaG7f21ZhyUGobio7B5-dbvO1v3A"></script>

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


<script type="text/javascript">

    let map;
    let marker;
    let markers = [];
    let drawingManager;
    var default_color = '#1E90FF';
    var itemPath;
    $(document).ready(function() {
        initMap();
    });

    function initMap() {
        const myLatLng = { lat: 18.8026962, lng: 98.9555348 };
        map = new google.maps.Map(document.getElementById("map"), {
            center: myLatLng,
            zoom: 7,
        });

        //     // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
        });

    }
</script>
<?=$this->endSection()?>
  