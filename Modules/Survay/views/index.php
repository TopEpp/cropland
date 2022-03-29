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
                                <tr>
                                    <th scope="row">1</th>
                                    <td>11636 - บ้านเทอคี</td>
                                    <td>พื้นที่โครงการขยายผลโครงการหลวงเพื่อแก้ปัญหาพื้นที่ปลูกฝิ่นอย่างยั่งยืน </td>
                                    <td>นายปราณต์เซธญ์ แสนใหม่	</td>
                                    <td>19 ก.พ. 2564</td>
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
  