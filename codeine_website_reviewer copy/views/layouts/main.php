<!DOCTYPE html>
<html lang="<?php echo Yii::app() -> language ?>">
<head>
<meta charset="utf-8">
<title><?php echo $this -> title ?></title>
<link rel="icon" href="<?php echo Yii::app()->request->getBaseUrl(true) ?>/favicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="codeine.xyz">
<meta name="dc.language" content="<?php echo Yii::app() -> language ?>">
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="<?php echo Yii::app()->request->getBaseUrl(true); ?>/css/app.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!--[if lte IE 8]>
<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->request->getBaseUrl(true) ?>/js/excanvas.min.js"></script>
<![endif]-->
<?php Yii::app()->clientScript->registerCoreScript('jquery') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl(true).'/js/bootstrap.min.js') ?>
<?php Yii::app()->clientScript->registerScriptFile(Yii::app()->request->getBaseUrl(true).'/js/base.js') ?>
</head>

<body>

<div class="container-narrow">

<div class="masthead">
<ul class="nav nav-pills pull-right">
<li<?php echo ($this -> id == "site" AND $this -> action -> id == "index") ? ' class="active"' : ''; ?>><a href="<?php echo Yii::app()->request->getBaseUrl(true); ?>"><?php echo Yii::t("app", "Home") ?></a></li>
<li<?php echo $this -> id == "rating" ? ' class="active"' : ''; ?>><a href="<?php echo $this->createAbsoluteUrl("rating/index") ?>"><?php echo Yii::t("app", "Rating") ?></a></li>
<li<?php echo $this -> action -> id == "contact" ? ' class="active"' : ''; ?>><a href="<?php echo $this->createAbsoluteUrl("site/contact") ?>"><?php echo Yii::t("app", "Contact Us") ?></a></li>
<?php $this -> widget('application.widgets.LanguageSelector'); ?>
</ul>
<h3 class="muted"><?php echo Yii::app()->name ?></h3>
</div>

<hr>
<?php echo $content ?>
<hr>

<div class="footer">
<p>
<?php echo Yii::t("app", "Developed by {Himanshu Tiwari}", array(
	"{Himanshu Tiwari}" => '<strong><a href="http://codeine.xyz"> Himanshu Tiwari</a></strong>',
)); ?>
<?php if(!empty(Yii::app()->params['pagePeekerVerify'])): ?>
    &nbsp;|&nbsp;
    <?php echo Yii::app()->params['pagePeekerVerify']; ?>
<?php endif; ?>
</p>
</div>

</div> <!-- /container -->
</body>
</html>