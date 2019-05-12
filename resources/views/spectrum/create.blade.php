<?php /** @var Collection|\App\Category[] $categories*/ ?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('spectra.store') }}">
                            @csrf
                            <div class="mb-1">
                                <span style="font-size: 1.3em">System</span>
                            </div>
                            <div class="form-group row">
                                <label for="input_system" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <input id="input_system" class="form-control" name="system"
                                           type="text" placeholder="TDS" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="select_mode" class="col-sm-3 col-form-label">Measurement mode</label>
                                <div class="col-sm-9">
                                    <select id="select_mode" class="custom-select" name="mode" required>
                                        <option value="transmission" selected>Transmission</option>
                                        <option value="reflection">Reflection</option>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-1">
                                <span style="font-size: 1.3em">Environment</span>
                            </div>
                            <div class="form-group row">
                                <label for="input_temp" class="col-sm-3 col-form-label">Temperature</label>
                                <div class="col-sm-9">
                                    <input id="input_temp" class="form-control" name="temp"
                                           type="number" placeholder="293" required>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-1">
                                <span style="font-size: 1.3em">Sample</span>
                            </div>
                            <div class="form-group row">
                                <label for="input_title" class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input id="input_title" class="form-control" name="title"
                                           type="text" placeholder="Rat skin" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="select_category" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-4">
                                    <select id="select_category" class="custom-select" name="category_id" required>
                                        <option selected>Select category</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <label for="input_category" class="col-auto pl-0 col-form-label">or create</label>
                                <input id="input_category" class="form-control col-sm-3"
                                       name="new_category" type="text" placeholder="Zinc">
                            </div>
                            <div class="form-group row">
                                <label for="select_state" class="col-sm-3 col-form-label">State</label>
                                <div class="col-sm-9">
                                    <select id="select_state" class="custom-select" name="state" required>
                                        <option selected>Select state</option>
                                        <option value="solid">Solid</option>
                                        <option value="liquid">Liquid</option>
                                        <option value="gas">Gas</option>
                                        <option value="plasma">Plasma</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="input_spectrum" class="col-sm-3 col-form-label">Spectrum data</label>
                                <div class="col-sm-9">
                                    <div class="custom-file">
                                        <input id="input_spectrum" class="custom-file-input" name="spectrum" type="file" required>
                                        <label for="input_spectrum" class="custom-file-label">Choose file</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
