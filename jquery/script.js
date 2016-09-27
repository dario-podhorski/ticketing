/* 
 * jquery script
 */

$(document).ready(function(){

    /*
    * Add user
     */
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
            $.post("ajax/createUser.php", {
            name: name,
            lastName: lastName,
            email: email,
            phone: phone,
            city: city
            },
            function( data ){
            alert(data);
            });
        }
    });
    
    /*
     * Creating a data Table
     */ 
    $('#usersTable').DataTable();
    $('#equipTable').DataTable();
    /*
     * Create date picker
     */
    $( "#warrstart, #warrend").datepicker({
        dateFormat: "yy-mm-dd"
    });
    
    /*
    * Deleting user
     */
    $('#delUser').click(function(e){
        e.preventDefault();
        var id = document.getElementById("user_id").getAttribute("value");
        $.post("ajax/delete.php", {id: id}, function(){location.reload();});

    });

    /*
    * Add equipment
     */
    $("#add_equipment").click(function(e){
        e.preventDefault();
        var serialNum = $("#serial").val();
        var partNum = $("#partnum").val();
        var equipName = $("#eqname").val();
        var warrStart = $("#warrstart").val();
        var warrEnd = $("#warrend").val();

        if (serialNum == ""){
            alert("Please enter serial number");
        }
        else {
            $.post('ajax/createEquipment.php', {
                serialNum: serialNum,
                partNum: partNum,
                equipName: equipName,
                warrStart: warrStart,
                warrEnd: warrEnd
            },
                function(data){
                alert(data);
                });
            }
        });
        
    $('#delEquip').click(function(e){
        e.preventDefault();
        var serial = document.getElementById("serial").getAttribute("value");
        $.post("ajax/delete.php", {serial: serial}, function(){location.reload();});

    });    
        
        
    });


        
 

    
    
    


