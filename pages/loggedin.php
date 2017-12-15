<html>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home Page</title>

  <link href="../bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../bootstrap/dist/css/material.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../bootstrap/dist/css/dataTables.material.min.css" />

        <!-- Bootstrap Core CSS -->
        <link href="../bootstrap/dist/css/bootstrap.css" rel="stylesheet">
        <?php

        $conn_type = "dbconnection-login.php";

        include_once('classes.php');
        session_start();





        if(isset($_SESSION['user'])){
          $user=$_SESSION['user'];
          $username=$user->getUserName();
        }
        else{
          header("Location:login.php");
        }
        if(($username=='admin') )
        {
          echo "<div class='alert alert-warning'>You dont have Access to this link! </div> ";
        }
        else{
            $iq = new InventoryQuery($conn);
            $stmt = $iq->getFromWarehouse($user->getTableName());
            $stmt->bind_result($id,$pname,$quantity);
         ?>


    <style>
    	.center{
    		text-align:center;
    		font-size:50px;
    	}

      #error{
        color: red;
        padding-bottom:10px;
      }

      #orderalert{
        color: red;
        font-size: 30px;
        text-align: center;
      }
    </style>


</head>
<body>
  <div class="container-fluid">
    <div class="row">
      <nav class="navbar navbar-default">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">IMS</a>

          </div>
          <ul class="nav navbar-nav">
              <li><a href="addInventory.php">Add Inventory</a></li>
              <li><a href="vieworders.php">View Order History</a></li>
          </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="custom-li-back"><a href="logout.php"><span class="fa  fa-sign-out"></span> Logout</a></li>
            </ul>
          </div>
      </nav>
      </div>
    </div>
      <div class="row">
      <div class="col-lg-3">
 			</div>
      <div class="col-lg-6">
      <?php
      echo '<h2><legend class="center">WELCOME '.$user->getUserName()."</legend></h2>";
      ?>
    </div>
  </div>
<div class="row">
  <div class="col-lg-1">
  </div>
  <div class="col-lg-10">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?php echo $user->getUserName();?></h3>
    </div>
    <div class="panel-body">
  <div class="table-responsive">
        <table id="warehouse" class="table table-striped table-bordered table-hover">

        <thead>
            <th  class="text-center">Inventory ID</th>
            <th  class="text-center">Product Name</th>
            <th  class="text-center">Quantity</th>

        </thead>
        <?php
            if($stmt->num_rows>0)
            while($stmt->fetch())
            {
                //We have data

                echo "<tr>";
                echo "<td>".$id."</td>"."<td>".$pname."</td>"."<td>".$quantity."</td>";
                echo "</tr>";


            }
            else{
                    echo "<div class='alert alert-warning'>You have no Inventory! </div> ";
            }
}
    ?>






   <div class="modal fade" id="mymodal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Update Product</h4>
      </div>
      <div class="modal-body">
              <div class="row">

                    <div class="col-lg-2">
                    </div>

                    <div class="col-lg-4">
                          <a id="update">
                          <div class="col-lg-12">
                          <span class="glyphicon glyphicon-edit" style="font-size:60px; height: 70px;" ></span>
                          </div>

                          <div class="col-lg-11">

                          Update

                        </div>
                      </a>
                    </div>





                    <div class="col-lg-4">
                          <a id="order">
                          <div class="col-lg-12">
                          <span class="glyphicon glyphicon-shopping-cart" style="font-size:60px; height: 70px;" ></span>
                          </div>
                          <div class="col-lg-12">
                          Order
                        </div>
                      </a>
                    </div>

                  </div>

                <div class="row">
                  <div class="col-lg-1"></div>
                  <div class="col-lg-10" id="orderalert">
                  <h4><label>Quantity of product is less than threshold</label>
                  </h4>
                </div>
                </div>

            </div>

      </div>
    </div>
  </div>





</table>
</div>
</div>
</div>
</div>

</div>

<script src="../jquery/dist/jquery.min.js"></script>
<script src="../jquery/dist/jquery.js"></script>
<script src="../bootstrap/dist/js/bootstrap.min.js"></script>

<script src="../bootstrap/dist/js//jquery.dataTables.min.js"></script>
<script src="../bootstrap/dist/js/dataTables.material.min.js"></script>
<script>
$(document).ready(function(){
  var id;
  var quantity;
  $("#orderalert").hide();

$(".table-striped").on("click","tr", function() {

     id = $(this).children('td:first').text();
     quantity=$(this).children('td:first').next().next().text();
     if(quantity < 20){
       $("#orderalert").show();
     }
     else{
        $("#orderalert").hide();
     }
     $("#mymodal").modal("show");
  });


  $("#update").click(function(){
 window.location.href = "newupdate.php?id="+id;
       $("#mymodal").modal("hide");
  });


  $("#order").click(function(){
     window.location.href = "order.php?id="+id;
      $("#mymodal").modal("hide");
  });



           $('#warehouse').DataTable();
});
</script>
</body>
</html>
