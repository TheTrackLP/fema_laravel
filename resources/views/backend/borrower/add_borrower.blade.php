<div class="modal fade" id="borrowers" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Borrower</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('borrowers.add') }}" method="post">
                    @csrf
                    <div class="form-row">
                        <input type="hidden" name="status" value="0">
                        <div class="form-group">
                            <label for="">Employee ID</label>
                            <input type="text" name="emp_id" class="form-control" placeholder="Employee ID...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Firstname</label>
                            <input type="text" name="firstname" class="form-control" placeholder="Firstname...">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Middlename</label>
                            <input type="text" name="middlename" class="form-control" placeholder="Middlename...">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Lastname</label>
                            <input type="text" name="lastname" class="form-control" placeholder="Lastname...">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Contact #</label>
                            <input type="text" class="form-control" name="contact_no" placeholder="Contact #">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Date of Birth</label>
                            <input type="date" class="form-control" name="date_birth">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Years of Service</label>
                            <select name="year_service" class="form-control">
                                <option value="0" disable>How long is your Service?</option>
                                <option value="1">1-4 Years</option>
                                <option value="2">5-9 Years</option>
                                <option value="3">10-Up Years</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="">Department</label>
                            <select name="department" class="form-control">
                                <option value="0" disable>Select Department</option>
                                @foreach($depts as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="">Shared Capital</label>
                            <input type="text" class="form-control" name="shared_capital" placeholder="0000">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <textarea class="form-control" name="address" rows="5"
                            placeholder="Village/Street/Brgy/City/Province"></textarea>
                    </div>
                    <button type="button" data-dismiss="modal" class="btn btn-danger float-right">Close</button>
                    <button type="submit" class="btn btn-primary float-right">Add Borrower</button>
                </form>
            </div>
        </div>
    </div>
</div>