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
                <h4 class="card-title">Réinitialisation</h4>
                <p class="card-category">Veuillez saisir votre email</p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('password.email') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            @error('email')
                            <div class="errorConn">
                                <p>Email non reconnu...</p>
                            </div>
                            @enderror
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Votre Email</label>
                                <input type="email" name="email" autocomplete="email" class="form-control" required>
                            </div>
                            <a class="row" href="{{ route('login') }}">
                                Retour à la page de connexion
                            </a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Réinitialiser</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </section>

@endsection
