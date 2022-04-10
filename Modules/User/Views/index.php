<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลผู้ใช้งาน</h4>
                        <!-- <div class="card-header-action">
                            <a href="<?= base_url('survay/manage');?>" class="btn btn-info">
                            เพิ่มแบบสอบถาม
                            </a>
                        </div> -->
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ตำแหน่ง</th>
                                <th scope="col">เบอร์โทรศัพท์</th>                            
                                <!-- <th scope="col">เครื่องมือ</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['fullname'];?></td>
                                        <td><?=$value['department'];?></td>
                                        <td><?=$value['mbl_phn'];?></td>                                        
                                        <!-- <td>
                                            <div class="buttons">
                                                <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                                <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                            </div>
                                        </td> -->
                                    </tr>
                                <?php endforeach;?>
                               

                            </tbody>
                        </table>

                         <!-- Pagination -->
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
<!-- <script src="<?= base_url('public/js/script.js') ?>"></script> -->
<?=$this->endSection()?>
  