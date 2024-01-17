@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-gray-900">Add Departments</h3>
                    </div>
                    <form action="{{ route('add.department') }}" method="post">
                        @csrf
                        <label for="" class="text-gray-900">Department</label>
                        <input type="text" name="departments" id="" class="form-control">
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success px-5">ADD</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-gray-900">Departments</h3>
                    </div>
                    <table class="table table-hovered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Departments</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($departments as $department)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>{{ $department->departments }}</td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="{{ route('delete.department', $department->id) }} "
                                        id="delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection