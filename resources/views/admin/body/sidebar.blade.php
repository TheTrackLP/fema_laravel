<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <hr>
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('all.borrowers') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-users"></i></div>
                    Borrowers
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('all.actives') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-list-ul"></i></div>
                    Loan
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('all.payments') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-money-bill"></i></div>
                    Payments
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('all.plans') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-list-alt"></i></div>
                    Loan Plans
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('view.reports') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-file-invoice"></i></div>
                    Reports
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('staffs.members') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-users-cog"></i></div>
                    Staffs/Members
                </a>
                <hr>
                <a class="nav-link text-white" href="{{ route('all.departments') }}">
                    <div class="sb-nav-link-icon text-white"><i class="fas fa-building"></i></div>
                    Departments
                </a>
                <hr>
            </div>
        </div>
        <div class="sb-sidenav-footer text-white">
            <div class="">Logged in as:</div>
            {{ $profileData->username }}
        </div>
    </nav>
</div>