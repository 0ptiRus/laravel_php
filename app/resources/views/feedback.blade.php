@extends("base")


@section("title")
    Feedback
@endsection

@section("content")
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
        <form method="POST" action="{{ route ("feedback.post") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
             </div>
                <label for="exampleInputPassword1">Feedback</label>
                <input type="text" name="feedback" class="form-control" id="exampleInputPassword1" placeholder="Feedback">
            </div>
            </div>
                <label for="exampleInputPassword1">Phone</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="+000 000 000 00 00">
            </div>
            <div>
                <label for="attachment">Attachment</label>
                <input type="file" name="attachment"class="form-control" id="attachment">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
@endsection