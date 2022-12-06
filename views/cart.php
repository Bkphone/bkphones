<link rel="stylesheet" href="/css/cart.css">

<?php
    use app\models\ProductInCart;
    use app\controllers\CartController;

    // Updating Product Quantities
    if (isset($_POST['update'])) {
        CartController::update($_POST);
    }    

    //Delete Product from cart
    if (isset($_POST['remove'])) {
        CartController::remove($_POST['remove']);
    }   
    
    // if (isset($_POST['remove'])) {
    //     CartController::order($_POST['remove']);
    // }
?>

<div class="container">
    <h2 class="title">GIỎ HÀNG CỦA BẠN</h2>

    <?php
        if(!ProductInCart::getTotalQuantity($params['userID'])){
    ?>
    <div class="message">
        <img src="https://th.bing.com/th/id/R.68df6c5450dd68c1e11bb687e315400a?rik=RHk6aVd8%2fIghoA&riu=http%3a%2f%2fcdn.onlinewebfonts.com%2fsvg%2fimg_56611.png&ehk=t%2b7%2fprTGfl6Dgk%2bQc6Zdy%2bOzt3kAc0mB0NodMv9pBKo%3d&risl=&pid=ImgRaw&r=0" alt="Sad-face">
        <h2>Bạn không có sản phẩm nào trong giỏ hàng</h2>
        <a href="/">Quay lại trang chủ</a>
    </div>
    <?php }else{ ?>
    <form id="cart-form" action="" method="POST">
    <?php  
        $STT = 0;
        $total_money=0;
        foreach($params['ProductDetails'] as $product){
            $item = $params['ProductInCarts'][$STT];
            $money = $product->price_through*$item->quantity;  
            $total_money += $money;
    ?>
        <div class="product-container-box">
            <div class="product-display">
                <div class="product-image">
                    <img src="<?= $product->image_url ?>" alt="<?= $product->name ?>">
                </div>
                <div class="product-detail">
                    <div class="product-remove">
                        <button id="remove-<?=$product->id?>" type="submit" form="cart-form" name ="remove" value="<?=$product->id?>">X</button>
                    </div>
                    <div class="product-name"><h3><?= $product->name ?></h3></div>
                    <div class="price">
                        <div class="current-price"><h3><?php echo number_format($product->price_through, 0, ',', '.')?>₫</h3></div>
                        <div class="old-price"><h3><?php echo number_format($product->price_show, 0, ',', '.')?>₫</h3></div>
                        <div class="discount">
                            <h3>Giảm <?= round(($product->price_show-$product->price_through)/$product->price_through*100)?>%</h3>
                        </div>
                    </div>
                    <div class="product-quantity">
                        <h3>Chọn số lượng:</h3>
                        <input type="number" name="quantity-<?=$product->id?>"  min="1" placeholder="<?=$item->quantity?>">
                    </div>
                    <div class="description-box">
                        <h4><?=$product->description?></h4>
                    </div>
                </div>
               
            </div>
        </div>
            <?php $STT++;?>
    <?php } ?>
        <div class="bottom-box">
            <div class="total-money">
                <h2>Tổng tiền tạm tính</h2>
                <h2 class="money-show"><?php echo number_format($total_money, 0, ',', '.')?>₫</h2>
            </div>
            <div class="form-button">
                <button id="update-button" type="submit" form="cart-form" name ="update">CẬP NHẬT GIỎ HÀNG</button>
            </div>
        </div>
    </form>

    <?php $form = app\core\Form\Form::begin('', "post") ?>
    <div class="d-flex justify-content-center h-100">
        <div class="order-card">
            <div class="card-header">
                <h3 class="title">TIẾN HÀNH ĐẶT HÀNG</h3>
            </div>
            <div class="card-body">
                <?php echo $form->field($model, 'username') ?>
                <?php echo $form->field($model, 'email') ?>
                <?php echo $form->field($model, 'address') ?>
                <?php echo $form->field($model, 'order_description') ?>
                <div class="form-group">
                    <button type="submit" class="btn float-right login_btn" name="order">Đặt hàng</button>
                </div>
            </div>
            <div class="card-footer">
                <div class="d-flex justify-content-center links">
                    <a href="/"><p>Chọn thêm sản phẩm khác?</p></a>
                </div>
            </div>
        </div>
    </div>
    <?php app\core\form\Form::end() ?>
</div>

    <?php } ?>
</div>
