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
                <a class="buy_now" onclick="themVaoGioHang(maProduct, nameProduct);">
                    <b><i class="fa fa-cart-plus"></i> Thêm vào giỏ hàng</b>
                    <p>Giao trong 1 giờ hoặc nhận tại cửa hàng</p>
                </a>
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
    <div id="overlaycertainimg" class="overlaycertainimg">
        <div class="close" onclick="closecertain()">×</div>
        <div class="overlaycertainimg-content">
            <img id="bigimg" class="bigimg" src="images/products/iphone-7-plus-32gb-hh-600x600.jpg">
            <div class="div_smallimg owl-carousel owl-loaded owl-drag">
                <div class="owl-stage-outer">
                    <div class="owl-stage"
                        style="transition: all 0s ease 0s; width: 2135px; transform: translate3d(610px, 0px, 0px);">
                        <div class="owl-item active center" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/products/huawei-mate-20-pro-green-600x600.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/details/oppo-f9-mau-do-1-org.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item active" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/details/oppo-f9-mau-do-2-org.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/details/oppo-f9-mau-do-3-org.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/products/huawei-mate-20-pro-green-600x600.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/details/oppo-f9-mau-do-3-org.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                        <div class="owl-item" style="width: 304.96px;">
                            <div class="item">
                                <a>
                                    <img src="images/products/huawei-mate-20-pro-green-600x600.jpg"
                                        onclick="changepic(this.src)">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="owl-nav disabled"><button type="button" role="presentation" class="owl-prev"><span
                            aria-label="Previous">‹</span></button><button type="button" role="presentation"
                        class="owl-next"><span aria-label="Next">›</span></button></div>
                <div class="owl-dots"><button role="button" class="owl-dot active"><span></span></button><button
                        role="button" class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button><button role="button"
                        class="owl-dot"><span></span></button></div>
            </div>
        </div>
    </div>
</div>