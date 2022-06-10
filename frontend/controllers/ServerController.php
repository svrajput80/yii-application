<?php 

namespace frontend\controllers;
use common\models\Zipcode;
use frontend\components\SSP\SSP;
use Yii;
use yii\base\Controller;
use yii\db\Query;

// use assets\AppAssets;
// use web\ssp;

class ServerController extends Controller
{

    public function actionServerside()
    {
        // $cnt = Zipcode:: find()->all();
        // // return $this->render('SingupForm', [
        // //     'data'=>$cnt]);

        // return $this->render('index', ['data'=>$cnt]);
        $table = 'zipcode';
 
        // Table's primary key
        $primaryKey = 'ZipCode';
        
        // Array of database columns which should be read and sent back to DataTables.
        // The `db` parameter represents the column name in the database, while the `dt`
        // parameter represents the DataTables column identifier. In this case simple
        // indexes
        $columns = array(
            array( 'db' => 'ZipCode', 'dt' => 0 ),
            array( 'db' => 'ZipCode', 'dt' => 1 ),
            array( 'db' => 'StateFullName',  'dt' => 2 ),
            array( 'db' => 'City',   'dt' => 3 ),
            array( 'db' => 'County',     'dt' => 4 ),
            array( 'db' => 'TimeZone',     'dt' => 5 ),
            array( 'db' => 'MailingName',     'dt' => 6,
            'formatter' => function( $d ) {

                return $d == 'Y' ? '<select class="slct" style="width: 50px;background-color: #6fdfe3;font-size: larger;"><option value = "Y" selected>Y</option><option value = "N">N</option></select>' : '<select class="slct" style="width: 50px;background-color: #ff3030;font-size: larger;"><option value = "Y" >Y</option><option value = "N" selected>N</option></select>';
            }
            ),
            array( 'db' => 'date', 'dt' => 7
            // 'formatter' => function( $d ) {
            //     return "<button class='btn btn-dark' type='button' value=$d>change</button>";
            // }
            ),
    );
        
        // SQL server connection information
        $sql_details = array(
            'user' => 'root',
            'pass' => '',
            'db'   => 'test',
            'host' => 'localhost'
        );
        
        /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        * If you just want to use the basic configuration for DataTables with PHP
        * server-side, there is no need to edit below this line.
        */
        
        // require( 'web/ssp.class.php' );
        // $new = new SSP();
        $value =  json_encode(
            SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
            );
        echo $value;

    }


    public function Country(){

        
        // $result = Yii::$app->db;
        // $result->createCommand(' select County, count(ID) from zipcode where County != " " GROUP BY County ')->execute();

        $query = new Query();
        $query->select(['County', 'COUNT(ID) as CNT'])
        ->from('zipcode')
        ->where('County != " "')
        ->groupBy(['County']);
        // $rows = $query->all();
        $command = $query->createCommand();
// $command->sql returns the actual SQL
        $result = $command->queryAll();
        return $result;
    }

    public function actionIndex()
    {
        // echo 'shashank';
        // $cnt = Zipcode:: find()->all();
        // return $this->render('SingupForm', [
        //     'data'=>$cnt]);

        return $this->render('index');
    }

    public function actionServersave()
    {
        $id = $_POST['zipecode_id'];
        $value = $_POST['value'];
        
        // $id = 00501;

        $connection = Yii::$app->db;
        $connection->createCommand()->update('zipcode', ['MailingName' => $value], 'Zipcode ='.$id)->execute();

        // $model = Zipcode::find($id);
        // print_r($model);
        // $model->MailingName = 'Y';
        // $model->save();
        // echo 'shashank';
        // $cnt = Zipcode:: find()->all();
        // return $this->render('SingupForm', [
        //     'data'=>$cnt]);

        echo $id;
        // return $this->refresh();
        // return $this->render($id);
    }

    public function actionChange()
    {
        $id = $_POST['zipecode_id'];
        $value = $_POST['value'];
        // $id = 00501;

        // if($value == "<span style=\"font-family: Wingdings;color:#00a300;\">&#x2714;</span>")
        // {
        //     $value = 'N';
            
        // }else if($value == "<span style=\"font-family: Wingdings;color: #dd0000;\">&#x2718;</span>"){
        //     $value = 'Y';
        // }

        $connection = Yii::$app->db;
        $connection->createCommand()->update('zipcode', ['MailingName' => $value], 'Zipcode ='.$id)->execute();

        echo $id;
    }

}