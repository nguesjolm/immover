<!-- Tableau de board -->
<div class="card bg-light mb-3">
  <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!">
        <svg class="svg-inline--fa fa-chart-pie fa-w-17 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
        <strong class="text-warning">
          ImmOver
        </strong>
      </a>, Modifier un bien</strong>
      </p>
  </div>
</div>
<div>



<div class="card mb-3">
            <div class="card-header">
             <a class="mb-0" href="dispBiens"><= Retour :</a> {{ReadBiensID($idbiens)->libele}}</b>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">

                    <form action="UpdBienSelect" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Types d'opérations -->
                        <div class="form-group">
                         <label for="operations">Types d'opérations : {{ReadOperaID(ReadBiensID($idbiens)->typesoperations_idtypesoperations)->operation}} </label>
                         <select class="form-control" id="operations" name="operations">
                            <option>Choisir</option>
                            @foreach(ReadOpera() as $opera)
                            <option value="{{$opera->idtypesoperations}}">{{$opera->operation}}</option>
                            @endforeach
                         </select>

                         <input type='hidden' name='operaS' value='{{ReadBiensID($idbiens)->typesoperations_idtypesoperations}}'>

                        </div>

                        <!-- Types de biens -->
                        <div class="form-group">
                         <label for="typesbiens">Types de biens : {{ReadTypesID(ReadBiensID($idbiens)->typesbiens_idtypes)->types}}</label>
                         <select class="form-control" id="typesbiens" name="typesbiens">
                            <option>Choisir</option>
                            @foreach(ReadTypebiens() as $types)
                            <option value="{{$types->idtypes}}">{{$types->types}}</option>
                            @endforeach
                         </select>

                         <input type='hidden' name='typebS' value='{{ReadBiensID($idbiens)->typesbiens_idtypes}}'>

                        </div>

                        <!-- Gérants de biens -->
                        <div class="form-group">
                         <label for="gerant">Gérant : {{ReadgerantID(ReadBiensID($idbiens)->gerants_idgerant)->nom}}</label>
                         <select class="form-control" id="gerant" name="gerant">
                            <option>Choisir</option>
                            @foreach( ReadGerant() as $gerant)
                            <option value="{{$gerant->idgerant}}">{{$gerant->nom}} - {{$gerant->villes}}</option>
                            @endforeach
                         </select>
                         
                         <input type='hidden' name='gerantS' value='{{ReadBiensID($idbiens)->gerants_idgerant}}'>
                         

                        </div>

                        <!-- Pays -->
                        <div class="form-group">
                         <label for="paySelect">Pays :{{ReadPaysID(ReadBiensID($idbiens)->pays)->pays}} </label>
                         <select class="form-control" id="paySelect" name="pays">
                            <option>Choisir</option>
                            @foreach(ReadPaysAll() as $pays)
                            <option value="{{$pays->idpays}}">{{$pays->pays}}</option>
                            @endforeach
                         </select>

                         <input type='hidden' name='paysS' value='{{ReadBiensID($idbiens)->pays}}'>

                        </div>

                        <!-- Villes -->
                        <div class="form-group">
                         <label for="villes" class="villelablel">Villes: {{ReadVillID(ReadBiensID($idbiens)->villes)->ville}}</label>
                         <select class="form-control" id="villes" name="villes">
                            <option>Choisir</option>
                            @foreach(ReadVille() as $ville)
                            <option value="{{$ville->idvilles}}">{{$ville->ville}}</option>
                            @endforeach
                         </select>
                         
                         <input type='hidden' name='villesS' value='{{ReadBiensID($idbiens)->villes}}'>


                        </div>

                        <!-- Quartier -->
                        <div class="form-group">
                         <label for="quartier" class="quartierLable">Quartier: {{ReadQuartierID(ReadBiensID($idbiens)->quartier)->nom}}</label>
                         <select class="form-control" id="quartier" name="quartier">
                            <option>Choisir</option>
                            @foreach(ReadQuart() as $quart)
                            <option value="{{$quart->idquartier}}">{{$quart->nom}}</option>
                            @endforeach
                         </select>
                         
                         <input type='hidden' name='quartierS' value='{{ReadBiensID($idbiens)->quartier}}'>


                        </div>

                        <!-- Libele -->
                        <div class="form-group">
                         <label for="libele">Libele (Ex: Studio americain à Abobo Ndotré)</label>
                         <input class="form-control" name="libele" id="libele" type="text" 
                            value="{{ReadBiensID($idbiens)->libele}}" >
                        </div>

                        <!-- Prix -->
                        <div class="form-group">
                         <label for="prix">Coût (Fcfa)</label>
                         <input class="form-control" name="prix" 
                         id="prix" type="number" value="{{ReadBiensID($idbiens)->prix}}">
                        </div>

                        <!-- Résumé -->
                        <div class="form-group">
                         <label for="description">Resumé(Ex: 35.000 F/mois - 6 mois d'avances)</label>
                         <textarea class="form-control" name="resume" id="resume" rows="2">{{ReadBiensID($idbiens)->resume}}</textarea>
                        </div>

                        <!-- Description -->
                        <div class="form-group">
                         <label for="description">Description(Ex: Une chambre, une cuisine, un salon, une douche, un parking)</label>
                         <textarea class="form-control" name="descript" id="description" rows="3">{{ReadBiensID($idbiens)->descript}}</textarea>
                        </div>

                        <div class="row">
                          <!-- <div class="custom-file col-lg-6">
                           <label>8 Photos obligatoire</label>
                           <input class="form-control" name="files[]" type="file" multiple="multiple"  >
                          </div> -->
                          <input type="hidden" value="{{$idbiens}}" name="idbiens"> 

                            <!-- Image 1 -->
                            <div class="form-group col-l-4">
                                
                                <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img1}}" alt="" /></div>

                                <label for="img1">Photo 1</label>
                                <input class="form-control" name="img1" id="img1" type="file">

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img1}}" name="img1S"> 

                            </div>
                            

                            <!-- Image 2 -->
                            <div class="form-group col-l-4">
                                <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img2}}" alt="" /></div>
     

                                <label for="img2">Photo 2</label>
                                <input class="form-control" name="img2" id="img2" type="file" >

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img2}}" name="img2S"> 

                            </div>

                            <!-- Image 3 -->
                            <div class="form-group col-l-4">
                              <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img3}}" alt="" /></div>

                                <label for="img3">Photo 3</label>
                                <input class="form-control" name="img3" id="img3" type="file" >

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img3}}" name="img3S"> 

                            </div>

                            <!-- Image 4 -->
                            <div class="form-group col-l-4">

                                <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img4}}" alt="" /></div>

                                <label for="img4">Photo 4</label>
                                <input  class="form-control" name="img4" id="img4" type="file" >

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img4}}" name="img4S"> 

                            </div>

                            <!-- Image 5 -->
                            <div class="form-group col-l-4">
                               <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img5}}" alt="" /></div>


                                <label for="img5">Photo 5</label>
                                <input  class="form-control" name="img5" id="img5" type="file" >

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img5}}" name="img5S"> 
                            </div>

                            <!-- Image 6 -->
                            <div class="form-group col-l-4">
                               <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img6}}" alt="" /></div>

                                <label for="img6">Photo 6</label>
                                <input  class="form-control" name="img6" id="img6" type="file">

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img6}}" name="img6S"> 

                            </div>

                            <!-- Image 7 -->
                            <div class="form-group col-l-4">
                                <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img7}}" alt="" /></div>

                                <label for="img7">Photo 7</label>
                                <input  class="form-control" name="img7" id="img7" type="file" >

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img7}}" name="img7S"> 

                            </div>

                             <!-- Image 8 -->
                             <div class="form-group col-l-4">
                                <div class="avatar avatar-4xl"><img class="rounded-soft" src="{{ReadBiensID($idbiens)->img8}}" alt="" /></div>

                                <label for="img7">Photo 8</label>
                                <input  class="form-control" name="img8" id="img8" type="file" >

                                <input type="hidden" value="{{ReadBiensID($idbiens)->img8}}" name="img8S"> 

                             </div>

                        </div></br></br>

                        <button class="btn btn-primary mb-3 send" type="submit">Modifier</button>
                        <span class="text-danger alertSend"></span>

                    </form>
                  
                </div>
              </div>
            </div>
</div>