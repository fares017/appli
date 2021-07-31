<ul class="header-links pull-right">
    <!-- Authentication Links -->
    @guest
           <li class="nav-item">
               <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
           </li>
       @if (Route::has('register'))
           <li class="nav-item">
               <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
           </li>
       @endif
    @else
        
          <ul class="header-links pull-right">
			   <li><a href="{{ route('home') }}"><i class="fa fa-user-o"></i>{{ Auth::user()->name }}</a>  <span id="connection-circle"></span></li>
               <li><a href="{{ route('home') }}"><i class="fa fa-user-o"></i> Mon compte</a></li>
		  </ul>

    @endguest			
</ul>

