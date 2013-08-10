<?php

class NewsController extends Controller
{
	public function actionIndex($id=NULL)
	{
	    if($id)
                {
                $models = News::model()->findAllByAttributes(array('category_id'=>$id));	
                $this->render('index',array('models'=>$models));
             }else{
                $criteria=new CDbCriteria();
                $count=News::model()->count($criteria);
                $pages=new CPagination($count);

                // новостей на странице
                $pages->pageSize=5;
                $pages->applyLimit($criteria);
                $models=News::model()->findAll($criteria);

                $this->render('index', array(
                    'models' => $models,
                    'pages' => $pages
                ));   
            }
	}
        
        public function actionView($id) {
            $model = new Comments;
            $new = $this->loadModel($id);
            $new['views']=$new['views']+1;
            $new->save();
            
            if (!$new){$this->redirect('/');}
            $comment = Comments::model()->findAllByAttributes(array('page_id'=>$id));
            
            if(isset($_POST['Comments']))
		{
                        $_POST['Comments']['created'] = time();
                        $_POST['Comments']['user_id'] = Yii::app()->user->id;
                        $_POST['Comments']['page_id'] = $id;
                        $model->attributes=$_POST['Comments'];
                        if($model->save())
                           $this->redirect(array('view','id'=>$id));
		}
            $this->render('view',array('new'=>$new,'comment'=>$comment,'model'=>$model));
        }
        
        public function actionUpdate($id)
	{
		if (!Yii::app()->user->checkAccess('3')) die("Нет доступа");
                
                $model=$this->loadModel($id);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
        
        
        public function loadModel($id)
	{
		$model=News::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}