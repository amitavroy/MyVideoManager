@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row py-5">
        <div class="col-md-11 mx-auto">
            <router-view></router-view>
        </div>
    </div>
</div>
@endsection
