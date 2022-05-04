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
                                <th scope="col">เลขที่แปลง</th>
                                <th scope="col">พื้นที่</th>
                                <th scope="col">การใช้ประโยชน์ที่ดิน</th>
                                <th scope="col">ผู้ถือคลอง</th>
                                <th scope="col">ที่ตั้ง</th>
                                <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['land_code'];?></td>
                                        <td><?=$value['land_no'];?></td>
                                        <td><?=$value['land_area'];?> ไร่</td>
                                        <td><?=@$value['name'];?></td>
                                        <td>-</td>
                                        <td>-</td>
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
    <div class="modal-dialog modal-lg" role="document">
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

    function landModal(id = ''){
        $("#land_id").val(id)
        if (id != ''){

            $.ajax({
                type: "GET",
                url: domain+'land/load-lands/'+id,
                success : function(response){
                    if (response){
                        const data = response.data;
                        $("#land_code").val(data.land_code)
                        $("#land_number").val(data.land_number)
                        $("#land_no").val(data.land_no)
                        $("#land_area").val(data.land_area)

                        $("#land_use").val(data.land_use)
                        $("#land_address").val(data.land_address)
                        // $("#land_ownership").val(data.land_ownership)
                        // $("#land_holding").val(data.land_holding)
                        
                    }
                    // $("#item_modal").html(response)
                }
            });
        }
      

        $("#LandModal").modal();
    }

</script>
<?=$this->endSection()?>
  