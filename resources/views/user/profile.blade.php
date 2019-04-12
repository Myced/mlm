@extends('layouts.user')

@section('title')
    {{ __("Profile") }}
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4">
        <!-- START card-->
            <div class="row">
                <div class="col-md-12">
                    <div class="card animated zoomIn">
                        <div class="half-float ie-fix-flex">
                            <img class="img-fluid" src="/userfiles/img/bg3.jpg" alt="">
                            <div class="half-float-bottom">
                                <img class="img-thumbnail circle thumb128"
                                    src="{{ $user->userData->avatar }}" alt="Image">
                            </div>
                        </div>
                        <div class="card-body text-center">
                            <h3 class="m-0">{{ $user->name }}</h3>
                            <p class="text-muted">{{ $user->email }}</p>
                            <p>
                                {{ $user->userData->address }}
                            </p>
                        </div>

                        <div class="card-body text-center bg-gray-dark">
                            <div class="row">
                                <div class="col-6">
                                    <h3 class="m-0">
                                        @if(empty($user->orders))
                                            {{ __("0") }}
                                        @else
                                            {{ $user->orders->count() }}
                                        @endif
                                    </h3>
                                    <p class="m-0">Orders</p>
                                </div>

                                <div class="col-6">
                                    <h3 class="m-0">{{ $user->userData->getChildrenCount() }}</h3>
                                    <p class="m-0">Recruits</p>
                                </div>

                                <!-- <div class="col-4">
                                    <h3 class="m-0">500</h3>
                                    <p class="m-0">Following</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 animated bounce">

                    <a href="{{ route('profile.edit') }}"
                        class="btn btn-primary btn-block"
                        data-toggle="tooltip" data-placement="top"
                        title="Edit Profile"
                        data-original-title="Edit Profile">
                        <i class="fa fa-pencil-alt"></i>
                        <strong>Edit Profile</strong>
                    </a>
                </div>
            </div>
            <br>
        <!-- END card-->
        </div>

        <!-- //next column -->
        <div class="col-md-6">
            <div class="card animated slideInUp">
                <div class="card-body">
                    <table class="table table-striped">
                        <tr>
                            <td>First Name</td>
                            <th>{{ $user->userData->first_name }}</th>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <th>{{ $user->userData->last_name }}</th>
                        </tr>
                        <tr>
                            <th>Recruited By</th>
                            <th>{{ $user->userData->recruiterName() }}</th>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <th>{{ $user->userData->email }}</th>
                        </tr>
                        <tr>
                            <td>Telephone</td>
                            <th>{{ $user->userData->tel }}</th>
                        </tr>
                        <tr>
                            <td>Region</td>
                            <th>{{ $user->userData->region->name }}</th>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <th>{{ $user->userData->address }}</th>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <th>{{ $user->userData->dob }}</th>
                        </tr>
                        <tr>
                            <td>
                                Payout Network

                                 <a href="javascript:void(0)" style="margin-left: 15px;"
                                    title="Tip: Payout network"
                                     data-container="body"
                                     data-toggle="popover"
                                     data-placement="top"
                                     data-content="This indicates the network of your payout number.
                                        It can either be MTN or Orange. This information will help us fasciliate the
                                        payment of commissions."
                                        >
                                     <i class="fa fa-question-circle fa-2x text-info"></i>
                                 </a>
                            </td>
                            <th>{{ $user->userData->payout_network}}</th>
                        </tr>
                        <tr>
                            <td>Payout Number</td>
                            <th>{{ $user->userData->payout_number }}</th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- end of column -->

    </div>
@endsection
