<nav class="col-sm-3 col-md-2 d-none d-sm-block pl-0 pr-0 bg-dark sidebar">
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ route('home') }}">Dashboard <span class="sr-only">(current)</span></a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::is('accounts') ? 'active' : '' }}" href="{{  Request::is('accounts') ? '#' : route('account.all') }} ">Accounts</a>
        </li>

    @if($accountPages)
      {{-- <ul class="collapsed"> --}}
        @foreach($accountPages as $accountPage)
            <ul class="nav-item">
                <a class="nav-link {{ Request::is('accounts/'.$accountPage->id) ? 'active' : '' }}" href="{{ route('account.detail', ['name' => $accountPage->id]) }}">{{ $accountPage->name }}</a>
            </ul>

        @endforeach
        {{-- </ul> --}}
    @else
    @endif
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link @if(URL::current()) @else active  @endif" href="#">Nav item again 2</a>
        </li>
    </ul>
    <ul class="nav nav-pills flex-column">
        <li class="nav-item">
            <a class="nav-link @if(URL::current()) @else active  @endif" href="#">Nav item again 3</a>
        </li>
    </ul>
</nav>
