<div class="col-2 vh-100 g-0">
    <div class="col-2 vh-100 d-flex flex-column flex-shrink-0 p-3 text-white bg-dark position-fixed">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <svg class="bi me-2" width="16" height="16">
                <use xlink:href="#home" />
            </svg>
            <span class="fs-4">Sidebar</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column Fmb-auto">
            <li class="nav-item mb-1">
                <a href="/" class="nav-link {{ Request::is('/') || Request::is('formadd') ? 'active' : '' }}"
                    aria-current="page">
                    <div class="ms-4 textnav">Home</div>
                </a>
            </li>
            <li class="mb-1">
                <a href="/buku" class="nav-link {{ Request::is('buku') ? 'active' : '' }}">
                    <div class="ms-4 textnav">Buku</div>
                </a>
            </li>
            <li class="mb-1">
                <a href="/anggota" class="nav-link {{ Request::is('anggota') ? 'active' : '' }}">
                    <div class="ms-4 textnav">Anggota</div>
                </a>
            </li>
        </ul>
    </div>
</div>
