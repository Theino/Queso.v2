@extends('frontend.layouts.master')

@section('content')

<div class="col-lg-9">
    <h2>{!! $quest->name !!}</h2>
</div>
{!! Form::open(array('url' => 'grade/confirm/activity')) !!}
{!! Form::hidden('quest_id', $quest->id ) !!}

<div class="col-lg-3">

</div>

<div class="col-lg-9">
        <div class="col-xs-5">
            <b>Available Students</b>
            <select name="from[]" class="multiselect form-control" size="8" multiple="multiple" data-right="#multiselect_to_1" data-right-all="#right_All_1" data-right-selected="#right_Selected_1" data-left-all="#left_All_1" data-left-selected="#left_Selected_1">
            @foreach($students as $student)
                <option value="{!! $student->id !!}">{!! $student->name !!}</option>
            @endforeach
            </select>
        </div>
        
        <div class="col-xs-2">
            &nbsp;
            <button type="button" id="right_All_1" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
            <button type="button" id="right_Selected_1" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
            <button type="button" id="left_Selected_1" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
            <button type="button" id="left_All_1" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
        </div>
        
        <div class="col-xs-5">
            <b>Selected Students to Receive Grade</b>
            <select name="students[]" id="multiselect_to_1" class="form-control" size="8" multiple="multiple"></select>
        </div>
</div>

<div class="col-lg-3">
                <h5><b>Skills</b></h5>                
                @foreach($skills as $skill)
                  <div class="col-lg-5">
                      <label>{!! $skill->name !!}</label>
                  </div>

                  <div class="col-lg-7">
                    <div class="input-group">
                        <input type="number" class="form-control point-val" name="skills[]" max="{!! $skill->pivot->amount !!}">
                        <div class="input-group-addon"> / {!! $skill->pivot->amount !!}</div>
                    </div>
                      {!! Form::hidden('skill_id[]', $skill->id) !!}

                  </div>                    
                @endforeach


                <div class="col-lg-12">
                    <div class="pull-right">
                        <h3><span id="total">0</span> / {!! $quest->skills()->sum('amount') !!}</h3>
                    </div>
                </div>


</div>


    <div class="col-lg-12">

        <h4>Feedback</h4>

        <div class="row">
            <div class="col-lg-9">
                {!! Form::textarea('feedback', null, ['class' => 'field', 'files' => false]) !!}
            </div>
            <div class="col-lg-3">
                    {!! Form::submit('Submit Grade', ['class' => 'btn btn-primary btn-lg btn-block']) !!}
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
    $('.point-val').change(function() {
        var totz = 0;
        $( ".point-val" ).each(function( index ) {
            if($(this).val()) {
              totz = totz + parseInt($(this).val());
            }
          });
        $("span#total").html(totz);
    });    
    </script>
@stop