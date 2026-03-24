{{-- ================================================================
     TOPBAR + HEADER — TICAFRIQUE
     Palette: #122457 · #2a4d84 · #4370aa · #84a1c0 · #bfcfdd · #fdfdfd
================================================================ --}}
<style>
  @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap');
  @import url('https://api.fontshare.com/v2/css?f[]=clash-display@500,600,700&display=swap');

  :root {
    --navy:      #122457;   /* très profond — fond dark sections */
    --navy-md:   #2a4d84;   /* bleu foncé — dropdown bg, secondary dark */
    --navy-lt:   #1a3366;   /* intermédiaire — mobile nav bg */
    --orange:    #4370aa;   /* bleu principal — CTA, accents */
    --orange-lt: #84a1c0;   /* bleu clair — hover CTA */
    --white:     #fdfdfd;   /* fond global */
    --muted:     #84a1c0;   /* texte atténué */
    --pale:      #bfcfdd;   /* bleu très clair — bordures légères, bg subtil */
    --border:    rgba(191,207,221,0.18);
    --font-display: 'Clash Display', sans-serif;
    --font-body:    'DM Sans', sans-serif;
    --tr: .22s cubic-bezier(.4,0,.2,1);
    --header-h: 72px;
  }

  /* ── Reset ── */
  *, *::before, *::after { box-sizing: border-box; }
  a { text-decoration: none; }

  /* ================================================================
     TOPBAR
  ================================================================ */
  .tic-topbar {
    background: var(--navy-md);
    border-bottom: 1px solid var(--border);
    height: 38px;
    display: flex;
    align-items: center;
    font-family: var(--font-body);
    font-size: .78rem;
    color: var(--muted);
    position: relative;
    z-index: 1000;
  }
  .tic-topbar .container {
    max-width: 1180px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 16px;
  }
  .tic-topbar__left,
  .tic-topbar__right { display: flex; align-items: center; gap: 20px; }

  .tic-topbar__item {
    display: flex; align-items: center; gap: 6px;
    color: var(--muted); transition: color var(--tr);
  }
  .tic-topbar__item i { color: var(--orange); font-size: .72rem; }
  .tic-topbar__item a { color: inherit; }
  .tic-topbar__item:hover { color: rgba(255,255,255,.8); }

  .tic-topbar__right a {
    color: var(--muted); font-weight: 500; transition: color var(--tr);
    position: relative; padding-bottom: 1px;
  }
  .tic-topbar__right a::after {
    content: ''; position: absolute; bottom: 0; left: 0;
    width: 0; height: 1px; background: var(--orange);
    transition: width var(--tr);
  }
  .tic-topbar__right a:hover { color: var(--white); }
  .tic-topbar__right a:hover::after { width: 100%; }

  /* Separator between right links */
  .tic-topbar__right a + a { border-left: 1px solid var(--border); padding-left: 20px; }

  /* ================================================================
     HEADER
  ================================================================ */
  .tic-header {
    background: var(--navy);
    height: var(--header-h);
    position: sticky;
    top: 0;
    z-index: 999;
    border-bottom: 1px solid var(--border);
    transition: box-shadow var(--tr), background var(--tr);
  }
  /* Scrolled state — applied via JS */
  .tic-header.scrolled {
    background: rgba(18,36,87,.97);
    backdrop-filter: blur(14px);
    box-shadow: 0 4px 32px rgba(18,36,87,.35);
  }
  .tic-header .container {
    max-width: 1180px;
    margin: 0 auto;
    padding: 0 24px;
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    gap: 32px;
  }

  /* ── Logo ── */
  .tic-logo {
    flex-shrink: 0;
    display: flex;
    align-items: center;
  }
  .tic-logo img {
    height: 38px;
    width: auto;
    display: block;
    object-fit: contain;
  }

  /* ── Nav ── */
  .tic-nav {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: var(--font-body);
  }
  .tic-nav__list {
    list-style: none;
    margin: 0; padding: 0;
    display: flex;
    align-items: center;
    gap: 2px;
  }
  .tic-nav__item { position: relative; }

  .tic-nav__link {
    display: flex;
    align-items: center;
    gap: 5px;
    padding: 0 13px;
    height: var(--header-h);
    color: rgba(255,255,255,.7);
    font-size: .875rem;
    font-weight: 500;
    white-space: nowrap;
    transition: color var(--tr);
    border-bottom: 2px solid transparent;
    cursor: pointer;
    background: none; border-top: none; border-left: none; border-right: none;
    font-family: var(--font-body);
  }
  .tic-nav__link i { font-size: .72rem; opacity: .7; transition: transform var(--tr); }
  .tic-nav__link:hover,
  .tic-nav__item.active > .tic-nav__link { color: var(--white); border-bottom-color: var(--orange); }
  .tic-nav__item:hover > .tic-nav__link > i,
  .tic-nav__item:focus-within > .tic-nav__link > i { transform: rotate(180deg); }

  /* ── Dropdown ── */
  .tic-dropdown {
    position: absolute;
    top: calc(var(--header-h) + 1px);
    left: 50%;
    transform: translateX(-50%) translateY(8px);
    background: var(--navy-md);
    border: 1px solid var(--border);
    border-radius: 14px;
    min-width: 210px;
    padding: 8px;
    list-style: none;
    opacity: 0;
    visibility: hidden;
    pointer-events: none;
    transition: opacity var(--tr), transform var(--tr), visibility var(--tr);
    box-shadow: 0 20px 48px rgba(0,0,0,.5);
    z-index: 200;
  }
  .tic-nav__item:hover .tic-dropdown,
  .tic-nav__item:focus-within .tic-dropdown {
    opacity: 1;
    visibility: visible;
    pointer-events: all;
    transform: translateX(-50%) translateY(0);
  }
  .tic-dropdown li a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 10px 14px;
    border-radius: 9px;
    color: rgba(255,255,255,.65);
    font-size: .875rem;
    font-weight: 500;
    transition: background var(--tr), color var(--tr);
    white-space: nowrap;
  }
  .tic-dropdown li a::before {
    content: '';
    width: 5px; height: 5px;
    border-radius: 50%;
    background: var(--orange);
    opacity: 0;
    flex-shrink: 0;
    transition: opacity var(--tr);
  }
  .tic-dropdown li a:hover {
    background: rgba(67,112,170,.12);
    color: var(--white);
  }
  .tic-dropdown li a:hover::before { opacity: 1; }

  /* ── Header CTA ── */
  .tic-header__actions { display: flex; align-items: center; gap: 10px; flex-shrink: 0; }
  .tic-header__btn {
    display: inline-flex; align-items: center; gap: 6px;
    padding: 9px 20px; border-radius: 100px;
    font-size: .85rem; font-weight: 600; cursor: pointer;
    transition: var(--tr); border: none; font-family: var(--font-body);
    white-space: nowrap;
  }
  .tic-header__btn--ghost {
    background: transparent;
    border: 1.5px solid rgba(255,255,255,.2);
    color: rgba(255,255,255,.75);
  }
  .tic-header__btn--ghost:hover { border-color: var(--orange); color: var(--orange); }
  .tic-header__btn--primary { background: var(--orange); color: var(--white); }
  .tic-header__btn--primary:hover {
    background: var(--orange-lt);
    box-shadow: 0 8px 24px rgba(255,107,44,.35);
    transform: translateY(-1px);
    color: var(--white);
  }

  /* ── Burger ── */
  .tic-burger {
    display: none;
    background: none; border: none; cursor: pointer;
    padding: 6px; color: rgba(255,255,255,.75);
    transition: color var(--tr);
    margin-left: auto;
  }
  .tic-burger:hover { color: var(--white); }
  .tic-burger svg { display: block; }

  /* ── Mobile nav ── */
  .tic-mobile-nav {
    display: none;
    position: fixed;
    inset: 0;
    z-index: 998;
    background: var(--navy);
    padding: calc(var(--header-h) + 16px) 24px 32px;
    overflow-y: auto;
    transform: translateX(100%);
    transition: transform .35s cubic-bezier(.4,0,.2,1);
  }
  .tic-mobile-nav.open {
    display: block;
    transform: translateX(0);
  }
  .tic-mobile-nav__list { list-style: none; margin: 0; padding: 0; }
  .tic-mobile-nav__item { border-bottom: 1px solid var(--border); }
  .tic-mobile-nav__link {
    display: flex; justify-content: space-between; align-items: center;
    padding: 16px 0; color: rgba(255,255,255,.8); font-size: 1rem; font-weight: 500;
    font-family: var(--font-body); width: 100%; background: none; border: none; cursor: pointer;
    text-align: left; transition: color var(--tr);
  }
  .tic-mobile-nav__link:hover { color: var(--orange); }
  .tic-mobile-nav__sub {
    list-style: none; margin: 0; padding: 0 0 8px 16px; display: none;
  }
  .tic-mobile-nav__sub.open { display: block; }
  .tic-mobile-nav__sub li a {
    display: block; padding: 10px 0; color: var(--muted); font-size: .9rem;
    font-family: var(--font-body); transition: color var(--tr);
  }
  .tic-mobile-nav__sub li a:hover { color: var(--orange); }
  .tic-mobile-nav__footer {
    margin-top: 28px; display: flex; flex-direction: column; gap: 12px;
  }
  .tic-mobile-nav__footer .tic-header__btn { justify-content: center; width: 100%; padding: 13px; }

  /* ── Responsive breakpoint ── */
  @media (max-width: 1024px) {
    .tic-nav, .tic-header__actions { display: none; }
    .tic-burger { display: block; }
    .tic-topbar__right { display: none; }
  }
