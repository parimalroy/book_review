@extends('backend.account.layout.app')

@section('content')
    @include('backend.account.layout.sidebar')

    <div class="col-md-9">
        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Edit User Review
            </div>
            @include('../../message')

            <form action="{{ route('userReview.update', $userReview->id) }}" method="post">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label for="author" class="form-label">Book Name:{{ $userReview->book->title }}</label>
                        <textarea name="review" id="review" class="form-control @error('review') is-invalid @enderror" placeholder="review"
                            cols="30" rows="5">{{ old('review', $userReview->review) }}</textarea>
                        @error('review')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Rating</label>
                        <select name="rating" id="status" class="form-control">
                            <option value="1" {{ $userReview->rating == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $userReview->rating == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $userReview->rating == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $userReview->rating == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $userReview->rating == '5' ? 'selected' : '' }}>5</option>
                        </select>
                    </div>


                    <button class="btn btn-primary mt-2">Update</button>
                    <a href="{{ route('userReview.index') }}" class="btn btn-danger mt-2">Cancle</a>
                </div>
            </form>
        </div>
    </div>
@endsection
