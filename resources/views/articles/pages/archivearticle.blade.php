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
                        <h3 class="panel-title">ARTICLES Archivée</h3>
                    </div>
                    <div class="panel-body">





            <div class="pad-btm form-inline">
                <div class="row">
                    <div class="col-sm-6 table-toolbar-left">
                        <div class="btn-group">
                        <a class="btn btn-warning btn-labeled fa fa-toggle-left" href="{{ route('index') }}">Accueil Article</a>
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
                        <th>Seo</th>
                        <th>Date d'insertion</th>

                        <th>Recuperation</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($arch as $archive)
                        @if($archive->archive == 1)
                        <tr>
                            <td>{{ $archive->id }}</td>
                            
                            <td> {{ $archive->titre }} </td>
                            
                            <td>{{ $archive->tag }}</td>
                            
                            <td>{{ $archive->seo }}</td>
                            
                            <td><span class="text-muted"><i class="fa fa-clock-o"> </i>  {{ $archive->created_at->format('d-m-Y') }}</span></td>

                            <td>
                                <a class="btn btn-info btn-icon icon-lg fa fa-reply"  href="{{ route('desarchive',$archive->id) }}"></a> 
                                <a class="btn btn-danger btn-icon icon-lg fa fa-remove" href="{{ route('deletearchive',$archive->id) }}"></a>                   
                            </td>
                            
                        </tr>
                        @elseif($archive->archive == 0)
                        @endif
                     @endforeach

                    </tbody>
                </table>
                {{ $arch->links() }}                                  

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