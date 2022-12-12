<link rel="stylesheet" href="/css/order.css">
    
<?php
    use app\models\Order;
    use app\controllers\OrderController;
?>

<?php
    if(!Order::countOrder($params['userID'])){
?>
<div class="message">
    <h2>Bạn chưa có đơn hàng nào tại Bkphone</h2>
    <h2>Tiếp tục mua sắm tại <a href="/">đây</a></h2>
</div>

<?php }else{ ?>
    <div class="title">
        Đơn hàng của bạn
    </div>
    <table class="order_table">
        <thead>
            <tr>
                <th>MÃ ĐƠN HÀNG</th>
                <th>TÌNH TRẠNG</th>
                <th>NGƯỜI NHẬN</th>
                <th>ĐỊA CHỈ</th>
                <th>MÔ TẢ</th>
                <th>TỔNG TIỀN</th>
                <th>NGÀY TẠO</th>
                <th>TÌNH TRẠNG THANH TOÁN</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($params['orders'] as $order){?>
                <tr>
                    <th><?= $order->id ?></th>
                    <td><?= $order->order_status ?></td>
                    <td><?= $order->username ?></td>
                    <td><?= $order->address ?></td>
                    <td><?= $order->order_description ?></td>
                    <td><?php echo number_format($order->price, 0, ',', '.')?></td>
                    <td><?= $order->created_at ?></td>
                    <td><?= $order->payment_status ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } ?>