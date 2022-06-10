<?php 
   namespace app\controllers; 
   namespace backend\controllers;
   use yii\web\Controller; 
   use common\models\Country;
   use common\models\Zipcode;
   class UserController extends Controller { 
      public function actionIndex() { 

         // $cnt = Countryes:: find()->all();
         // print_r($cnt);
      //   return $cnt;
         // return 'Hello Shashank';

         return $this->render('index');
         // $message = "index action of the ExampleController"; 
         // return $this->render("example",[ 
         //    'message' => $message 
         // ]); 
      } 

   public function actionCnt()
    {
        $cnt = Country:: find()->all();
        print_r($cnt);
      //   return $cnt;
    }

    public function actionServerside()
    {
        echo 'shashank';
        $cnt = Zipcode:: find()->all();
        // return $this->render('SingupForm', [
        //     'data'=>$cnt]);

        return $this->render('index', ['data'=>$cnt]);
    }
   } 
?>