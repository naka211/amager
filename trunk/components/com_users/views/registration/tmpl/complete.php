<?php
/**
 * @package		Joomla.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.6
 */

defined('_JEXEC') or die;
?>
<div id="signup-page">
    <div id="w-signup-page">
    <div class="signup-title">
        <h2>Kvittering</h2>
    </div><!--.signup-title-->
    		<p style="margin-left:10px; margin-top:10px;">Kære kunde, <br>Din konto er oprettet. Klik nedenstående link for at logge ind.<br><br>
        Med venlig hilsen<br>
        Amager Isenkram
        </p>
        <div style="float:none; margin-left:10px; margin-bottom:20px;">
        <a href="javascript:void(0);" data-reveal-id="myModal">Login</a>
        </div>
	    </div><!--#w-signup-page-->
</div>
<?php return;?>
<div class="registration-complete<?php echo $this->pageclass_sfx;?>">
	<?php if ($this->params->get('show_page_heading')) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_heading')); ?>
	</h1>
	<?php endif; ?>
</div>
