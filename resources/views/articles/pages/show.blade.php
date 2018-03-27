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
                        <h3 class="panel-title">ARTICLES</h3>
                    </div>
                    <div class="panel-body">







<div class="col-md-6">
   


    <div class="userWidget-1">
        <div class="title" >
        <p><h2 class="alert-heading">{{$article->titre}}</h2> </p>
        </div>
        <div class="title"> <p>{{$article->contenu}}.</p> </div>
        
        <ul class="fullstats">
            
            <li> <span>Slug</span> {{$article->slug}}</li>
            <li> <span>Seo</span> {{$article->seo}}</li>
            <li> <span>Categorie</span> {{$article->categorie}}</li>
        </ul>
        <div class="clearfix"> </div>
    </div>

</div>


                  <!--===========================SLIDE PHOTO========================-->

<div class="col-md-6">
<!-- Wrapper for slides -->
<!--Panel with Header-->
     <!--===================================================-->
        <div class="panel">
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox" style="height:300px;">
            
                    @foreach(explode('|',$images->urlimage) as $key => $url)
                    
                        <div class="item{{$key == 0 ? ' active' : ''}}">
                        
                            <img src="../../../app/photos/{{$url}}" style="height:300px" alt="...">
                        
                        </div>
                    
                    @endforeach                
            
                    </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
        </div>
    </div>
    <!--============================FIN SLIDE PHOTO=======================-->
    <!--End Panel with Header-->
    <!-- Controls -->


    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>
            </div>
        </div>
    </div>

</div>


                                </div>
                                </div>
                                <!--===================================================-->
                                <!--End Panel with Header-->
                            </div>
                        </div>
                    </div>
                    <!--===================================================-->
                    <!--End page content-->



                    <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title"> Commentaires </h3>
                            </div>
                            <div class="panel-body">
                            @foreach($coms as $commentaire)
                                <div class="media">
                                    <div class="media-left">
                                        <a>
                                        <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="http://placehold.it/64x64/39CCCC/ffffff">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                    <a class="btn btn-warning" href="{{ route('deletecomment',$commentaire->id) }}">Supprimer</a>
                                        <h4 class="media-heading">{{$commentaire->name}}</h4>
                                        {{$commentaire->comment}}
                                    <!--    
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                <img class="media-object" data-src="holder.js/64x64" alt="64x64" src="http://placehold.it/64x64/39CCCC/ffffff">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading">Nested media heading</h4>
                                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                                            </div>
                                        </div>
                                    -->    

                                    </div>

                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>





                </section>
                <!--===================================================-->
@include('articles.footer')