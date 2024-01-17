<form action="{{ route('update.staff') }}" method="post">
    <div class="container-fluid">
        <div class="modal fade" tabindex="-1" id="EditStaff" role="document">
            <div class="modal-dialog modal-sm" role="dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Edit</h3>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="text" name="current_paswword" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="text" name="new_password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Confirm New Password</label>
                                <input type="text" name="confirm_paswword" id="password" class="form-control">
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
    </div>
</form>