
$(document).ready(function(){

    $('label input[type=text]').keyup(function (){
        if($(this).val()!=''){
            $(this).parent().prev($('input[type=radio]')).removeAttr('disabled')
        }else{
            $(this).parent().prev($('input[type=radio]')).attr('disabled','disabled')
        }
    })
    $('.radio').click(function (){
        $text = $('input[type=radio]:checked').next().find($('input[type=text]')).val();
       $('input[type=radio]:checked').val($text);
       console.log($text);
        // $(this).submit();
    });

});
