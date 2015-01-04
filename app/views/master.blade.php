<html>
    <head>
        
        {{ HTML::script('assets/js/jquery.js') }}
        {{ HTML::script('assets/js/bootstrap.js') }}
        {{ HTML::style('assets/css/bootstrap.min.css') }}
		{{ HTML::style('assets/css/style.css') }}

        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Genève Partage</title>
    </head>
    <body>
		
          <!-- Navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

			   	{{ link_to('/', 'Genève Partage', $attributes = array('class' => 'navbar-brand'), $secure = null); }}
				
                   
                </div>
                <!-- Everything you want hidden at 940px or less, place within here -->
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        
                        @if ( Auth::guest() )
						<!-- 
							{{ Form::open(array('route' => 'login', 'class' => 'navbar-form navbar-left'))}}
							
							        {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'email')) }}

						{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'mot de passe')) }}
                            {{ Form::submit('Connexion', array('class' => 'btn btn-default')) }}
							
							{{ Form::close()}}
					-->
						<li>{{ link_to('inscription', 'Inscription', $attributes = array(), $secure = null) }}</li>
						<li>{{ link_to('login', 'Connexion', $attributes = array(), $secure = null) }}</li>
						
                        @else
						
						<li class="dropdown">
						              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenue, <b>{{ Auth::user()->firstname . " " . Auth::user()->lastname  }}</b> <span class="caret"></span></a>
						              <ul class="dropdown-menu" role="menu">
						                <li>{{ HTML::link('profil', 'Mon profil') }}</li>
										<li>{{ HTML::link('annonces', 'Mes annonces') }}</li>
						                <li class="divider"></li>
										<li>{{ HTML::link('logout', 'Déconnexion') }}</li>
						              </ul>
						            </li>
                            
                            
                        @endif
                        
                    </ul> 
                </div>
            </div>
        </div>
        <div class="container">
            
            @yield('content')
            
            <footer>
        <div class="row">
          <div class="col-lg-12">

              <br>
              
            <p>Made by Henry Seng, contact at <a href="mailto:geneve.partage@maileum.com">geneve.partage@maileum.com</a>.
            An experiment of <a href="http://maileum.com" rel="nofollow">Maileum</a>. </p>
          </div>
        </div>

      </footer>
        </div>
        
    </body>
</html>