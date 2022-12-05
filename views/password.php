<?php 
use app\core\Application;
?>
<div class="card-password">
    <div class="card-header">
        <h1>Change Password</h1>
    </div>
    <div class="text text-success"><?php if(Application::$app->session->getFlash('success')){
        echo "You have changed password success";
    }?></div>
    <div class="card-body">
        <?php $form = app\core\Form\Form::begin('', "post") ?>
           
            <div class="row">
                <div class="col">
                    <?php echo $form->field($model, 'password')->passwordField() ?>
                </div>   
                <div class="col">
                    <?php echo $form->field($model, 'passwordConfirm')->passwordField() ?>
                </div>  
            </div>
            <div class="remember-me">
                <input type="checkbox" required>
                <span style="color: #000000">Confirm change password</span>
            </div>
            <div class="btn">
                <button type="submit" class="button btn-success">Change Password</button>
            </div>
        <?php app\core\form\Form::end() ?>
    </div>
</div>
