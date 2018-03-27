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

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @elseif ($message = Session::get('warning'))
                        <div class="alert alert-danger">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

        <form class="form-horizontal form-bordered" action="{{ route('store') }}" id="wizard-validate" method="POST" enctype="multipart/form-data">

            <input type="hidden" value="{!!csrf_token()!!}" name="_token" />

                                    <!-- Panel heading -->
                                    <div class="panel-heading">
                                        <h3 class="panel-title">Ajout Articles</h3>
                                    </div>
                                    <div class="panel-body">
                                            <!-- Wizard Container 1 -->
                                        
                                            <!--<div class="wizard-container">-->
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                       
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Titre : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="titre" type="text" placeholder="Titre" data-parsley-range="[4, 10]" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Contenu : </label>
                                                        <div class="col-sm-9">
                                                        <textarea id="demo-textarea-input" rows="7" name="contenu" class="form-control" placeholder="content ici.."></textarea>
                                                        </div>                                                        
                                                </div>
                                                <div class="form-group wish-tags">
                                                    <label class="col-sm-2 control-label"> Tag : </label>
                                                    <div class="col-sm-9">
                                                    <input data-role="tagsinput" type="text" value="tag ici.." name="tag" data-parsley-required>
                                                  <!--  <ul id="jquery-tagIt-primary" class="primary">
                                                        <li>Tag ici</li>
                                                        
                                                    </ul>-->


                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Slug : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="slug" type="text" placeholder="Slug.." data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Seo : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="seo" type="text" placeholder="Seo" data-parsley-equalto="" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Catégorie : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="categorie" type="text" placeholder="Categorie" data-parsley-equalto="" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>

                                               

                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Administrateur : </label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" name="administrateurs_id" type="text" placeholder="Admin" data-parsley-equalto="#passwordinput" data-parsley-group="order" data-parsley-required />
                                                    </div>
                                                </div>
                                                </form>


                                                <div class="form-group">
                                                    <label class="col-sm-2 control-label"> Images : </label>
                                                    <div class="col-sm-9">
                                                 
                                                                <div class="form-group">         
                                                                        <input type="file" class="form-control" id="images" name="photos[]" onchange="preview_images();" multiple/>
                                                                    
                                                                </div>
                                                               
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    
                                                    <div class="col-sm-6">
                                                    <button type="submit" class="btn btn-success btn-icon  icon-lg fa fa-save">  Enregistrer</button>
                                                    </div>

                                                    <div class="pull-right">
                                                        <a class="btn btn-warning" href="{{ route('index') }}"> Retour</a>
                                                    </div>
                                                </div>
                                        
                                        <div class="panel-body">
                                                
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




<script>

//file upload

//file upload
</script>
@include('articles.footer')