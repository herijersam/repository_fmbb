@include('admin.header-match')

<section id="page-content">

    <!-- Message -->
    @include('admin.notification')
    <!-- end Message -->
					    <div class="row">
					        <div class="col-lg-6">
					            <div class="panel">
					            	 <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Choisir l'équipe A</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Utiliser la liste déroulante pour parcourir la liste des équipes ou recherchées dans la barre de recherche.</p>
                                        <form class="form-horizontal form-bordered" method="POST" action="{{route('new.match')}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <div class="form-group">
                                                <label class="control-label col-md-4">L'équipe A ( à domicile ) </label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <select data-placeholder="Choisir une equipe..." class="demo-chosen-select" name="equipe1">
                                                        @foreach($equipes as $eq)
                                                            <option value="{{$eq->SIGLE}}">{{$eq->SIGLE}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                    </div>
					            </div>
					        </div>

					         <div class="col-lg-6">
					            <div class="panel">
					            	 <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Choisir l'équipe B</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Utiliser la liste déroulante pour parcourir la liste des équipes ou recherchées dans la barre de recherche.</p>
                                       
                                            <div class="form-group">
                                                <label class="control-label col-md-4">L'équipe B ( exterieur ) </label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <select data-placeholder="Choisir une equipe..." class="demo-chosen-select" name="equipe2">
                                                        @foreach($equipes as $eq)
                                                            <option value="{{$eq->SIGLE}}">{{$eq->SIGLE}}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                    </div>
					            </div>
					        </div>
					     </div>	

					     <div class="row">
					     	<div class="col-lg-6">
        						<div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Phase de jeu</h3>
                                    </div>
                                    <div class="panel-body">
                                        @if($hidden == true)
                                        <div class="form-group">
                                                <label class="control-label col-md-4"> Type de jeu </label>
                                                <div class="col-md-8">
                                                    <!-- Bootstrap Select : Info -->
                                                    <!--===================================================-->
                                                    <select name="phase" class="form-control" data-style="btn-info">
                                                        <option value="Match Amical">Match Amical</option>
                                                        <option value="Match caritatif">Match caritatif</option>
                                                        <option value="Match de préparation">Match de préparation</option>
                                                        <option value="Autres">Autres...</option>
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                        </div><br><br>
                                        @else
                                        <div class="form-group">
                                                <label class="control-label col-md-4"> Phase </label>
                                                <div class="col-md-8">
                                                    <!-- Bootstrap Select : Info -->
                                                    <!--===================================================-->
                                                    <select name="phase" class="form-control" data-style="btn-info">
                                                        <option value="phase de groupe">Phase de groupe</option>
                                                        <option value="quart de final">Quart de final</option>
                                                        <option value="demi final">Demi final</option>
                                                        <option value="final">Final</option>
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
        					</div>

        					<div class="col-lg-6">
        						<div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Lieu/Stade du rencontre</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Lieu : </label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="Terrain..." name="terrain">
                                                <small class="help-block">Insérer le lieu/Terrain du rencontre</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        					</div>

					     </div>

					     <div class="row">
        					<div class="col-lg-6">
        						<div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Date du match/rencontre</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>La date de la rencontre/match ne peut être inférieur à la date d'aujourd'hui.</p>
                                        <!--===================================================-->
                                        <br>
                                        <hr>
                                        <br>
                                        <!--Bootstrap Datepicker : input-->
                                        <!--===================================================-->
                                            <div class="input-group date">
                                                <input id="datepicker" type="text" class="form-control" name="date" value="{{date('d M, Y')}}">
                                                <span class="input-group-addon"><i class="fa fa-clock-o fa-lg"></i></span> 
                                            </div>
                                        <!--===================================================-->
                                    </div>
                                </div>
        					</div>

        					<div class="col-lg-6">
        						<div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Heure du coup d'envoi du match/rencontre </h3>
                                    </div>
                                    <div class="panel-body">
                                         <p>Heure de la rencontre entre les deux équipes</p>
                                        <br>
                                        <p class="text-thin mar-btm"><b>AM : avant midi - PM : Après midi</b></p>
                                        <!--Bootstrap Timepicker : Text Input-->
                                        <!--===================================================-->
                                        <div class="input-group date">
                                            <input id="timepicker" type="text" class="form-control" name="heure">
                                            <span class="input-group-addon"><i class="fa fa-clock-o fa-lg"></i></span> 
                                        </div>
                                        <hr>
                                        <!--===================================================-->
                                    </div>
                                </div>
        					</div>

        					 <div class="col-sm-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Sauvegarde des modifications</h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Buttons with label-->
                                        <!--===================================================-->
                                        <button type="submit" class="btn btn-info btn-rounded btn-labeled fa fa-floppy-o">Sauvegarder</button>
                                        <button type="reset" class="btn btn-danger btn-labeled fa fa-times">Annuler</button>
                                        @if($hidden == true)
                                         <a href="{{route('show.event')}}" class="btn btn-warning btn-labeled fa fa-exclamation-triangle pull-right">Retour</a>
                                        @else
                                        <a href="{{route('admin.calendrier',Session::get('idevent'))}}" class="btn btn-warning btn-labeled fa fa-exclamation-triangle pull-right">Retour</a>
                                        @endif
                                        <!--===================================================-->
                                    </div>
                                </div>
                            </div>
                            </form>
					     </div>
 </section>

@include('admin.footer-match')