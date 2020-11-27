@php date_default_timezone_set('Europe/Paris'); @endphp
<div id="calendar-modal" class="col-md-12 padd-around">
    <div id="copy-to-clipboard" class="bg-cal">
        <p>Copié vers le presse papier</p>
    </div>
    <div id="custom-occurrences-container">
        <div>
            <h4>Récurrence personnalisée</h4>
            <div class="row2 wrap y-center">
                <p class="labeler">Répéter tou(te)s les</p>
                <input type="number" min="1" name="occurrences_custom_number" autocomplete="off" value="1" class="form-control grounded">
                <div class="selector row2 wrap">
                    <div class="label">
                        <input type="hidden" value="1" name="">
                        <p>semaine</p>
                        {!! import_svg('expand', 'calendar-modal-pictos') !!}
                    </div>
                    <ul>
                        <li class="selector-li" data-value="0">jour</li>
                        <li class="selector-li displaySelectorLi" data-value="1">semaine</li>
                        <li class="selector-li" data-value="2">mois</li>
                        <li class="selector-li" data-value="3">année</li>
                    </ul>
                </div>
            </div>
            <div class="row2 wrap">
                <p class="labeler full">Répéter le</p>
                <div class="row2 wrap y-center">
                    <span class="cal-sel-days">
                        L
                        <input type="checkbox" class="hidden-element" name="[]" value="1">
                    </span>
                    <span class="cal-sel-days">
                        M
                        <input type="checkbox" class="hidden-element" name="[]" value="2">
                    </span>
                    <span class="cal-sel-days selected-cal-sel-days">
                        M
                        <input checked type="checkbox" class="hidden-element" name="[]" value="3">
                    </span>
                    <span class="cal-sel-days">
                        J
                        <input type="checkbox" class="hidden-element" name="[]" value="4">
                    </span>
                    <span class="cal-sel-days">
                        V
                        <input type="checkbox" class="hidden-element" name="[]" value="5">
                    </span>
                    <span class="cal-sel-days">
                        S
                        <input type="checkbox" class="hidden-element" name="[]" value="6">
                    </span>
                    <span class="cal-sel-days">
                        D
                        <input type="checkbox" class="hidden-element" name="[]" value="0">
                    </span>
                </div>
            </div>
            <div class="row2 wrap full no-margin">
                <p class="labeler full">Se termine</p>
                <div class="radios">

                    <!-- Radio Button -->
                    <div class="radio-div occurrences-radio">
                        <input type="radio" checked name="occurrences_custom_end" value="never">
                        <div class="radio-circle">
                            <span class="radio-plain plained"></span>
                        </div>
                        <label>Jamais</label>
                    </div>

                    <!-- Radio Button -->
                    <div class="radio-div occurrences-radio with-inputs opacity">
                        <input type="radio" name="occurrences_custom_end" value="{{ date("Y-m-d") }}">
                        <div class="radio-circle">
                            <span class="radio-plain"></span>
                        </div>
                        <label>Le</label>
                        <div class="marged-input grounded">
                            <input class="form-control" type="date" name="" value="{{ date("Y-m-d") }}">
                        </div>
                    </div>

                    <!-- Radio Button -->
                    <div class="radio-div occurrences-radio with-inputs opacity">
                        <input type="radio" name="occurrences_custom_end" value="1">
                        <div class="radio-circle">
                            <span class="radio-plain"></span>
                        </div>
                        <label>Après</label>
                        <div class="marged-input input-container grounded row2 y-center">
                            <input class="form-control" min="1" type="number" name="" value="1">
                            <span>occurrences</span>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row2 wrap center full no-margin">
                <button id="cancel-cal-custom" class="bg-cal btns-admin" type="button">Annuler</button>
                <button id="validate-cal-custom" class="bg-cal btns-admin" type="button">Terminer</button>
            </div>
        </div>
    </div>
    <form method="post" id="calendar-modal-container">
        <section class="row2 wrap sup-container">
            <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12 left-panel">
                <div class="padd-around">
                    <div class="row2 wrap" id="top-cal-modal-left">
                        {!! import_svg('nok', 'calendar-modal-pictos', [['id', 'calendar-modal-cross-close']]) !!}
                        <div class="form-group bmd-form-group xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <label class="bmd-label-floating">Ajouter un titre</label>
                            <input type="text" name="title" autocomplete="off" value="" class="form-control">
                        </div>
                        <div class="row2 wrap y-center xLarge-12 large-12 medium-12 small-12 xSmall-12 sub-sup-left-side">
                            <input type="date" name="start_date" value="{{ date("Y-m-d") }}" class="form-control grounded">
                            <input type="time" name="start_time" value="{{ date("H:i") }}" class="form-control grounded">
                            <span>&nbsp;-&nbsp;</span>
                            <input type="time" name="end_time" value="00:00" class="form-control grounded">
                            <input type="date" name="end_date" value="{{ date('Y-m-d', strtotime(date("Y-m-d") . ' 00:00:00' . ' +1 day')) }}" class="form-control grounded">
                        </div>
                        <div class="margin-top row2 wrap y-center xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <div class="checkbox-container row2 wrap">
                                <span class="checkmark"></span>
                                <label class="container-check" onclick="this.previousElementSibling.click()">Toute la journée</label>
                                <input class="hidden-element" type="checkbox" value="1" name="all_day">
                            </div>
                            <div class="selector row2 wrap">
                                <div class="label">
                                    <input type="hidden" value="0" name="">
                                    <p>Une seule fois</p>
                                    {!! import_svg('expand', 'calendar-modal-pictos') !!}
                                </div>
                                <ul>
                                    <li class="selector-li displaySelectorLi" data-value="0">Une seule fois</li>
                                    <li class="selector-li" data-value="1">Tous les jours</li>
                                    <li class="selector-li" data-value="2">Toutes les semaines le <span class="calendar-modal-day"></span></li>
                                    <li class="selector-li" data-value="3">Tous les mois le premier <span class="calendar-modal-day"></span></li>
                                    <li class="selector-li" data-value="4">Tous les ans le <span class="calendar-modal-day-month"></span></li>
                                    <li class="selector-li" data-value="5">Du lundi au vendredi</li>
                                    <li class="custom-div-open">Personnaliser...</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row2 wrap big-margin-top">
                        <div class="row2 full underlined">
                            <h4 class="color-cal border-cal">Détails du RDV</h4>
                        </div>
                        <div class="cal-modal-sub-container full">
                            <div class="with-picto">
                                {!! import_svg('rooms', 'calendar-modal-pictos') !!}
                                <button id="add-conf" type="button" class="bg-cal btns-admin">Ajouter une visioconférence</button>
                                <div id="go-to-conf">
                                    {!! import_svg('nok', 'calendar-modal-pictos', [['id', 'delete-cal-visio']]) !!}
                                    <a target="_blank" href="" class="bg-cal btns-admin">Entrer dans la salle</a>
                                    <div id="room-url">
                                        <input type="text" readonly class="color-cal">
                                        {!! import_svg('copy', 'calendar-modal-pictos', [['title', 'Copier vers le presse papier']]) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="with-picto with-small-picto">
                                {!! import_svg('location', 'calendar-modal-pictos') !!}
                                <input type="hidden" name="latitude-cal" id="latitude-cal">
                                <input type="hidden" name="longitude-cal" id="longitude-cal">
                                <input autocomplete="off" spellcheck="false" class="form-control grounded full" placeholder="Ajouter un lieu" type="search" id="address-input" name="location">
                            </div>
                            <div id="map-example-container"></div>
                            <div class="with-picto">
                                {!! import_svg('notifications', 'calendar-modal-pictos') !!}
                                <div id="notifications-cal">
                                    <div class="notifications-cal-container">
                                        <div id="original-notifs-div" data-notifs="">
                                            <div class="selector row2 wrap">
                                                <div class="label">
                                                    <input type="hidden" value="1" name="notif_type[]">
                                                    <p>Notification</p>
                                                    {!! import_svg('expand', 'calendar-modal-pictos') !!}
                                                </div>
                                                <ul>
                                                    <li class="selector-li" data-value="0">E-mail</li>
                                                    <li class="selector-li displaySelectorLi" data-value="1">Notification</li>
                                                </ul>
                                            </div>
                                            <input type="number" min="1" name="notif_time[]" autocomplete="off" value="30" class="form-control grounded">
                                            <div class="selector row2 wrap">
                                                <div class="label">
                                                    <input type="hidden" value="0" name="notif_unit[]">
                                                    <p>minutes</p>
                                                    {!! import_svg('expand', 'calendar-modal-pictos') !!}
                                                </div>
                                                <ul>
                                                    <li class="selector-li displaySelectorLi" data-value="0">minutes</li>
                                                    <li class="selector-li" data-value="1">heures</li>
                                                    <li class="selector-li" data-value="1">jours</li>
                                                    <li class="selector-li" data-value="1">semaines</li>
                                                </ul>
                                            </div>
                                            {!! import_svg('nok', 'calendar-modal-pictos') !!}
                                        </div>
                                        <div id="other-notifs-div">
                                            <!-- JS Replacer -->
                                        </div>
                                        <div>
                                            <p id="add-notif-btn">Ajouter une notification</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="with-picto">
                                {!! import_svg('cals', 'calendar-modal-pictos') !!}
                                <div class="selector row2 wrap" id="color-cal-modal">
                                    <p class="labeler">Couleur du RDV</p>
                                    <div class="label">
                                        <input type="hidden" value="" name="color">
                                        <p></p>
                                        {!! import_svg('expand', 'calendar-modal-pictos') !!}
                                    </div>
                                    <ul id="color-picker-cal">
                                        <li class="selector-li displaySelectorLi" data-value="">
                                            <span class="circle-color"></span>
                                        </li>
                                        <li class="selector-li" data-value="#009900">
                                            <span class="circle-color" style="background-color: #009900;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#ffd700">
                                            <span class="circle-color" style="background-color: #ffd700;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#996633">
                                            <span class="circle-color" style="background-color: #996633;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#e62e00">
                                            <span class="circle-color" style="background-color: #e62e00;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#0066ff">
                                            <span class="circle-color" style="background-color: #0066ff;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#00b8e6">
                                            <span class="circle-color" style="background-color: #00b8e6;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#666633">
                                            <span class="circle-color" style="background-color: #666633;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#003366">
                                            <span class="circle-color" style="background-color: #003366;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#999966">
                                            <span class="circle-color" style="background-color: #999966;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#000000">
                                            <span class="circle-color" style="background-color: #000000;"></span>
                                        </li>
                                        <li class="selector-li" data-value="#999999">
                                            <span class="circle-color" style="background-color: #999999;"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="with-picto">
                                {!! import_svg('paragraph', 'calendar-modal-pictos') !!}
                                <div class="ckeditor-container">
                                    <textarea id="description-cal-modal" class="ckeditor"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12 right-panel">
                <div class="padd-around">
                    <div class="row2 order2" id="top-cal-modal-right">
                        <button type="submit" class="bg-cal btns-admin" disabled>Enregistrer</button>
                    </div>
                    <div class="row2 wrap order1 big-margin-top">
                        <div class="row2 full underlined">
                            <h4 class="color-cal border-cal">Invités</h4>
                        </div>
                        <div class="cal-modal-sub-container full">
                            <div class="with-picto cal-guests">
                                {!! import_svg('user', 'calendar-modal-pictos') !!}
                                <input autocomplete="off" spellcheck="false" class="form-control grounded full" placeholder="Ajouter des invités" type="text" id="add-guests-cal">
                            </div>
                            <ul id="emails-cal-results">
                                @foreach($emails as $email)
                                    <li @if($email['name'] == 'Organisateur') id="organisateur-cal" @endif>
                                        {!! $email['avatar'] !!}
                                        <div>
                                            <p>{{ $email['email'] }}</p>
                                            <div class="smallers">
                                                <small class="color-cal">{{ $email['name'] }}</small>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                            <div id="guest-list-inputs">
                                @foreach($emails as $email)
                                    @if($email['name'] == 'Organisateur')
                                    <div id="organisateur-to-list" class="guest-item">
                                        <input type="hidden" name="guests[]" value="{{ $email['email'] }}">
                                        {!! $email['avatar'] !!}
                                        <div>
                                            <p>{{ $email['email'] }}</p>
                                            <div class="smallers">
                                                <small class="color-cal">{{ $email['name'] }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</div>