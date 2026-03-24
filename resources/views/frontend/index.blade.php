@extends('frontend.layouts.base')

@section('title', 'Hébergement Web — TICAFRIQUE')

@section('content')

{{-- ============================================================
     INLINE STYLES — scoped to this page only
     Font: Clash Display (display) + DM Sans (body)
     Palette: #122457 · #2a4d84 · #4370aa · #84a1c0 · #bfcfdd · #fdfdfd
============================================================ --}}
<style>
  @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&display=swap');
  @import url('https://api.fontshare.com/v2/css?f[]=clash-display@400,500,600,700&display=swap');

  :root {
    --navy:      #122457;   /* très profond — fond dark sections */
    --navy-md:   #2a4d84;   /* bleu foncé — cards sombres */
    --navy-lt:   #1a3366;   /* intermédiaire */
    --orange:    #4370aa;   /* bleu principal — CTA, accents (remplace orange) */
    --orange-lt: #84a1c0;   /* bleu clair — hover states */
    --white:     #fdfdfd;   /* fond global */
    --grey:      #eef2f7;   /* fond sections légères (dérivé #bfcfdd@15%) */
    --muted:     #84a1c0;   /* texte atténué */
    --pale:      #bfcfdd;   /* bleu très clair — bordures, bg subtils */
    --border:    rgba(191,207,221,0.25);
    --border-dk: rgba(255,255,255,0.1);  /* bordures sur fonds sombres */
    --radius:  14px;
    --shadow:  0 24px 60px rgba(18,36,87,.18);
    --font-display: 'Clash Display', sans-serif;
    --font-body:    'DM Sans', sans-serif;
    --transition:   .3s cubic-bezier(.4,0,.2,1);
  }

  /* ── Reset/Base ── */
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: var(--font-body); color: var(--navy); background: var(--white); }
  a { text-decoration: none; }

  /* ── Utility ── */
  .tic-section        { padding: 90px 0; }
  .tic-section--dark  { background: var(--navy); color: var(--white); }
  .tic-section--grey  { background: var(--grey); }
  .tic-container      { max-width: 1180px; margin: 0 auto; padding: 0 24px; }
  .tic-tag            { display: inline-block; background: rgba(67,112,170,.12); color: var(--orange);
                        font-size: .75rem; font-weight: 600; letter-spacing: .1em;
                        text-transform: uppercase; padding: 5px 12px; border-radius: 100px;
                        margin-bottom: 14px; }
  .tic-tag--light     { background: rgba(255,255,255,.12); color: rgba(255,255,255,.75); }
  .tic-heading        { font-family: var(--font-display); font-size: clamp(2rem, 4vw, 3rem);
                        font-weight: 700; line-height: 1.15; }
  .tic-heading em     { color: var(--orange); font-style: normal; }
  .tic-subtext        { color: var(--muted); font-size: 1.05rem; line-height: 1.7; margin-top: 14px; }
  .tic-subtext--light { color: rgba(255,255,255,.55); }
  .tic-btn            { display: inline-flex; align-items: center; gap: 8px;
                        padding: 13px 28px; border-radius: 100px; font-weight: 600;
                        font-size: .95rem; cursor: pointer; transition: var(--transition); border: none; }
  .tic-btn--primary   { background: var(--orange); color: var(--white); }
  .tic-btn--primary:hover { background: var(--navy-md); transform: translateY(-2px);
                            box-shadow: 0 12px 32px rgba(67,112,170,.35); color: var(--white); }
  .tic-btn--ghost     { background: transparent; border: 1.5px solid rgba(255,255,255,.25); color: var(--white); }
  .tic-btn--ghost:hover { border-color: var(--pale); color: var(--pale); }
  .tic-btn--dark      { background: var(--navy); color: var(--white); }
  .tic-btn--dark:hover { background: var(--navy-md); transform: translateY(-2px); color: var(--white); }

  /* ────────────────────────────────────────────────
     HERO
  ──────────────────────────────────────────────── */
  .hero {
    position: relative; background: var(--navy); overflow: hidden;
    padding: 100px 0 80px; min-height: 88vh;
    display: flex; align-items: center;
  }
  /* Decorative mesh blobs */
  .hero::before {
    content: ''; position: absolute; width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(67,112,170,.22) 0%, transparent 70%);
    top: -150px; right: -150px; border-radius: 50%; pointer-events: none;
  }
  .hero::after {
    content: ''; position: absolute; width: 500px; height: 500px;
    background: radial-gradient(circle, rgba(191,207,221,.1) 0%, transparent 70%);
    bottom: -100px; left: -80px; border-radius: 50%; pointer-events: none;
  }
  .hero__grid {
    display: grid; grid-template-columns: 1fr 1fr; gap: 60px;
    align-items: center; position: relative; z-index: 2;
  }
  .hero__eyebrow { display: flex; align-items: center; gap: 10px; margin-bottom: 20px; }
  .hero__live-dot {
    width: 8px; height: 8px; background: #22c55e; border-radius: 50%;
    box-shadow: 0 0 0 3px rgba(34,197,94,.2);
    animation: pulse-dot 2s ease infinite;
  }
  @keyframes pulse-dot {
    0%,100% { box-shadow: 0 0 0 3px rgba(34,197,94,.2); }
    50%      { box-shadow: 0 0 0 7px rgba(34,197,94,.1); }
  }
  .hero__eyebrow span { color: rgba(255,255,255,.55); font-size: .82rem; letter-spacing: .06em; text-transform: uppercase; }
  .hero__heading { font-family: var(--font-display); font-size: clamp(2.4rem, 4.5vw, 3.8rem);
                   font-weight: 700; color: var(--white); line-height: 1.12; }
  .hero__heading em { color: var(--pale); font-style: normal;
                      background: linear-gradient(135deg, var(--pale), var(--orange-lt));
                      -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
  .hero__desc { color: rgba(255,255,255,.55); font-size: 1.05rem; line-height: 1.75;
                margin: 20px 0 34px; max-width: 500px; }
  .hero__actions { display: flex; gap: 14px; flex-wrap: wrap; }
  .hero__trust   { display: flex; align-items: center; gap: 16px; margin-top: 40px; }
  .hero__avatars { display: flex; }
  .hero__avatars img { width: 36px; height: 36px; border-radius: 50%; border: 2px solid var(--navy);
                       margin-left: -10px; object-fit: cover; }
  .hero__avatars img:first-child { margin-left: 0; }
  .hero__trust-text { font-size: .85rem; color: rgba(255,255,255,.45); line-height: 1.4; }
  .hero__trust-text strong { display: block; color: rgba(255,255,255,.85); font-weight: 600; }

  /* Pricing card in hero */
  .hero__card-wrap { position: relative; }
  .hero__card {
    background: var(--navy-md); border: 1px solid var(--border-dk); border-radius: 24px;
    padding: 32px; position: relative; overflow: hidden;
  }
  .hero__card::before {
    content: ''; position: absolute; inset: 0;
    background: linear-gradient(135deg, rgba(67,112,170,.08) 0%, transparent 60%);
    pointer-events: none;
  }
  .hero__card-badge {
    position: absolute; top: 20px; right: 20px;
    background: var(--orange); color: white; font-size: .72rem; font-weight: 700;
    padding: 4px 10px; border-radius: 100px; letter-spacing: .06em; text-transform: uppercase;
  }
  .hero__card-label { color: var(--muted); font-size: .82rem; text-transform: uppercase;
                      letter-spacing: .08em; margin-bottom: 8px; }
  .hero__card-price { font-family: var(--font-display); font-size: 2.8rem; font-weight: 700;
                      color: var(--white); line-height: 1; }
  .hero__card-price sup { font-size: 1.2rem; vertical-align: top; padding-top: 8px; }
  .hero__card-price sub { font-size: .9rem; color: var(--muted); font-weight: 400; }
  .hero__card-feats { margin: 24px 0; display: flex; flex-direction: column; gap: 10px; }
  .hero__card-feat  { display: flex; align-items: center; gap: 10px; color: rgba(255,255,255,.7); font-size: .9rem; }
  .hero__card-feat svg { color: var(--pale); flex-shrink: 0; }
  .hero__card-slider { display: flex; gap: 8px; margin-bottom: 24px; }
  .hero__card-tab   { flex: 1; padding: 8px 6px; border-radius: 8px; text-align: center;
                      font-size: .78rem; font-weight: 600; cursor: pointer; transition: var(--transition);
                      background: var(--navy-lt); color: var(--muted); border: none; }
  .hero__card-tab.active { background: var(--orange); color: white; }

  /* ── Domain Search ── */
  .domain-search { background: var(--white); padding: 60px 0; }
  .domain-search__inner {
    background: var(--navy); border-radius: 24px; padding: 50px 48px;
    display: grid; grid-template-columns: 1fr 1fr; gap: 50px; align-items: center;
    position: relative; overflow: hidden;
  }
  .domain-search__inner::after {
    content: ''; position: absolute; right: -60px; top: -60px;
    width: 300px; height: 300px; border-radius: 50%;
    background: radial-gradient(circle, rgba(67,112,170,.2) 0%, transparent 70%);
    pointer-events: none;
  }
  .domain-search__form { display: flex; gap: 10px; margin-top: 24px; }
  .domain-search__input {
    flex: 1; padding: 14px 20px; border-radius: 100px;
    background: rgba(255,255,255,.07); border: 1.5px solid rgba(191,207,221,.2);
    color: white; font-size: .95rem; font-family: var(--font-body);
    outline: none; transition: var(--transition);
  }
  .domain-search__input::placeholder { color: rgba(255,255,255,.3); }
  .domain-search__input:focus { border-color: var(--pale); background: rgba(255,255,255,.1); }
  .domain-search__exts { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 16px; }
  .ext-chip {
    padding: 5px 14px; border-radius: 100px; font-size: .8rem; font-weight: 600;
    background: rgba(255,255,255,.06); color: rgba(255,255,255,.6);
    border: 1px solid rgba(191,207,221,.15); cursor: pointer; transition: var(--transition);
    user-select: none;
  }
  .ext-chip.active, .ext-chip:hover { background: var(--orange); color: white; border-color: var(--orange); }
  .domain-search__prices { position: relative; z-index: 1; }
  .domain-price-card {
    background: rgba(255,255,255,.05); border: 1px solid var(--border-dk); border-radius: 16px;
    padding: 18px 22px; display: flex; justify-content: space-between; align-items: center;
    margin-bottom: 10px; transition: var(--transition);
  }
  .domain-price-card:hover { background: rgba(67,112,170,.12); border-color: rgba(191,207,221,.3); }
  .domain-price-card__ext { font-family: var(--font-display); font-size: 1.1rem;
                             font-weight: 700; color: white; }
  .domain-price-card__price { color: var(--pale); font-weight: 700; font-size: 1rem; }
  .domain-price-card__yr    { color: var(--muted); font-size: .78rem; margin-left: 4px; }

  /* ── Features Strip ── */
  .features-strip { padding: 30px 0; background: var(--grey); border-top: 1px solid var(--pale); border-bottom: 1px solid var(--pale); }
  .features-strip__list { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 24px; }
  .features-strip__item { display: flex; align-items: center; gap: 10px; font-size: .88rem;
                           font-weight: 500; color: var(--navy); }
  .features-strip__item svg { color: var(--orange); flex-shrink: 0; }

  /* ── Pricing Section ── */
  .pricing { background: var(--white); }
  .pricing__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 52px; }
  .pricing__card {
    border: 1.5px solid var(--pale); border-radius: 20px; overflow: hidden;
    transition: var(--transition); position: relative;
  }
  .pricing__card:hover { transform: translateY(-6px); box-shadow: var(--shadow); border-color: var(--orange); }
  .pricing__card--featured {
    border-color: var(--orange); transform: translateY(-10px);
    box-shadow: 0 24px 64px rgba(67,112,170,.22);
  }
  .pricing__card-head { padding: 32px 28px 24px; }
  .pricing__card--featured .pricing__card-head { background: var(--navy); color: white; }
  .pricing__popular { display: inline-block; background: var(--orange); color: white;
                      font-size: .72rem; font-weight: 700; padding: 4px 10px;
                      border-radius: 100px; margin-bottom: 12px; text-transform: uppercase; letter-spacing: .06em; }
  .pricing__plan-name { font-family: var(--font-display); font-size: 1.3rem; font-weight: 700; }
  .pricing__card--featured .pricing__plan-name { color: white; }
  .pricing__price { font-family: var(--font-display); font-size: 2.5rem; font-weight: 700;
                    color: var(--navy); margin: 12px 0 4px; line-height: 1; }
  .pricing__card--featured .pricing__price { color: white; }
  .pricing__price sup { font-size: 1rem; vertical-align: top; padding-top: 8px; }
  .pricing__price-yr   { font-size: .82rem; color: var(--muted); font-weight: 400; }
  .pricing__card--featured .pricing__price-yr { color: rgba(255,255,255,.45); }
  .pricing__card-body  { padding: 24px 28px 30px; }
  .pricing__feats { list-style: none; display: flex; flex-direction: column; gap: 12px; margin-bottom: 28px; }
  .pricing__feats li { display: flex; align-items: center; gap: 10px; font-size: .9rem; color: #2a3d5c; }
  .pricing__feats li svg { color: var(--orange); flex-shrink: 0; }
  .pricing__feats li.disabled { color: var(--muted); text-decoration: line-through; }
  .pricing__feats li.disabled svg { color: var(--pale); }
  .pricing__card-btn { display: block; text-align: center; padding: 13px; border-radius: 100px;
                       font-weight: 600; font-size: .95rem; transition: var(--transition); }
  .pricing__card--featured .pricing__card-btn { background: var(--orange); color: white; }
  .pricing__card--featured .pricing__card-btn:hover { background: var(--navy-md); transform: translateY(-2px); }
  .pricing__card-btn--outline { border: 1.5px solid var(--pale); color: var(--navy); }
  .pricing__card-btn--outline:hover { border-color: var(--orange); color: var(--orange); background: rgba(67,112,170,.05); }

  /* ── Stats ── */
  .stats { background: var(--navy); padding: 70px 0; }
  .stats__grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 1px;
                 background: var(--border-dk); border-radius: 20px; overflow: hidden;
                 border: 1px solid var(--border-dk); }
  .stats__item { background: var(--navy-md); padding: 36px 28px; text-align: center; }
  .stats__num  { font-family: var(--font-display); font-size: 2.8rem; font-weight: 700;
                 color: var(--white); line-height: 1; }
  .stats__num span { color: var(--pale); }
  .stats__label { color: var(--muted); font-size: .88rem; margin-top: 8px; }

  /* ── Why Us (features) ── */
  .why__grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 28px; margin-top: 52px; }
  .why__card { padding: 32px; border-radius: 20px; border: 1.5px solid var(--pale);
               transition: var(--transition); }
  .why__card:hover { background: var(--grey); border-color: var(--orange); transform: translateY(-4px); }
  .why__icon { width: 52px; height: 52px; background: rgba(67,112,170,.1);
               border-radius: 14px; display: flex; align-items: center; justify-content: center;
               margin-bottom: 20px; }
  .why__icon svg { color: var(--orange); }
  .why__title { font-family: var(--font-display); font-size: 1.1rem; font-weight: 700; margin-bottom: 10px; }
  .why__desc  { color: var(--muted); font-size: .9rem; line-height: 1.65; }

  /* ── CMS Section ── */
  .cms { background: var(--navy); }
  .cms__grid { display: flex; flex-wrap: wrap; gap: 16px; margin-top: 36px; }
  .cms__logo {
    background: rgba(255,255,255,.06); border: 1px solid var(--border-dk);
    border-radius: 14px; padding: 18px 24px; display: flex; align-items: center;
    gap: 10px; color: rgba(255,255,255,.65); font-weight: 600; font-size: .9rem;
    transition: var(--transition); cursor: default;
  }
  .cms__logo:hover { background: rgba(67,112,170,.15); border-color: rgba(191,207,221,.3); color: white; }
  .cms__logo svg { opacity: .8; }

  /* ── FAQ ── */
  .faq__list { margin-top: 40px; display: flex; flex-direction: column; gap: 12px; }
  .faq__item { border: 1.5px solid var(--pale); border-radius: 16px; overflow: hidden; }
  .faq__question {
    width: 100%; background: none; border: none; text-align: left;
    padding: 20px 24px; font-family: var(--font-body); font-size: .95rem; font-weight: 600;
    color: var(--navy); cursor: pointer; display: flex; justify-content: space-between;
    align-items: center; gap: 16px; transition: var(--transition);
  }
  .faq__question:hover { color: var(--orange); }
  .faq__question svg { flex-shrink: 0; transition: transform .3s ease; }
  .faq__question[aria-expanded="true"] svg { transform: rotate(180deg); }
  .faq__answer { max-height: 0; overflow: hidden; transition: max-height .35s ease; }
  .faq__answer.open { max-height: 200px; }
  .faq__answer-inner { padding: 0 24px 20px; color: var(--muted); font-size: .9rem; line-height: 1.7; }

  /* ── CTA Banner ── */
  .cta-banner {
    background: linear-gradient(135deg, var(--navy) 0%, var(--navy-md) 100%);
    border-radius: 24px; padding: 60px 52px; display: flex;
    justify-content: space-between; align-items: center; gap: 30px;
    position: relative; overflow: hidden;
  }
  .cta-banner::before {
    content: ''; position: absolute; right: -40px; top: -40px;
    width: 250px; height: 250px; border-radius: 50%;
    background: rgba(191,207,221,.08); pointer-events: none;
  }
  .cta-banner__title { font-family: var(--font-display); font-size: 2rem;
                       font-weight: 700; color: white; }
  .cta-banner__sub   { color: rgba(255,255,255,.6); font-size: 1rem; margin-top: 8px; }
  .cta-banner__btn   { background: var(--orange); color: white; border-radius: 100px;
                       padding: 14px 32px; font-weight: 700; font-size: .95rem;
                       white-space: nowrap; transition: var(--transition); display: inline-block; }
  .cta-banner__btn:hover { background: var(--pale); color: var(--navy); transform: translateY(-3px);
                           box-shadow: 0 16px 40px rgba(191,207,221,.25); }

  /* ── Responsive ── */
  @media (max-width: 900px) {
    .hero__grid { grid-template-columns: 1fr; }
    .hero__card-wrap { display: none; }
    .pricing__grid { grid-template-columns: 1fr; }
    .pricing__card--featured { transform: none; }
    .stats__grid { grid-template-columns: repeat(2, 1fr); }
    .why__grid { grid-template-columns: 1fr 1fr; }
    .domain-search__inner { grid-template-columns: 1fr; padding: 36px 28px; }
    .cta-banner { flex-direction: column; text-align: center; padding: 40px 28px; }
    .features-strip__list { justify-content: flex-start; }
  }
  @media (max-width: 600px) {
    .why__grid { grid-template-columns: 1fr; }
    .stats__grid { grid-template-columns: 1fr 1fr; }
    .tic-section { padding: 60px 0; }
  }
