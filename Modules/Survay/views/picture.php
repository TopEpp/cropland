<?=$this->extend("layouts/main")?>

<?=$this->section("content")?>
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="text-dark"><a href="<?php echo base_url('survay')?>">ข้อมูลแบบสอบถาม</a> > จัดการข้อมูลแบบสอบถาม</h4>
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
                        <div class="btn-group" role="group" aria-label="menu-nabbar">
                            <button type="button" class="btn btn-secondary" onclick="location.href='<?=base_url('survay/manage/'.@$interview_id);?>';">ข้อมูลเบื้องต้น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/land/'.@$interview_id);?>';">ข้อมูลการใช้ที่ดิน</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support/'.@$interview_id);?>';">ข้อมูลการส่งเสริมของ สวพส</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/support-other/'.@$interview_id);?>';" >ข้อมูลการส่งเสริมของหน่วยงานอื่น</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/problem/'.@$interview_id);?>';">ปัญหาด้านการเกษตร</button>
                            <button type="button" class="btn btn-secondary" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/need/'.@$interview_id);?>';">ความต้องการส่งเสริม</button>
                            <button type="button" class="btn btn-info" <?=@$interview_id ? '':'disabled' ?> onclick="location.href='<?=base_url('survay/picture/'.@$interview_id);?>';">รูปภาพ</button>
                        </div>
                        
                        <div class="p-2 border">
                            <br>
                            <h6>ข้อมูลรูปภาพ</h6>
                                <input type="hidden" id="interview_id" value="<?=$interview_id;?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">                                            
                                                <h4>รูปภาพเจ้าของแปลง (2 รูป)</h4>
                                                <div class="card-header-action">                                        
                                                    <!-- <a href="#" class="btn btn-info" onclick="addLand()">เลือกไพล์</a> -->
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?=site_url('/survay/upload_owner_area/'.$interview_id);?>" class="dropzone" id="mydropzone1">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />                                                        
                                                    </div>
                                                 
                                        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>รูปภาพแปลง (2 รูป)</h4>
                                                <div class="card-header-action">                                        
                                                    <!-- <a href="#" class="btn btn-info" onclick="addLand()">เลือกไพล์</a> -->
                                                </div>
                                            </div>
                                            <div class="card-body">
                                                <form action="<?=site_url('/survay/upload_area/'.$interview_id);?>" class="dropzone" id="mydropzone2">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple />
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="button" onclick="onclicks()" class="btn btn-info">บันทึก</button>
                                        <button type="button" class="btn btn-danger" onclick="location.href='<?=base_url('survay');?>';" >ยกเลิก</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</section>
<?=$this->endSection()?>

<?=$this->section('css')?>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
<style>
    .dropzone .dz-preview .dz-image {
        width: 200px;
        height: 200px;
    }
    .dropzone {
     zoom: 0.4;
 }
</style>
<?=$this->endSection()?>

<?=$this->section("scripts")?>
<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script>
    
    Dropzone.autoDiscover = false;

    if ($('#mydropzone1').length) {
        var dropzone = new Dropzone("#mydropzone1", {
            url: null,
            maxFiles: 2,
            autoProcessQueue: false,
            addRemoveLinks:true,
            acceptedFiles: "image/*",
            dictInvalidFileType: "upload only JPG/PNG",
            clickable: true,
            createImageThumbnails:false,
            dictDefaultMessage: "เลือกรูปภาพ",
            thumbnailMethod:'crop',
            resizeMethod:'crop',
            
            init: function() {
                myDropzone = this;
                $.ajax({
                    url: '/survay/load-image?type=owner',
                    method: 'GET',
                    data: {interview: $("#interview_id").val()},
                    dataType: 'json',
                    success: function(response){
                       
                        $.each(response, function(key,value) {

                            var mockFile = { name: value.name, size: value.size};
                            myDropzone.emit("addedfile", mockFile);
                            myDropzone.emit("thumbnail", mockFile, value.path);
                            


                            myDropzone.emit("complete", mockFile);
                        });
                    }
                });
                

                this.on("removedfile", function(files, response) {                  
                
                    console.log(files);
                   
                    // for(var i=0;i<file_up_names.length;++i){

                    //     if(file_up_names[i]==file.name) {

                    //         $.post('delete_file.php', 
                    //             {file_name:file_up_names[i]},
                    //         function(data,status){
                    //             alert('file deleted');
                    //             });
                    //     }
                    // }
                    
                });
                this.on("success", function(files) {  
                    window.location.reload();
                });
             
            }
        
        });
        dropzone.on("maxfilesexceeded", function (file) {
            dropzone.removeAllFiles();
            dropzone.addFile(file);
        });


    }

    if ($('#mydropzone2').length) {
        var dropzone1 = new Dropzone("#mydropzone2", {
            url: null,
            maxFiles: 2,
            autoProcessQueue: false,
            addRemoveLinks:true,
            acceptedFiles: "image/*",
            dictInvalidFileType: "upload only JPG/PNG",
            dictDefaultMessage: "เลือกรูปภาพ",
            createImageThumbnails:false,
            init: function() {
                myDropzone1 = this;
                $.ajax({
                    url: '/survay/load-image?type=area',
                    method: 'GET',
                    data: {interview: $("#interview_id").val()},
                    dataType: 'json',
                    success: function(response){
                       
                        $.each(response, function(key,value) {

                            var mockFile = { name: value.name, size: value.size};
                            myDropzone1.emit("addedfile", mockFile);
                            myDropzone1.emit("thumbnail", mockFile, value.path);
                            myDropzone1.emit("complete", mockFile);
                        });
                    }
                });
                // this.on("success", function(files, response) {                  
                //     $("#pic_area").append('<input type="hidden" name="pic_area['+response.interview_id+']" value="'+response.path+'">');            
                // });
             
            }
        });
        dropzone1.on("maxfilesexceeded", function (file) {
            dropzone1.removeAllFiles();
            dropzone1.addFile(file);
        });

    }

    //submit pic
    function onclicks(){
        dropzone.processQueue();
        dropzone1.processQueue();
    }
</script>
<?=$this->endSection()?>
  