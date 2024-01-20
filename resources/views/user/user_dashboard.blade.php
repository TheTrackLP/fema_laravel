<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js" rel="stylesheet">
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" rel="stylesheet">
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body>

    <style>
    p {
        margin: 1;
    }

    body {
        background-image: linear-gradient(to bottom right, #00AFB9, #FED9B7);
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    }
    </style>

    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column p-3 py-5">
                    <span class="font-weight-bold">{{$data->name }}</span>
                    <span class="font-weight-bold">{{$data->borrower_id}}</span>
                    <span class="text-black-50"></span><span>Shared Capital:
                        <b>{{ number_format($data->shared_capital, 2) }}</b></span>
                    @if($data->status == 0)
                    <h4>Status: <span class="badge bg-warning text-dark">Pending</span></h4>
                    @elseif($data->status == 1)
                    <h4>Status: <span class="badge bg-success">Member</span></h4>
                    @endif
                    <hr>
                    <a href="{{ route('user.logout') }}" class="btn btn-danger mt-3">LOGOUT <i
                            class="fas fa-power-off"></i></a>
                </div>
            </div>
            <div class="col-md-9">
                <br>
                <button class="btn btn-primary col-md-2 float-right mt-5" data-bs-toggle="modal"
                    data-bs-target="#uni_modal" type="button" id="new_application"><i class="fa fa-plus"></i> Apply
                    New
                    Loan</button>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Account Details</h4>
                </div>
                <table class="table table-bordered">
                    <thead class="table-info">
                        <tr>
                            <th scope="col" class="text-center">#</th>
                            <th scope="col" class="text-center">Type of Loan</th>
                            <th scope="col" class="text-center">Next Payment Details</th>
                            <th scope="col" class="text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $i=1;
                        @endphp
                        @if($my_loans)
                        @foreach($my_loans as $loans)
                        <tr>
                            <td class="text-center">
                                {{ $i++ }}
                            </td>
                            <td>
                                <p><b>{{ $loans->plan_loan}}</b></p>
                                <p>Remaining Amount: <b>{{ $loans->amount }}</b></p>
                            </td>
                            <td>
                                next Payments Details
                            </td>
                            <td class="text-center">
                                @if($loans->status == 0)
                                <span class="badge rounded-pill bg-warning text-dark">For Approval</span>
                                @elseif($loans->status == 1)
                                <span class="badge rounded-pill bg-primary">Approved</span>
                                @elseif($loans->status == 2)
                                <span class="badge rounded-pill bg-info">Released</span>
                                @elseif($loans->status == 3)
                                <span class="badge rounded-pill bg-success">Completed</span>
                                @elseif($loans->status == 4)
                                <span class="badge rounded-pill bg-danger">Denied</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td>
                                No Loans Yet
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>