<?=$this->extend("layouts/main")?>


<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลที่ดินรายแปลง</h4>
                        <div class="card-header-action">
                            <button onclick="landModal()" class="btn btn-info">เพิ่มข้อมูล</button>
                        </div>
                    </div>
                    <div class="card-body">
                    <?php if (session()->getFlashdata("message")):?>
                            <div class="alert alert-success alert-dismissible show fade">
                                <div class="alert-body">
                                    <button class="close" data-dismiss="alert">
                                    <span>×</span>
                                    </button>
                                    <?= session()->getFlashdata("message");?>
                                </div>
                            </div>
                        <?php endif;?>
                        
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">รหัสแปลง</th>
                                <!-- <th scope="col">เลขที่แปลง</th> -->
                                <th scope="col">ขนาดพื้นที่ (ไร่)</th>
                                <th scope="col">การใช้ประโยชน์ที่ดิน</th>
                                <th scope="col">ผู้ถือครอง</th>
                                <th scope="col">พื้นที่</th>
                                <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['land_code'];?></td>
                                        <!-- <td><?=$value['land_no'];?></td> -->
                                        <td><?=$value['land_area'];?> ไร่</td>
                                        <td><?=@$value['name'];?></td>
                                        <td><?=@$value['person_name'];?></td>
                                        <td><?=$value['project_name'];?></td>
                                        <td>
                                            <div class="buttons">
                                                <button  onclick="landModal(<?=$value['land_id'];?>)" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="bottom" title="แก้ไขข้อมูล"><i class="far fa-edit"></i></button>   
                                                <a href="<?php echo base_url('survay/manage?land_code='.$value['land_code'])?>" class="btn btn-icon btn-primary" data-toggle="tooltip" data-placement="bottom" title="ประเมินรายแปลง"><i class="fas fa-file"></i></a>
                                                <a href="#" class="btn btn-icon btn-danger" data-toggle="tooltip" data-placement="bottom" title="ลบข้อมูล"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-end">
                            <?php if ($pager) :?>
                            <?php $pagi_path='member'; ?>
                            <?php $pager->setPath($pagi_path); ?>               
                            <?= $pager->links('page','default_pagination'); ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" tabindex="-1" role="dialog" id="LandModal">
    <div class="modal-dialog modal-xl" role="document">
        <form action="<?=base_url('land/save_land');?>" method="post">            
            <input type="hidden" name="land_id" id="land_id">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">ข้อมูลที่ดินรายแปลง</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">      
                        <div class="col-md-6 border-right">
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label>รหัสแปลง</label>                                        
                                    <input type="text" class="form-control" name="land_code" id="land_code">
                                </div>
                                <!-- <div class="form-group col-md-12">
                                    <label>แปลงที่</label>                                        
                                    <input type="text" class="form-control" name="land_number" id="land_number">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>เลขที่แปลง</label>
                                    <input type="text" class="form-control" name="land_no" id="land_no">                         
                                </div> -->
                                <div class="form-group col-md-12">
                                    <label>ผู้ถือครอง</label>
                                    <select name="land_ownership" id="land_ownership" class="form-control select2-ajax-person">
                                    </select>
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
                                    <label>สิทธิถือครอง</label>                                        
                                    <select name="land_holding" id="land_holding" class="form-control">
                                        <option value="">เลือก</option>
                                        <?php foreach ($landprivilege as $key => $value) :?>
                                            <option value="<?=$value['Code'];?>"><?=$value['Name'];?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>แหล่งน้ำที่ใช้ในการเกษตร</label>                                        
                                    <select name="land_resource" id="land_resource" class="form-control">
                                        <option value="">เลือก</option>
                                        <?php foreach ($landowner as $key => $value) :?>
                                            <option value="<?=$value['landowner_id'];?>"><?=$value['name'];?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                
                                <div class="form-group col-md-12">
                                    <label>พื้นที่แปลงรวม (ไร่)</label>          
                                    <input type="text" class="form-control" name="land_area" id="land_area">
                                </div>
                                <input type="hidden" name="land_geo_loc"  id="land_geo_loc" >
                                                            
                            </div>
                        </div>      
                        
                        <div class="col-md-6">
                            <div id="map"></div>
                           
                        </div>
                       
                        
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="sumbit" class="btn btn-primary">บันทึก</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>
        </form>
    </div>
</div>


<?=$this->endSection()?>

<?=$this->section("css")?>
<style>
    #map {
  height: 100%;
}
</style>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<?=$this->endSection()?>

<?=$this->section("scripts")?>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBe0nivzXjyUHEzQQCvI8kSIUx0a2dTFLA&libraries=drawing"></script>
<!-- //load select2 ajax/ -->
<?= script_tag('public/assets/js/modules/ajax_select2.js') ?>
<script type="text/javascript">

// let map;
let marker;
// let markers = [];
// let drawingManager;
var default_color = '#1E90FF';
var itemPath;


