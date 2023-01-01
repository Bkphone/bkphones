<div class="card" style="width:80%; margin: 0 auto; background: #e7e7e7">
  <div class="card-header text-center">
    <h3>Order Details</h3>
  </div>
  <div class="card-body">
  <ul class="list-group list-group-flush">
  <li class="list-group-item">
    <div class="row" style="display:flex;">
        <div class="col-6" style="width: 50%; padding: 0 15px">
        <strong>Order ID:</strong> <?php echo $order->id;?>
        </div>
        <div class="col-6">
        <strong>User ID:</strong> <?php echo $order->user_id;?>
        </div>
    </div>
</li>
<li class="list-group-item">
    <div class="row" style="display:flex;">
        <div class="col-6" style="width: 50%; padding: 0 15px">
        <strong>User Name:</strong> <?php echo $order->username;?>
        </div>
        <div class="col-6">
        <strong>Email:</strong> <?php echo $order->email;?>
        </div>
    </div>
</li>

  <li class="list-group-item"><strong>Address:</strong> <?php echo $order->address;?></li>
  <li class="list-group-item"><strong>Order Description:</strong> <?php echo $order->order_description;?></li>
  <li class="list-group-item">
    <div class="row" style="display:flex;">
        <div class="col-6" style="width: 50%; padding: 0 15px">
        <strong>Order Status:</strong> <?php echo $order->order_status;?>
        </div>
        <div class="col-6">
        <strong>Create At:</strong> <?php echo $order->created_at;?>
        </div>
    </div>
</li>
<li class="list-group-item">
    <div class="row" style="display:flex;">
        <div class="col-6" style="width: 50%; padding: 0 15px">
        <strong>Price:</strong> <?php echo $order->price." đồng";?>
        </div>
        <div class="col-6">
        <strong>Payment Status:</strong> <?php echo $order->payment_status;?>
        </div>
    </div>
</li>
  
</ul>
  </div>    
  <div style="text-align:center"><a class="btn btn-primary" href="/admin/orders">Back To Manage Page</a></div>
</div>


