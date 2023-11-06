<div class="modal fade" id="loans" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">New Loan Application</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('add.application') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-12">
                            <input type="hidden" name="ref_no" value="{{ rand(0, 9999999) }}">
                            <label for="">Borrower</label>
                            <select name="emp_id" class="form-control">
                                <option value="" disabled selected>Select Borrower</option>
                                @foreach($borrowers as $borrower)
                                @php
                                $yos = $borrower->year_service;
                                if($yos == 1){
                                $yos = '1-4 Years';
                                }elseif($yos == 2){
                                $yos = '5-9 Years';
                                }elseif($yos == 3){
                                $yos = '10-Up Years';
                                }
                                @endphp
                                <option value="{{ $borrower->emp_id }}">Borrower: {{ $borrower->name }} |
                                    Shared Capital: {{ $borrower->shared_capital }} | Years of Service:
                                    {{ $yos }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Loan Plan</label>
                            <select name="plan_id" class="form-control">
                                <option value="" disabled selected>Select Plan</option>
                                @foreach($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->plan_loan }} [
                                    {{ $plan->interest_percentage }}%, {{ $plan->penalty_rate }} ]</option>
                                @endforeach
                            </select>
                            <small>Plan [ interest%,penalty% ]</small>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="">Amount</label>
                            <input type="number" name="amount" class="form-control">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="">Purpose</label>
                            <textarea name="purpose" rows="3" class="form-control"></textarea>
                            <input type="hidden" name="status" value="0">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add Application</button>
                        <button data-dismiss="modal" class="btn btn-danger">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>