<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Events;
use frontend\models\Budget;
use frontend\models\Guest;
use frontend\models\Todo;

$this->title = 'My Event';
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <figure>
        <img src="event-management.jpg" width="100%" height="50%">
            </figure>
        </div>
    </div>
</section>
<div class="site-index container">
    <div class="jumbotron">
        <h1>Events</h1>

        <p class="lead">This is your event planner</p>

        <!-- <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> -->
        
        <div class="index-form">

         <select class="form-control" >
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
        </select> 
    </div>

        <div class="row">
        <div class="col-lg-3 colcust3">
        <div class=" panel panel-default ">
            <div class="panel-heading">
                <h2>Weddings</h2>
            </div>
            <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            </div>
            </div>
           
   
        <div class="col-lg-3 colcust3">
        <div class=" panel panel-default ">
            <div class="panel-heading">
                <h2>Meetings</h2>
            </div>
            <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            </div>
            </div>


            
        <div class="col-lg-3 colcust3 ">
        <div class=" panel panel-default ">
            <div class="panel-heading">
                <h2>ConcertS</h2>
            </div>
            <div class="panel-body">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            </div>
            </div>
        </div>

    </div>
</div>
