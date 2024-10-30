<?php
/**
 *
 * @file settings.php
 * @description For testimonial settings page
 *
 * */
// Security Check
if (!defined('ABSPATH')) die();
global $gb_mega_testimonial;

if (isset($_POST['general_settings'])) {
        # General Setting Options
        echo "<br>";
        echo "<div style='max-width:98%' class='alert alert-success class='close' data-dismiss='alert' aria-label='Close'><strong> General Settings Has Been Saved Successfully ! </strong></div>";
        if(isset($_POST) && !empty($_POST)) $gb_mega_testimonial->options['general-settings']['general-testimonials'] = $_POST;
        //pr($gb_mega_testimonial->options['general-settings']['general-testimonials']);
    }
    elseif (isset($_POST['group_settings'])) {
        # Group Settings Options
        echo "<br>";
        echo "<div style='max-width:98%' class='alert alert-success class='close' data-dismiss='alert' aria-label='Close'><strong> Group Settings Has Been Saved Successfully ! </strong></div>";
        if(isset($_POST) && !empty($_POST)) $gb_mega_testimonial->options['general-settings']['group-testimonials'] = $_POST;
        // pr($gb_mega_testimonial->options['general-settings']['group-testimonials']);
    }
    elseif (isset($_POST['single_settings'])) {
        # Single Testimonial Settings Options
        echo "<br>";
        echo "<div style='max-width:98%' class='alert alert-success class='close' data-dismiss='alert' aria-label='Close'><strong> Single Testimonial Settings Has Been Saved Successfully ! </strong></div>";
        if(isset($_POST) && !empty($_POST)) $gb_mega_testimonial->options['general-settings']['single-testimonials'] = $_POST;
        // pr($gb_mega_testimonial->options['general-settings']['single-testimonials']);
    }
    elseif (isset($_POST['general_theme'])) {
        # General Theme Settings
        echo "<br>";
        echo "<div style='max-width:98%' class='alert alert-success class='close' data-dismiss='alert' aria-label='Close'><strong> General Theme Changes Has Been Saved Successfully ! </strong></div>";
        if(isset($_POST) && !empty($_POST)) $gb_mega_testimonial->options['general-themes']['general-testimonials'] = $_POST;
        // pr($gb_mega_testimonial->options['general-themes']['general-testimonials']);
    }
    elseif (isset($_POST['group_theme'])) {
        # Group Theme Settings
        echo "<br>";
        echo "<div style='max-width:98%' class='alert alert-success class='close' data-dismiss='alert' aria-label='Close'><strong> Group Theme Changes Has Been Saved Successfully ! </strong></div>";
        if(isset($_POST) && !empty($_POST)) $gb_mega_testimonial->options['general-themes']['group-testimonials'] = $_POST;
        // pr($gb_mega_testimonial->options['general-themes']['group-testimonials']);
    }



?>
<style type="text/css">
    .testimonial-accordion{
    	margin: 20px;
    }
