@extends("base")


@section("title")
    Feedkback
@endsection

@section("content")
<form method="POST" action="{{ route ("feedback.post") }}">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
             </div>
                <label for="exampleInputPassword1">Feedback</label>
                <input type="text" name="text" class="form-control" id="exampleInputPassword1" placeholder="Feedback">
            </div>
            </div>
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="+7 000 00 00">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection