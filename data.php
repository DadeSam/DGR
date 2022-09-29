<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/dgrstyles.css">
<link href="https://fonts.googleapis.com/css?family=Courgette&display=swap" rel="stylesheet">
<script src="javascript/script.js"></script>
<script src="javascript/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="data-title">Digital Guest Register
<img  class="resize" src="images/vod2.jpg">
<form class="example" action="data.php">
  <input type="text" placeholder="Search a name" name="search">
  <button type="submit">cLiCk</button>
</form>
<button id="btnExport" onclick="fnExcelReport();"> EXPORT </button>
</div>
<div class="data-table">
<?php
$link = (mysqli_connect("localhost", "root", ""));
mysqli_select_db($link, "checkin");
$query = mysqli_query($link, "select * from dgr order by ID DESC");
$resultCheck = mysqli_num_rows($query); 
?>
 <table id="tblData" class="table-design" border:"1px">  
	 <tr>
	 
	   <th>ID</th>
	   <th>Photo</th>
	   <th>First Name</th>
	   <th>Last Name</th>
	   <th>Mobile Number</th>
	   <th>Email</th>
	   <th>Visitor's organisation</th>
	   <th>Contact Person</th>
       <th>Contact Person's Number</th>
	   <th>Schedule</th>
	   <th>Purpose</th>
	   <th>Reference Code</th>
	    <th>Checkin Time</th>
	    <th>Chekout Time</th>
     </tr>
	<?php
	 if ($resultCheck > 0){   
      while($row = mysqli_fetch_array($query))
	  {
    ?>
	   <tr>
	      <td><?php echo $row['ID']; ?></td>
	      <td><?php echo '<img height="100" width="100" src="data:image/png;base64,'.$row['photo'].'">' ?></td>
	      <td><?php echo $row['firstname']; ?></td>
		  <td><?php echo $row['lastname']; ?></td>
		  <td><?php echo $row['number']; ?></td>
		  <td><?php echo $row['email']; ?></td>
		  <td><?php echo $row['organisation']; ?></td>
		  <td><?php echo $row['contact_person']; ?></td>
          <td><?php echo $row['contact_person_number']; ?></td>
		  <td><?php echo $row['schedule']; ?></td>
		  <td><?php echo $row['purpose']; ?></td>
		  <td><?php echo $row['ref_code']; ?></td>
		  <td><?php echo $row['checkin_time']; ?></td>
		  <td><?php echo $row['checkout_time']; ?></td>
		</tr>
		<?php
	  }
	 }
	 ?>
	 
	 
 </table>
 
<!-- <button onclick="exportTableToExcel('tblData')">Export Table Data To Excel File</button> -->
</div>
<script>
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('tblData'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xlsx");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
</script>

</body>
</html>