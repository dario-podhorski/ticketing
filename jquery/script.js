/* 
 * Add User jquery script
 */

$(document).ready(function(){
    $("#add_user").click(function(e){
        e.preventDefault();
        var email = $("#email").val();
        var password = $("#password").val();
        var name = $("#name").val();
        var lastName = $("#lastname").val();
        var phone = $("#phone").val();
        var city = $("#city").val();
        
        if (email == ""){
            alert("Please enter email");
        }
        else if (password == ""){
            alert("Please reenter password");
        }else {
            $.post("ajax/create.php", {
            name: name,
            lastName: lastName,
            email: email,
            phone: phone,
            city: city
            },
            function( data ){
            alert(data);
            });
        };
    });
    });
        
 

    
    
    


