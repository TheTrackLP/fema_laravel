@extends('admin.header')
@section('admin')

<style>
p {
    padding: 0;
    margin: 0;
}
</style>
<div class="card shadow">
    <div class="card-body">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card-header">
                    <h2><b class="card-title">Reports</b></h2>
                    <hr>
                    <h3 for="" class="mt-2">Month</h3>
                    <form method="GET" action="{{ route('filter.reports') }}">
                        <div class="col-sm-6 d-flex">
                            <input type="date" name="start_date" class="form-control mx-3">
                            <input type="date" name="end_date" class="form-control mx-3">
                            <button type="submit" class="btn btn-success btn-lg px-4"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
                <br>
                <table class="table table-hover" id="">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Reference/OR #</th>
                            <th class="text-center">Borrower's Details</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @foreach($payments as $payment)
                        <tr>
                            <td class="text-center">
                                {{ $i++ }}
                            </td>
                            <td>
                                <p>Loan Ref: <b>{{ $payment->ref_no }}</b></p>
                                <p>OR: <b>{{ $payment->of_re }}</b></p>
                            </td>
                            <td>
                                <p>Name: <b>{{ $payment->fullname }}</b></p>
                                <p>Plan: <b>{{ $payment->plan_loan }}</b></p>
                            </td>
                            <td>
                                <p>Principal: <b>{{ number_format($payment->paid, 2) }}</b></p>
                                <p>Interest: <b>{{ number_format($payment->interest, 2) }}</b></p>
                                <p>Capital: <b>{{ number_format($payment->capital, 2) }}</b></p>
                            </td>
                            <td class="text-center">
                                <p>{{ date('M d, Y', strtotime($payment->created_at)) }}</p>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection