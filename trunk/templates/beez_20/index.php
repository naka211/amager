<?php
// No direct access.
defined('_JEXEC') or die;

//jimport('joomla.filesystem.file');

// check modules
//$showRightColumn	= ($this->countModules('position-3') or $this->countModules('position-6') or $this->countModules('position-8'));

//JHtml::_('behavior.framework', true);

// get params
//$doc				= JFactory::getDocument();
//$app				= JFactory::getApplication();
//$color				= $this->params->get('templatecolor');
//$logo				= $this->params->get('logo');
//$navposition		= $this->params->get('navposition');
//$templateparams		= $app->getTemplate(true)->params;

//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/layout.css', $type = 'text/css', $media = 'screen,projection');
//$doc->addStyleSheet($this->baseurl.'/templates/'.$this->template.'/css/print.css', $type = 'text/css', $media = 'print');

//$doc->addScript($this->baseurl.'/templates/'.$this->template.'/javascript/hide.js', 'text/javascript');

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>" >
<head>
<!--Style-->
<jdoc:include type="head" />
<!--Script-->
</head>

<body>

<jdoc:include type="modules" name="position-0" />
<jdoc:include type="modules" name="position-7" style="beezDivision" headerLevel="3" />
<jdoc:include type="modules" name="position-4" style="beezHide" headerLevel="3" state="0 " />
<jdoc:include type="modules" name="position-5" style="beezTabs" headerLevel="2"  id="3" />

<jdoc:include type="message" />
<jdoc:include type="component" />

<jdoc:include type="modules" name="debug" />
</body>
</html>
