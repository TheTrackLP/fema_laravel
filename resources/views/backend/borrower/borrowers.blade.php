@extends('admin.header')
@section('admin')

<div class="card shadow">
    <div class="card-body">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card-header">
                    <h2 class="card-title">Borrowers List</h2>
                    <button class="btn btn-primary btn-lg px-5 my-3 float-end" data-bs-toggle="modal"
                        data-bs-target="#AddBorrowers">Add
                        Borrowers
                    </button>
                </div>
                <table class="table table-hover" id="borrowerTable">
                    <thead class="table-primary">
                        <tr>
                            <th class="text-center">#</th>
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
                        @php
                        $i = 1;
                        @endphp
                        @foreach($borrowers as $borrower)
                        <tr>
                            <td class="text-center">{{ $i++ }}</td>
                            <td class="text-center">{{ $borrower->employee_id }}</td>
                            <td>{{ $borrower->name }}</td>
                            <td>{{ $borrower->shared_capital }}</td>
                            <td>{{ $borrower->dept }}</td>
                            <td class="text-center">
                                @if($borrower->status == 1)
                                <span class="badge rounded-pill text-bg-secondary">New</span>
                                @elseif($borrower->status == 2)
                                <span class="badge rounded-pill text-bg-success">Member</span>
                                @endif
                            </td>
                            <td class="text-center">
                                {{ date('M d, Y', strtotime($borrower->created_at)) }}
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success" id="editBtn" value="{{ $borrower->id }}"><i
                                        class="far fa-eye"></i></button>
                                <a href="{{ route('delete.borrower', $borrower->id) }}" class="btn btn-danger"
                                    id="delete"><i class="fas fa-trash"></i></a>
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
        var borrower_id = $(this).val();

        $('#EditBorrower').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/borrower/edit/" + borrower_id,
            success: function(response) {
                $('#emp_id').val(response.borrower.employee_id);
                $('#dept').val(response.borrower.department);
                $('#firstname').val(response.borrower.firstname);
                $('#middlename').val(response.borrower.middlename);
                $('#lastname').val(response.borrower.lastname);
                $('#contact').val(response.borrower.contact_no);
                $('#yservice').val(response.borrower.year_service);
                $('#birth').val(response.borrower.date_birth);
                $('#add').val(response.borrower.address);
                $('#capital').val(response.borrower.shared_capital);
                $('#stat').val(response.borrower.status);
                $('#id').val(borrower_id);
            }
        })
    });
});
$(document).ready(function() {
    $('.js-example-basic').select2();
});
</script>

@include('backend.borrower.add_borrower')
@include('backend.borrower.edit_borrower')
@endsection