</style>

{{-- ================================================================
     HERO
================================================================ --}}
<section class="hero">
  <div class="tic-container">
    <div class="hero__grid">

      {{-- Left: Copy --}}
      <div class="hero__content">
        <div class="hero__eyebrow">
          <div class="hero__live-dot"></div>
          <span>Disponibilité garantie 99,99%</span>
        </div>

        <h1 class="hero__heading">
          Hébergez votre site<br>avec <em>la puissance</em><br>et la sécurité
        </h1>

        <p class="hero__desc">
          Des solutions d'hébergement web professionnelles, conçues pour les entreprises africaines. Performance, fiabilité et support 24h/7j inclus.
        </p>

        <div class="hero__actions">
          <a href="#pricing" class="tic-btn tic-btn--primary">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            Démarrer maintenant
          </a>
          <a href="#domain" class="tic-btn tic-btn--ghost">
            Chercher un domaine
          </a>
        </div>

        <div class="hero__trust">
          {{-- Placeholder avatars with initials --}}
          <div class="hero__avatars" aria-hidden="true">
            <img src="https://ui-avatars.com/api/?name=K+D&background=4370aa&color=fff&size=36" alt="">
            <img src="https://ui-avatars.com/api/?name=A+M&background=2a4d84&color=fff&size=36" alt="">
            <img src="https://ui-avatars.com/api/?name=S+B&background=122457&color=fff&size=36" alt="">
          </div>
          <div class="hero__trust-text">
            <strong>+ 860 clients satisfaits</strong>
            Rejoignez notre communauté
          </div>
        </div>
      </div>

      {{-- Right: Pricing preview card --}}
      <div class="hero__card-wrap">
        <div class="hero__card">
          <span class="hero__card-badge">Populaire</span>

          {{-- Plan toggle --}}
          <div class="hero__card-slider" role="tablist">
            <button class="hero__card-tab active" onclick="switchHeroPlan(this,'presence')">Présence</button>
            <button class="hero__card-tab" onclick="switchHeroPlan(this,'confort')">Confort</button>
            <button class="hero__card-tab" onclick="switchHeroPlan(this,'prestige')">Prestige</button>
          </div>

          <div class="hero__card-label">Hébergement Linux / an</div>
          <div class="hero__card-price" id="hero-price">
            <sup>FCFA </sup>54 000<sub>/an</sub>
          </div>

          <div class="hero__card-feats" id="hero-feats">
            <div class="hero__card-feat">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              100 Go d'espace disque
            </div>
            <div class="hero__card-feat">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              100 comptes email POP
            </div>
            <div class="hero__card-feat">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              Bande passante 1 000 Go
            </div>
            <div class="hero__card-feat">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              cPanel + 3 bases de données
            </div>
            <div class="hero__card-feat">
              <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
              Remboursé sous 30 jours
            </div>
          </div>
           

            <a href="{{ route('hebergement.commander') }}" class="tic-btn tic-btn--primary" style="width:100%;justify-content:center;" id="hero-cta">
            Commander ce pack
          </a>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ================================================================
     FEATURES STRIP
