<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="background-color: #d9d9d9; border-radius: 15px">
            
            <form method="post">
                <div class="row">
                    <div class="col-lg-5">
                     
                        <h2><span class="label label-danger">Login info</span></h2>
                     
                        <div class="form-group">
                            <label for="email">E-mail (required)</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="E-mail">
                        </div>
                        <div class="form-group">
                            <label for="password">Password (required)</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                    </div>
                 
                                  
                 
                 <div class="col-lg-5 col-lg-offset-1">
                    
                        <h2><span class="label label-danger">User info</span></h2>
                        
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label for="lastName">Lastname</label>
                            <input type="text" class="form-control" id="lastname" name="lastName" placeholder="Lastname">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone number</label>
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <select class="form-control" id="city" name="city">
                                <option>Osijek</option>
                                <option>Zagreb</option>
                            </select>
                        </div>
                </div>
                 
                    <button class="btn btn-default" onclick="addRecord()" value="1" name="sub_bttn">Add User</button>
                </div>
            </form>
        
    
        </div>
    </div>
</div>