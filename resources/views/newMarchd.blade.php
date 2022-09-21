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
            @include('admin.marchand.new')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    //Nouveau gerant
    $('.send').click(function(){
     var pays = $('#pays').val();
     var villes = $('#villes').val();
     var nom = $('#nom').val();
     var phone = $('#phone').val();
     var mail = $('#mail').val();
     var marchand = {nomM:nom,villesM:villes,phoneM:phone,mailM:mail,paysM:pays};
     console.log('Pays: '+pays+' villes: '+villes+' nom: '+nom+' phone: '+phone+' mail:'+mail);
     $.ajax({
         url:'AddMarchd',
         data:marchand,
         dataType:'json',
         beforeSend:function(){
           $('.alertSend').text('Chargement...');
           $('.send').prop('disabled', true); 
         },
         success:function(data){
           if (data.res=='0') {
             Swal.fire('Marchand ajouté avec succès'); 
             $('.alertSend').text('');
             $('.send').prop('disabled', false); 
             $('#pays').val("");
             $('#villes').val("");
             $('#nom').val("");
             $('#phone').val("");
             $('#mail').val("");
           }else{
             Swal.fire('Ce marchand existe déjà'); 
             $('.alertSend').text('');
             $('.send').prop('disabled', false);  
           }
         },
         error:function(data){
             console.log("eror");
         }
     });
    });
</script>