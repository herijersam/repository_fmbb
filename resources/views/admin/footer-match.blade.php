  <!--MAIN NAVIGATION-->
                <!--===================================================-->
                <nav id="mainnav-container">
                    <!--Brand logo & name-->
                    <!--================================-->
                    <div class="navbar-header">
                        <a href="index.html" class="navbar-brand">
                            <i class="fa fa-cube brand-icon"></i>
                            <div class="brand-title">
                                <span class="brand-text">FMBB</span>
                            </div>
                        </a>
                    </div>
                    <!--================================-->
                    <!--End brand logo & name-->
                    <div id="mainnav">
                        <!--Menu-->
                        <!--================================-->
                        <div id="mainnav-menu-wrap">
                            <div class="nano">
                                <div class="nano-content">
                                    <ul id="mainnav-menu" class="list-group">
                                        <!--Category name-->
                                        <li class="list-header">Navigation</li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="javascript:void(0)">
                                            <i class="fa fa-home"></i>
                                            <span class="menu-title">Pages d'accès</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href="{{ route('index') }}"><i class="fa fa-caret-right"></i>Articles</a></li>       
                                                <li><a href="{{ route('publicite') }}"><i class="fa fa-caret-right"></i>Publicités</a></li>
                                                <li><a href="{{ route('fond') }}"><i class="fa fa-caret-right"></i>Fonds du site</a></li>
                                                <li><a href="{{ route('show.event') }}"><i class="fa fa-caret-right"></i>Matchs</a></li>
                                            </ul>
                                        </li>
                                        <!--Category name-->
                                        <li class="list-header">Compositions</li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="">
                                            <i class="fa fa-calendar"></i>
                                            <span class="menu-title">
                                            Calendrier
                                            </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="">
                                            <i class="fa fa-flag"></i>
                                            <span class="menu-title">
                                               Competition
                                            
                                            </span>
                                            </a>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="">
                                            <i class="fa fa-newspaper-o"></i>
                                            <span class="menu-title">Resultat</span>
                                            <i class="arrow"></i>
                                            </a>
                                            <!--Submenu-->
                                            <ul class="collapse">
                                                <li><a href=""><i class="fa fa-caret-right"></i> Inbox </a></li>
                                                <li><a href=""><i class="fa fa-caret-right"></i> Compose </a></li>
                                                <li><a href=""><i class="fa fa-caret-right"></i> Mail View </a></li>
                                            </ul>
                                        </li>
                                        <!--Menu list item-->
                                        <li>
                                            <a href="">
                                            <i class="fa fa-bar-chart-o"></i>
                                            <span class="menu-title">
                                            Statistique
                                            
                                            </span>
                                            </a>
                                            <!--Submenu-->
                                           
                                        </li>
                                        <!--Menu list item-->
                                        
                                    </ul>
                                    <!--Widget-->
                                    <!--================================-->
                                    
                                    <!--================================-->
                                    <!--End widget-->
                                </div>
                            </div>
                        </div>
                        <!--================================-->
                        <!--End menu-->
                    </div>
                </nav>
                <!--===================================================-->
                <!--END MAIN NAVIGATION-->
            </div>
            <!-- FOOTER -->
            <!--===================================================-->
            <!--<footer id="footer">-->
                <!-- Visible when footer positions are fixed -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!--<div class="show-fixed pull-right">
                    <ul class="footer-list list-inline">
                        <li>
                            <p class="text-sm">SEO Proggres</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-danger"></div>
                            </div>
                        </li>
                        <li>
                            <p class="text-sm">Online Tutorial</p>
                            <div class="progress progress-sm progress-light-base">
                                <div style="width: 80%" class="progress-bar progress-bar-primary"></div>
                            </div>
                        </li>
                        <li>
                            <button class="btn btn-sm btn-dark btn-active-success">Checkout</button>
                        </li>
                    </ul>
                </div>-->
                <!-- Visible when footer positions are static -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                <!-- Remove the class name "show-fixed" and "hide-fixed" to make the content always appears. -->
                <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
                
            <!--</footer>-->
            <!--===================================================-->
            <!-- END FOOTER -->
            <!-- SCROLL TOP BUTTON -->
            <!--===================================================-->
            <button id="scroll-top" class="btn"><i class="fa fa-chevron-up"></i></button>
            <!--===================================================-->
        </div>
        <!--===================================================-->
        <!-- END OF CONTAINER -->
        <!--JAVASCRIPT-->
        <!--=================================================-->
        <!--jQuery [ REQUIRED ]-->
        <script src="../../js/jquery-2.1.1.min.js"></script>
        <!--jQuery UI [ REQUIRED ]-->
        <script src="../../js/jquery-ui.min.js"></script>
        <!--BootstrapJS [ RECOMMENDED ]-->
        <script src="../../js/bootstrap.min.js"></script>
        <!-- Selection Equipe Poule Javascript [OPTIONAL] -->
        <script src="../../js/select-poule.js"></script>
        <!-- Validation form [OPTIONAL] -->
        <script src="../../js/validation-form.js"></script>
        <!--Fast Click [ OPTIONAL ]-->
        <script src="../../plugins/fast-click/fastclick.min.js"></script>
        <!--Jquery Nano Scroller js [ REQUIRED ]-->
        <script src="../../plugins/nanoscrollerjs/jquery.nanoscroller.min.js"></script>
        <!--Metismenu js [ REQUIRED ]-->
        <script src="../../plugins/metismenu/metismenu.min.js"></script>
        <!--Jasmine Admin [ RECOMMENDED ]-->
        <script src="../../js/scripts.js"></script>
        <!--Switchery [ OPTIONAL ]-->
        <script src="../../plugins/switchery/switchery.min.js"></script>
        <!--Bootstrap Select [ OPTIONAL ]-->
        <script src="../../plugins/bootstrap-select/bootstrap-select.min.js"></script>
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <script src="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
        <!--Bootstrap Tags Input [ OPTIONAL ]-->
        <script src="../../plugins/tag-it/tag-it.min.js"></script>
        <!--Chosen [ OPTIONAL ]-->
        <script src="../../plugins/chosen/chosen.jquery.min.js"></script>
        <!--noUiSlider [ OPTIONAL ]-->
        <script src="../../plugins/noUiSlider/jquery.nouislider.all.min.js"></script>
        <!--Bootstrap Timepicker [ OPTIONAL ]-->
        <script src="../../plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <script type="text/javascript">
           $('#timepicker').timepicker({
                timeFormat: 'H:m:s',
                minuteStep: 5,
                showInputs: false,
                disableFocus: true
            });
        </script>
        <!--Bootstrap Datepicker [ OPTIONAL ]-->
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
       <script src="../../plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript">
            $('#datepicker').datepicker({
                format: "dd MM, yyyy",
                todayBtn: "linked",
                autoclose: true,
                todayHighlight: true
                });
            $('#datepicker').on('changeDate', function() {
                $('#my_hidden_input').val(
                    $('#datepicker').datepicker('getFormattedDate')
                );
            });
        </script>
        <!--Dropzone [ OPTIONAL ]-->
        <script src="../../plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
        <!--Masked Input [ OPTIONAL ]-->
        <script src="../../plugins/masked-input/jquery.maskedinput.min.js"></script>
        <!--Summernote [ OPTIONAL ]-->
        <script src="../../plugins/summernote/summernote.min.js"></script>
        <!--Fullscreen jQuery [ OPTIONAL ]-->
        <script src="../../plugins/screenfull/screenfull.js"></script>
        <!--Dropzone [ OPTIONAL ]-->
        <script src="../../plugins/dropzone/dropzone.min.js"></script>
        <!-- Image Upload JS [OPTIONAL] -->
        <script src="../../js/image-upload.js"></script>
        <!--Form Component [ SAMPLE ]-->
        <script src="../../js/demo/form-component.js"></script>
        <script>
            var $imageupload = $('.imageupload');
            $imageupload.imageupload();

            $('#imageupload-reset').on('click', function() {
                $imageupload.imageupload('reset');
                $(this).blur();
            });
        </script>

    </body>


</html>