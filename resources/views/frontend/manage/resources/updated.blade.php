@extends('frontend.layouts.master')

@section('content')
<div class="col-lg-12">
    <h2>{{ $request->title }}</h2>
</div>

<p>Resource has been updated!</p>
@endsection

@section('after-scripts-end')
    <script>
    </script>
@stop