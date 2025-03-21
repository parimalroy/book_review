<div class="col-md-3">
    <div class="card border-0 shadow-lg">
        <div class="card-header  text-white">
            Welcome, {{ Auth::user()->name }}
        </div>
        <div class="card-body">
            <div class="text-center mb-3">
                <img src="{{ asset('/storage/' . Auth::user()->photo) }}" class="img-fluid rounded-circle" height="150px"
                    width="150px" alt="Luna John">
            </div>
            <div class="h5 text-center">
                <strong>{{ Auth::user()->name }}</strong>
                <p class="h6 mt-2 text-muted">5 Reviews</p>
            </div>
        </div>
    </div>
    <div class="card border-0 shadow-lg mt-3">
        <div class="card-header  text-white">
            Navigation
        </div>
        <div class="card-body sidebar">
            <ul class="nav flex-column">
                @if (Auth::user()->role == 'admin')
                    <li
                        class="nav-item {{ Request::segment(3) == 'index' ? ' fst-italic border-botom border-primary p-2' : '' }}">
                        <a href="{{ route('book.index') }}">Books</a>
                    </li>
                    <li
                        class="nav-item {{ Request::segment(3) == 'review' ? 'fst-italic border-bottom border-primary p-2' : '' }}">
                        <a href="{{ route('review.index') }}">Reviews</a>
                    </li>
                    <li
                        class="nav-item {{ Request::segment(2) == 'profile' ? 'fst-italic border-botom border-primary p-2' : '' }}">
                        <a href="{{ route('profile.index') }}">Profile</a>
                    </li>
                @endif
                <li
                    class="nav-item {{ Request::segment(3) == 'user-review' ? 'fst-italic border-botom border-primary p-2' : '' }}">
                    <a href="{{ route('userReview.index') }}">My Reviews</a>
                </li>

                <li
                    class="nav-item {{ Request::segment(2) == 'password' ? 'fst-italic border-botom border-primary p-2' : '' }}">
                    <a href="{{ route('profile.password') }}">Change Password</a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('profile.logout') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</div>
