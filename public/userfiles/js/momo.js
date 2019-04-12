$(document).ready()
{
    //filter the number
    $('#pay').click(function(){

        $number = $('#tel').val();

        var numb = filter_num($number);

        //check the length of the string
        var length = numb.length;

        //if the length of the string is not 9 then trigger a lenght
        if(length != 9)
        {
            //trigger an error.

            show_error("Sorry. Phone number is incorrect");
        }
        else if(isNaN(numb))
        {
            show_error("Sorry. Phone number must contain only digits");
        }
        else {

            //trigger the api to pay
            var token = $("#token").val();
            var order = $("#order").val();
            var url  = "/api/payment/momo";

            //do a jquery get on the link
            //indicate processing
            page_loading_on();

            $.ajax({
                url : url,
                method : 'post',
                dataType : 'text',
                data : { _token:token, order:order, number:numb },
                error: function(error)
                {
                    show_error('Could not process Payment. Check your internet!');
                    console.log(error.responseText);
                    page_loading_off();
                },
                success: function(data)
                {
                    page_loading_off();


                    $object = $.parseJSON(data);


                    if($object.status === true)
                    {
                        show_success("Transaction Successful");
                        showNotification('info', 'You will be redirected in a second');

                        //then redirect the user;
                        setTimeout(function(){
                            window.location.href= '/user/order/' + order;
                        }, 3000);

                    }
                    else {
                        show_error($object.message);
                    }
                }
            }); //end ajax request;


        }
    });

    //function to filter the phone number
    function filter_num(number)
    {
        var num = number.replace(/\s/g, '');
            num = num.replace(/\,/g, '');
            num = num.replace(/\-/g, '');
            num = num.replace(/\./g, '');
            num = num.replace(/\_/g, '');
            num = num.replace(/\+/g, '');

        return num;
    }

    function show_error(error)
    {
        showNotification('danger', error);
    }

    function show_success(success)
    {
        showNotification('success', success);
    }

    function page_loading_on(){
        $(".preloader").addClass('active');
    }

    function page_loading_off(){
        if($(".preloader").hasClass('active'))
        {
            $(".preloader").removeClass('active')
        }
    }
}
