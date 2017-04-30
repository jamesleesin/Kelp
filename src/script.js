var map;

// function that gets the user's location for location submission
function getUserLocation(){
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(getPosition);
	} else {
		window.alert("Sorry! Geolocation is not supported.");
	}
}

// fills in the lat and long elements of the submission form automatically
function getPosition(position){
	var userLat = position.coords.latitude;
	var userLng = position.coords.longitude;
	document.locationForm.loclat.value = userLat;
	document.locationForm.loclong.value = userLng;
}

/*
* A function to make sure the user inputted all the correct information in the
* registration form 
*/
function validateRegistrationForm(){
	var isThereError = false;
    //First Name Validation 
	var firstNameValidation=document.forms["registrationForm"]["firstname"].value;	
    if(firstNameValidation == ""){
        document.getElementById("firstNameErrorMsg").innerHTML ="Please enter a valid first name";
		isThereError = true;
	}
	else{
		document.getElementById("firstNameErrorMsg").innerHTML ="";
	}
	// last name validation
	var lastNameValidation = document.forms["registrationForm"]["lastname"].value;
    if (lastNameValidation == "") {
        document.getElementById("lastNameErrorMsg").innerHTML = "Please enter a valid last name";
		isThereError = true;
    }
	else{
		document.getElementById("lastNameErrorMsg").innerHTML ="";
	}
	// password validation
	var passwordValidation = document.forms["registrationForm"]["userpw"].value;
    if (passwordValidation == "") {
        document.getElementById("passwordErrorMsg").innerHTML = "Please enter a valid password";
		isThereError = true;
    }
	else{
		document.getElementById("passwordErrorMsg").innerHTML ="";
	}
	// email validation
	var emailValidation = document.forms["registrationForm"]["useremail"].value;
    if (emailValidation == "") {
        document.getElementById("emailErrorMsg").innerHTML = "Please enter a valid email";
		isThereError = true;
    }
	else{
		document.getElementById("emailErrorMsg").innerHTML ="";
	}
	// date of birth validation
	var dobValidation = document.forms["registrationForm"]["userdob"].value;
    if (dobValidation == "") {
        document.getElementById("dobErrorMsg").innerHTML = "Please enter a valid date of birth";
		isThereError = true;
    }
	else{
		document.getElementById("dobErrorMsg").innerHTML ="";
	}
	//gender validation
	var genderValidation = document.getElementsByName("gender");
	if (!genderValidation[0].checked && !genderValidation[1].checked){
		document.getElementById("genderErrorMsg").innerHTML = "Please select a gender";
        isThereError = true;
	}
	else{
		document.getElementById("genderErrorMsg").innerHTML ="";
	}
	// city validation
	var cityValidation = document.forms["registrationForm"]["city"].value;
    if (cityValidation == "None") {
        document.getElementById("cityErrorMsg").innerHTML = "Please select a city";
		isThereError = true;
    }
	else{
		document.getElementById("cityErrorMsg").innerHTML ="";
	}
	
	// if there is an error with validation return false
	if (isThereError)
		return false;
	
	// submit the form if there are no errors at this point 
	document.forms["registrationForm"].submit();
}

// starts the map search
function initMapSearch() {
	// initialize map with default settings for now
	map = new google.maps.Map(document.getElementById('livemap'), {
	center: {lat:0, lng:0}, zoom: 18});
	
	// for each fieldset in the search
	var elementList = document.getElementsByClassName('searchresult');
	var totalLong = 0;
	var totalLat = 0;
	// calculate coordinates for now
	for (var i = 0; i < elementList.length; i++) {
		// coords
		var locLong = parseFloat(elementList[i].childNodes[3].innerHTML);
		var locLat = parseFloat(elementList[i].childNodes[6].innerHTML);
		var coords = {lat: locLat, lng: locLong};

		// name and description
		var contentString = "<h3>" + elementList[i].childNodes[0].innerHTML + "</h3><p>" + elementList[i].childNodes[1].innerHTML + "</p>";
		var info = new google.maps.InfoWindow({
		content: contentString});
		
		var marker = new google.maps.Marker({
			position: coords,
			map:map,
			id: i,
			title: "Location"
		});
		google.maps.event.addListener(marker,'click', (function(marker,contentString,info){ 
			return function() {
				info.setContent(contentString);
				info.open(map,marker);
			};
		})(marker,contentString,info)); 
		
		// find total long/lat
		totalLong += locLong;
		totalLat += locLat;
	}

	
	// calculate average to center the map
	var avgLong = totalLong/elementList.length;
	var avgLat = totalLat/elementList.length;

	// center map based on results
	map.setCenter({lat: avgLat, lng: avgLong});
	if (elementList.length < 2){
		// if there is only 1 location then we can zoom in
		map.setZoom(18);
	}
	else{
		// zoom out to show locations
		map.setZoom(12);
	}
}

// basic map showing individual result
function initMapSingle(){
	// get the coordinates info from the page
	var coordslong = parseFloat(document.getElementById("coordslong").innerHTML);
	var coordslat = parseFloat(document.getElementById("coordslat").innerHTML);
	// location details 
	var loc = {lat: coordslat, lng: coordslong};
	map = new google.maps.Map(document.getElementById('singlemap'), {
	center: loc, zoom: 18});
	// create marker to show sushi location
	var marker = new google.maps.Marker({
	position: loc, map: map, title: "Location"});	
}
