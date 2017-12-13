$(document).ready(function(){
    $('#datepicker').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });

    $(".car-registration .next").click(function(){
        $(".booking-date").toggleClass("active");
        $(".car-registration").toggleClass("hidden");
    });

    $(".booking-date .next").click(function(){
        $(".booking-date").toggleClass("hidden");
        $(".personal-info").toggleClass("active");
    });

    $(".booking-form").submit(function(e){
        e.preventDefault();
        var serialized_data = $(this).serialize();
        $.ajax({
            url: "classes/AjaxFunctions.php",
            method: "POST",
            data: serialized_data,
            success: function(data){
                alert(data);
            },
            error: function(xhr, status, error){
                console.log(error);
            }
        });
        // var object = {
        //     "reg-number": $("#registration-number").val(),
        //     "date": $("#date").val(),
        //     "first-name": $("#first-name").val(),
        //     "last-name": $("#last-name").val(),
        //     "email": $("#email").val(),
        //     "address": $("#address").val(),
        //     "checkbox": $('#person').is(":checked") ? "person" : "company"
        // };
        //
        // console.log(object);
    });

});

