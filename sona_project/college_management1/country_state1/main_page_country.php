<?php require_once "db.php"; ?>
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
<!-- Styles -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </head>
    <body>
     
         
<select name ="name" id="country-dropdown" checked required>
    <?php
$result = mysqli_query($conn,"SELECT * FROM countries");
while($row = mysqli_fetch_array($result)) {
?>
    <option value="<?php echo $row['id'];?>"><?php echo $row["name"];?></option>
    
<?php
}
?> 
</select>
        
<select id="state-dropdown">
</select>
<select id="city-dropdown">
</select>

        
        
<script>
    //state regarding code used by conrty id//
$(document).ready(function() {
$('#country-dropdown').on('change', function() {
var country_id = this.value;
$.ajax({
url: "demo_state.php",
type: "POST",
data: {
country_id: country_id
},
cache: false,
success: function(result){
$("#state-dropdown").html(result);
$('#city-dropdown').html('<option value="">Select State First</option>'); 
}
});
});    
});
    
    //city regarding code used by state id//
$(document).ready(function() {
$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "demo_city.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});    
});



        
 
        </script>
        
</body>
</html>

