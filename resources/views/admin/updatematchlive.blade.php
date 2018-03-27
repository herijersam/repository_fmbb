@include('admin.header-match')

<div id="page-content">
    <div class="row">
                     <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-dark">
                                        <img src="../images/{{ $result->equipe1->LOGOURL }}" alt="avatar">
                                        <div class="name osLight"> {{ $result->equipe1->SIGLE }} </div>
                                        <div class="col-sm-3 pull-right"><h1> {{$result->equipe1->score}} </h1></div>
                                    </div>
                                    <div class="title"> {!! $result->equipe1->NAME !!} </div>
                                    <div class="address"> {{ $result->equipe1->region }} </div>
                                    <ul class="fullstats">
                                        <li> <span>0</span>Victoires </li>
                                        <li> <span>0</span>Défaites </li>
                                        <li> <span>0</span>Points </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                           
                            </div>
                            <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="userWidget-1">
                                    <div class="avatar bg-dark">
                                        <img src="../images/{{ $result->equipe2->LOGOURL }}" alt="avatar">
                                        <div class="name osLight"> {{ $result->equipe2->SIGLE }} </div>
                                        <div class="col-sm-3 pull-right"><h1> {{ $result->equipe2->score }} </h1></div>
                                    </div>
                                    <div class="title"> {!! $result->equipe2->NAME !!} </div>
                                    <div class="address"> {{ $result->equipe2->region }} </div>
                                    <ul class="fullstats">
                                         <li> <span>0</span>Victoires </li>
                                        <li> <span>0</span>Défaites </li>
                                        <li> <span>0</span>Points </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                             <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                @include('admin.notification')
                             </div>
                             <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Retour sur page : </h3>
                                    </div>
                                    <div class="panel-body">
                                        <!--Buttons with label-->
                                        <!--===================================================-->
                                        <a href="{{route('show.event')}}" class="btn btn-primary btn-rounded btn-labeled fa fa-home">Listes évenements</a>
                                        <a href="{{route('admin.calendrier',$idevent)}}" class="btn btn-success btn-labeled fa fa-reply-all">Phase</a>
                                         <a href="javascript:history.back()" class="btn btn-warning btn-rounded btn-labeled fa fa-reply">Retour</a>
                                        <!--===================================================-->
                                    </div>
                                </div>
                            </div>


        </div>
        @foreach($result->boucle as $bcl)
        <div class="row">
            <div class="col-xs-8">
                <div class="panel">
                                    <!--Panel heading-->
                                    <!--Panel body-->
                                    <div class="panel-body">
                                       <div class="col-xs-5">
                                            <div class="col-xs-6">
                                                <div class="media-object center"> <img src="../images/{{ $bcl->equipe1->logo }}" width="80px" height="80px" alt="" class="img-circle"> </div>
                                            </div>
                                             <div class="col-xs-6">
                                                <div class="col-sm-3 pull-right"><h1>{{ $bcl->equipe1->score }}</h1></div>
                                                <h3>{{ $bcl->equipe1->sigle }}</h3>
                                                 <h6>{{ $bcl->equipe1->genre }}</h6>
                                             </div>  
                                      </div>
                                      <div class="col-xs-2">
                                            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 text-center-xs"> 
                                               {!! $bcl->periode !!}
                                                <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VS</h3>
                                                {!! $bcl->start !!}
                                                 <br>   
                                             </div>
                                      </div>
                                      <div class="col-xs-5">
                                                <div class="col-xs-6">
                                                    <div class="col-sm-3 pull-right"><h3>{{ $bcl->equipe2->sigle }}</h3> <h6>{{ $bcl->equipe2->genre }}</h6></div>
                                                        <h1>{{ $bcl->equipe2->score }}</h1>
                                                    </div>
                                             <div class="col-xs-6">
                                                <div class="media-object pull-right"> <img src="../images/{{ $bcl->equipe2->logo }}" width="80px" height="80px" alt="" class="img-circle"> </div>
                                            </div>
                                      </div>
                                    </div><!-- end panel-body-->
                                </div>
            </div>
        </div>
        @endforeach

        @if($result->affichage)
        <div class="row">
            <div class="col-xs-8">
                <div class="panel">
                                    <!--Panel heading-->
                                    <!--Panel body-->
                                    <div class="panel-body">
                                    <form method="POST" action="{{route('match.start')}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="one" value="{{ $result->equipe1->IDEQUIPE }}">
                                    <input type="hidden" name="two" value="{{ $result->equipe2->IDEQUIPE }}">
                                    <input type="hidden" name="matchref" value="{{ $result->idmatch }}">
                                       <div class="col-xs-5">
                                            <div class="form-group">
                                                <div class="col-xs-5">
                                                    <input type="number" id="demo-text-input" class="form-control" placeholder="Score" name="scoreTeam1" required>
                                                     <small class="help-block">Insérer le score durant ce quart temps</small>
                                                </div>
                                            </div>
                                      </div>
                                      <div class="col-xs-2">
                                            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 text-center-xs"> 
                                               <button typ="submit" class="btn btn-success btn-labeled fa fa-check-circle">Cliquer <u>ici</u> <br>pour valider le Quart temps</button> <br>   
                                             </div>
                                      </div>
                                      <div class="col-xs-5">
                                            <div class="form-group">
                                                <div class="col-xs-5 pull-right">
                                                    <input type="number" id="demo-text-input" class="form-control" placeholder="Score" name="scoreTeam2" required>
                                                     <small class="help-block">Insérer le score durant ce quart temps</small>
                                                </div>
                                            </div>    
                                      </div>
                                      </form>
                                    </div><!-- end panel-body-->
                                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-8">
                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Monthly Statistics <small> based on the User Activities </small></h3>
                                    </div>
                                    <div class="panel-body pad-no">
                                        <!--Default Accordion--> 
                                        <!--===================================================-->
                                        <div class="panel-group accordion mar-no">
                                            <div class="panel">
                                                <!--Accordion title-->
                                                <div class="panel-heading">
                                                    <h4 class="panel-title"> 
                                                        <a data-parent="#statistics" data-toggle="collapse"> 
                                                        <i class="fa fa-calendar"></i> Age Group </a> 
                                                    </h4>
                                                </div>
                                                <!--Accordion content-->
                                                 <div class="panel-collapse collapse in">
                                                    <div class="panel-body pad-no">
                                                        <table class="table mar-no bg-light-gray">
                                                            <thead>
                                                                <tr>
                                                                    <th>Rang #</th>
                                                                    <th class="text-center">Genre</th>
                                                                    <th>Nom de l'équipe</th>
                                                                    <th>Victoire</th>
                                                                    <th>Défaite</th>
                                                                    <th>Points</th>
                                                                    <th class="text-center">Position</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                            @for( $r=0; $r<count($rang); $r++ )
                                                                <tr>
                                                                    <td>#{{$r+1}}</td>
                                                                    <td class="text-center text-azure">
                                                                        @if( $rang[$r]->sexe == 'Homme')
                                                                            <i class="fa fa-male"></i>
                                                                        @else
                                                                            <i class="fa fa-female"></i>
                                                                        @endif
                                                                    </td>
                                                                    <td>{{$rang[$r]->sigle}}</td>
                                                                    <td class="center">{{$rang[$r]->v}}</td>
                                                                    <td class="center">{{$rang[$r]->d}}</td>
                                                                    <td class="center">{{$rang[$r]->points}}</td>
                                                                    <td class="text-center"><i class="fa fa-caret-up text-success fa-2x"></i></td>
                                                                </tr>
                                                            @endfor
                                                                
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Accordion--> 
                                    </div>
                                </div>
                            </div>
        </div>

 </div>

@include('admin.footer-match')