================================================================ --}}
<div class="features-strip">
  <div class="tic-container">
    <div class="features-strip__list">
      <div class="features-strip__item">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        SSL Gratuit inclus
      </div>
      <div class="features-strip__item">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        Sauvegardes quotidiennes
      </div>
      <div class="features-strip__item">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        Support 24h/7j
      </div>
      <div class="features-strip__item">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        Installation CMS en 1 clic
      </div>
      <div class="features-strip__item">
        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/></svg>
        Satisfait ou remboursé 30j
      </div>
    </div>
  </div>
</div>

{{-- ================================================================
     DOMAIN SEARCH
================================================================ --}}
<section class="domain-search" id="domain">
  <div class="tic-container">
    <div class="domain-search__inner">

      {{-- Left: form --}}
      <div style="position:relative;z-index:1;">
        <span class="tic-tag tic-tag--light">Noms de domaine</span>
        <h2 class="tic-heading" style="color:white;">Trouvez le domaine<br>parfait pour votre projet</h2>
        <p class="tic-subtext tic-subtext--light">Recherchez parmi des centaines d'extensions. À partir de <strong style="color:var(--orange)">8 000 FCFA/an</strong>.</p>

        <div class="domain-search__form">
          <input class="domain-search__input" type="text" placeholder="monentreprise" id="domain-input" autocomplete="off">
          <button class="tic-btn tic-btn--primary" onclick="searchDomain()">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            Chercher
          </button>
        </div>

        <div class="domain-search__exts" id="ext-chips">
          <span class="ext-chip active" data-ext=".ci">.ci</span>
          <span class="ext-chip active" data-ext=".com">.com</span>
          <span class="ext-chip" data-ext=".net">.net</span>
          <span class="ext-chip" data-ext=".org">.org</span>
          <span class="ext-chip" data-ext=".info">.info</span>
          <span class="ext-chip" data-ext=".biz">.biz</span>
          <span class="ext-chip" data-ext=".co">.co</span>
        </div>
      </div>

      {{-- Right: price list --}}
      <div class="domain-search__prices">
        <div class="domain-price-card">
          <span class="domain-price-card__ext">.ci</span>
          <span><span class="domain-price-card__price">8 000 FCFA</span><span class="domain-price-card__yr">/an</span></span>
        </div>
        <div class="domain-price-card">
          <span class="domain-price-card__ext">.com</span>
          <span><span class="domain-price-card__price">11 800 FCFA</span><span class="domain-price-card__yr">/an</span></span>
        </div>
        <div class="domain-price-card">
          <span class="domain-price-card__ext">.net</span>
          <span><span class="domain-price-card__price">14 500 FCFA</span><span class="domain-price-card__yr">/an</span></span>
        </div>
        <div class="domain-price-card">
          <span class="domain-price-card__ext">.org</span>
          <span><span class="domain-price-card__price">13 000 FCFA</span><span class="domain-price-card__yr">/an</span></span>
        </div>
        <div class="domain-price-card">
          <span class="domain-price-card__ext">.biz</span>
          <span><span class="domain-price-card__price">15 000 FCFA</span><span class="domain-price-card__yr">/an</span></span>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ================================================================
     STATS
