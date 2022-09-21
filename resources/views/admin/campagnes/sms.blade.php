

<main class="main" id="top">


      <div class="container" data-layout="container">
        <div class="row justify-content-center pt-6">
          <div class="col-sm-10 col-lg-7 col-xxl-5"><a class="d-flex flex-center mb-4" href="#">
            <span class="text-sans-serif font-weight-extra-bold fs-4 d-inline-block CampgNew">SMS Marketing</span></a>
            <div class="card theme-wizard mb-5" data-wizard data-controller="#wizard-controller" data-error-modal="#error-modal">
              <div class="card-header bg-light pt-3 pb-2">
                Recharger vos unités SMS-PRO
              </div>
              <div class="card-body py-4">
                <div class="tab-content">
                  <div class="tab-pane active px-sm-3 px-md-5" id="bootstrap-wizard-tab1">

                    <div class="alert alert-warning" role="alert">
                      Solde SMS : 100 SMS
                        <br>
                     <b><span class="text-info">*Tarifs SMS</span><br>
                       National : 1 SMS à 20 fcfa<br>
                       International : 1 SMS à 40 fcfa
                      </b>
                    </div>

                    
                  </div>
                </div>
              </div>
              <div class="card-footer bg-light" id="wizard-controller">
                <div class="px-sm-3 px-md-5">
                  <ul class="pager wizard list-inline mb-0">

                    <li class="text-center">
                      <label class="text-center" >
                         Maximiser vos ventes en envoyant à vos clients et vos prospects des sms promotionnels
                      </label>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </main>

<script type="text/javascript">
  $(".CampgNew").click(function(){
    loadingScreen();
    $("#main_content").load("/CampgNew");
  });
</script>
<!--<script src="{{ asset('js/abonnement_sms.js') }}"></script>-->
<script type="text/javascript">
    
    //---------------------------- Calcul automatque du montant à payer
      $('#montant').keyup(function(){
      var type_SMS = $('.typeHidden').val();
      var smsNat = $('.smsNat').val();
      var smsInter = $('.smsInter').val();
      var volume = $(this).val();
      console.log('Nat: '+smsNat+' Inter: '+smsInter+' Type: '+type_SMS);
      if (volume!='') {
        if (type_SMS==1) {
          //SMS National
          var calcul = volume*smsNat;
          $('.alertM').html('Montant à payer : <b><span class="paySMS">'+calcul+' xof</span></b><br>');
        }else{
          //SMS International
          var calcul = volume*smsInter;
          $('.alertM').html('Montant à payer : <b><span class="paySMS">'+calcul+' xof</span></b><br>');
        }
      }else{
        $('.alertM').html('<span></span>');
      }

    });

    //------------ En cours de chargement
    $('.OkAl').hide();

    $(".Suscribe_sms").click(function(){
      $('.Suscribe_sms').text("Chargement en cours...");
      $('.OkAl').show();
    });

    $('.OkAl').click(function(){
      $('.Suscribe_sms').text('Se Recharger');
      $('.OkAl').hide();
    });
    
    

    //------- Type de SMS
      $("select.typeSMS").change(function(){
       var typeSMS = $(this).children("option:selected").val();
       console.log(typeSMS);
       $('.typeHidden').val(typeSMS);
     });


</script>
