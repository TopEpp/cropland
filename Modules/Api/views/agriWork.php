<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ประเภทแรงงาน</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('api/manageAgriWork');?>" class="btn btn-info">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col" width="5%" style="text-align: center;">ลำดับ</th>
                                <th scope="col" style="text-align: center;">ประเภท</th>
                                <th scope="col" width="15%" style="text-align: center;">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?=$key+1;?></th>
                                        <td><?php echo $value['name']?></td>
                                        <td style="text-align: center;">
                                            <div class="buttons">
                                                <a href="<?=base_url('api/manageAgriWork/'.$value['agriwork_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
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
  