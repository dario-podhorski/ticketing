/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function addRecord(){
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
        alert("Please enter password");
    }else {
        $.post("ajax/create.php", {
            name: name,
            lastName: lastName,
            email: email,
            phone: phone,
            city: city
        },function (data){
            alert(data);
        });
    }
}

