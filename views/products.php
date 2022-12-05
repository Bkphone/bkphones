<div class="row" style="margin: 0px 0px;">
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
                    <td ><?php echo $product->name ?></td>
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
            <li class="page-item <?php if ($params['page'] == 1) {echo "disabled";} ?>">
                <a class="page-link" href="<?php echo "products?page=" . $params['page'] - 1; ?>" tabindex="-1">Previous</a>
            </li>
            <?php for ($i = 1; $i <= $params['page_nums']; $i++): ?>
            <li class="page-item <?php if($i == $params['page']) {echo "active";} ?>"><a class="page-link" href="<?php echo "products?page=" . $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor ?>
            <li class="page-item <?php if ($params['page'] >= $params['page_nums']) {echo "disabled";} ?>">
                <a class="page-link" href="<?php echo "products?page=" . $params['page'] + 1; ?>">Next</a>
            </li>
        </ul>
    </nav>
   
</div>