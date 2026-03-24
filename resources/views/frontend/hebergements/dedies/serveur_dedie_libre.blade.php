@extends('frontend.layouts.base')

@section('title', 'Serveurs Dédiés Linux Performance | TICAFRIQUE')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero-server"
        style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.8)), url('{{ asset('images/bandeau/hosting.jpg') }}')">
        <div class="container text-center">
            <div class="badge-tech animate-up">Infrastructure Dédiée Haute Disponibilité</div>
            <h1 class="animate-up delay-1">Puissance & Liberté : <span>Serveurs Dédiés Linux</span></h1>
            <p class="animate-up delay-2 max-w-700 mx-auto">
                Prenez le contrôle total d'un matériel de pointe. Performance non partagée,
                sécurité physique et ressources illimitées pour vos projets les plus ambitieux.
            </p>
            <div class="hero-btns animate-up delay-3 mt-4">
                <a href="#offres" class="btn btn-server-primary">Voir les configurations</a>
                <span class="root-access-tag ms-lg-3 d-block d-lg-inline-block mt-3 mt-lg-0">
                    <i class="bi bi-terminal-fill me-2"></i><a href="{{ route('hebergement.commander') }}">Commander</a>
                </span>
            </div>
        </div>
    </section>

    {{-- OFFRES / PRICING --}}
    <section id="offres" class="section-padding">
        <div class="container">
            <div class="section-title text-center mb-5">
                <h2 class="title-main">Nos <span>Configurations</span></h2>
                <div class="title-line mx-auto"></div>
                <p class="text-muted mt-3">Matériel Intel® Xeon™ de dernière génération, prêt pour la production</p>
            </div>

            <div class="row g-4">
                @php
                    $servers = [
                        [
                            'name' => 'Standard',
                            'price' => '55.000',
                            'link' => 'hebergement.inscription',
                            'features' => [
                                ['icon' => 'bi-cpu', 'text' => '2 Cores / 4 Threads'],
                                ['icon' => 'bi-hdd-fill', 'text' => '1 To HDD SATA'],
                                ['icon' => 'bi-memory', 'text' => '4 Go RAM DDR4'],
                                ['icon' => 'bi-reception-4', 'text' => '5 To Bande passante'],
                                ['icon' => 'bi-ethernet', 'text' => '2 IP Publiques'],
                                ['icon' => 'bi-chip-fill', 'text' => 'Intel Xeon E3'],
                            ],
                        ],
                        [
                            'name' => 'Business',
                            'price' => '75.000',
                            'link' => 'hebergement.inscription',
                            'features' => [
                                ['icon' => 'bi-cpu', 'text' => '4 Cores / 8 Threads'],
                                ['icon' => 'bi-hdd-fill', 'text' => '1 To HDD SATA'],
                                ['icon' => 'bi-memory', 'text' => '4 Go RAM DDR4'],
                                ['icon' => 'bi-reception-4', 'text' => '5 To Bande passante'],
                                ['icon' => 'bi-ethernet', 'text' => '2 IP Publiques'],
                                ['icon' => 'bi-chip-fill', 'text' => 'Intel Xeon E3'],
                            ],
                        ],
                        [
                            'name' => 'Pro',
                            'price' => '90.000',
                            'featured' => true,
                            'link' => 'hebergement.inscription',
                            'features' => [
                                ['icon' => 'bi-cpu', 'text' => '4 Cores / 8 Threads'],
                                ['icon' => 'bi-hdd-fill', 'text' => '1 To HDD SATA'],
                                ['icon' => 'bi-memory', 'text' => '8 Go RAM DDR4'],
                                ['icon' => 'bi-reception-4', 'text' => '10 To Bande passante'],
                                ['icon' => 'bi-ethernet', 'text' => '2 IP Publiques'],
                                ['icon' => 'bi-chip-fill', 'text' => 'Intel Xeon E3'],
                            ],
                        ],
                        [
                            'name' => 'Elite',
                            'price' => '110.000',
                            'link' => 'hebergement.inscription',
                            'features' => [
                                ['icon' => 'bi-cpu', 'text' => '4 Cores / 8 Threads'],
                                ['icon' => 'bi-hdd-fill', 'text' => '1 To HDD SATA'],
                                ['icon' => 'bi-memory', 'text' => '16 Go RAM DDR4'],
                                ['icon' => 'bi-reception-4', 'text' => '15 To Bande passante'],
                                ['icon' => 'bi-ethernet', 'text' => '2 IP Publiques'],
                                ['icon' => 'bi-chip-fill', 'text' => 'Intel Xeon E3'],
                            ],
                        ],
                    ];
                @endphp

                @foreach ($servers as $server)
                    <div class="col-xl-3 col-md-6">
                        <div class="server-card {{ $server['featured'] ?? false ? 'featured' : '' }} animate-card">
                            <a href="{{ route($server['link']) }}"
                                class="btn {{ $server['featured'] ?? false ? 'btn-server-primary' : 'btn-server-outline' }} w-100 mt-auto">
                                Commander <i class="bi bi-arrow-right ms-2"></i>
                            </a>


                            <div class="server-header text-center">
                                <i class="bi bi-database-fill-gear display-5 text-primary-custom mb-3 d-block"></i>
                                <h4 class="fw-bold">{{ $server['name'] }}</h4>
                            </div>

                            <div class="server-price my-4 text-center">
                                <span class="val">{{ $server['price'] }}</span>
                                <div class="unit text-start ms-2">FCFA<br><span>/mois</span></div>
                            </div>

                            <ul class="server-specs list-unstyled">
                                @foreach ($server['features'] as $feature)
                                    <li class="mb-2 pb-2 border-bottom border-light">
                                        <i class="bi {{ $feature['icon'] }} me-2 text-primary-custom"></i>
                                        {{ $feature['text'] }}
                                    </li>
                                @endforeach
                            </ul>

                            <a href="{{ route($server['link']) }}"
                                class="btn {{ $server['featured'] ?? false ? 'btn-server-primary' : 'btn-server-outline' }} w-100 mt-auto">
                                Commander <i class="bi bi-arrow-right ms-2"></i>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="hosting-why-section">
        <div class="container">
            <!-- TITLE -->
            <div class="hosting-why-title text-center">
                <h2>Pourquoi héberger chez <span>TICAFRIQUE</span> ?</h2>
                <p>
                    Un partenaire technologique fiable, avec un support expert
                    et une infrastructure pensée pour la performance.
                </p>
            </div>

            <div class="row align-items-center">
                <!-- TABS -->
                <div class="col-lg-4 mb-4 mb-lg-0">
                    <ul class="nav hosting-why-tabs" role="tablist">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#why-dashboard">
                                <h5>Tableau de bord intuitif</h5>
                                <span>Gestion simplifiée de vos serveurs</span>
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#why-root">
                                <h5>Accès root complet</h5>
                                <span>Contrôle total de votre infrastructure</span>
                            </button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#why-tools">
                                <h5>cPanel, WHMCS & IPs</h5>
                                <span>Modules essentiels disponibles</span>
                            </button>
                        </li>
                    </ul>
                </div>

                <!-- CONTENT -->
                <div class="col-lg-8">
                    <div class="tab-content hosting-why-content">
                        <div class="tab-pane fade show active" id="why-dashboard">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/dashbord.png') }}" alt="Dashboard serveur">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="why-root">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/analyse.png') }}" alt="Accès root serveur">
                            </div>
                        </div>

                        <div class="tab-pane fade" id="why-tools">
                            <div class="why-image">
                                <img src="{{ asset('assets/images/cpanelimg.png') }}" alt="cPanel serveur">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ENGAGEMENT / FEATURES --}}
    <section class="section-light bg-light py-5">
        <div class="container py-4">
            <div class="section-title text-center mb-5">
                <h2 class="fw-bold">L'engagement <span>TICAFRIQUE</span></h2>
            </div>

            <div class="row g-4 text-center">
                @php
                    $items = [
                        [
                            'icon' => 'bi-lightning-charge',
                            'title' => 'Livraison Express',
                            'text' => 'Votre matériel est assemblé et testé pour une mise en service record.',
                        ],
                        [
                            'icon' => 'bi-speedometer',
                            'title' => 'Matériel de Pointe',
                            'text' => 'Serveurs Intel Xeon garantissant stabilité et puissance de calcul.',
                        ],
                        [
                            'icon' => 'bi-headset',
                            'title' => 'Support Prioritaire',
                            'text' => 'Accès direct à nos ingénieurs système Linux pour toute assistance.',
                        ],
                        [
                            'icon' => 'bi-shield-lock',
                            'title' => 'Sécurité Physique',
                            'text' => 'Hébergé dans des datacenters certifiés avec surveillance 24/7.',
                        ],
                        [
                            'icon' => 'bi-globe-central-south-asia',
                            'title' => 'Réseau Premium',
                            'text' => 'Bande passante redondante pour une latence minimale partout.',
                        ],
                        [
                            'icon' => 'bi-terminal-fill',
                            'title' => 'Liberté Totale',
                            'text' => 'Choisissez votre distribution et gardez le Root.',
                        ],
                    ];
                @endphp
                @foreach ($items as $item)
                    <div class="col-lg-4 col-md-6">
                        <div class="feature-box-linux p-4 bg-white rounded-4 shadow-sm h-100 animate-card">
                            <div class="icon-circle bg-primary-light text-primary-custom mb-4 mx-auto">
                                <i class="bi {{ $item['icon'] }} fs-2"></i>
                            </div>
                            <h5 class="fw-bold">{{ $item['title'] }}</h5>
                            <p class="text-muted mb-0 small">{{ $item['text'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- FAQ --}}
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center mb-5">
                        <h2 class="fw-bold">Questions <span>Fréquentes</span></h2>
                    </div>

                    <div class="accordion linux-accordion" id="faqAccordion">
                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button rounded-3" data-bs-toggle="collapse" data-bs-target="#faq1">
                                    <i class="bi bi-patch-question me-2 text-primary"></i> Quelles distributions sont
                                    supportées ?
                                </button>
                            </h2>
                            <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Nous supportons nativement Debian, Ubuntu, CentOS, AlmaLinux et Rocky Linux.
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 shadow-sm mb-3">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed rounded-3" data-bs-toggle="collapse"
                                    data-bs-target="#faq2">
                                    <i class="bi bi-patch-question me-2 text-primary"></i> Quel est le délai d'activation ?
                                </button>
                            </h2>
                            <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-muted">
                                    Les serveurs sont généralement mis en service sous 2 à 24 heures après validation du
                                    paiement.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, {
                threshold: 0.1
            });

            document.querySelectorAll('.animate-card').forEach(card => observer.observe(card));
        });
    </script>
@endsection
