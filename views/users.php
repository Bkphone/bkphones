<?php use app\core\Application;?>
<?php 
$total_users = count($users);
$users_per_page = 10;
$total_pages = ceil($total_users / $users_per_page);
if(isset($_GET["page"])){
$page = $_GET["page"];
}
else {
  $page = 1;
}
$index = ($page - 1)*$users_per_page;
$rest = $total_users - ($page - 1)*$users_per_page;
?>
  <a class="btn btn-success" href="/admin/users/create">Create User</a>
    <form class="form-inline my-2 my-lg-0" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="searchID">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th scope="col">Address</th>
      <th scope="col">Role</th>
      <th scope="col">Manage</th>
    </tr>
  </thead>
  <tbody>
    <?php if(isset($_GET["searchID"])){
      $page = 1;
      $users_per_page = 1;
      $total_pages = 1;
      $id = $_GET["searchID"];
      for($i = 0; $i < $total_users; $i++){
        if($users[$i]->id == $id){ ?>
 <tr>
      <th scope="row"><?php echo $users[$i]->getID();?></th>
      <td><?php echo $users[$i]->getDisplayName();?></td>
      <td><?php echo $users[$i]->getEmail();?></td>
      <td><?php echo $users[$i]->getPhoneNumer();?></td>
      <td><?php echo $users[$i]->getAddress();?></td>
      <td><?php echo $users[$i]->getRole();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this user?')" href="<?php echo '/admin/users/delete?id='.$users[$i]->id;?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo '/admin/users/edit?id='.$users[$i]->id;?>" class="btn btn-warning">Edit</a>
        <a href="<?php echo '/admin/users/edit/password?id='.$users[$i]->id;?>" class="btn btn-warning">Password</a>
      </td>
    </tr>
    <?php
        }
      }
    }
    else{
      ?>
      <?php
    if($total_users >= $users_per_page && $rest >= $users_per_page){
    for($i = $index; $i < ( $index + $users_per_page); $i++){
        ?>
    <tr>
      <th scope="row"><?php echo $users[$i]->getID();?></th>
      <td><?php echo $users[$i]->getDisplayName();?></td>
      <td><?php echo $users[$i]->getEmail();?></td>
      <td><?php echo $users[$i]->getPhoneNumer();?></td>
      <td><?php echo $users[$i]->getAddress();?></td>
      <td><?php echo $users[$i]->getRole();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this user?')" href="<?php echo '/admin/users/delete?id='.$users[$i]->id;?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo '/admin/users/edit?id='.$users[$i]->id;?>" class="btn btn-warning">Edit</a>
        <a href="<?php echo '/admin/users/edit/password?id='.$users[$i]->id;?>" class="btn btn-warning">Password</a>
      </td>
    </tr>
    
    <?php }
    }
    else if($total_users >= $users_per_page && $rest < $users_per_page){
      for($i = $index; $i < ($index + $rest); $i++){?>
      <tr>
      <th scope="row"><?php echo $users[$i]->getID();?></th>
      <td><?php echo $users[$i]->getDisplayName();?></td>
      <td><?php echo $users[$i]->getEmail();?></td>
      <td><?php echo $users[$i]->getPhoneNumer();?></td>
      <td><?php echo $users[$i]->getAddress();?></td>
      <td><?php echo $users[$i]->getRole();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this user?')" href="<?php echo '/admin/users/delete?id='.$users[$i]->id;?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo '/admin/users/edit?id='.$users[$i]->id;?>" class="btn btn-warning">Edit</a>
        <a href="<?php echo '/admin/users/edit/password?id='.$users[$i]->id;?>" class="btn btn-warning">Password</a>
      </td>
    </tr>
<?php }
    }
    else {
      foreach($users as $user){
        ?>
        <tr>
      <th scope="row"><?php echo $user->getID();?></th>
      <td><?php echo $user->getDisplayName();?></td>
      <td><?php echo $user->getEmail();?></td>
      <td><?php echo $user->getPhoneNumer();?></td>
      <td><?php echo $user->getAddress();?></td>
      <td><?php echo $user->getRole();?></td>
      <td>
        <a onclick="return confirm('Do you want to delete this user?')" href="<?php echo '/admin/users/delete?id='.$user->id;?>" class="btn btn-danger">Delete</a>
        <a href="<?php echo '/admin/users/edit?id='.$user->id;?>" class="btn btn-warning">Edit</a>
        <a href="<?php echo '/admin/users/edit/password?id='.$users[$i]->id;?>" class="btn btn-warning">Password</a>
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
      <a class="page-link" href="<?php echo '/admin/users?page='.($page-1)?>" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
      <?php }?>
    </li>
    <?php for($i = 1; $i <= $total_pages; $i++){
      if($i != $page){ ?>
    <li class="page-item"><a class="page-link" href="<?php echo '/admin/users?page='.$i?>"><?php echo $i?></a></li>
    <?php }
    else{ ?>
    <li class="page-item"><a class="page-link" href="<?php echo '/admin/users?page='.$i?>"><strong><?php echo $i?></strong></a></li>
   <?php }
   } ?>
    <li class="page-item">
    <?php if($page < $total_pages){ ?>
      <a class="page-link" href="<?php echo '/admin/users?page='.($page+1)?>" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
      <?php } ?>
    </li>
  </ul>
</nav>