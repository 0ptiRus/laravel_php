@extends("base")

@section("title", "Forgot password")

@section("content")
    <div>
        @if (session("status"))
            <div class="alert alert-success">
                {{ session("status") }}
            </div>
        @endif
    
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route ("password.email") }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
             </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection