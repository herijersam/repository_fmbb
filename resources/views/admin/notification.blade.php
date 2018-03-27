 <!-- Messages -->
 @if(Session::has('success')) 
                        <!-- Alert layout example -->
                        <div class="alert alert-success media fade in">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <div class="media-left">
                                <span class="icon-wrap icon-wrap-xs alert-icon">
                                <i class="fa fa-bolt fa-lg"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="alert-title">Information</h4>
                                <p class="alert-message">{!! Session::get('success') !!}</p>
                            </div>
                        </div>
            @endif
             @if(Session::has('remarque')) 
                        <!-- Alert layout example -->
                        <div class="alert alert-warning media fade in">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <div class="media-left">
                                <span class="icon-wrap icon-wrap-xs alert-icon">
                                <i class="fa fa-bolt fa-lg"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="alert-title">Notification</h4>
                                <p class="alert-message">{!! Session::get('remarque') !!}</p>
                            </div>
                        </div>
            @endif
           
            @if(Session::has('error')) 
                        <!-- Alert layout example -->
                        <div class="alert alert-danger media fade in">
                            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                            <div class="media-left">
                                <span class="icon-wrap icon-wrap-xs alert-icon">
                                <i class="fa fa-bolt fa-lg"></i>
                                </span>
                            </div>
                            <div class="media-body">
                                <h4 class="alert-title">Notification</h4>
                                <p class="alert-message">{!! Session::get('error') !!}</p>
                            </div>
                        </div>
            @endif

             <!-- end Message -->