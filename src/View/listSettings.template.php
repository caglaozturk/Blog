<?=$this->render('partials/head');?>
<?=$this->render('partials/header');?>
<?=$this->render('partials/sidebar');?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <h1>Ayarlar Listesi</h1>
        </div>

        <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Ayarlar Listesi</h4>
                    <a href="/setting/create" class="btn btn-primary  btn-block btn-icon-split">Yeni Kayıt</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1" style="text-align:center;">
                    <thead>
                        <tr>
                        <th class="text-center">
                            #
                        </th>
                        <th>İsim Soyisim</th>
                        <th>Email</th>
                        <th>Resmi</th>
                        <th>Hakkımda</th>
                        <th>Telefon</th>
                        <th>Durum</th>
                        <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sayi=0; foreach($settings as $setting){ $sayi++; ?>
                    <tr>
                        <td><?=$sayi?></td>
                        <td width="10%"><?=$setting->full_name?></td>
                        <td><?=$setting->email?></td>
                        <td><img src="<?='/uploads/'.$setting->profile_image_url?>" class="small-image" style="width:100px;height:100px;margin:10px;"></td>
                        <td width="35%"><?=substr($setting->about_me,0,200)?></td>
                        <td><?=$setting->phone?></td>
                        <td width="10%">
                            <?php if($setting->isActive == "0"){ ?>
                                <a href="#" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Active Değil</a>
                            <?php }else{ ?>
                                <a href="#" class="btn btn-icon icon-left btn-success"><i class="fas fa-check"></i> Active</a>
                            <?php } ?>
                        </td>
                        <td width="15%">                            
                            <a href="/setting/edit/<?=$setting->id?>&status=update" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                            <a href="#" onClick="settingSil(<?=$setting->id.',\''.$setting->profile_image_url.'\''?>)" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                            <a href="/setting/edit/<?=$setting->id?>&status=show" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
</div>

<?=$this->render('partials/footer');?>
<script>
  function settingSil(id,img_name){
    swal({
      title: 'Emin Misin?',
      text: 'Siliyorum Bak Tekrar Düşün!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
    }).then((willDelete) => {
      if (willDelete) {        
        $.ajax({
            type		: "GET",
            url			: "carTasks.php",
            data		: {task:'carDelete',id:id,img_name:img_name},
            success		: function(ajaxData){
            if(ajaxData>0){
              swal({
                  text: "Poof! Sildim!",
                  icon: "success"
              }).then(function() {
                  window.location.href = "listCar.php";
              });              
              }else{
                swal('Ah Üzgünüm! Bir Hata Oluştu!', {icon: 'error'});
              }
			}
        });
      } else {
        swal('Vazgeçtin!');
      }
    });
  }
</script>
</body>
</html>
