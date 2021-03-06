<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
  <head>
      <meta charset="utf-8">
      <meta name="stripe-key" content="{{ Config::get('stripe.publishable_key') }}">
      @yield('meta')
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width">

      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/css/foundation.min.css">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css">
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/css/jquery.dataTables.min.css">

      <!-- Add fancyBox -->
      <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" />
      <link rel="stylesheet" href="/css/main.css">

      <script src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/modernizr.min.js"></script>
  </head>
  <body>
    <!--[if lt IE 7]>
        <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
    <![endif]-->
    <header class="header-nav">
      <div class="row">
        <nav class="top-bar" data-topbar="">
          <!-- Title -->
          <ul class="title-area">
            <li class="name"><h1><a href="/">AG-Aus Admin</a></h1></li>

            <!-- Mobile Menu Toggle -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
          </ul>

          <!-- Top Bar Section -->
          <section class="top-bar-section">
            <!-- Top Bar Left Nav Elements -->
            <ul class="left">
              <!-- Dropdown -->
              <li><a href="/admin/posts">Posts</a>
              <li><a href="/admin/servers">Servers</a></li>
              <li><a href="/admin/maps">Maps</a></li>
              @if(Auth::user()->role === 1)
              <li><a href="/admin/users">Users</a></li>
              @endif
            </ul>

            <!-- Top Bar Right Nav Elements -->
            <ul class="right">
              <!-- If Authenticated -->
              @if(Auth::check())
              <li class="has-dropdown not-click">

                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <img src="{{ Gravatar::src(Auth::user()->email, 24) }}" class=""> {{ Auth::user()->username }} <b class="caret"></b>
                </a>
                <ul class="dropdown"><li class="title back js-generated"><h5><a href="#">Back</a></h5></li>
                  <li><a href="/logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>
              </li>
              @endif
            </ul>
          </section>
        </nav>
      </div>
    </header>

    <section class="row" style="background:#fff;padding-top:15px;">
      <div class="small-12 columns">
        <!-- Display Alert messages -->
        @if(Session::get('error_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius alert">
            {{ Session::get('error_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

        @if(Session::get('warning_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius warning">
            {{ Session::get('flash_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

        @if(Session::get('info_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius info">
            {{ Session::get('error_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif

        @if(Session::get('success_message'))
        <div data-alert data-options="animation_speed:500;" class="alert-box radius success">
            {{ Session::get('success_message') }}
            <a href="#" class="close">&times;</a>
        </div>
        @endif
      </div>

      <div class="small-12 columns">
        @yield('content')
      </div>

      <footer class="small-12 columns">
        <p>&copy; Powered by Kiwidev 2013</p>
      </footer>
    </section>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/datatables/1.9.4/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.pack.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/foundation/5.0.2/js/foundation.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/chosen/1.0/chosen.min.css">
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.0/chosen.jquery.min.js"></script>
    <script type="text/javascript" src="/js/vendor/epiceditor.min.js"></script>
    <script type="text/javascript">
      var opts = {
        container: 'epiceditor',
        textarea: 'desc_md_textarea',
        clientSideStorage: false,
        theme: {
          base: 'http://alternative-gaming.dev/themes/base/epiceditor.css',
          preview: 'http://alternative-gaming.dev/themes/preview/github.css',
          editor: 'http://alternative-gaming.dev/themes/editor/epic-dark.css'
        },
        button: {
          preview: true,
          fullscreen: false,
          bar: "auto"
        },
        focusOnLoad: false,
        autogrow: true
      };
    </script>
    @yield('footer')
    <script src="/js/main.js"></script>
  </body>
</html>
