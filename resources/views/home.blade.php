@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <span class="title">testbox.io</span>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!<br>
                    <modal></modal>
                </div>
            </div>
            <emailnotifications></emailnotifications>
            <div class="row">
                <div class="col-md-6">
                    <radio></radio>
                </div>
                <div class="col-md-6">
                    <radio-inline></radio-inline>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
