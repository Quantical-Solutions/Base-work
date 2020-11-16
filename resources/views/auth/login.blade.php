@extends('layouts.guest')

@section('title')
    Admin - Connexion
@endsection

@section('content')

    <section id="authSection">

        @if (session('status'))
            <div id="statusConn" class="sup-cont-conn">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Connexion</h4>
                <p class="card-category">Veuillez saisir vos identifiants de connexion</p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('login') }}">
                    @csrf
                    <input type="hidden" name="ip" value="1">
                    <input type="hidden" name="last_page" value="">
                    <input type="hidden" name="iploc" value="{{ geoloc() }}">
                    <div class="row">
                        <div class="col-md-12">
                            @error('email')
                            <div class="errorConn">
                                <p>Email incorrect</p>
                            </div>
                            @enderror
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Identifiant</label>
                                <input type="email" autofocus name="email" autocomplete="off" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @error('password')
                            <div class="errorConn">
                                <p>Mot de passe incorrect</p>
                            </div>
                            @enderror
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Mot de passe</label>
                                <input type="password" name="password" autocomplete="off" class="form-control" required>
                            </div>
                            @if (Route::has('password.request'))
                                <a class="row" href="{{ route('password.request') }}">
                                    Mot de passe oublié ?
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group bmd-form-group">
                                <label for="remember_me" class="flex items-center check-align">
                                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                                    <span class="ml-2 text-sm text-gray-600">Se souvenir de moi</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <button type="reset" class="btn btn-primary pull-right">Effacer</button>
                    <button type="submit" class="btn btn-primary pull-right">Connexion</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>

@endsection
