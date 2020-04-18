<?php
/* @var $this SorularController */
/* @var $model Sorular */
/* @var $form CActiveForm */
?>
	<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
<div class="row-fluid">
    <div class="span6">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'sorular-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>



	<?php echo $form->errorSummary($model,$cmodel); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'soru'); ?>
		<?php  $this->widget('application.extensions.ckeditor.CKEditor', array('model'=>$model, 
    'attribute'=>'soru',
    'language'=>'english',
    'editorTemplate'=>'full',
    ));//echo $form->textField($model,'soru',array('size'=>60,'maxlength'=>3800)); ?>
		<?php echo $form->error($model,'soru'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'puan'); ?>
		<?php echo $form->textField($model,'puan',array('size'=>18,'maxlength'=>18)); ?>
		<?php echo $form->error($model,'puan'); ?>
	</div>



        <div class="row">
		<?php echo $form->labelEx($model,'ust_metin'); ?>
		<?php //echo $form->textField($model,'ust_metin',array('size'=>60,'maxlength'=>1500));
                     $this->widget('application.extensions.ckeditor.CKEditor', array('model'=>$model, 
                    'attribute'=>'ust_metin',
                    'language'=>'engish',
                    'editorTemplate'=>'full',
    ));                
                
		?>
		<?php echo $form->error($model,'ust_metin'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'alt_metin'); ?>
		<?php //echo $form->textField($model,'alt_metin',array('size'=>60,'maxlength'=>1500)); 
                     $this->widget('application.extensions.ckeditor.CKEditor', array('model'=>$model, 
                    'attribute'=>'alt_metin',
                    'language'=>'engish',
                    'editorTemplate'=>'full',
    ));              
                
                
                ?>
		<?php echo $form->error($model,'alt_metin'); ?>
	</div>
    	<div class="row">
		<?php echo $form->labelEx($model,'soru_tipi'); ?>
		<?php echo $form->dropDownList($model,'soru_tipi',$soruTipi,array('prompt'=>'Seçim yapınız...',));//$form->textField($model,'soru_tipi'); ?>
		<?php echo $form->error($model,'soru_tipi'); ?>
	</div>

   <?php if(!($model->isNewRecord)):?>
	<div class="row">
             <?php echo $form->labelEx($cmodel[0],'cevap_metni',array('class'=>'span3')); ?>
             <?php if($model->soru_tipi==3) echo $form->labelEx($cmodel[0],'dogru_cevap_metni',array('class'=>'span3','id'=>'dcm'));?>
         </div>

    <?php foreach($cmodel as $i=>$cm) {?>
        <div class="row" id="row<?php echo $i;?>">
              <div class="input-append">  
		<?php echo $form->textField($cm,$model->soru_tipi==2 ? 'dogru_cevap_metni':'cevap_metni',array('size'=>60,'maxlength'=>800,'name'=>$model->soru_tipi==2 ? 'dcevap':'cevap[]','id'=>$model->soru_tipi==2 ? 'dcevap':'cevap'.$i,'class'=>'')); ?>
        	<?php echo $form->error($cm,'cevap_metni'); ?>
                <?php // echo '<button type="button" id="bt'.$i.'" class="'.($model->soru_tipi<2 ?'btn':'btn btn-link').'">'; ?>
                <?php 
                        if($model->soru_tipi==0)
                            echo $form->checkBox($cm,'dogru_cevap',array('id'=>'dcevap'.$i,'name'=>'dcevap[]','checked'=>($cm->dogru_cevap)? 'checked':'','uncheckValue' => null,'value'=>$i)); 
                        if($model->soru_tipi==1)
                            echo $form->radioButton($cm, 'dogru_cevap', array('id'=>'dcevap'.$i,'name'=>'dcevap','checked'=>($cm->dogru_cevap) ? 'checked':'','value'=>$i,'uncheckValue'=>null));
                        if($model->soru_tipi==3) 
                            echo $form->textField($cm,'dogru_cevap_metni',array('id'=>'dcevap'.$i,'size'=>60,'maxlength'=>800,'name'=>'dcevap[]','style'=>'margin-left:10px'));   
                
                ?>
               
           </button>
            </div>
         </div>
    <?php } 
  endif;
    ?>
<div id='TextBoxesGroup' class="row">

