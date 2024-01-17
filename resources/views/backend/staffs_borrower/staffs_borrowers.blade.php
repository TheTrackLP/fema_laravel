@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="card shadow">
        <div class="card-body">
            <div class="card-header">
                <h2 class="text-gray-900">Users/Staffs</h2>
            </div>
            <table class="table table-hover" id="borrowerTable">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">BID#</th>
                        <th class="text-center">Staff's Name</th>
                        <th class="text-center">User Type</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    @endphp
                    @foreach($users as $user)
                    <tr>
                        <td class="text-center">{{ $i++ }}</td>
                        <td class="text-center">{{ $user->employee_id }}</td>
                        <td>{{ $user->name }}</td>
                        <td class="text-center">
                            <span class="badge rounded-pill text-bg-success">{{ $user->usertype }}</span>
                        </td>
                        <td class="text-center">
                            {{ date('M d, Y', strtotime($user->created_at)) }}
                        </td>
                        <td class="text-center">
                            <button class="btn btn-info text-white" id="editstaff" value="{{ $user->id }}">Edit
                                Accoun</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <hr>
    <div class="card shadow">
        <div class="card-body">
            <div class="card-header">
                <h2 class="text-gray-900">Borrowers List</h2>
            </div>
            <table class="table table-hover" id="borrowerTable">
                <thead class="table-primary">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">BID#</th>
                        <th class="text-center">Borrower's Name</th>
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
                        <td class="text-center">
                            asd
                        </td>
                        <td class="text-center">
                            {{ date('M d, Y', strtotime($borrower->created_at)) }}
                        </td>
                        <td class="text-center">
                            <button class="btn btn-info text-white">Edit Account</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $(document).on('click', '#editstaff', function() {
        var staff_id = $(this).val();

        $('#EditStaff').modal('show');

        $.ajax({
            type: "GET",
            url: "/admin/Staffs_Borrowers/" + staff_id,
            success: function(response) {
                $('#username').val(response.staff_member.username);
                $('#email').val(response.staff_member.email);
                $('#id').val(staff_id);
            }
        });
    });
})
</script>

@include('backend.staffs_borrower.edit_staff')
@endsection