================================================================ --}}
<section class="stats">
  <div class="tic-container">
    <div class="stats__grid">
      <div class="stats__item">
        <div class="stats__num">551<span>+</span></div>
        <div class="stats__label">Sites hébergés</div>
      </div>
      <div class="stats__item">
        <div class="stats__num">860<span>+</span></div>
        <div class="stats__label">Clients satisfaits</div>
      </div>
      <div class="stats__item">
        <div class="stats__num">99<span>.99%</span></div>
        <div class="stats__label">Disponibilité garantie</div>
      </div>
      <div class="stats__item">
        <div class="stats__num">128<span>+</span></div>
        <div class="stats__label">Domaines enregistrés</div>
      </div>
    </div>
  </div>
</section>

{{-- ================================================================
     PRICING
================================================================ --}}
<section class="tic-section pricing" id="pricing">
  <div class="tic-container">
    <div style="text-align:center;">
      <span class="tic-tag">Tarifs</span>
      <h2 class="tic-heading">Packs d'hébergement<br><em>Linux</em> adaptés à chaque besoin</h2>
      <p class="tic-subtext" style="max-width:560px;margin:0 auto;">
        Choisissez le plan qui correspond à vos objectifs. Tous les plans incluent cPanel, SSL et sauvegardes quotidiennes.
      </p>
    </div>

    <div class="pricing__grid">

      {{-- Plan 1: Présence --}}
      <div class="pricing__card">
        <div class="pricing__card-head">
          <div class="pricing__plan-name">Présence</div>
          <div class="pricing__price"><sup>FCFA </sup>54 000</div>
          <div class="pricing__price-yr">par an TTC</div>
        </div>
        <div class="pricing__card-body">
          <ul class="pricing__feats">
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 100 Go espace disque</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 1 domaine hébergeable</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 1 000 Go bande passante</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 100 comptes email POP</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 3 bases de données</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Support technique inclus</li>
            <li class="disabled"><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg> Multi-domaines</li>
          </ul>
          <a href="{{ route('hebergement.commander') }}" class="pricing__card-btn pricing__card-btn--outline">Commander →</a>
        </div>
      </div>

      {{-- Plan 2: Confort (featured) --}}
      <div class="pricing__card pricing__card--featured">
        <div class="pricing__card-head">
          <span class="pricing__popular">Recommandé</span>
          <div class="pricing__plan-name">Confort MDH Business</div>
          <div class="pricing__price"><sup>FCFA </sup>90 000</div>
          <div class="pricing__price-yr">par an TTC</div>
        </div>
        <div class="pricing__card-body">
          <ul class="pricing__feats">
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 300 Go espace disque</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 3 domaines hébergeables</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 3 000 Go bande passante</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 300 comptes email POP</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 10 bases de données</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Support prioritaire</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Multi-domaines inclus</li>
          </ul>
          <a href="{{ route('hebergement.commander') }}" class="pricing__card-btn">Commander →</a>
        </div>
      </div>

      {{-- Plan 3: Prestige --}}
      <div class="pricing__card">
        <div class="pricing__card-head">
          <div class="pricing__plan-name">Prestige MHD PRO</div>
          <div class="pricing__price"><sup>FCFA </sup>102 000</div>
          <div class="pricing__price-yr">par an TTC</div>
        </div>
        <div class="pricing__card-body">
          <ul class="pricing__feats">
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 750 Go espace disque</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 10 domaines hébergeables</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Bande passante illimitée</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Emails illimités</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 20 bases de données</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Support VIP dédié</li>
            <li><svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> 10 serveurs FTP privés</li>
          </ul>
          <a href="{{ route('hebergement.commander') }}" class="pricing__card-btn pricing__card-btn--outline">Commander →</a>
        </div>
      </div>

    </div>

    {{-- Custom plan CTA --}}
    <div style="text-align:center;margin-top:36px;">
      <p style="color:var(--muted);font-size:.9rem;margin-bottom:14px;">Besoin d'un plan sur mesure pour votre infrastructure ?</p>
      <a href="{{ route('hebergement.inscription') }}" class="tic-btn tic-btn--dark">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/></svg>
        Contacter pour un plan personnalisé
      </a>
    </div>
  </div>
