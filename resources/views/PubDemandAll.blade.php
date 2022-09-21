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
            @include('admin.demande.pubA')
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
     console.log('Pays: '+pays+' villes: '+villes+' nom: '+nom+' phone: '+phone+' mail:'+mail);
    });
</script>