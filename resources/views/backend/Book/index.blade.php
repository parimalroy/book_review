@extends('backend.account.layout.app')

@section('content')
    @include('backend.account.layout.sidebar')

    <div class="col-md-9">

        <div class="card border-0 shadow">
            <div class="card-header  text-white">
                Books
            </div>
            @include('../../message')
            <div class="card-body pb-0">
                <form action="" method="get">
                    <div class="input-group mb-3">
                        <a href="{{ route('book.create') }}" class="btn btn-primary ml-3">Add Book</a>
                        <input type="text" class="form-control" placeholder="keyword" name="keyword"
                            value="{{ Request::get('keyword') }}" aria-label="Recipient's username"
                            aria-describedby="basic-addon2">
                        <div class="input-group-append">

                            <button class="btn btn-primary" type="submit">Search</button>

                            <a href="{{ route('book.index') }}" class="btn btn-secondary">cancle</a>
                        </div>
                    </div>
                </form>
                <table class="table  table-striped mt-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Author</th>
                            <th>Rating</th>
                            <th>Status</th>
                            <th width="150">Action</th>
                        </tr>
                        @foreach ($books as $book)
                    <tbody>
                        <tr>
                            <td>{{ $book->title }}</td>
                            <td>{{ $book->author }}</td>
                            <td>3.0 (3 Reviews)</td>
                            <td>{{ $book->status == 1 ? 'Active' : 'Block' }}</td>
                            <form action="{{ route('book.trash') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{$book->id}}" name="id">
                                <td>
                                    <a href="#" class="btn btn-success btn-sm"><i class="fa-regular fa-star"></i></a>
                                    <a href="{{route('book.edit',$book->id)}}" class="btn btn-primary btn-sm"><i
                                            class="fa-regular fa-pen-to-square"></i>
                                    </a>
                                    <button class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>

                                </td>
                            </form>
                        </tr>
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
                    @endforeach
                    </thead>
                </table>
                {{ $books->links() }}
            </div>

        </div>
    </div>
@endsection
