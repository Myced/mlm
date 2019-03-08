@extends("layouts.user")

@section('title')
    Change Password
@endsection

@section('content')
<div class="row">
    <div class="col-xl-6">
    <!-- START card-->
        <div class="card">
            <div class="card-body">
                <h3 class="page-header">Please Fill all fields</h3>
                <form action="{{ route('user.password.update') }}"
                    method="post" id="form">
                    @csrf

                    <div class="form-group">
                        <label>Current Password</label>
                        <input class="form-control" type="password"
                        name="current_password"
                        placeholder="Enter your current Password" required>
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input class="form-control" type="password"
                        name="new_password" id="password"
                        placeholder="Enter new password" required>
                    </div>
                    <div class="form-group">
                        <label>Repeat New Password</label>
                        <input class="form-control" type="password"
                        name="repeat_password" id="rpassword"
                        placeholder="Repeat new password" required>
                    </div>

                    <button class="btn  btn-secondary" type="submit"
                    id="submit">
                        Update Password
                    </button>
                </form>
            </div>
        </div>
    <!-- END card-->
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#form").submit(function(e){
            //grab the password
            var password = $("#password").val();
            var rpassword = $("#rpassword").val();

            if(password !== rpassword)
            {
                showNotification('danger', "You new password and the repeated password do not match");

                e.preventDefault();
            }
        })
    });
</script>
@endsection
