@guest

@else
  @if(Session::has('success'))
      <div id="message" class="alert alert-success">
          {{ Session::get('success') }}
      </div>
  @endif
@endguest
