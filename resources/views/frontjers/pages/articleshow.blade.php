@include('frontjers.headerNL')



      <!-- ===============================================SLIDER2============================================= -->
      
              <!-- Team Roster: Slider -->
              <div class="team-roster team-roster--slider">

                  @foreach(explode('|',$images2->urlimage) as $key => $url)
                  <!-- Article -->
                  <div class="team-roster__item">
                    <!-- Article Photo -->
                    <figure class="team-roster__img">
                      <img src="../../../app/photos/{{$url}}" style="width:420px;height:430px;" alt="">
                    </figure>
                    <!-- Article Photo / End-->
                  
                    <!-- FAB (More Info)-->
                    <div class="team-roster__player-fab">
                      <a href="#" class="team-roster__player-more">
                        <span class="btn-fab btn-fab--sm"></span>
                        <span class="team-roster__player-fab-txt">Cliquez<br>Voir photo</span>
                      </a>
                    </div>
                    <!-- FAB (More Info) / End -->
                  </div>
                  <!-- Article / End -->
                  @endforeach

                  @foreach(explode('|',$images2->urlimage) as $key => $url)
                  <!-- Article -->
                  <div class="team-roster__item">
                    <!-- Article Photo -->
                    <figure class="team-roster__img">
                      <img src="../../../app/photos/{{$url}}" style="width:420px;height:430px;" alt="">
                    </figure>
                    <!-- Article Photo / End-->

                    <!-- FAB (More Info)-->
                    <div class="team-roster__player-fab">
                      <a href="" class="team-roster__player-more">
                        <span class="btn-fab btn-fab--sm"></span>
                        <span class="team-roster__player-fab-txt">Cliquez<br>Voir photo</span>
                      </a>
                    </div>
                    <!-- FAB (More Info) / End -->
                  </div>
                  <!-- Article / End -->
                  @endforeach

              </div>
          <!-- Team Roster: Slider / End -->
    
      <!-- ===============================================FIN SLIDER2============================================= -->
 
    

    <!-- =============================================Content================================================== -->
    <div class="site-content">
      <div class="container">

        <div class="row">

          <!-- Content -->
          <div class="content col-md-8">

            <!-- Article -->
            <article class="card card--lg post post--single">

              
                                                <!-- Product #1 -->
                                        <li class="product__item product__item--color-1 card">

                                <div class="product__img">
                                <div class="product__img-holder">
                                    

                                        
                                            
                                        


                                        












                                        
                                    </div>
                                </div>

                                <div class="product__content card__content">

                                <header class="product__header">
                                    <div class="product__header-inner">
                                    <span class="product__category">{{$article->categorie}}</span>
                                    <h2 class="product__title"><a href="shop-product.html">{{$article->titre}}</a></h2>
                                    <div class="product__ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star empty"></i>
                                    </div>
                                    </div>
                                    <div class="product__price">le {{$article->created_at->format('j M, Y')}}</div>
                                </header>

                                <div class="product__excerpt">
                                    <h6>Description</h6>
                                    {{$article->contenu}}
                                </div>

                               

                                <footer class="product__footer">
                                    <!--<a href="" class="btn btn-primary btn-icon product__add-to-cart"><i class="icon-bag"></i> Commenter</a>-->
                                    <a href="" class="btn btn-default btn-single-icon product__wish"><i class="icon-heart"></i></a>
                                </footer>
                                </div>
                                </li>
                                <!-- Product #1 / End -->


                                   <!-- Post Comments -->
                                    <div class="post-comments card card--lg">
                                      <header class="post-commments__header card__header">
                                        <h4>Commentaires ({{ count($coms) }})</h4>
                                      </header>
                                      <div class="post-comments__content card__content">
                                    
                                        <ul class="comments">
                                      @foreach($coms as $comments)

                                          <li class="comments__item">
                                            <div class="comments__inner">
                                              <header class="comment__header">
                                                <div class="comment__author">
                                                  <figure class="comment__author-avatar">
                                                    <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim($comments->email))) . "?s=50&d=mm"}}" alt="">
                                                  </figure>
                                                  <div class="comment__author-info">
                                                    <h5 class="comment__author-name">{{ $comments->name }}</h5>
                                                    <time class="comment__post-date" datetime="2016-08-23">2 hours ago</time>
                                                  </div>
                                                </div>
                                                <div class="comment__reply">
                                                  <a href="" class="comment__reply-link btn btn-link btn-xs" data-toggle="modal" data-target="#modal-reply">Répondre</a>
                                                </div>
                                              </header>
                                              <div class="comment__body">
                                                {{ $comments->comment }}
                                              </div>
                                            </div>
                                          @foreach($affimage as $aff)
                                            <ul class="comments--children">
                                              <li class="comments__item">
                                                <div class="comments__inner">
                                                  <header class="comment__header">
                                                    <div class="comment__author">
                                                      <figure class="comment__author-avatar">
                                                        <img src="../../front/assets/images/samples/avatar-7.jpg" alt="">
                                                      </figure>
                                                      <div class="comment__author-info">
                                                        <h5 class="comment__author-name">{{$aff->name}}</h5>
                                                        <time class="comment__post-date" datetime="2016-08-23">3 hours ago</time>
                                                      </div>
                                                    </div>
                                                    <div class="comment__reply">
                                                      <a href="#" class="comment__reply-link btn btn-link btn-xs">Reply</a>
                                                    </div>
                                                  </header>
                                                  <div class="comment__body">
                                                  {{$aff->comment}} 
                                                  </div>
                                                </div>
                                              </li>
                                            </ul>
                                          @endforeach
                                          </li>






        <!-- Réponse Modal fotsiny-->
        <div class="modal fade" id="modal-reply" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg modal--login" role="document">
            <div class="modal-body">
            <form action="{{route('reply')}}"  method="POST" class="comment-form">

                <input type="hidden" value="{!!csrf_token()!!}" name="_token" />
                <input type="hidden" value="{!!$article->id!!}" name="ref" />
                <input type="hidden" value="{!!$comments->id!!}" name="repl" />
                   
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label" for="name">Nom</label>
                        <input type="text" value="Votre nom ici ..." name="name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input type="email" value="Votre email ici ..." name="email" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="comment">VotreRéponse</label>
                    <textarea name="comment" value="Votre Commentaire ici ..." rows="7" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-default btn-block btn-lg">Répondre</button>
                  </div>
                </form>

                </div>
            </div>
          </div>
    <!-- Réponse Modal fotsiny/ End -->


