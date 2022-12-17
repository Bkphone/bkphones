
<?php 
$total_orders = count($orders);
$orders_per_page = 10;
$total_pages = ceil($total_orders / $orders_per_page);

if(isset($_GET["page"])){
$page = $_GET["page"];
}
else {
  $page = 1;
}
$index = ($page - 1)*$orders_per_page;
$rest = $total_orders - ($page - 1)*$orders_per_page;
?>
    <form class="form-inline my-2 my-lg-0" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchID">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">User ID</th>
      <th scope="col">User Name</th>
      <th scope="col">Status</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Create At</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($_GET["searchID"])){
      $page = 1;
      $orders_per_page = 1;
      $total_pages = 1;
      $id = $_GET["searchID"];
      for($i = 0; $i < $total_orders; $i++){
        if($orders[$i]->id == $id){ ?>
 <tr>
      <th scope="row"><?php echo $orders[$i]->getId();?></th>
      <td><?php echo $orders[$i]->getUserId();?></td>
      <td><?php echo $orders[$i]->getUsername();?></td>
      <td><?php echo $orders[$i]->getOrder_status();?></td>
      <td><?php echo $orders[$i]->getPayment_status();?></td>
      <td><?php echo $orders[$i]->getCreated_at();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this order?')" href="<?php echo '/admin/orders/delete?id='.$orders[$i]->id;?>" class="btn btn-danger">Delete</a>
        <a onclick="return confirm('Do you want to confirm this order?')" href="<?php echo '/admin/orders/confirm?id='.$orders[$i]->id;?>" class="btn btn-success">Confirm</a>
        <a href="<?php echo '/admin/orders/details?id='.$orders[$i]->id;?>" class="btn btn-warning">Details</a>
      </td>
    </tr>
    <?php
        }
      }
    }
    else{
      ?>
      <?php
    if($total_orders >= $orders_per_page && $rest >= $orders_per_page){
    for($i = $index; $i < ( $index + $orders_per_page); $i++){
        ?>
    <tr>
    <th scope="row"><?php echo $orders[$i]->getId();?></th>
      <td><?php echo $orders[$i]->getUserId();?></td>
      <td><?php echo $orders[$i]->getUsername();?></td>
      <td><?php echo $orders[$i]->getOrder_status();?></td>
      <td><?php echo $orders[$i]->getPayment_status();?></td>
      <td><?php echo $orders[$i]->getCreated_at();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this order?')" href="<?php echo '/admin/orders/delete?id='.$orders[$i]->id;?>" class="btn btn-danger">Delete</a>
        <a onclick="return confirm('Do you want to confirm this order?')" href="<?php echo '/admin/orders/confirm?id='.$orders[$i]->id;?>" class="btn btn-success">Confirm</a>
        <a href="<?php echo '/admin/orders/details?id='.$orders[$i]->id;?>" class="btn btn-warning">Details</a>
      </td>
    </tr>
    
    <?php }
    }
    else if($total_orders >= $orders_per_page && $rest < $orders_per_page){
      for($i = $index; $i < ($index + $rest); $i++){?>
      <tr>
      <th scope="row"><?php echo $orders[$i]->getId();?></th>
      <td><?php echo $orders[$i]->getUserId();?></td>
      <td><?php echo $orders[$i]->getUsername();?></td>
      <td><?php echo $orders[$i]->getOrder_status();?></td>
      <td><?php echo $orders[$i]->getPayment_status();?></td>
      <td><?php echo $orders[$i]->getCreated_at();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this order?')" href="<?php echo '/admin/orders/delete?id='.$orders[$i]->id;?>" class="btn btn-danger">Delete</a>
        <a onclick="return confirm('Do you want to confirm this order?')" href="<?php echo '/admin/orders/confirm?id='.$orders[$i]->id;?>" class="btn btn-success">Confirm</a>
        <a href="<?php echo '/admin/orders/details?id='.$orders[$i]->id;?>" class="btn btn-warning">Details</a>
      </td>
    </tr>
<?php }
    }
    else {
      foreach($orders as $item){
        ?>
        <tr>
      <th scope="row"><?php echo $item->getId();?></th>
      <td><?php echo $item->getUserId();?></td>
      <td><?php echo $item->getUsername();?></td>
      <td><?php echo $item->getOrder_status();?></td>
      <td><?php echo $item->getPayment_status();?></td>
      <td><?php echo $item->getCreated_at();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this order?')" href="<?php echo '/admin/orders/delete?id='.$item->id;?>" class="btn btn-danger">Delete</a>
        <a onclick="return confirm('Do you want to confirm this order?')" href="<?php echo '/admin/orders/confirm?id='.$item->id;?>" class="btn btn-success">Confirm</a>
        <a href="<?php echo '/admin/orders/details?id='.$item->id;?>" class="btn btn-warning">Details</a>
      </td>
    </tr>
    <?php }
    }
   } ?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item">
      <?php if($page > 1){ ?>
      <a class="page-link" href="<?php echo '/admin/orders?page='.($page-1)?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <?php }?>
    </li>
    <?php for($i = 1; $i <= $total_pages; $i++){
      if($i != $page){ ?>
    <li class="page-item"><a class="page-link" href="<?php echo '/admin/orders?page='.$i?>"><?php echo $i?></a></li>
    <?php }
    else{ ?>
    <li class="page-item"><a class="page-link" href="<?php echo '/admin/orders?page='.$i?>"><strong><?php echo $i?></strong></a></li>
   <?php }
   } ?>
    <li class="page-item">
    <?php if($page < $total_pages){ ?>
      <a class="page-link" href="<?php echo '/admin/orders?page='.($page+1)?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      <?php } ?>
    </li>
  </ul>
</nav>