</section>

{{-- ================================================================
     WHY US
================================================================ --}}
<section class="tic-section tic-section--grey">
  <div class="tic-container">
    <div style="text-align:center;">
      <span class="tic-tag">Pourquoi TICAFRIQUE</span>
      <h2 class="tic-heading">Une infrastructure conçue<br>pour <em>performer</em></h2>
    </div>

    <div class="why__grid">
      <div class="why__card">
        <div class="why__icon">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
        </div>
        <div class="why__title">Chargement ultra-rapide</div>
        <div class="why__desc">Serveurs SSD NVMe et réseau optimisé pour offrir des temps de réponse inférieurs à 200ms. Vos visiteurs ne quitteront plus votre site.</div>
      </div>
      <div class="why__card">
        <div class="why__icon">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg>
        </div>
        <div class="why__title">Sécurité renforcée</div>
        <div class="why__desc">SSL gratuit, pare-feu applicatif, protection DDoS et sauvegardes quotidiennes automatiques pour protéger vos données 24h/24.</div>
      </div>
      <div class="why__card">
        <div class="why__icon">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
        </div>
        <div class="why__title">cPanel intuitif</div>
        <div class="why__desc">Gérez vos domaines, e-mails, bases de données et fichiers depuis un panneau de contrôle moderne, accessible en quelques clics.</div>
      </div>
      <div class="why__card">
        <div class="why__icon">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
        </div>
        <div class="why__title">Support 24h/7j</div>
        <div class="why__desc">Notre équipe technique dédiée répond à chaque sollicitation avec une personne dédiée et des solutions personnalisées. Proactivité garantie.</div>
      </div>
      <div class="why__card">
        <div class="why__icon">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg>
        </div>
        <div class="why__title">Sauvegardes quotidiennes</div>
        <div class="why__desc">Restaurez votre site en un clic grâce à nos sauvegardes automatiques stockées sur le cloud. Zéro risque de perte de données.</div>
      </div>
      <div class="why__card">
        <div class="why__icon">
          <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
        </div>
        <div class="why__title">Remboursement 30 jours</div>
        <div class="why__desc">Non satisfait dans les 30 jours suivant votre commande ? Nous vous remboursons intégralement, sans questions posées.</div>
      </div>
    </div>
  </div>
