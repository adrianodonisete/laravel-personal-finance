@php
    $page ??= 'none';
    
    $isPageEntradas = App\Helpers\MenuHelper::isThatPage('entradas', $page);
    $isPageRelatorios = App\Helpers\MenuHelper::isThatPage('relatorios', $page);
@endphp
<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion" aria-label="sb-sidenav-accord-001">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Geral</div>
            <a class="nav-link" href="index.html">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Finanças</div>
            <a class="nav-link {{ $isPageEntradas ? '' : 'collapsed' }}" href="#" data-bs-toggle="collapse"
                data-bs-target="#collapseLayouts" aria-expanded="{{ $isPageEntradas ? 'true' : 'false' }}"
                aria-controls="collapseLayouts">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-columns"></i>
                </div>
                Entradas
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div class="collapse {{ $isPageEntradas ? 'show' : '' }}" id="collapseLayouts" aria-labelledby="headingOne"
                data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav" aria-label="sb-sidenav-menu-001">
                    <a class="nav-link" href="{{ route('entry.first') }}">Passo 1</a>
                    <a class="nav-link" href="{{ route('entry.results') }}">Ver resultado</a>
                </nav>
            </div>

            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                Pages
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages"
                    aria-label="sb-sidenav-001">
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Authentication
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down">
                            </i>
                        </div>
                    </a>
                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav" aria-label="sb-sidenav-002">
                            <a class="nav-link" href="login.html">Login</a>
                            <a class="nav-link" href="register.html">Register</a>
                            <a class="nav-link" href="password.html">Forgot Password</a>
                        </nav>
                    </div>
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                        data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Error
                        <div class="sb-sidenav-collapse-arrow">
                            <i class="fas fa-angle-down">
                            </i>
                        </div>
                    </a>
                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                        data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav" aria-label="sb-sidenav-003">
                            <a class="nav-link" href="401.html">401 Page</a>
                            <a class="nav-link" href="404.html">404 Page</a>
                            <a class="nav-link" href="500.html">500 Page</a>
                        </nav>
                    </div>
                </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Addons</div>
            <a class="nav-link" href="charts.html">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-chart-area"></i>
                </div>
                Charts
            </a>
            <a class="nav-link" href="tables.html">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-table"></i>
                </div>
                Tables
            </a>
        </div>
    </div>

    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Start Bootstrap
    </div>
</nav>
