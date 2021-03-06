@extends('frontend.layouts.master')

@section('content')
<section class="section dark-section">
    <div class="box">
        <div class="field is-pulled-right">
          <div class="control">
            <div class="select is-medium">
              <select id="resource-category" placeholder="Filter by Category">
                <option value=0>All</option>
                @foreach($resources as $tag => $resource)
                    @if($tag != "")
                        <option value="{!! $tag!!}">
                            {!! $tag !!}
                        </option>
                    @endif
                @endforeach
              </select>
            </div>
          </div>
        </div>
        <h1 class="title is-headline is-uppercase">{!! $course->name !!}</h1>
    </div>
    <div class="masonary">
        @foreach($resources as $tag => $resource)
            <div class="masonary-item" resource-category="{!! $tag !!}">
                @if($tag)
                    <p class="title headline is-uppercase">{!! $tag !!}</p>
                @else
                    <p class="title headline is-uppercase">Resources</p>

                @endif
                @foreach($resource as $r)
                    @if($r->link)
                        <a href="{{ $r->link }}" data-iframely-url>{{ $r->link }}</a>
                        <br/>
                    @else

                        <article class="media">
                          <div class="media-content">
                            <div class="content">
                              <p>
                                <strong>{!! $r->title !!}</strong>
                                <br>
                                {!! $r->description !!}
                              </p>
                                @if(!$r->files->isEmpty())
                                    @foreach($r->files as $file)
                                    <p>
                                        <a href="{!! URL::to('uploads/' . $file->name) !!}" alt="{!! substr($file->name,5) !!}" download>
                                        <span class=""><i class="fa fa-paperclip"></i> {!! substr($file->name,5) !!}</span> 
                                        </a>
                                    </p>
                                    @endforeach
                                @endif
                            </div>
                          </div>

                        </article>
                    @endif
                @endforeach
                </div>
        @endforeach
    </div>
</section>
@endsection

@section('after-scripts-end')
    <script>
            $(function() {
                $("#resource-category").change(function() {
                    if($(this).val() == 0) {
                        $(".masonary-item").show();
                    }
                    else {
                        $(".masonary-item").hide();            
                        $(".masonary-item[resource-category='"+$(this).val()+"']").show();
                    }
                });
            });
    </script>
@stop