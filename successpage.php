<?php include 'header_footer\header.php'; ?>

<div id="welcome-page">
   <div class="output">
	<?php
	$link = (mysqli_connect("localhost", "root", "", "checkin"));
	$ref_code =$_GET['ref']; 
    $sql = "select * from dgr WHERE ref_code='$ref_code'";	
	$result = mysqli_query($link, $sql);
	?>
	<?php   
      while($row = mysqli_fetch_array($result))
	  {
		  $time = $row['checkin_time'];
		  $timed = explode(" ",$time)[1];
	
    ?>
	  <?php  
             if(gmdate("H") > 6 && gmdate("H") < 12) { ?>
                   <p> <?php echo "Good morning, " .$row['firstname']."! "; ?> please find your Check-in details below</p> 
            
             <?php }else if(gmdate("H") >= 12 && gmdate("H") < 17){ ?>
              
                      <p><?php echo  "Good afternoon, " .$row['firstname']."! ";?> please find your Check-in details below</p><br>
               <?php } else{?>
                         <p><?php echo  "Good evening, " .$row['firstname']."! ";?> please find your Check-in details below</p><br>
                 <?php } ?>
	   <hr>
<br>
   <table class="success-table">
        <tr>
	  <th><h3>Guest Reference ID</h3></th>
          <td><h3><?php echo $row['ref_code']; ?></h3></td>
        </tr>

	 <tr>
	  <th>Contact Person</th> 
          <td><?php echo $row['contact_person']; ?></td>
         </tr>

         <tr>
	  <th>Contact Person's Number</th>
           <td><?php echo "0" . $row['contact_person_number']; ?></td>
         </tr>

          <tr>
	    <th>Check-in time</th> 
            <td><?php echo $timed; ?></td>
          </tr>

	</table>
	  <?php
	  }
      ?>
</div>
<div class="success-navigation-button-holder"> 
            <button class="finish-button"><a href="index.php">Finish</a></button>
         </div>

<div class="exciting-future">
   <img src="images/vod3.jpg" class="img-des"><small><span style="color:beige">The future is exciting.</span><span style="color:red"> Ready?</span></small>
</div>  
         
</div>

<?php include 'header_footer\footer.php'; ?>