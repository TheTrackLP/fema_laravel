@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h3 class="m-0 font-weight-bold text-primary">Borrower List</h3>
            <button type="button" class="btn btn-primary float-right px-4 py-2" data-toggle="modal"
                data-target="#borrowers" data-backdrop="static" data-keyboard="false">Add Borrower</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <colgroup>
                        <col width="5%">
                        <col width="25%">
                        <col width="12%">
                        <col width="20%">
                        <col width="5%">
                        <col width="10%">
                        <col width="13%">
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="text-center">CV#</th>
                            <th class="text-center">Borrower's Name</th>
                            <th class="text-center">Shared Capital</th>
                            <th class="text-center">Department</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($borrowers as $borrower)
                        <tr>
                            <td class="text-center">
                                {{ $borrower->id }}
                            </td>
                            <td>
                                {{ $borrower->name }}
                            </td>
                            <td class="text-center">
                                {{ number_format($borrower->shared_capital, 2) }}
                            </td>
                            <td>
                                {{ $borrower->dept }}
                            </td>
                            <td class="text-center">
                                @if($borrower->status == 0)
                                <span class="badge badge-secondary">Pending</span>
                                @elseif($borrower->status == 1)
                                <span class="badge badge-primary">Member</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ date('M d, Y', strtotime($borrower->created_at)) }}
                            </td>
                            <td class="text-center">
                                <a href="" class="btn btn-success"><i class="fas fa-eye"></i></a>
                                <a href="" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                <a href="" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@include('backend.borrower.add_borrower')
@endsection