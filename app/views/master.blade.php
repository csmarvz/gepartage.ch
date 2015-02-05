<html>
    <head>
        
        {{ HTML::script('assets/js/jquery.js') }}
        {{ HTML::script('assets/js/bootstrap.js') }}
        {{ HTML::style('assets/css/bootstrap.min.css') }}
		{{ HTML::style('assets/css/style.css') }}
		
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

        
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
					
							
						<li>
							<a href="{{ URL::to('inscription') }}">
								<i class="ace-icon fa fa-edit"></i>
								Inscription
							</a>
						</li>
						<li>
							<a href="{{ URL::to('connexion') }}">
								<i class="ace-icon fa fa-lock"></i>
								Connexion
							</a>
							
						</li>
							-->
						
                        @else
						<li class="">
							{{ HTML::link('idees','Boîte à idées') }}
							
						</li>
						<li>
							{{ HTML::link('messages','Messages') }}
						</li>
						<li class="dropdown">
						              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Bienvenue, <b>{{ Auth::user()->firstname . " " . Auth::user()->lastname  }}</b> <span class="caret"></span></a>
						              <ul class="dropdown-menu" role="menu">
						                <li>{{ HTML::link('profil', 'Mon profil') }}</li>
										<li>{{ HTML::link('profil/mes_objets', 'Mes objets') }}</li>
										<li>{{ HTML::link('profil/mes_avis', 'Mes avis de recherche') }}</li>
										<li>{{ HTML::link('deconnexion', 'Déconnexion') }}</li>
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
			</div>
        <div class="container">

              <br>
			  <p>
			  	Pour tes commentaires et suggestions, envoie-nous un email à csmarvz@gmail.com ! Merci d'avance
				
			  </p>
			  <small>
            
			<p>
	    Tu es un spécialiste du design, de la communication, de la programmation ou tu veux tout simplement nous aider à construire cette plateforme ? 
		<a class="" href="mailto:csmarvz@gmail.com" role="button">Contacte-nous vite !</a></p>		
	<p>Concept développé par <a href="mailto:csmarvz@gmail.com">Henry Seng</a>.</p></small>

          </div>

      </footer>
        </div>
		
		<script>
		jQuery('body').bind('click', function(e) {
		    if(jQuery(e.target).closest('.navbar').length == 0) {
		        // click happened outside of .navbar, so hide
		        var opened = jQuery('.navbar-collapse').hasClass('collapse in');
		        if ( opened === true ) {
		            jQuery('.navbar-collapse').collapse('hide');
		        }
		    }
		});
		</script>
        
    </body>
</html>