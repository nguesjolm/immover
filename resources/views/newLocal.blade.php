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
            @include('admin.biens.bienslocal')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    //Nouveau pays
    $('.newPays').click(function(){
     var paysdata = $('#pays').val();
     console.log('Pays: '+pays);
     var pays = {pays:paysdata};
     if (paysdata!='') {
         $.ajax({
             url:'Addpays',
             data:pays,
             dataType:'json',
             beforeSend:function(){
                $('.alert').text('Chargement...'); 
                $('.newPays').prop('disabled', true); 
             },
             success:function(data){
                if (data.res==0) {
                   $('.alert').text('Ce pays existe déjà'); 
                   $('.send').prop('disabled', false); 
                }else{
                   $('.alert').text('Pays ajouté avec succès'); 
                   $('#pays').val('')
                   $('.send').prop('disabled', false); 
                   window.location.href='newLocal';
                }
             },
             error:function(data){
                console.log("Error");
             }
         });
     }
    });

    //Lier un pays et une ville
    $('#paySelect').change(function(){
     var pays = $(this).children("option:selected").val();
     $('#paySelected').val(pays);
     console.log(pays);
    });

    $('.Addvile').click(function(){
     var ville = $('#ville').val();
     var pays = $('#paySelected').val();
     console.log('ville: '+ville+" pays: "+pays);
     if (ville=='') {
       $('.alertLink').text("Veuillez saisir le nom de la ville"); 
     }
     if (pays=='') {
       $('.alertLink').text("Veuillez selectionner un pays");  
     }
     if (ville!=''&&pays!='') {
        $.ajax({
         url:'AddVille',
         method:'get',
         data:{pays:pays,ville:ville},
         dataType:'json',
         beforeSend:function(){
            $('.alertLink').text('Chargement...'); 
            $('.Addvile').prop('disabled', true); 
         },
         success:function(data){
            if (data.conect==0) {
             console.log("La ville est déjà affecté à ce pays"); 
             $('.alertLink').text('Cette ville est déjà affectée à ce pays');
             $('.Addvile').prop('disabled', false); 
            }else{
             console.log('Ville ajouté avec succès');
             Swal.fire('Ville ajouté avec succès');
             window.location.href='newLocal';
            } 
         },
         error:function(data){console.log('error');}
        });
     }
    });

    //Select 2
    $('#paySelect').select2();

</script>