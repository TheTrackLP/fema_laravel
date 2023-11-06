@extends('admin.header')
@section('admin')

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h3 class="m-0 font-weight-bold text-primary">DataTables Example</h3>
        <button class="btn btn-primary btn-lg float-right" data-toggle="modal" data-target="#loans"><i
                class="fas fa-plus"></i> Create New Application</button>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">CV#</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Years of Service</th>
                        <th class="text-center">Plan</th>
                        <th class="text-center">Next Payments Details</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i=1;
                    @endphp
                    @foreach($applicants as $applicant)
                    <tr>
                        <td class="text-center">
                            {{ $i++ }}
                        </td>
                        <td class="text-center">
                            {{ $applicant->emp_id }}
                        </td>
                        <td>
                            {{ $applicant->name }}
                        </td>
                        <td class="text-center">
                            @if($applicant->status == 1)
                            <p>1-4 years</p>
                            @elseif($applicant->status == 2)
                            <p>5-9 Years</p>
                            @elseif($applicant->status == 3)
                            <p>10-Up Years</p>
                            @endif
                        </td>
                        <td>
                            Plan
                        </td>
                        <td>
                            Next Payments Details
                        </td>
                        <td class="text-center">
                            Status
                        </td>
                        <td class="text-center">
                            Action
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('backend.loan.add_loan')
@endsection