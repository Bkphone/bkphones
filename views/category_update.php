<div class="row" style="margin: 0px auto;width: 700px">
    <h3>QUẢN LÝ DANH MỤC SẢN PHẨM</h3>
    <?php

use app\core\Form\Field;

 $form = app\core\Form\Form::begin('', "post") ?>
    <div class="row">
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'name') ?>
        </div>
        
        <div class="col">
            <button type="submit" class="btn btn-warning" style="margin:10px 0;">Cập nhật</button>
        </div>
    </div>
    <?php app\core\form\Form::end() ?>
</div>