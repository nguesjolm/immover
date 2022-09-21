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
            @include('admin.agent.new')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    //Nouveau gerant
    $('.send').click(function(){
     var statut = $('#statut').val();
     var nom = $('#nom').val();
     var phone = $('#phone').val();
     var mail = $('#mail').val();
     var agent = {nomAg:nom,mailAg:mail,phoneAg:phone,statut:statut};
     console.log('nomAg: '+nom+' mailAg: '+mail+' phoneAg: '+phone+' statutAg: '+statut);
     if (nom!=''&&phone!=''&&mail!=''&&agent!=''&&statut!='') {
         $.ajax({
             url:'Addagent',
             data:agent,
             dataTyype:'json',
             beforeSend:function(){
                $('.alertSend').text('Chargement...'); 
                $('.send').prop('disabled', true); 
             },
             success:function(data){
                 
                if (data.res==0) {
                   $('.alertSend').text('Cet agent existe déjà, Veuillez changer de numéro'); 
                   $('.send').prop('disabled', false); 
                }else{
                   $('.alertSend').text('Agent ajouté avec succès'); 
                   $('#statut').val('');
                   $('#nom').val('');
                   $('#phone').val('');
                   $('#mail').val('');
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