</style>

{{-- ================= TOPBAR ================= --}}
<div class="tic-topbar" role="banner">
  <div class="container">
    <div class="tic-topbar__left">
      <span class="tic-topbar__item">
        <i class="fa fa-envelope"></i> info@ticafrique.com
      </span>
      <span class="tic-topbar__item">
        <i class="fa fa-phone"></i> (+225) 25 22 00 20 77
      </span>
    </div>
    <div class="tic-topbar__right">
      <a href="#">FAQ</a>
      <a href="#">Support</a>
      <a href="#">Nos Références</a>
    </div>
  </div>
</div>

{{-- ================= HEADER ================= --}}
<header class="tic-header" id="ticHeader" role="navigation">
  <div class="container">

    {{-- Logo --}}
    <a href="{{ url('/') }}" class="tic-logo" aria-label="TICAFRIQUE — Accueil">
      <img src="{{ asset('assets/images/logoweb.jpg') }}" alt="TICAFRIQUE">
    </a>

    {{-- Desktop Nav --}}
    <nav class="tic-nav" aria-label="Navigation principale">
      <ul class="tic-nav__list" role="menubar">

        <li class="tic-nav__item" role="none">
          <a href="{{ url('/') }}" class="tic-nav__link" role="menuitem">Accueil</a>
        </li>

        <li class="tic-nav__item has-dropdown" role="none">
          <button class="tic-nav__link" role="menuitem" aria-haspopup="true" aria-expanded="false">
            Nom de domaine <i class="fa fa-angle-down"></i>
          </button>
          <ul class="tic-dropdown" role="menu">
            <li><a href="{{ route('domaine.researcher') }}" role="menuitem">Recherche de domaine</a></li>
            <li><a href="{{ route('domaine.transfer') }}" role="menuitem">Transfert</a></li>
            <li><a href="{{ route('domaine.renew') }}" role="menuitem">Renouvellement</a></li>
          </ul>
        </li>

        <li class="tic-nav__item has-dropdown" role="none">
          <button class="tic-nav__link" role="menuitem" aria-haspopup="true" aria-expanded="false">
            Hébergement <i class="fa fa-angle-down"></i>
          </button>
          <ul class="tic-dropdown" role="menu">
            <li><a href="{{ route('hebergement.mutualise') }}" role="menuitem">Hébergement Mutualisé</a></li>
            <li><a href="{{ route('hebergement.index_serveur_dedie') }}" role="menuitem">Serveurs Dédiés</a></li>
            <li><a href="#" role="menuitem">Reseller Hosting</a></li>
          </ul>
        </li>

        <!-- <li class="tic-nav__item has-dropdown" role="none">
          <button class="tic-nav__link" role="menuitem" aria-haspopup="true" aria-expanded="false">
            Serveurs <i class="fa fa-angle-down"></i>
          </button>
          <ul class="tic-dropdown" role="menu">
            <li><a href="#" role="menuitem">Serveur Dédié Linux</a></li>
            <li><a href="#" role="menuitem">Serveur Dédié Windows</a></li>
            <li><a href="#" role="menuitem">Serveur Dédié Infogéré</a></li>
            <li><a href="#" role="menuitem">VPS</a></li>
            <li><a href="#" role="menuitem">VPS Infogéré</a></li>
            <li><a href="#" role="menuitem">Cloud</a></li>
          </ul>
        </li> -->

        <li class="tic-nav__item has-dropdown" role="none">
          <button class="tic-nav__link" role="menuitem" aria-haspopup="true" aria-expanded="false">
            Messagerie <i class="fa fa-angle-down"></i>
          </button>
          <ul class="tic-dropdown" role="menu">
            <li><a href="#" role="menuitem">Enterprise Email</a></li>
            <li><a href="#" role="menuitem">Business Email</a></li>
            <li><a href="#" role="menuitem">Google Workspace</a></li>
            <li><a href="#" role="menuitem">Titan Email</a></li>
          </ul>
        </li>

        <li class="tic-nav__item has-dropdown" role="none">
          <button class="tic-nav__link" role="menuitem" aria-haspopup="true" aria-expanded="false">
            Sécurité <i class="fa fa-angle-down"></i>
          </button>
          <ul class="tic-dropdown" role="menu">
            <li><a href="#" role="menuitem">Sauvegarde</a></li>
            <li><a href="#" role="menuitem">Certificats SSL</a></li>
            <li><a href="#" role="menuitem">Protection &amp; Sécurité</a></li>
          </ul>
        </li>

        <li class="tic-nav__item" role="none">
          <a href="https://ticafrique.com" class="tic-nav__link" role="menuitem">Portail</a>
        </li>

      </ul>
    </nav>

    {{-- Desktop CTAs --}}
    <div class="tic-header__actions">
      <a href="#" class="tic-header__btn tic-header__btn--ghost">Connexion</a>
      <a href="{{ route('hebergement.commander') }}" class="tic-header__btn tic-header__btn--primary">
        Commander
      </a>
    </div>

    {{-- Burger --}}
    <button class="tic-burger" id="ticBurger" aria-label="Ouvrir le menu" aria-expanded="false" aria-controls="ticMobileNav">
      {{-- Icon swaps via JS --}}
      <svg id="iconOpen" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
      </svg>
      <svg id="iconClose" width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" style="display:none;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
      </svg>
    </button>

  </div>
