<?php
/**
* @version   $Id: offline.php 15999 2013-11-21 12:41:36Z arifin $
* @author    RocketTheme http://www.rockettheme.com
* @copyright Copyright (C) 2007 - 2013 RocketTheme, LLC
* @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
*
* Gantry uses the Joomla Framework (http://www.joomla.org), a GNU/GPLv2 content management system
*
*/
defined( '_JEXEC' ) or die( 'Restricted access' );

// load and inititialize gantry class
require_once(dirname(__FILE__) . '/lib/gantry/gantry.php');
$gantry->init();

$doc = JFactory::getDocument();
$app = JFactory::getApplication();

// Less Variables
$lessVariables = array(
    'main-accent'           => $gantry->get('main-accent',          '#57CE96'),
    'main-accent2'          => $gantry->get('main-accent2',         '#46A879'),
    'footer-text-color'     => $gantry->get('footer-text-color',    '#686868'),
    'footer-background'     => $gantry->get('footer-background',    '#0C0C0C')    
);

$gantry->addStyle('grid-responsive.css', 5);
$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
$gantry->addLess('offline.less', 'offline.css', 7, $lessVariables);

if ($gantry->browser->name == 'ie'){
	if ($gantry->browser->shortversion == 9){
		$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
		$gantry->addScript('placeholder-ie.js');
	}
	if ($gantry->browser->shortversion == 8){
		$gantry->addScript('html5shim.js');
		$gantry->addScript('placeholder-ie.js');
	}
}

$gantry->addScript('rokmediaqueries.js');

ob_start();
?>
<body id="rt-offline" <?php echo $gantry->displayBodyTag(); ?>>
	<div id="rt-page-surround">
		<header id="rt-header-surround">
			<div class="rt-overlay">
				<div class="rt-offline-body">
					<div class="rt-logo-block rt-offline-logo">
					    <a id="rt-logo" href="<?php echo $gantry->baseUrl; ?>"></a>
					</div>

					<?php
						$msgs = $app->getMessageQueue();
					?>
					<?php if (sizeof($msgs) > 0) : ?>	
						<div class="rt-container">
							<jdoc:include type="message" />
							<div class="clear"></div>
						</div>
					<?php endif; ?>

					<div class="rt-offline-title rt-big-title rt-center">
						<div class="module-title">
							<h2 class="title"><?php echo JText::_("RT_OFFLINE_TITLE"); ?></h2>
						</div>						
					</div>				

					<?php if ($app->getCfg('display_offline_message', 1) == 1 && str_replace(' ', '', $app->getCfg('offline_message')) != ''): ?>
						<p class="rt-offline-message">
							<?php echo $app->getCfg('offline_message'); ?>
						</p>
							<?php elseif ($app->getCfg('display_offline_message', 1) == 2 && str_replace(' ', '', JText::_('JOFFLINE_MESSAGE')) != ''): ?>
						<p class="rt-offline-message">
							<?php echo JText::_('JOFFLINE_MESSAGE'); ?>
						</p>
					<?php  endif; ?>	

					<?php if ($app->getCfg('offline_image')) : ?>
					<img src="<?php echo $app->getCfg('offline_image'); ?>" alt="<?php echo htmlspecialchars($app->getCfg('sitename')); ?>" />
					<?php endif; ?>

				</div>
			</div>
		</header>
		<section id="rt-subscription-form">
			<div class="rt-container">
				<?php if ($gantry->get('email-subscription-enabled')) : ?>
					<p class="rt-subscription-title">
						<?php echo JText::_("RT_OFFLINE_SUBSCRIPTION_TITLE"); ?>
					</p>				
					<form class="rt-offline-form" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo $gantry->get('feedburner-uri'); ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
						<input type="text" placeholder="<?php echo JText::_('RT_EMAIL') ?>" class="inputbox" name="email">
						<input type="hidden" value="<?php echo $gantry->get('feedburner-uri'); ?>" name="uri"/>
						<input type="hidden" name="loc" value="en_US"/>
						<input type="submit" name="Submit" class="button" value="<?php echo JText::_('RT_SUBSCRIBE') ?>" />
					</form>
					<div class="clear"></div>	
				<?php endif; ?>					
			</div>		
		</section>
		<section id="rt-authorized-form">
			<h2 class="rt-authorized-form-title"><?php echo JText::_("AUTHORIZED_LOGIN"); ?></h2>

			<p class="rt-authorized-login-message">
				<?php echo JText::_("RT_OFFLINE_LOGIN_MESSAGE"); ?>
			</p>				

			<?php 
		        $user    = JFactory::getUser();
		        $isAdmin = $user->get('isRoot');					
			?>
			<?php if (!$isAdmin): ?>
				<form class="rt-authorized-login-form" action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="rt-form-login">
					<input name="username" id="username" class="inputbox" type="text" placeholder="<?php echo JText::_('JGLOBAL_USERNAME') ?>" />
					<input type="password" name="password" class="inputbox" placeholder="<?php echo JText::_('JGLOBAL_PASSWORD') ?>" />
					<input type="hidden" name="remember" class="inputbox" value="yes" id="remember" />
					<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGIN') ?>" />
					<input type="hidden" name="option" value="com_users" />
					<input type="hidden" name="task" value="user.login" />
					<input type="hidden" name="return" value="<?php echo base64_encode(JURI::base()) ?>" />
					<?php echo JHtml::_('form.token'); ?>					
				</form>
			<?php endif; ?>
			<?php if ($isAdmin): ?>
				<form class="rt-authorized-login-form" action="<?php echo JRoute::_('index.php', true); ?>" method="post" id="rt-form-login">
					<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
					<input type="hidden" name="option" value="com_users" />
					<input type="hidden" name="task" value="user.logout" />
					<input type="hidden" name="return" value="<?php echo $return; ?>" />
					<?php echo JHtml::_('form.token'); ?>
				</form>	
			<?php endif; ?>	
		</section>
		<footer id="rt-footer-surround">
			<div class="rt-footer-surround-pattern">
				<div class="rt-container">
					<div id="rt-copyright">
						<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>
		</footer>
	</div>		
</body>


</html>
<?php

$body = ob_get_clean();
$gantry->finalize();

require_once(JPATH_LIBRARIES.'/joomla/document/html/renderer/head.php');
$header_renderer = new JDocumentRendererHead($doc);
$header_contents = $header_renderer->render(null);
ob_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<?php echo $header_contents; ?>
	<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
	<meta name="viewport" content="width=960px">
	<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
	<meta name="viewport" content="width=1200px">
	<?php else : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php endif; ?>
</head>
<?php
$header = ob_get_clean();
echo $header.$body;