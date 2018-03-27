@include('admin.header-match')

<section id="page-content">
	 <div class="row">
        <div class="col-lg-6">
        	<div class="panel">

                 @include('admin.notification')

                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Basic Form Elements</h3>
                                    </div>
                                    <!-- BASIC FORM ELEMENTS -->
                                    <!--===================================================-->
                                    <form class="panel-body form-horizontal" method="POST" action="{{route('form.update.event')}}" enctype="multipart/form-data" 
                                data-upload-template-id="template-upload-1" data-download-template-id="template-download-1">
                                       
                                        @foreach($listes as $lst)
                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                        <input type="hidden" name="reference" value="{{$lst->id}}">
                                        <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">libellé évenement</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" name="libellevent" value="{{$lst->libellevent}}">
                                                <small class="help-block">Nom de l'évenement ou de la compétition</small>
                                            </div>
                                        </div>
                                         <!--Text Input-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-text-input">Lieu de l'évenement</label>
                                            <div class="col-md-9">
                                                <input type="text" id="demo-text-input" class="form-control" name="lieu" value="{{$lst->lieu}}">
                                                <small class="help-block">Stade, ville ou pays où l'évenement aura lieu</small>
                                            </div>
                                        </div>
                                        <!--Textarea-->
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="demo-textarea-input">Description</label>
                                            <div class="col-md-9">
                                                <textarea id="demo-textarea-input" rows="9" class="form-control" name="description" placeholder="Description de l'évenement...">{{$lst->description}}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Type de l'évenement</label>
                                            <div class="col-md-9">
                                                <div class="radio">
                                                    <!-- Inline Icon Radios Buttons -->
                                                    <!--===================================================-->
                                                    @php
                                                        $tab = ['Championnat','Coupe','Ligue'];
                                                        foreach($tab as $tb){
                                                            if( $tb == $lst->typevenement)
                                                                $checked = 'checked';
                                                            else
                                                                $checked = null;
                                                    @endphp
                                                    <label class="form-radio form-icon btn btn-danger btn-labeled form-text active">
                                                    <input type="radio" name="typevenement" value="{{$tb}}" {{$checked}}> {{$tb}}
                                                    </label>
                                                    @php } @endphp
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Date de début et date fin de l'évenement</label>
                                            <div class="col-md-9">
                                                <!--Bootstrap Datepicker : Range-->
                                                <!--===================================================-->
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="form-control" name="startday" value="{{date('d-m-Y',strtotime($lst->startday))}}"/>
                                                        <span class="input-group-addon">jusqu'au</span>
                                                        <input type="text" class="form-control" name="endday" value="{{date('d-m-Y',strtotime($lst->endday))}}" />
                                                    </div>
                                                </div>
                                                <!--===================================================-->
                                            </div>
                                        </div>
                                    <!--===================================================-->
                                </div>

                                <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Image</h3>
                                        </div>
                                        <div class="panel-body">
                                            <img src="{{LINK}}/images/{{$lst->urlogoevent}}" class="img-rounded" alt="Logo évenement fmbb" style="width:100%">
                                        </div>
                                    </div> 

                                <div class="panel">
                                     <div class="panel-heading">
                                            <div class="panel-control">
                                                <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                                <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                                <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                                <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                            </div>
                                            <h4 class="panel-title">Uploader le logo officiel</h4>
                                        </div>
                                        <div class="panel-body">
                                           @if( is_null($lst->urlogoevent) || $lst->urlogoevent == 'default.png' )
                                                        <!-- Alert layout example -->
                                                            <div class="alert alert-warning media fade in">
                                                                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                                                                <div class="media-left">
                                                                    <span class="icon-wrap icon-wrap-xs alert-icon">
                                                                    <i class="fa fa-bolt fa-lg"></i>
                                                                    </span>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="alert-title">Aucune Image/ Logo pour cet évenement</h4>
                                                                    <p class="alert-message">Veuillez insérer une image ou un logo pour cet évenement !</p>
                                                                </div>
                                                            </div>
                                                        <!-- end Alert layout -->
                                             @endif
                                            <!-- bootstrap-imageupload. -->
                                                <div class="imageupload panel panel-default">
                                                    <div class="panel-heading clearfix">
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
                                                            <input type="text" class="form-control hasclear" placeholder="{{$lst->urlogoevent}}">
                                                            <div class="input-group-btn">
                                                                <button class="btn btn-default btn-labeled fa fa-file-image-o">Valider</button>
                                                            </div>
                                                        </div>
                                                        <button type="button" class="btn btn-danger btn-labeled fa fa-times">Enlever</button>
                                                        <!-- The URL is stored here. -->
                                                        <input type="hidden" name="image-url">
                                                    </div>
                                                </div>
                                                <button type="button" id="imageupload-reset" class="btn btn-warning btn-rounded btn-labeled fa fa-refresh">Reinitiliser<button>
                                        </div>
                                    </div>

                                    @endforeach

                                    <div class="panel">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Confirmation de la modification</h3>
                                        </div>
                                        <div class="panel-body">
                                        <!--Buttons with label-->
                                        <!--===================================================-->
                                        <button type="submit" class="btn btn-info btn-rounded btn-labeled fa fa-gift pull-left">Enregistrer les modifications</button>
                                         <a href="{{route('show.event')}}" class="btn btn-mint btn-labeled fa fa-list pull-right">Retour à la liste</a>
                                        <!--===================================================-->
                                        </div>
                                    </div>  
                                </form>
               <!-- END BASIC FORM ELEMENTS -->            
        </div>
</section>

@include('admin.footer-match')