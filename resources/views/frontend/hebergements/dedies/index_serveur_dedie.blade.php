@extends('frontend.layouts.base')

@section('title', 'Solutions d’hébergement professionnelles')

@section('content')

    {{-- HERO : Image gérée par asset() --}}
    <section class="hosting-hero"
        style="background-image: linear-gradient(rgba(49, 49, 49, 0.7), rgba(111, 127, 173, 0.7)), url('{{ asset('images/bandeau/hosting.jpg') }}')">
        <div class="container text-center text-white">
            <span class="badge-tech host-animate-up">Infrastructure Haute Performance</span>
            <h1 class="display-4 fw-bold host-animate-up delay-1">Hébergement <span>Sur Mesure</span></h1>
            <p class="lead host-animate-up delay-2">Déployez vos projets sur une infrastructure fiable et sécurisée.</p>
            <div class="mt-4 host-animate-up delay-3">
                <a href="#solutions" class="btn btn-primary btn-lg px-4 me-2">Voir les offres</a>
                <a href="{{ route('hebergement.commander') }}" class="btn btn-outline-light btn-lg px-4">Commander</a>
            </div>
        </div>
    </section>

    {{-- SOLUTIONS : On utilise un fond sombre pour faire ressortir les cartes blanches --}}
    <section id="solutions" class="solutions-section"
        style="background-image: url('{{ asset('assets/images/hebergement.jpg') }}')">
        <div class="section-overlay"></div>

        <div class="container position-relative">
            <div class="text-center mb-5 host-animate">
                <h2 class="text-white fw-bold h1">Nos <span>Solutions</span></h2>
                <div class="title-bar mx-auto"></div>
            </div>

            <div class="row g-4">
                {{-- Carte 1 : Dédié --}}
                <div class="col-lg-4">
                    <div class="hosting-card-clean host-animate">
                        <div class="icon-wrap"><i class="bi bi-cpu"></i></div>
                        <h3>Dédié Linux</h3>
                        <p class="text-muted">Ressources exclusives pour vos applications critiques.</p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2"></i> Accès root complet</li>
                            <li><i class="bi bi-check2"></i> Intel Xeon dernière génération</li>
                            <li><i class="bi bi-check2"></i> Bande passante illimitée</li>
                        </ul>
                        <a href="{{ route('hebergement.serveur_dedie_libre') }}" class="btn btn-action">Découvrir</a>
                    </div>
                </div>

                {{-- Carte 2 : VPS (La mise en avant) --}}
                <div class="col-lg-4">
                    <div class="hosting-card-clean featured host-animate">
                        <span class="top-badge">Recommandé</span>
                        <div class="icon-wrap bg-primary text-white"><i class="bi bi-cloud-check"></i></div>
                        <h3>Serveurs VPS</h3>
                        <p class="text-muted">Flexibilité maximale et stockage NVMe ultra-rapide.</p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2 text-primary"></i> Virtualisation KVM</li>
                            <li><i class="bi bi-check2 text-primary"></i> Snapshots quotidiens</li>
                            <li><i class="bi bi-check2 text-primary"></i> IP dédiée incluse</li>
                        </ul>
                        <a href="{{ route('hebergement.serveur_dedie_vps') }}" class="btn btn-primary w-100 py-2">Voir les
                            offres</a>
                    </div>
                </div>

                {{-- Carte 3 : Infogérance --}}
                <div class="col-lg-4">
                    <div class="hosting-card-clean host-animate">
                        <div class="icon-wrap"><i class="bi bi-headset"></i></div>
                        <h3>Infogérance</h3>
                        <p class="text-muted">Nos experts gèrent la technique pour vous.</p>
                        <ul class="feature-list">
                            <li><i class="bi bi-check2"></i> Supervision H24</li>
                            <li><i class="bi bi-check2"></i> Sécurité renforcée</li>
                            <li><i class="bi bi-check2"></i> Support prioritaire</li>
                        </ul>
                        <a href="{{ route('hebergement.serveur_infogerence') }}" class="btn btn-action">En savoir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) entry.target.classList.add("visible");
                });
            }, {
                threshold: 0.1
            });
            document.querySelectorAll(".host-animate, .host-animate-up").forEach(el => observer.observe(el));
        });
    </script>
@endsection
