<?=$this->render('partials/head');?>
<?=$this->render('partials/header');?>
<?=$this->render('partials/sidebar');?>

<!-- Main Content -->
<div class="main-content">
    <section class="section">
        <div class="section-header">
          <h1>Kullanıcı Listesi</h1>
        </div>

        <div class="section-body">
        <div class="row">
            <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h4>Kullanıcı Listesi</h4>
                  <a href="/user/create" class="btn btn-primary  btn-block btn-icon-split">Yeni Kayıt</a>
                </div>
                <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                    <thead>
                        <tr>
                        <th class="text-center">#</th>
                        <th>İsim Soyisim</th>
                        <th>E-Mail</th>
                        <th>Kullanıcı Adı</th>
                        <th>İşlem</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $sayi=0; foreach($users as $user){ $sayi++; ?>
                    <tr>
                        <td><?=$sayi?></td>
                        <td><?=$user->fullname?></td>
                        <td><?=$user->email?></td>
                        <td><?=$user->username?></td>
                        <td>                            
                            <a href="/user/edit/<?=$user->id?>&status=update" class="btn btn-icon btn-primary"><i class="far fa-edit"></i></a>
                            <a href="#" onClick="userDelete(<?=$user->id?>)" class="btn btn-icon btn-danger"><i class="fas fa-times"></i></a>
                            <a href="/user/edit/<?=$user->id?>&status=show" class="btn btn-icon btn-info"><i class="fas fa-info-circle"></i></a>
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
  function userDelete(id){
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
            url			: "userTasks.php",
            data		: {task:'userDelete',id:id},
            success		: function(ajaxData){
              if(ajaxData){
              swal({
                  text: "Poof! Sildim!",
                  icon: "success"
              }).then(function() {
                  window.location.href = "listUser.php";
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
