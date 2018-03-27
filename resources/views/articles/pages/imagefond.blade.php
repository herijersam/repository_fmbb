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
                        <h3 class="panel-title">FOND DU SITE</h3>
                    </div>
                    <div class="panel-body">







            <div class="row">
                        <div class="col-md-12">                    
                          <div class="panel">
                            <div class="panel-heading">
                                
                                <h3 class="panel-title">Liste de Fond existant</h3>
                            </div>

                            @if ($message = Session::get('success'))
                                <div class="alert alert-success">
                                    <p>{{ $message }}</p>
                                </div>
                            @elseif ($message = Session::get('warning'))
                                <div class="alert alert-danger">
                                    <p>{{ $message }}</p>
                                </div>
                            @endif

                            <div class="panel-body">
                                <!-- Inline Form  -->
                                <!--<form class="form-inline">===================================================-->
                                
                                
                                
                                    <table class="table table-striped">
                                    
                                    <thead>
                                            <tr>
                                                <th>Description</th>
                                                <th>Photo</th>
                                                <th>Emplacement</th>
                                                <th>Date d'insertion</th>
                                                <th>Statuts</th>
                                                <th>Publication</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($image as $images)
                        
                                           
                                                <tr>
                                                    <td>{{ $images->description }}</td>
                                                    
                                                    <td>
                                                        <div class="media-object"> 
                                                            <img src="../../app/photos/{{$images->url}}" alt="" class="img-rounded img-sm"> 
                                                        </div>
                                                    </td>

                                                    @if($images->numfond == 1)
                                                    <td> Avant </td>
                                                    @elseif($images->numfond == 2)
                                                    <td> Derrière </td>
                                                    @endif

                                                    <td><span class="text-muted"><i class="fa fa-clock-o"> </i>  {{ $images->created_at->format('M j, Y  à  H:i') }}</span></td>
                                                    
                                                    <td>
                                                        
                                                        <div>
                                                            @if($images->statut == 1)
                                                            <span class="label label-table label-mint">Affiché</span>
                                                            @elseif($images->statut == 0)
                                                            <span class="label label-table label-dark">Non affiché..</span>
                                                            @endif
                                                        </div>
                        
                                                    </td>
                                                    
                                                    <td>
                                                        @if($images->statut == 0)
                                                            <a class="label label-table label-success" href="{{ route('publier',$images->id) }}">Publier</a>
                                                        @elseif($images->statut == 1)
                                                            <a class="label label-table label-default" href="{{ route('publier',$images->id) }}">Retirer</a>
                                                        @endif
                                                    </td>
                        
                                                    <td>

                                                        <a class="btn btn-danger btn-icon icon-lg fa fa-trash" href="{{ route('destroy',$images->id) }}"></a>                    
                                                    </td>
                                                    
                                                </tr>
                                           
                        
                                            @endforeach
                        
                                            </tbody>
                                        </table>
                                        {{ $image->links() }}                                  
                    
                                
                                
                                <!--===================================================</form>-->
                                <!-- End Inline Form  -->
                            </div>
                         </div>
                       </div>
                     </div>
                        <div class="row">
                            <div class="eq-height">
                                <div class="col-sm-6 eq-box-sm">
                                    <div class="panel">
                                        <div class="panel-heading">
                                           
                                            <h3 class="panel-title">Image Du Devant</h3>
                                        </div>
                                        <!--Block Styled Form -->
                                        <!--===================================================-->
                                        <form action="{{ route('insertimgpub') }}" method="post" enctype="multipart/form-data">
                                        <div class="form-horizontal">  
                                            {{ csrf_field() }}
                                            <div class="panel-body">
                                                <div class="form-group">
                                                <label for="description1" class="col-sm-3 control-label">Description :</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control" id="description1" name="description1" placeholder="" />
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="col-sm-3 control-label">Emplacement du Fond dans le Site : </label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control" name="fond">
                                                            
                                                                <option selected>avant</option>
                                                                <option>arrière</option>
                                                            
                                                        </select>
                                                    </div>
                                                </div

                                                <div class="form-group">
                                                <label for="description1" class="col-sm-3 control-label">Image :</label>
                                                    <div class="col-sm-6">
                                                        <input type="file" class="form-control" id="images" name="photos1" onchange="preview_images();"/>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                <label for="description1" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-6" id="image_preview"></div>
                                                </div>

                                                <div class="form-group">
                                                <label for="description1" class="col-sm-3 control-label"></label>
                                                    <div class="col-sm-6">
                                                        <input type="submit" class="btn btn-primary" name='submit_image' value="Uploader Image"/>
                                                    </div>
                                                </div>    

                                            </div>
                                            <div class="pull-right">
                                            <!-- <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>-->
                                            </div>
                                            </div>  
                                        <!--===================================================-->
                                        <!--End Block Styled Form -->
                                    </div>
                                </div>

                            </div>
                        </div>
                       
                    </form>






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