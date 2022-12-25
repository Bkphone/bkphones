<link rel="stylesheet" href="css/product_details.css">
<script src="js/product_details.js.js"></script>

<div class="product_detail" style="margin-bottom: 100px">
    <?php echo '<h1>Điện thoại ' . $params['productModel']->name . '</h1>' ?>
    <div class="rating"></div>
    <div class="rowdetail group">
        <div class="picture">
            <?php echo '<img src=" '. $params['productModel']->image_url .'" onclick="opencertain()">' ?>
        </div>
        <div class="price_sale">
            <div class="area_price"><strong><?php echo number_format($params['productModel']->price_through, 0, ',', '.') ?>₫</strong>
                <span><?php echo number_format($params['productModel']->price_show, 0, ',', '.') ?>₫</span></div>
            <div class="ship">
                <img src="images/details/clock-152067_960_720.png">
                <div>NHẬN HÀNG TRONG 1 GIỜ</div>
            </div>
            <div class="area_promo">
                <strong>khuyến mãi</strong>
                <div class="promo">
                    <img src="images/details/icon-tick.png">
                    <div id="detailPromo">Sản phẩm sẽ được giảm <span style="font-weight: bold">10.000</span>₫ khi mua
                        hàng online bằng thẻ VPBank hoặc tin nhắn SMS</div>
                </div>
            </div>
            <div class="policy">
                <div>
                    <img src="images/details/box.png">
                    <p>Trong hộp có: Sạc, Tai nghe, Sách hướng dẫn, Cây lấy sim, Ốp lưng </p>
                </div>
                <div>
                    <img src="images/details/icon-baohanh.png">
                    <p>Bảo hành chính hãng 12 tháng.</p>
                </div>
                <div class="last">
                    <img src="images/details/1-1.jpg">
                    <p>1 đổi 1 trong 1 tháng nếu lỗi, đổi sản phẩm tại nhà trong 1 ngày.</p>
                </div>
            </div>
            <div class="area_order">
                <form action="" method="POST">
                    <button type="submit" name ="addToCart">
                        <a class="buy_now">
                            <b><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</b>
                            <p>Giao trong 1 giờ hoặc nhận tại cửa hàng</p>
                        </a>
                    </button>
                </form>
            </div>
        </div>
        <div class="info_product">
            <h2>Thông số kỹ thuật</h2>
            <ul class="info">
                <li>
                    <p>Màn hình</p>
                    <div><?php echo $params['productModel']->screen ?></div>
                </li>
                <li>
                    <p>Hệ điều hành</p>
                    <div><?php echo $params['productModel']->os ?></div>
                </li>
                <li>
                    <p>Camara sau</p>
                    <div><?php echo $params['productModel']->camera ?></div>
                </li>
                <li>
                    <p>Camara trước</p>
                    <div><?php echo $params['productModel']->camera_front ?></div>
                </li>
                <li>
                    <p>CPU</p>
                    <div><?php echo $params['productModel']->cpu ?></div>
                </li>
                <li>
                    <p>RAM</p>
                    <div><?php echo $params['productModel']->ram ?></div>
                </li>
                <li>
                    <p>Bộ nhớ trong</p>
                    <div><?php echo $params['productModel']->rom ?></div>
                </li>
                <li>
                    <p>Thẻ nhớ</p>
                    <div><?php echo $params['productModel']->micro_usb ?></div>
                </li>
                <li>
                    <p>Dung lượng pin</p>
                    <div><?php echo $params['productModel']->battery ?>h</div>
                </li>
            </ul>
        </div>
    </div>
</div>