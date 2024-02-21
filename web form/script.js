
function validation(){
    var name = document.forms["myform"]["name"].value;
    var age = document.getElementById("age").value;
    var doob = document.getElementById("dob").value;
    var email = document.getElementById("email").value;




    if (name == ""){
        alert("name must be filled out");
    }
    
    else if(age == ""){
        alert("Fill the age")
    }
    else if(dob = ""){
        alert("Fill the Date of Birth")
        
    }
    else if(email == "" || !email==""){
        if (email == "")
            alert("fill the email")
        // else {
        //     if (email.indexOf("@") >= 0 && email.indexOf(".") >= 0)
        //        alert("valid")
        //     else
        //         alert("invalid");
        
        }


        var valid = /^\d{2}-\d{2}-\d{4}$/;
        function dob(doob) {
        
            // if(valid.test(doob.value)){
            //     alert("valid")
            // }else
            // alert("invalid")
        
            if(!valid.test(doob)){
                return false;
            }
        
            var parts = doob.split("-");
            var day = parts[0];
            var month = parts[1];
            var year = parts[2];
        
            var date = new Date(day,month -1,year);
            if(date.getDay()!== day || date.getMonth()!==month || date.getFullYear() !== year){
                return 2;
            }
            return true;
        
        }
        if (dob(doob))
            console.log("valid")
        else
            console.log("invalid")
}
    