<nav class="navbar navbar-expand-md navbar-dark default">
    <div class="container">

        <a class="navbar-brand bg-transparent" href="#">
            <img src="{{ asset('frontend/assets/images/shifa_logo.jpg') }}" width="60px" height="55px" alt="logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01"
            aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#main">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#depart">Departments</a></li>
                <li class="nav-item"><a class="nav-link" href="#team">Our Team</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ route('kankor.results') }}">Kankor Results</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="#establishment">Establishment</a></li>


                <li class="nav-item"><a class="nav-link" href="#gallary">Gallary</a></li>
                <li class="nav-item"><a class="nav-link" href="reg/kankor">Registeration For Kankor Exam</a></li>

                {{-- @if(!session('image')) --}}
                <form action="{{ route('admin.login') }}" method="POST">
                    @csrf
                <li class="nav-item"><button class="btn btn-primary" type="submit"
                        target="_blank">Sign in</button></li>
                    </form>
                {{-- @endif --}}
                {{-- @if(session('image'))
                <li class="nav-item">
                <a href="{{ url('home/dashboard') }}" class=" btn btn-primary">Dashboard</a></li>
                @endif --}}

            </ul>
        </div>
    </div>
</nav>