@endforeach
                  <!--
                  <li class="comments__item">
                    

                    <ul class="comments--children">
                      <li class="comments__item">
                        <div class="comments__inner">
                          <header class="comment__header">
                            <div class="comment__author">
                              <figure class="comment__author-avatar">
                                <img src="../../front/assets/images/samples/avatar-7.jpg" alt="">
                              </figure>
                              <div class="comment__author-info">
                                <h5 class="comment__author-name">The Speedtester</h5>
                                <time class="comment__post-date" datetime="2016-08-23">3 hours ago</time>
                              </div>
                            </div>
                            <div class="comment__reply">
                              <a href="#" class="comment__reply-link btn btn-link btn-xs">Reply</a>
                            </div>
                          </header>
                          <div class="comment__body">
                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto.
                          </div>
                        </div>
                      </li>
                    </ul>

                  </li>
-->
                </ul>
            
                <!-- Comments Pagination -->
                <nav aria-label="Comments Pavigation" class="post__comments-pagination">
                  <ul class="pagination">
                  {{$coms->links()}}
                  </ul>
                </nav>
                <!-- Comments Pagination / End -->
            
              </div>
            </div>
            <!-- Post Comments / End -->
            

            <!-- Post Comment Form -->
            <div class="post-comment-form card card--lg">
              <header class="post-comment-form__header card__header">
                <h4>ECRIRE UN COMMENTAIRE</h4>
              </header>
              <div class="post-comment-form__content card__content">
                <form action="{{route('commenter')}}"  method="POST" class="comment-form">

                <input type="hidden" value="{!!csrf_token()!!}" name="_token" />
                <input type="hidden" value="{!!$article->id!!}" name="ref" />
                   
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label" for="name">Nom</label>
                        <input type="text" name="name" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label" for="comment">Votre Commentaire</label>
                    <textarea name="comment" rows="7" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-default btn-block btn-lg">Poster le Commentaire</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- Post Comment Form / End -->


            </article>
            <!-- Article / End -->

          </div>
          <!-- Content / End -->

          <!-- Player Sidebar -->
          <div class="sidebar sidebar--player col-md-4">

            <!-- Widget: Player Newslog -->
            <aside class="widget card widget--sidebar widget-newslog">
              <div class="widget__title card__header">
                <h4>Articles à voir</h4>
              </div>
              <div class="widget__content card__content">
              
              <ul class="newslog">
                
              @foreach($artout->slice(0, 4) as $art)
               
                    <li class="newslog__item newslog__item--injury">
                    <figure class="posts__thumb">
                        <a href="{{ route('articles',$art->id) }}"><img src="../../app/photos/{{$art->urlimage}}" style="height:50px;width:100px;" alt=""></a>
                    </figure>
                    <div class="newslog__item-inner">
                      <div class="newslog__content"><a href="{{ route('articles',$art->id) }}"><strong>{{$art->titre}} :</strong> {{str_limit($art->contenu, $limit = 35, $end = '...')}}<strong></strong>. </a></div>
                      <time class="newslog__date" datetime="2016-01-19">January 19, 2016</time>
                    </div>
                  </li>

                    </li>
                    
              @endforeach                  
                </ul>

              </div>
            </aside>
            <!-- Widget: Player Newslog / End -->
            

            <!-- Widget: Newsletter -->
            <aside class="widget widget--sidebar card widget-newsletter">
              <div class="widget__title card__header">
                <h4>Notre Nouvelles</h4>
              </div>
              <div class="widget__content card__content">
                <h5 class="widget-newsletter__subtitle">S'abonner'!</h5>
                <div class="widget-newsletter__desc">
                  <p>Vous voulez recevoir des notifications à chaque nouvelle posté?</p>
                </div>
                <form action="#" id="newsletter" class="inline-form">
                  <div class="input-group">
                    <input type="email" class="form-control" placeholder="Votre adresse email...">
                    <span class="input-group-btn">
                      <button class="btn btn-lg btn-default" type="button">Envoyer</button>
                    </span>
                  </div>
                </form>
              </div>
            </aside>
            <!-- Widget: Newsletter / End -->
            

          </div>
          <!-- Player Sidebar / End -->
        </div>







      </div>
    </div>

    <!-- Content / End -->



@include('frontjers.footer')