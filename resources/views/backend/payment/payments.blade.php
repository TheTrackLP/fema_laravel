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
                    <h3>Payments</h3>
                </div>
                <button class="btn btn-primary btn-lg px-5 my-3 float-end" data-bs-toggle="modal"
                    data-bs-target="#AddPayments">
                    New Payments
                </button>
                <table class="table table-hover" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Reference/OR #</th>
                            <th class="text-center">Borrower's Details</th>
                            <th class="text-center">Amount</th>
                            <th class="text-center">Penalty</th>
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
                                <p>Balance: <b>{{ number_format($payment->paid, 2) }}</b></p>
                                <p>Principal: <b>{{ number_format($payment->paid, 2) }}</b></p>
                                <p>Interest: <b>{{ number_format($payment->interest, 2) }}</b></p>
                                <p>Capital: <b>{{ number_format($payment->capital, 2) }}</b></p>
                            </td>
                            <td class="text-center">
                                Penalty
                            </td>
                            <td class="text-center">
                                <p>{{ date('M d, Y', strtotime($payment->created_at)) }}</p>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-success"><i class="fas fa-print"></i></button>
                                <button class="btn btn-success"><i class="fas fa-print"></i></button>
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
/*
$(document).ready(function() {
    $('select').on('change', '#applicant_id', function() {
        var selectedId = $(this).val();
        alert(selectedId);
        $.ajax({
            url: '/admin/payments/' + selectedId,
            type: 'GET',
            success: function(response) {
                console.log(response);
                $('#amount').val(response.data
                    .amount
                ); // Replace 'fieldToDisplay' with the actual field from your model
            },
        });

    });
});
*/

const getvalue = () => {
    var selectedId = $('#applicant_id').val();
    $.ajax({
        type: "GET",
        url: "/admin/payments/" + selectedId,
        success: function(response) {
            $('#amount').val(response.data.amount);
            $('#capital').val(response.data.shared_cap);
            $('#plan_id').val(response.data.plan_id);
            $('#borrower_id').val(response.data.borrower_id);
            $('#loan_id').val(selectedId);
        }
    })
}
</script>
@include('backend.payment.add_payments')
@endsection