@extends('admin.template')

@section('title')
    QS Drives
@endsection

@section('content')
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Gestion des drives</h4>
                </div>
                <div class="card-body table-responsive">
                    <p>
                        Cette partie vous permet de gérer paramètres du <strong>Drive de la société</strong> ainsi que l'ajout, la suppression ou la modification des <strong>utilisateurs</strong> du Drive et de leurs <strong>droits d'accès</strong>.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="myDrive" class="row2 wrap std-section-colors">
        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
            <div class="overlay_drive" id="overlay_drive_1"></div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Informations</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <ul id="drive_details" class="drive_no_padding">
                            <li>
                                <span class="specials_inputs_title"><b>Limiteur de Volume</b><i class="get_color">de 1Go à {!! $data['full'] !!}Go</i><span id="infos_fulldrive">Changer la <a href="/admin/parametres">limite maximale</a></span></span>
                                <div class="specials_inputs get_color">
                                    <input class="form-control" type="number" id="disk_infos" data-space="{!! $data['space'] !!}" data-used="{!! $data['width'] !!}" data-total="{!! $data['limit'] !!}" value="{!! $data['limit'] !!}" min="1" max="{!! $data['full'] !!}">
                                    {!! import_svg('refresh', 'get_bg', [['id', 'refresh-drive-space']]) !!}
                                </div>
                            </li>
                            <li id="disc_space">
                                <b>Espace disque :&nbsp;</b>
                                <span id="space_cnt">
                                    <spaces class="get_color">{!! $data['used'] !!}</spaces> utilisés sur <spaces class="get_color">{!! $data['limit'] !!}&nbsp;Go</spaces>
                                </span>
                                <span id="disc_total">
                                    <span id="disc_cursor"></span>
                                </span>
                            </li>
                            <li id="drive_url">
                                <b>URL :&nbsp;</b><i><a class="get_color" href="{{ config('app.drive') }}" target="_blank">drive.quanticalsolutions.com</a></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
            <div class="overlay_drive" id="overlay_drive_2"></div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Racines</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <ul class="drive_no_padding">
                            {!! $data['roots'] !!}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="myDriveAdmin" class="row2 wrap std-section-colors">
        <form method="post" class="single_drive_head xLarge-12 large-12 medium-12 small-12 xSmall-12">
            <div class="overlay_drive" id="overlay_drive_3"></div>
            <div class="col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Administrateurs</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="admins_sides_drive row2 wrap full">
                            <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                <div class="padd-around">
                                    <label>Ajouter un administrateur</label>
                                    <ul id="drive_details_admin">
                                        {!! $data['admins'] !!}
                                    </ul>
                                </div>
                            </div>
                            <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                <div class="padd-around">
                                    <label>Autoriser les racines</label>
                                    <ul id="drive_paths_admin">
                                        {!! $data['paths'] !!}
                                    </ul>
                                </div>
                            </div>
                            <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12 row2 center">
                                <button disabled id="admin_driver_validator" class="btns-admin" type="submit">Autoriser</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
