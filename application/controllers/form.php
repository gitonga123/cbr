<form class="form-vertical" autocomplete="off" name="searchForm" id="searchForm">      
    <div class="text-center" id="searchResponse">

    </div>
    <br>
    <div class="form-group">           
        <input type="text" class="form-control" id="regNumber" name="regNumber" autocomplete="off" placeholder="Registration number" list="regNumOpts">   
        
    </div> 
    <div class="form-group">            
        <input type="text"
               class="form-control"
               id="VehicleOwner"
               name="VehicleOwner"
               placeholder="Vehicle owner">             
        <span class="text-danger" id="VehicleOwnerResponse"></span>
    </div> 
    <div class="form-group">            
        <input type="text"
               class="form-control"
               id="VehicleOwnerID"
               name="VehicleOwnerID"
               placeholder="Vehicle owner ID">             
        <span class="text-danger" id="VehicleOwnerIDResponse"></span>
    </div>  
    <div class="form-group">            
        <input type="text"
               class="form-control"
               id="VehicleType"
               name="VehicleType"
               placeholder="Vehicle type">             
        <span class="text-danger" id="VehicleTypeResponse"></span>
    </div>          
</form>