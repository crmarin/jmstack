<?php
/* @var $this AlbumController */
/* @var $model Album */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'album-form',
	'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php if ($model->isNewRecord != '1'){ ?>
    <div class="row">
        <?php
        if($model->album_img!=NULL)
        {
            ?>
            <?php
            echo CHtml::image(Yii::app()->request->baseUrl.'/images/album/'.$model->album_img,"image",array("width"=>150));
        }
        else  echo CHtml::image(Yii::app()->request->baseUrl.'/images/www/no_image.jpg',"image",array("width"=>150));
        ?>
    </div>
    <?php } ?>
    <div class="row">
        <?php echo $form->labelEx($model,'album_img'); ?>
        <?php echo CHtml::activeFileField($model,'album_img'); ?>
        <?php echo $form->error($model,'album_img'); ?>
    </div>

	<div class="row">

        <div style="float: left;margin-right: 20px;width: 694px">
		<?php echo $form->labelEx($model,'album_name'); ?>
		<?php echo $form->textField($model,'album_name',array('size'=>60,'maxlength'=>255)); ?>
        <?php
        /*$this->widget('zii.widgets.jui.CJuiTabs', array(
            'tabs' => array(
                'English' =>$form->telField($model, 'album_name', array('type' => 'text', 'class' => 'form-control span12')),
                'Vietnamese' =>$form->telField($model, 'name_vi', array('type' => 'text', 'class' => 'form-control span12')),
            ),
            'options' => array(
                'collapsible' => true,
            ),
        ));*/
        ?>
		<?php echo $form->error($model,'album_name'); ?>
        </div>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'order_number'); ?>
        <?php echo $form->textField($model,'order_number'); ?>
        <?php echo $form->error($model,'order_number'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status', array(1=>'Active',0=>'Inactive')); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>

    <br>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->


