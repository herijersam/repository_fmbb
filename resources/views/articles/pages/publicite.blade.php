@include('articles.header')

<div class="boxed">
<!--CONTENT CONTAINER-->
<!--===================================================-->
<section id="content-container">
    <header class="pageheader hidden-xs">
        <h3><i class="fa fa-home"></i> Administrateur </h3>
        <div class="breadcrumb-wrapper">
            <span class="label">Vous etes ici:</span>
            <ol class="breadcrumb">
                <li> <a href="#"> Accueil </a> </li>
                <li class="active"> Administrateur </li>
            </ol>
        </div>
    </header>
    <!--Page content-->
    <!--===================================================-->
    <div id="page-content">
        <div class="row">
            <div class="col-md-12 eq-box-md">
                <!--Panel with Header-->
                <!--===================================================-->
                <div class="panel">
                    <div class="panel-heading">
                        <h3 class="panel-title">PUBLICITE</h3>
                    </div>
                    <div class="panel-body">





      <!--========================================== /Upload image/  ========================================================================-->
                            
                                    <!-- Panel heading -->
                                    @if (count($errors) > 0)
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                    @if ($message = Session::get('success'))
                                        <div class="alert alert-success">
                                            <p>{{ $message }}</p>
                                        </div>  
                                    @elseif ($message = Session::get('warning'))
                                        <div class="alert alert-danger">
                                            <p>{{ $message }}</p>
                                        </div>  
                                    @endif

                                    <div class="panel-heading">
                                        <h3 class="panel-title"></h3>
                                    </div>
                <form action="{{ route('insertpub') }}" method="post" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                        
                        
                        
                        
                        <div class="row">
                            <!--Tooltips-->
                            <!--===================================================-->




                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Liste de Publicité</h3>
                                    </div>
                                    <div class="panel-body" >
                                       
                                       
                                       <!--========================table de la publicité=======================-->

                                       <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Emplacement du Pub</th>
                                                    <th>Aperçue</th>
                                                    <th>Titre</th>
                                                    <th>Statut</th>
                                                    <th>Action</th>
                                                    <th>Suppr</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                        @foreach($pub as $pubs)
                                                <tr>
                                                    <td>Pub N°: {{$pubs->numpub}}</td>
                                                    
                                                    <td>
                                                        <div class="media-object"> 
                                                            <img src="../../app/photos/{{$pubs->url}}" alt="" class="img-rounded img-sm"> 
                                                        </div>
                                                    </td>
                                                    
                                                    <td>{{$pubs->description}}</td>

                                                    @if($pubs->statut == 0)
                                                        <td><span class="label label-dark">En attente..</span></td>
                                                        <td><a class="btn btn-primary btn-icon icon-lg fa fa-share"  href="{{ route('publierpub',$pubs->id) }}"></a></td>
                                                    @elseif($pubs->statut == 1)
                                                        <td><span class="label label-mint">Publié</span></td>
                                                        <td><a class="btn btn-info btn-icon icon-lg fa fa-reply"  href="{{ route('publierpub',$pubs->id) }}"></a></td>
                                                    @endif

                                                    <td> <a class="btn btn-warning btn-icon icon-lg fa fa-remove" href="{{ route('supprpub',$pubs->id) }}"></a></td>
                                                </tr>
                        @endforeach                    
                                            </tbody>
                                            
                                        </table>
                        {{ $pub->links() }}
                                       <!--==================================Fin table de la publicite==================================-->


                                    </div>





                                <div class="panel">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ajouter Publicité :</h3>
                                    </div>
                                    <div class="panel-body">
                                        
                                        <div class="form-group">
                                        <label class="col-sm-3 control-label"> Description : </label>
                                        <div class="col-sm-6">
                                            <input class="form-control" name="description" type="text" placeholder="Titre" data-parsley-range="[4, 10]" data-parsley-group="order" data-parsley-required />
                                        </div>
                                    </div>
                                    </br></br>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label">Emplacement Pub N° : </label>
                                        <div class="col-sm-6">
                                        <select class="form-control" name="numpub">
                                              
                                                <option selected>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                              
                                            </select>
                                        </div>
                                    </div>
                                    </br></br>

                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"> Contenu : </label>
                                        <div class="col-sm-6">
                                        <textarea id="demo-textarea-input" rows="3" class="form-control" name="contenu" placeholder="Contenue..."></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                    <label class="col-sm-3 control-label"></label>
                                    <div class="col-md-9">
                                            </br>
                                            <input type="file" class="form-control" id="images" name="photos" onchange="preview_images();"/>
                                            <div class="row" id="image_preview"></div>                                    
                                    </div>
                                    </div>


                                </div>


                                    <div class="form-group">
                                        <label class="col-sm-3 control-label"></label>
                                        <div class="col-md-6">
                                            <button class="btn btn-block btn-success">
                                                Ajouter Publicité
                                            </button>
                                        </div>
                                    </div>
                            <!--===================================================-->
                            <!--POPOVERS-->
                            <!--===================================================-->
                     
                            </div>
                        </div>

                        <!--<div class="col-lg-6">
                                <div class="panel">
                                    <div class="panel-heading">
                                    
                                    </div>
                                    <div class="panel-body">
                                     
                                <div class="col-lg-12">
                                    <div class="panel">
                                            <div class="panel-heading">
                                                        




                                            </div>
                                    </div>
                                </div>


                            </div>-->


                        </div>


                </form>
  <!--========================================== /Fin Upload image/  ========================================================================-->




                                </div>
                                </div>
                                <!--===================================================-->
                                <!--End Panel with Header-->
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->
                </section>
                <!--===================================================-->
@include('articles.footer')