@extends('layouts.user')

@section('title')
    {{ __("Edit Profile") }}
@endsection

@section('styles')
<!-- SELECT2-->
<link rel="stylesheet" href="/userfiles/vendor/select2/dist/css/select2.css">
<link rel="stylesheet" href="/userfiles/vendor/%40ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.css">
<style media="screen">
    label
    {
        font-weight: bold;
    }
</style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('user.profile') }}"
                class="btn btn-info animated slideInRight">
                <i class="fa fa-caret-left"></i>
                <strong>Back to Profile</strong>
            </a>
        </div>
    </div>

    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3>Edit Profile Information</h3>
                </div>

                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input class="form-control" type="text"
                                        name="first_name" required
                                        placeholder="First Name" value="{{ $user->first_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text"
                                        name="last_name"
                                        placeholder="First Name" value="{{ $user->last_name }}">
                                </div>

                                <div class="form-group">
                                    <label>Region</label>
                                    <select class="form-control "
                                        name="region" id="select2-1">
                                        @foreach(\App\Models\Region::all() as $region)
                                            <option value="{{ $region->id }}"
                                                @if($region->id == $user->region_id) {{ __("selected") }} @endif
                                                >
                                                {{ $region->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Address:</label>
                                    <input class="form-control" type="text"
                                        name="address" required
                                        placeholder="Address" value="{{ $user->address }}">
                                </div>

                                <div class="form-group">
                                    <label>Email:</label>
                                    <input class="form-control" type="text"
                                        name="email" disabled
                                        placeholder="Email" value="{{ $user->email }}">
                                    <span class="text-warning">You cannot edit your email address. It is unique</span>
                                </div>

                                <div class="form-group">
                                    <label>Telephone:</label>
                                    <input class="form-control" type="text"
                                        name="tel" required
                                        placeholder="E.g. 679 963 236" value="{{ $user->tel }}">
                                </div>

                                <div class="form-group">
                                    <label>Date of Birth:</label>
                                    <input class="form-control" type="text"
                                        name="dob" required
                                        placeholder="E.g. 22/12/1990" value="{{ $user->dob }}">
                                </div>

                                <div class="form-group">
                                    <button type="submit"
                                        class="btn btn-primary">
                                        <strong>Update Profile</strong>
                                    </button>
                                </div>

                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Profile Picture:</label>
                                    <input type="file" name="avatar" value=""
                                        class="form-control" id="img">

                                        <br>
                                        <br>

                                        <img src="{{ $user->avatar }}" alt=""
                                        width="150px" height="150px" id="image">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="/userfiles/vendor/select2/dist/js/select2.full.js"></script>
<script type="text/javascript">
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#image').attr('src', e.target.result);

            $('#image').hide();
            $('#image').fadeIn(650);

            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#img").change(function() {
        readURL(this);
    });
</script>
@endsection
