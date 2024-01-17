<div class="modal fade" tabindex="-1" id="EditBorrower" role="document">
    <div class="modal-dialog modal-lg" role="dialog">
        <form action="{{ route('update.borrower') }}" method="post">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-gray-900">
                        Edit Borrower
                    </h3>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="hidden" name="id" id="id">
                                <label for="" class="text-gray-900">Employee ID:</label>
                                <input type="text" name="employee_id" id="emp_id" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Department</label>
                                <select name="department" id="dept" class="form-control">
                                    <option value="" disabled>Select Department</option>
                                    @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->departments }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Firstname:</label>
                                <input type="text" name="firstname" id="firstname" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Middlename:</label>
                                <input type="text" name="middlename" id="middlename" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Lastname:</label>
                                <input type="text" name="lastname" id="lastname" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Mobile Number</label>
                                <input type="text" name="contact_no" id="contact" class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Years of Service</label>
                                <select name="year_service" id="yservice" class="form-control">
                                    <option value="" disabled selected>Select Year of Serive</option>
                                    <option value="1">1-4 Years</option>
                                    <option value="2">5-9 Years</option>
                                    <option value="3">10-Up Years</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="" class="text-gray-900">Date of Birth:</label>
                                <input type="date" name="date_birth" id="birth" class="form-control">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="" class="text-gray-900">Address</label>
                                <textarea name="address" id="add" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="" class="text-gray-900">Shared Capital</label>
                                <input type="number" name="shared_capital" id="capital" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="" class="text-gray-900">Status:</label>
                                <select name="status" id="stat" class="form-control">
                                    <option value="" disabled selected>Select Status</option>
                                    <option value="1">New</option>
                                    <option value="2">Exist</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update Borrower</button>
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
    </div>
</div>
</form>