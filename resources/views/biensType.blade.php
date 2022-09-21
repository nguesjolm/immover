@include('layouts.header_admin')
 <!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">

    <div class="container-fluid" data-layout="container">
        <!-- Nav -->
        @include('admin.nav')
        <div class="content">
            <!-- Navbar -->
            @include('admin.navbar')
            <!-- Pages courant::New site touristique -->
            @include('admin.biens.typesbiens')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    //Nouveau gerant
    $('.send').click(function(){
      var bienV = $("#biens").val();
      var icons = $("#icons").val();
      var biens = {biens:bienV,icons:icons};
      console.log(biens);
      if (biens!=''&&icons!='') {
          $.ajax({
              url:'Addtypebiens',
              data:biens,
              dataType:'json',
              beforeSend:function(){
                $('.alertSend').text('Chargement...'); 
                $('.send').prop('disabled', true); 
              },
              success:function(data){
                  if (data.res==1) {
                    $('.alertSend').text('Type de biens ajouté avec succès'); 
                    $('.send').prop('disabled', false); 
                    $("#biens").val('');
                    window.location.href='biensType';
                  }else{
                    $('.alertSend').text('Ce types de biens existe déjà'); 
                    $('.send').prop('disabled', false); 
                  }
              },
              error:function(){
                  console.log("Error");
              }
          });
      }
    });
</script>