@extends('layouts.guest')

@section('title')
    Admin - Challenge
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
                <h4 class="card-title">Authentification</h4>
                <p class="card-category">Un code vous a été adressé par email. Veuillez saisir celui ci dans le champs ci-dessous afin de finaliser votre authentification</p>
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('Challenge') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            @error('code')
                            <div class="errorConn">
                                <p>Le code ne correspond pas</p>
                            </div>
                            @enderror
                            <div class="form-group bmd-form-group">
                                <label class="bmd-label-floating">Code de vérification</label>
                                <input type="text" name="code" autocomplete="of" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Vérification</button>
                    <div class="clearfix"></div>
                </form>
                <form id="logout-form-challenge" action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="infos" type="submit">Retour à la page de connexion</button>
                </form>
            </div>
        </div>
    </section>

@endsection