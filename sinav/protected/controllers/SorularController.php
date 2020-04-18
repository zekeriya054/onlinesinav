<?php

class SorularController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */

        public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Sorular;
                $cmodel=new Cevaplar;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $model->sinav_id=$_GET['s_id'];
                $model->soru_tipi=-1;
                
		if(isset($_POST['Sorular']))
		{
		  $model->attributes=$_POST['Sorular'];
                  if(isset($_POST['cevap']))
                    $cevaplar=$_POST['cevap'];
                    $dc=$_POST['dcevap'];
                    if($model->soru_tipi<2)  {
                      foreach($cevaplar as $i=>$c) {
                        $dizi[$i]=0;
                      }
                    if(count($dc)>0) {
                        if($model->soru_tipi==0) {
                            foreach($dc as $i=>$d){
                                $dizi[$d]=1;
                            }
                        }
                        if($model->soru_tipi==1){
                            $dizi[$dc]=1;
                        }
                    }
                   } else $dogru_cevap_metni=$dc;
			if($model->save()) {
                           $i=0;
                            if($model->soru_tipi!=2) {
                                foreach($cevaplar as $c) {
                                   Yii::app()->db->createCommand()->insert('cevaplar', array(
                                       'soru_id'=>$model->id,
                                       'cevap_metni'=>$c,
                                       'dogru_cevap'=>($model->soru_tipi<2) ? $dizi[$i++]:0,
                                       'dogru_cevap_metni'=>($model->soru_tipi>1) ? $dogru_cevap_metni[$i++]:null,
                                   ));
                                   // $sonuc=Yii::app()->db->createCommand("update cevaplar set cevap_metni='".$c."',dogru_cevap=".$dizi[$i]." where id=".$cmodel[$i++]['id'])->execute();
                                }
                            } 
                            else {
                                   Yii::app()->db->createCommand()->insert('cevaplar', array(
                                       'soru_id'=>$model->id,
                                       'cevap_metni'=>null,
                                       'dogru_cevap'=>0,
                                       'dogru_cevap_metni'=>$dogru_cevap_metni
                                   ));
                                     
                            }
                                $this->redirect(array('admin','s_id'=>$model->sinav_id));				
                        }
		}
                $s=SoruTipleri::model()->findAll(array('order'=>'id ASC'));
                $soruTipi = CHtml::listData($s, 'id', 'soru_tipi');
                
                
		$this->render('create',array(
			'model'=>$model,'soruTipi'=>$soruTipi,'cmodel'=>$cmodel,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
       public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $cmodel=$this->loadModelCevap($id);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Sorular']))
		{
                    $model->attributes=$_POST['Sorular'];
                    if(isset($_POST['cevap']))
                         $cevaplar=$_POST['cevap'];
                    $dc=$_POST['dcevap'];
                    if($model->soru_tipi<2)  {
                      foreach($cevaplar as $i=>$c) {
                        $dizi[$i]=0;
                      }
                    if(count($dc)>0) {
                        if($model->soru_tipi==0) {
                            foreach($dc as $i=>$d){
                                $dizi[$d]=1;
                            }
                        }
                        if($model->soru_tipi==1){
                            $dizi[$dc]=1;
                        }
                    }
                   } else $dogru_cevap_metni=$dc;

                    if($model->save()){
                            Yii::app()->db->createCommand()->delete('cevaplar','soru_id=:id',array('id'=>$id));
                            $i=0;
                            if($model->soru_tipi!=2) {
                                foreach($cevaplar as $c) {
                                   Yii::app()->db->createCommand()->insert('cevaplar', array(
                                       'soru_id'=>$id,
                                       'cevap_metni'=>$c,
                                       'dogru_cevap'=>($model->soru_tipi<2) ? $dizi[$i++]:0,
                                       'dogru_cevap_metni'=>($model->soru_tipi>1) ? $dogru_cevap_metni[$i++]:null,
                                   ));
                                   // $sonuc=Yii::app()->db->createCommand("update cevaplar set cevap_metni='".$c."',dogru_cevap=".$dizi[$i]." where id=".$cmodel[$i++]['id'])->execute();
                                }
                            } 
                            else {
                                   Yii::app()->db->createCommand()->insert('cevaplar', array(
                                       'soru_id'=>$id,
                                       'cevap_metni'=>null,
                                       'dogru_cevap'=>0,
                                       'dogru_cevap_metni'=>$dogru_cevap_metni
                                   ));
                                     
                            }
                                $this->redirect(array('admin','s_id'=>$model->sinav_id));
                    }

                    }
                   
  
	

	        $s=SoruTipleri::model()->findAll(array('order'=>'id ASC'));
                $soruTipi = CHtml::listData($s, 'id', 'soru_tipi');
                //$model2=Chtml::listData($cmodel, 'id', 'soru_id');
             //   print_r($cmodel[0]['cevap_metni']);
               // exit();
                $this->render('update',array(
			'model'=>$model,'soruTipi'=>$soruTipi,'cmodel'=>$cmodel,
		));

	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Sorular');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Sorular();
                $model->s_id=$_GET['s_id'];
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Sorular']))
			$model->attributes=$_GET['Sorular'];

		
                $this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Sorular the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Sorular::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	public function loadModelCevap($id)
	{
	    $Criteria = new CDbCriteria();
            $Criteria->condition = "soru_id = $id";
            $cmodel=  Cevaplar::model()->findAll($Criteria);
            if($cmodel===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $cmodel;
                
	}

	/**
	 * Performs the AJAX validation.
	 * @param Sorular $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sorular-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
