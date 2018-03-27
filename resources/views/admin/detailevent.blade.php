@include('admin.header-match')

<section id="page-content">
		<div class="row">
            @php 
                $color = ['danger','success','info','warning','primary','default'];
            @endphp
                    <div class="col-md-6">
                                <div class="userWidget-1">
                                    @foreach($event as $ev)
                                        <div class="avatar bg-{{ $color[rand('0','5')] }}">
                                            <img src="../../images/{{$ev->urlogoevent}}" alt="avatar">
                                            <div class="name osLight"> {{$ev->libellevent}} </div>
                                        </div>
                                    <div class="title"> {{ $ev->lieu }} </div>
                                    <div class="address">@fmbb - {{$ev->description}}</div>
                                    @endforeach
                                    <ul class="fullstats">
                                        <li> <span>{{$ministat->equipes}}</span>équipes participantes </li>
                                        <li> <span>{{$ministat->poules}}</span>Nbres de poules </li>
                                        <li> <span>{{$categparticipant}}</span>Catégorie(s) participante(s) </li>
                                    </ul>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>

					<div class="col-md-4">
                                <div class="panel">
                                    <div class="panel-body">
                                        <div class="carousel slide" id="c-slide-2" data-ride="carousel">
                                            <div class="carousel-inner">
                                                <div class="item active">
                                                    <div class="text-bold"> Suivi de progression de l'évenement </div>
                                                    <div class="pad-ver-5"> Date de l'évenement : {{date('d-m-Y',strtotime($event[0]->startday))}} au {{date('d-m-Y',strtotime($event[0]->endday))}}</div>
                                                    <!-- Progress bars Start -->                                
                                                    <div class="pad-btm">
                                                        <div class="progress progress-striped progress-sm">
                                                            <div class="progress-bar progress-bar-info" style="width: {{$progress}}%;"></div>
                                                        </div>
                                                    </div>
                                                    <!-- Progress bars End -->
                                                    <div class="eq-height">
                                                        <div class="text-dark"> Status : </div>
                                                        <div class="text-dark text-lg pull-left"> {{ ucfirst($statutprogression) }} </div>
                                                        <div class="text-dark pull-right"> 
                                                            <a href="{{route('event.suspend',$event[0]->id)}}" class="btn btn-info btn-sm" {{$disabled}}> 
                                                            <i class="fa fa-stop pad-rgt-5"></i> Suspendre 
                                                            </a> 
                                                            <a href="{{route('event.showupdate',$event[0]->id)}}" class="btn btn-info btn-sm" {{$disabled}}> 
                                                            <i class="fa fa-repeat pad-rgt-5"></i> Reporter 
                                                            </a> 
                                                             <a href="javascript:history.back()" class="btn btn-info btn-sm" {{$disabled}}> 
                                                            <i class="fa fa-reply pad-rgt-5"></i> Retour 
                                                            </a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
						</div>
			</div>

			<div class="row">
                            <div class="col-md-6">
                                <div class="panel">
                                    <div class="panel-body np">
                                        <!--Default Tabs (Left Aligned)--> 
                                        <!--===================================================-->
                                        <div class="tab-base mar-no">
                                            <!--Nav Tabs-->
                                            <ul class="nav nav-tabs">
                                            	@for( $i=0;$i<count($tbpoule);$i++ )
	                                            	@if($i==0)
	                                                	<li class="active"> <a data-toggle="tab" href="#poule-{{$i}}"> Poule {{$tbpoule[$i]}} </a> </li>
	                                                @else
	                                                	<li> <a data-toggle="tab" href="#poule-{{$i}}"> Poule {{$tbpoule[$i]}} </a> </li>
	                                                @endif
                                                @endfor
                                            </ul>
                                            <!--Tabs Content-->
                                            <div class="tab-content">

                                           @for( $a=0; $a<count($result); $a++ )
                                           		@if( $a == 0 )
                                           			<div id="poule-{{$a}}" class="tab-pane fade active in">
                                           		@else
                                           			<div id="poule-{{$a}}" class="tab-pane fade">
                                           		@endif
                                                    <!--Hover Rows--> 
                                                    <!--===================================================-->
                                                    <table class="table table-hover table-vcenter">
                                                        <thead>
                                                            <tr>
                                                                <th class="hidden-xs">#</th>
                                                                <th>Logo équipe</th>
                                                                <th>Nom équipe</th>
                                                                <th>Sigle équipe</th>
                                                                <th> Genre (Homme ou Dame) </th>
                                                                <th class="hidden-xs">Info Team</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        	@for( $b=0; $b<count($result[$a]); $b++ )

                                                            <tr>
                                                                <td class="hidden-xs">{{$b+1}}</td>
                                                                <td>
                                                                	<div class="media-object center"> <img src="../../images/{{$result[$a][$b]->LOGOURL}}" alt="" class="img-rounded img-sm"> </div>
                                                                </td>
                                                                <td>{!!$result[$a][$b]->NAME!!}</td>
                                                                <td><b>{{$result[$a][$b]->SIGLE}}<b></td>
                                                                <td>{{$result[$a][$b]->SEXE}}</td>
                                                                <td class="hidden-xs">
                                                                    <button class="btn btn-default btn-icon btn-circle icon-lg fa fa-question-circle"></button>
                                                                </td>
                                                            </tr>

                                                           	@endfor

                                                        </tbody>
                                                    </table>
                                                    <!--===================================================--> 
                                                    <!--End Hover Rows--> 
                                                </div>
                                                @endfor
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