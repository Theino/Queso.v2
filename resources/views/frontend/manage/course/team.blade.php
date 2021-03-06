@extends('frontend.layouts.master')

@section('content')
<section class="section dark-section">
    <div class="columns">
        <div class="column is-2">
        @include('frontend.includes.admin')
        </div>
        <div class="column">
            <div class="box">
                <div class="field">
                {!! Form::open(array('url' => 'manage/course/team')) !!}
                {!! Form::hidden('team_id', $team->id ) !!}
                {!! Form::submit('Add to Team', ['class' => 'button is-primary is-pulled-right']) !!}
                <select style="width: 80%" multiple name="students_added[]" id="add_to_team" placeholder="Select Students...">
                        @foreach($students_not_on_team as $student)
                            <option value="{!! $student->id !!}">{!! $student->name !!}</option>
                        @endforeach
                </select>
                </div>
                {!! Form::close() !!}

                <h1 class="title headline is-uppercase">{!! $team->name !!}</h1>

                @if(!$students->isEmpty())

                    <table class="table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Email Address</th>
                          <th class="grades">Points</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($students as $student)
                            <tr>
                                <td>{{ link_to('manage/student/'.$student->id.'/'.$team->course_id, $student->name) }}</td>
                                <td><a href="mailto:{!! $student->email !!}">{!! $student->email !!}</a></td>
                                <td class="grades">{!! $student->skills()->where('course_id', '=', $team->course_id)->sum('amount') !!}</td>
                                <td><a href="{!! URL::to('manage/student/'.$student->id.'/team/remove/'.$team->course_id) !!}" class='delete'></a></td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                @else
                    <p class="subtitle">There are currently no students on this team.</p>
                @endif
            </div>
        </div>
      </div>
      
</section>

@endsection

@section('after-scripts-end')
    <script>
    $("#add_to_team").selectize({});

    </script>
@stop