<h1><?php echo $this -> title ?></h1>

<?php
$flashMessages = Yii::app()->user->getFlashes();
if ($flashMessages):foreach($flashMessages as $key => $message):?>
<div class="alert alert-<?php echo $key?>">
<?php echo $message ?>
</div>
<?php endforeach; endif; ?>

<p><?php echo Yii::t("app", "Contact page text") ?></p>

<br/>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'stateful' => true,
)); ?>

<p class="note"><?php echo Yii::t("app", "Fields with * are required") ?></p>

<?php echo $form->errorSummary($model); ?>

    <div class="row-fluid">
        <div class="span4">
            <div class="control-group">
                <?php echo $form->labelEx($model, 'name'); ?>
                <?php echo $form->textField($model, 'name'); ?>
            </div>
        </div>
        <div class="span4">
            <div class="control-group">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email'); ?>
            </div>
        </div>
    </div>


    <div class="row-fluid">
        <div class="span6">
            <div class="control-group">
                <?php echo $form->labelEx($model, 'subject'); ?>
                <?php echo $form->textField($model, 'subject', array('size'=>60,'maxlength'=>128)); ?>
            </div>
        </div>
    </div>


    <div class="row-fluid">
        <div class="span7">
            <div class="control-group">
                <?php echo $form->labelEx($model, 'body'); ?>
                <?php echo $form->textArea($model, 'body', array('rows'=>6, 'class'=>'full-width')); ?>
            </div>
        </div>
    </div>


<?php if(Utils::isRecaptchaEnabled()): ?>
    <div class="control-group margin-top-15<?php echo $model->hasErrors("recaptcha") ? " error" : null ?>">
        <div class="controls">
            <?php $recaptchaConf = Utils::loadConfig('recaptcha'); ?>
            <?php $this->widget("ext.recaptcha2.ReCaptcha2Widget", array(
                "siteKey"=>$recaptchaConf['public-key'],
                'model'=>$model,
                'attribute'=>'recaptcha',
                "wrapperOptions"=>array(
                    'class'=>'recaptcha_wrapper'
                ),
            )) ?>
            <div class="clearfix"></div>
        </div>
    </div>
<?php elseif(CCaptcha::checkRequirements()): ?>
    <div class="control-group margin-top-15">
        <?php echo $form->labelEx($model, 'verifyCode', array('class'=>'control-label')); ?>
        <div class="controls">
            <?php $this->widget('CCaptcha'); ?>
            <span class="help-inline">
                <?php echo $form->textField($model, 'verifyCode'); ?>
            </span>
        </div>
    </div>
<?php endif; ?>

    <div class="row-fluid">
        <div class="span12">
            <div class="control-group margin-top-20 submit">
                <?php echo CHtml::submitButton(Yii::t("app", "Submit"), array(
                    'class' => 'btn btn-large btn-primary',
                )); ?>
            </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->