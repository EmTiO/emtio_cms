<?php

class MessagesController extends Controller
{
        public $defaultAction = 'inbox';
        
	
	/**
	 *
	 */
	public function actionInbox () {
			$messages = Messages::model()->findAllByAttributes(array('receiver_id'=>Yii::app()->user->id));
			$this->render('/messages/inbox',array('model'=>$messages));
	}
        
        public function actionOutbox () {
			$messages = Messages::model()->findAllByAttributes(array('author_id'=>Yii::app()->user->id));
			$this->render('/messages/outbox',array('model'=>$messages));
	}
        
        public function actionView ($id) {
                        $mes = Messages::model()->findByAttributes(array('id'=>$id));
                        if ($mes->status==1){
                            $mes->status=0;
                            $mes->save();
                        }
                        
                        if ($mes->author_id==Yii::app()->user->id || $mes->receiver_id==Yii::app()->user->id){
                            $this->render('/messages/view',array('model'=>$mes));
                        }  else {
                            die('Ошибка');
                        }
                                
        }


        public function actionCreate () {
            
                        $model = new Messages;
                        if(isset($_POST['Messages']))
                            {
                                  $model->attributes=$_POST['Messages'];
                                  $model->data = time();
                                  $model->author_id = Yii::app()->user->id;
                                  if($model->save())
                                  $this->redirect('/index.php/user/messages/');
                            }
			$this->render('/messages/create',array('model'=>$model));
	}
        
}