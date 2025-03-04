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

                        <input type="text" class="form-control" placeholder="keyword" name="keyword"
                            value="{{ Request::get('keyword') }}" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">

                            <button class="btn btn-primary" type="submit">Search</button>

                            <a href="{{ route('userReview.index') }}" class="btn btn-secondary">cancle</a>
                        </div>
                    </div>
                </form>
                <table class="table  table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Review</th>
                            <th>Book</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                        @if ($userReviews->isNotEmpty())
                    <tbody>
                        @foreach ($userReviews as $userReview)
                            <tr>
                                <td>{{ $userReview->review }}</td>
                                <td>{{ $userReview->book->title }}</td>
                                <td>{{ $userReview->rating }}.0 ({{ $userReview->rating }} Reviews)</td>
                                <td>
                                    @if ($userReview->status == 1)
                                        <span class="text text-primary">Approved</span>
                                    @else
                                        <span class="text text-danger">Not Approved</span>
                                    @endif
                                </td>
                                <form action="" method="POST">
                                    @csrf
                                    <input type="hidden" value="" name="id">
                                    <td>
                                        <a href="{{ route('userReview.edit', $userReview->id) }}"
                                            class="btn btn-primary btn-sm"><i class="fa-regular fa-pen-to-square"></i>
                                        </a>
                                        {{-- <a href="#" class="btn btn-danger btn-sm"><i
                                                class="fa-solid fa-trash"></i></a> --}}
                                        <button class="btn btn-danger btn-sm fa-solid fa-trash"></button>


                                    </td>
                                </form>
                            </tr>
                        @endforeach

                    </tbody>
                    @endif
                    </thead>
                </table>
                {{ $userReviews->links() }}
            </div>

        </div>
    </div>
@endsection
