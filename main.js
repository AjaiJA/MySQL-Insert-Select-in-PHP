/* function validate()
{
    var userName=document.getElementById('full-name').value;
    var mail=document.getElementById('email').value;
    var phone=document.getElementById('phone').value;
    var msg=document.getElementById('msg').value;
    if(userName=="" || mail=="" || phone=="" || msg=="")
    {
        alert("Field is Empty");
    }
    else
    {
        if(userName.match(/^[A-Za-z ]+$/))
        {
            if(phone.match(/^\d{10}$/))
            {
                if(mail.match(/^[A-Za-z0-9_\.\-]+\@(([A-Za-z0-9\-])+\.)+([A-Za-z0-9]{2,4})+$/))
                {
                    alert("Successfully Submitted");
                }
                else
                {
                    alert("Invalid Email");
                }
            }
            else
            {
                alert("Invalid Phone Number");
            }
        }
        else
        {
            alert("Invalid Username");
        }
    }
}  */
function slideRange(e)
{
    document.getElementsByClassName('to')[0].textContent=e.value;
    var value = (e.value-e.min)/(e.max-e.min)*100;
    e.style.background = 'linear-gradient(to right, rgb(19, 255, 19) 0%, rgb(19, 255, 19) ' + value + '%,rgb(175, 175, 175) ' + value + '%,rgb(175, 175, 175) 100%)';
}
