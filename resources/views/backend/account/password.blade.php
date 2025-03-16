@extends('backend.account.layout.app')
@section('content')
    @include('backend.account.layout.sidebar')
    <div class="col-md-9">
        @include('../../../message')
        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Profile
            </div>
            <form action="{{ route('profile.password.update') }}" method="post">
                @csrf
                <div class="card-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Old Password</label>
                        <input type="password" value=""
                            class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password"
                            name="old_password" id="" />
                        @error('old_password')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">New Password</label>
                        <input type="password" value="" class="form-control @error('password') is-invalid @enderror"
                            placeholder="New Password" name="password" id="email" />
                        @error('password')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Confirm Password</label>
                        <input type="password" value=""
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirm Password" name="password_confirmation" id="email" />
                        @error('password_confirmation')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                        <button class="btn btn-primary mt-2">Update</button>

                    </div>

            </form>
        </div>

    </div>
@endsection
