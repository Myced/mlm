$(document).ready(function(){

    var cookie = $("#cookie").val();
    var token = $("#token").val();

    $('.ref_radio').on('ifChecked', function(event){
        var value = $(this).val();
        $refInfo = $("#refInfo");

        if(value == "yes")
        {
            //then show the referrer info box
            if($refInfo.hasClass('hide'))
            {
                $refInfo.removeClass('hide');
            }

            $refInfo.addClass('show');
        }
        else {
            //hide it
            if($refInfo.hasClass('show'))
            {
                $refInfo.removeClass('show');
            }

            $refInfo.addClass('hide');
        }
    });

    $("#verifyRefBtn").click(function(){
        var refId = $("#ref_id").val();

        if(refId == "")
        {
            $("#ref_name").val('');
            alert("The Ref Id or email is required");
        }
        else {
            //verfify ref id
            verifyRef(refId);
        }
    });

    //listen to email event and handle it
    $("#email").focusout(function(){
        var mail = $(this).val();
        verifyEmail(mail);
    });

    function verifyRef(ref)
    {
        //make an ajax request
        ajax =  $.ajax({
            url : "/api/verify/verifyref",
            method : "post",
            dataType : "text",
            data : { _token:token, cookie:cookie, ref:ref },
            error : function(e)
            {
                var message = "<strong>" +
                    "Could not verify Referrer. <br>" +
                    "Please check your internet connection"
                + "</strong>";

                notify(message, 'error');
            },
            success : function(data)
            {
                var object = $.parseJSON(data);

                if(object.status == true)
                {
                    //grab the name and
                    var name = object.message;
                    $("#ref_name").val(name);

                    //remove error class
                    if($("#ref_id").hasClass('error-form'))
                    {
                        $("#ref_id").removeClass("error-form");
                    }

                    var text = "<strong> Referrer has been verified </strong> <br>";
                    notify(text, "success");

                }
                else {
                    var text = object.message;

                    if(!$("#ref_id").hasClass('error-form'))
                    {
                        $("#ref_id").addClass("error-form");
                    }

                    $("#ref_name").val("");

                    notify(text, 'error');
                }

            }
        });


    }

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

    $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {

        var email = $("#email").val();
        if(stepNumber == 2)
        {
            $("#userEmail").val(email);
        }

    });

    $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {

        //if the direction is forward then validate
        if(stepDirection == "forward")
        {
            if(stepNumber == 0)
            {
                var stepResult = validateStep0();

                return stepResult;
            }
            else if(stepNumber == 1) {

                var status = validateStep2();

                return status;

            }
            else if(stepNumber == 2)
            {
                var status  = verifyStep3();

                return status;
            }
            else if(stepNumber == 4)
            {
                var status = verifyStep5();

                return status;
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

    //my custom functions here
    function validateStep0()
    {
        var radioSelected  = false;
        var option = "";

        //variable to inidicate if to go forward or not
        var forward = false;

        $ref_name = $("#ref_name");
        $ref_id = $("#ref_id");

        $('.ref_radio').each(function(){
            var value = $(this);

            var status = value[0].checked;

            var theValue = value.val();

            var notificationMessage = '';

            if(status == true)
            {
                radioSelected = true;
                option = theValue;

                //if selected is yes
                if(theValue == "no")
                {
                    forward = true;
                }
                else {
                    //check that the name is there.
                    if($ref_id.val() == "")
                    {
                        notificationMessage = "<strong> You have selected that you were referred by"
                         + " someone. You need to enter the referral code and click on verify </strong>";

                         notify(notificationMessage, 'warning');

                         forward = false;
                    }
                    else {
                        if($ref_name.val() == "")
                        {
                            if($ref_id.hasClass("error-form"))
                            {
                                notificationMessage = "<strong> The ref code you entered is wrong. "
                                    + " Please enter the right one. </strong>";

                                notify(notificationMessage, "warning");
                                forward = false;
                            }
                            else {
                                notificationMessage = "<strong> Please click on the verify button below "
                                    + " to verify the referrer code </strong>";

                                notify(notificationMessage, 'info');
                                forward = false;
                            }
                        }
                        else {
                            forward = true;
                        }
                    }
                }

            }


        });

        return forward;

    }

    function validateStep2()
    {
        var forward = true;

        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var tel = $("#tel").val();
        var address = $("#address").val();

        var elements = [
            {
                name: "First Name",
                value : $("#fname")
            },
            {
                name: "Last Name",
                value : $("#lname")
            },
            {
                name: "Address",
                value : $("#address")
            },
            {
                name : "Email",
                value : $("#email")
            },
            {
                name : "Telephone",
                value : $("#tel")
            }
        ];

        for (var i = 0; i < elements.length; i++)
        {
            var current = elements[i];

            if(current.value.val() == "")
            {
                forward = false;
                placeError(current.value, current.name);
            }
            else {
                if(current.name != "Email")
                {
                    removeError(current.value);
                }
                else {
                    //check if it has an error
                    if(current.value.hasClass('input-error'))
                    {
                        var message = "<strong>" +
                            "Email has been used already"
                        + "</strong>";

                        notify(message, 'error');
                        forward = false;
                    }
                }
            }
        }

        //now that all is validated
        //check now for those which are suppose to
        //have ajax callbacks
        if(forward == false)
        {
            //since there is a required field which
            //has not been filled, we should just return
            //and reduce computation cost
            return forward;
        }
        else {
            //validate ajax call backs
            //check the forms again for errors

            //only the email
            if($("#email").hasClass("input-error"))
            {
                var message = "<strong>" + name + " This email address is "
                                + " already taken. Please use another one. Or Login with it" + "</strong>";
                notify(message, "error");
            }
        }

        return forward;
    }

    function verifyStep3()
    {
        //check the passwords
        var password = $("#password").val();
        var rpassword = $("#rpassword").val();

        var forward = true;

        if(password == "")
        {
            forward = false;
            placeError($("#password"), "Password");
        }
        else {
            removeError($("#password"));

            if(rpassword == "")
            {
                forward = false;
                placeError($("#rpassword"), "Repeat Password ");
            }
            else {

                removeError($("#rpassword"));

                //now check that they are the same
                if(password !== rpassword)
                {
                    forward = false;
                    var message = "<strong>" +
                    "Your passwords do not match"
                    + "</strong>";

                    notify(message, 'error');

                    $("#password").addClass("input-error");
                    $("#password").next().text("Passwords donot match");
                }
                else {
                    if($("#password").hasClass("input-error"))
                        $("#password").removeClass("input-error");

                    $("#password").next().text("");
                }
            }
        }

        return forward;

    }

    function verifyStep5()
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
        var message = "<strong>" + name + " is required" + "</strong>";
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

    function verifyEmail(email)
    {
        //make a post request
        if(email != '')
        {
            $.ajax({
                url : '/api/verify/email/' + email,
                method : 'get',
                dataType : 'text',
                error : function(error)
                {
                    // console.log(error.responseText);
                    var mess = "<strong>" +
                        "Error validating the Email. <br>" +
                        "Please check your internet connection"
                     + "</strong>";

                },
                success : function(data)
                {
                    $email = $("#email");

                    var response = $.parseJSON(data);

                    if(response.status)
                    {
                        //this is a valid email
                        $email;

                        var message = "<strong>" +
                            "Email verified"
                        + "</strong>";

                        notify(message, "success");

                        if($email.hasClass('input-error'))
                        {
                            $email.removeClass('input-error')
                        }
                        $email.next().text("");
                    }
                    else {
                        //email has been used
                        var message = "<strong>" +
                            "Email has been used already"
                        + "</strong>";

                        notify(message, 'error');

                        $email = $("#email");

                        $email.addClass('input-error');
                        $email.next().text("Email invalid or already used");
                    }

                }
            });
            //end of ajax request
        }
    }

});
