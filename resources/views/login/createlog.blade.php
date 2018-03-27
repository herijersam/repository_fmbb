@extends('authentication')

@section('content')

<div id="container">
        <!-- LOGIN FORM -->
        <!--===================================================-->
        <div class="lock-wrapper">
            <div class="row">
                <div class="col-xs-12">
                    <div class="lock-box">
                        <div class="main">
                            <h3>S'il vous plait Log In,<a href="#"></a></h3>
                           <!-- <div class="row">
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" class="btn btn-lg btn-primary btn-block">Facebook</a>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <a href="#" class="btn btn-lg btn-info btn-block">Google</a>
                                </div>
                            </div>-->
                            <div class="login-or">
                                <hr class="hr-or">
                                <span class="span-or">ou</span>
                            </div>
                            <form role="form">
                                <div class="form-group">
                                    <label for="inputUsernameEmail">Nom ou email</label>
                                    <input type="text" class="form-control" id="inputUsernameEmail">
                                </div>
                                <div class="form-group">
                                    <label for="inputPassword">Mot de passe</label>
                                    <input type="password" class="form-control" id="inputPassword">
                                </div>

                                <div class="pull-left pad-btm">
                                    <div class="checkbox">
                                        <label class="form-checkbox form-icon form-text">
                                            <input type="checkbox"> Se souvenir de moi
                                        </label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn btn-primary pull-right">
                                    Log In
                                </button>
                                
                            </form>

                        </div>
                                               
                    </div>

                </div>
                <div class="registration"> <a class="pull-left" href="{{ route('registration') }}"><span class="text-primary">Inscription ?</span></a></div>
            </div>

        </div>
<!--===================================================-->

@endsection