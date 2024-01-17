@extends('admin.header')
@section('admin')
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <hr>
        <div class="row">
            <div class="col-xl-6 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h3>Pending Borrowers</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h3>{{ $pending_count }}</h3>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h3>Existing Borrowers</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h3>{{ $existing_count }}</h3>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h3>Active Borrowers</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <h3>{{ $active_count }}</h3>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">
                        <h3>Payments Today</h3>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection