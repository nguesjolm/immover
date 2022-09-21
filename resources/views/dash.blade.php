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
            <!-- Pages courant::Tableau de board -->
            @include('admin.dash')
        </div>
    </div>

</main>

@include('layouts.footer_admin')

<script type="text/javascript">

    //Boutton d'activation
    $('.activImmo').click(function(){
        $.ajax({
          url:'activBiens',
          method:'get',
          data:{activ:1},
          dataType:'json',
          beforeSend:function(){
             $('.activImmo').text('En cours...');
          },
          success:function(data){
                $('.activImmo').text("Boutton d'activation");
                Swal.fire({
                 icon: 'success',
                 title: 'Activation de biens',
                 text: 'Validé avec succès',
                 footer: '<b>Il est temps d\'ImmOver</b>'
                });
                window.location.href='dash';
          },
          error:function(data){
            console.log('Error')
          }

        });
    });

</script>
