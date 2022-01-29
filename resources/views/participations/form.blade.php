@extends('layouts.app')


@section('content')
    <html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- <script src="{{ asset('js/dynamic_field.js') }}" type="text/javascript"></script> -->
        <script src="{{ asset('js/lessonDropdown.js') }}" type="text/javascript"></script>

        <meta charset="utf-8">
        <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

        <script async="" src="https://www.google-analytics.com/analytics.js"></script>
        <script async="async" src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <a href="{{ url('/home') }}" type="button" class="btn btn-danger">Πίσω-Αρχική</a>
                <br><br>
                <div class="card">
                    <div class="card-header" align="center"><b>ΑΙΤΗΣΗ ΑΝΤΙΣΤΟΙΧΙΣΗΣ ΜΑΘΗΜΑΤΟΣ ΓΙΑ ΦΟΙΤΗΤΕΣ ΠΟΥ ΘΑ ΜΕΤΑΚΙΝΗΘΟΥΝ ΜΕΣΩ ERASMUS+ ΓΙΑ ΣΠΟΥΔΕΣ</b></div>

                    <div class="card-body">
                        @if(session()->has('message'))
                            <div class="alert alert-success">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                        <form class="pure-form pure-form-stacked" method="post" action="{{ url('/participation/store') }}" aria-label="{{ __('My form') }}">
                            {{csrf_field()}}
                            <legend><b>1. Στοιχεία μετακινούμενου φοιτητή</b></legend><br><br>
                            <label>Όνομα</label>
                            <input name="name" type="text">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <label>Επίθετο</label>
                            <input name="LastName" type="text">
                            <span class="text-danger">{{ $errors->first('LastName') }}</span>
                            <br><br>
                            <label>AM</label>
                            <input name="AM" type="text">
                            <span class="text-danger">{{ $errors->first('AM') }}</span>
                            <label>Mail</label>
                            <input name="Mail" type="text"><br>
                            <span class="text-danger">{{ $errors->first('Mail') }}</span>
                            <hr>
                            <b>2. Στοιχεία μετακίνησης</b><br><br>
                            <label>Ακ.Έτος</label>
                            <input name="Etos" type="text">
                            <span class="text-danger">{{ $errors->first('Etos') }}</span>
                            <label>Ακ.Εξάμηνο (εαρινό/χειμερινό)</label>
                            <input name="Eksamino" type="text">
                            <span class="text-danger">{{ $errors->first('Eksamino') }}</span>
                            <br><br>
                            <label>Universities</label>
                            <select class="form-control" name="universities">
                                <option selected disabled>select universities</option>
                                @foreach ($data as $dt)
                                    <option value="{{$dt->name}}">{{$dt->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->first('universities') }}</span>

                            <hr>
                            <b>3. Αντιστοίχηση Μαθημάτων</b><br><br>
                            <div class="table-responsive">
                                <span id="result"></span>
                                <table class="table table-bordered table-striped" id="item_table">
                                    <tr>
                                        <th>ΜΑΘΗΜΑ (uop)</th>
                                        <th>ΜΑΘΗΜΑ (allo)</th>
                                        <th><button type="button" name="add" class="btn btn-success btn-sm add"><span class="glyphicon glyphicon-plus">+</span></button></th>
                                    </tr>

                                </table>
                                <input type="submit" name="submit" class="btn btn-info pull-left" value="Ολοκλήρωση" />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function(){

            $(document).on('change', '.crsnm', function(){
                lnk=$(this).find("option:selected").attr('data-link');
                ects=$(this).find("option:selected").attr('data-ects');
                lk=$(this).find("option:selected").attr('data-links');
                $(this).parent().find('.ectc_nm').val(lnk);
                $(this).parent().find('.link_ects').val(ects);
                $(this).parent().find('.ects_link').val(lk);
            });
            $(document).on('click', '.add', function(){
                var html = '';
                html += '<tr>';
                html += '<td>';
                html += '<b>Μαθήμα</b>';
                html += '<select name="uop_course_is[]" class="form-control crsnm dropdown">';
                html += ' <option value="" data-link="">Choose One</option>';
                @foreach ($course as $c)
                    html += ' <option value="{{$c->name}}" data-link="{{$c->name}}" data-ects="{{ $c->ects }}" data-links="{{ $c->link }}">{{$c->name}}</option>';
                @endforeach
                    html += '</select><br><b>ECTS</b>';
                html += '<input type="text" name="uop_ects_is[]" class="form-control lesson_name link_ects" required />';
                html += '<br><b>Link(Οδηγός σπουδών)</b>';
                html += '<input type="text" name="uop_links_is[]" class="form-control lesson_name ects_link" required/>';
                html += '<br><b>Καθηγητής</b>';
                html += '<input type="text" name="uop_professor_is[]" class="form-control lesson_name" required/></td>';

                html += '<td>';
                html += '<b>Μαθήμα</b>';
                html += '<input type="text" name="allo_lesson_is[]" class="form-control lesson_name" required/>';
                html += '<br><b>ECTS</b>';
                html += '<input type="text" name="allo_ects_is[]" class="form-control lesson_name" required/>';
                html += '<br><b>Link(Οδηγός σπουδών)</b>';
                html += '<input type="text" name="allo_links_is[]" class="form-control lesson_name" required/>';
                html += '<br><b>Καθηγητής</b>';
                html += '<input type="text" name="allo_professor_is[]" class="form-control lesson_name" required/></td>';
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
            $(".add").click();
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

    </script>
    </body>
    </html>

@endsection

