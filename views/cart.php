<link rel="stylesheet" href="/css/cart.css">

<?php
    use app\models\ProductInCart;

    function pre_r($array){
        echo"<pre>";
        print_r($array);
        echo"</pre>";
    }
    
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
    
?>

<div class="container">
    <div class="page_name">
        <h2>GIỎ HÀNG CỦA BẠN</h2>
    </div>
    <form id="cart-form" action="" method="POST">
    <table class="cart_table">
        <div class="table_header">  
            <tr>
                <th class="STT"><h3>STT</h3></th>
                <th class="product_name"><h3>Tên sản phẩm</h3></th>
                <th class="product_image"><h3>Hình ảnh </h3></th>
                <th class="product_price"><h3>Giá</h3> </th>
                <th class="quantity"><h3>Số lượng</h3> </th>
                <th class="total_money"><h3>Thành tiền </h3></th>
                <th class="product_delete"><h3> Xóa </h3></th>
            </tr>
        <div>
    <?php  
        $STT = 0;
        $total_money=0;
        foreach($params['ProductDetails'] as $product){
            $item = $params['ProductInCarts'][$STT];
            $money = $item->price*$item->quantity;  
            $total_money += $money;
    ?>
            <str>
                <th class="STT"><?=$STT?></th>
                <th class="product_name"><?=$product->name?></th>
                <th class="product_image"><img src="<?=$product->image_url?>" alt="<?=$product->name?>"></th>
                <th class="product_price"><?=$item->price?></th>
                <th class="quantity">
                    <input type="number" name="quantity-<?=$product->id?>"  min="1" placeholder="<?=$item->quantity?>">
                </th>
                <th class="total_money"><?=$money?></th>
                <th class="product_delete">Xóa</th>
            </tr>
            <?php $STT++;?>
    <?php } ?>
        <div class="table_footer">  
            <tr>
                <th></th>
                <th class="price_to_pay"><h3>Tổng tiền</h3></th>
                <th></th>
                <th></th>
                <th></th>
                <th class="price_show"><h3><?=$total_money?></h3></th>
                <th ></th>
            </tr>
        <div>
    </table>
    <div id="form-button">
        <input type="submit" name="Update" value="Cập nhật" />
    </div>
    </form>
</div>