$(document).ready(function(){
// var count = 0;
//     $( ".add-row" ).click(function(e){
//         e.preventDefault();
//         var html = '';
//         html ='<div class="form-check mycheck">\n' +
//             '                <div class="custom-radio">\n' +
//             '                    <input type="radio" id="customRadio' + count +'" class="custom-control-input" name="check" disabled>\n' +
//             '                    <label class="custom-control-label" for="customRadio' + count +'">\n' +
//             '                        <input type="text" class="form-control" name="ans[]">\n' +
//             '                    </label>\n' +
//             '                    <button class="myremove">remove</button>\n' +
//             '                </div>\n' +
//             '            </div>';
//
//           $('.one').append(html);
//           count++;
//     });
//
//     // $('input[type=radio]').on('change',function (){
//     //    console.log($('[name=check]:checked').val());
//     //
//     // });
//     $(document).on('click','input[name=check]',function (){
//         // console.log($('[name=check]:checked').val());
//     });
//
//     $('.mycheck label input[type="text"]').keyup(function() {
//         if($(this).val() != '') {
//             $(this).parents('div').find('input[type="radio"]').removeAttr('disabled');
//         }
//         if($(this).val() == '') {
//             $('.mycheck  input[type="radio"]').attr('disabled','disabled');
//         }
//     });
//
//     $(document).on("click",'input[name=check]',function (){
//         $('input[name=check]').val($('input[name="ans[]"]').val());
//         console.log( $('input[name="check"]').val());
//     });
//
//     $(document).on('click', '.myremove', function () {
//         $(this).closest('.mycheck').remove();
//     });



   // console.log( $('input[name="check"]:checked').val() = $('input[name="check"]"]')  ) ;
    // $( ".add-q" ).click(function(e){
    //     e.preventDefault();
    //     var html = '';
    //     html ='        <div class="form-group one">\n' +
    //         '            <input type="text" >\n' +
    //         '            <button class="add-row">Add</button>\n' +
    //         '            <div class="form-check mycheck">\n' +
    //         '                <input class="form-check-input" type="checkbox" id="gridCheck1">\n' +
    //         '                <label class="form-check-label" for="gridCheck1">\n' +
    //         '                   <input type="text" class="form-control">\n' +
    //         '                </label>\n' +
    //         '                <button class="myremove">remove</button>\n' +
    //         '            </div>\n' +
    //         '        </div>';
    //
    //       $('.myform').append(html);
    // });
    // $(document).on('click', '.remove-q', function () {
    //     $(this).closest('.one').remove();
    // });

    /* For Upload files if wants
    *     $("label input[type=file]").change(function() { $('label input[type=file]').val()});
    *  $('label input[type=file]').mouseleave(function (){
        console.log($('label input[type=file]').val())
        if($('label input[type=file]').val()!=''){
            $(this).parent().prev($('input[type=radio]')).removeAttr('disabled')
        }else{
            $('label input[type=file]').parent().prev($('input[type=radio]')).attr('disabled','disabled')

        }
    })
    *
    *
    * */

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
