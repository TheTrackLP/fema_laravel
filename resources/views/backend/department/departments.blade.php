@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Department</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('dept.add') }}" method="post">
                        @csrf
                        <label for="">Add Department</label>
                        <input type="text" name="department" class="form-control">
                        <button type="submit" class="btn btn-primary mt-3">Add Department</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Departments</h3>
                </div>
                <div class="card">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <colgroup>
                                <col width="1%">
                                <col width="10%">
                                <col width="0.5%">
                            </colgroup>
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Department</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i = 1;
                                @endphp
                                @foreach($departments as $dept)
                                <tr>
                                    <td class="text-center">
                                        {{ $i++ }}
                                    </td>
                                    <td class="text-center">
                                        {{$dept->department}}
                                    </td>
                                    <td class="text-center">
                                        <a href="" class="btn btn-danger" id="delete"><i class="fas fa-trash"></i></a>
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
</div>

@endsection