<form action="{{ route('update.actives') }}" method="post">
    @csrf
    <div class="modal fade" tabindex="-1" id="EditList" role="document">
        <div class="modal-dialog modal-lg" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">
                        Create New Application
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" id="id" name="id">
                            <input type="hidden" name="ref_no" id="ref_no">
                            <label for="">Borrower</label>
                            <select name="borrower_id" id="borrower_id" class="form-control select2">
                                <option value="" disabled>Select Borrower</option>
                                @foreach($borrowers as $borrower)
                                <option value="{{ $borrower->id }}">Borrower: {{ $borrower->firstname }} |
                                    Shared
                                    Capital:
                                    {{ $borrower->shared_capital }} |
                                    Years Of Service
                                    @if($borrower->year_service == 1)
                                    1-4 Years
                                    @elseif($borrower->year_service == 2)
                                    5-9 Years
                                    @elseif($borrower->year_service == 3)
                                    10-Up Years
                                    @endif
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Shared Capital</label>
                            <input type="number" name="shared_cap" id="shared_cap" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Years of Service</label>
                            <select name="yservice" id="yservice" class="form-control select2">
                                <option value="" disabled></option>
                                <option value="1">1-4 Years</option>
                                <option value="2">5-9 Years</option>
                                <option value="3">10-Up Years</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Loan Plan</label>
                            <select name="plan_id" id="plan_id" class="form-control select2">
                                <option value="" disabled></option>
                                @foreach($plans as $plan)
                                <option value="{{ $plan->id }}">{{ $plan->plan_loan }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="">Loan Amount</label>
                            <input type="number" name="amount" id="amount" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Purpose</label>
                            <textarea name="purpose" cols="30" rows="5" id="purpose" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="0">For Approval</option>
                                <option value="1">Approved</option>
                                <option value="2">Released</option>
                                <option value="4">Denied</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success px-5">Save</button>
                    <button type="button" data-bs-dismiss="modal" class="btn btn-danger px-5">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>