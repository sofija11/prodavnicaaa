@extends("layout")
@section("css")
    <link rel="stylesheet" type="text/css" href="{{ asset("css/style.css") }}">
@endsection
@section("mainPart")
    <div class="login_container container ">  
        <h1 class = "text-primary text-center"> LOGIN PAGE </h1>
        <form class = " text-center login" method = "POST" action = "{{ route('loginUser') }}">
            @csrf
            @method('POST')
            <div class="form-group">
                <input type="text" name="username" placeholder="Username *" class="form-control">
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Password *" class="form-control">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary"> Log In </button>
            </div>
            @if ($errors->any())
                <div class="alert alert-primary">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
@endsection