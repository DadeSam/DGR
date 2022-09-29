<?php include 'header_footer\header.php'; ?>
<?php echo '
<div id="welcome-page">
      <p class="welcome-message">Welcome to MyCompany</p>
    <div id="input-container-divider-1">
       <div class="button-holder">
         <button id="btn-design-checkin" onclick="processFirstPage()"><span>Check in</span></button>
       </div>
    </div>
    
    <div id="input-container-divider-2">
       <div class="button-holder">
         <button type="button" id="btn-design-checkout"  onclick="processCheckout()"><span>Check out</span></button>
       </div>
    </div>
  </div>

<div id="checkoutpage-holder">
       <span id="showMessage"></span>
       <div class="positioner">
         <input class="checkout-input" type="text" id="grid_code" name="grid_code" maxlength="4" placeholder="Ref Code">
        </div>
          
              <button type="button"  id="chkbutton" class="chkbutton" onclick="processLeave()">checkout</button>
              <button type="button"  id="previous" class="backMain" onclick="processWelcomePage2()">Back</button>          
</div>

<div id="input-container">
  <div id="picture-column">
		
		<div id="picture-column-1">
			<div class="booth" id="booth">
			  
			  <video id="video" autoplay ></video>
				<button id="new"><span>New</span></button>			 
				<button id="capture"><spa>snap</span></button>
                <canvas id="canvas" height="450" width="550"></canvas>
              <img src="" id="snap">
			</div>
		</div>

		<div id="picture-column-2">
		</div>
	
		<div id="picture-column-3">
		</div>
	</div>


<img  class="avatar" id="avatar" src="images/av.png">
        <div id="form-page">
         
          <form id="multistep" enctype="mutlipart/form-data" onsubmit="return false">
           <div id="form1" class="form-holder">
              <div class="form-header">
                <p>Please fill in your basics</p>
              </div>
               
			   <div id="input-holder">
			   <div class="form-group-1">
					<input type="text" id="firstname" name="firstname" placeholder="First name"><br>
					<span id="firstname_error"></span>
				</div>
                <br>
				<div class="form-group-2">
					<input type="text" id="lastname" name="lastname" placeholder="Last name"><br>
					<span id="lastname_error"></span>
				</div>
                <br>
				
				<div class="form-group-3">
					<input type="tel" id="phone" name="phone" maxlength="10" onkeypress="javascript:return isNumber(event)" placeholder="Phone number"><br>
					<span id="phone_error"></span>
				</div>
                <br>
				
				<div class="form-group-4">
					<input type="email" id="email" name="email" placeholder="Email (optional)"><br>
					<span id="email_error"></span>
				</div>
                <br>
				<div class="form-group-5">
                  <input type="text" id="org" name="org" placeholder="Your organisation (Optional)">
				  </div>
              </div>
			
               <div class="navigation-button-holder">
                  <button type="button" class="previous-button" onclick="processForm1Back()">Previous</button>
                  <button type="button" class="next-button" onclick="processForm2()">Next</button>
               </div>
          </div>
          
          <div id="form2" class="form-holder">
              <div class="form-header">
                <p>Who are you here to see?</p>
              </div>
             <div id="input-holder">
			 <div class="form-group-6">
                 <input type="text" id="contact_person" name="contact_person" placeholder="Name of Person you are meeting">
			</div>
				<br><br>
			<div class="form-group-7">
                 <input type="tel" id="contact_person_number" name="contact_person_number" maxlength="10" onkeypress="javascript:return isNumber(event)" placeholder="Phone number of contact person">
				 <br>
              <span id="contact_person_number_error"></span>  
			</div>
				          
<br> 
<div class="schedule-pos1">
                <h4 class="h4pos">Please select a purpose</h4>
                 <br><br>
                  <select name="purpose" id="purpose">
                    <option value="" selected disabled hidden>Is it official or personal?</option>
                    <option value="official">Official</option>
                    <option value="personal">Personal</option>
                  </select>
		<br><br>
            <span id="purpose_error"></span>
</div>
           
                      
                     <br><br>
                   <div class="schedule-pos">
                      <h4>Scheduled?</h4>
                      <br>
			<div class="myradio"> 
			   <input type="radio" id="myradio" name="schedule" value="Yes">&nbsp;&nbsp;Yes
			</div>
			<div class="myradio">
				<input type="radio" id="myradio" name="schedule" value="No">&nbsp;&nbsp;No
			</div>
			<br>
			<span id="schedule_error"></span>
                          <input type="hidden" id="ref_code" name="ref_code">
                          <input type="hidden" name="snapped_picture" id="snapped_picture" value="">
                      </div>  
		 </div>
               <div class="navigation-button-holder">
                  <button type="button" class="previous-button" onclick="processForm2Back()">Previous</button>
                  <button type="button"  class="next-button"  onclick="processForm3()">Next</button>
               </div>
         </div>

       
           <div id="form4" class="form-holder">
              <div class="form-header">
                 <p>Data Overview</p>
              </div>
<br>
              <div id="overview-holder">
<hr>
<table class="table-position">
		<tr>
			 <th>First name</th>
			 <td><span id="display_firstname"></span></td>
		 </tr>
		 <tr>
				<th>Last name</th>
				<td><span id="display_lastname"></span></td>
		</tr>

		<tr>
				<th>Phone</th>
				<td><span id="display_phone"></span></td>
		</tr>
		<tr>
				<th>Organisation</th>
				<td><span id="display_org"></span></td>
		</tr>

		<tr>        
			<th>Contact person</th>
			<td><span id="display_contact_person"></span></td>
		</tr>
				
		<tr>
			<th>Purpose</th>
			<td><span id="display_purpose"></span></td>
		</tr>
<br>
</table>
<div class="legal_modal">

	<small>By submitting this form, you accept our Terms and Conditions.<a id="myBtn">&nbsp; Read more</a></small>
</div>
              </div>
               
             <div class="navigation-button-holder">
                  <button type="button" class="previous-button" onclick="processDataOverviewBack()">Previous</button>
                  <button type="button" class="submit-button" onclick="submitMultistep()">Submit</button>
             </div>
          </div>
          </form>
        </div>
  </div>
   ';?>
   <?php include 'header_footer\modal.php'; ?>
  <?php include 'header_footer\footer.php'; ?>