<div class="row" style="margin: 0px auto;width: 700px">
    <h3>QUẢN LÝ SẢN PHẨM</h3>
    <?php

use app\core\Form\Field;

 $form = app\core\Form\Form::begin('', "post") ?>
    <div class="row">
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'name') ?>
        </div>
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'price_show', Field::TYPE_NUMBER) ?>
        </div>
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'price_through', Field::TYPE_NUMBER) ?>
        </div>
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'discount', Field::TYPE_NUMBER) ?>
        </div>
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'image_url') ?>
        </div>
        <div class="col" style="margin-bottom: 10px;">
            <?php echo $form->field($model, 'description') ?>
        </div>
        <div class="col" style="margin-bottom: 10px;">
            <div class="mb-3">
                <label for="category_id" class="form-label">Danh mục: </label>
                <select name="category_id" class="form-control" id="category_id" style="height: 35px;border: 1px solid #c9c7c7;border-radius:5px;">
                    <?php foreach ($params['category'] as $cate) : ?>
                        <option value="<?php echo $cate->id ?>" <?php if ($params['model']->category_id == $cate->id) {echo "selected";} ?>><?php echo $cate->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <!-- <div class="col" style="margin-bottom: 10px;">
            <div class="mb-3">
                <label for="status" class="form-label">Trạng thái: </label>
                <select name="status" class="form-control" id="status" style="height: 35px;border: 1px solid #c9c7c7;border-radius:5px;">
                    <option value="available">Available</option>
                    <option value="out_of_stock">Out of Stock</option>
                </select>
            </div>
        </div> -->
        <div class="col">
            <button type="submit" class="btn btn-success" style="margin:10px 0;display:<?php if ($params['type'] == 'update') {echo "none;";} ?>">Thêm sản phẩm</button>
            <button type="submit" class="btn btn-warning" style="margin:10px 0;display:<?php if ($params['type'] == 'create') {echo "none;";} ?>">Cập nhật</button>
        </div>
    </div>
    <?php app\core\form\Form::end() ?>
</div>