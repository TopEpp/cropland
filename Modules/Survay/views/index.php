<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลแบบสอบถาม</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('survay/manage');?>" class="btn btn-info">
                            เพิ่มแบบสอบถาม
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">รายการแบบสอบถาม</th>
                                <th scope="col">โครงการ</th>
                                <th scope="col">ผู้สัมภาษณ์</th>
                                <th scope="col">วันที่สัมภาษณ์</th>
                                <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['interview_code'];?></td>
                                        <td><?=$value['interview_project'];?></td>
                                        <td><?=$value['interview_user'];?></td>
                                        <td><?=$value['interview_date'];?>4</td>
                                        <td>
                                            <div class="buttons">
                                                <a href="<?=base_url('survay/manage/'.$value['interview_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
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
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<!-- <script src="<?= base_url('public/js/script.js') ?>"></script> -->
<?=$this->endSection()?>
  