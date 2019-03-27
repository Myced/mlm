@extends('layouts.admin')

@section('title')
    {{ __("Edit Distributor") }}
@endsection

@section('content')
<!-- eCommerce Dashboard Header -->
<div class="content-header">
    <div class="header-section">
        <h1>
            <i class="fa fa-gears"></i>
            EDIT DISTRIBUTOR
            <br>
            <small> {{$user->name }}</small>
        </h1>
    </div>
</div>
<!-- END eCommerce Dashboard Header -->

<!-- Dummy Content -->
@include('admin_includes.notification')

<div class="block full">

    <!-- All Orders Title -->
    <div class="block-title">

        <h2> Edit Distributor  <strong>({{ $user->name }})</strong></h2>
    </div>

    <form class="form-horizontal" action="{{ route('distributor.update', ['id' => $user->id]) }}" method="post"
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
                        <input type="text" name="first_name"
                            value="{{ $user->userData->first_name }}"
                            class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Last Name:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="last_name"
                            value="{{ $user->userData->last_name }}"
                            class="form-control" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Telephone:
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="text" name="tel"
                            value="{{ $user->userData->tel }}"
                            class="form-control" required>
                    </div>
                </div>

                <div class="form-group ">
                    <label class="col-md-3 control-label" for="product-name">
                        Email
                        <span class="required">*</span>
                    </label>
                    <div class="col-md-9">
                        <input type="email" name="email"
                            value="{{ $user->userData->email }}"
                            class="form-control" required id="email" disabled>
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
                                <option value="{{ $region->id }}"
                                    {{ $region->id == $user->userData->region_id ? 'selected' : '' }}>
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
                        <input type="text" name="address"
                            value="{{ $user->userData->address }}"
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
                        <input type="text" name="address"
                            value="{{ $user->email }}"
                            class="form-control"  disabled id="email_acc">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        password:
                    </label>
                    <div class="col-md-9">
                        <input type="password" name="password" value=""
                            class="form-control"  id="password">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="product-name">
                        Repeat Password:
                    </label>
                    <div class="col-md-9">
                        <input type="password" name="password_confirmation" value=""
                            class="form-control" id="rpassword">
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
                            <img src="{{ $user->userData->avatar }}" alt=""
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

            else if($rpassword.parent().parent().hasClass('has-error'))
            {
                alert("Your form still contian some errors");
                e.preventDefault();
            }
        });




    })
</script>
@endsection
