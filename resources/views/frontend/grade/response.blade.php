@extends('frontend.layouts.master')

@section('content')

<section class="hero is-bold is-light is-medium" id="create_resource">
    <div class="hero-body">
        <div class="container is-fluid">        
            {!! Form::open(array('url' => 'grade/confirm')) !!}

            <h2 class="title">{!! $quest->name !!}, {!! $student->name !!}, {!! date('m/d/Y', strtotime($attempt->created_at)) !!}</h2>
            <h3 class="subtitle">{!! $quest->instructions !!}</h3>

            <div class="tile">
                <div class="tile is-parent">
                    <div class="tile is-child">
                        <div class="container is-fluid">
                          @if($quest->quest_type_id == 1)
                            {!! $attempt->submission !!}
                          @endif
                          
                          @if(!$files->isEmpty())
                              @foreach($files as $file)
                                {!! link_to('uploads/' . $file->name, substr($file->name,5), ['class' => '', 'download' => substr($file->name,5)]) !!}
                              @endforeach
                          @endif

                          @if($revision_count > 1)
                            <h4 class="subtitle">Previous Feedback</h4>
                            @foreach($previous_feedback as $feedback)
                                <blockquote>
                                  {!! $feedback->note !!}
                                  <footer>Revision #{!! $feedback->revision !!} 
                                  <cite title="Source Title">
                                    {!! date('m/d/Y', strtotime($feedback->created_at)) !!}</cite>
                                  </footer>
                                  
                                </blockquote>
                            @endforeach
                          @endif
              
                          @if(!$positive_feedback->isEmpty() || !$negative_feedback->isEmpty())
                            <h4 class="subtitle">Peer Feedback</h4>
                          @endif
                          @if(!$positive_feedback->isEmpty())
                            <h5 class="subtitle">Positives</h5>    
                            @foreach($positive_feedback as $feedback)

                              <blockquote>
                                {!! $feedback->note !!}
                                <footer><cite title="Source Title">{!! $feedback->user_from->name !!}</cite></footer>
                              </blockquote>
                            @endforeach
                        @endif

                        @if(!$negative_feedback->isEmpty())
                          <h5 class="subtitle">Areas for Improvement</h5>

                            @foreach($negative_feedback as $feedback)
                              <blockquote>
                                {!! $feedback->note !!}
                                <footer><cite title="Source Title">{!! $feedback->user_from->name !!}</cite></footer>
                              </blockquote>
                            @endforeach
                        @endif

                        <hr/>
                        <h4>Feedback to Student</h4>
                            {!! Form::hidden('quest_id', $quest->id) !!}
                            {!! Form::hidden('attempt_id', $attempt->id) !!}
                            {!! Form::textarea('feedback', null, ['class' => 'field', 'files' => true]) !!}
                            {!! Form::submit('Grade', ['class' => 'button is-primary is-large']) !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tile is-4 is-child box">
                @if($revision_count > 1)
                  <h4 class="title">{!! date('m-d-Y', strtotime($attempt->created_at)) !!}</h4>
                  @foreach($revisions as $revision)
                    {{ link_to('grade/quest/'.$quest->id . '/' . $revision->id, '#'. $revision->revision . ' ' . date('m-d-Y', strtotime($revision->created_at))) }}
                  @endforeach
                @endif

                @foreach($skills as $skill)
                  <label>{!! $skill->name !!}</label>
                  <div class="input-group">
                    <input type="number" class="input point-val" name="skills[]" max="{!! $skill->pivot->amount !!}">
                      {!! Form::hidden('skill_id[]', $skill->id) !!}
                    <div class="input-group-addon"> / {!! $skill->pivot->amount !!}</div>
                  </div>
                @endforeach
                <h3><span id="total">0</span> / {!! $quest->skills()->sum('amount') !!}</h3>
            </div>
        </div>
      {!! Form::close() !!}
    </div>
</section>

@endsection

@section('after-scripts-end')
    <script>
    $('.point-val').change(function() {
        var totz = 0;
        $( ".point-val" ).each(function( index ) {
            if($(this).val()) {
              totz = totz + parseInt($(this).val());
            }
          });
        $("span#total").html(totz);
    });

    $(document).ready(function () {
        $(window).on('beforeunload', function(){
            return "You have unsaved changes!";
        });
        $(document).on("submit", "form", function(event){
            $(window).off('beforeunload');
        });
    });

    </script>
@stop