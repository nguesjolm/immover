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
            @include('admin.gerant.new')
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
     var gerant = {nomg:nom,mailg:mail,phoneg:phone,villesg:villes,paysg:pays};
     console.log('Pays: '+pays+' villes: '+villes+' nom: '+nom+' phone: '+phone+' mail:'+mail);
     if (pays!=''&&villes!=''&&nom!=''&&mail!=''&&phone!='') {
         $.ajax({
             url:'Addgerant',
             data:gerant,
             dataTyype:'json',
             beforeSend:function(){
                $('.alertSend').text('Chargement...'); 
                $('.send').prop('disabled', true); 
             },
             success:function(data){
                 
                if (data.res==0) {
                   $('.alertSend').text('Ce gérant existe déjà,Veuillez changer le mail'); 
                   $('.send').prop('disabled', false); 
                }else{
                   $('.alertSend').text('Gérant ajouté avec succès'); 
                   $('#mail').val('');
                   $('#phone').val('');
                   $('#nom').val('');
                   $('#pays').val('');
                   $('#villes').val('');
                   $('.send').prop('disabled', false); 
                }
             },
             error:function(data){
                 console.log("Error");
             }
         });
     }
    });
</script>