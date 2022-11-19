<link rel="stylesheet" href="/css/cart.css">

<?php
    use app\models\ProductInCart;

    function pre_r($array){
        echo"<pre>";
        print_r($array);
        echo"</pre>";
    }
    
    // Updating Product Quantities
    if (isset($_POST['Update'])) {
        pre_r($_POST);
        // Loop through the post data so we can update the quantities for every product in cart
        foreach ($_POST as $k => $v) {
            if (strpos($k, 'quantity') !== false && is_numeric($v)) {
                $id = str_replace('quantity-', '', $k);
                $quantity = (int)$v;
                ProductInCart::changeQuantity($id,$quantity);
            }
        }
        header('location: cart');
        exit;
    }    

    //Delete Product from cart
?>

<div class="container">
    <div class="page_name">
        <h2>GIỎ HÀNG CỦA BẠN</h2>
    </div>
    <form id="cart-form" action="" method="POST">

    <?php  
        $STT = 0;
        $total_money=0;
        foreach($params['ProductDetails'] as $product){
            $item = $params['ProductInCarts'][$STT];
            $money = $item->price*$item->quantity;  
            $total_money += $money;
    ?>
        <div class="product-container-box">
            <div class="product-display">
                <div class="product-image">
                    <img src="<?= $product->image_url ?>" alt="<?= $product->name ?>">
                </div>
                <div class="product-detail">
                    <div class="product-name"><h3><?= $product->name ?></h3></div>
                    <div class="current-price"><h3><?= $product->price_show ?>₫</h3></div>
                    <div class="old-price"><h3><?= $product->price_through ?>₫</h3></div>
                    <div class="discount">
                        <h3>Giảm <?= round(($product->price_through-$product->price_show)/$product->price_show*100)?>%</h3>
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
                <h2 class="money-show"><?=$total_money?>₫</h2>
            </div>
            <div class="form-button">
                <input id="update-button" type="submit" name="Update" value="CẬP NHẬT GIỎ HÀNG" />
                <input id="order-button" type="submit" name="PlaceOrder" value="TIẾN HÀNH ĐẶT HÀNG" />
            </div>
        </div>
    </form>
</div>