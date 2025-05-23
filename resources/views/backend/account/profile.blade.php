@extends('backend.account.layout.app')
@section('content')
    @include('backend.account.layout.sidebar')
    <div class="col-md-9">
        @include('../../../message')
        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Profile
            </div>
            <form action="{{ route('profile.updates') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $user->name }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name"
                            id="" />
                        @error('name')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Email</label>
                        <input type="text" value="{{ $user->email }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email"
                            id="email" />
                        @error('email')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Image</label>
                        <input type="file" name="photo"
                            onchange="document.querySelector('#photo').src=window.URL.createObjectURL(this.files[0])"
                            id="image" class="form-control" accept=".jpg,.png,.jpeg">
                        <img src="{{ asset('/storage/' . Auth::user()->photo) }}" id="photo" class="img-fluid mt-4"
                            height="200" width="200" alt="Luna John">
                        @error('photo')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary mt-2">Update</button>
                </div>
            </form>
        </div>

    </div>
@endsection