</section>

{{-- ================================================================
     CMS / 1-CLICK INSTALL
================================================================ --}}
<section class="tic-section cms">
  <div class="tic-container">
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:60px;align-items:center;">
      <div>
        <span class="tic-tag tic-tag--light">Installation en 1 clic</span>
        <h2 class="tic-heading" style="color:white;">+400 applications<br>prêtes à l'emploi</h2>
        <p class="tic-subtext tic-subtext--light">Grâce à Softaculous, installez WordPress, Joomla, PrestaShop ou n'importe quelle application en quelques secondes depuis votre cPanel.</p>
        <a href="{{ route('hebergement.commander') }}" class="tic-btn tic-btn--primary" style="margin-top:24px;">
          Démarrer maintenant
        </a>
      </div>

      <div>
        <div class="cms__grid">
          <div class="cms__logo">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm-1.56 14.87L5.5 12l1.41-1.41 3.53 3.53 7.15-7.15 1.41 1.42-8.56 8.48z"/></svg>
            WordPress
          </div>
          <div class="cms__logo">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm-1.56 14.87L5.5 12l1.41-1.41 3.53 3.53 7.15-7.15 1.41 1.42-8.56 8.48z"/></svg>
            Joomla
          </div>
          <div class="cms__logo">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm-1.56 14.87L5.5 12l1.41-1.41 3.53 3.53 7.15-7.15 1.41 1.42-8.56 8.48z"/></svg>
            Drupal
          </div>
          <div class="cms__logo">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm-1.56 14.87L5.5 12l1.41-1.41 3.53 3.53 7.15-7.15 1.41 1.42-8.56 8.48z"/></svg>
            WooCommerce
          </div>
          <div class="cms__logo">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm-1.56 14.87L5.5 12l1.41-1.41 3.53 3.53 7.15-7.15 1.41 1.42-8.56 8.48z"/></svg>
            PrestaShop
          </div>
          <div class="cms__logo">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.49 2 2 6.49 2 12s4.49 10 10 10 10-4.49 10-10S17.51 2 12 2zm-1.56 14.87L5.5 12l1.41-1.41 3.53 3.53 7.15-7.15 1.41 1.42-8.56 8.48z"/></svg>
            Magento
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

