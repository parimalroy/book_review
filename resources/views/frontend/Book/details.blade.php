@extends('frontend.layout.app')

@section('content')
    <div class="row justify-content-center d-flex mt-5">
        <div class="col-md-12">
            @include('../../message')
            <a href="{{ route('book.home') }}" class="text-decoration-none text-dark ">
                <i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp; <strong>Back to books</strong>
            </a>

            <div class="row mt-4">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $book->photo) }}" alt="" class="card-img-top">
                </div>
                <div class="col-md-8">
                    <h3 class="h2 mb-3">{{ $book->title }}</h3>
                    <div class="h4 text-muted">by {{ $book->author }}</div>
                    <div class="star-rating d-inline-flex ml-2" title="">
                        <span class="rating-text theme-font theme-yellow">5.0</span>
                        <div class="star-rating d-inline-flex mx-2" title="">
                            <div class="back-stars ">
                                <i class="fa fa-star " aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>
                                <i class="fa fa-star" aria-hidden="true"></i>

                                <div class="front-stars" style="width: 100%">
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                    <i class="fa fa-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                        <span class="theme-font text-muted">(0 Review)</span>
                    </div>

                    <div class="content mt-3">
                        <p>
                            {{ $book->description }}
                        </p>


                    </div>

                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h2 class="h3 mb-4">Readers also enjoyed</h2>
                        </div>
                        @if ($ReletedBooks->isNotEmpty())
                            @foreach ($ReletedBooks as $relBook)
                                <div class="col-md-4 col-lg-4 mb-4">
                                    <div class="card border-0 shadow-lg">
                                        <img src="{{ asset('storage/' . $relBook->photo) }}" alt=""
                                            class="card-img-top">
                                        <div class="card-body">
                                            <h3 class="h4 heading">Think & Grow Rich</h3>
                                            <p>by Napoleon Hill</p>
                                            <div class="star-rating d-inline-flex ml-2" title="">
                                                <span class="rating-text theme-font theme-yellow">0.0</span>
                                                <div class="star-rating d-inline-flex mx-2" title="">
                                                    <div class="back-stars ">
                                                        <i class="fa fa-star " aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                        <i class="fa fa-star" aria-hidden="true"></i>

                                                        <div class="front-stars" style="width: 70%">
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                            <i class="fa fa-star" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                                <span class="theme-font text-muted">(0)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="col-md-12 pt-2">
                        <hr>
                    </div>
                    <div class="row pb-5">
                        <div class="col-md-12  mt-4">
                            <div class="d-flex justify-content-between">
                                <h3>Reviews</h3>
                                @if (Auth::check())
                                    <div>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#staticBackdrop">
                                            Add Review
                                        </button>

                                    </div>
                                @else
                                    <a href="{{ route('login.index') }}" class="btn btn-primary">Add Review</a>
                                @endif
                            </div>
                            @if (Auth::check())
                                @if ($book->reviews->isNotEmpty())
                                    @foreach ($book->reviews as $review)
                                        <div class="card border-0 shadow-lg my-4">
                                            <div class="card-body">
                                                <div class="d-flex justify-content-between">
                                                    <h5 class="mb-3">{{ $review->user->name }}</h4>
                                                        <span
                                                            class="text-muted">{{ \Carbon\Carbon::parse($review->created_at)->format('d M Y') }}</span>
                                                </div>
                                                @php
                                                    $starReview = ($review->rating / 5) * 100;
                                                @endphp

                                                <div class="mb-3">

                                                    <div class="star-rating d-inline-flex" title="">
                                                        <div class="star-rating d-inline-flex " title="">
                                                            <div class="back-stars ">
                                                                <i class="fa fa-star " aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                                <i class="fa fa-star" aria-hidden="true"></i>

                                                                <div class="front-stars"
                                                                    style="width: {{ $starReview }}%">
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="content">
                                                    <p>{{ $review->review }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <span>Not Review found</span>
                                @endif
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Review for
                        <strong>{{ $book->title }}</strong>
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('review.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <div class="mb-3">
                            <label for="" class="form-label">Review</label>
                            <textarea name="review" id="review" class="form-control @error('review') is-invalid @enderror" cols="5"
                                rows="5" placeholder="Review"></textarea>
                            @error('review')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label @error('rating') is-invalid @enderror">Rating</label>
                            <select name="rating" id="rating" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            @error('rating')
                                <div class="text text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
