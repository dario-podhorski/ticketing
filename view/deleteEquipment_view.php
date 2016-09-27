<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <table id="equipTable" class="table">
                <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Part Number</th>
                        <th>Name</th>
                        <th>Warranty Start</th>
                        <th>Warranty End</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($row = $gotEquip->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        foreach ($row as $key => $value) {
                            echo '<td><a href=admin_page.php?deleteEquipment&Serial='.$row["serial_num"].'>'.$value.'</a></td>';
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
            <p id="serial" value="<?php echo $getEquip["serial_num"]; ?>">Serial Number: <?php echo $getEquip["serial_num"]; ?></p>
            <p>Part Number: <?php echo $getEquip["part_num"]; ?></p>
            <p>Name: <?php echo $getEquip["equip_name"]; ?></p>
            <p>Warranty Start: <?php echo $getEquip["warr_start_date"]; ?></p>
            <p>Warranty End: <?php echo $getEquip["warr_end_date"]; ?></p>
            
        </div>
        <div class="col-lg-4">
            <button id="delEquip" name="delete">Delete</button>
        </div>
          
    </div>
</div>



<?php
