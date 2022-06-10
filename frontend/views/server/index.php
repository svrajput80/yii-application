<?php

/** @var yii\web\View $this */

// use yii\helpers\Html;
use frontend\assets\AboutAsset;
use frontend\controllers\ServerController; 
// use yii\helpers\ArrayHelper;

AboutAsset::register($this);

$this->title = 'Server';
// $this->params['breadcrumbs'][] = $this->title;
?>


<?//= $form->field($model, "countryes")->dropDownList( [$post->country_name=>$post->country_name]) ?>

<?php 

$result = ServerController::Country(); 
// print_r($result);
$c = 0;
echo "<span><button value= ".count($result)." class='all'>All (".count($result).")</button> | </span>";
foreach($result as $i){
    echo "<span><button value= ".$i['County']." class='clk'>".$i['County']." (". $i['CNT'].")</button> | </span>";
    $c = $c + 1;
    if($c > 11){
        break;
    }
}
?>  
<div class="container">
<table class="display nowrap" cellspacing="5" cellpadding="5">
        <tbody><tr>
            <td>date:</td>
            <td><input type="date" id="min" name="min"></td>
        </tr>
    </tbody>
</table>

<p>
  Countryes <span id="result"></span>
</p>

    <table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
            <th class='check'></th>
            <th class ="ZipCode">ZipCode</th>
            <th class = "StateFullName">StateFullName</th>
            <th class = "City">City</th>
            <th class = "County">County</th>
            <th class = "TimeZone">TimeZone</th>
            <th class = "Status">Status</th>
            <th>date</th>
            
            </tr>
        </thead>
    </table>

<p class="form-group">
<select name="value" id="status">
  <option value="Y">Yes</option>
  <option value="N">No</option>
</select>
   <button type="submit" id='frm-example' class="btn btn-primary">Submit</button>
</p>
</div>
<!-- <pre id="example-console-rows"></pre>
<pre id="example-console-form"></pre> -->

<?php
    $this->registerJs(
    " 
    
    $(document).ready(function () {
      var table = $('#example').DataTable({
        dom: \"<lf<Bt>ip>\",
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        
        'processing': true,
        'serverSide': true,
        ajax: {
            url:'http://frontend.test/server/serverside',  
            type: 'GET'
        },        
          columnDefs: [
              {
               'targets': 0,
               'checkboxes': {
                  'selectRow': true
               }
              },
          ],
          'select': {
            'style': 'multi'
         },
         'order': [[1, 'asc']],
      });
   
      $('#example tbody').on('click', 'button', function () {
          var data = table.row($(this).parents('tr')).data();
          console.log(data);
          $.ajax({
            type: 'POST',
            url: 'http://frontend.test/server/changestatus',
            data:
            {
            zipecode_id: data[0],
            value: data[6],
            },
            success: function(result)
            {
             table.ajax.reload();
            }
        });
          
      });

      // Handle form submission event
      $('#frm-example').on('click', function(e){
         var form = this;
         var status =  $('#status').val();
         console.log(status);
         var rows_selected = table.column(0).checkboxes.selected();
         // Iterate over all selected checkboxes
         $.each(rows_selected, function(index, rowId){
            // Create a hidden element
            console.log(rowId);
            $.ajax({
                type: 'POST',
                url: 'http://frontend.test/server/serversave',
                data:
                {
                zipecode_id: rowId,
                value: status,
                },
                success: function(result)
                {
                 table.ajax.reload();
                }
            });
         });
      });
      $(document).on('change','.slct', function() {
         var responseId = $(this).val();
         console.log(123,responseId);
         var data = table.row($(this).parents('tr')).data();
         console.log(123,data);
         $.ajax({
            type: 'POST',
            url: 'http://frontend.test/server/change',
            data:
            {
            zipecode_id: data[0],
            value: responseId,
            },
            success: function(result)
            {
             table.ajax.reload();
            }
         });
      });
      $(document).ready(function(){
        // Redraw the table
        // table.draw();
        
        // Redraw the table based on the custom input
            $('#min').bind('change', function(){
                // table.draw();
                console.log($(this).parent().index(5),$(this).parent() )
                table
                .column( $(this).parent().index(5)+':visible' )
                .search( this.value )
                .draw();

                // table.rows().count();
            });        
        });

        $(document).ready(function() {
            // Redraw the table
            // table.draw();
            // var data = table.row($(this).parents('tr')).data();
            // console.log(123,responseId);
            $('.clk').on('click', function(){
                var responseId = $(this).val();
                console.log(123,responseId, $(this).parent().index(4));
                // table.draw();
                table
                .column(4)
                .search( responseId )
                .draw();
            });         
            });

            $(document).ready(function() {
                // Redraw the table
                // table.draw();
                // var data = table.row($(this).parents('tr')).data();
                // console.log(123,responseId);
                $('.all').on('click', function(){
                    // table.destroy();
                    // table.ajax.reload();
                    window.location.reload() 
                });         
                });
});

    "
    );

?>