var map; // Global declaration of the map
var iw = new google.maps.InfoWindow(); // Global declaration of the infowindow
var lat_longs = new Array();
var markers = new Array();
var drawingManager;
// $(document).ready(function() {
//     initMap();
// });


    function landModal(id = ''){
        $("#land_id").val(id)
          
        
        if (id != ''){

            $.ajax({
                type: "GET",
                url: domain+'land/load-lands/'+id,
                success : function(response){
                    let latLngs = []
                    if (response){
                        // conver to geo

                        const data = response.data;
                        var geo = ''
                        var data_geo = ''
                        var tempPoint = [];

                        if (data.land_gps){
                            geo = JSON.parse(data.land_gps)                                             
                            data_geo = geo.coordinates                                             
                            // latLngs = data_geo.map(pair => ({lat:pair[0], lng:pair[1]}))
                            // var arrShape=new Array();
                            for(var s=0;s<data_geo.length;s++){
                                tempPoint=data_geo[s];                                                            
                                latLngs.push(new google.maps.LatLng(tempPoint[0], tempPoint[1]));
                            }
                        }     

                        if (data.land_geo_loc){
                            geo = JSON.parse(data.land_geo_loc)                                            
                            for(var s=0;s<geo.length;s++){
                                tempPoint=geo[s];                                                            
                                latLngs.push(new google.maps.LatLng(tempPoint.lat, tempPoint.lng));
                            }
                        }     
                                       
     
                        $("#land_code").val(data.land_code)
                        // $("#land_number").val(data.land_number)
                        $("#land_ownership").html('');
                        if (data.land_ownership){
                            $("#land_ownership").html("<option selected value='"+data.land_ownership+"'>"+data.person_name +' '+ data.person_lastname+"</option>")
                        }
                     
                        $("#land_area").val(data.land_area)
                        $("#land_use").val(data.land_use)
                        data.land_geo_loc ? $("#land_geo_loc").val(data.land_geo_loc) : ''
                        // $("#land_address").val(data.land_address)
                        
                      
                        // $("#land_ownership").val(data.land_ownership)
                        // $("#land_holding").val(data.land_holding)
                        
                    }
                    initMap(latLngs)
                    // $("#item_modal").html(response)
                }
            });
        }
    
        $("#LandModal").modal();
      
    }

    
    function initMap(geo) {    

        if (geo.length > 0){
            const centers = geo.length;
        
            const myLatLng = geo[parseInt(centers/2)];
            
            map = new google.maps.Map(document.getElementById("map"), {
                center: myLatLng,
                zoom: 18,
                // mapTypeId: "terrain",
                mapTypeId: google.maps.MapTypeId.ROADMAP

            });

            // Construct the polygon.
            const bermudaTriangle = new google.maps.Polygon({
                paths: geo,
                strokeColor: "#FF0000",
                strokeOpacity: 0.8,
                strokeWeight: 2,
                fillColor: "#FF0000",
                fillOpacity: 0.35,
            });

            bermudaTriangle.setMap(map);
        }else{
            // const myLatLng = geo[parseInt(centers/2)];
            
            map = new google.maps.Map(document.getElementById("map"), {
                center: { lat: 18.599395, lng: 98.705332 },
                zoom: 10,
                // mapTypeId: "terrain",
                mapTypeId: google.maps.MapTypeId.ROADMAP

            });
        }
      

        drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: true,
            drawingControlOptions: {
                position: google.maps.ControlPosition.TOP_CENTER,
                drawingModes: [google.maps.drawing.OverlayType.POLYGON]
            },
            polygonOptions: {
                editable: true,
                fillColor:"#FF0000",
                strokeColor: "#FF0000",
            }
        });
        drawingManager.setMap(map);

        google.maps.event.addListener(drawingManager, "polygoncomplete", function(polygon) {
            var coordinates = polygon.getPath().getArray();
            var data = JSON.stringify(coordinates);
            $("#land_geo_loc").val(data)
        });

            // Clear the current selection when the drawing mode is changed, or when the
    // map is clicked.
        // google.maps.event.addListener(drawingManager, 'drawingmode_changed', clearSelection);

        // google.maps.event.addListener(drawingManager, "mouseup", function(event) {
        //     // $('#vertices').val(overlay.getPath().getArray());
        //     console.log(event);
        // });

        // google.maps.event.addListener(overlay, "mouseup", function(event) {
        //     console.log(event);
        //     // $('#vertices').val(overlay.getPath().getArray());
        // });

        // google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
        //     overlayClickListener(event.overlay);
        //     $('#vertices').val(event.overlay.getPath().getArray());
        // });


        //     // The marker, positioned at Uluru
        // const laaa = {lat: 17.314806783196214, lng: 98.33018878827379};
        // console.log(laaa);
        // const marker = new google.maps.Marker({
        //     position: laaa,
        //     map: map,
        // });
      
    }

    function initialize() {
        var myLatlng = new google.maps.LatLng(40.9403762, -74.1318096);
        var myOptions = {
            zoom: 13,
            center: myLatlng,
            mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        map = new google.maps.Map(document.getElementById("map"), myOptions);
        drawingManager = new google.maps.drawing.DrawingManager({
            drawingMode: google.maps.drawing.OverlayType.POLYGON,
            drawingControl: true,
            drawingControlOptions: {
            position: google.maps.ControlPosition.TOP_CENTER,
            drawingModes: [google.maps.drawing.OverlayType.POLYGON]
            },
            polygonOptions: {
            editable: true
            }
        });
        drawingManager.setMap(map);

        google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
            var newShape = event.overlay;
            newShape.type = event.type;
        });

        google.maps.event.addListener(drawingManager, "overlaycomplete", function(event) {
            overlayClickListener(event.overlay);
            $('#vertices').val(event.overlay.getPath().getArray());
        });
    }

    function overlayClickListener(overlay) {
        google.maps.event.addListener(overlay, "mouseup", function(event) {
            // $('#vertices').val(overlay.getPath().getArray());
            console.log(event);
        });
    }

    // google.maps.event.addDomListener(window, 'load', initialize);

</script>
<?=$this->endSection()?>
  