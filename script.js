function validateForm(event) {
    // event.preventDefault();

    var password = document.getElementById("password").value;
    var email = document.getElementById("email").value;
    var confirmPassword = document.getElementById("confirmPassword").value;
    var errorMessage = document.getElementById("errorMessage");
    var errorPassword = document.getElementById("errorPassword"); // Corrected variable name
    var regpass = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-])[a-zA-Z\d!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]{8,}$/;
    var regEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

    
    if (!password.match(regpass)) {
        errorPassword.textContent = "";
        errorMessage.textContent = "Password must have at least 8 characters, including at least one lowercase letter, one uppercase letter, one specail symbol and one digit.";
       
    } else {
        errorMessage.textContent = "";
        errorPassword.textContent = "";
        if(!email.match(regEmail)){
            errorMessage.textContent="Email must contain one '@' including at least one '.' ";
           
        }else{
            errorMessage.textContent = "";
            errorPassword.textContent = "";
            if (password !== confirmPassword) {
                errorPassword.textContent = "Passwords do not match. Please enter matching passwords.";
                
                }else{
                    window.location.href = "order.php";
                }
        }
    } 
    
}

    function show() {
    var passwordInput = document.getElementById("password");

    // Check the current type of the input
    var currentType = passwordInput.getAttribute("type");

    // Toggle between "text" and "password"
    var newType = (currentType === "text") ? "password" : "text";

    // Update the type attribute
    passwordInput.setAttribute("type", newType);

    

}
function confrimShow() {
    var passwordInput = document.getElementById("confirmPassword");

    // Check the current type of the input
    var currentType = passwordInput.getAttribute("type");

    // Toggle between "text" and "password"
    var newType = (currentType === "text") ? "password" : "text";

    // Update the type attribute
    passwordInput.setAttribute("type", newType);

}
function loginShow() {
    var passwordInput = document.getElementById("loginPassword");

    // Check the current type of the input
    var currentType = passwordInput.getAttribute("type");

    // Toggle between "text" and "password"
    var newType = (currentType === "text") ? "password" : "text";

    // Update the type attribute
    passwordInput.setAttribute("type", newType);

}

function show_contact() {
    var content_type = document.getElementById("show_contact");

    var current_content_type = content_type.style.display;

    var new_content_type = (current_content_type === "block") ? "none" : "block";

    content_type.style.display = new_content_type;
}



function logoutBox(){
    document.getElementById("logout_box").style.display="block";
}

function logout_box_hide(){
    document.getElementById("logout_box").style.display="none";
}
