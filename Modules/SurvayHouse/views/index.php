<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลแบบสอบถามครัวเรือน</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('survay_house/manage');?>" class="btn btn-info">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead class="bg-info">
                                <tr>
                                    <th with="10%" scope="col">ลำดับ</th>
                                    <th with="15%" scope="col">ชื่อ-นามสกุล</th>
                                    <th with="30%" scope="col">ที่อยู่</th>
                                    <th with="10%" scope="col">จำนวนสมาชิก</th>
                                    <th with="10%" scope="col">จำนวนที่ดิน</th>
                                    <th with="20%" scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th class="text-center" scope="row"><?=$key+1;?></th>
                                        <td><?=@$value['person_name'].' '.@$value['person_lastname'] ?></td>
                                        <td><?=$value['person_address'];?></td>
                                        <td class="text-center"><?=$value['total_person'];?></td>
                                        <td> - </td>
                                        <td class="text-center">
                                            <div class="buttons">
                                                <a href="<?=base_url('survay_house/manage/'.$value['house_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                                <button onclick="deleteItem(<?=$value['house_id'];?>)" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></button>
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
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    
    function deleteItem(elm){
        swal({
        title: 'Are you sure?',
        text: 'ยืนยันลบข้อมูลนี้!',
        icon: 'warning',
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: "POST",
                    url: domain+'survay_house/delete_house/'+elm,
                    success : function(res){
                        window.location.reload();
                    }
                });
            } 
        });
        
    }
</script>
<?=$this->endSection()?>
  