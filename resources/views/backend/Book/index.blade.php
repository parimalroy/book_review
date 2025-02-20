@extends('backend.account.layout.app')

@section('content')
<div class="col-md-9">
                
    <div class="card border-0 shadow">
        <div class="card-header  text-white">
            Books
        </div>
        <div class="card-body pb-0">            
            <a href="add-book.html" class="btn btn-primary">Add Book</a>            
            <table class="table  table-striped mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>Title</th>
                        <th>Author</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th width="150">Action</th>
                    </tr>
                    <tbody>
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
                    </tbody>
                </thead>
            </table>   
            <nav aria-label="Page navigation " >
                <ul class="pagination">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>                  
        </div>
        
    </div>                
</div>
@endsection