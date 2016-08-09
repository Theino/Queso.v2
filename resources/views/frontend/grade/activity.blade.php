@extends('frontend.layouts.master')

@section('content')

<div class="col-lg-9">
    <h2>{!! $quest->name !!}</h2>
</div>
{!! Form::open(array('url' => 'grade/confirm/activity')) !!}

<div class="col-lg-3">

</div>

<div class="col-lg-9">
        <div class="col-xs-5">
            <select name="from[]" class="multiselect form-control" size="8" multiple="multiple" data-right="#multiselect_to_1" data-right-all="#right_All_1" data-right-selected="#right_Selected_1" data-left-all="#left_All_1" data-left-selected="#left_Selected_1">
                <option value="1">Item 1</option>
                <option value="2">Item 5</option>
                <option value="2">Item 2</option>
                <option value="2">Item 4</option>
                <option value="3">Item 3</option>
            </select>
        </div>
        
        <div class="col-xs-2">
            <button type="button" id="right_All_1" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
            <button type="button" id="right_Selected_1" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
            <button type="button" id="left_Selected_1" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
            <button type="button" id="left_All_1" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
        </div>
        
        <div class="col-xs-5">
            <select name="to[]" id="multiselect_to_1" class="form-control" size="8" multiple="multiple"></select>
        </div>
</div>

<div class="col-lg-3">
                <div class="col-lg-6">
                    <label>Skill #1</label>
                </div>
                <div class="col-lg-6">
                    <input type="number" class="form-control" id="skill1">
                </div>

                <div class="col-lg-6">
                    <label>Skill #2</label>
                </div>
                <div class="col-lg-6">
                    <input type="number" class="form-control" id="skill2">
                </div>

                <div class="col-lg-6">
                    <label>Skill #3</label>
                </div>
                <div class="col-lg-6">
                    <input type="number" class="form-control" id="skill3">
                </div>

                <hr/>

                <div class="col-lg-12">
                    <div class="pull-right">
                            <span>xx</span> / 50
                    </div>
                </div>

                  <div class="col-lg-12">
                    {!! Form::submit('Grade', ['class' => 'btn btn-primary btn-lg btn-block']) !!}

                  </div>

</div>


    <div class="col-lg-12">

        <h4>Feedback</h4>

        <div class="row">
            <div class="col-lg-9">
                {!! Form::textarea('notes', null, ['class' => 'field', 'files' => false]) !!}
            </div>
            <div class="col-lg-3">
                <div class="col-lg-12">
                  {{ Form::select('students', array('1' => 'Sally Fields', '2' => 'Tom Hanks'), '2') }}
                </div>
            </div>


        </div>
        {!! Form::close() !!}

    </div>
@endsection

@section('after-scripts-end')
    <script>
    jQuery(document).ready(function($) {
        $('.multiselect').multiselect();
    });    
    </script>
@stop