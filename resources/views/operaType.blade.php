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
            @include('admin.biens.typesopera')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    //Nouveau gerant
    $('.send').click(function(){
     var operations = $('#operations').val();
     var opera = {opera:operations};
     if (operations!='') {
         $.ajax({
            url:'addOpera',
            data:opera,
            dataTypes:'json',
            beforeSend:function(){
                $('.alertSend').text('Chargement...'); 
                $('.send').prop('disabled', true); 
            },
            success:function(data){
               if (data.res==1) {
                    $('.alertSend').text('Opérations ajoutée avec succès'); 
                    $('.send').prop('disabled', false); 
                    $('#operations').val("");
                    window.location.href='operaType';
                }else{
                    $('.alertSend').text('Cette opération existe déjà'); 
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