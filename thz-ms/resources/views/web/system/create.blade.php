<?php /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\SystemType[] $types */ ?>

@extends('web.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('systems.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <span style="font-size: 1.3em">System</span>
                            </div>

                            <div class="form-group row">
                                <label for="input_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input id="input_name" class="form-control" name="name"
                                           type="text" placeholder="Death Star" value="{{ old('name') }}" required>
                                </div>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="input_description" class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea id="input_description" class="form-control" name="description"
                                              placeholder="Important information is...">{{ $id = old('description') }}</textarea>
                                </div>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="input_manufacturer" class="col-sm-3 col-form-label">Manufacturer</label>
                                <div class="col-sm-9">
                                    <input id="input_manufacturer" class="form-control" name="manufacturer"
                                           type="text" placeholder="Empire Ltd." value="{{ old('manufacturer') }}" required>
                                </div>
                            </div>
                            @error('manufacturer')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="select_type" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-3">
                                    <select id="select_type" class="custom-select" name="type_id" required>
                                        <option value="" disabled>select type</option>
                                        @foreach($types as $type)
                                            <option value="{{ $type->id }}" {{ (int) old('type_id') === $type->id ? 'selected' : ''}}>
                                                {{ $type->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @error('system_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
