<!DOCTYPE HTML>
<html lang="en">
<head>

<?php
include('../include/header.php');
include('../database/db.php');

if(isset($_GET['id']))
{

            $query= "Select * from hostel INNER JOIN location ON hostel.l_id=location.l_id 
            INNER JOIN l_city ON location.l_town=l_city.l_town
            INNER JOIN room ON hostel.h_id=room.h_id
            where hostel.h_id=".$_GET['id'];;
            
            $r=$mysqli->query($query);
            $row = $r->fetch_assoc();
            
            if($row['h_type']==0)
                $hostel_type='Girls Hostel';
            else
                $hostel_type='Boys Hostel';
?>

<style>
p {outline-color:Green;}
p.outset {outline-style: outset;}

.boxx {
background: #00F443;
color: #FFF;
border-radius: 5px;
}

</style>

	<title>HOSTELFINDER</title>
    
</head>

<body>
<?php
include('../include/navigation.php');
?>
<body>

<div class="container-fluid">

<center><h1><p class="outset"><?php echo $row['h_name']; ?></p></h1></center>

<div class="col-sm-3">
<img src="../hostel_board/<?php echo $row['h_image'];?>" class="img-responsive" width="304" height="236"> 
 
  <h3><u>Call Now for Booking</u></h3>
  <h4>
  <span class="glyphicon glyphicon-earphone"> 
  <span class="glyphicon glyphicon-phone">
  <?php echo $row['h_contact'];?>
  </h4>  
  <br />
<div class="container-fliud">
<h2>Additional Features</h2>
   <ul>
                      <?php 
                            $text=$row["h_facilities"];
                            $count = strlen($text);
                            $l=0;
                            for( $l = 0; $l <= $count; $l++ ) {
                             $char = substr( $text, $l, 1 );
                             if(strstr($char, "\n")) { echo "<br><li>"; }
                             if($l==0){ echo "<li>"; }
                             echo $char;
                            }  
                            echo "</li>";                       
                      ?>
   </ul>
</div> 
</div>

<div class="col-sm-8">
<table class="table table-hover">
    <!--Table head-->
    <thead>
        <tr class="text-white">
            <th><h3>Location <span class="glyphicon glyphicon-map-marker"></h3></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Location :</td>
            <td><?php echo $row["l_street"].", ".$row["l_town"].", ".$row["l_city"]; ?></td>
        </tr>
        <tr>
            <td>View in Google Map :</td>
            <td>[<a href="#">
          <span class="glyphicon glyphicon-map-marker"></span>
        </a>ClickHere]</td>
        </tr>
        
    </tbody>
     <thead>
        <tr class="text-white">
            <th><h3>Pricing Details <span class="glyphicon glyphicon-usd"></span><span class="glyphicon glyphicon-usd"></span></h3></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>For 1 seater :</td>
            <td >120000/month<br />
                110000/month
            </td>
            <td>[Attached] <br />
                [Non attached]
            </td>
        </tr>
        <tr>
            <td>For 2 seater :</td>
            <td>11000/month<br />
                10000/month
            </td>
            <td>[Attached] <br />
                [Non attached]
            </td>
        </tr>
        <tr>
            <td>For 3 seater :</td>
            <td>9000/month<br />
                8000/month
            </td>
            <td>[Attached] <br />
                [Non attached]
            </td>
        </tr>
        <tr>
            <td>For 4 seater :</td>
            <td>8000/month<br />
                7000/month
            </td>
            <td>[Attached] <br />
                [Non attached]
            </td>
        </tr>
        
         <thead>
        <tr class="text-white">
            <th><h3>Total Room Details <span class="glyphicon glyphicon-th-large"></span></h3></th>
        </tr>
    </thead>
    
    <tbody>
        <tr>
            <td>Total No of rooms :</td>
            <td>20</td>
            <td>[8 ] Attached <br />
                [12] Non attached
            </td>
        </tr>
        <tr>
            <td>Total 1 seater rooms :</td>
            <td>5</td>
            <td>[2] Attached<br />
                [3] Non attached
            </td>
        </tr>
        <tr>
            <td>Total 2 seater rooms :</td>
            <td>5</td>
            <td>[2] Attached<br />
                [3] Non attached
            </td>
        </tr>
        <tr>
            <td>Total 3 seater rooms :</td>
            <td>5</td>
            <td>[2] Attached<br />
                [3] Non attached
            </td>
        </tr>
        <tr>
            <td>total 4 seater rooms :</td>
            <td>5</td>
            <td>[2] Attached<br />
                [3] Non attached
            </td>
        </tr>
        
    </tbody>
</table>
<!--Table-->
</div>
</div>
</div>
</div> 
<?php
include('../include/footer.php');
}
  ?>
  
</body>
</html>