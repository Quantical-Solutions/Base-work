<div class="sidebar" data-color="purple" data-background-color="white" data-image="/media/img/material/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="/fr" class="simple-text logo-normal" target="_blank">
            {!! import_svg('logo-goldsilver-simple', 'logoSidebar') !!}
            <span>QUANTICAL SOLUTIONS</span>
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li>
                <label>TABLEAU DE BORD</label>
            </li>
            <li class="nav-item {{ (isMyRoute('')) ? 'active' : '' }}">
                <a href="{{ route('dashboard') }}" class="ajax nav-link {{ (isMyRoute('')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('stats', 'befores') !!}</i>
                    <p>Statistiques</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('pages')) ? 'active' : '' }}">
                <a href="{{ route('pages') }}" class="ajax nav-link {{ (isMyRoute('pages')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('stack', 'befores') !!}</i>
                    <p>Pages & Contenus</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('articles')) ? 'active' : '' }}">
                <a href="{{ route('articles') }}" class="ajax nav-link {{ (isMyRoute('articles')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('pen', 'befores') !!}</i>
                    <p>Articles</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('presse')) ? 'active' : '' }}">
                <a href="{{ route('presses') }}" class="ajax nav-link {{ (isMyRoute('presse')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('lamp', 'befores') !!}</i>
                    <p>Presse</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('categories')) ? 'active' : '' }}">
                <a href="{{ route('categories') }}" class="ajax nav-link {{ (isMyRoute('categories')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('cats', 'befores') !!}</i>
                    <p>Catégories</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('newsletters')) ? 'active' : '' }}">
                <a href="{{ route('newsletters') }}" class="ajax nav-link {{ (isMyRoute('newsletters')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('newsletter', 'befores2') !!}</i>
                    <p>Newsletters</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('bibliotheque')) ? 'active' : '' }}">
                <a href="{{ route('bibliotheque') }}" class="ajax nav-link {{ (isMyRoute('bibliotheque')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('bibli', 'befores') !!}</i>
                    <p>Bibliothèque</p>
                </a>
            </li>
            <li class="navLabel">
                <label>GESTION INTERNE</label>
            </li>
            <li class="nav-item {{ (isMyRoute('utilisateurs/gestion')) ? 'active' : '' }}">
                <a href="/utilisateurs/gestion" class="ajax nav-link {{ (isMyRoute('users')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('user-tie', 'befores') !!}</i>
                    <p>Utilisateurs</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('calendriers')) ? 'active' : '' }}">
                <a href="{{ route('calendriers') }}" class="ajax nav-link {{ (isMyRoute('calendriers')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('cals', 'befores') !!}</i>
                    <p>Emplois du temps</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('events')) ? 'active' : '' }}">
                <a href="/events" class="ajax nav-link {{ (isMyRoute('events')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('events', 'befores') !!}</i>
                    <p>&Eacute;vènements</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('drives')) ? 'active' : '' }}">
                <a href="{{ route('drives') }}" class="ajax nav-link {{ (isMyRoute('drives')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('drives', 'befores') !!}</i>
                    <p>QS Drives</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('visio')) ? 'active' : '' }}">
                <a href="{{ route('visio') }}" class="ajax nav-link {{ (isMyRoute('visio')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('rooms', 'befores') !!}</i>
                    <p>QS Caller</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('mooc')) ? 'active' : '' }}">
                <a id="emails" href="{{ route('mooc') }}" class="ajax nav-link {{ (isMyRoute('mooc')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('devis', 'befores') !!}</i>
                    <p>QS Mooc</p>
                </a>
            </li>
            <li class="navLabel">
                <label>ACTIVIT&Eacute; SOCI&Eacute;T&Eacute;</label>
            </li>
            <li class="nav-item {{ (isMyRoute('societes/clients')) ? 'active' : '' }}">
                <a href="/societes/clients" class="ajax nav-link {{ (isMyRoute('societes/clients')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('user', 'befores') !!}</i>
                    <p>Clients</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('societes/fournisseurs')) ? 'active' : '' }}">
                <a href="/societes/fournisseurs" class="ajax nav-link {{ (isMyRoute('societes/fournisseurs')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('store', 'befores') !!}</i>
                    <p>Fournisseurs</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('produits')) ? 'active' : '' }}">
                <a href="{{ route('produits') }}" class="ajax nav-link {{ (isMyRoute('produits')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('barcode', 'befores') !!}</i>
                    <p>Produits</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('formations')) ? 'active' : '' }}">
                <a href="{{ route('formations') }}" class="ajax nav-link {{ (isMyRoute('formations')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('wallet', 'befores') !!}</i>
                    <p>Formations</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('utilisateurs/apprenants')) ? 'active' : '' }}">
                <a href="/utilisateurs/apprenants" class="ajax nav-link {{ (isMyRoute('utilisateurs/apprenants')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('graduate', 'befores') !!}</i>
                    <p>Apprenants</p>
                </a>
            </li>
            <li class="navLabel">
                <label>QS GAMES</label>
            </li>
            <li class="nav-item {{ (isMyRoute('games/sallida')) ? 'active' : '' }}">
                <a href="/games/sallida" class="ajax nav-link {{ (isMyRoute('games/sallida')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('games', 'befores') !!}</i>
                    <p>Quest of Sallida</p>
                </a>
            </li>
            <li class="navLabel">
                <label>PARAMETRES</label>
            </li>
            <li class="nav-item {{ (isMyRoute('apis')) ? 'active' : '' }}">
                <a href="{{ route('apis') }}" class="ajax nav-link {{ (isMyRoute('apis')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('ftp_codes', 'befores') !!}</i>
                    <p>APIs</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('emails-models')) ? 'active' : '' }}">
                <a href="{{ route('emails-models') }}" class="ajax nav-link {{ (isMyRoute('emails-models')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('modeles', 'befores') !!}</i>
                    <p>Modèles Emails</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('ips')) ? 'active' : '' }}">
                <a href="{{ route('ips') }}" class="ajax nav-link {{ (isMyRoute('ips')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('stop', 'befores') !!}</i>
                    <p>IP bannies</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('informations')) ? 'active' : '' }}">
                <a href="{{ route('informations') }}" class="ajax nav-link {{ (isMyRoute('informations')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('library', 'befores') !!}</i>
                    <p>Informations</p>
                </a>
            </li>
            <li class="nav-item {{ (isMyRoute('backups')) ? 'active' : '' }}">
                <a href="{{ route('backups') }}" class="ajax nav-link {{ (isMyRoute('backups')) ? 'hoverSpan' : '' }}">
                    <i>{!! import_svg('cog', 'befores') !!}</i>
                    <p>Sauvegardes</p>
                </a>
            </li>
        </ul>
        <div id="overlay"></div>
    </div>
</div>