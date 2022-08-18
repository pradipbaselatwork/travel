$(document).ready(function(){
        //  alert('test');
        $("#sort").on('change',function(){
            var sort =  $("#sort").val();
            var category =  $("#category").val();
            if (sort === "" && url === "") {
                return false;
            }
            $.ajax({
                type: 'get',
                url: '/search',
                data: {
                    
                    category: category,
                    sort: sort,
                },
                success: function(response) {
                    console.log(response);
                    $("#ajaxPackage").html(response);
                },
                error: function() {
                    alert('error');
                }
            });
        });
});

$(document).ready(function(){
    // \\ alert('test');
    $("#average").on('change',function(){
        var average =  $("#average").val();
        var category =  $("#category").val();
        if (average === "" && url === "") {
            return false;
        }
        $.ajax({
            type: 'get',
            url: '/average',
            data: {
                
                category: category,
                average: average,
            },
            success: function(response) {
                console.log(response);
                $("#ajaxAverage").html(response);
            },
            error: function() {
                alert('error');
            }
        });
    });
});


$(document).ready(function(){  
    // alert("Hello Javascript"); 
    $(".getpaymentmethod").click(function() {
   var getpaymentmethod= $(this).val();
            // console.log(getpaymentmethod);
         
            var paymentmessage = $(this).attr('rel');
            $('#paymentmessage').text("Thank you for Choosing Cash On Delivery");

            if(getpaymentmethod =="khalti") {
                  $('#paymentmessage').text("Thank you for choosing Khalti For Payment!");
               }

               if(getpaymentmethod =="esewa") {
                $('#paymentmessage').text("Thank you for choosing Esewa For Payment!");
             }

             if(getpaymentmethod =="phonepay") {
                $('#paymentmessage').text("Thank you for choosing Phonepay For Payment!");
             }

});
});

function enable(){
   if(document.getElementById('btn_button').disabled == true) {
      $("#btn_button").removeAttr('disabled');
   }else {
      $("#btn_button").attr('disabled', true);
   }
}
