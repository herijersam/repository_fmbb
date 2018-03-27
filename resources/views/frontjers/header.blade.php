<!DOCTYPE html>
<html lang="zxx">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>Fédération Malagasy de BasketBall</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Alchemists - Sports News HTML Template">
  <meta name="author" content="Dan Fisher">
  <meta name="keywords" content="Sports News HTML Template">

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="../front/assets/images/favicons/favicon.ico">
  <link rel="apple-touch-icon" sizes="120x120" href="../front/assets/images/favicons/favicon-120.png">
  <link rel="apple-touch-icon" sizes="152x152" href="../front/assets/images/favicons/favicon-152.png">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">

  <!-- Google Web Fonts
  ================================================== -->
  <link href="../fonts.googleapis.com/css295c.css?family=Montserrat:400,700%7CSource+Sans+Pro:400,700" rel="stylesheet">

  <!-- CSS
  ================================================== -->
  <!-- Preloader CSS -->
  <link href="../front/assets/css/preloader.css" rel="stylesheet">

  <!-- Vendor CSS -->
  <link href="../front/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../front/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../front/assets/fonts/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
  <link href="../front/assets/vendor/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
  <link href="../front/assets/vendor/slick/slick.css" rel="stylesheet">

  <!-- Template CSS-->
  <link href="../front/assets/css/content.css" rel="stylesheet">
  <link href="../front/assets/css/components.css" rel="stylesheet">
  <link href="../front/assets/css/style.css" rel="stylesheet">

  <!-- Custom CSS-->
  <link href="../front/assets/css/custom.css" rel="stylesheet">
  <style>
    @if(!is_null($fond2))
    .hero-unit{background:#27313b url("../app/photos/{{$fond2->url}}") 50% 0 no-repeat;background-size:cover;}
    .hero-unit__content--left-center{text-align:center;}
    @else
    @endif



/*scroll table*/
    .side-bar-content {
        height: 100%;
        position: absolute;
        width: 237px;
        z-index: 5;
        overflow-y: auto;
        padding-bottom: 65px;
    }



  </style>

</head>
<body class="template-basketball">

  <div class="site-wrapper clearfix">
    <div class="site-overlay"></div>



    <!-- Header
    ================================================== -->
  
    <!-- Header Mobile -->
    <div class="header-mobile clearfix" id="header-mobile">
      <div class="header-mobile__logo">
        <a href="index.html"><img src="../../app/photos/logofmbb.png" srcset="../../app/photos/logofmbb.png" alt="Alchemists" class="header-mobile__logo-img"></a>
      </div>
      <div class="header-mobile__inner">
        <a id="header-mobile__toggle" class="burger-menu-icon"><span class="burger-menu-icon__line"></span></a>
        <span class="header-mobile__search-icon" id="header-mobile__search-icon"></span>
      </div>
    </div>
  
    <!-- Header Desktop -->
    <header class="header">
  
      <!-- Header Top Bar -->
      <div class="header__top-bar clearfix">
        <div class="container">
  
          <!-- Account Navigation -->
          <ul class="nav-account">
            @if(Auth::check())
            <li class="nav-account__item nav-account__item--logout"><a href="{{ url('/logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Deconnection</a></li>
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
            @else
            <li class="nav-account__item"><a href="#" data-toggle="modal" data-target="#modal-login-register">Se connecter</a></li>
            @endif
          </ul>
          <!-- Account Navigation / End -->
  
        </div>
      </div>
      <!-- Header Top Bar / End -->
  
      <!-- Header Secondary -->
      <div class="header__secondary">
        <div class="container">
          <!-- Header Search Form -->
          <div class="header-search-form">
            <form action="#" id="mobile-search-form" class="search-form">
              <input type="text" class="form-control header-mobile__search-control" value="" placeholder="Entrer votre Recherche ici...">
              <button type="submit" class="header-mobile__search-submit"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- Header Search Form / End -->
          <ul class="info-block info-block--header">
            <li class="info-block__item info-block__item--contact-secondary">
              <svg role="img" class="df-icon df-icon--basketball">
                <use xlink:href="../front/assets/images/icons-basket.svg#basketball"/>
              </svg>
              <h6 class="info-block__heading">Contactez-nous</h6>
              <a class="info-block__link" href="mailto:info@alchemists.com"></a>
            </li>

          </ul>
        </div>
      </div>
      <!-- Header Secondary / End -->
  
      <!-- Header Primary -->
      <div class="header__primary">
        <div class="container">
          <div class="header__primary-inner">
            <!-- Header Logo -->
            <div class="header-logo">
              <a href="index.html"><img src="../../app/photos/logofmbb.png" alt="fmbb" style="width:180px;height:180px;" srcset="../../app/photos/logofmbb.png" class="header-logo__img"></a>
            </div>
            <!-- Header Logo / End -->
  
            <!-- Main Navigation -->
            <nav class="main-nav clearfix">
              <ul class="main-nav__list">
                <li class="active"><a href="{{ route('accueil') }}">Accueil</a>
                  
                </li>
                <li class=""><a href="#">Classements</a>
                  <!--
                    <ul class="main-nav__sub">
                      <li class="main-nav__title">Features</li>
                      <li><a href="features-shortcodes.html">Shortcodes</a></li>
                      <li><a href="features-typography.html">Typography</a></li>
                      <li><a href="features-widgets-blog.html">Widgets - Blog</a></li>
                      <li><a href="features-widgets-shop.html">Widgets - Shop</a></li>
                      <li><a href="features-widgets-sports.html">Widgets - Sports</a></li>
                      <li><a href="features-404.html">404 Error Page</a></li>
                      <li><a href="features-search-results.html">Search Results</a></li>
                      <li><a href="page-contacts.html">Contact Us</a></li>
                    </ul>
                   -->
                </li>
                <li class=""><a href="#">Calendrier</a>
                <!--  <ul class="main-nav__sub">
                    <li><a href="team-overview.html">Overview</a></li>
                    <li><a href="team-roster-2.html">Roster</a>
                      <ul class="main-nav__sub-2">
                        <li><a href="team-roster-1.html">Roster - 1</a></li>
                        <li><a href="team-roster-2.html">Roster - 2</a></li>
                      </ul>
                    </li>
                    <li><a href="team-standings.html">Standings</a></li>
                    <li><a href="team-last-results.html">Latest Results</a></li>
                    <li><a href="team-schedule.html">Schedule</a></li>
                    <li><a href="team-gallery.html">Gallery</a>
                      <ul class="main-nav__sub-2">
                        <li><a href="team-gallery-album.html">Single Album</a></li>
                      </ul>
                    </li>
                    <li><a href="player-overview.html">Player Pages</a>
                      <ul class="main-nav__sub-2">
                        <li><a href="player-overview.html">Overview</a></li>
                        <li><a href="player-stats.html">Full Statistics</a></li>
                        <li><a href="player-bio.html">Biography</a></li>
                        <li><a href="player-news.html">Related News</a></li>
                        <li><a href="player-gallery.html">Gallery</a></li>
                      </ul>
                    </li>
                  </ul>-->
                </li>
                <li class=""><a href="#">Nouveauté</a>
                <!--  <ul class="main-nav__sub">
                    <li><a href="blog-1.html">News - version 1</a></li>
                    <li><a href="blog-2.html">News - version 2</a></li>
                    <li><a href="blog-3.html">News - version 3</a></li>
                    <li><a href="blog-4.html">News - version 4</a></li>
                    <li><a href="#">Post</a>
                      <ul class="main-nav__sub-2">
                        <li><a href="blog-post-1.html">Single Post - version 1</a></li>
                        <li><a href="blog-post-2.html">Single Post - version 2</a></li>
                        <li><a href="blog-post-3.html">Single Post - version 3</a></li>
                      </ul>
                    </li>
                  </ul>-->
                </li>
                <li class=""><a href="shop-grid.html">Saison</a>
                <!--  <ul class="main-nav__sub">
                    <li><a href="shop-grid.html">Shop - Grid</a></li>
                    <li><a href="shop-list.html">Shop - List</a></li>
                    <li><a href="shop-fullwidth.html">Shop - Full Width</a></li>
                    <li><a href="shop-product.html">Single Product</a></li>
                    <li><a href="shop-cart.html">Shopping Cart</a></li>
                    <li><a href="shop-checkout.html">Checkout</a></li>
                    <li><a href="shop-wishlist.html">Wishlist</a></li>
                    <li><a href="shop-login.html">Login</a></li>
                    <li><a href="shop-account.html">Account</a></li>
                  </ul>-->
                </li>
              </ul>
  
              <!-- Social Links -->
              <ul class="social-links social-links--inline social-links--main-nav">
                <li class="social-links__item">
                  <a href="https://www.facebook.com/madagascarbasketball/" class="social-links__link" data-toggle="tooltip" data-placement="bottom" title="Facebook"><i class="fa fa-facebook"></i></a>
                </li>
                
              </ul>
              <!-- Social Links / End -->
  
              <!-- Pushy Panel Toggle -->
              <a href="#" class="pushy-panel__toggle">
                <span class="pushy-panel__line"></span>
              </a>
              <!-- Pushy Panel Toggle / Eng -->
            </nav>
            <!-- Main Navigation / End -->
          </div>
        </div>
      </div>
      <!-- Header Primary / End -->
  
    </header>
    <!-- Header / End -->
  
    <!-- Pushy Panel -->
    <aside class="pushy-panel">
      <div class="pushy-panel__inner">
        <header class="pushy-panel__header">
          <div class="pushy-panel__logo">
            <a href="index.html"><img src="../../app/photos/logofmbb.png" srcset="../../front/assets/images/logo@2x.png 2x" alt="Alchemists"></a>
          </div>
        </header>
        <div class="pushy-panel__content">
    
          <!-- Widget: Posts -->
          <aside class="widget widget--side-panel">
            <div class="widget__content">
              <ul class="posts posts--simple-list posts--simple-list--lg">
                <li class="posts__item posts__item--category-1">
                  <div class="posts__inner">
                    <div class="posts__cat">
                      <span class="label posts__cat-label">The Team</span>
                    </div>
                    <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2016</a></h6>
                    <time datetime="2017-08-23" class="posts__date">August 23rd, 2017</time>
                    <div class="posts__excerpt">
                      Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                    </div>
                  </div>
                  <footer class="posts__footer card__footer">
                    <div class="post-author">
                      <figure class="post-author__avatar">
                        <img src="../front/assets/images/samples/avatar-1.jpg" alt="Post Author Avatar">
                      </figure>
                      <div class="post-author__info">
                        <h4 class="post-author__name">James Spiegel</h4>
                      </div>
                    </div>
                    <ul class="post__meta meta">
                      <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like meta-like--active icon-heart"></i> 530</a></li>
                      <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                    </ul>
                  </footer>
                </li>
                <li class="posts__item posts__item--category-2">
                  <div class="posts__inner">
                    <div class="posts__cat">
                      <span class="label posts__cat-label">Injuries</span>
                    </div>
                    <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                    <time datetime="2017-08-23" class="posts__date">August 23rd, 2017</time>
                    <div class="posts__excerpt">
                      Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad mini veniam, quis nostrud en derum sum laborem.
                    </div>
                  </div>
                  <footer class="posts__footer card__footer">
                    <div class="post-author">
                      <figure class="post-author__avatar">
                        <img src="../../front/assets/images/samples/avatar-2.jpg" alt="Post Author Avatar">
                      </figure>
                      <div class="post-author__info">
                        <h4 class="post-author__name">Jessica Hoops</h4>
                      </div>
                    </div>
                    <ul class="post__meta meta">
                      <li class="meta__item meta__item--likes"><a href="#"><i class="meta-like icon-heart"></i> 530</a></li>
                      <li class="meta__item meta__item--comments"><a href="#">18</a></li>
                    </ul>
                  </footer>
                </li>
              </ul>
            </div>
          </aside>
          <!-- Widget: Posts / End -->
    
          <!-- Widget: Tag Cloud -->
          <aside class="widget widget--side-panel widget-tagcloud">
            <div class="widget__title">
              <h4>Tag Cloud</h4>
            </div>
            <div class="widget__content">
              <div class="tagcloud">
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYOFFS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">ALCHEMISTS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INJURIES</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">TEAM</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">INCORPORATIONS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">UNIFORMS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">CHAMPIONS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PROFESSIONAL</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">COACH</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">STADIUM</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">NEWS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">PLAYERS</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">WOMEN DIVISION</a>
                <a href="#" class="btn btn-primary btn-xs btn-outline btn-sm">AWARDS</a>
              </div>
            </div>
          </aside>
          <!-- Widget: Tag Cloud / End -->
    
          <!-- Widget: Banner -->
          <aside class="widget widget--side-panel widget-banner">
            <div class="widget__content">
              <figure class="widget-banner__img">
                <a href="#"><img src="../front/assets/images/samples/banner.jpg" alt="Banner"></a>
              </figure>
            </div>
          </aside>
          <!-- Widget: Banner / End -->
    
        </div>
        <a href="#" class="pushy-panel__back-btn"></a>
      </div>
    </aside>
    <!-- Pushy Panel / End -->
    
  

    <!-- Hero Unit ================================================== -->
    <div class="hero-unit">
      <div class="container hero-unit__container">
        <div class="hero-unit__content hero-unit__content--left-center">
          <span class="hero-unit__decor">
            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
          </span>
          <h5 class="hero-unit__subtitle">We are BasketBall</h5>
          <h1 class="hero-unit__title">Féderation Malagasy <span class="text-primary">de BasketBall</span></h1>
          <div class="hero-unit__desc">MADAGASCAR SPORTS</div>

        </div>
 @if(!is_null($fond1))   
        <figure class="hero-unit__img">
         
          <img src="../../app/photos/{{$fond1->url}}" style="height:500px;width:450px;" alt="Hero Unit Image">
        
        </figure>
      @else
      @endif
      </div>
    </div>
    
