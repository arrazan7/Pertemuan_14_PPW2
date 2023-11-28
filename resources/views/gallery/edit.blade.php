@extends('auth.layouts')
@section('content')
<div class="container-xxl hero-header">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="container text-dark">
                <form action="{{ route('gallery.update', $gallery) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $title }}">
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Description</label>
                        <div class="col-md-6">
                            <input type="desrciption" class="form-control @error('description') is-invalid @enderror" id="desrciption" name="description" value="{{ $description }}">
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('desceiption') }}</span>
                                @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                    <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">Recent Picture</label>
                            <div class="col-md-6">
                                <img src="{{ asset('storage/posts_image/'.$gallery->picture) }}" alt="" height="100px">
                            </div>

                    </div>

                    <div class="mb-3 row">
                            <label for="input-file" class="col-md-4 col-form-label text-md-end text-start">File input</label>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="input-file" name="picture">
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="mb-3 row g-2">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Save">
                        <a href="/gallery" class="col-md-3 offset-md-5 btn btn-danger"> Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection