@include('layouts.header_admin')
 <!-- ===============================================-->
<!--    Main Content-->
<!-- ===============================================-->
<main class="main" id="top">

    
            <!-- Navbar -->
            @include('gerant.header')
            <!-- Pages courant::Tableau de board -->
            @include('gerant.biensNew')
</main>

@include('layouts.footer_admin')

<script type='text/javascript'>

    /**
     * ---------------
     * AJOUT DE BIENS
     * ---------------
     */
    //Envoie de biens
    $('.send').click(function(){
        event.preventDefault();
        var formData = new FormData(document.getElementById('addbiensform'));
        $.ajax({
            url:'AddBiens',
            method:'post',
            data:formData,
            dataType:'json',
            cache:false,
            processData:false,
            contentType:false,
            beforeSend:function(){
              $('.send').text('Chargement...');
              $('.send').prop('disabled', true); 
            },
            success:function(data){
                if (data.res=='1') {
                 Swal.fire(data.msg);
                 window.location.href='bienGnew';
                }else{
                 Swal.fire(data.msg);
                }
                
                $('.send').text('Ajouter');
                $('.send').prop('disabled', false); 
            },
            error:function(){
                console.log('error');
            }
        });
    });
    
    /**
     -----------------
     MODULE DE FILTRE
     -----------------
     */
    //Save biens gerant
    $('.send').click(function(){

    });
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
