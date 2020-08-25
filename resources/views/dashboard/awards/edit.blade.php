@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.awards')</h1>

        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{route('dashboard.awards.index')}}"> @lang('site.awards')</a></li>
            <li class="active"> @lang('site.edit')</li>
            
        </ol>
        </section>

        <section class="content">

           <div class="box box-primary">
               <div class="box-header">
                   <h3 class="box-title">@lang('site.edit')</h3>
               </div>
               <div class="box-body">
                @include('partials._errors')
               <form action="{{route('dashboard.awards.update',$award->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}

                    {{--image and image preview--}}
                    <div class="form-group">
                    <label>@lang('site.image')</label>
                    <input type="file" name="image" placeholder="@lang('site.image')" class="form-control image">
                    </div>
                    <div class="form-group">
                    <img src="{{$award->image_path}}" style="width: 100px;" class="img-thumbnail image-preview" alt=""> 

                    </div>
                 
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.edit')</button>
                    </div>
              
                </form>





                </div> <!--end of body-->
           </div>
        </section>
    </div>


@endsection