@extends('frontend.layouts.master')

@section('content')

    <div class="col-lg-12">
        <h2>Course Settings</h2>
    </div>


    <div class="col-lg-12">
        <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
            <li role="presentation"><a href="#skills" aria-controls="skills" role="tab" data-toggle="tab">Skills</a></li>
            <li role="presentation"><a href="#levels" aria-controls="levels" role="tab" data-toggle="tab">Levels</a></li>
            <li role="presentation"><a href="#teams" aria-controls="teams" role="tab" data-toggle="tab">Teams</a></li>
            <li role="presentation"><a href="#feedback" aria-controls="feedback" role="tab" data-toggle="tab">Peer Feedback</a></li>

            <li role="presentation"><a href="#share" aria-controls="share" role="tab" data-toggle="tab">Share</a></li>

          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="general">
                {!! Form::open(['url' => 'manage/course/update', 'class' => '', 'id' => 'update-course']) !!}
                <div class="col-lg-6">
                    <div class="form-group">
                    <label for="name">Course Name</label>

                        {{ Form::input('text', 'name', $course->name, ['class' => 'form-control', 'placeholder' => 'Course Name', 'id' => 'course_name']) }}
                    </div>
    
                    <div class="form-group">
                        <label for="meeting_location">Meeting Location</label>

                        {{ Form::input('text', 'meeting_location', $course->meeting_location, ['class' => 'form-control', 'placeholder' =>  'Classroom', 'id' => 'classroom']) }}
                    </div>

                    <div class="form-group">
                        <label for="meeting_time">Meeting Time</label>

                    {{ Form::input('text', 'meeting_time', $course->meeting, ['class' => 'form-control', 'placeholder' => 'Wednesdays @ 3pm', 'id' => 'meeting_time']) }}
                    </div>

                    <div class="form-group">
                        <label for="reg_code">Registration Code</label>

                        {{ Form::input('text', 'reg_code', $course->code, ['class' => 'form-control', 'placeholder' => 'Registration Code', 'id' => 'reg_code']) }}
                    </div>
        
                </div>

                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="instructor_display_name">Instructor Display Name</label>

                        {{ Form::input('text', 'instructor_display_name', $course->instructor_display_name, ['class' => 'form-control', 'placeholder' =>  'Mr. Fantastic', 'id' => 'course_name']) }}
                    </div>

                    <div class="form-group">
                        <label for="instructor_contact">Contact Email Address</label>

                        {{ Form::input('text', 'instructor_contact', $course->instructor_contact, ['class' => 'form-control', 'placeholder' =>  'Contact Email Address', 'id' => 'instructor_contact']) }}
                    </div>

                    <div class="form-group">
                        <label for="instructor_office_location">Office Location</label>

                        {{ Form::input('text', 'instructor_office_location', $course->instructor_office_location, ['class' => 'form-control', 'placeholder' =>  'Office Location', 'id' => 'office_location']) }}
                    </div>

                    <div class="form-group">
                        <label for="office_hours">Office Hours</label>

                        {{ Form::input('text', 'office_hours', $course->office_hours, ['class' => 'form-control', 'placeholder' =>  'Office Hours', 'id' => 'office_hours']) }}
                    </div>

                    </div>
                <hr/>
                <div class="col-lg-12">
                {!! Form::submit('Update Course', ['class' => 'btn btn-primary btn-lg pull-right']) !!}
                {!! Form::close() !!}
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="skills">
                <h4>Current Skills</h4>
                <ul class="list-unstyled list">
                    @foreach($skills as $skill)
                        <li>
                                <div class="col-lg-9">
                                    <div class="name">{!! $skill->name !!}
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="pull-right">
                                        {!! Form::open(['url' => 'manage/course/remove/skill', 'class' => 'remove-skill']) !!}
                                        {!! Form::hidden('skill', $skill->id) !!}
                                        {!! Form::submit('Remove', ['class' => 'btn btn-danger btn-xs pull-right']) !!}                  
                                        {!! Form::close() !!}
                                    </div>
                                </div>
                        </li>
                    @endforeach
                        <li>
                            <div class="col-lg-9">
                                {!! Form::open(['url' => 'manage/course/add/skill', 'class' => '', 'id' => 'add-skill']) !!}
                                {{ Form::input('text', 'skill', null, ['class' => 'form-control', 'placeholder' => 'Skill Name', 'id' => 'skill_name']) }}

                            </div>
                            <div class="col-lg-3">
                                {!! Form::submit('Add Skill', ['class' => 'btn btn-primary btn-block']) !!}
                                {!! Form::close() !!}
                            </div>
                        </li>
                </ul>

            </div>
            <div role="tabpanel" class="tab-pane" id="levels">

                <h4>Current Levels</h4>
                <ul class="list-unstyled list">
                    @foreach($levels as $level)
                        <li>
                            <div class="col-lg-4">
                                {!! $level->name !!}
                            </div>
                            <div class="col-lg-4">
                                {!! $level->amount !!}
                            </div>
                            <div class="col-lg-4">
                                <div class="pull-right">
                                {!! Form::open(['url' => 'manage/course/remove/level', 'class' => 'remove-level']) !!}
                                {!! Form::hidden('level', $level->id) !!}
                                {!! Form::submit('Remove', ['class' => 'btn btn-danger btn-xs pull-right']) !!}                           
                                {!! Form::close() !!}

                                </div>
                            </div>
                        </li>
                    @endforeach

                    <li>
                        <div class="col-lg-4">
                        {!! Form::open(['url' => 'manage/course/add/level', 'class' => 'form-inline', 'id' => 'add-level']) !!}

                        {{ Form::input('text', 'level', null, ['class' => 'form-control', 'placeholder' => 'Level Name', 'id' => 'level_name']) }}

                        </div>
                        <div class="col-lg-4">
                        {{ Form::input('number', 'amount', null, ['class' => 'form-control', 'placeholder' => 'Amount', 'id' => 'level_amount']) }}

                        </div>
                        <div class="col-lg-4">
                            {!! Form::submit('Add Level', ['class' => 'btn btn-primary btn-block']) !!}
                            {!! Form::close() !!}

                        </div>
                    </li>
                </ul>


            </div>
            <div role="tabpanel" class="tab-pane" id="teams">
                <h4>Current Teams</h4>
                    <div class="col-lg-9">
                    {!! Form::open(['url' => 'manage/course/add/team', 'class' => '', 'id' => 'add-team']) !!}
                    {!! Form::input('text', 'team', null, ['class' => 'form-control', 'placeholder' => 'Team Name', 'id' => 'team_title']) !!}


                    </div>
                    <div class="col-lg-3">
                        {!! Form::submit('Add This Team', ['class' => 'btn btn-primary btn-lg']) !!}
                        {!! Form::close() !!}

                    </div>

                <ul class="list-unstyled list">
                    @foreach($teams as $team)
                    <li>
                        <div class="col-lg-9">
                            <div class="name">{!! $team->name !!}
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="pull-right">
                                {!! Form::open(['url' => 'manage/course/remove/team', 'class' => 'remove-team']) !!}
                                {!! Form::hidden('team_id', $team->id) !!}
                                {!! Form::submit('Remove', ['class' => 'btn btn-danger btn-xs pull-right']) !!}                           
                                {!! Form::close() !!}


                            </div>
                        </div>
                    @endforeach
                </ul>

            </div>
            <div role="tabpanel" class="tab-pane" id="share">
                <p>Students can sign up for this course by using this link:[URL]</p>
                <p>If you prefer, you can enter their email addresses and send the link directly to their inbox.</p>
                 {!! Form::textarea('email_list', null, ['class' => 'field']) !!}

                {!! Form::submit('Share Course', ['class' => 'btn btn-primary btn-lg']) !!}

                {!! Form::close() !!}
            </div>

            <div role="tabpanel" class="tab-pane" id="feedback">
                {!! Form::open(['url' => 'manage/peers', 'class' => '', 'id' => 'peer-form']) !!}
                
                {{ Form::input('number', 'peer_group_size', null, ['class' => 'form-control', 'placeholder' => 'Peer Group Size', 'id' => 'peer_group_size']) }}

                {!! Form::submit('Assign Peer Groups', ['class' => 'btn btn-primary btn-lg']) !!}

                {!! Form::close() !!}

            </div>

          </div>

        </div>




    </div>
@endsection

@section('after-scripts-end')
    <script>
 
    </script>
@stop