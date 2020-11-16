<body>
<p>Bonjour <b>{{ $name }}</b>,</p>

<p>
    Vous disposez de 5 minutes maximum pour saisir le code suivant afin de confirmer votre identité:
    <br>
    <br>
    <b>{{ $code }}</b>
    <br>
    <br>
    &Agrave; l'issue des 5 minutes, si vous n'avez toujours pas saisi ce code, vous serez rediriger vers la page de connexion pour régénérer le jeton de sécurité.
</p>
<br>
<p>L'&Eacute;quipe <b>{{ config('app.name') }}</b></p>
</body>
