@include('layouts.header')
  @include('clients.menu')
  @include('count.count')
@include('layouts.footer')
<script type="text/javascript">
//Modification compte Client
$(".updcount").click(function(){
   var nom = $('.nom').val();
   var mail = $('.mail').val();
   var phone = $('.phone').val();
   var pass = $('.pass').val();
   console.log("Nom: "+nom+" Mail: "+mail+" Phone: "+phone+" Pass: "+pass);
   var datas = {nom:nom,mail:mail,phone:phone,pass:pass};
   $.ajax({
     url:'updClts',
     method:'get',
     dataType:'json',
     data:datas,
     beforeSend:function(){
       $('.updcount').text('Chargement...');
       $('.updcount').prop('disabled', true); 
     },
     success:function(data){
       $('.updcount').text('Mettre à jour');
       $('.updcount').prop('disabled', false); 
       Swal.fire('Modifié avec succès');
     },
     error:function(){
       console.log("Error");
       $('.updcount').text('Mettre à jour');
       $('.updcount').prop('disabled', false);
       $('.alertcount').text("Problème de connection");
     }
   });
});
</script>
