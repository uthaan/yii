<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="4-screen logic exercise">
    <meta name="author" content="Vladimir Koval">

    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="<?php echo Yii::app()->theme->baseUrl; ?>/css/justified-nav.css" rel="stylesheet">
</head>

<body class="bpadt">

<div class="container">
    <h3 class="text-muted"><?php echo CHtml::encode(Yii::app()->name); ?></h3>
    <div id="mainmenu" class="nav nav-justified">
        <?php $this->widget('zii.widgets.CMenu',array(
            'htmlOptions' => array( 'class' => 'nav nav-justified'),
            'items'=>array(
                array('label'=>'Home', 'url'=>array('/site/index')),
                array('label'=>'Register', 'url'=>array('/site/register'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
            ),
        )); ?>
    </div>
    <div class="bpadt">
        <?php echo $content; ?>
        <br clear='all' />
    </div>
    <div class="footer">
        <p>&copy; Jedi powered 2014 </p>
    </div>
</div>

<script src='http://code.jquery.com/jquery-2.1.1.min.js'></script>
<script src="<?php echo Yii::app()->theme->baseUrl; ?>/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>