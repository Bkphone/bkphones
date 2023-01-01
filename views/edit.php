<?php 
use app\core\Application;
?>
<div class="card-regester" style="width:50%; margin: 0 auto; background: #e7e7e7; padding: 50px;">
    <div class="card-header text-center">
        <h1>Edit User</h1>
    </div>
    <div class="card-body">
        <?php $form = app\core\Form\Form::begin('', "post") ?>
            <div class="row">
                <div class="col">
                    <?php echo $form->field($model, 'firstname') ?>
                </div>
                <div class="col">
                    <?php echo $form->field($model, 'lastname') ?>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <?php echo $form->field($model, 'role') ?>
                </div>
            </div>
            <div class="row">
                
                <div class="col">
                    <?php echo $form->field($model, 'phone_number') ?>
                </div>
            </div> 
            <div class="row">
                <div class="col">
                    <?php echo $form->field($model, 'address') ?>
                </div> 
            </div>
           
            <div class="remember-me">
                <input type="checkbox" required>
                <span style="color: #000000">Confirm update</span>
            </div>
            <div class="btn" style="width: 500px; margin: 15px auto;">
                <button type="submit" class="button btn-success" style="width: 200px;">Update</button>
            </div>
        <?php app\core\form\Form::end() ?>
    </div>
</div>
