
<form class="form-horizontal" id="form-user" action="User/insert_user" method="POST">
    <div class="box-body">
        <div class="form-group">
            <label for="username" class="col-sm-2 control-label">Username <span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username">
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Password <span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <label for="password_confirm" class="col-sm-2 control-label"> Status <span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="status" id="status" placeholder="Status Confirm">
            </div>
        </div>
    </div><!-- /.box-body -->
    <div class="box-footer">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">				  
            <button type="button" class="btn btn-default" id="btn-cancel">asdfasdfaCancel</button>
            <button type="button" class="btn btn-action" id="btn-submit">Save</button>
        </div><!-- /.box-footer -->
    </div>
</form>
<script src="<?php echo base_url()."assets/js/user.js"?>"></script>
<script>
 $(document).ready(function() {
    global.cek();
 });
</script>
