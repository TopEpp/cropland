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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>1</td>
                                    <td>10001</td>
                                    <td>10 ไร่</td>
                                    <td>ปลูกข้าว</td>
                                    <td>ชาญชัย วหคชลชี</td>
                                    <td>ป่าสงวนแห่งชาติ</td>
                                    <td>
                                        <div class="buttons">
                                            <a href="#" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>                                    
                                            <a href="#" class="btn btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

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
  