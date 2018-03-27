@include('admin.header-match')
<style>
  .modal-header, h4, .close {
      background-image: url("../images/coupe-president.jpg");
      color:white !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>
<section id="page-content">
	<!-- ajouter nouveau match -->
	<div class="col-md-8">

        @include('admin.notification')

		<div class="panel">
	        <div class="panel-heading">
	            <h3 class="panel-title">Ajout d'un nouveau événement/Compétition </h3>
	        </div>
	        <div class="panel-body">
	        <!--Dismissible popover-->
	        <a href="{{ route('add.event') }}" class="btn btn-default btn-labeled fa fa-plus add-popover" data-original-title="Bootstrap Popover" data-content="Ajout d'un nouveau évenement de basketball dans le système" data-placement="top" data-trigger="focus" data-toggle="popover">Ajouter un évenement</a>
            <a href="#" class="btn btn-danger btn-labeled fa fa-plus add-popover" data-toggle="modal" data-target="#myModal">Coupe du président</a>
            <a href="{{ route('admin.addmatch') }}" class="btn btn-default btn-labeled fa fa-folder-o add-popover pull-right" data-original-title="Bootstrap Popover" data-content="Ajout d'un nouveau match de basketball dans le système" data-placement="top" data-trigger="focus" data-toggle="popover">Ajouter un match indépendant</a>
	        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
	        </div>
	    </div>

        <!-- Modal President Cup -->
        <div class="modal fade" id="myModal" role="dialog" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
    
      <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header" style="padding:100px 30px;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                        <div class="panel-heading">
                            <h3 class="panel-title"><span class="fa fa-trophy"></span><b> Coupe du président </b></h3>
                        </div>
                        <div class="panel-body">
                        <form method="post" action="">
                        <!--Dismissible popover-->
                        <div class="form-group">
                            <label class="control-label col-md-4"> Sélection les équipes participants </code></label>
                            <div class="col-md-8">
                                                    <!-- Default choosen -->
                                                    <!--===================================================-->
                                <select class="demo-cs-multiselect"  data-placeholder="Taper le nom de l'équipe..." multiple tabindex="4" name="teams[]">
                                    @foreach($allteams as $teams)
                                    <option value="{{$teams->IDEQUIPE}}">{{$teams->SIGLE}}</option>
                                    @endforeach
                                 </select>
                                                    <!--===================================================-->
                            </div>
                                        <!--==========================================-->
                                        
                            <label class="col-md-3 control-label">Durée de saison :</label>
                                <div class="col-md-9">
                                                <!--Bootstrap Datepicker : Range-->
                                                <!--===================================================-->
                                                <div id="demo-dp-range">
                                                    <div class="input-daterange input-group" id="datepicker">
                                                        <input type="text" class="form-control" name="startday" value="{{ date('d-m-Y') }}"/>
                                                        <span class="input-group-addon">jusqu'au</span>
                                                        <input type="text" class="form-control" name="endday" value="{{ date('d-m-Y') }}" />
                                                    </div>
                                                </div>
                                                <!--===================================================-->
                                   </div>
                                        <!--===================================================-->
                         </div>
                        <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                        </div>
                </div>
                <div class="modal-footer">
                     <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Abandonner</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal">Démarer de la saison</button>
                </div>
            </form>
              </div>
              
            </div>
          </div>
        <!-- end Modal -->

	</div>
	<!-- end evenement -->
	
    <div class="row">
                            <div class="col-md-10">
                                <div class="panel">
                                    <div class="panel-body np">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base mar-no">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                                <li class="active"> <a data-toggle="tab" href="#demo-lft-tab-1"> Championnat </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-2"> Coupe </a> </li>
                                                <li> <a data-toggle="tab" href="#demo-lft-tab-3"> Ligue</a> </li>
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">
                                                <div id="demo-lft-tab-1" class="tab-pane fade active in">
                                                    <!--Hover Rows--> 
                                                    @if(array_is_empty($Championnat))
                                                        <div class="alert alert-danger" role="alert">
                                                          <h4 class="alert-heading">Notification!</h4>
                                                          <p>Aucun événement de type <code>LIGUE</code>n'a été inséré ou assigné dans la base de donnée cette saison !<br>Commencer d'abord par insérer une compétition de type Coupe. Merci ! </p>
                                                        </div>
                                                    @else
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">Logo Evenement</th>
                                                                <th>Evenement</th>
                                                                <th>Date de début</th>
                                                                <th>Date fin</th>
                                                                <th>Statut</th>
                                                                <th>Détails</th>
                                                                <th>Calendrier</th>
                                                                <th>Modification</th>
                                                                <th class="hidden-xs">Progression</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $tab = ['primary','success','info','warning','danger'];
                                                            @endphp
                                                            @foreach($Championnat as $chmps)
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="media-object center"> <img src="../images/{{$chmps->urlogoevent}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{{ $chmps->libellevent }}</td>
                                                                <td>{{ date('d M Y',strtotime($chmps->startday)) }}</td>
                                                                <td>{{ date('d M Y',strtotime($chmps->endday)) }}</td>
                                                                <td>
                                                                    <div class="label label-table label-{{$tab[rand(0,4)]}}"> {{ $chmps->statut }} </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('event.detail',$chmps->id)}}" class="btn btn-primary btn-labeled fa fa-eye">Voir Détail</a>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('admin.calendrier',$chmps->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Matchs</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('event.showupdate',$chmps->id)}}" class="btn btn-default btn-labeled fa fa-pencil">Modifier</a>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: {{$chmps->progression}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                                <div id="demo-lft-tab-2" class="tab-pane fade">
                                                    <!--Hover Rows-->
                                                    @if(array_is_empty($Coupe))
                                                        <div class="alert alert-danger" role="alert">
                                                          <h4 class="alert-heading">Notification!</h4>
                                                          <p>Aucun événement de type <code>COUPE</code>n'a été inséré ou assigné dans la base de donnée cette saison !<br>Commencer d'abord par insérer une compétition de type Coupe. Merci ! </p>
                                                        </div>
                                                    @else
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">Logo Coupe</th>
                                                                <th>Coupe</th>
                                                                <th>Date de début</th>
                                                                <th>Date fin</th>
                                                                <th>Statut</th>
                                                                <th>Détails</th>
                                                                <th>Calendrier</th>
                                                                <th>Modification</th>
                                                                <th class="hidden-xs">Progression</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $tab = ['primary','success','info','warning','danger'];
                                                            @endphp

                                                            @foreach($Coupe as $cup)
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="media-object center"> <img src="../images/{{$cup->urlogoevent}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{{ $cup->libellevent }}</td>
                                                                <td>{{ date('d M Y',strtotime($cup->startday)) }}</td>
                                                                <td>{{ date('d M Y',strtotime($cup->endday)) }}</td>
                                                                <td>
                                                                    <div class="label label-table label-{{$tab[rand(0,4)]}}"> {{ $cup->statut }} </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('event.detail',$cup->id)}}" class="btn btn-primary btn-labeled fa fa-eye">Voir Détail</a>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('admin.calendrier',$cup->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Matchs</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('event.showupdate',$cup->id)}}" class="btn btn-default btn-labeled fa fa-pencil">Modifier</a>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: {{$cup->progression}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                </div>
                                                <!--===================================================-->
                                                <!--End Hover Rows-->
                                                <div id="demo-lft-tab-3" class="tab-pane fade">
                                                    <!--Hover Rows--> 
                                                     @if(array_is_empty($Ligue))
                                                        <div class="alert alert-danger" role="alert">
                                                          <h4 class="alert-heading">Notification!</h4>
                                                          <p>Aucun événement de type <code>LIGUE</code>n'a été inséré ou assigné dans la base de donnée cette saison !<br>Commencer d'abord par insérer une compétition de type Coupe. Merci ! </p>
                                                        </div>
                                                    @else
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">Logo Ligue</th>
                                                                <th>ligue</th>
                                                                <th>Date de début</th>
                                                                <th>Date fin</th>
                                                                <th>Statut</th>
                                                                <th>Détails</th>
                                                                <th>Calendrier</th>
                                                                <th>Modification</th>
                                                                <th class="hidden-xs">Progression</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php
                                                                $tab = ['primary','success','info','warning','danger'];
                                                            @endphp
                                                            @foreach($Ligue as $league)
                                                            <tr>
                                                                <td class="hidden-xs">
                                                                    <div class="media-object center"> <img src="../images/{{$league->urlogoevent}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{{ $league->libellevent }}</td>
                                                                <td>{{ date('d M Y',strtotime($league->startday)) }}</td>
                                                                <td>{{ date('d M Y',strtotime($league->endday)) }}</td>
                                                                <td>
                                                                    <div class="label label-table label-{{$tab[rand(0,4)]}}"> {{ $league->statut }} </div>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('event.detail',$league->id)}}" class="btn btn-primary btn-labeled fa fa-eye">Voir Détail</a>
                                                                </td>
                                                                <td>
                                                                     <a href="{{route('admin.calendrier',$league->id)}}" class="btn btn-success btn-labeled fa fa-calendar">Matchs</a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{route('event.showupdate',$league->id)}}" class="btn btn-default btn-labeled fa fa-pencil">Modifier</a>
                                                                </td>
                                                                <td class="hidden-xs">
                                                                    <div class="progress progress-striped progress-sm">
                                                                        <div class="progress-bar progress-bar-primary" style="width: {{$league->progression}}%;"></div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                    @endif
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                            </div>
                                        </div>
                                        <!--===================================================--> 
                                        <!--End Default Tabs (Left Aligned)--> 
                                    </div>
                                </div>
                            </div>
                        </div>

</section>

@include('admin.footer-match')