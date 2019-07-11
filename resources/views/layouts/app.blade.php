<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
@include('partials.head')
<body>
    <div id="app">
        @include('partials.header')

        @guest
        <main class="py-4">
          <div class="content-body">
            @yield('content')
          </div>
        </main>
        @else
          <div class="container-fluid">
              <div class="row">
                  @include('partials.sidebar')
                  <div class="col-sm-9 ml-sm-auto col-md-10 pt-3">
                    @include('partials.content-header')
                    @include('partials.alert-status')
                      @yield('content')
                  </div>
              </div>
          </div>
        @endguest
    </div>


</body>
</html>
