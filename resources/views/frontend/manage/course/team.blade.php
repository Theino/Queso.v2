@extends('frontend.layouts.master')

@section('content')
    <h2>{!! $team->name !!}</h2>
<div class="row">
    <div class="col-xs-5">
        <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
            <option value="1">Item 1</option>
            <option value="2">Item 5</option>
            <option value="2">Item 2</option>
            <option value="2">Item 4</option>
            <option value="3">Item 3</option>
        </select>
    </div>
    
    <div class="col-xs-2">
        <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="glyphicon glyphicon-forward"></i></button>
        <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-right"></i></button>
        <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="glyphicon glyphicon-chevron-left"></i></button>
        <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="glyphicon glyphicon-backward"></i></button>
    </div>
    
    <div class="col-xs-5">
        <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
    </div>
</div>
@endsection

@section('after-scripts-end')
    <script>

    jQuery(document).ready(function($) {
        $('#multiselect').multiselect();
    });


    </script>
@stop