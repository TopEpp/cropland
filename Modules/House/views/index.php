<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark">ข้อมูลครัวเรือน</h4>
                        <div class="card-header-action">
                            <a href="<?= base_url('house/manage');?>" class="btn btn-info">
                                เพิ่มข้อมูล
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">ลำดับ</th>
                                <th scope="col">ชื่อ-นามสกุล</th>
                                <th scope="col">ที่อยู่</th>
                                <th scope="col">จำนวนสมาชิก</th>
                                <th scope="col">จำนวนที่ดิน</th>
                                <th scope="col">เครื่องมือ</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) :?>
                                    <tr>
                                        <th scope="row"><?=$key+1;?></th>
                                        <td><?=$value['person_name'].' '.$value['person_lastname'] ?></td>
                                        <td>บ้านเลขที่ <?=$value['house_number'] .' หมู่ '. $value['house_moo'];?></td>
                                        <td>5 คน</td>
                                        <td>2 แปลง</td>
                                        <td>
                                            <div class="buttons">
                                                <a href="<?=base_url('house/manage/'.$value['house_id']);?>" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
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
  