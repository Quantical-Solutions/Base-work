@extends('layouts.guest')

@section('title')
    Admin - Mot de passe oublié
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
                    <div class="row">
                        <div class="col-md-12">
                            @error('email')
                            <div class="errorConn">
                                <p>Email incorrect</p>
                            </div>
                            @enderror
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Identifiant</label>
                                <input type="email" name="email" id="email" autocomplete="email" class="form-control" required>
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
                                <input type="password" name="password" id="password" autocomplete="current-password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            @error('password_confirmation')
                            <div class="errorConn">
                                <p>La confirmation ne correspond pas</p>
                            </div>
                            @enderror
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Confirmation</label>
                                <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="current-password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="reset" class="btn btn-primary pull-right">Effacer</button>
                    <button type="submit" class="btn btn-primary pull-right">Confirmer</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>

@endsection
