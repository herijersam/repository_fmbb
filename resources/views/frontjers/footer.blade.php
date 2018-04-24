<!-- Footer
    ================================================== -->
    <footer id="footer" class="footer">
    
      <!-- Footer Widgets -->
      <div class="footer-widgets">
        <div class="footer-widgets__inner">
          <div class="container">
            <div class="row">
              <div class="col-sm-12 col-md-3">
                <div class="footer-col-inner">
    
                  <!-- Footer Logo -->
                  <div class="footer-logo">
                    <a href="index.html"><img src="../../app/photos/logofmbb.png" srcset="../../app/photos/logofmbb.png" alt="Alchemists" class="footer-logo__img"></a>
                  </div>
                  <!-- Footer Logo / End -->
    
                </div>
              </div>
              <div class="col-sm-4 col-md-3">
                <div class="footer-col-inner">
                  <!-- Widget: Contact Info -->
                  <div class="widget widget--footer widget-contact-info">
                    <h4 class="widget__title">Contact Info</h4>
                    <div class="widget__content">
                      <div class="widget-contact-info__desc">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisi nel elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                      </div>
                      <div class="widget-contact-info__body info-block">
                        <div class="info-block__item">
                          <svg role="img" class="df-icon df-icon--basketball">
                            <use xlink:href="../front/assets/images/icons-basket.svg#basketball"/>
                          </svg>
                          <h6 class="info-block__heading">Contactez-nous</h6>

                        </div>
                        <div class="info-block__item">
                          <svg role="img" class="df-icon df-icon--jersey">
                            <use xlink:href="../front/assets/images/icons-basket.svg#jersey"/>
                          </svg>

                        </div>
                        <div class="info-block__item info-block__item--nopadding">
                          <ul class="social-links">
                            <li class="social-links__item">
                              <a href="https://www.facebook.com/madagascarbasketball/" class="social-links__link"><i class="fa fa-facebook"></i> Facebook</a>
                            </li>
                            <!--<li class="social-links__item">
                              <a href="#" class="social-links__link"><i class="fa fa-twitter"></i> Twitter</a>
                            </li>-->
                            
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Widget: Contact Info / End -->
                </div>
              </div>
              <div class="col-sm-4 col-md-3">
                <div class="footer-col-inner">
                  <!-- Widget: Popular Posts / End -->
                  <div class="widget widget--footer widget-popular-posts">
                    <h4 class="widget__title">Les Articles récents</h4>
                    <div class="widget__content">
                      <ul class="posts posts--simple-list">
                        <li class="posts__item posts__item--category-2">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">Injuries</span>
                          </div>
                          <h6 class="posts__title"><a href="#">Mark Johnson has a Tibia Fracture and is gonna be out</a></h6>
                          <time datetime="2017-08-23" class="posts__date">August 23rd, 2017</time>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">The Team</span>
                          </div>
                          <h6 class="posts__title"><a href="#">Jay Rorks is only 24 points away from breaking the record</a></h6>
                          <time datetime="2017-08-22" class="posts__date">August 22nd, 2017</time>
                        </li>
                        <li class="posts__item posts__item--category-1">
                          <div class="posts__cat">
                            <span class="label posts__cat-label">The Team</span>
                          </div>
                          <h6 class="posts__title"><a href="#">The new eco friendly stadium won a Leafy Award in 2017</a></h6>
                          <time datetime="2017-08-21" class="posts__date">August 21st, 2017</time>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <!-- Widget: Popular Posts / End -->
                </div>
              </div>
              <div class="col-sm-4 col-md-3">
                <div class="footer-col-inner">
    
                 
    
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Widgets / End -->
    
      <!-- Footer Secondary -->
      <div class="footer-secondary footer-secondary--has-decor">
        <div class="container">
          <div class="footer-secondary__inner">
            <div class="row">
              <div class="col-md-10 col-md-offset-1">
                <ul class="footer-nav">
                  <li class="footer-nav__item"><a href="{{ route('accueil') }}">Accueil</a></li>
                  <li class="footer-nav__item"><a href="#">Classements</a></li>
                  <li class="footer-nav__item"><a href="#">Calendriers</a></li>
                  <li class="footer-nav__item"><a href="#">Nouveauté</a></li>
                  <li class="footer-nav__item"><a href="#">Saison</a></li>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Footer Secondary / End -->
    </footer>
    <!-- Footer / End -->
    
    
    <!-- Login/Register Modal -->
    <div class="modal fade" id="modal-login-register" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal--login" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
    
            <div class="modal-account-holder">
              <div class="modal-account__item">
    
                <!-- Register Form -->
                <form action="{{ route('register') }}" class="modal-form @if(count($errors) > 0) error @endif">
                {{ csrf_field()}}
                  <h5>Inscrivez maintenant!</h5>
                  <div class="form-group {{ $errors->has('name') ? 'error' : '' }}">
                    <input type="text" class="form-control" placeholder="Entrer votre nom..." name="name" required>
                    @if($errors->has('name'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Entrer votre email..." required >
                    @if($errors->has('email'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('password') ? 'error' : '' }}">
                    <input type="password" class="form-control" name="password" placeholder="Entrer votre mot de passe..." required >
                    @if($errors->has('password'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmer les mots de passe..." required >
                  </div>
                  <div class="form-group form-group--submit">
                    <button type="submit" class="btn btn-primary btn-block">Creer compte</button>
                  </div>
                  <div class="modal-form--note"></div>
                  
             

                </form>
                <!-- Register Form / End -->
    
              </div>
              <div class="modal-account__item">
    
                <!-- Login Form -->
                <form action="{{ route('login') }}" class="modal-form @if(count($errors) > 0) error @endif">
                {{ csrf_field()}}
                  <h5>Login Avec votre Compte</h5>
                  <div class="form-group {{ $errors->has('email') ? 'error' : '' }}">
                    <input type="email" class="form-control" name="email" placeholder="Enter votre address email..." required>
                    @if($errors->has('email'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group {{ $errors->has('password') ? 'error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Entrer votre mot de passe..." required>
                    @if($errors->has('password'))
                        <div class="ui pointing red basic label">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                  </div>
                  <div class="form-group form-group--pass-reminder">
                    <label class="checkbox checkbox-inline">
                      <input type="checkbox" id="inlineCheckbox1" name="remember" value="option1" checked> Se souvenir de moi
                      <span class="checkbox-indicator"></span>
                    </label>
                    <a href="">Mot de passe oublié?</a>
                  </div>
                  <div class="form-group form-group--submit">
                    <button type="submit" class="btn btn-primary-inverse btn-block">Login</button>
                  </div>
                  <div class="modal-form--social">
                    <h5>Login avec les profiles sociales:</h5>
                    <ul class="social-links social-links--btn text-center">
                      <li class="social-links__item">
                        <a href="{{ route('facebook') }}" class="social-links__link social-links__link--lg social-links__link--fb"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li class="social-links__item">
                        <a href="{{ route('twitter') }}" class="social-links__link social-links__link--lg social-links__link--twitter"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li class="social-links__item">
                        <a href="{{ route('google') }}" class="social-links__link social-links__link--lg social-links__link--gplus"><i class="fa fa-google-plus"></i></a>
                      </li>
                    </ul>
                  </div>
                </form>
                <!-- Login Form / End -->
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login/Register Modal / End -->

    
        <!-- Login Modal fotsiny-->
        <div class="modal fade" id="modal-login" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-lg modal--login" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          </div>
          <div class="modal-body">
    
            <div class="modal-account-holder">
    
              <div class="modal-account__item">
    
                <!-- Login Form -->
                <form action="#" class="modal-form">
                  <h5>Login Avec votre Compte</h5>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Enter votre address email...">
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control" placeholder="Entrer votre mot de passe...">
                  </div>
                  <div class="form-group form-group--pass-reminder">
                    <label class="checkbox checkbox-inline">
                      <input type="checkbox" value="option1" checked> Se souvenir de moi
                      <span class="checkbox-indicator"></span>
                    </label>
                    <a href="">Mot de passe oublié?</a>
                  </div>
                  <div class="form-group form-group--submit">
                    <button type="submit" class="btn btn-primary-inverse btn-block">Login</button>
                  </div>
                  <div class="modal-form--social">
                    <h5>Login avec les profiles sociales:</h5>
                    <ul class="social-links social-links--btn text-center">
                      <li class="social-links__item">
                        <a href="#" class="social-links__link social-links__link--lg social-links__link--fb"><i class="fa fa-facebook"></i></a>
                      </li>
                      <li class="social-links__item">
                        <a href="#" class="social-links__link social-links__link--lg social-links__link--twitter"><i class="fa fa-twitter"></i></a>
                      </li>
                      <li class="social-links__item">
                        <a href="{{ route('google') }}" class="social-links__link social-links__link--lg social-links__link--gplus"><i class="fa fa-google-plus"></i></a>
                      </li>
                    </ul>
                  </div>
                </form>
                <!-- Login Form / End -->
    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Login Modal fotsiny/ End -->
    
  </div>

  <!-- Javascript Files
  ================================================== -->
  <!-- Core JS -->
  <script>
jQuery(document).ready(function($) {
 
  $('#myCarousel').carousel({
          interval: 5000
  });

  //Handles the carousel thumbnails
  $('[id^=carousel-selector-]').click(function () {
  var id_selector = $(this).attr("id");
  try {
      var id = /-(\d+)$/.exec(id_selector)[1];
      console.log(id_selector, id);
      jQuery('#myCarousel').carousel(parseInt(id));
  } catch (e) {
      console.log('Regex failed!', e);
  }
});
  // When the carousel slides, auto update the text
  $('#myCarousel').on('slid.bs.carousel', function (e) {
           var id = $('.item.active').data('slide-number');
          $('#carousel-text').html($('#slide-content-'+id).html());
  });
});
  </script>


  <script>
  
  //pour PUB2
  $('.carousel .vertical .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=1;i<2;i++) {
    next=next.next();
    if (!next.length) {
    	next = $(this).siblings(':first');
  	}
    
    next.children(':first-child').clone().appendTo($(this));
  }
  });
  //Fin pour PUB2

  //pour réponse commentaire
  function myFunction() {
    var x = document.getElementById("myDIV");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
//pour réponse commentaire
  </script>

  <script>

  </script>



  <script src="../../front/assets/vendor/jquery/jquery.min.js"></script>
  <script src="../../front/assets/js/core-min.js"></script>
  
  <!-- Vendor JS -->
  <script src="../../front/assets/vendor/twitter/jquery.twitter.js"></script>
  
  
  <!-- Template JS -->
  <script src="../../front/assets/js/init.js"></script>
  <script src="../../front/assets/js/custom.js"></script>

  <script src="../../front/assets/js/jquery.jscroll.js"></script>
  


  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  </body>
  
<!-- Mirrored from alchemists.dan-fisher.com/basketball/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 06 Aug 2017 21:04:47 GMT -->
</html>
  
