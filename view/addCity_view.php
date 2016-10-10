<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="background-color: #d9d9d9; border-radius: 15px">
            
            <form method="POST" action="">
                <div class="row">
                    <div class="col-lg-5">
                     
                        <h2><span class="label label-danger">Add City</span></h2>
                     
                        <div class="form-group">
                            <label for="email">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="password">Region (required)</label>
                            <select class="form-control" id="region" name="region"> 
                                <?php
                                while ($row = $gotCity->fetch(PDO::FETCH_ASSOC)){
                                
                                    echo '<option>'. $row['region'] . '</option>';
                                
                                }
                                ?>
                            </select>
                        </div>
                    
                
             
                    <button class="btn btn-default" id="add_user">Add User</button>
                    </div>
                </div>   
            </form>
        
    
        </div>
    </div>
</div>
</body>
</html>
