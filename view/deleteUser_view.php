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
                            echo '<td>'.$value.'</td>';
                        };
                        echo '</tr>';
                    };
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    
</div>
 
