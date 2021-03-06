@extends('frontend.layouts.master')

@section('content')

@if($announcements->isEmpty())
    <section class="section dark-section">
    <div class="columns">
        <div class="column is-2">
        @include('frontend.includes.admin')
        </div>
        <div class="column">

        <div class="box">
          <div class="container">
            <h1 class="title headline is-uppercase">
              Announcements
            </h1>
              <h2 class="subtitle">Announcements show up on the dashboard for all students to see.</h2>

              <a href="{!! URL::to('manage/announcement/create/'.$course_id) !!}" class="button is-large is-primary">Make an Announcement</a>
          </div>
        </div>
      </div>
    </section>
@endif


@if(!$announcements->isEmpty())
<section class="section dark-section">
    <div class="columns">
        <div class="column is-2">
        @include('frontend.includes.admin')
        </div>
        <div class="column">
          <div class="box">
            <a href="{!! URL::to('manage/announcement/create/'.$course_id) !!}" class="button is-large is-pulled-right is-primary">New Announcement</a>
            <h1 class="title headline is-uppercase">Announcements</h1>
          <table class="table">
            <thead>
              <tr>
                <th>Headline</th>
                <th>Date</th>
                <th></th>
              </tr>
            </thead>

            <tbody>
          @foreach($announcements as $announcement)

              <tr>
                <td>{!! $announcement->title !!}</td>
                <td>{!! date('m/d/Y', strtotime($announcement->created_at)) !!}</td>
                <td>            
                  @if($announcement->sticky)
                      <a class="button is-small" href="{!! url('manage/announcement/hide/'.$announcement->id);!!}"> Hide</a>
                  @else
                      <a class="button is-small" href="{!! url('manage/announcement/show/'.$announcement->id);!!}"> Show</a>
                  @endif

                  <a class="button is-small" href="{!! URL::to('manage/announcement/edit/' . $announcement->id) !!}">Edit</a>
                  <a class="button is-small is-danger" href="{!! URL::to('manage/announcement/delete/' . $announcement->id) !!}">Delete</a>
                  </td>
              </tr>
           @endforeach

            </tbody>
          </table>
        </div>
    </div>
  </div>
</section>
@endif

@endsection

@section('after-scripts-end')
    <script>
  /*      var quest_list_options = {
        valueNames: [ 'submission', 'date', 'student' ]
    };
*/
//    var hackerList = new List('submission-list', submission_list_options);
    </script>
@stop