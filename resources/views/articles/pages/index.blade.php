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





            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <div class="btn-group">
                        <a class="btn btn-primary btn-labeled fa fa-plus-circle" href="{{ route('create') }}">Ajouter Article</a>
                        </div>
                        <div class="btn-group">
                        <a class="btn btn-warning btn-labeled fa fa-recycle" href="{{ route('archive') }}">Voir Articles Archivée</a>
                        </div>
                    </div>
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


                    <div class="col-sm-6 table-toolbar-right">
                    
                                </div>
                            </div>
                        </div>
                    <div class="table-responsive">


            <table class="table table-striped">
            <thead>
                    <tr>
                        <th>Réference</th>
                        <th>Titre</th>
                        <th>tag</th>
                        <th></th>
                        <th>Date d'insertion</th>
                        <th>Statuts</th>
                        <th>Publication</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)

                    @if($article->archive == 0)
                        <tr>
                            <td>{{ $article->id }}</td>
                            
                            <td> {{str_limit($article->titre, $limit = 20, $end = '...')}} </td>
                            
                            <td>{{str_limit($article->tag, $limit = 17, $end = '...')}}</td>
                            
                            <td>
                               
                            </td>
                            
                            <td><span class="text-muted"><i class="fa fa-clock-o"> </i>  {{ $article->created_at->format('d-m-Y') }}</span></td>
                            
                            <td>
                                
                                <div>
                                    @if($article->statut == 1)
                                    <span class="label label-table label-mint">Publié</span>
                                    @elseif($article->statut == 0)
                                    <span class="label label-table label-dark">En attente..</span>
                                    @endif
                                </div>

                            </td>
                            
                            <td>
                                @if($article->statut == 0)
                                    <a class="label label-table label-success" href="{{ route('publication',$article->id) }}">Publier</a>
                                @elseif($article->statut == 1)
                                <a class="label label-table label-default"  href="{{ route('depublication',$article->id) }}">Retirer</a>
                                @endif
                            </td>

                            <td>
                                <a class="btn btn-info btn-icon icon-lg fa fa-pencil"  href="{{ route('edit',$article->id) }}"></a>
                                <a class="btn btn-mint btn-icon icon-lg fa fa-eye" href="{{ route('show',$article->id) }}"></a>
                                <a class="btn btn-danger btn-icon icon-lg fa fa-trash" href="{{ route('delete',$article->id) }}"></a>                    
                            </td>
                            
                        </tr>
                    @else
                    
                    @endif

                     @endforeach

                    </tbody>
                </table>
                {{ $articles->links() }}                                  

            </div>
        
        <!--========================================================Fin Article=========================================================-->

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