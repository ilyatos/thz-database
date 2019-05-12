@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-auto">
            <div class="card" style="width: 8rem;">
                <div class="card-header px-3">Categories</div>
                <div class="card-body pt-1 px-3">
                    <ul class="list-group scrollable-ul">
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                        <li class="list-unstyled mb-1">Amin</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-10">
                <div class="card">
                    <div class="card-body">
                        Spectrum data + plot
                    </div>
                </div>
        </div>
{{--        <div class="col col-md-2">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">Workspaces</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    You are logged in!--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
</div>
@endsection
