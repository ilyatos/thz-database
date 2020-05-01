<?php
/**
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Category[] $categories
 * @var \Illuminate\Database\Eloquent\Collection|\App\Models\Spectrum[] $spectra
 */
?>

@extends('web.app')

@section('content')
<div class="container">
    <div class="row justify-content-start">
        <div class="col-auto">
            <div class="card" style="width: 8rem;">
                <div class="card-header px-3 py-2">Categories</div>
                <div class="list-group list-group-flush scrollable">
                    @foreach($categories as $category)
                        <a href="{{ route('category.spectra', ['category' => $category->id]) }}"
                           class="list-group-item list-group-item-action py-2
                                    {{ ($cat = request()->route('category')) && $cat->id === $category->id ? 'active' : '' }}">
                            {{ $category->title }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-10 pl-0">
            <div class="card">
                <div class="card-body">
                    <div class="row scrollable">
                        @if(isset($spectra))
                            @foreach($spectra as $spectrum)
                                <div class="col-3 m-0 p-2">
                                    <a href="{{ route('spectra.show', ['spectrum' => $spectrum->id]) }}" class="custom-card">
                                        <div class="card card-hover">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $spectrum->title }}</h5>
                                                <p class="card-text">
                                                    <b>State:</b> {{ $spectrum->state }}<br>
                                                    <b>Mode:</b> {{ $spectrum->mode }}<br>
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            Select category! Simple.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
