<!-- ______________________ HEADER _______________________ -->

<div id="header">
  <div class="container clearfix">
    <div id="logo">
		<?php if ($logo): ?>
        <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>">

	<img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />


	</a>
        <?php endif; ?>

        <?php if ($site_name || $site_slogan): ?>
        <div class="clearfix">
        <?php if ($site_name): ?>
        <span id="site-name"><a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></span>
        <?php endif; ?>
        <?php if ($site_slogan): ?>
        <span id="slogan"><?php print $site_slogan; ?></span>
        <?php endif; ?>
        </div><!-- /site-name-wrapper -->
        <?php endif; ?>
    </div>
    <div id="searchform-header">
     	<?php print render($page['search_area']); ?>
   	</div>
  </div> <!-- /header-container -->
</div> <!-- /header -->

<!-- ______________________ NAVIGATION _______________________ -->
<a name="top"></a>
<?php if (!empty($main_menu)): ?>
  <div id="navigation"><!-- navigation -->
    <div class="container clearfix">
    <?php if('multilevel_menu'){
      // echo "<pre>";
      // var_dump(menu_build_tree('main-menu'));
      $children = menu_build_tree('main-menu');
      $menu_render = menu_tree_output($children);
      $menu_render = json_decode(str_replace('leaf','',json_encode($menu_render)),true);
      $menu_render['#attributes']['class']=array('main-menu','links');
      $r = drupal_render($menu_render);
      echo str_replace('<ul class="','<ul class="links main-menu',$r);
      echo '<a title="Pibe hírek RSS" class="rss" href="/news.xml">Feliratkozás</a>';
      echo '<script>jQuery(function($){$("#navigation a.active").parent().addClass("active");});</script>';
      }else{?>
      <?php print theme('links', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'main-menu')))); ?>
      <a title="Pibe hírek RSS" class="rss" href="/news.xml">Feliratkozás</a>
      <?php } ?>
    </div> <!-- /navigation-container -->
  </div> <!-- /navigation -->
<?php endif;?>

<!-- ______________________ SLIDESHOW _______________________ -->

<?php /*

<div id="slideshow"><!-- slideshow -->
  <div class="slideshow container clearfix">
    <div class="force-previous"><a href="#">Previous</a></div>
    <div class="main_view">
      <div class="window">
        <div class="image_reel">
            <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'magazeenlite')?>/images/slideshow/slide3.jpg" alt="" /></a>
            <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'magazeenlite')?>/images/slideshow/slide1.jpg" alt="" /></a>
            <a href="#"><img src="<?php print base_path() . drupal_get_path('theme', 'magazeenlite')?>/images/slideshow/slide2.jpg" alt="" /></a>
        </div>
      </div>
      <div class="paging">
        <a href="#" rel="1">1</a>
        <a href="#" rel="2">2</a>
        <a href="#" rel="3">3</a>
      </div>
    </div>
    <div class="force-next"><a href="#">Next</a></div>
  </div> <!-- /slideshow-container -->
</div> <!-- /slideshow -->

*/ ?>

<!-- ______________________ MAIN _______________________ -->

<div id="main" class="clearfix">
  <div class="container clearfix">
    <div id="sidebar" class="left">
      <?php print render($page['sidebar_second']); ?>
    </div><!-- /right -->

    <div class="main">
		<?php //if ($breadcrumb): print $breadcrumb; endif; ?>

		<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>

        <?php if ($messages): ?>
        <div id="console" class="clearfix">
        <?php print $messages; ?>
        </div>
        <?php endif; ?>

        <?php if ($page['help']): ?>
        <div id="help">
        <?php print render($page['help']); ?>
        </div>
        <?php endif; ?>

        <?php if ($action_links): ?>
        <ul class="action-links">
        <?php print render($action_links); ?>
        </ul>
        <?php endif; ?>

        <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>

        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
        <h1 class="node-title"><?php print $title ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>

        <?php print render($page['content']); ?>

        <?php print $feed_icons; ?>
        <div id="back-to-top0"><a href="#top"><?php print(t('Back to top of the page'));?></a></div>
    </div><!-- /main -->

  </div><!-- /main-container -->
</div><!-- /main -->

<!-- ______________________ FOOTER _______________________ -->

<div id="footer">
  <div class="container footer-divider clearfix">
    <div id="footer-left">
      <?php print render($page['footer-left']); ?>
    </div>
    <div id="footer-right">
      <?php print render($page['footer-right']); ?>
    </div>
  </div><!-- /footer-container -->
</div><!-- /footer -->


<!-- ______________________ SECONDARY NAVIGATION _______________________ -->

<?php if (!empty($secondary_menu)): ?>
  <div id="snavigation"><!-- snavigation -->
    <div class="container clearfix">
      <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('class' => array('secondary-menu', 'links', 'clearfix')))); ?>
    </div> <!-- /snavigation-container -->
  </div> <!-- /snavigation -->
<?php endif;?>

<!-- ______________________ LINK-BACK _______________________ -->

<?php /*

<div id="link-back">
  <div class="container clearfix">
    <a title="Brought To You By: www.SmashingMagazine.com" class="smashing" href="http://www.smashingmagazine.com" target="_blank">Brought to you By: www.SmashingMagazine.com</a>
    <a title="In Partner With: www.WeFunction.com" class="function" href="http://www.wefunction.com" target="_blank">In Partner with: www.WeFunction.com</a>
    <a title="Drupalizing" class="drupalizing" href="http://www.drupalizing.com" target="_blank">Drupalizing</a>
    <div id="footer-message" style="clear:both;">
      <div class="description">Ported to Drupal for the Open Source Community by <a href="http://www.drupalizing.com">Drupalizing</a>, a Project of <a href="http://www.morethanthemes.com">More than Themes</a></div>
      <?php print render($page['footer']); ?>
    </div>
  </div> <!-- /link-back-container -->
</div> <!-- /link-back -->

 */ ?>
