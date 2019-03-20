<?php

define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');


//Used template
$template = 'default';
$templateAdmin = 'admin';

//Preffix and suffix for template pathes
define('TemplatePrefix', "../views/{$template}/");
define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', ".tpl");

define('TemplateWebPath',"/templates/{$template}/");
define('TemplateAdminWebPath',"/templates/{$templateAdmin}/");

require '../library/Smarty/libs/Smarty.class.php';

$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');
$smarty->assign('templateWebPath', TemplateWebPath);

