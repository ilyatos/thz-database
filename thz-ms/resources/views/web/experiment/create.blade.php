<?php /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\System[] $systems */ ?>

@extends('web.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('experiments.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-2">
                                <span style="font-size: 1.3em">Experiment</span>
                            </div>
                            <div class="form-group row">
                                <label for="input_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input id="input_name" class="form-control" name="name"
                                           type="text" placeholder="Glycerol Dehydration #1" value="{{ old('name') }}" required>
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
                                <label for="select_system" class="col-sm-3 col-form-label">System</label>
                                <div class="col-sm-5">
                                    <select id="select_system" class="custom-select" name="system_id" required>
                                        <option value="" disabled>select system</option>
                                        @foreach($systems as $system)
                                            <option value="{{ $system->id }}" {{ $system->id === $predefinedSystemId ? 'selected' : ''}}>
                                                {{ $system->name_with_type }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <a class="btn btn-outline-primary" href="{{ route('systems.create') }}">
                                    or create new
                                </a>
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
