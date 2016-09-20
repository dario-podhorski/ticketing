<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2" style="background-color: #d9d9d9; border-radius: 15px">

            <form method="POST" action="">
                <div class="row">
                    <div class="col-lg-5">

                        <h2><span class="label label-danger">Equipment</span></h2>

                        <div class="form-group">
                            <label for="serial">Serial Number (required)</label>
                            <input type="text" class="form-control" id="serial" name="serial" placeholder="Serial number">
                        </div>
                        <div class="form-group">
                            <label for="partnum">Part Number</label>
                            <input type="text" class="form-control" id="partnum" name="partnum" placeholder="Part Number">
                        </div>


                        <div class="form-group">
                            <label for="eqname">Equipment name</label>
                            <input type="text" class="form-control" id="eqname" name="eqname" placeholder="Equipment Name">
                        </div>
                        
                        <div class="form-group">
                            
                            <label for="warrstart">Warranty Start Date:</label>
                            <input type="text" name="warrstart" id="warrstart">
                            
                            
                        </div>
                        <div class="form-group">
                            
                            <label for="warrstart">Warranty End Date:</label>
                            
                            <input type="text" name="warrend" id="warrend">                        
                        </div>



                    <button class="btn btn-default" id="add_equipment">Add Equipment</button>

            </form>


        </div>
    </div>
</div>
</body>
</html>