{{-- ================================================================
     FAQ
================================================================ --}}
<section class="tic-section" style="background:white;">
  <div class="tic-container" style="max-width:780px;">
    <div style="text-align:center;">
      <span class="tic-tag">FAQ</span>
      <h2 class="tic-heading">Questions fréquentes</h2>
    </div>

    <div class="faq__list" id="faq">

      <div class="faq__item">
        <button class="faq__question" onclick="toggleFaq(this)" aria-expanded="false">
          Où sont basés vos serveurs ?
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq__answer">
          <div class="faq__answer-inner">Nos serveurs sont répartis aux États-Unis, en Europe et en Inde, garantissant une latence optimale pour vos visiteurs africains et internationaux.</div>
        </div>
      </div>

      <div class="faq__item">
        <button class="faq__question" onclick="toggleFaq(this)" aria-expanded="false">
          En combien de temps le service est-il actif après commande ?
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq__answer">
          <div class="faq__answer-inner">Votre hébergement est activé instantanément dès confirmation du paiement. Vous recevez vos accès cPanel par email dans les minutes suivantes.</div>
        </div>
      </div>

      <div class="faq__item">
        <button class="faq__question" onclick="toggleFaq(this)" aria-expanded="false">
          Est-il possible de changer de plan après souscription ?
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq__answer">
          <div class="faq__answer-inner">Oui, vous pouvez upgrader vers un plan supérieur à tout moment depuis votre espace client, sans interruption de service.</div>
        </div>
      </div>

      <div class="faq__item">
        <button class="faq__question" onclick="toggleFaq(this)" aria-expanded="false">
          Proposez-vous une garantie satisfait ou remboursé ?
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq__answer">
          <div class="faq__answer-inner">Absolument. Si vous n'êtes pas satisfait dans les 30 jours suivant votre commande, nous vous remboursons intégralement sans aucune condition.</div>
        </div>
      </div>

      <div class="faq__item">
        <button class="faq__question" onclick="toggleFaq(this)" aria-expanded="false">
          Quel type d'assistance proposez-vous à vos clients ?
          <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/></svg>
        </button>
        <div class="faq__answer">
          <div class="faq__answer-inner">Notre support technique est disponible 24h/7j via ticketing et chat. Chaque client dispose d'un interlocuteur dédié pour des solutions personnalisées.</div>
        </div>
      </div>

    </div>
  </div>
