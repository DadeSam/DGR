var checkout, checkin, firstname, lastname, phone, email, org, department, schedule, purpose, snapped_picture, p;

//Generate Random Unique Id
let guid = () => {
	let s4 = () =>{
		return Math.floor((1 + Math.random()) * 0x10000)
		.toString(16)
		.substring(3);
	}
	//return id of format 'aaaa'
	return s4() + s4();
}

var grid = guid();
var nameregex = /^[a-zA-Z ]*$/;

function isNumber(evt) {
            var iKeyCode = (evt.which) ? evt.which : evt.keyCode
				if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
                return false;
                return true;
             } 
      
function processWelcomePage(){
document.getElementById("input-container").style.display = "none";
document.getElementById("welcome-page").style.display = "block";
}

function processWelcomePage2(){
document.getElementById("checkoutpage-holder").style.display = "none";
document.getElementById("welcome-page").style.display = "block";
}

function processFirstPage(){
document.getElementById("welcome-page").style.display = "none";
document.getElementById("input-container").style.display = "block";
avatar = document.getElementById('avatar');
snap = document.getElementById('snap');

	// Grab elements, create settings, etc.
	var canvas = document.getElementById("canvas"),
	context = canvas.getContext("2d"),
	video = document.getElementById("video"),
	errBack = function(error) {
		console.log("Video capture error: ", error.code); 
	};
	// Put video listeners into place
		//navigator.getUserMedia({video:{facingMode:"user"}, audio:false}, function(stream){
			//video.srcObject = stream;
		//}, errBack);
		
		//new api version
		navigator.mediaDevices.getUserMedia({
			    audio: false,
				video: {
					   facingMode:"user"
					   }
		    })
		     .then(stream => {
			  video.srcObject = stream;
		    })
			.catch(console.error)
		
	// Trigger photo take
	var y = window.matchMedia("(max-width: 768px)");
	if(y.matches){
	document.getElementById("capture").addEventListener("click", function(){
        canvas.Width = video.Width;
		canvas.Height = video.Height;
		context.drawImage(video, 0, 0);
		snap.setAttribute('src', canvas.toDataURL('image/png'));
		
		// Littel effects
		$('#video').fadeOut('slow');
		$('#snap').fadeIn('slow');
		$('#capture').hide();
		avatar.setAttribute('src', canvas.toDataURL('image/png'));
		snapped_picture = document.getElementById('snapped_picture');
        snapped_picture.value = canvas.toDataURL('image/png');
		console.log(snapped_picture);
		$('#new').show();
		
	});
	
	// Capture New Photo
	document.getElementById("new").addEventListener("click", function() {
		$('#video').fadeIn('slow');
		avatar.setAttribute('src', canvas.toDataURL('image/png'));
		$('#snap').fadeOut('slow');
		$('#capture').show();
		$('#new').hide();
	});
}else{
      document.getElementById("capture").addEventListener("click", function() {
       
		canvas.Width = video.Width;
		canvas.Height = video.Height;
		context.drawImage(video, 0, 0);
		avatar.setAttribute('src', canvas.toDataURL('image/png'));
        snapped_picture = document.getElementById('snapped_picture');
        snapped_picture.value = canvas.toDataURL('image/png');
		console.log(snapped_picture);
	});
  }
}

var firstname_error = document.getElementById("firstname_error"),
	lastname_error = document.getElementById("lastname_error"),
	first = document.getElementById("firstname");

function processForm2(){
firstname = document.getElementById("firstname").value;
lastname = document.getElementById("lastname").value;
phone = document.getElementById("phone").value;
org = document.getElementById("org").value;
email = document.getElementById('email');

$("#firstname_error").html(" ");
$("#lastname_error").html(" ");
$("#phone_error").html(" ");

if(firstname.trim() == ""){
document.getElementById("firstname").focus();
$("#firstname_error").html("Please enter first name");
setTimeout(() => $("#firstname_error").html(""), 3000);
}

else if(!firstname.match(nameregex)){
$("#firstname").focus();
$("#firstname_error").html("Name fields can only include alphabets");
setTimeout(() => $("#firstname_error").html(""), 3000);
return false;
}

else if(lastname.trim() == ""){
$("#lastname").focus();
$("#lastname_error").html("Please enter last name");
setTimeout(() => $("#lastname_error").html(""), 3000);
return false;
}

else if(typeof snapped_picture === 'undefined'){
alert('please take a photo');
return false;
}

else if(!lastname.match(nameregex)){
$("#lastname").focus();
$("#lastname_error").html("Name fields can only include alphabets");
setTimeout(() => $("#lastname_error").html(""), 3000);
return false;
}

else if(phone.trim() == "" || phone.length != 10){
$("#phone").focus();
$("#phone_error").html("Please enter a valid phone number");
setTimeout(() => $("#phone_error").html(""), 3000);
return false;
}

else{	
document.getElementById("form1").style.display = "none";
document.getElementById("form2").style.display = "block";
var y = window.matchMedia("(max-width: 768px)");
   if(y.matches){
		document.getElementById("picture-column-1").style.display = "block";
		}else{
		document.getElementById("picture-column-1").style.display = "none";
		document.getElementById("picture-column-2").style.display = "block";
        }
  }
}

