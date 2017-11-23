@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <p>
            <h3><i class="fa fa-flag" aria-hidden="true"></i> <strong>{{$page->title}}</strong></h3></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            {!!$page->body!!}
        </div>
    </div>
@endsection
