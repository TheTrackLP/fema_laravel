@extends('admin.header')
@section('admin')

<div class="card shadow">
    <div class="card-body">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card-header">
                    <button class="btn btn-primary btn-lg float-end" data-bs-toggle="modal"
                        data-bs-target="#AddLists">Create
                        New Application
                    </button>
                    <h2 class="card-title">Active List</h2>
                </div>
                <br>
                <table class="table table-hover" id="ActiveTable">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">CV#</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Years of Service</th>
                            <th class="text-center">Plan</th>
                            <th class="text-center">Next Payment Details</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($applicants as $applicant)
                        <tr>
                            <td class="text-center">
                                {{ $i++ }}
                            </td>
                            <td class="text-center">
                                {{ $applicant->employee_id }}
                            </td>
                            <td>{{ $applicant->name }}</td>
                            <td class="text-center">
                                @if($applicant->yservice == 1)
                                <p>1-4 Years</p>
                                @elseif($applicant->yservice == 2)
                                <p>5-9 Years</p>
                                @elseif($applicant->yservice == 3)
                                <p>10-Up Years</p>
                                @endif
                            </td>
                            <td>{{ $applicant->plan_loan }}</td>
                            <td class="text-center">
                                Next Payment Detail
                            </td>
                            <td class="text-center">
                                @if($applicant->status == 0)
                                <span class="badge rounded-pill bg-warning text-dark">For Approval</span>
                                @elseif($applicant->status == 1)
                                <span class="badge rounded-pill bg-primary">Approved</span>
                                @elseif($applicant->status == 2)
                                <span class="badge rounded-pill bg-info">Released</span>
                                @elseif($applicant->status == 3)
                                <span class="badge rounded-pill bg-success">Completed</span>
                                @elseif($applicant->status == 4)
                                <span class="badge rounded-pill bg-danger">Denied</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success" id="editBtn" value="{{ $applicant->id }}"><i
                                        class="far fa-eye"></i></button>
                                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#editBtn', function() {
        var applicant_id = $(this).val();

        $('#EditList').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/loans/edit/" + applicant_id,
            success: function(response) {
                $('#borrower_id').val(response.actives.borrower_id);
                $('#ref_no').val(response.actives.ref_no);
                $('#shared_cap').val(response.actives.shared_cap);
                $('#yservice').val(response.actives.yservice);
                $('#plan_id').val(response.actives.plan_id);
                $('#amount').val(response.actives.amount);
                $('#purpose').val(response.actives.purpose);
                $('#status').val(response.actives.status);
                $('#id').val(applicant_id);
            }
        });
    });
});

const getvalue = () => {
    var selectedBId = $('#bid').val();

    $.ajax({
        type: "GET",
        url: "/admin/borrowers/get/" + selectedBId,
        success: function(response) {
            console.log(response)
            $('#cap').val(response.borrower.shared_capital);
            $('#yser').val(response.borrower.year_service);
        }
    })
}
</script>
@include('backend.active.add_active')
@include('backend.active.edit_active')
@endsection