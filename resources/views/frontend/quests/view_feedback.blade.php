@extends('frontend.layouts.master')

@section('content')
<h2>Feedback for {!! $quest->name !!}</h2>
    <div class="row">
        <div class="col-lg-9">
            @if($quest->quest_type_id == 1)
                {!! $attempt->submission !!}
                @if($files)
                    <h6>Attached Files</h6>
                    @foreach($files as $file)
                        {!! link_to('public/uploads/' . $file->name, $file->name, ['class' => 'btn btn-default']) !!}
                    @endforeach
                @endif
            @endif

            @if($quest->quest_type_id == 4)
              <a href="{{ $attempt->url }}" data-iframely-url>{{ $attempt->url }}</a>
            @endif

        </div>
        <div class="col-lg-3">
            @if($graded)
                <div class="col-lg-12">
                    <h4>Current Grade</h4>
                </div>
                    <ul class="list-unstyled">
                    @foreach($quest_skills as $index => $quest_skill)
                        <li>
                            <div class="col-lg-12">
                                <div class="col-lg-6">
                                    {!! $quest_skill->name !!}
                                </div>
                                <div class="col-lg-6">                                
                                    {!! $skills[$index]->pivot->amount !!} / {!! $quest_skill->pivot->amount !!}
                                </div>
                            </div>
                        </li>
                    @endforeach
                    </ul>
            @else
            <div class="col-lg-12">
                <h3><span class="label label-danger pull-right">UNGRADED</span></h3>
            </div>
            @endif

        </div>  
    </div>
            @if($positive)
                <h4>What Your Peers Liked</h4>
                @foreach($positive as $feedback)            
                    <div class="col-lg-12">

                        <h6>{!! $feedback->user_from->name !!}</h6>
                        {!! $feedback->note !!} <a class="btn btn-default pull-right" href="#" role="button"><span class="glyphicon glyphicon-heart"></span></a>
                    </div>
                @endforeach
            @endif
            @if($negative)
                <h4>Suggestions From Your Peers</h4>
                @foreach($negative as $feedback)
                    <div class="col-lg-12">
                        <h6>{!! $feedback->user_from->name !!}</h6>
                        {!! $feedback->note !!} <a class="btn btn-default pull-right" href="#" role="button"><span class="glyphicon glyphicon-heart"></span></a>

                    </div>    
                @endforeach
            @endif
            @if($graded)
            <div class="col-lg-12">
                <h4>From The Professor</h4>
                @foreach($instructor_feedback as $feedback)
                    {!! $feedback->note !!}
                @endforeach
            </div>
            @endif
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop