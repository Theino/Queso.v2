@extends('frontend.layouts.master')

@section('content')

<section class="hero is-bold is-light" id="activity">
    <div class="hero-body">
        <div class="container is-fluid">
            <h1 class="title">{!! $quest->name !!}</h1>
                <div class="content">
                    @if($quest->quest_type_id == 1)
                        {!! $attempt->submission !!}
                    @endif

                    @if($quest->quest_type_id == 5 || $quest->quest_type_id == 6)
                        @if(!$files->isEmpty())
                            @foreach($files as $file)
                                <p>{!! link_to('uploads/' . $file->name, substr($file->name,5), ['class' => 'preview', 'download' => substr($file->name,5)]) !!}</p>
                            @endforeach
                        @endif
                    @endif

                    @if($quest->quest_type_id == 4 || $quest->quest_type_id == 7)
                      <a href="{{ $attempt->url }}" data-iframely-url>{{ $attempt->url }}</a>
                    @endif

                </div>
                <div class="tile is-ancestor">
                    {!! Form::open(array('url' => 'quest/feedback')) !!}
                    <div class="tile is-parent">
                        <div class="tile is-child">
                            <h3 class="subtitle">What did you like?</h3>
                            <p>Share your thoughts on what you liked about this.</p>
                                {!! Form::hidden('user_id', $user->id) !!}
                                {!! Form::hidden('quest_id', $quest->id) !!}
                                {!! Form::hidden('revision', $attempt->revision) !!}
                                {!! Form::textarea('liked', null, ['class' => 'field', 'files' => true]) !!}            
                        </div>
                        <div class="tile is-child">
                            <h3 class="subtitle">What could be improved?</h3>
                            <p>Share your thoughts on where this could be improved. Is there something you wished they explored? Are there other possibilities to explore?</p>

                            {!! Form::textarea('suggestions', null, ['class' => 'field', 'files' => true]) !!}            
                        </div>
                            <div class="field">
                                <p class="control">
                                    {!! Form::submit('Submit', ['class' => 'button is-large is-primary']) !!}        
                                </p>
                            </div>
                    </div>
                            {!! Form::close() !!}
                </div>
        </div>
    </div>
</section>

@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop