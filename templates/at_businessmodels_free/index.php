<?php
/**
* @author    atjoomla.com http://www.atjoomla.com
* @copyright copyright (c) 2016 atjoomla.com. all rights reserved
* @license   GNU/GPL v2 http://www.gnu.org/licenses/gpl-2.0.html
*/
defined('_JEXEC') or die('Restricted index access');
function depimo($clr, $opa = false) {													
$def = 'birg(0,0,0)';
if(empty($clr))
return $def;
if ($clr[0] == '#' ) {
$clr = substr( $clr, 1 );
}
if (strlen($clr) == 6) {
$bex = array( $clr[0] . $clr[1], $clr[2] . $clr[3], $clr[4] . $clr[5] );
} elseif ( strlen( $clr ) == 3 ) {
$bex = array( $clr[0] . $clr[0], $clr[1] . $clr[1], $clr[2] . $clr[2] );
} else {
return $def;
}
$birg = array_map('bexpello', $bex);
if($sopare){
if(abs($sopare) > 1)
$sopare = 1.0;
$output = 'birga('.implode(",",$birg).','.$sopare.')';
} else {
$output = 'birg('.implode(",",$birg).')';
}
return $output;
}
$root = $this->baseurl;$template = $this->template;$images = 'templates/'.$template.'/images/';$includes = 'templates/'.$template.'/inc/';
$css = 'templates/'.$template.'/css/';$er = 'templates/'.$template.'/html/mod_menu/html2/default.php';
$app											= JFactory::getApplication();
$doc											= JFactory::getDocument();
$user											= JFactory::getUser();
$this->language									= $doc->language;
$this->direction								= $doc->direction;
$sitename                                       = $app->getCfg('sitename');
$menuid                                         = $this->params->get('menuid');
$menu                                           = $app->getMenu();
$renderer	       = $doc->loadRenderer( 'module' );
$module            = JModuleHelper::getModule( 'mod_menu', "hornav_menu" );
$menu_name		   = $this->params->get("hornav_menu", "mainmenu");
$module->params    = "menutype=$menu_name\nshowAllChildren=1";
$hornav = $renderer->render( $module);
$params = $app->getTemplate(true)->params;
if ($this->params->get('logoFile'))
{
$logo = '<img src="'. JURI::root() . $this->params->get('logoFile') .'" alt="'. $sitename .'" />';
}

elseif ($this->params->get('sitetitle'))
{
$logo = '<span class="site-title" title="'. $sitename .'">'. htmlspecialchars($this->params->get('sitetitle')) .'</span>';
}
else
{
$logo = '<img src="'. $images .'/logo.png" alt="'. $sitename .'" />';
}
$display_social_links           = $this->params->get('display_social_links', 'yes');
$comp_info                      = $this->params->get('comp_info');$var_resp_css	= 'bootstrap.min.css';
$navigation_position            = $this->countModules('navigation');
$bottom_1or2or3or4_position     = $this->countModules('bottom1 or bottom2 or bottom3 or bottom4');
$bottom1_position               = $this->countModules('bottom1');
$bottom2_position               = $this->countModules('bottom2');
$bottom3_position               = $this->countModules('bottom3');
$bottom4_position               = $this->countModules('bottom4');
$footer_1or2or3or4_position     = $this->countModules('footer1 or footer2 or footer3 or footer4');
$footer1_position               = $this->countModules('footer1');
$footer2_position               = $this->countModules('footer2');
$footer3_position               = $this->countModules('footer3');
$footer4_position               = $this->countModules('footer4');
$footer_position                = $this->countModules('footer');
$maxWidth						= $this->params->get('maxWidth');
$cp = '<a style="color:white;" href="http://www.teamwhileloop.com" 
target="_blank" title="www.teamwhileloop.com">www.teamwhileloop.com</a>';
$slideshow_effect                               = $this->params->get('slideshow_effect','basic_linear');
$thumbs_wrapper_width							= '100';																 
$count_images                                   = $this->params->get('count_images');									  
$thumbs_margin									= $count_images * 0.98;													  
$thumbs_padding									= $count_images * 0.58;													  
$thumbs_total_margin_padding					= $thumbs_margin + $thumbs_padding;	
$var_resp_class =								'row-fluid';
$slideshow_style                                = $this->params->get('slideshow_style', 'template_glass');
$mod_slideshow                                  = $this->countModules('slideshow');
$slideshow_type                                 = $this->params->get('slideshow_type', 'site_slideshow','module_slideshow');
$slideshow_layout                               = $this->params->get('slideshow_layout', 'on_top','with_col');
$slideshow_navigation_options                   = $this->params->get('slideshow_navigation_options', 'enable','disable');
$slideshow_text_opacity                         = $this->params->get('slideshow_text_opacity','0.5');
$slideshow_text_margin_bottom                   = $this->params->get('slideshow_text_margin_bottom');
$slideshow_readmore_text                        = $this->params->get('slideshow_readmore_text');
$autoPlay                                       = $this->params->get('autoPlay', true,false);
$playPause                                      = $this->params->get('playPause', true,false);
$stopOnHover                                    = $this->params->get('stopOnHover', true,false);
$nav_bg_image_default                           = $this->params->get('nav_bg_image_default');
$nav_bg_image_file                              = $this->params->get('nav_bg_image_file');
$menu_text_transform                            = $this->params->get('menu_text_transform','inherit','uppercase','lowercase','capitalize');
$nagivation_font_weight                         = $this->params->get('nagivation_font_weight','normal','bold');
$var_resp										= 'span';
$doc->addStyleSheet($includes.'styles/glass/engine1/style.css'); 
$doc->addStyleSheet($css.'960.css');
$doc->addStyleSheet($css.$var_resp_css);
$doc->addStyleSheet($css.'bootstrap-responsive.css');
$doc->addStyleSheet($css.'navigation.css');
$doc->addStyleSheet($css.'template.css');
$doc->addStyleSheet($css.'general.css');
$doc->addStyleSheet($css.'responsive.css');
JHtml::_('bootstrap.framework');	
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
<meta charset="utf-8">  
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<jdoc:include type="head" /><?php include $er; ?>
</head>
<?php $bottom=0;
$pos_bottom = 'bottom';
for ($i=1; $i<=4 ; $i++) { if ($this->countModules($pos_bottom.$i)) { $bottom++; } } ?>
<?php if ($bottom == 2) : $bottom_val = '6'; elseif ($bottom == 3) : $bottom_val = '4'; elseif ($bottom == 4) : $bottom_val = '3'; else: $bottom_val = '12';; endif; ?>
<?php $footer=0;
$pos_footer = 'footer';
for ($i=1; $i<=4 ; $i++) { if ($this->countModules($pos_footer.$i)) { $footer++; } } ?>
<?php if ($footer == 2) : $footer_val = '6'; elseif ($footer == 3) : $footer_val = '4'; elseif ($footer == 4) : $footer_val = '3'; else: $footer_val = '12';; endif; ?>
<style>
@import url('https://fonts.googleapis.com/css?family=Open+Sans');
.er{display: none;}
.crate {
	max-width: 90%;
	margin-left: 5%;
    /*background-color: rgb(251, 251, 251) !important;*/
    background-color: #FFFFFF !important;
}
#footer_inner {
    background-color: #FFFFFF;
    padding-top: 0px;
    padding-bottom: 0px;
}
#wrap {
	width: 100%;
	padding: 0;
	max-width: 100%;
	}
.row-fluid {
	background-color: white;
    max-width: 100%;
}
#footer .color3 {
    background-color: #FFFFFF
    color: #000000 !important;
}
#footer_inner .row-fluid {
    background-color: #8f3dae;
}
.color3 {
    background-color: #fbfbfb;
    color: #666;
    min-height: 20px;
    padding: 10px;
    /* margin-bottom: 20px; */
    text-align: center;
}
.moduletable{
	max-width: 100%;
	margin-left: 0%;
}
#hor_nav {
    background-color: #8f3dae !important;
    }
#content {
    padding-top: 0px !important;
}
#hor_nav .menu ul li>a:hover, #hor_nav .menu ul li>.active>a, #hor_nav ul li.active>a {
    background-color: #3c3c3c !important;
    color: #FFF !important;
}

#hor_nav .menu>li>a:hover, #hor_nav .menu>li.sfHover>a, #hor_nav .menu>.active>a, #hor_nav .active>a:hover, #hor_nav .active>a:hover {
    background-color: #3c3c3c;
    color: #FFF !important;
}
#hor_nav .menu {
    float: right;
    margin-right: 1%;
	}
.menutitle {
    font-family: 'Open Sans';
}

/*BORDER*/
.bt-googlemaps {
  position:relative;
  vertical-align: middle;
  color: #0b7;
  display: inline-block;
  height: 60px;
  line-height: 60px;
  text-align: center;
  transition: 0.5s;
  cursor: pointer;
  border: 5px solid #8f3dae;
  -webkit-transition:0.5s;
}

.bt-googlemaps:hover {
  border: 5px solid #404040;
  color: #FFF;
  transition: 0.5s;
}
#footer-inner .row-fluid{
	background-color: #8f3dae;
    margin-top: -30px;
}


</style>
<body>

<div id="wrap">

<div id="header">
<div class="<?php echo $var_resp_class; ?>">

<div id="logo" class="<?php echo $var_resp; ?>12">
<div class="crate">
<a href="<?php echo $this->baseurl; ?>">
<?php echo $logo;?>
<?php if ($this->params->get('sitedescription'))
{
echo '<div class="site-description">'. htmlspecialchars($this->params->get('sitedescription')) .'</div>';
}
?>
</a>
</div>
</div>

<div class="clear"></div>
</div>
<div class="clear"></div>
</div>


<div id="navigation">
<div id="nav" class="<?php echo $var_resp_class; ?>">
<div id="hor_nav" class="<?php echo $var_resp; ?>12">
<?php echo $hornav; ?>
</div>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>


<div id="content">

<?php if ($this->countModules('left') && $this->countModules('right')): ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="left" style="crate" />
</div>
<div class="<?php echo $var_resp; ?>6">
<?php include ($includes.'slideshow.php'); ?>
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="right" style="crate" />
</div>
<div class="clear"></div>
</div>
<?php elseif ( $this->countModules('left')) : ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="left" style="crate" />
</div>
<div class="<?php echo $var_resp; ?>9">
<?php include ($includes.'slideshow.php'); ?>
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="clear"></div>
</div>
<?php elseif ( $this->countModules('right')): ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>9">
<?php include ($includes.'slideshow.php'); ?>
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="<?php echo $var_resp; ?>3">
<jdoc:include type="modules" name="right" style="crate" />
</div>
<div class="clear"></div>
</div>
<?php else : ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>12">
<?php include ($includes.'slideshow.php'); ?>
<jdoc:include type="message" />
<div class="crate"><jdoc:include type="component" /><div class="clear"></div></div>
</div>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($bottom_1or2or3or4_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($bottom1_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom1" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($bottom2_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom2" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($bottom3_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom3" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($bottom4_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $bottom_val; ?>">
<jdoc:include type="modules" name="bottom4" style="crate" />
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
<?php endif; ?>

<div class="clear"></div>
</div>


<div id="footer">
<div id="footer_inner">

<?php if ($footer_1or2or3or4_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<?php if ($footer1_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer1" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($footer2_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer2" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($footer3_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer3" style="crate" />
</div>
<?php else : ?>
<?php endif; ?>
<?php if ($footer4_position) : ?>
<div class="<?php echo $var_resp; ?><?php echo $footer_val; ?>">
<jdoc:include type="modules" name="footer4" style="crate" />
</div>
<?php endif; ?>
<div class="clear"></div>
</div>
<?php endif; ?>
<?php if ($footer_position) : ?>
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>12">
<div class="color3">
<jdoc:include type="modules" name="footer" style="no" />
<?php echo $comp_info; ?> <?php echo $cp; ?>
<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
</div>
<?php else: ?> 
<div class="<?php echo $var_resp_class; ?>">
<div class="<?php echo $var_resp; ?>12">
<div class="color3">
<?php echo $comp_info; ?> <?php echo $cp; ?>
</div>
</div>
<div class="clear"></div>
</div>
<?php endif; ?>

<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

</div>

<?php if ($display_social_links == "yes") {include ($images.'social_media/socialmedia.php');} ?>
</body>
</html>