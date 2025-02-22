@extends('backend.account.layout.app')

@section('content')
@include('backend.account.layout.sidebar')

<div class="col-md-9">
    <div class="card border-0 shadow">
        <div class="card-header  text-white">
            Add Book
        </div>
        @include('../../message')

        <form action="{{route('book.store')}}" method="post" enctype="multipart/form-data">
            @csrf
        <div class="card-body">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Title" value="{{old('title')}}" name="title" id="title" />
                @error('title')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control @error('author') is-invalid @enderror"  placeholder="Author" value="{{old('author')}}"  name="author" id="author"/>
                @error('author')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control " placeholder="Description" cols="30" rows="5">{{old('description')}}</textarea>
            </div>

            <div class="mb-3">
                <label for="Image " class="form-label">Image</label>
                <input type="file" class="form-control @error('photo') is-invalid @enderror"  name="photo" id=".jpg,.png,.jpeg"/>
                @error('photo')
                <div class="text text-danger">{{ $message }}</div>
            @enderror
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Block</option>
                </select>
            </div>


            <button class="btn btn-primary mt-2">Create</button>                     
        </div>
    </form>
    </div>                
</div>
@endsection