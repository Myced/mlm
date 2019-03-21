@extends('layouts.user')

@section("title")
    Notifications - All Your notifications
@endsection

@section('content')

<div class="row">
    <div class="col-md-8 offset-md-2">

        @if($notifications->count() == 0)
            <div class="card notification">
                <div class="card-body">
                    <h2>
                        <strong class="text-info">
                            You do not have any notifications
                        </strong>
                    </h2>
                </div>
            </div>
        @else
            <!-- //show all notifications here -->
            @foreach($notifications as $notification)
            <div class="card notification">

                <div class="card-header bg-secondary">
                    <h4>
                        <i class="{{ $notification->data['icon'] }} text-{{ $notification->data['class'] }}"></i>
                        {{ $notification->data['heading'] }}
                        - <small>
                            {{ $notification->created_at->diffForHumans() }}
                        </small>

                        @if($notification->unread())
                        <div class="badge badge-danger">
                            NEW
                        </div>
                        @endif
                    </h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div style="color: #333; font-size: 16px;" class="text-justify">
                                {!! $notification->data['message'] !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php $notification->markAsRead() ?>

            @endforeach
        @endif

    </div>
</div>
@endsection
