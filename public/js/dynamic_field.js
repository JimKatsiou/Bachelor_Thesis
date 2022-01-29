$(document).ready(function(){

    $(document).on('click', '.add', function(){
        var html = '';
        html += '<tr>';
        html += '<td>';
        html += '<b>Μαθήμα</b>';

        // html += '<select name="dropdown" class="form-control dropdown" id=\'lessonsSelect\' style=\'width: 200px;\'>\n' +
        //     '        <option value=\'0\'>-- Select Lesson --</option></select><button type="button" id="target">Target..</button>';
        html += '<br><b>ECTS</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" />';
        html += '<br><b>Link(Οδηγός σπουδών)</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" />';
        html += '<br><b>Καθηγητής</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" /></td>';

        html += '<td>';
        html += '<b>Μαθήμα</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" />';
        html += '<br><b>ECTS</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" />';
        html += '<br><b>Link(Οδηγός σπουδών)</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" />';
        html += '<br><b>Καθηγητής</b>';
        html += '<input type="text" name="lesson_name" class="form-control lesson_name" /></td>';
        html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus">-</span></button></td>';
        html += '</tr>';

        $('#item_table').append(html);


        // var html = '';
        // html += '<tr>';
        // html += '<td><select name="dropdown" class="form-control dropdown" id=\'lessonsSelect\' style=\'width: 200px;\'>\n' +
        //     '        <option value=\'0\'>-- Select Lesson --</option></select><button type="button" id="target">Target..</button></td>';
        // html += '<td><input type="text" name="lesson_name" class="form-control lesson_name" /></td>';
        // html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="glyphicon glyphicon-minus"></span></button></td></tr>';
        // html += '<tr>';
        // html += '<td><input type="text" name="lesson_name" class="form-control lesson_name" /></td>';
        // html += '<td><input type="text" name="lesson_name" class="form-control lesson_name" /></td></tr>';
        //
        // $('#item_table').append(html);
    });

    $(document).on('click', '.remove', function(){
        $(this).closest('tr').remove();
    });

    $('#insert_form').on('submit', function(event){
        event.preventDefault();
        var error = '';
        $('.lesson_name').each(function(){
            var count = 1;
            if($(this).val() == '')
            {
                error += "<p>Enter Lesson Name at "+count+" Row</p>";
                return false;
            }
            count = count + 1;
        });

        $('.dropdown').each(function(){
            var count = 1;
            if($(this).val() == '')
            {
                error += "<p> Select Unit at "+count+" Row</p>";
                return false;
            }
            count = count + 1;
        });
        var form_data = $(this).serialize();
        if(error == '')
        {
            $.ajax({
                url:"insert.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                    if(data == 'ok')
                    {
                        $('#item_table').find("tr:gt(0)").remove();
                        $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
                    }
                }
            });
        }
        else
        {
            $('#error').html('<div class="alert alert-danger">'+error+'</div>');
        }
    });

});

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
