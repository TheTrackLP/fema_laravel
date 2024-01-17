@extends('admin.header')
@section('admin')

<div class="card shadow">
    <div class="card-body">
        <div class="container-fluid">
            <div class="table-responsive">
                <div class="card-header">
                    <b class="card-title">Reports</b><br>
                    <label for="" class="mt-2">Month</label>
                    <div class="col-sm-3">
                        <input type="month" name="month" id="month" value="{{ date('Y-m') }}" class="form-control">
                    </div>
                </div>
                <table class="table table-bordered" id="">
                    <thead class="table-info">
                        <tr>
                            <th class="text-center align-middle" rowspan="2">#</th>
                            <th class="text-center align-middle" rowspan="2">asd</th>
                            @foreach($plans as $plan)
                            <th class="text-center align-middle" colspan="2">{{ $plan->plan_loan }}</th>
                            @endforeach
                            <th class="text-center align-middle" rowspan="2">Paid-In</th>
                            <th class="text-center align-middle" rowspan="2">Penalty</th>
                            <th class="text-center align-middle" rowspan="2">Total</th>
                        </tr>
                        <tr>
                            @foreach($plans as $plan)
                            <th class="text-center align-middle">PRIN</th>
                            <th class="text-center align-middle">INT</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i = 1;
                        @endphp
                        @foreach($borrowers as $borrower)
                        <tr>
                            <td class="text-center">
                                <p>{{ $i++ }}</p>
                            </td>
                            <td>
                                <p>{{ $borrower->name }}</p>
                            </td>
                            @for($j = 0; $j < $total_plans; $j++) <td>
                                prin
                                </td>
                                <td>
                                    Int
                                </td>
                                @endfor
                                <td>
                                    Paid-In
                                </td>
                                <td>
                                    Penalty
                                </td>
                                <td>
                                    TOtal
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