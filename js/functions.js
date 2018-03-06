/**
 * 
 */

function emptyStringUserName(){
	if(document.getElementById("login").value == 'user name')
		document.getElementById("login").value = "";	
}

function emptyStringPass(){
	if(document.getElementById("password").value == '4815162342')
		document.getElementById("password").value = "";
}

function emptyStringResetUserName(){
	document.getElementById("resetlogin").value = "";	
}

function emptyStringResetEmail(){
	document.getElementById("resetemail").value = "";	
}

function addDefaultUserName(){
	if(document.getElementById("login").value == "")
		document.getElementById("login").value = "user name";
}

function addDefaultPassword(){
	if(document.getElementById("password").value == "")
		document.getElementById("password").value = "4815162342";
}

function addDefaultResetUserName(){
	if(document.getElementById("resetlogin").value == "")
		document.getElementById("resetlogin").value = "user name";
}

function addDefaultResetEmail(){
	if(document.getElementById("resetemail").value == "")
		document.getElementById("resetemail").value = "name@example.com";
}

function checkFields(){
	var loginValue = document.getElementById("login").value;
	var passwordValue = document.getElementById("password").value;
	loginValue = loginValue.trim();
	passwordValue = paswordValue.trim();
	var errorStringValue = '';
	if((loginValue == '' || loginValue == 'user name') || (passwordValue == '' || passwordValue == '4815162342')){
		if((loginValue == '' || loginValue == 'user name') && (passwordValue == '' || passwordValue == '4815162342')){
			errorStringValue = "Enter User Name and Password";
		}
		else if(loginValue == '' || loginValue == 'user name'){
			errorStringValue = "Enter User Name";
		}
		else if (passwordValue == '' || passwordValue == '4815162342'){
			errorStringValue = "Enter Password";
		}
	
		if(errorStringValue!=''){
			document.getElementById("ErrorMessage").innerHTML = errorStringValue;
			document.getElementById("ErrorMessage").style.display = "inline-block";
			document.getElementById("ErrorMessage").style.width = "400px";
			document.getElementById("ErrorMessage").style.paddingLeft = "45px";
			document.getElementById("loginSubmit").style.top = "112px";
			
		}
		return false;
	}
	return true;
}

function checkResetFields(){
	var resetLoginValue = document.getElementById("resetlogin").value;
	var resetEmailValue = document.getElementById("resetemail").value;
	var errorResetStringValue = '';
	if((resetLoginValue == '' || resetLoginValue == 'user name') || (resetEmailValue == '' || resetEmailValue == 'name@example.com')){
		if((resetLoginValue == '' || resetLoginValue == 'user name') && (resetEmailValue == '' || resetEmailValue == 'name@example.com')){
			errorResetStringValue = "Enter User Name and Email Id";
		}
		else if(resetLoginValue == '' || resetLoginValue == 'user name'){
			errorResetStringValue = "Enter User Name";
		}
		else if (resetEmailValue == '' || resetEmailValue == 'name@example.com'){
			errorResetStringValue = "Enter Email Id";
		}
	
		if(errorResetStringValue!=''){
			document.getElementById("ErrorResetMessage").innerHTML = errorResetStringValue;
			document.getElementById("ErrorResetMessage").style.display = "inline-block";
			document.getElementById("ErrorResetMessage").style.textAlign = "center";
			document.getElementById("ErrorResetMessage").style.width = "400px";
			document.getElementById("ErrorResetMessage").style.paddingLeft = "45px";
		}
		return false;
	}
	return true;
}