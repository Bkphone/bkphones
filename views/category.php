<div class="row" style="margin: 0px 0px;">
    <h3>DANH SÁCH DANH MỤC SẢN PHẨM</h3>
    <button class="btn btn-success" type="button" data-toggle="modal" data-target="#createCategory" >THÊM DANH MỤC</button>
    <table id="category_table" class="table table-striped" style="margin: 10px 0px;width:500px;">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['categories'] as $i => $category) : ?>
                <tr>
                    <td><?php echo $category->id ?></td>
                    <td><?php echo $category->name ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#createCategory"  onclick="location.href='category/edit?id=<?php echo $category->id; ?>'"><i class="fa-solid fa-pen"></i> Edit</button>
                        &nbsp;<button type="button" class="btn btn-danger" onclick="location.href='category/delete?id=<?php echo $category->id; ?>'"><i class="fa-solid fa-trash"></i> Delete</button>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example ">
        <ul class="pagination justify-content-end">
            <li class="page-item <?php if ($params['page'] == 1) {
                                        echo "disabled";
                                    } ?>">
                <a class="page-link" href="<?php echo "category?page=" . $params['page'] - 1; ?>" tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $params['page_nums']; $i++) : ?>
                <li class="page-item <?php if ($i == $params['page']) {
                                            echo "active";
                                        } ?>"><a class="page-link" href="<?php echo "category?page=" . $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor ?>
            <li class="page-item <?php if ($params['page'] >= $page_nums) {
                                        echo "disabled";
                                    } ?>">
                <a class="page-link" href="<?php echo "category?page=" . $params['page'] + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>

</div>
<!-- Create Modal -->
<div class="modal fade" id="createCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TẠO DANH MỤC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
            
            use app\core\Form\Field;

            $form = app\core\Form\Form::begin('', "post") ?>
            <div class="modal-body">
            <?php echo $form->field($model, 'name') ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary">Tạo</button>
            </div>
            <?php app\core\form\Form::end() ?>
        </div>
    </div>
</div>
