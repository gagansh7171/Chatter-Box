function registerformfunc(){
    
    var flag = true;
    var phone =  document.forms["registerform"]["phone"].value;
    var email = document.forms["registerform"]["email"].value;

    var regphone = RegExp("^[6789][0-9]{9}$");
    var regemail = RegExp("([a-zA-Z0-9_]+.?)+@([a-zA-Z0-9_]+.?)+[a-zA-Z0-9_]*\.{1}(com|in)");
    if (!regphone.test(phone) ){
        alert("Enter valid Indian phone number");
        return false;
    }
    else if( !regemail.test(email)){
        alert("Enter valid email address");
        return false;
    }
    
}
