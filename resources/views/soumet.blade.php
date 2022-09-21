@include('layouts.header')
  @include('clients.menu')
  @include('clients.soumet')
@include('layouts.footer')
 <!-- Filters sidebar toggle button (mobile)-->
 <button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters-sidebar"><i class="fi-filter me-2"></i>Filters</button>
 <!-- Back to top button-->
 <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"></i></a>

<script type="text/javascript">
//Boutton de soummission
$('.soumt').click(function(){
  var code = $('.codeP').val();
  var phone = $('.phoneP').val();
  //alert('Code: '+code+' Phone: '+phone);
  if (phone!='') {
    $('.info').text('');
    $.ajax({
     url:'saveSoumt',
     method:'get',
     data:{codeP:code,phoneP:phone},
     dataType:'json',
     beforeSend:function(){
      $('.soumt').text('chargement...');
      $('.soumt').prop('disabled', true);
     },
     success:function(data){
      $('.phoneP').val('');
      $('.soumt').text('SOUMETTRE');
      Swal.fire(data.msg);
      $('.soumt').prop('disabled', false);
     },
     error:function(){
       console.log('error');
     }
    });
  } else {
    $('.info').text('Veuillez saisir votre numéro de téléphone');
  }
  
});

 

</script>