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
                                        <?php foreach (getYear() as $key => $value) :?>
                                            <option value="<?=$value;?>"><?=$value;?></option>
                                        <?php endforeach;?>                                       
                                       
                                    </select>
                                </div>                                  
                            </div>
                        </div>
                    </div>        
                    <div class="card-body">
                        <div class="row">
                            <!-- <div class="col-md-4">
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
                                                <th  class="text-center">ประเภท</th>
                                                <th  class="text-center">จำนวน(คน)</th>
                                                <th  class="text-center">อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($chart['product_value']['label'] as $key => $value) :?>
                                               <tr>
                                                    <td><?=$value;?></td>
                                                    <td class="text-center">0</td>
                                                    <td class="text-center">0</td>
                                                </tr>
                                            <?php endforeach;?>                                                                      
                                        </tbody>                                     
                                    </table>
                                </div>
                            </div> -->
                            <div class="col-md-6">
                                <div class="text-center">
                                    <h6>รายได้จากผลผลิต</h6>
                                    <canvas id="myChart1" width="400" height="250"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">รายได้จากผลผลิต</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">ประเภท</th>
                                                <th class="text-center">จำนวน(บาท)</th>
                                                <th class="text-center">อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($income as $key => $value) :?>
                                               <tr>
                                                    <td><?=$value['Name'];?></td>
                                                    <td class="text-center"><?= number_format($value['product_sum']);?></td>
                                                    <td class="text-center">0</td>
                                                </tr>
                                            <?php endforeach;?>               
                                        </tbody>                                       
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-center">
                                    <h6>รายจ่ายต่อรอบ</h6>
                                    <canvas id="myChart2" width="400" height="250"></canvas>
                                </div>
                                <div class="mt-2">
                                    <table class="table table-bordered">
                                        <thead class="bg-info">
                                            <tr>
                                                <th colspan="3" class="text-center">รายจ่ายต่อรอบ</th>
                                            </tr>
                                            <tr>
                                                <th class="text-center">ประเภท</th>
                                                <th class="text-center">จำนวน(บาท)</th>
                                                <th class="text-center">อัตราส่วน</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($chart['product_pay']['label'] as $key => $value) :?>
                                               <tr>
                                                    <td><?=$value;?></td>
                                                    <td class="text-center"><?=@$outcome[$key]['product_sum'] ? number_format($outcome[$key]['product_sum']) : 0;?></td>
                                                    <td class="text-center">0</td>
                                                </tr>
                                            <?php endforeach;?>                                   
                                        </tbody>
                                      
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
                                <form action="" method="get">
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label>โครงการ :</label>                                        
                                            <select name="project_name" id="project_name" class="form-control">
                                                <option value="">ทั้งหมด</option>
                                                <?php foreach ($projects as $key => $value) :?>
                                                    <option <?=@$search['interview_project'] == $value['Code']?'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Description'];?></option>
                                                <?php endforeach;?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>จังหวัด :</label>                                        
                                            <select name="province" id="province" class="form-control">
                                                <option value="">ทั้งหมด</option>
                                                <?php foreach ($province as $key => $value) :?>
                                                    <option <?=@$search['province'] == $value['Code'] ? 'selected':'';?> value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                                <?php endforeach;?>    
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>อำเภอ :</label>
                                            <select name="amphur" id="amphur" class="form-control">
                                                <option value="">ทั้งหมด</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label>ตำบล :</label>
                                            <select name="tambon" id="tambon" class="form-control">
                                                <option value="">ทั้งหมด</option>
                                            </select>
                                        </div>                     
                                        <div class="form-group col-md-12">
                                            <label>พื้นที่ :</label>                                        
                                            <select name="area" id="area" class="form-control">
                                                <option value="">ทั้งหมด</option>
                                            </select>
                                        </div>                                                                                          
                                    </div>

                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-info">ค้นหา</button>
                                    </div>
                                </form>
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe0nivzXjyUHEzQQCvI8kSIUx0a2dTFLA"></script>

<!-- AIzaSyCl2s_jaG7f21ZhyUGobio7B5-dbvO1v3A -->

<script>
    //set label
    var label_value = <?= json_encode($chart['product_value']['label']);?>;
    var label_price = <?= json_encode($chart['product_price']['label']);?>;
    var label_pay = <?= json_encode($chart['product_pay']['label']);?>;

    var data_price = <?= json_encode($chart['product_price']['data']);?>;
    var data_pay = <?= json_encode($chart['product_pay']['data']);?>;
    $(function(){
        
        // const ctx = document.getElementById('myChart');
        // const myChart = new Chart(ctx, {
        //     type: 'bar',
        //     data: {
        //         labels: label_value,
        //         datasets: [{
        //             label: '',
        //             data: [12, 19, 3, 5, 2, 3],
        //             backgroundColor: [
        //                 'rgba(155, 81, 224, 1)',
        //                 'rgba(0, 122, 255, 1)',
        //                 'rgba(118, 214, 132, 1)',
        //                 'rgba(243, 130, 90, 1)',
        //                 'rgba(32, 213, 206, 1)',
        //                 'rgba(234, 84, 85, 1)'
        //             ],
        //             borderColor: [
        //                 'rgba(155, 81, 224, 1)',
        //                 'rgba(0, 122, 255, 1)',
        //                 'rgba(118, 214, 132, 1)',
        //                 'rgba(243, 130, 90, 1)',
        //                 'rgba(32, 213, 206, 1)',
        //                 'rgba(234, 84, 85, 1)'
        //             ],
        //             borderWidth: 1
        //         }]
        //     },
        //     options: {
        //         plugins: {
        //             legend: {
        //             display: false
        //             }
        //         },
        //         scales: {
        //             x: {
        //                 grid: {
        //                 display: false
        //                 }
        //             },
        //             y: {
        //                 beginAtZero: true,
        //                 grid: {
        //                     display: false
        //                 }                        
        //             },                   
        //         }
        //     }
        // });

        const ctx1 = document.getElementById('myChart1');
        const myChart1 = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: label_price,
                datasets: [{
                    label: 'จำนวน (บาท)',
                    data: data_price,
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

        const ctx2 = document.getElementById('myChart2');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: label_pay,
                datasets: [{
                    label: 'จำนวน (บาท)',
                    data: data_pay,
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
    })


    $(function(){
        $("#province").change(function(){
            var province = $(this).val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-amphur?province='+province,
                success : function(options){
                    $("#amphur").html(options)
                }
            });
        })

        $("#amphur").change(function(){
            var amphur = $(this).val();
            var province = $('#province').val();
            $.ajax({
                type: "GET",
                url: domain+'common/get-tambon?amphur='+amphur+'&province='+province,
                success : function(options){
                    $("#tambon").html(options)
                }
            });
        })
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
  