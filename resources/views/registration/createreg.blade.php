@extends('authentication')

@section('content')

<div id="container" class="cls-container">
            <!-- REGISTRATION FORM -->
            <!--===================================================-->
            <div class="lock-wrapper">
                <div class="panel lock-box">
                    <div class="center"> <img alt="" src="img/user.png" class="img-circle"/> </div>
                    <h4> Cher Administrateur !</h4>
                    <p class="text-center">Please login to Access your Account</p>
                    <div class="row">
                        <form id="registration" class="form-inline" action="{{route('registrer')}}" method="POST">
                        {{csrf_field()}}
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div id="demo-error-container"></div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label for="signupInputName" class="control-label">Nom</label>
                                    <input id="signupInputName" type="text" placeholder="Entrer Votre Nom" class="form-control" name="nom" />
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label for="signupInputName" class="control-label">Prenom</label>
                                    <input id="signupInputName" type="text" placeholder="Entrer votre prenom" class="form-control" name="prenom" />
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label for="signupInputEmail" class="control-label">Adresse E-mail:</label>
                                    <input id="signupInputEmail" type="email" placeholder="Entrer Adresse E-mail" class="form-control" name="email" />
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label for="signupInputName" class="control-label">Contact</label>
                                    <input id="signupInputName" type="text" placeholder="Contact..." class="form-control" name="contact" />
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label for="signupInputPassword" class="control-label">Mot de Passe:</label>
                                    <input id="signupInputPassword" type="password" placeholder="Votre Mot de passe" class="form-control lock-input" name="password" />
                                </div>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <div class="text-left">
                                    <label for="confirmation" class="control-label">Confirmation du mot de passe:</label>
                                    <input id="confirmation" type="password" placeholder="Confirmation" class="form-control lock-input" name="confirmation" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-block btn-primary">
                            S'inscrire
                            </button>
                        </form>
                    </div>
                </div>
                <div class="registration"> Déjà avoir un compte! <a href="{{ route('login') }}"> <span class="text-primary"> Login ici </span> </a> </div>
            </div>
            <!--===================================================-->
            <!-- END REGISTRATION FORM -->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->

@endsection