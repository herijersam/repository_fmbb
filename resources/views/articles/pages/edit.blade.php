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






<form class="form-horizontal form-bordered" action="{{ route('update', $id) }}" method="POST">
{!!csrf_field()!!}
<input type="hidden" value="post" name="_method" />

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('warning'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
     <!-- Wizard Container 1 -->
        <div class="wizard-title"> Editer Articles </div>
            <div class="wizard-container">
               <div class="form-group">
                    <div class="col-md-12">
                                                       
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Titre : </label>
                    <div class="col-sm-6">
                        <input class="form-control" type="text" name="titre" value="{{$article->titre}}" data-parsley-range="[4, 10]" data-parsley-group="order" data-parsley-required />
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Contenu : </label>
                    <div class="col-sm-6">
                      <textarea id="demo-textarea-input" rows="5" class="form-control" name="contenu" value="">{{$article->contenu}}</textarea>
                    </div>
                </div>

                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label"> Tag : </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" id="passwordinput" name="tag" value="{{$article->tag}}" data-parsley-minlength="6" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> Slug : </label>
                <div class="col-sm-6">
                    <input class="form-control" type="text" name="slug" value="{{$article->slug}}" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> Seo : </label>
                <div class="col-sm-6">
                    <input class="form-control"  type="text" name="seo" value="{{$article->seo}}" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"> Catégorie : </label>
                <div class="col-sm-6">
                    <input class="form-control"  type="text" name="categorie" value="{{$article->categorie}}" data-parsley-equalto="" data-parsley-group="order" data-parsley-required />
                </div>
            </div>
            
            <div class="form-group">
            <label class="col-sm-2 control-label"> Images : </label>
            <div class="col-sm-6">

                        <div class="form-group">
                                      
                           
                                <!--<input type="file" class="form-control" id="images" name="photos[]" value="" onchange="preview_images();" multiple/>-->
                            
                        </div>
                        
                        <div class="row">
                            
                                @foreach(explode('|',$images) as $key => $url)
                                            <img src="../../app/photos/{{$url}}" key="{{$key}}" class="img-rounded img-sm" alt="..."> 
                                @endforeach
                            
                            </div>
                        

                </div>
            </div>



            <div class="form-group">
                                                    
                <div class="col-sm-6">
                    <button type="submit" class="btn btn-success btn-icon icon-lg fa fa-archive">  Valider</button>
                </div>
                                                


                <div class="pull-right">
                    <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>
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