</header>

{{-- ================= MOBILE NAV ================= --}}
<nav class="tic-mobile-nav" id="ticMobileNav" aria-label="Navigation mobile">
  <ul class="tic-mobile-nav__list">

    <li class="tic-mobile-nav__item">
      <a href="{{ url('/') }}" class="tic-mobile-nav__link">Accueil</a>
    </li>

    <li class="tic-mobile-nav__item">
      <button class="tic-mobile-nav__link" onclick="toggleMobileSub(this)">
        Nom de domaine
        <i class="fa fa-angle-down"></i>
      </button>
      <ul class="tic-mobile-nav__sub">
        <li><a href="{{ route('domaine.researcher') }}">Recherche de domaine</a></li>
        <li><a href="{{ route('domaine.transfer') }}">Transfert</a></li>
        <li><a href="{{ route('domaine.renew') }}">Renouvellement</a></li>
      </ul>
    </li>

    <li class="tic-mobile-nav__item">
      <button class="tic-mobile-nav__link" onclick="toggleMobileSub(this)">
        Hébergement <i class="fa fa-angle-down"></i>
      </button>
      <ul class="tic-mobile-nav__sub">
        <li><a href="{{ route('hebergement.mutualise') }}">Hébergement Mutualisé</a></li>
        <li><a href="{{ route('hebergement.index_serveur_dedie') }}">Serveurs Dédiés</a></li>
        <li><a href="#">Reseller Hosting</a></li>
      </ul>
    </li>

    <li class="tic-mobile-nav__item">
      <button class="tic-mobile-nav__link" onclick="toggleMobileSub(this)">
        Serveurs <i class="fa fa-angle-down"></i>
      </button>
      <ul class="tic-mobile-nav__sub">
        <li><a href="#">Serveur Dédié Linux</a></li>
        <li><a href="#">Serveur Dédié Windows</a></li>
        <li><a href="#">VPS</a></li>
        <li><a href="#">Cloud</a></li>
      </ul>
    </li>

    <li class="tic-mobile-nav__item">
      <button class="tic-mobile-nav__link" onclick="toggleMobileSub(this)">
        Messagerie <i class="fa fa-angle-down"></i>
      </button>
      <ul class="tic-mobile-nav__sub">
        <li><a href="#">Enterprise Email</a></li>
        <li><a href="#">Business Email</a></li>
        <li><a href="#">Google Workspace</a></li>
        <li><a href="#">Titan Email</a></li>
      </ul>
    </li>

    <li class="tic-mobile-nav__item">
      <button class="tic-mobile-nav__link" onclick="toggleMobileSub(this)">
        Sécurité <i class="fa fa-angle-down"></i>
      </button>
      <ul class="tic-mobile-nav__sub">
        <li><a href="#">Sauvegarde</a></li>
        <li><a href="#">Certificats SSL</a></li>
        <li><a href="#">Protection &amp; Sécurité</a></li>
      </ul>
    </li>

    <li class="tic-mobile-nav__item">
      <a href="#" class="tic-mobile-nav__link">Contact</a>
    </li>

  </ul>

  <div class="tic-mobile-nav__footer">
    <a href="#" class="tic-header__btn tic-header__btn--ghost">Connexion</a>
    <a href="{{ route('hebergement.commander') }}" class="tic-header__btn tic-header__btn--primary">Commander maintenant</a>
  </div>
