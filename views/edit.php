<?php 
use app\core\Application;
?>
<div class="card-regester">
    <div class="card-header">
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
            <div class="btn">
                <button type="submit" class="button btn-success">Update</button>
            </div>
        <?php app\core\form\Form::end() ?>
    </div>
</div>
