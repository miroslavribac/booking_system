$(document).ready(function(){
    $( function() {
        $( "#datepicker" ).datepicker();
    } );

    $(".datepicker .datepicker-days td").click(function(){
        alert("Works");
    });

    toggleBookingFormInputs();

    function toggleBookingFormInputs(){

        $(".car-registration .next").click(function(){
            $(".calendar").toggleClass("active");
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

    $(".calendar .search").click(function(){
        $.ajax({
            url: "classes/AjaxFunctions.php",
            method: "POST",
            data: "date="+$("#datepicker").val(),
            success: function(data){
                $(".calendar").css("height", "300");
                $(".calendar-box").html(data);
            },
            error: function(xhr, status, error){
                console.log(status);
            }
        });
    });

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

    // Calendar();
    function Calendar(){
        $.ajax({
            url: "classes/AjaxFunctions.php",
            method: "POST",
            data: "data",
            success: function(data){
                $(".calendar").html(data);
            },
            error: function(xhr, status, error){
                console.log(status);
            }
        });
    }

    $(".box-content .dates li.slot-green").click(function(){
        alert($(this).attr("id"));
    });


});