</style>
<div style="margin-top: 40px" class='container'>

    <div class='row wpb-header'><?php include 'partials/header.php' ?></div>

    <div class='row wpb-body'>

        <div class='col-md-12'>
            <div class="tabbable-panel">
                <div class="tabbable-line">
                    <ul class="nav nav-tabs md-pills pills-default" role="tablist">
                        <li class="active">
                            <a href="#general_settings" data-toggle="tab">
                                <i class="glyphicon glyphicon-cog"></i> General Settings</a>
                        </li>
                        <li>
                            <a href="#theme_option" data-toggle="tab">
                                <i class="glyphicon glyphicon-picture"></i> Theme Option</a>
                        </li>
                        <li>
                            <a href="#shortcode" data-toggle="tab">
                                <i class="glyphicon glyphicon-link"></i> Shortcode Attributes and Examples</a>
                        </li>
                        <li>
                            <a href="#about_plugin" data-toggle="tab">
                                <i class="glyphicon glyphicon-info-sign"></i> About This Plugin !</a>
                        </li>
                    </ul>
                    <br>
                    <div class="tab-content">
                        <div class="tab-pane active" id="general_settings">
                            <h3>General Settings</h3>
                            <hr/>
                            <div class="testimonial-accordion">
                                <div class="panel-group" id="accordion1">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne"><i class="glyphicon glyphicon-align-left"></i> <strong>General Testimonial Settings Panel</strong></a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <form method="post">
                                                  <div class="tab-pane active" id="general_tm-v">
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_title" value='gn_tm_title' <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_title']) ) {echo 'checked';} ?> >
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide Testimonial Title ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_desc" value="gn_tm_desc" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_desc']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide Description of the testimonial ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_fimage" value="gn_tm_fimage" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_fimage']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide author feature image ?
                                                          </label>
                                                      </div>
                                                      <hr>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_author" value="gn_tm_author" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_author']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author name ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_job" value="gn_tm_job" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_job']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author job description name ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_location" value="gn_tm_location" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_location']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author location name ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_company" value="gn_tm_company" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_company']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author company ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                                  <input type="checkbox" name="gn_tm_email" value="gn_tm_email" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_email']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author email id ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="gn_tm_url" value="gn_tm_url" <?php if( isset( $gb_mega_testimonial->options['general-settings']['general-testimonials']['gn_tm_url']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author link URL ?
                                                          </label>
                                                      </div>
                                                      <p>
                                                          <button type="submit" name="general_settings" class="btn btn-success"> Save Settings</button>
                                                      </p>
                                                  </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo"><i class="glyphicon glyphicon-align-left"></i> <strong>Group Testimonial Settings Panel</strong></a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                <form method="post">
                                                      <div class="tab-pane" id="group_tm-v">
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_title" value="gr_tm_title" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_title']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide Testimonial Title ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_desc" value="gr_tm_desc" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_desc']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide Description of the testimonial ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_fimage" value="gr_tm_fimage" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_fimage']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide author feature image ?
                                                              </label>
                                                          </div>
                                                          <hr>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_author" value="gr_tm_author" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_author']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide testimonial author name ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_job" value="gr_tm_job" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_job']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide testimonial author job description name ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_location" value="gr_tm_location" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_location']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide testimonial author location name ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_company" value="gr_tm_company" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_company']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide testimonial author company ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_email" value="gr_tm_email" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_email']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide testimonial author email id ?
                                                              </label>
                                                          </div>
                                                          <div class="checkbox">
                                                              <label>
                                                                  <input type="checkbox" name="gr_tm_url" value="gr_tm_url" <?php if( isset( $gb_mega_testimonial->options['general-settings']['group-testimonials']['gr_tm_url']) ) {echo 'checked';} ?>>
                                                                  <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                                  Hide testimonial author link URL ?
                                                              </label>
                                                          </div>
                                                          <p>
                                                              <button type="submit" name="group_settings" class="btn btn-success"> Save Settings</button>
                                                          </p>
                                                      </div>
                                                  </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree"><i class="glyphicon glyphicon-align-left"></i> <strong>Single Testimonial Settings Panel</strong></a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <form method="post">
                                                  <div class="tab-pane" id="single_tm-v">
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_title" value="sng_tm_title" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_title']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide Testimonial Title ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_desc" value="sng_tm_desc" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_desc']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide Description of the testimonial ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_fimage" value="sng_tm_fimage" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_fimage']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide author feature image ?
                                                          </label>
                                                      </div>
                                                      <hr>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_author" value="sng_tm_author" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_author']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author name ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_job" value="sng_tm_job" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_job']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author job description name ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_location" value="sng_tm_location" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_location']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author location name ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_company" value="sng_tm_company" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_company']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author company ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_email" value="sng_tm_email" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_email']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author email id ?
                                                          </label>
                                                      </div>
                                                      <div class="checkbox">
                                                          <label>
                                                              <input type="checkbox" name="sng_tm_url" value="sng_tm_url" <?php if( isset( $gb_mega_testimonial->options['general-settings']['single-testimonials']['sng_tm_url']) ) {echo 'checked';} ?>>
                                                              <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                                              Hide testimonial author link URL ?
                                                          </label>
                                                      </div>
                                                      <p>
                                                          <button type="submit" name="single_settings" class="btn btn-success"> Save Settings</button>
                                                      </p>
                                                  </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="tab-pane" id="theme_option">
                            <h3>Theme Settings</h3>
                            <hr>
                            <div class="testimonial-accordion">
                                <div class="panel-group" id="accordion2">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseOne1"><i class="glyphicon glyphicon-blackboard"></i> <strong>General Theme Gallery</strong></a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne1" class="panel-collapse collapse in">
                                            <div class="panel-body">
                                                <form method="post">
                                                  <div class="tab-pane active" id="general_tm_th-v">
                                                      <div class="row">
                                                          <div class="col-md-6">
                                                              <img style="height: 250px" src="<?php echo $gb_mega_testimonial->url . 'assets/img/gn_slide.png' ?>" class="img-responsive img-radio">
                                                              <button type="button" class="btn btn-primary btn-radio">General Card Sliding</button>
                                                              <input type="checkbox" id="left-item" class="hidden" name="gn_slide" value="gn_slide" <?php if( isset( $gb_mega_testimonial->options['general-themes']['general-testimonials']['gn_slide']) ) {echo 'checked';} ?>>
                                                          </div>
                                                          <div class="col-md-6">
                                                              <img style="height: 250px;margin: 0 auto;" src="<?php echo $gb_mega_testimonial->url . 'assets/img/gn_fade.png' ?>" class="img-responsive img-radio">
                                                              <button type="button" class="btn btn-primary btn-radio">General Fade Sliding</button>
                                                              <input type="checkbox" id="right-item" class="hidden" name="gn_fade" value="gn_fade" <?php if( isset( $gb_mega_testimonial->options['general-themes']['general-testimonials']['gn_fade']) ) {echo 'checked';} ?>>
                                                          </div>
                                                      </div>
                                                      <div style="margin: 20px 0 0 -5px;" class="row">
                                                          <button type="submit" name="general_theme" class="btn btn-success"> Save Settings</button>
                                                      </div>
                                                  </div>
                                               </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo1"><i class="glyphicon glyphicon-blackboard"></i> <strong>Group Theme Gallery</strong></a>
                                            </h4>
                                        </div>
                                        <div id="collapseTwo1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <form method="post">
                                                    <div class="tab-pane" id="group_tm_th-v">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img style="height: 250px" src="<?php echo $gb_mega_testimonial->url . 'assets/img/gr_slide.png' ?>" class="img-responsive img-radio">
                                                                <button type="button" class="btn btn-primary btn-radio">Group Card Sliding</button>
                                                                <input type="checkbox" id="left-item" class="hidden" name="gr_slide" value="gr_slide" <?php if( isset( $gb_mega_testimonial->options['general-themes']['group-testimonials']['gr_slide']) ) {echo 'checked';} ?>>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <img style="height: 250px; margin: 0 auto;" src="<?php echo $gb_mega_testimonial->url . 'assets/img/gr_fade.png' ?>" class="img-responsive img-radio">
                                                                <button type="button" class="btn btn-primary btn-radio">Group Fade Sliding</button>
                                                                <input type="checkbox" id="right-item" class="hidden" name="gr_fade" value="gr_fade" <?php if( isset( $gb_mega_testimonial->options['general-themes']['group-testimonials']['gr_fade']) ) {echo 'checked';} ?>>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 20px 0 0 -5px;" class="row">
                                                            <button type="submit" name="group_theme" class="btn btn-success"> Save Settings</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseThree1"><i class="glyphicon glyphicon-blackboard"></i> <strong>Single Starter Theme Gallery</strong></a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <img style="height: 250px;" src="<?php echo $gb_mega_testimonial->url . 'assets/img/sn_one.png' ?>" class="img-responsive img-radio">
                                                        <button type="button" class="btn btn-primary btn-radio">Starter Elementary Theme</button>
                                                        <input type="checkbox" id="left-item" class="hidden">
                                                    </div>
                                                </div>
                                                <div style="margin: 20px 0 0 -5px;" class="row">
                                                    <a class="btn btn-success" href="#" target="_blank"> Save Settings</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="shortcode">
                            <h3>Shortcode Overview <small><i>Shortcodes are the easy and short form of activating any of the testimonial type ..</i></small></h3>
                            <hr>
                            <h4><strong>General Testimonial Shortcode</strong> <code>[gb_testimonial]</code></h4>
                            <p style="font-size:16px">
                                This is the general type of testimonial shortcode where all the testimonial created will be showd as
                                Slide or the chosen form from the settings panel. This shortcode will let you activate this kind of 
                                Testimonials. Suppose, you have created some testimonials for your site and you want to show all of them 
                                in any of your pages, you can use this shortcode.
                            </p>
                            <h4><strong>Single testimonial item shortcode</strong> <code>[gb_testimonial id='264']</code></h4>
                            <p style="font-size:16px">
                                This is the grouped type of testimonial shortcode where all the testimonial of a specific group will appear 
                                on activating this shortcode with the existing group id. To apply this kind of shortcode you need to create 
                                the groups first from the <b>Groups</b> option in the admin panel. Then assign your desired testimonials in 
                                your group. After that you can use this Group Shortcode to show the group testimonials.
                            </p>
                            <h4><strong>Grouped testimonial item shortcode</strong> <code>[gb_testimonial group_id='36']</code></h4>
                            <p style="font-size:16px">
                                This is the single testimonial type of shortcode where you can show up your any special testimonial 
                                in any page or post. In this part you will get an unique shortcode with each of your created testimonial
                                that can be used for this purpose. Use that particular shortcode as your single testimonial. 
                            </p>
                        </div>

                        <div class="tab-pane" id="about_plugin">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card">
                                        <h3><strong>About the Plugin</strong></h3>
                                        <img class="card-img-top" src="<?php echo $gb_mega_testimonial->url . 'assets/img/tm_banner.png' ?>" alt="Mega Testimonial Plugin Banner">
                                        <br>
                                        <div class="card-block">
                                            <p class="card-text">
                                                Mega Testimonial is the unique and ultimate solution for the WordPress powered web sites.
                                                Nice Admin Panel with some eye catchy Themes let your web site to show off the testimonials
                                                from your clients or well wishers.
                                            </p>
                                            <h4>Feature List</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Nice and furnished Admin Panel design.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Easy and handy decoration processes.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Offering some handsome themes with the plugin.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Three different mode to express your testimonials. (Ex. Basic, Group and Single)</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Full custom monitoring panel with easy options.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Fit for all type of web site.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Working nice with different page builders.</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card">
                                        <h3><strong>About Giribaz </strong></h3>
                                        <img class="card-img-top" src="<?php echo $gb_mega_testimonial->url . 'assets/img/gb_logo.png' ?>" alt="About Giribaz">
                                        <br>
                                        <div class="card-block">
                                            <p class="card-text">
                                                Giribaz starts with a strong motivation to develop essential, innovative and people choice plugins
                                                for the WordPress. We develop professional plugins to the WordPress as per user need and requirements. 
                                            </p>
                                            <h4>Our Development Principles</h4>
                                            <ul class="list-group">
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> We develop world class plugins with full modular process.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Our developed plugin is very handy and easy to use.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Continuous analyzing market to upgrade our products.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Nice UI and easy operation in every plugin.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> 24/7 support team is ready to serve you.</li>
                                                <li class="list-group-item"><i class="glyphicon glyphicon-circle-arrow-right"></i> Thank you for use our product.</li>
                                            </ul>
                                            <span class="label label-info "><a style="color: #127AB9" href="http://giribaz.com/">Visit Us @ Giribaz</a></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
