var attempt = 3; 
// Variable to count number of attempts.
// Below function Executes on click of login button.
function validate()
    {
        // var username database location
        // var Password database location
        var username = document.getElementById("userID").value; 
        var password =document.getElementById("password").value;
        
        //Login informaiton for User ID and Password
        //Replace 
        if ( username == "Formget" && password == "formget#123")
        {
            alert ("Login successfully");
            window.location = "index.html"; 
            
            // Redirecting to other page.
            return false;
        }
        else
        {
            attempt --;
            // Decrementing by one.
            alert("You have left "+attempt+" attempt;");
            // Disabling fields after 3 attempts.
            if( attempt == 0)
            {
                document.getElementById("userID").disabled = true;
                document.getElementById("password").disabled = true;
                document.getElementById("submit").disabled = true;
                return false;
            }
        }
    }