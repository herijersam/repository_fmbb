@include('admin.header-match')
<!--Page content-->
                    <!--===================================================-->
                    <section id="page-content">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Ajouter un événement ou une nouvelle compétition</h3>
                                    </div>
                                    <!-- BASIC FORM ELEMENTS -->
                                    <!--===================================================-->
                                    <form class="panel-body form-horizontal" method="post" action="{{route('method.addevent')}}" enctype="multipart/form-data" 
                                data-upload-template-id="template-upload-1" data-download-template-id="template-download-1">
                                        <!--Text Input-->
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Nom de l'événement ou compétition</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="événement..." name="titre" required="">
                                                <small class="help-block">Insérer le nom complet de l'événement (ex: Coupe des clubs champions de l'océan Indien )</small>
                                            </div>
                                        </div>
                                         <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Lieu Compétition</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" placeholder="Lieu..." name="lieu">
                                                <small class="help-block">Insérer le lieu de la compétition (ex: Antananarivo, Madagascar )</small>
                                            </div>
                                        </div>
                                        <!--Textarea-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Description</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input" rows="9" class="form-control" placeholder="la description de l'événement..." name="description"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Types de l'événement ou Compétition</label>
                                            <div class="col-md-9">
                                                <div class="radio">
                                                    <!-- Inline Icon Radios Buttons -->
                                                    <!--===================================================-->
                                                    <label class="form-radio form-icon btn btn-danger btn-labeled form-text active">
                                                    <input type="radio" name="type" value="Championnat" checked="checked"> Championnat
                                                    </label>
                                                    <label class="form-radio form-icon btn btn-danger btn-labeled form-text">
                                                    <input type="radio" name="type" value="Coupe"> Coupe
                                                    </label>                                                
                                                    <label class="form-radio form-icon btn btn-danger btn-labeled form-text">
                                                    <input type="radio" name="type" value="Ligue"> Ligue
                                                    </label>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Les catégories participants</label>
                                            <div class="col-md-9">
                                                <div class="checkbox">
                                                    <!-- Inline Icon Checkboxes -->
                                                    @foreach($listescategories as $listes)
                                                    @if($listes->libellecategorie == $listescategories->first()->libellecategorie)
                                                        <label class="form-checkbox form-icon btn btn-success btn-labeled active">
                                                        <input type="checkbox" name="participant[]" value="{{$listes->libellecategorie}}" checked=""> {{$listes->libellecategorie}} </label>
                                                    @else
                                                        <label class="form-checkbox form-icon btn btn-success btn-labeled active">
                                                        <input type="checkbox" name="participant[]" value="{{$listes->libellecategorie}}"> {{$listes->libellecategorie}} </label>
                                                    @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    <!--===================================================-->
                                    <div class="form-group">
                                            <label class="col-md-3 control-label">Type de Poule</label>
                                            <div class="col-md-9">
                                                <div class="radio">
                                                    <!-- Inline Icon Radios Buttons -->
                                                    <!--===================================================-->
                                                    <label class="form-radio form-icon btn btn-primary btn-labeled form-text active">
                                                    <input type="radio" name="poule" value="Poule Unique" checked=""> Poule Unique
                                                    </label>
                                                    <label class="form-radio form-icon btn btn-primary btn-labeled form-text">
                                                    <input type="radio" name="poule" value="Plusieurs poules" data-toggle="modal" data-target="#myModal"> Plusieurs poules
                                                    </label>   
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->
                                          <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                            
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Définisser le nombre de poule</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                        <label class="col-sm-3 control-label">Nombre de poules</label>
                                                        <div class="col-sm-3">
                                                            <input type="number" name="nbrepoules" placeholder="ex : 4" class="form-control">
                                                        </div>
                                                    </div>
                                                    <label class="col-md-3 control-label">Appelation des poules par ordre</label>
                                                    <div class="radio">
                                                        <!-- Inline Icon Radios Buttons -->
                                                        <!--===================================================-->
                                                        <label class="form-radio form-icon btn btn-danger btn-labeled form-text active">
                                                        <input type="radio" name="appelation" value="numerique"> Numérique
                                                        </label>
                                                        <label class="form-radio form-icon btn btn-danger btn-labeled form-text">
                                                        <input type="radio" name="appelation" value="alphabetique" checked> Alphabétique
                                                        </label>    
                                                        <!--===================================================-->
                                                    </div>
                                                    </div>
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-success" data-dismiss="modal">Valider</button>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                    <!-- END BASIC FORM ELEMENTS -->
                                </div>
                                <!-- Another panel -->
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Date de l'événement ou de la compétition</h3>
                                    </div>
                                    <div class="panel-body">
                                        <p>Insérer l'interval des dates de l'événement ou de la compétition</p>
                                        <hr>
                                        <br>
                                        <p class="text-thin mar-btm">Date d'ouverture et fermeture de la compétition</p>
                                        <!--Bootstrap Datepicker : Range-->
                                        <!--===================================================-->
                                        <div id="demo-dp-range">
                                            <div class="input-daterange input-group" id="datepicker">
                                                <input type="text" class="form-control" name="start" />
                                                <span class="input-group-addon">jusqu'au</span>
                                                <input type="text" class="form-control" name="end" />
                                            </div>
                                        </div>
                                        <br>
                                        <hr>
                                        <br>
                                        <!--===================================================-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Uploader le logo officiel ou Affiche officiel de la compétition</h3>
                                    </div>
                                    <div class="panel-body">
                                        <div class="col-md-10">
                                        <!-- bootstrap-imageupload. -->
                                            <div class="imageupload panel panel-default">
                                                <div class="panel-heading clearfix">
                                                    <h3 class="panel-title pull-left">Uploader un Image</h3>
                                                    <div class="btn-group pull-right">
                                                        <button type="button" class="btn btn-default active btn-labeled fa fa-file-text-o">Fichier</button>
                                                        <button type="button" class="btn btn-default btn-labeled fa fa-link">URL image</button>
                                                    </div>
                                                </div>
                                                <div class="file-tab panel-body">
                                                    <label class="btn btn-mint btn-file">
                                                        <i class="fa fa-files-o" aria-hidden="true"></i>
                                                        <span>Parcourir...</span>
                                                        <!-- The file is stored here. -->
                                                        <input type="file" name="image-file">
                                                    </label>
                                                    <button type="button" class="btn btn-danger btn-labeled fa fa-times">Enlever</button>
                                                </div>
                                                <div class="url-tab panel-body">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control hasclear" placeholder="Image URL">
                                                        <div class="input-group-btn">
                                                            <button class="btn btn-default btn-labeled fa fa-file-image-o">Valider</button>
                                                        </div>
                                                    </div>
                                                    <button type="button" class="btn btn-danger btn-labeled fa fa-times">Enlever</button>
                                                    <!-- The URL is stored here. -->
                                                    <input type="hidden" name="image-url">
                                                </div>
                                            </div>
                                            <button type="button" id="imageupload-reset" class="btn btn-warning btn-rounded btn-labeled fa fa-refresh">Reinitiliser</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Validation des informations</h3>
                                    </div>
                                    <div class="panel-body">
                                    <!--Buttons with label-->
                                    <!--===================================================-->
                                        <button class="btn btn-primary btn-labeled fa fa-thumbs-o-up" type="submit">Enregistrer et passer à l'étape suivante</button>
                                        <button class="btn btn-danger btn-labeled fa fa-close" type="reset">Annuler</button>
                                        <a href="javascript:history.back()" class="btn btn-info btn-rounded btn-labeled fa fa-exclamation-triangle pull-right">Retour</a>
                                     <!--===================================================-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </section>

@include('admin.footer-match')