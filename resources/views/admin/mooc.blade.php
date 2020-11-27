@extends('admin.template')

@section('title')
    QS Mooc
@endsection

@section('content')
    @php $identify_date = date("Y-m-d", strtotime($identify['date'])) . 'T'. date("H:i", strtotime($identify['date'])); @endphp
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Clé d'inscription</h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST">
                        <input type="hidden" name="moocController" value="clef">
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around">
                                <label>Clé</label>
                                <input class="form-control" onkeyup="identifyHREF(this)" required type="text" maxlength="50" name="clef" value="{!!
                                $identify['code'] !!}">
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around">
                                <label>Date de modification</label>
                                <input class="form-control" disabled type="datetime-local" value="{!! $identify_date !!}">
                            </div>
                        </div>
                        <div class="xLarge-12 large-12 medium-12 small-12 xSmall-12">
                            <div class="padd-around row2 wrap center copy">
                                <code>https://mooc.quanticalsolutions.com/inscription?identify={!! $identify['code'] !!}</code>
                                {!! import_svg('copy', 'copyIdentifier', [['onclick', 'copyIdentifier(this)']]) !!}
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Mettre à jour</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Classes<span class="titleCounters">{!! count($classes) !!}</span></h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="classes">
                        <input type="hidden" name="action" value="record">
                        <div class="padd-around column full-content full">
                            <label class="outDivMooc">Ajouter / Modifier / Supprimer</label>
                            <select class="outDivMooc" onchange="getSelectedInfos(this)" name="modify_id">
                                <option value="0">Modifier une classe</option>
                                @foreach ($classes as $classe)
                                <option value="{!! $classe->id !!}">{!! $classe->name !!} - {!! $classe->title !!} - {!! $classe->titre !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Nom</label>
                                <input class="form-control" required type="text" name="name">
                                <label>&Eacute;cole</label>
                                <select required name="school_id">
                                    <option selected disabled>Choisir</option>
                                    @foreach ($schools as $school)
                                    <option value="{!! $school['id'] !!}">{!! $school['title'] !!}</option>
                                    @endforeach
                                </select>
                                <label>Titre</label>
                                <select required name="titre_id">
                                    <option selected disabled>Choisir</option>
                                    @foreach ($titres as $titre)
                                    <option value="{!! $titre['id'] !!}">{!! $titre['name'] !!}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Début de cycle</label>
                                <select required name="start_year">
                                    <option selected disabled>Choisir</option>
                                    {!! $optionsYears !!}
                                </select>
                                <label>Fin de cycle</label>
                                <select required name="end_year">
                                    <option selected disabled>Choisir</option>
                                    {!! $optionsYears !!}
                                </select>
                                <label>Niveau</label>
                                <input class="form-control" type="number" min="1" max="5" required name="graduate">
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Enregistrer</button>
                            <button disabled class="moocDeleter btns-admin" type="button" onclick="deleteRecord(this)">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Titres<span class="titleCounters">{!! count($titres) !!}</span></h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="titres">
                        <input type="hidden" name="action" value="record">
                        <div class="padd-around column full-content full">
                            <label class="outDivMooc">Ajouter / Modifier / Supprimer</label>
                            <select class="outDivMooc" onchange="getSelectedInfos(this)" name="modify_id">
                                <option value="0">Modifier un titre</option>
                                @foreach ($titres as $titre)
                                <option value="{!! $titre['id'] !!}">{!! $titre['name'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Nom du titre</label>
                                <input class="form-control" required type="text" name="name">
                                <label>Nombre d'années</label>
                                <input class="form-control" required type="number" min="1" max="5" name="nb_years">
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Nature du titre</label>
                                <div class="displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input required type="radio" name="rncp" value="0">
                                    <span onclick="this.previousElementSibling.click()">Classique</span>
                                </div>
                                <div class="radioClass displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input type="radio" name="rncp" value="1">
                                    <span onclick="this.previousElementSibling.click()">RNCP</span>
                                </div>
                                <label>Type de formation</label>
                                <div class="displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input required type="radio" name="fc" value="1">
                                    <span onclick="this.previousElementSibling.click()">Courte</span>
                                </div>
                                <div class="radioClass displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input type="radio" name="fc" value="0">
                                    <span onclick="this.previousElementSibling.click()">Longue</span>
                                </div>
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Enregistrer</button>
                            <button disabled class="moocDeleter btns-admin" type="button" onclick="deleteRecord(this)">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Cours<span class="titleCounters">{!! count($courses) !!}</span></h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST" enctype="multipart/form-data">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="courses">
                        <input type="hidden" name="action" value="record">
                        <div class="padd-around column full-content full">
                            <label class="outDivMooc">Ajouter / Modifier / Supprimer</label>
                            <select class="outDivMooc" onchange="getSelectedInfos(this)" name="modify_id">
                                <option value="0">Modifier un cours</option>
                                @foreach ($courses as $course)
                                <option value="{!! $course['id'] !!}">{!! $course['titre'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Titre</label>
                                <input class="form-control" required type="text" maxlength="255" name="titre">
                                <label>Permalien</label>
                                <input class="form-control" required type="text" maxlength="255" name="slug">
                                <div class="imageLoaderMooc">
                                    <label>Bannière</label>
                                    <div class="previewersMooc" id="previewBannier">
                                        {!! import_svg('camera', 'moocCamera', [['onclick', 'this.parentElement.nextElementSibling.click()']]) !!}
                                    </div>
                                    <input type="file" onchange="previewersMooc(this)" accept="image/*" name="banniere">
                                </div>
                                <label>Pitch</label>
                                <input class="form-control" required type="text" maxlength="255" name="excerpt">
                                <label>Auteur</label>
                                <input class="form-control" required type="text" maxlength="255" name="auteur">
                                <label>Niveau</label>
                                <input class="form-control" required type="number" min="1" max="5" name="niveau">
                                <label>Durée (heures)</label>
                                <input class="form-control" required type="number" min="0" name="duree">
                                <label>Couleur</label>
                                <input class="form-control" required type="color" name="color">
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Catégorie</label>
                                <div id="langages_checkers" class="row2 wrap">
                                    @foreach ($cats as $cat)
                                    <span>
                                        <input onchange="requiredMoocCheckBox(this, 'langages_checkers')" required type="checkbox" value="{!! $cat['id'] !!}" name="categorie_id[]">
                                        <span class="moocCheckers" onclick="this.previousElementSibling.click()">{!! $cat['langage'] !!}<img src="https://mooc.quanticalsolutions.com/assets/img/langages/{!! $cat['logo'] . '?rand=' . rand(0, 99) !!}"></span>
                                    </span>
                                    @endforeach
                                </div>
                                <label>Contenu (x<nbchap>1</nbchap>)</label>
                                <generator>
                                    <cke>
                                        <label onclick="displayChapter(this, 'show')">&#10140; Chapitre 1</label>
                                        <div class="ckeditor-container">
                                            <textarea class="ckeditor" required id="mooc_contenu_0" name="contenu_0"></textarea>
                                            <div class="cke_bot"><span class="chapterCloser" onclick="displayChapter(this, 'hide')">Fermer le chapitre 1</span></div>
                                        </div>
                                    </cke>
                                </generator>
                                <addChapters class="btns-admin" onclick="add_chapters(this)">Ajouter un chapitre</addChapters>
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Enregistrer</button>
                            <button disabled class="moocDeleter btns-admin" type="button" onclick="deleteRecord(this)">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Apprenants<span class="titleCounters">{!! count($users) !!}</span></h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST" enctype="multipart/form-data">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="users">
                        <input type="hidden" name="action" value="record">
                        <div class="padd-around column full-content full">
                            <label class="outDivMooc">Ajouter / Modifier / Supprimer</label>
                            <select class="outDivMooc" onchange="getSelectedInfos(this)" name="modify_id">
                                <option value="0">Modifier un apprenant</option>
                                @foreach ($users as $user)
                                <option value="{!! $user['id'] !!}">{!! $user['first_name'] . ' ' . $user['last_name'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Cours</label>
                                <div id="courses_checkers" class="row2 wrap">
                                    @foreach ($courses as $course)
                                    <span>
                                        <input onchange="requiredMoocCheckBox(this, 'courses_checkers')" required type="checkbox" value="{!! $course['id'] !!}" name="id_course[]">
                                        <span class="moocCheckers" onclick="this.previousElementSibling.click()">{!! $course['titre'] !!}</span>
                                    </span>
                                    @endforeach
                                </div>
                                <label>Rôle</label>
                                <div class="displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input required type="radio" name="admin" value="1">
                                    <span onclick="this.previousElementSibling.click()">Administrateur</span>
                                </div>
                                <div class="radioClass displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input  type="radio" name="admin" value="0">
                                    <span onclick="this.previousElementSibling.click()">Standard</span>
                                </div>
                                <label>MDP</label>
                                <input class="form-control" id="mdpToChange" type="text" onkeyup="becrypt(this)">
                                <input class="form-control" style="font-weight: bold; font-style: italic;" required readonly data-original="" type="text" name="pass">
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <div class="imageLoaderMooc">
                                    <label>Avatar</label>
                                    <div class="previewersMooc" id="previewStudent">
                                        {!! import_svg('camera', 'moocCamera', [['onclick', 'this.parentElement.nextElementSibling.click()']]) !!}
                                    </div>
                                    <input type="file" onchange="previewersMooc(this)" accept="image/*" name="avatar">
                                </div>
                                <label>Prénom</label>
                                <input class="form-control" required type="text" name="first_name">
                                <label>Nom</label>
                                <input class="form-control" required type="text" name="last_name">
                                <label>Email</label>
                                <input class="form-control" required type="email" name="email">
                                <label>Cursus</label>
                                <ul id="cursusCont">
                                    @foreach ($classes as $classe)
                                    <li class="cursus">
                                        <input type="checkbox" value="{!! $classe->id !!}" name="classes_id[]">
                                        <span onclick="this.previousElementSibling.click();">{!! $classe->name !!} - {!! $classe->title !!} - {!! $classe->titre !!} ({!! $classe->start_year !!} - {!! $classe->end_year !!})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Enregistrer</button>
                            <button disabled class="moocDeleter btns-admin" type="button" onclick="deleteRecord(this)">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Catégories<span class="titleCounters">{!! count($cats) !!}</span></h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST" enctype="multipart/form-data">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="langages">
                        <input type="hidden" name="action" value="record">
                        <div class="padd-around column full-content full">
                            <label class="outDivMooc">Ajouter / Modifier / Supprimer</label>
                            <select class="outDivMooc" onchange="getSelectedInfos(this)" name="modify_id">
                                <option value="0">Modifier une catégorie</option>
                                @foreach ($cats as $cat)
                                <option value="{!! $cat['id'] !!}">{!! $cat['langage'] !!}</option>
                                @endforeach
                            </select>
                            <div>
                                <label>Nom</label>
                                <input class="form-control" required type="text" name="langage">
                            </div>
                            <div id="catsMoocCont" class="imageLoaderMooc">
                                <label>Logo</label>
                                <div class="previewersMooc" id="previewLangage">
                                    {!! import_svg('camera', 'moocCamera', [['onclick', 'this.parentElement.nextElementSibling.click()']]) !!}
                                </div>
                                <input type="file" onchange="previewersMooc(this)" accept="image/*" name="logo">
                            </div>
                            <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                                <button class="btns-admin" type="submit">Enregistrer</button>
                                <button disabled class="moocDeleter btns-admin" type="button" onclick="deleteRecord(this)">Supprimer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Ressources<span class="titleCounters">{!! count($sources) !!}</span></h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST" enctype="multipart/form-data">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="ressources">
                        <input type="hidden" name="action" value="record">
                        <div class="padd-around column full-content full">
                            <label class="outDivMooc">Ajouter / Modifier / Supprimer</label>
                            <select class="outDivMooc" onchange="getSelectedInfos(this)" name="modify_id">
                                <option value="0">Modifier une ressource</option>
                                @foreach ($sources as $source)
                                <option value="{!! $source['id'] !!}">{!! $source['title'] !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Type</label>
                                <div class="displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input required type="radio" name="type" value="0">
                                    <span onclick="this.previousElementSibling.click()">&Eacute;cole</span>
                                </div>
                                <div class="radioClass displayRadio xLarge-6 large-6 medium-12 small-12 xSmall-12">
                                    <input type="radio" name="type" value="1">
                                    <span onclick="this.previousElementSibling.click()">Ressource</span>
                                </div>
                                <label>Nom</label>
                                <input class="form-control" required type="text" name="title">
                                <label>URL</label>
                                <input class="form-control" required type="text" name="url">
                                <div class="imageLoaderMooc">
                                    <label>Logo</label>
                                    <div class="previewersMooc" id="previewLogo">
                                        {!! import_svg('camera', 'moocCamera', [['onclick', 'this.parentElement.nextElementSibling.click()']]) !!}
                                    </div>
                                    <input type="file" onchange="previewersMooc(this)" accept="image/*" name="logo">
                                </div>
                            </div>
                        </div>
                        <div class="xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around column full-content">
                                <label>Adresse</label>
                                <input class="form-control" type="text" name="address">
                                <label>Code postal</label>
                                <input class="form-control" type="number" name="zip">
                                <label>Ville</label>
                                <input class="form-control" type="text" name="city">
                                <label>Pays</label>
                                <input class="form-control" type="text" name="country">
                                <label>Téléphone</label>
                                <input class="form-control" type="tel" name="phone">
                                <label>Email</label>
                                <input class="form-control" type="email" name="email">
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Enregistrer</button>
                            <button disabled class="moocDeleter btns-admin" type="button" onclick="deleteRecord(this)">Supprimer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class="row2 wrap std-section-colors">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title counting-title">Les informations</h4>
                </div>
                <div class="card-body table-responsive">
                    <form class="row2 wrap" method="POST">
                        <div class="moocLoader">
                            <div></div>
                        </div>
                        <input type="hidden" name="moocController" value="infos">
                        <input type="hidden" name="action" value="{!! $infosMode !!}">
                        <div class="ckeNotGenerator xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around">
                                <label>Vie privée</label>
                                <div class="ckeditor-container">
                                    <textarea class="ckeditor" required id="mooc_private_life" name="private_life">{!! $infos['private_life'] !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="ckeNotGenerator xLarge-6 large-6 medium-12 small-12 xSmall-12">
                            <div class="padd-around">
                                <label>FAQs</label>
                                <div class="ckeditor-container">
                                    <textarea class="ckeditor" required id="mooc_faqs" name="faqs">{!! $infos['faqs'] !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="formMoocButton row2 xLarge-12 large-12 medium-12 small-12 xSmall-12 center">
                            <button class="btns-admin" type="submit">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div id="confMoocLoadedFile">
        {!! $fileLoaded !!}
    </div>
@endsection
