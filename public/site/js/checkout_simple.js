$(document).ready(function(){

    var cookie = $("#cookie").val();
    var token = $("#token").val();



    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass   : 'iradio_flat-green'
    })

    // Step show event
    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection, stepPosition) {
       //alert("You are on step "+stepNumber+" now");
       if(stepPosition === 'first'){
           $("#prev-btn").addClass('disabled');
       }else if(stepPosition === 'final'){
           $("#next-btn").addClass('disabled');
       }else{
           $("#prev-btn").removeClass('disabled');
           $("#next-btn").removeClass('disabled');
       }
    });


    // Smart Wizard
    $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect:'slide',
            showStepURLhash: true,
            toolbarSettings: {toolbarPosition: 'end',
                              toolbarButtonPosition: 'end'
                            }
    });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {

        //if the direction is forward then validate
        if(stepDirection == "forward")
        {
            if(stepNumber == 1)
            {
                var stepResult = verifyStep2();

                return stepResult;
            }

        }

    });


    // External Button Events
    $("#reset-btn").on("click", function() {
        // Reset wizard
        $('#smartwizard').smartWizard("reset");
        return true;
    });

    $("#prev-btn").on("click", function() {
        // Navigate previous
        $('#smartwizard').smartWizard("prev");
        return true;
    });

    $("#next-btn").on("click", function() {
        // Navigate next
        $('#smartwizard').smartWizard("next");
        return true;
    });


    function verifyStep2()
    {
        var forward = false;

        $(".momo_class").each(function(){
            var checked = $(this)[0].checked;

            if(checked == true)
            {
                forward = true;
            }
        });

        if(forward == false)
        {
            var message = "<strong>" +
                    "Please selected a payment method"
                + "</strong>";

            notify(message, 'error');
        }

        return forward;
    }

    function placeError($element, name)
    {
        var message =  name + " is required";
        notify(message, "error");

        $element.addClass("input-error");
        $element.next().text("This field is required");
    }

    function removeError($element)
    {
        //remove the errors
        if($element.hasClass('input-error'))
            $element.removeClass('input-error');

        $element.next().text("");
    }

});
