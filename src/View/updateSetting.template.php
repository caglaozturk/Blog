<?=$this->render('partials/head');?>
<?=$this->render('partials/header');?>
<?=$this->render('partials/sidebar');?>

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Ayar Güncelle</h1>
      </div>

      <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body"></div>
                    <form action="/setting/update/<?=$setting->id?>" method="post" enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">İsim Soyisim</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="full_name" class="form-control" value="<?=$setting->full_name?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook adresi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="facebook" class="form-control" value="<?=$setting->facebook?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Twitter adresi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="twitter" class="form-control" value="<?=$setting->twitter?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Linkedin adresi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="linkedin" class="form-control" value="<?=$setting->linkedin?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Instagram adresi</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="instagram" class="form-control" value="<?=$setting->instagram?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telefon</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" name="phone" class="form-control" value="<?=$setting->phone?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">E Mail</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="email" name="email" class="form-control" value="<?=$setting->email?>">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Active</label>
                            <div class="custom-switches-stacked mt-2">
                                <label class="custom-switch">
                                <input type="radio" name="isActive" value="1" class="custom-switch-input" <?php if($setting->isActive == 1) echo "checked" ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Active</span>
                                </label>
                                <label class="custom-switch">
                                <input type="radio" name="isActive" value="0" class="custom-switch-input" <?php if($setting->isActive== 0) echo "checked" ?>>
                                <span class="custom-switch-indicator"></span>
                                <span class="custom-switch-description">Active Değil</span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Resim</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" id="projedosya" name="project_file" multiple>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Hakkımda</label>
                            <div class="col-sm-12 col-md-7">
                            <textarea class="summernote" name="about_me" id="editor" style="width:100%; height:200px;"><?=$setting->about_me?></textarea>
                            </div>
                        </div>
                        
                        <?php if($_GET['status'] == "update"){ ?>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                <div class="col-sm-12 col-md-7">
                                <input type="hidden" name="setting_id" value="<?=$setting->id?>">
                                <button class="btn btn-primary" name="submit">Kaydet</button>
                                </div>
                            </div>
                        <?php } ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

<?=$this->render('partials/footer');?>
<script src="vendor/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'editor' );
</script>

<?php 
if (strlen($dosyayolu)>10) {?>
    <script>
        $(document).ready(function () {
            var url1='<?php echo $dosyayolu ?>'
            $("#projedosya").fileinput({
                'theme': 'explorer-fas',
                'showUpload': false,
                'showCaption': true,
                'showDownload': true,
            //  'initialPreviewAsData': true,
            allowedFileExtensions: ["jpg", "png", "jpeg", "mp4", "zip", "rar"],
            initialPreview: [
            '<img src="<?php echo $dosyayolu ?>" style="height:100px" class="file-preview-image" alt="Dosya" title="Dosya">'
            ],
            initialPreviewConfig: [
            {downloadUrl: url1,
                showRemove: false,
            },
            ],
        });

        });
    </script>
<?php } else { ?>
    <script>
        $(document).ready(function () {
            $("#projedosya").fileinput({
                'theme': 'explorer-fas',
                'showUpload': false,
                'showCaption': true,
                'showDownload': true,
            //  'initialPreviewAsData': true,
            allowedFileExtensions: ["jpg", "png", "jpeg", "mp4", "zip", "rar"],
        });

        });
    </script>
<?php } ?>

</body>
</html>