function processForm3(){
contact_person = document.getElementById("contact_person").value;
contact_person_number = document.getElementById("contact_person_number").value;
purpose = document.getElementById("purpose").value;
schedule = document.getElementById("myradio").value;
avatar = document.getElementById("avatar");
print = document.getElementById("print");
	
$("#purpose_error").html(" ");
$("#contact_person_number_error").html(" ");

var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

if(contact_person_number.length != 10){
document.getElementById("contact_person_number").focus();
$("#contact_person_number_error").html("Please enter contact person's phone");
setTimeout(() => $("#contact_person_number_error").html(""), 3000);
return false;
}
 
else if(purpose.length < 2){
document.getElementById("purpose").focus();  
$("#purpose_error").html("Please select a reason");
setTimeout(() => $("#purpose_error").html(""), 3000);
return false;
}

else{
document.getElementById("ref_code").value = grid;
document.getElementById("display_firstname").innerHTML = firstname;
document.getElementById("display_lastname").innerHTML = lastname;
document.getElementById("display_phone").innerHTML = phone;
document.getElementById("display_org").innerHTML = org;
document.getElementById("display_contact_person").innerHTML = contact_person;
document.getElementById("display_purpose").innerHTML = purpose;
document.getElementById("picture-column-2").style.display = "none";
document.getElementById("picture-column-3").style.display = "block";
document.getElementById("form2").style.display = "none";
document.getElementById("form4").style.display = "block";
 }
}

function processDataOverviewBack(){
document.getElementById("form4").style.display ="none";
document.getElementById("form2").style.display = "block";
document.getElementById("picture-column-3").style.display = "none";
document.getElementById("picture-column-2").style.display = "block";
}

function processForm2Back(){
document.getElementById("form2").style.display ="none";
document.getElementById("form1").style.display = "block";

var x = window.matchMedia("(max-width: 768px)")
if(x.matches){
document.getElementById("picture-column-2").style.display = "none";
document.getElementById("picture-column-1").style.display = "block";
}else{
	document.getElementById("picture-column-2").style.display = "none";
	document.getElementById("picture-column-1").style.display = "block";
   }
}
	
function processForm1Back(){
document.getElementById("input-container").style.display ="none";
document.getElementById("welcome-page").style.display = "block";
}

function submitMultistep(){
document.getElementById("multistep").action = "process.php";
document.getElementById("multistep").method = "post";
document.getElementById("multistep").submit();
}

function processCheckout(){
document.getElementById("welcome-page").style.display = "none";
document.getElementById("checkoutpage-holder").style.display = "block";
}

function processLeave(){
    var grid_code = $("#grid_code").val();
   // Returns successful data submission message when the entered information is stored in database.
       var dataString = 'grid_code='+ grid_code;
         if(grid_code ==''){
             document.getElementById("grid_code").style.border = "1px solid red";
             document.getElementById("grid_code").placeholder = "REF CODE";
              }
              else
                  {
                  // AJAX Code To Submit Form.
                   $.ajax({
                           type: "POST",
                           url: "process.php",
                           data: dataString,
                           cache: false,
                           success: function(result){
                               
                                  document.getElementById("showMessage").innerHTML = result;
                                  setTimeout(function(){
                                           document.getElementById("showMessage").innerHTML = '';
                                             }, 3000); 
                               
                               }
                           });
                        
                       }
                      $("#grid_code").val("");
                   }


//image slideshow function... but disabled for now
/* $("#picture-column > div:gt(0)").hide();

setInterval(function() { 
  $('#picture-column > div:first')
    .fadeOut(3000)
    .next()
    .fadeIn(3000)
    .end()
    .appendTo('#picture-column');
},  5000); */


//code for PWA install
let deferredPrompt; 

window.addEventListener('beforeinstallprompt', (e) => {
	e.preventDefault();
	deferredPrompt = e;
	//btnAdd.style.display = 'block';
	
});

//button to show install process
window.addEventListener('load', (e) => {
	if (deferredPrompt){
	deferredPrompt.prompt();
	deferredPrompt.userChoice.then((choiceResult) => {
		if (choiceResult.outcome === 'accepted'){
			console.log('user accepted A2HS prompt');
		}
		deferredPrompt = null;
	});
	}
});

//checking to know if PWA has been successfully installed
window.addEventListener('appinstalled', (event) => {
	app.logEvent('a2hs', 'installed');
});

self.addEventListener('install', function(event){
	event.waitUntil(
	caches.open(cacheName).then(function(cache){
		return cache.addAll(
			[
			'css/dgrstyles.css',
			'javascript/script.js',
			'javascript/jquery-3.4.1.min.js',
			'index.php',
			'heade_footer/header.php',
			'header_footer/footer.php',
			'header_footer/modal.php'
			]
		);
	  })
	);
});

//registering service worker
if ('serviceWorker' in navigator){
	window.addEventListener('load', function(){
		navigator.serviceWorker.register('/sw.js').then(function(
		registration){
			//registration successful
			console.log('serviceWorker registration successful with scope', registration.scope);
		}, function(err){
			//registration failed
			console.log('serviceWorker registration failed: ', err);
		});
	});
}
			




	
	

	
     