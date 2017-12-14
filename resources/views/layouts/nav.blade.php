<nav class="navbar is-primary is-fixed-top">
  <div class="navbar-burger burger is-mobile">
    <span></span>
    <span></span>
    <span></span>
  </div>
  <div class="navbar-brand">
    <a class="navbar-item has-text-weight-bold is-white" href="#">
         {{--<img src="{{ url('img/titan_logo.svg') }}" height="28" width="112">--}}
       <span class="icon is-medium">
        <i class="fas fa-tint has-text-success"></i>
      </span>
      <span> Titan Energy Services</span>
      {{-- <img src="http://bulma.io/images/bulma-logo.png" alt="Bulma: a modern CSS framework based on Flexbox" width="112" height="28"> --}}
    </a>

    <div class="dropdown is-right is-hoverable" style="position: absolute; margin-top: 10px; right: 60px;">
      <div class="dropdown-trigger">
        <button class="button is-info" aria-hapopup="true" aria-controls="dropdown-menu4">
          <span>
            @php
              if (Auth::user()) {
                $firstname = explode(" ", Auth::user()->name)[0];
                $lastname  = explode(" ", Auth::user()->name)[1];
                $shorten   = substr($lastname, 0, 1);
                $name = $firstname . " " . $shorten . ".";
              }
            @endphp
            @if(isset($name))
              {{ $name }}
            @endif
          </span>
          <span class="icon is-small">
            <i class="fas fa-chevron-down" aria-hidden="true"></i>
          </span>
        </button>
      </div>
      <div class="dropdown-menu" id="dropdown-menu4" role="menu">
        <div class="dropdown-content">
          <a class="dropdown-item " href="#">
            <span class='icon'><i class="fas fa-bell"></i></span>
            <span>Notifications</span>
          </a>

          <a class="dropdown-item" href="#">
            <span class='icon'><i class="fas fa-clock"></i></span>
            <span>Timecard</span>
          </a>

          <a class="dropdown-item" href="#">
            <span class='icon'><i class="fas fa-sign-out"></i></span>
            <span>Logout</span>
          </a>
        </div>
      </div>
    </div>

  </div>



  <div class="navbar-menu">
    <div class="navbar-start">
      {{-- left alligned navbar items -> currently none --}}
    </div>

    <div class="navbar-end">
      <div class="navbar-burger burger" style="display: block">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
</nav>
