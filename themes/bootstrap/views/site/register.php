<?php
$this->pageTitle=Yii::app()->name . ' - Registration';
?>

<div class="bpadb fs24">
    Registration form
</div>

<div class="form">
    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'RegisterForm',
        'enableClientValidation'=>false,
    )); ?>

    <div class="fields">
        <?php echo $form->textField($model,'email', array('class'=>"form-control", 'placeholder'=>"E-mail" )); ?>
        <?php echo $form->textField($model,'username', array('class'=>"form-control", 'placeholder'=>"Username" )); ?>
        <?php echo $form->passwordField($model,'password', array('class'=>"form-control", 'placeholder'=>"Password" )); ?>
        <?php echo $form->passwordField($model,'password2', array('class'=>"form-control", 'placeholder'=>"Retype your password" )); ?>

        <?if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
            <?$this->widget('CCaptcha')?>
            <?=CHtml::activeTextField($model, 'verifyCode', array('class'=>"form-control", 'placeholder'=>"Put verification code here" ))?>
        <?endif?>
        <input type="submit" class="btn btn-primary" value="Register">
    </div>

    <div class="col_red">
        <?php
            echo $form->error($model,'email');
            echo $form->error($model,'username');
            echo $form->error($model,'password');
            echo $form->error($model,'password2');
            echo $form->error($model,'verifyCode');
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div><!-- form -->