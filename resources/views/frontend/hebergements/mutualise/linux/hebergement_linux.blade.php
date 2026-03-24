@extends('frontend.layouts.base')

@section('title', 'Hébergement Web Linux')

@section('content')

    <!-- =====================================================
         HERO / PRICING
        ===================================================== -->
    

    <section class="hero-pricing py-5"
        style="background-image:url('{{ asset('assets/images/hebergement.jpg') }}'); background-size:cover; background-position:center;">

        <div class="hero-overlay position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-75"></div>

        <div class="container position-relative text-white">

            <!-- HEADER -->
            <div class="text-center mb-5">
                <h1 class="fw-bold">
                    Hébergement Web <span class="text-primary">Linux</span>
                </h1>
                <p class="text-light mt-3">
                    Des solutions d’hébergement performantes, sécurisées et évolutives
                    pour vos projets professionnels.
                </p>
            </div>

            <!-- TABLE -->
            <div class="table-responsive bg-white rounded shadow-lg p-4">
                <table class="table table-bordered table-hover align-middle text-center mb-0">

                    <!-- THEAD -->
                    <thead class="table-dark">
                        <tr>
                            <th class="text-start">Hébergement Web Professionnel <br>

                                Comparez nos plans</th>
                            <th>
                                <div class="fw-bold">Présence</div>
                                <small >54 000 CFA</small>
                            </th>
                            <th class="table-primary">
                                <span class="badge bg-primary mb-1">Recommandé</span>
                                <div class="fw-bold">Confort Business</div>
                                <small>90 000 CFA</small>
                            </th>
                            <th>
                                <div class="fw-bold">Prestige Pro</div>
                                <small>102 000 CFA</small>
                            </th>
                        </tr>
                    </thead>

                    <!-- TBODY -->
                    <tbody class="text-dark">
                        <tr>
                            <td class="text-start fw-semibold">Espace disque</td>
                            <td>100 Go</td>
                            <td class="table-primary fw-bold">300 Go</td>
                            <td>750 Go</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Domaines hébergeables</td>
                            <td>1</td>
                            <td class="table-primary fw-bold">3</td>
                            <td>10</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Bande passante</td>
                            <td>1000 Go</td>
                            <td class="table-primary fw-bold">3000 Go</td>
                            <td>Illimitée</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Comptes email</td>
                            <td>100</td>
                            <td class="table-primary fw-bold">300</td>
                            <td>Illimité</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Nom de domaine</td>
                            <td>.ci offert la 1er année*</td>
                            <td class="table-primary fw-bold">.ci offert la 1er année*</td>
                            <td>.ci offert la 1er année*</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Système</td>
                            <td>CentOS 7</td>
                            <td class="table-primary fw-bold">CentOS 7</td>
                            <td>CentOS 7</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Serveur HTTP</td>
                            <td>Apache 2.4</td>
                            <td class="table-primary fw-bold">Apache 2.4</td>
                            <td>Apache 2.4</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">FTP sécurisé</td>
                            <td>✔</td>
                            <td class="table-primary fw-bold">✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">DNS modifiable</td>
                            <td>✔</td>
                            <td class="table-primary fw-bold">✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Webmail</td>
                            <td>✔</td>
                            <td class="table-primary fw-bold">✔</td>
                            <td>✔</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Bases de données</td>
                            <td>3</td>
                            <td class="table-primary fw-bold">10</td>
                            <td>20</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Support technique</td>
                            <td>Inclus</td>
                            <td class="table-primary fw-bold">Prioritaire</td>
                            <td>Premium</td>
                        </tr>
                        <tr>
                            <td class="text-start fw-semibold">Satisfait ou remboursé</td>
                            <td>30 jours</td>
                            <td class="table-primary fw-bold">30 jours</td>
                            <td>30 jours</td>
                        </tr>

                        <!-- CTA -->
                        <tr class="table-light">
                            <td></td>
                            <td>
                                <a href="{{ route('hebergement.commander') }}" class="btn btn-outline-primary w-100">
                                    Commander
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('hebergement.commander') }}" class="btn btn-primary w-100">
                                    Commander
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('hebergement.commander') }}" class="btn btn-dark w-100">
                                    Commander
                                </a>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

        </div>
    </section>



    <!-- =====================================================
         FEATURES
        ===================================================== -->
    <section class="features-section">
        <div class="container">

            <div class="section-header text-center">
                <h2>Caractéristiques <span>techniques</span></h2>
                <p>Une infrastructure fiable pensée pour la performance et la sécurité.</p>
            </div>

            <div class="features-layout">
                <div class="features-grid">
                    @foreach ([['cpanel.png', 'cPanel intuitif', 'Administration simple et rapide'], ['disponibilite.png', 'Disponibilité 99.9%', 'Haute tolérance aux pannes'], ['mondial.png', 'Accès mondial', 'Gestion depuis partout'], ['support.png', 'Support 24/7', 'Assistance technique continue'], ['application.png', 'Multi-applications', 'CMS, PHP, frameworks'], ['serveur.png', 'Infrastructure sécurisée', 'Serveurs redondants']] as $f)
                        <div class="feature-card">
                            <img src="{{ asset('assets/images/' . $f[0]) }}">
                            <h5>{{ $f[1] }}</h5>
                            <p>{{ $f[2] }}</p>
                        </div>
                    @endforeach
                </div>

                <div class="features-image">
                    <img src="{{ asset('assets/images/server.png') }}">
                </div>
            </div>

        </div>
    </section>

    <!-- =====================================================
         WHY TICAFRIQUE
        ===================================================== -->
    <section class="why-section">
        <div class="container">

            <div class="section-header text-center">
                <h2>Pourquoi choisir <span>TICAFRIQUE</span> ?</h2>
                <p>Un partenaire technologique fiable pour vos projets critiques.</p>
            </div>

            <div class="why-grid">
                @foreach ([['fa-server', 'Infrastructure professionnelle'], ['fa-lock', 'Sécurité renforcée'], ['fa-wordpress', 'Gestion simplifiée'], ['fa-envelope', 'Emails professionnels'], ['fa-rocket', 'Déploiement rapide'], ['fa-cogs', 'Technologies avancées']] as $w)
                    <div class="why-card">
                        <i class="fa {{ $w[0] }}"></i>
                        <h5>{{ $w[1] }}</h5>
                        <p>Solutions conçues pour la performance et la fiabilité.</p>
                    </div>
                @endforeach
            </div>

        </div>
    </section>

@endsection
