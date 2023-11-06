@extends('admin.header')
@section('admin')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Plans</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('add.plan') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="">Plans(loans)</label>
                            <input type="text" name="plan_loan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Interest</label>
                            <div class="input-group">
                                <input type="number" step="any" min="0" max="100" class="form-control text-right"
                                    name="interest_percentage">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Monthly Over Due's Penalty</label>
                            <div class="input-group">
                                <input type="number" step="any" min="0" max="100" class="form-control text-right"
                                    name="penalty_rate">
                                <div class="input-group-append">
                                    <span class="input-group-text">%</span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="8"></textarea>
                        </div>
                        <button class="btn btn-primary">Add Plan</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Loan Plans</h3>
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
                                    <th class="text-center">Plans</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $i=1;
                                @endphp
                                @foreach($plans as $plan)
                                <tr>
                                    <td class="text-center">
                                        {{$i++}}
                                    </td>
                                    <td>
                                        <p>Loan Plan: <b>{{$plan->plan_loan}}</b></p>
                                        <p><small>Interest: <b>{{$plan->interest_percentage}}%</b></small></p>
                                        <p><small>Over Due Penalty: <b>{{$plan->penalty_rate}}%</b></small></p>
                                        <p><small>Description: <b>{{$plan->description}}</b></small></p>
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