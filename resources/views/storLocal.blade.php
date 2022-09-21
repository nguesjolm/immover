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
            @include('admin.biens.quartier')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    //Lier une ville à un quartier
    $('#villeSelect').change(function(){
     var ville = $(this).children("option:selected").val();
     $('#villeSelected').val(ville);
     console.log(ville);
    });

    $('.Addquart').click(function(){
     var quartier = $('#quartier').val();
     var ville = $('#villeSelected').val();
     console.log('ville: '+ville+" quartier: "+quartier);
     if (quartier=='') {
       $('.alertLink').text("Veuillez saisir le nom du quartier"); 
     }
     if (ville=='') {
       $('.alertLink').text("Veuillez selectionner une ville");  
     }
     if (ville!=''&&quartier!='') {
        $.ajax({
         url:'Addquart',
         method:'get',
         data:{quartier:quartier,ville:ville},
         dataType:'json',
         beforeSend:function(){
            $('.alertLink').text('Chargement...'); 
            $('.Addvile').prop('disabled', true); 
         },
         success:function(data){
            if (data.res==0) {
             console.log("Ce quartier est déjà affecté à cette ville"); 
             $('.alertLink').text('Ce quartier est déjà affecté à cette ville');
             $('.Addvile').prop('disabled', false); 
            }else{
             console.log('Quartier ajouté avec succès');
             Swal.fire('Quartier ajouté avec succès');
             window.location.href='storLocal';
            } 
         },
         error:function(data){console.log('error');}
        });
     }
    });

    //Select2
    $('#villeSelect').select2();
</script>