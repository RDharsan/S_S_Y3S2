
    function validate(){
        var phoneNo = document.forms["form"]["phoneNo"].value;
        if(isNaN(phoneNo)){
            document.getElementById("error").innerHTML="<span  style='color: red;'><b>"+"Only Digits are allowed</b></span>"
            return false;
        }
    
        else if(phoneNo.length>10){
            document.getElementById("error").innerHTML="<span style='color: red;'><b>"+"Maximum limit is 10 digits</b></span>"
            return false;
        }
    
        else if(phoneNo.length<10){
            document.getElementById("error").innerHTML="<span style='color: red;'><b>"+"Maximum limit is 10 digits</b></span>"
            return false;
        }
    
        // else if(phoneNo.charAt(0)==9){
        //     document.getElementById("error").innerHTML="<span style='color: red;'><b>"+"Starting number 9 not allowed!!!</b></span>"
        //     return false;
        // }
    
      
    
        // var name = document.forms["myform"]["name"].value;
        // var regName = /^[a-zA-Z]*$/;
        // var dname = regName.test(name);
        // if(dname){
           
        // }else{
        //     document.getElementById("errorname").innerHTML="<span style='color: red;'><b>"+"Doctor name cannot contain number!!!</b></span>"
        //     return false;
        // }
        
    }
    
    // function validateApp(){
    //     var patient_name = document.forms["myform"]["patient_name"].value;
    //     var rName = /^[a-zA-Z]*$/;
    //     var dname = rName.test(patient_name);
    //     if(dname){
           
    //     }else{
    //         document.getElementById("errorpname").innerHTML="<span style='color: red;'><b>"+"Doctor name cannot contain number!!!</b></span>"
    //         return false;
    //     } 
    // }
    
    function myFunction() {
    var r = confirm("Are you sure you want to delete?");
    if (r == false) {
       return false;
    } 
    
    }
    
    