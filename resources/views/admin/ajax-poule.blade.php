<div class="panel" id="txtHint">
             <div class="panel-heading">
                 <h3 class="panel-title"> <b>Poule</b> </h3>
             </div>

             @if( empty($results) )
             <div class="panel-body">
                <div class="col-md-12">
                  <div class="alert alert-mint" role="alert">
                      <h4 class="alert-heading">Désolé ! </h4>
                      <p>Aucun match n'est encore prévu dans ce poule. </p>
                  </div>
                </div>
              </div>
             @else

             @foreach($results as $info)

             <div class="panel-body">  
                    <div class="row">
                            <div class="col-xs-5">
                                            <div class="col-xs-6">
                                                <div class="media-object center"> <img src="{{LINK}}/images/{{$info->teamA->LOGOURL}}" width="80px" height="80px" alt="" class="img-circle"> </div>
                                            </div>
                                             <div class="col-xs-6">
                                                <div class="col-sm-3 pull-right"><h1>{{$info->teamA->score}}</h1></div>
                                                <h3>{{$info->teamA->SIGLE}}</h3>
                                                 <h6>{{$info->teamA->REGION}}</h6>
                                             </div>  
                                      </div>
                                      <div class="col-xs-2">
                                            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-4 text-center-xs"> 
                                                <h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;VS</h3>
                                                 <br>   
                                             </div>
                                      </div>
                                      <div class="col-xs-5">
                                                <div class="col-xs-6">
                                                    <div class="col-sm-3 pull-right"><h3>{{$info->teamB->SIGLE}}</h3> <h6>{{$info->teamB->REGION}}</h6></div>
                                                        <h1>{{$info->teamB->score}}</h1>
                                                    </div>
                                             <div class="col-xs-6">
                                                <div class="media-object pull-right"> <img src="{{LINK}}/images/{{$info->teamB->LOGOURL}}" width="80px" height="80px" alt="" class="img-circle"> </div>
                                            </div>
                                      </div>
					</div>

                    <div class="row">
                         <div class="text-semibold pad-hor">
                            <h4>
                                <i class="fa fa-calendar" aria-hidden="true"></i> {{ date('d-m-Y',strtotime($info->datematch)) }} - 
                                <i class="fa fa-clock-o"></i> {{ $info->heurematch }} - 
                                <i class="fa fa-map-marker" aria-hidden="true"></i> {{ $info->lieumatch }}
                            </h4> 
                        </div>
                    </div>

					 <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <button class="btn btn-warning btn-labeled fa fa-share" data-toggle="modal" data-target="#reporting">Reporter</button>
                            <a href="{{ route('admin.show-update-match',$info->idmatch) }}" class="btn btn-mint btn-rounded btn-labeled fa fa-pencil">Mettre à jour score</a>
                        </div>
                       
                        <button class="btn btn-danger btn-rounded btn-labeled fa fa-video-camera pull-right"> {{ $info->statutencours }}</button>
                    </div>

                    <!-- Modal -->
                      <div class="modal fade" id="reporting" role="dialog">
                        <div class="modal-dialog">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Reporter le match : <small>Inserer la <code>nouvelle date</code> et <code> la nouvelle heure </code></small></h4>
                            </div>
                            <div class="modal-body">
                              <form class="form-inline" method="post" action="{{route('route.report')}}">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <div class="form-group mar-hor">
                                        <input type="hidden" name="numeromatch" value="{{$info->idmatch}}">
                                        <input type="text" name="newdate" placeholder="Nouvelle date" id="datepicker" class="form-control">
                                    </div>
                                    <div class="form-group mar-rgt">
                                        <input type="time" name="newheure" placeholder="Nouvelle heure" id="demo-inline-inputpass" class="form-control">
                                    </div>
                                    <button class="btn btn-mint" type="submit">Reporter</button>
                                    <button class="btn btn-warning" type="reset">réinitialiser</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                            </div>
                          </div>
                          
                        </div>
                      </div><!-- end Modal -->

                 </div><!-- panel-body -->

            @endforeach
            @endif
  </div><!-- panel --> 