</div>
<?php if($model->soru_tipi!=2):?>
 <div class="row" style="margin-bottom:6px">
    <input type='hidden' value='<?php echo $i;?>' id='sayi'/>
    <input type='button' value=' + ' id='addButton'  class="btn btn-primary btn-small"/>
    <input type='button' value=' - ' id='removeButton'  class="btn btn-primary btn-small"/>
 </div>
 <?php endif;?>

	<div class="row">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Kaydet' : 'Kaydet',array('class'=>'btn btn-primary')); ?>
                <?php echo CHtml::link('   İptal   ',array('sorular/admin&s_id='.($model->isNewRecord ? $_GET['s_id']:$model->sinav_id)),array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
    </div>
</div>

<script type="text/javascript">
 
$(document).ready(function(){
 
    var counter = $('#sayi').val();
    counter++;
    var n=$('input[type=text]').length-3;
    var metin=[];
    var secim=$("#Sorular_soru_tipi").val();
    var oncekiSecim=secim;
    if(secim>1) {
        for(i=0;i<n;i++) metin[i]=$('#dcevap'+i).val();
    }
   $("#Sorular_soru_tipi").change(function(){
      secim=$("#Sorular_soru_tipi").val();
      n=$('input[type=text]').length-1;
        if(oncekiSecim==2){
            $("#row0").remove();
 
        }

        if(n==0) {
 
         var satir='';
          if(secim==0) {
           for(i=0;i<4;i++) { 
              satir=satir+'<div class="row" id="row'+i+'">'+
              '<div class="input-append">'+
              '<input size="60" maxlength="800" name="cevap[]"'+
              'id="cevap'+i+'" type="text" value="">'+
              '<input id="dcevap'+i+'" name="dcevap[]" value="'+i+'" type="checkbox"></div></div>';  
               counter++;
            }
           counter--;
        }  
        if(secim==1) {
           for(i=0;i<4;i++) { 
               satir=satir
               +'<div class="row" id="row'+i+'">'
               +'<div class="input-append">'
               +'<input size="60" maxlength="800"'
               +'name="cevap[]" id="cevap'+i+'" type="text"' 
               +'value="">'
               +'<input id="dcevap'+i+'" name="dcevap" value='+i+' type="radio"></div></div>';
               counter++;
            }
            counter--;
        }
        if(secim==2) {
           var satir='<div class="row" id="row0">'+
              '<div class="input-append">'+  
		'<input size="80" name="dcevap" id="dcevap" type="text" value="">'+
                '<button type="button" id="bt0" class="btn btn-link"></button></div></div>';
           $('#addButton').css({'display':'none'});
           $("#removeButton").css({'display':'none'});
          }
        if(secim==3){
            for(i=0;i<4;i++) { 
                satir=satir
                 +'<div class="row" id="row'+i+'">'
                 +'<div class="input-append">'  
                +'<input size="80"'
                 +'name="cevap[]" id="cevap'+i+'"type="text"' 
                 +'value="">'
                 +'<input size="80" style="margin-left:5px;" id="dcevap'+i+'" name="dcevap[]" value="" type="text"></div></div>';
                counter++;
             }
             counter--;
        }
           
     
       	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("class", 'row');
	newTextBoxDiv.after().html(satir);
	newTextBoxDiv.appendTo("#TextBoxesGroup");
 
       }
       if(secim==0 && n!=0) {
            for(i=0;i<n;i++) {
               $('#dcevap'+i).prop('type','checkbox');
               $('#dcevap'+i).prop('name','dcevap[]');
               $('#dcevap'+i).attr('value',i);
               $('#bt'+i).attr('class','btn');
               $('#bt'+i).css({
                   'margin-top':'0'
               });
             //  $('#dcevap'+i).prop('id','dcevap');
            }
          
        }
        if(secim==1 && n!=0) {
           for(i=0;i<n;i++) {
               $('#dcevap'+i).prop('type','radio');
               $('#dcevap'+i).prop('name','dcevap');
               $('#dcevap'+i).attr('value',i);
               $('#bt'+i).attr('class','btn');
               $('#bt'+i).css({
                   'margin-top':'0'
               });
            //   $('#dcevap'+i).prop('id','dcevap');
            }
         
        }
        if(secim==2 && n!=0) {
             oncekiSecim=2; 
             for(i=0;i<n;i++) {
               $("#row" + i).remove();
               counter--;
            }
            $('#dcm').remove();
           var satir='<div class="row" id="row0">'+
              '<div class="input-append">'+  
		'<input size="80" name="dcevap" id="dcevap"  type="text" value="">'+
                '<button type="button" id="bt0" class="btn btn-link"></button></div></div>';     
           $('#TextBoxesGroup').append(satir);
           $('#addButton').css({'display':'none'});
           $("#removeButton").css({'display':'none'});
        }         
        if(secim==3 && n!=0) {
            oncekiSecim=3;
             for(i=0;i<n;i++) {
               $('#dcevap'+i).prop('type','text');
               $('#dcevap'+i).prop('name','dcevap[]');
               $('#dcevap'+i).val(metin[i]);
               $('#bt'+i).attr('class','btn btn-link');
               $('#bt'+i).css({
                   'margin-top':'-4px'
               });

            }
         
        }   
        
       
    
    });
    $("#addButton").click(function () {
	if(counter>10){
            alert("En fazla 10 adet cevap");
            return false;
	}   
        var satir=$( "#row0" ).html();
        var secim=$("#Sorular_soru_tipi").val();
	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'row' + counter);

	newTextBoxDiv.after().html(satir);
	newTextBoxDiv.appendTo("#TextBoxesGroup");
         //$('#row'+counter+' input[type=text]:first').prop('value','');
         $('input[type=text]:last').prop('value','');
         $('input[type=text]:last').attr("id",'cevap'+counter);
         $('input[type=checkbox]:last').prop("checked",false);
         $('input[type=checkbox]:last').attr("value",counter);
         $('input[type=radio]:last').attr("id",'cevap'+counter);
         $('input[type=radio]:last').prop("checked",false);
         $('input[type=radio]:last').attr("value",counter);
         
   	 counter++;
      });
 
     $("#removeButton").click(function () {
	if(counter==1){
          alert("Daha fazla silemezsiniz...");
          return false;
       }   
 	counter--;

 
        $("#row" + counter).remove();
 
     });
 
     $("#getButtonValue").click(function () {
 
	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#cevap' + i).val();
	}
    	  alert(msg);
     });
  });
</script>