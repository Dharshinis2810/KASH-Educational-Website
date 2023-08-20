function validateemail(inputtext)
{
    var mailformat=/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if(inputtext.value.match(mailformat))
        {
            document.getElementById('error').style.display="none";
            return true;
        }
    else{
        document.getElementById('error').innerHTML="Invalid Email Address";
        document.getElementById('error').style.display="block";
        document.myform.email.focus();
        return false;
    }
}
 
function password(pas)
{
  //var pass= /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/; 
  if(pas.value.length<6)
      {
          document.getElementById('comments').innerHTML="Contain 6 Letters in length";
          document.getElementById('comments').style.display="block";
          document.myform.password.focus();
      }
    else
        {
            var re=/[a-z]/;
            if(!re.test(pas.value))
                {
                     document.getElementById('comments').innerHTML="Should contain one lowercase letter";
                     document.getElementById('comments').style.display="block";
                     document.myform.password.focus();
                }
            else{
                var re=/[A-Z]/;
                if(!re.test(pas.value))
                    {
                     document.getElementById('comments').innerHTML="Should contain one uppercase letter";
                     document.getElementById('comments').style.display="block";
                     document.myform.password.focus();
                    }
                else{
                    var re=/[0-9]/;
                    if(!re.test(pas.value))
                        {
                            document.getElementById('comments').innerHTML="Should contain one digit";
                            document.getElementById('comments').style.display="block";
                            document.myform.password.focus();
                        }
                }
            }
        }
}

function validatephone(inputtxt)
   {
      var numbers = /^[0-9]+$/;
      if(inputtxt.value.match(numbers))
      {
      document.getElementById('phoneerror').style.display="none";
      return true;
      }
      else
      {
      document.getElementById('phoneerror').innerHTML="Should enter only digits";
      document.getElementById('phoneerror').style.display="block";
      document.form1.phone.focus();
      return false;
      }
   } 

function pasconfirm(input)
{
    if(input.value!=document.getElementById('password1').value)
        {
           document.getElementById('cerror1').innerHTML="Password is different";
           document.getElementById('cerror1').style.display="block";
           document.myform.confirm1.focus();
           return false;
        }
           return true;
    }
