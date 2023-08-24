 // email validation file for before submition given alret massge:like this mail id alredy ragisters

 function checkEmail(emailInput){
       $.ajax({
        method:"POST",
        url: "php-script.php",
        data:{emailId:emailInput},
        success: function(data){
          $('#emailStatus').html(data);
        }
      });
}
$(document).on('input','#email',function(e){

    let emailInput = $('#email').val();
    let msg;
    if(emailInput.length==0){
      msg="<span style='color:red'> Enter the valid email id </span>";
    }
    else if(!(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/).test(emailInput)){
      msg="<span style='color:red'>Email is not Valid</span>";
    }else{
      checkEmail(emailInput);
    }
    $('#emailStatus').html(msg);
});