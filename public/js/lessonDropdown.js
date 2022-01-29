$( "#target" ).click(function() {
    $.ajax({
        type: 'get',
        url: 'http://127.0.0.1:8000/lessons/getAll',
        dataType: 'json',
        contentType: 'application/json; charset=utf-8',
        data: JSON.stringify({'data':'something'}),
        success: function(lessonsList) {
            lessonsList.forEach((lesson) =>{
                appendDropDown(lesson)
            });
        },
        error: function() {
            $(this).html("error!");
        }
    });
})(jQuery);


function appendDropDown(lesson){
    $("#lessonsSelect").append("<option value='"+lesson['id']+"'>"+lesson['name']+"</option>");
}

// function appendDropDown(lesson){
//     $("#lessonsSelect").append("<option value='"+lesson['id']+"'>"+lesson['name']+"</option>");
// }
//
// $(document).ready(function(){
//
//     load_json_data('lesson');
//     function load_json_data(id, parent_id)
//     {
//         var html_code = '';
//         $.getJSON('resources.lang.en.json', function(data)
//         {
//             html_code += '<option value="">Select '+id+'</option>';
//             $.each(data, function(key, value){
//             if(id == 'country')
//             {
//                 if(value.parent_id == '0')
//                 {
//                     html_code += '<option value="'+value.id+'">'+value.name+'</option>';
//                 }
//             }
//             else
//             {
//                 if(value.parent_id == parent_id)
//                 {
//                     html_code += '<option value="'+value.id+'">'+value.name+'</option>';
//                 }
//             }
//         });
//         $('#'+id).html(html_code);
//         });
//     }

    // $(document).on('change', '#country', function(){
    //     var country_id = $(this).val();
    //     if(country_id != '')
    //     {
    //         load_json_data('state', country_id);
    //     }
    //         else
    //     {
    //         $('#state').html('<option value="">Select state</option>');
    //         $('#city').html('<option value="">Select city</option>');
    //     }
    //     });
    //         $(document).on('change', '#state', function(){
    //         var state_id = $(this).val();
    //         if(state_id != '')
    //     {
    //         load_json_data('city', state_id);
    //     }
    //         else
    //     {
    //         $('#city').html('<option value="">Select city</option>');
    //     }
    //     });
// });

