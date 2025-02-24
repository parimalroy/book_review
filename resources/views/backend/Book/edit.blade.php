@extends('backend.account.layout.app')

@section('content')
    @include('backend.account.layout.sidebar')

    <div class="col-md-9">
        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Edit Book
            </div>
            @include('../../message')
                                
            <form action="{{ route('book.update', $book->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                            value="{{ old('title', $book->title) }}" name="title" id="title" />
                        @error('title')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="author" class="form-label">Author</label>
                        <input type="text" class="form-control @error('author') is-invalid @enderror"
                            placeholder="Author" value="{{ old('author', $book->author) }}" name="author" id="author" />
                        @error('author')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control " placeholder="Description" cols="30"
                            rows="5">{{ old('description', $book->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="Image " class="form-label">Image</label>
                        <input type="file" class="form-control @error('photo') is-invalid @enderror"
                            onchange="document.querySelector('#photo').src=window.URL.createObjectURL(this.files[0])"
                            name="photo" id=".jpg,.png,.jpeg" />
                        @error('photo')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <img src="{{ asset('/storage/' . $book->photo) }}" class="img-fluid mt-4" height="200"
                            width="200" id="photo" alt="Luna John">

                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $book->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $book->status == '0' ? 'selected' : '' }}>Block</option>
                        </select>
                    </div>


                    <button class="btn btn-primary mt-2">Update</button>
                    <a href="{{ route('book.index') }}" class="btn btn-danger mt-2">Cancle</a>
                </div>
            </form>
        </div>
    </div>
@endsection
