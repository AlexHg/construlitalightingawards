<div id="page-wrapper">
    <!-- Preloader -->
    <!-- Preloader functionality (initialized in js/app.js) - pageLoading() -->
    <!-- Used only if page preloader is enabled from inc/config (PHP version) or the class 'page-loading' is added in #page-wrapper element (HTML version) -->
    <div class="preloader themed-background">
        <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
        <div class="inner">
            <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
            <div class="preloader-spinner hidden-lt-ie10"></div>
        </div>
    </div>

    <div id="page-container" class="sidebar-partial sidebar-no-animations sidebar-visible-lg">
        <!-- Main Container -->
        <div id="main-container" style="margin-left:0!important;">
            
            <?php echo $header; ?>

            <!-- Page content -->
            <div id="page-content">
                
                <?php echo $subheader; ?>

                <!-- Customer Content -->
                
                <div class="row">
                    
                    <div class="col-lg-8">
                        <?php echo $content; ?>                                
                    </div>
                    <div class="col-lg-4" component="leftside-profile">
                        <?php echo $profile; ?>
                    </div>
                </div>
                <!-- END Customer Content -->
            </div>
            <!-- END Page Content -->

            <!-- Footer -->
            <footer class="clearfix" style="display:none;">
                <div class="pull-right">
                    Crafted with <i class="fa fa-heart text-danger"></i> by <a href="https://goo.gl/vNS3I" target="_blank">pixelcave</a>
                </div>
                <div class="pull-left">
                    <span id="year-copy"></span> &copy; <a href="https://goo.gl/TDOSuC" target="_blank">ProUI 3.8</a>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->
</div>
<!-- END Page Wrapper -->

