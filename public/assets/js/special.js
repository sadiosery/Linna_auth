/********************** form front-end validation code *******************************/
$(document).on('submit', '.formValidate', function(event){
    event.preventDefault();

    $('.formValidate .text-required').each(function(){
        if($(this).val() == '')
        {
            $(this).addClass('validationTextError');
            $('#validateMsg'+$(this).attr('data-msg')).html('Ce champ est requis !');
            $('#validateMsg'+$(this).attr('data-msg')).addClass('validationMsgError');
        } 

        /*if(($('.formValidate .validationTextError').lenght()) > 0)
        {
            $('#validation-main-msg').html('<div class="alert alert-primary mb-4" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button><strong>Tous les chapmps (*) sont requis !</button></div> ');
        }*/
        
    });
});

$(document).on('keyup', '.formValidate .text-required', function(){
    if($(this).val() != '')
    {
        $(this).removeClass('validationTextError');
        $('#validateMsg'+$(this).attr('data-msg')).empty();
        $('#validateMsg'+$(this).attr('data-msg')).removeClass('validationMsgError');
    }
    else
    {
        $(this).addClass('validationTextError');
        $('#validateMsg'+$(this).attr('data-msg')).html('Ce champ est requis !');
        $('#validateMsg'+$(this).attr('data-msg')).addClass('validationMsgError');
    }
});
/********************** form front-end validation code *******************************/

function returnDate(dt)
{
    var month = dt.substring(5,7);
    var day = dt.substring(8,10);
    var year = dt.substring(0,4);
    var output = day +"/"+ month+ "/"+ year;
            
    return output; 
}