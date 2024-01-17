<form action="{{ route('store.payment') }}" method="post">
    @csrf
    <div class="modal fade" tabindex="-1" id="AddPayments" role="document">
        <div class="modal-dialog modal-lg" role="dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Add New Payment</h3>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-8">
                                <label for="">Name | Plan</label>
                                <select name="applicant_id" id="applicant_id" class="form-control select2"
                                    onchange="getvalue()">
                                    <option value="" disabled selected></option>
                                    @foreach($applicants as $applicant)
                                    <option value="{{ $applicant->id }}">{{ $applicant->fullname }} |
                                        {{ $applicant->plan_loan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <input type="hidden" name="plan_id" id="plan_id">
                            <input type="hidden" name="borrower_id" id="borrower_id">
                            <input type="hidden" name="loan_id" id="loan_id">
                            <div class="col-md-4">
                                <label for="">Remaining Balance:</label>
                                <input type="text" name="amount" id="amount" class="form-control" readonly>
                            </div>
                            <div class="col-md-4">
                                <label for="">Capital Share</label>
                                <input type="text" name="capital" id="capital" class="form-control" readonly>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <label for="">OR#</label>
                                <input type="number" name="of_re" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Principal</label>
                                        <input type="text" name="paid" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Paid-in Capital</label>
                                        <input type="number" name="capital" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="">Interest</label>
                                        <input type="number" name="interest" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Penalty</label>
                                        <input type="number" name="pnalty_amount" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-3">
                                    <label for="">Amount: </label>
                                    <p></p>
                                </div>
                                <div class="col-md-3">
                                    <label for="">Penalty: </label>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save</button>
                    <button class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
$('.select2').select2({
    placeholder: "Please select here",
    dropdownParent: $('#AddPayments'),
    width: "100%"
});
</script>