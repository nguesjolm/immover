@include('layouts.header_admin')
 @include('agent.sign')
@include('layouts.footer_admin')
<script type='text/javascript'>
$(document).ready(function(){
    //Boutton de connection
    $('.sign').click(function(){
       var pass = $('.password').val();
       if (pass!='') {
           console.log('connection');
           $('.signAlert').text('');
           //Check Mot de passe
           $.ajax({
              url:'conectagent',
              method:'get',
              data:{pass:pass},
              dataType:'json',
              beforeSend:function(){
                 $('.signAlert').text('Chargement...'); 
                 $('.sign').prop('disabled', true); 
              },
              success:function(data){

                  if (data.conect==0) {
                     $('.passAlert').text("Le Mot de passe saisir est incorrecte"); 
                  }else{
                     console.log('Mot de passe correcte');
                     $('.passAlert').text("");  
                     window.location.href='agentcount';
                  }
                  $('.signAlert').text(''); 
                  $('.sign').prop('disabled', false); 
              },
              error:function(data){
                  console.log('error');
              }
           });
       }else{
           console.log('alert');
           $('.signAlert').text("Veuillez saisir votre mot de passe");
       }
    });

});
</script>