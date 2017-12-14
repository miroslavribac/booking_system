$(document).ready(function(){
    $('#datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });

    toggleBookingFormInputs();

    function toggleBookingFormInputs(){

        $(".car-registration .next").click(function(){
            $(".booking-date").toggleClass("active");
            $(".car-registration").toggleClass("hidden");
        });
        $(".booking-date .next").click(function(){
            $(".booking-date").toggleClass("hidden");
            $(".personal-info").toggleClass("active");
        });
        $(".personal-info .next").click(function(){
            $(".personal-info").toggleClass("active");
            $(".location-info").toggleClass("active");
        });
        $(".location-info .your-location").click(function(){
            $(".location-info .custom-location").toggleClass("active-inline");
        });
    }

    sendBookingData();

    function sendBookingData(){
        $(".booking-form").submit(function(e){
            e.preventDefault();
            var serialized_data = $(this).serialize();
            $.ajax({
                url: "classes/AjaxFunctions.php",
                method: "POST",
                data: serialized_data,
                success: function(data){
                    $(".location-info").toggleClass("active");
                    $(".car-registration").toggleClass("hidden");
                    $( '.booking-form' ).each(function(){
                        this.reset();
                    });
                },
                error: function(xhr, status, error){
                    console.log(error);
                }
            });
        });
    }



});

