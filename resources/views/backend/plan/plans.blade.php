@extends('admin.header')
@section('admin')

<style>
td,
p {
    margin: 0;
    font-size: 15px;
}
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-gray-900">Add Plans(Loans)</h3>
                    </div>
                    <form action="{{ route('add.plans') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="" class="text-gray-900">Plan (Loans)</label>
                            <input type="text" name="plan_loan" id="" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-gray-900">Interest</label>
                            <input type="number" name="interest_percentage" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-gray-900">Monthly Over Due's Penalty</label>
                            <input type="number" name="penalty_rate" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="text-gray-900">Description</label>
                            <textarea name="description" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-success px-5">ADD</button>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-body">
                    <div class="card-title">
                        <h3 class="text-gray-900">Departments</h3>
                    </div>
                    <table class="table table-hovered">
                        <thead class="table-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Plans</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($plans as $plan)
                            <tr>
                                <td class="text-center">{{ $i++ }}</td>
                                <td>
                                    <p class="text-gray-900">Loan Plan: <b>{{ $plan->plan_loan }}</b></p>
                                    <small>
                                        <p class="text-gray-900">Interest: <b>{{ $plan->interest_percentage }}%</b></p>
                                    </small>
                                    <small>
                                        <p class="text-gray-900">Over due Penalty: <b>{{ $plan->penalty_rate }}%</b></p>
                                    </small>
                                    <small>
                                        <p class="text-gray-900">Description: <b>{{ $plan->description }}</b></p>
                                    </small>
                                </td>
                                <td class="text-center">
                                    <a class="btn btn-danger" href="" id="delete">Delete</a>
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