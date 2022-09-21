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
            @include('admin.biens.newBiens')
        </div>
    </div>

</main>

@include('layouts.footer_admin')
<script type='text/javascript'>
    
    /**
     -----------------
     MODULE DE FILTRE
     -----------------
     */
    //Villes by pays
    $('#paySelect').change(function(){
     var pays = $(this).children("option:selected").val();
     var datas = {pays:pays};
     console.log(pays);
     $.ajax({
         url:'villebypays',
         method:'get',
         data:datas,
         dataType:'html',
         beforeSend:function(){
             $(".villelablel").text('Chargement...');
         },
         success:function(data){
            $(".villelablel").text('Villes');
            $('#villes').html(data);
         },
         error:function(data){
             console.log("Error");
         }
     });
     
    });
    //Quartier by ville
    $("#villes").change(function(){
        var ville = $(this).children("option:selected").val();
        console.log(ville);
        var datas = {villes:ville};
        $.ajax({
            url:'quartierville',
            data:datas,
            method:'get',
            dataType:'html',
            beforeSend:function(){
                $('.quartierLable').text("Chargement...");
            },
            success:function(data){
                console.log("Succès");
                $('.quartierLable').text("Quartier");
                $("#quartier").html(data);
            },
            error:function(data){
              console.log('Error');
            }
        });
    });

   $("#operations").select2();
   $("#typesbiens").select2();
   $("#gerant").select2();
   $("#paySelect").select2();
   $("#villes").select2();
   $("#quartier").select2();
</script>