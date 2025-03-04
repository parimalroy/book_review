@extends('backend.account.layout.app')

@section('content')
    @include('backend.account.layout.sidebar')

    <div class="col-md-9">

        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Reviews
            </div>
            @include('../../message')
            <div class="card-body pb-0">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        {{-- <a href="{{ route('book.create') }}" class="btn btn-primary ml-3">Add Book</a> --}}
                        <input type="text" class="form-control" placeholder="keyword" name="keyword"
                            value="{{ Request::get('keyword') }}" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">

                            <button class="btn btn-primary" type="submit">Search</button>

                            <a href="{{ route('review.index') }}" class="btn btn-secondary">cancle</a>
                        </div>
                    </div>
                </form>
                <table class="table  table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Review</th>
                            <th>Book</th>
                            <th>Rating</th>
                            <th> User</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                        @if ($reviews->isNotEmpty())
                    <tbody>
                        @foreach ($reviews as $review)
                            <tr>
                                <td>{{ $review->review }}</td>
                                <td>{{ $review->book->title }}</td>
                                <td>{{ $review->rating }}.0 ({{ $review->rating }} Reviews)</td>
                                <td>{{ $review->user->name }}</td>
                                <td>
                                    @if ($review->status == 1)
                                        <span class="text text-primary">active</span>
                                    @else
                                        <span class="text text-danger">block</span>
                                    @endif
                                </td>
                                <form action="{{ route('review.delete') }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $review->id }}" name="id">
                                    <td>
                                        <a href="{{ route('review.edit', $review->id) }}" class="btn btn-primary btn-sm"><i
                                                class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        {{-- <a href="#" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash"></i></a> --}}
                                        <button class="btn btn-danger btn-sm fa-solid fa-trash"></button>


                                    </td>
                                </form>
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td>Atomic Habits</td>
                            <td>James Clear</td>
                            <td>3.0 (3 Reviews)</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Atomic Habits</td>
                            <td>James Clear</td>
                            <td>3.0 (3 Reviews)</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Atomic Habits</td>
                            <td>James Clear</td>
                            <td>3.0 (3 Reviews)</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Atomic Habits</td>
                            <td>James Clear</td>
                            <td>3.0 (3 Reviews)</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>Atomic Habits</td>
                            <td>James Clear</td>
                            <td>3.0 (3 Reviews)</td>
                            <td>Active</td>
                            <td>
                                <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                <a href="edit-book.html" class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                </a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr> --}}
                    </tbody>
                    @endif
                    </thead>
                </table>
                {{ $reviews->links() }}
            </div>

        </div>
    </div>
@endsection