</nav>

<script>
  /* ── Sticky scroll shadow ── */
  const header = document.getElementById('ticHeader');
  window.addEventListener('scroll', () => {
    header.classList.toggle('scrolled', window.scrollY > 10);
  }, { passive: true });

  /* ── Mobile burger ── */
  const burger  = document.getElementById('ticBurger');
  const mobileNav = document.getElementById('ticMobileNav');
  const iconOpen  = document.getElementById('iconOpen');
  const iconClose = document.getElementById('iconClose');
  let navOpen = false;

  burger.addEventListener('click', () => {
    navOpen = !navOpen;
    burger.setAttribute('aria-expanded', navOpen);
    iconOpen.style.display  = navOpen ? 'none'  : 'block';
    iconClose.style.display = navOpen ? 'block' : 'none';
    if (navOpen) {
      mobileNav.classList.add('open');
      document.body.style.overflow = 'hidden'; // prevent background scroll
    } else {
      mobileNav.classList.remove('open');
      document.body.style.overflow = '';
    }
  });

  /* ── Close mobile nav on outside click ── */
  document.addEventListener('click', e => {
    if (navOpen && !mobileNav.contains(e.target) && !burger.contains(e.target)) {
      navOpen = false;
      burger.setAttribute('aria-expanded', 'false');
      iconOpen.style.display = 'block'; iconClose.style.display = 'none';
      mobileNav.classList.remove('open');
      document.body.style.overflow = '';
    }
  });

  /* ── Mobile sub-menu accordion ── */
  function toggleMobileSub(btn) {
    const sub = btn.nextElementSibling;
    const isOpen = sub.classList.contains('open');
    // Close all
    document.querySelectorAll('.tic-mobile-nav__sub').forEach(s => s.classList.remove('open'));
    if (!isOpen) sub.classList.add('open');
  }
</script>