</section>

{{-- ================================================================
     CTA BANNER
================================================================ --}}
<section class="tic-section" style="background:var(--grey);padding-top:0;">
  <div class="tic-container">
    <div class="cta-banner">
      <div style="position:relative;z-index:1;">
        <div class="cta-banner__title">Prêt à lancer votre site web ?</div>
        <div class="cta-banner__sub">Démarrez dès aujourd'hui avec un plan adapté à votre budget.</div>
      </div>
      <a href="{{ route('hebergement.inscription') }}" class="cta-banner__btn">
        Choisir mon hébergement →
      </a>
    </div>
  </div>
</section>

{{-- ================================================================
     INLINE JS — no jQuery dependency
================================================================ --}}
<script>
  /* ── Hero plan switcher ── */
  const plans = {
    presence: {
      price: '54 000',
      feats: ['100 Go d\'espace disque','100 comptes email POP','Bande passante 1 000 Go','cPanel + 3 bases de données','Remboursé sous 30 jours'],
      url: 'webcompte_presence_linix.php'
    },
    confort: {
      price: '90 000',
      feats: ['300 Go d\'espace disque','300 comptes email POP','Bande passante 3 000 Go','cPanel + 10 bases de données','Multi-domaines (3)'],
      url: 'webcompte_confort_linix.php'
    },
    prestige: {
      price: '102 000',
      feats: ['750 Go d\'espace disque','Emails illimités','Bande passante illimitée','cPanel + 20 bases de données','10 domaines hébergeables'],
      url: 'webcompte_prestige_linix.php'
    }
  };

  function switchHeroPlan(btn, plan) {
    document.querySelectorAll('.hero__card-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    const p = plans[plan];
    document.getElementById('hero-price').innerHTML = `<sup>FCFA </sup>${p.price}<sub>/an</sub>`;
    document.getElementById('hero-feats').innerHTML = p.feats.map(f => `
      <div class="hero__card-feat">
        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        ${f}
      </div>`).join('');
    document.getElementById('hero-cta').href = p.url;
  }

  /* ── FAQ accordion ── */
  function toggleFaq(btn) {
    const expanded = btn.getAttribute('aria-expanded') === 'true';
    // Close all
    document.querySelectorAll('.faq__question').forEach(q => {
      q.setAttribute('aria-expanded', 'false');
      q.nextElementSibling.classList.remove('open');
    });
    // Open clicked if it was closed
    if (!expanded) {
      btn.setAttribute('aria-expanded', 'true');
      btn.nextElementSibling.classList.add('open');
    }
  }

  /* ── Extension chip toggle ── */
  document.querySelectorAll('.ext-chip').forEach(chip => {
    chip.addEventListener('click', () => chip.classList.toggle('active'));
  });

  /* ── Domain search redirect (placeholder — adapt to backend route) ── */
  function searchDomain() {
    const q = document.getElementById('domain-input').value.trim();
    if (!q) { document.getElementById('domain-input').focus(); return; }
    const exts = [...document.querySelectorAll('.ext-chip.active')].map(c => c.dataset.ext).join(',');
    // Replace with your actual search endpoint
    window.location.href = `/domaine/search?q=${encodeURIComponent(q)}&exts=${encodeURIComponent(exts)}`;
  }

  document.getElementById('domain-input').addEventListener('keydown', e => {
    if (e.key === 'Enter') searchDomain();
  });

  /* ── Smooth scroll for anchor links ── */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', e => {
      const target = document.querySelector(a.getAttribute('href'));
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    });
  });
</script>

@endsection