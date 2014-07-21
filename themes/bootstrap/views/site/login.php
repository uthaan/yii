<?php
$this->pageTitle=Yii::app()->name . ' - Login';
?>

<div class="bpadb fs24">
    <?php
        if(isset($_GET['success'])) echo "Registered succeed. You can login now";
        else echo "Please login to access private data";
    ?>
</div>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
    )); ?>

	<div class="fields">
		<?php echo $form->textField($model,'email', array('class'=>"form-control", 'placeholder'=>"E-mail" )); ?>
		<?php echo $form->passwordField($model,'password', array('class'=>"form-control", 'placeholder'=>"Password" )); ?>

        <?if(CCaptcha::checkRequirements() && Yii::app()->user->isGuest):?>
            <?$this->widget('CCaptcha')?>
            <?=CHtml::activeTextField($model, 'verifyCode', array('class'=>"form-control", 'placeholder'=>"Put verification code here" ))?>
        <?endif?>
        <input type="submit" class="btn btn-primary" value="Login">
	</div>

    <div class="col_red">
        <?php
            echo $form->error($model,'email');
            echo $form->error($model,'password');
            echo $form->error($model,'verifyCode');
        ?>
    </div>
    <?php $this->endWidget(); ?>
</div>
