@extends('auth.layouts')
@section('content')
    <div class="container-xxl hero-header">
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-8">
                        <div class="card stroke-white bg-primary-gradient text-dark">
                            <div class="card-header d-flex justify-content-between align-items-center stroke-white">Add Image</div>
                            <div class="card-body">
                                <form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="mb-3 row">
                                            <label for="title" class="col-md-4 col-form-label text-md-end text-start">
                                                Title
                                            </label>
                                            <div class="col-md-6">
                                                <input type="text" class="form-control" id="title" name="title">
                                                @error('title')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="description" class="col-md-4 col-form-label text-md-end text-start">
                                                Description
                                            </label>
                                            <div class="col-md-6">
                                                <textarea class="form-control" id="description" rows="5" name="description"></textarea>
                                                @error('description')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">
                                                File input
                                            </label>
                                            <div class="col-md-6">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="input-file" name="picture">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <div class="col-md-4 offset-md-4">
                                                <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                            </div>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection