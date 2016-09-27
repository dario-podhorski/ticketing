<div class="container">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <table id="usersTable" class="table">
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Lastname</th>
                        <th>E-mail</th>
                        <th>Phone</th>
                        <th>City</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = $gotUsers->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            echo '<td><a href=admin_page.php?deleteUser&ID='.$row["id_user"].'>'.$value.'</a></td>';
                        };
                        echo '</tr>';
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-2">
            <p id="user_id" value="<?php echo $getUser["id_user"]; ?>">ID: <?php echo $getUser["id_user"]; ?></p>
            
            <p>Name: <?php echo $getUser["name"]; ?></p>
            <p>Lastname: <?php echo $getUser["lastname"]; ?></p>
            <p>Email: <?php echo $getUser["email"]; ?></p>
            <p>Phone: <?php echo $getUser["phone"]; ?></p>
            <p>City: <?php echo $getUser["city"]; ?></p>
        </div>
        <div class="col-lg-4">
            <button id="delUser" name="delete">Delete</button>
        </div>
          
    </div>
</div>



<?php
                   
