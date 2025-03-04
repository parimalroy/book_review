@extends('backend.account.layout.app')

@section('content')
    @include('backend.account.layout.sidebar')

    <div class="col-md-9">
        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Edit Book
            </div>
            @include('../../message')

            <form action="{{ route('review.update', $review->id) }}" method="post">
                @csrf
                <div class="card-body">

                    <div class="mb-3">
                        <label for="author" class="form-label">Review</label>
                        <textarea name="review" id="review" class="form-control @error('review') is-invalid @enderror" placeholder="review"
                            cols="30" rows="5">{{ old('review', $review->review) }}</textarea>
                        @error('review')
                            <div class="text text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="author" class="form-label">Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="1" {{ $review->status == '1' ? 'selected' : '' }}>Active</option>
                            <option value="0" {{ $review->status == '0' ? 'selected' : '' }}>Block</option>
                        </select>
                    </div>


                    <button class="btn btn-primary mt-2">Update</button>
                    <a href="{{ route('review.index') }}" class="btn btn-danger mt-2">Cancle</a>
                </div>
            </form>
        </div>
    </div>
@endsection
