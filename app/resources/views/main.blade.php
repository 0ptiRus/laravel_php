@extends("base")


@section("title")
    Main
@endsection

@section("menu")
<div class="collapse navbar-collapse menu-ui-design" id="navbar-menu">
    <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
        @foreach ($menuItems as $item)
            <li class="scroll {{ request()->is(trim($item['url'], '/')) ? 'active' : '' }}">
                <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
            </li>
        @endforeach
    </ul>
</div>
@endsection