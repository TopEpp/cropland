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
                            <button onclick="addLand()" class="btn btn-info">เพิ่มข้อมูล</button>
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
                                <th scope="col">แปลงที่</th>
                                <th scope="col">เลขที่แปลง</th>
                                <th scope="col">พื้นที่</th>
                                <th scope="col">การใช้ประโยชน์</th>
                                <th scope="col">ผู้ถือคลอง</th>
                                <th scope="col">ที่ตั้ง</th>
                                <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['land_number'];?></td>
                                        <td><?=$value['land_no'];?></td>
                                        <td><?=$value['land_area'];?> ไร่</td>
                                        <td><?=$value['land_use'];?></td>
                                        <td><?=$value['land_ownership'];?></td>
                                        <td><?=$value['land_address'];?></td>
                                        <td>
                                            <div class="buttons">
                                                <button  onclick="addLand(<?=$value['land_id'];?>)" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></button>                                    
                                                <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach;?>
                               

                            </tbody>
                        </table>
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
                                    <label>แปลงที่</label>                                        
                                    <input type="text" class="form-control" name="land_number">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>เลขที่แปลง</label>
                                    <input type="text" class="form-control" name="land_no">                         
                                </div>
                                <div class="form-group col-md-12">
                                    <label>พื้นที่</label>
                                    <input type="text" class="form-control" name="land_area">                            
                                </div>                     
                                <div class="form-group col-md-12">
                                    <label>การใช้ประโยชน์ที่ดิน</label>                                        
                                    <select name="land_use" id="land_use" class="form-control">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>พื้นที่ตั้ง</label>                                        
                                    <select name="land_address" id="land_address" class="form-control">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>สิทธิถือครอง</label>                                        
                                    <select name="land_ownership" id="land_ownership" class="form-control">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>ลักษณะการถือครอง</label>                                        
                                    <select name="land_holding" id="land_holding" class="form-control">
                                        <option value="1">1</option>
                                    </select>
                                </div>
                            </div>
                        </div>      
                        
                        <div class="col-md-6">

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

<?=$this->section("scripts")?>
<script>
    function addLand(id = ''){
        $("#land_id").val(id)
        $("#LandModal").modal();
    }

</script>
<?=$this->endSection()?>
  