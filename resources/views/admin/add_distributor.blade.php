@extends('layouts.admin')

@section('title')
    {{ __("Add Distributor") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-gears"></i>
            ADD DISTRIBUTOR
            <br>
            <small> Register a new Distributor </small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full">

    <!-- All Orders Title -->
    <div class="block-title">

        <h2><strong>Create a new Distributor</strong></h2>
    </div>

    <form class="form-horizontal" action="{{ route('distributor.store') }}" method="post"
        id="form" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        First Name:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="first_name" value=""
                            class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Last Name:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="last_name" value=""
                            class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Telephone:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="tel" value=""
                            class="form-control" required>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-md-3 control-label" for="product-name">
                        Email
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="email" name="email" value=""
                            class="form-control" required id="email">
                            <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Region
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <select class="select-chosen" name="region">
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">
                                    {{ $region->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Address:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="address" value=""
                            class="form-control" required>
                    </div>
                </div>

                <h3 class="page-header">Account Information</h3>

                <div class="form-group">
                    <label class="col-md-3 control-label" >
                        Email:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="address" value=""
                            class="form-control"  disabled id="email_acc">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        password:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="password" name="password" value=""
                            class="form-control" required id="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Repeat Password:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="password" name="password_confirmation" value=""
                            class="form-control" required id="rpassword">
                            <span class="help-block"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">

                    </label>
                    <div class="col-md-9">
                        <button type="submit" name="button"
                        title="Save Changes" class="btn btn-info">
                            Create Distributor
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Picture:
                    </label>
                    <div class="col-md-9">
                        <input type="file" name="avatar" value=""
                            class="form-control" id="image">

                            <br>
                            <img src="{{ \App\User::DEFAULT_AVATAR }}" alt=""
                                width="100px" height="100px" id="img">
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>
@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function(){

        function readURL(input, target) {

            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                target.attr('src', e.target.result);

                target.hide();
                target.fadeIn(650);

                }

                reader.readAsDataURL(input.files[0]);
            }
        }


        $("#image").change(function() {
            readURL(this, $("#img"));
        });


        //handle events in the form
        $("#email").focusout(function(){
            var email = $(this).val();

            verifyEmail(email)
        });

        $("#rpassword").focusout(function(){
            var rpassword = $(this).val();
            var password = $("#password").val();

            if(rpassword !== password )
            {
                var message = "Passwords do not match";

                $(this).next().text(message);

                $(this).parent().parent().addClass('has-error');
            }
            else {
                if($(this).parent().parent().hasClass('has-error'))
                {
                    $(this).parent().parent().removeClass('has-error');
                }

                $(this).next().text('');
            }
        });

        //listen to form submission event()
        $("#form").submit(function(e){
            $email = $("#email");
            $rpassword = $("#rpassword");

            if($email.parent().parent().hasClass('has-error'))
            {
                alert("Your form still contian some errors");
                e.preventDefault();
            }

            else if($rpassword.parent().parent().hasClass('has-error'))
            {
                alert("Your form still contian some errors");
                e.preventDefault();
            }
        });

        function verifyEmail(email)
        {
            //make a post request
            if(email != '')
            {
                $.ajax({
                    url : '/api/verify/email/' + email,
                    method : 'get',
                    dataType : 'text',
                    error : function(error)
                    {
                        // console.log(error.responseText);
                        alert('Could not check the email address. Check internet connection');

                    },
                    success : function(data)
                    {
                        $email = $("#email");
                        console.log(data);

                        var response = $.parseJSON(data);

                        if(response.status)
                        {
                            if($email.parent().parent().hasClass('has-error'))
                            {
                                $email.parent().parent().removeClass('has-error');
                            }

                            $email.next().text('');

                            $("#email_acc").val(email);
                        }
                        else {
                            //email has been used
                            var message = "Email has already been used";

                            $email.parent().parent().addClass('has-error');
                            $email.next().text(message);

                        }

                    }
                });
                //end of ajax request
            }
        }


    })
</script>
@endsection
