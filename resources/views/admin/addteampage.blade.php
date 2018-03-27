@include('admin.header-match')

<div class="page-content">
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">

            <!-- Messages -->
             @include('admin.notification');
             <!-- end Message -->
                <div class="panel">
                                    <div class="panel-heading">
                                        <div class="panel-control">
                                            <button class="btn btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></button>
                                            <button class="btn btn-default" data-click="panel-reload"><i class="fa fa-refresh"></i></button>
                                            <button class="btn btn-default" data-click="panel-collapse"><i class="fa fa-chevron-down"></i></button>
                                            <button class="btn btn-default" data-dismiss="panel"><i class="fa fa-times"></i></button>
                                        </div>
                                        <h3 class="panel-title">Choisir les équipes participants à l'événement/Compétition</h3>
                                    </div>
                                    <div class="panel-body">
                                         <!--Text Input-->
                                        <p>Choisir les équipes figurant dans les <code>Poules</code></p>
                                        <form class="form-horizontal form-bordered"  method="post" action="{{route('method.addteam')}}">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            @for($i=0;$i<intval($nbrepoule);$i++)
                                            <div class="form-group">
                                                <label class="control-label col-md-4"> Selection des équipes pour la <code> Poule {{ $alphabet[$i] }}</code></label>
                                                <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                                    <select class="demo-cs-multiselect"  data-placeholder="Taper le nom de l'équipe..." multiple tabindex="4" name="poule{{ $alphabet[$i] }}[]">

                                                        @foreach($listesequipes as $listes)
                                                        <option value="{{ $listes->IDEQUIPE }}">{{ $listes->SIGLE . ' ( '. strtolower($listes->SEXE) .' ) ' }}</option>
                                                        @endforeach
                                                    </select>
                                                    <!--===================================================-->
                                                </div>
                                            </div>
                                        <!--==========================================-->
                                        @endfor


                                        <button class="btn btn-danger btn-labeled fa fa-times pull-right" id="removeButton" data-click="panel-reload">
                                            Supprimer un poule
                                        </button>
                                        <button class="btn btn-success btn-labeled fa fa-floppy-o pull-right" type="submit">Valider les informations</button>
                                    </form>
                                    <div class="notification" id="alert"></div>
                                    </div>
                                </div>
        </div>
    </div>
</div>
@include('admin.footer-match')