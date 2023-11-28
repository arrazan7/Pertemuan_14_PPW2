@extends('auth.layouts')
@section('content')
<div class="container-xxl hero-header">
    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="row justify-content-center mt-5">
                <div class="col-md-8">
                    <div class="card stroke-white bg-primary-gradient text-dark">
                        <div class="card-header d-flex justify-content-between align-items-center">Dashboard
                            <a href="{{ route('gallery.create') }}" class="btn btn-primary">Add Image</a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @if(count($galleries)>0)
                                    @foreach ($galleries as $gallery)
                                        <div class="col-sm-2">
                                            <div class="image-container">
                                                <div>
                                                    <a class="example-image-link" href="{{asset('storage/posts_image/'.$gallery->picture )}}" data-lightbox="roadtrip" data-title="{{$gallery->description}}">
                                                        <img class="example-image img-fluid mb-2" src="{{asset('storage/posts_image/'.$gallery->picture )}}" alt="image-1" />
                                                    </a>
                                                    <div class="col gap-1 image-actions">
                                                        <form action="{{ route('gallery.edit', $gallery) }}" method="GET">
                                                            @csrf
                                                            <button class="btn btn-sm btn-dark">Edit</button>
                                                        </form>
                                                        <form action="{{ route('gallery.destroy', $gallery) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-sm btn-danger" onClick="return confirm('Apakah Anda yakin ingin dihapus?')">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <h3>Tidak ada data.</h3>
                                @endif
                                <div class="d-flex">
                                    {{ $galleries->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
