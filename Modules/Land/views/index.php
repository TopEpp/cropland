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
                                <th scope="col">ผู้ถือคลอง</th>
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
                                        <td>-</td>
                                        <td><?=$value['project_name'];?></td>
                                        <td>
                                            <div class="buttons">
                                                <button  onclick="landModal(<?=$value['land_id'];?>)" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></button>                                    
                                                <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
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
<?=$this->endSection()?>

<?=$this->section("scripts")?>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCl2s_jaG7f21ZhyUGobio7B5-dbvO1v3A"></script>

<script type="text/javascript">

let map;
let marker;
let markers = [];
let drawingManager;
var default_color = '#1E90FF';
var itemPath;
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

                    if (response){
                        // conver to geo
                     

                        const data = response.data;
                        let latLngs = []
                        if (data.land_geo){
                            var geo = JSON.parse(data.land_geo)                        
                            var data_geo = geo[0];                         
                            latLngs = data_geo.map(pair => ({lat: pair[0], lng: pair[1]}))
                        }
                     
     
                        $("#land_code").val(data.land_code)
                        $("#land_number").val(data.land_number)
                        $("#land_no").val(data.land_no)
                        $("#land_area").val(data.land_area)

                        $("#land_use").val(data.land_use)
                        $("#land_address").val(data.land_address)

                        initMap(latLngs)
                        // $("#land_ownership").val(data.land_ownership)
                        // $("#land_holding").val(data.land_holding)
                        
                    }
                    // $("#item_modal").html(response)
                }
            });
        }
      

        $("#LandModal").modal();
    }

    
    function initMap(geo) {        
        const myLatLng = { lat: 18.8026962, lng: 98.9555348 };
        map = new google.maps.Map(document.getElementById("map"), {
            center: myLatLng,
            zoom: 7,
            // mapTypeId: "terrain",

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


        //     // The marker, positioned at Uluru
        // const marker = new google.maps.Marker({
        //     position: myLatLng,
        //     map: map,
        // });

    }

</script>
<?=$this->endSection()?>
  