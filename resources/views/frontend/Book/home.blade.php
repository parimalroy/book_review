@extends('frontend.layout.app');

@section('content')
    <div class="col-md-12">
        <div class="d-flex justify-content-between">
            <h2 class="mb-3">Books</h2>
            <div class="mt-2">
                <a href="{{ route('book.home') }}" class="text-dark">Clear</a>
            </div>
        </div>
        <div class="card shadow-lg border-0">
            <div class="card-body">
                <form action="" method="get">
                    <div class="row">
                        <div class="col-lg-11 col-md-11">
                            <input type="text" class="form-control form-control-lg" placeholder="Search by title"
                                name="keyword" value="{{ Request::get('keyword') }}">
                        </div>
                        <div class="col-lg-1 col-md-1">
                            <button class="btn btn-primary btn-lg w-100"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </div>
            </div>
            </form>
        </div>
        <div class="row mt-4">
            @if ($books->isNotEmpty())
                @foreach ($books as $book)
                    <div class="col-md-4 col-lg-3 mb-4">
                        <div class="card border-0 shadow-lg">
                            <a href="{{ route('book.details', $book->id) }}"><img
                                    src="{{ asset('storage/' . $book->photo) }}" alt="" class="card-img-top"></a>
                            <div class="card-body">
                                <h3 class="h4 heading"><a
                                        href="{{ route('book.details', $book->id) }}">{{ $book->title }}</a></h3>
                                <p>by {{ $book->author }}</p>
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
                                    <span class="theme-font text-muted">(2 Reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif

            {{ $books->links() }}
            {{-- <nav aria-label="Page navigation ">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav> --}}

        </div>
    </div>
@endsection
