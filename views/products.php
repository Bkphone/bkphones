<div class="row" style="margin: 0px 0px;">
    <h3>LỌC DANH SÁCH SẢN PHẨM</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-lg-3" style="margin-bottom: 10px;">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Danh mục: </label>
                                <select name="category_id" class="form-control" id="category_id" style="height: 35px;border: 1px solid #c9c7c7;border-radius:5px;">
                                    <option value="0">ALL</option>
                                    <?php foreach ($params['category'] as $cate) : ?>
                                        <option value="<?php echo $cate->id ?>" <?php if ($params['model']->category_id == $cate->id) {
                                                                                    echo "selected";
                                                                                } ?>><?php echo $cate->name ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 10px;">
                            <div class="mb-3">
                                <label for="product_name" class="form-label">Tên sản phẩm</label>
                                <input type="text" name="name" class="form-control" id="product_name">
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 10px;">
                            <div class="mb-3">
                                <label for="product_id" class="form-label">Mã sản phẩm</label>
                                <input type="text" name="id" class="form-control" id="product_id">
                            </div>
                        </div>
                        <div class="col-lg-3" style="margin-bottom: 10px;">
                            <div class="mb-3">
                                <label for="" class="form-label">Khoảng giá: </label>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="text" name="start" value="" class="form-control" id="p_range_start">
                                    </div>
                                    <div class="col-sm-1 mt-2">
                                        <span><i class="fa-solid fa-minus"></i></span>

                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" name="end" value="" class="form-control" id="p_range_end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="button" class="btn btn-primary search" style="margin:10px 0">Tìm kiếm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h3>DANH SÁCH CÁC SẢN PHẨM</h3>
    <a class="btn btn-success" href="products/create" role="button">THÊM SẢN PHẨM</a>
    <table id="product_table" class="table table-striped" style="margin: 10px auto;">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price Show</th>
                <th>Price Through</th>
                <th>Discount</th>
                <th>Descriptions</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($params['page_product'] as $i => $product) : ?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></td>
                    <td style="padding:5px;width:100px;">
                        <img src="<?php echo $product->image_url ?>" alt="Product-Image" style="width: 100%;">
                    </td>
                    <td><?php echo $product->name ?></td>
                    <td><?php echo $product->price_show ?></td>
                    <td><?php echo $product->price_through ?></td>
                    <td><?php echo $product->discount ?></td>
                    <td><?php echo $product->description ?></td>
                    <td>
                        <button type="button" class="btn btn-warning" onclick="location.href='products/edit?id=<?php echo $product->id; ?>'"><i class="fa-solid fa-pen"></i> Edit</button>
                        &nbsp;<button type="button" class="btn btn-danger" onclick="location.href='products/delete?id=<?php echo $product->id; ?>'"><i class="fa-solid fa-trash"></i> Delete</button>
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
                <a class="page-link" href="
                    <?php 
                        if ($_GET['page']) {
                            echo str_replace('page='.$_GET['page'], 'page=' . $_GET['page'] - 1, $_SERVER['REQUEST_URI']);
                        } else {
                            if ($_GET) {
                                echo $_SERVER['REQUEST_URI'] . "&page=" . 0;
                            } else {
                                echo $_SERVER['REQUEST_URI'] . "?page=" . 0;
                            }
                        }
                    ?>
                " tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $params['page_nums']; $i++) : ?>
                <li class="page-item <?php if ($i == $params['page']) {
                                            echo "active";
                                        } ?>"><a class="page-link" href="
                                            <?php 
                                                if ($_GET['page']) {
                                                    echo str_replace('page='.$_GET['page'], 'page=' . $i, $_SERVER['REQUEST_URI']);
                                                } else {
                                                    if ($_GET) {
                                                        echo $_SERVER['REQUEST_URI'] . "&page=" . $i;
                                                    } else {
                                                        echo $_SERVER['REQUEST_URI'] . "?page=" . $i;
                                                    }
                                                }
                                            ?>
                                        "><?php echo $i; ?></a></li>
            <?php endfor ?>
            <li class="page-item <?php if ($params['page'] >= $params['page_nums']) {
                                        echo "disabled";
                                    } ?>">
                <a class="page-link" href="
                    <?php
                        $url = $_SERVER['REQUEST_URI'];
                        if ($_GET['page']) {
                            echo str_replace('page='.$_GET['page'], 'page=' . $_GET['page'] + 1, $_SERVER['REQUEST_URI']);
                        } else {
                            if ($_GET) {
                                echo $_SERVER['REQUEST_URI'] . "&page=" . 2;
                            } else {
                                echo $_SERVER['REQUEST_URI'] . "?page=" . 2;
                            }
                        }
                    ?>
                ">Next</a>
            </li>
        </ul>
    </nav>
</div>

<script>
    $(".search").on("click", function() {
        let category_id = $("#category_id").val()
        let p_name = $("#product_name").val()
        let p_id = $("#product_id").val()
        let price_s = $("#p_range_start").val()
        let price_e = $("#p_range_end").val()
        location.href = 'products?category_id=' + category_id + '&name=' + p_name + '&id=' + p_id + '&start=' + price_s + '&end=' + price_e
    })
</script>