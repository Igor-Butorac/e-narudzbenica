 <nav class="navbar navbar-expand-md navbar-dark bg-dark ">
      <a class="navbar-brand" href="#">E-narudžbenica</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a  style="border-left: 4px solid green;
            height: 40px;" class="nav-link" href="#">Početna <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('orders_god') }}">Pregled narudžbenica</a>
          </li>
  
         <li class="nav-item">
            <a class="nav-link " href="{{url('orders2020/create')}}">Unesi narudžbenicu</a>
          </li> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="https://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Prikaži po godinama</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="{{url('orders2020')}}">2020.</a>
              <a class="dropdown-item" href="{{url('orders2019')}}">2019.</a>
              <a class="dropdown-item" href="#">Prikaži više..</a>
            </div>
          </li>
        </ul>
   
                   <!-- Right Side Of Navbar -->
                   <ul class="navbar-nav ml-auto">
                      <!-- Authentication Links -->
                      @guest
                          <li class="nav-item">
                              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                          </li>
                          
                        {{-- nitko osim admina ne vidi register
                            
                            <li class="nav-item">
                              @if (Route::has('register'))
                                  <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                              @endif
                        --}} 

                          </li>
                      @else
                          <li class="nav-item dropdown">
                              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  {{ Auth::user()->name }} <span class="caret"></span>
                              </a>
    


                              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                 
                                    <a class="dropdown-item" href={{ url('dashboard') }}>Upravljačka ploča</a>

                                
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      {{ __('Logout') }}
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                              </div>
                          </li>
                      @endguest
                  </ul>
              </div>
      </div>
    </nav>
      </div>
  </nav>
  
  
  
