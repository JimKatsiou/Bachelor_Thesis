@extends('layouts.appindexpage')

@section('content')
<h1>{{$title}}

    @admin
    <a class="btn btn-secondary fa-pull-right" href="{{ url('link_details') }}" role="button" >Edit</a>
    @endadmin

{{--        @hasrole('admin')--}}
{{--            <a class="btn btn-secondary pull-right" href='admin/pages/edit' role="button" >Edit</button></a>--}}
{{--        @endhasrole--}}

</h1>

    <hr>

    <div class="newsitem_text">
        @foreach ($data as $dt)
        <p style="line-height: 150%;">
        {!! $dt->content !!}
        </p>
        @endforeach
    </div>
    </div>
    <!--end news item -->

    </div>
    <!-- end component -->
    <!-- end mid block inside-container -->
    </div>
    <!-- end mid block div -->
    </div>
    <!-- end holder div -->
    </div>
    <!-- end centerbottom-->
    <div class="footer_out yjsgouts">

@endsection
