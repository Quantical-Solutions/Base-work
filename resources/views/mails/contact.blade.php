<body>
@if($mode == 'to_admin')
    <p>Vous avez reçu un message de <b>{{ $firstname }} {{ $lastname }}</b> depuis le site de <b><a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a></b></p>
    <p>Ville : <b>{{ $city }}</b>
        <br>
        E-Mail : <b>{{ $email }}</b></p>
    <p>
        <b>Message :</b>
        <br>
        <br>
        <i style="background-color: #E6E6E6; padding: 10px; border-radius: 5px;">{{ $mess }}</i>
    </p>
@elseif($mode == 'to_sender')
    <p>Bonjour <b>{{ $firstname }}</b>,</p>
    <p>
        L'équipe de <b><a href="{{ config('app.url') }}" target="_blank">{{ config('app.name') }}</a></b> a bien reçu votre message.
        <br>
        Nous vous répondrons dans les plus brefs délais.
    </p>
    <p>L'&Eacute;quipe <b>{{ config('app.name') }}</b></p>
@endif
</body>