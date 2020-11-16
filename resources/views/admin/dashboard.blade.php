@extends('admin.template')

@section('title')
    Statistiques
@endsection

@section('content')
    <div class="row" id="statsPage">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                    </div>
                    <p class="card-category">Serveur</p>
                    <h3 class="card-title">49
                        <small>MO</small>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">settings</i>
                        Espace disque utilisé
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">store</i>
                    </div>
                    <p class="card-category">Chiffre d'affaires</p>
                    <h3 class="card-title">34 245€</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">date_range</i> Exercice (2020)
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">info_outline</i>
                    </div>
                    <p class="card-category">IPs bloquées</p>
                    <h3 class="card-title">75</h3>
                </div>
                <div class="card-footer">
                    <div class="stats text-danger">
                        <i class="material-icons">warning</i> Tentatives forcées
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-facebook"></i>
                    </div>
                    <p class="card-category">Abonnés</p>
                    <h3 class="card-title">+245</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Au <?= date('d') . ' ' . intval(date('m'))
                        . ' ' . date('Y') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-muted card-header-icon">
                    <div class="card-icon">
                        <i class="fa fa-github"></i>
                    </div>
                    <p class="card-category">Repositories</p>
                    <h3 class="card-title">+25</h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">update</i> Au <?= date('d') . ' ' . intval(date('m'))
                        . ' ' . date('Y') ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-header card-header-primary card-header-icon">
                    <div class="card-icon">
                        <i class="material-icons">account_balance</i>
                    </div>
                    <p class="card-category">Choisir un exercice</p>
                    <h3 class="card-title">
                        <i class="material-icons text-primary">calendar_today</i>
                        <?= date("Y") ?>
                    </h3>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">settings</i>Sélectionner un exercice
                        <select class="text-primary" id="graphYear" onchange="launchGraph(this)">
                            <option selected value="<?= intval(date("Y")) ?>"><?= intval(date("Y")) ?></option>
                            <?php for ($i = 2019; $i < intval(date("Y")); $i++) { ?>
                            <option value="<?= $i ?>"><?= $i ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts -->
    <div class="row">
        <div class="col-md-12">
            <div class="card card-chart">
                <div class="card-header card-header-success">
                    <div class="ct-chart" id="newCustomersChart" data-coord="<?= compileStats('nouveaux_clients', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Nouveaux clients</h4>
                    <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> &Eacute;volution entre
                        les mois de <?= intval(date('m', strtotime(Auth::user()->last_connexion))) ?>
                        de <span class="exoYearBefore"><?= intval(date("Y")) - 1 ?></span> et <span class="exoThisYear"><?=
                            date
                            ("Y") ?></span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <div class="ct-chart" id="activateCardChart" data-coord="<?= compileStats('activation_carte', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Activation carte</h4>
                    <p class="card-category">Nombre d'activations de cartes sur l'exercice de <span class="exoThisYear"><?= date("Y") ?></span></p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-danger">
                    <div class="ct-chart" id="activateAppChart" data-coord="<?= compileStats('activation_app', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Activation app</h4>
                    <p class="card-category">Nombre d'activations de l'application sur l'exercice de <span class="exoThisYear"><?= date("Y") ?></span></p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header card-header-info">
                    <div class="ct-chart" id="estateChart" data-coord="<?= compileStats('demandes_de_devis', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Demandes de devis</h4>
                    <p class="card-category">
                        <span class="text-info"><i class="fa fa-long-arrow-up"></i> 55% </span> &Eacute;volution entre
                        les mois de <?= intval(date('m', strtotime(Auth::user()->last_connexion))) ?>
                        de <span class="exoYearBefore"><?= intval(date("Y")) - 1 ?></span> et <span class="exoThisYear"><?= date("Y") ?></span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header card-header-success">
                    <div class="ct-chart" id="orderChart" data-coord="<?= compileStats('commandes', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Commandes</h4>
                    <p class="card-category">
                        <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> &Eacute;volution entre
                        les mois de <?= intval(date('m', strtotime(Auth::user()->last_connexion))) ?>
                        de <span class="exoYearBefore"><?= intval(date("Y")) - 1 ?></span> et <span class="exoThisYear"><?=
                            date
                            ("Y") ?></span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card card-chart">
                <div class="card-header card-header-primary">
                    <div class="ct-chart" id="productionChart" data-coord="<?= compileStats('productions_de_cartes', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Production de cartes</h4>
                    <p class="card-category">
                        <span class="text-primary"><i class="fa fa-long-arrow-up"></i> 55% </span> &Eacute;volution entre
                        les mois de <?= intval(date('m', strtotime(Auth::user()->last_connexion))) ?>
                        de <span class="exoYearBefore"><?= intval(date("Y")) - 1 ?></span> et <span class="exoThisYear"><?=
                            date
                            ("Y") ?></span>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-danger">
                    <div class="ct-chart" id="deliveryChart" data-coord="<?= compileStats('livraisons', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Livraisons</h4>
                    <p class="card-category">
                    <p class="card-category">Livraisons effectuées au cours de l'exercice</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card card-chart">
                <div class="card-header card-header-warning">
                    <div class="ct-chart" id="distriChart" data-coord="<?= compileStats('distributeurs', date("Y")) ?>"></div>
                </div>
                <div class="card-body">
                    <h4 class="card-title">Distributeurs</h4>
                    <p class="card-category">Distributeurs actifs durant l'exercice</p>
                </div>
                <div class="card-footer">
                    <div class="stats">
                        <i class="material-icons">access_time</i> <?php echo (Auth::user()->last_connexion != null) ? 'dernières statistiques depuis le ' . date('d', strtotime(Auth::user()->last_connexion)) . ' ' . intval(date('m', strtotime(Auth::user()->last_connexion))) . ' ' . date('Y', strtotime(Auth::user()->last_connexion)) : 'Premier rapport'; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <span class="nav-tabs-title">Tasks:</span>
                            <ul class="nav nav-tabs" data-tabs="tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#profile" data-toggle="tab">
                                        <i class="material-icons">bug_report</i> Bugs
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#messages" data-toggle="tab">
                                        <i class="material-icons">code</i> Website
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#settings" data-toggle="tab">
                                        <i class="material-icons">cloud</i> Server
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="messages">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane" id="settings">
                            <table class="table">
                                <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                    <span class="check"></span>
                                  </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Edit Task" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-md-12">
            <div class="card">
                <div class="card-header card-header-warning">
                    <h4 class="card-title">Employees Stats</h4>
                    <p class="card-category">New employees on 15th September, 2016</p>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-hover">
                        <thead class="text-warning">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Salary</th>
                        <th>Country</th>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>Dakota Rice</td>
                            <td>$36,738</td>
                            <td>Niger</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Minerva Hooper</td>
                            <td>$23,789</td>
                            <td>Curaçao</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Sage Rodriguez</td>
                            <td>$56,142</td>
                            <td>Netherlands</td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Philip Chaney</td>
                            <td>$38,735</td>
                            <td>Korea, South</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
