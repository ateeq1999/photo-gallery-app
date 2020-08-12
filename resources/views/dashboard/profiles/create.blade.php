@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.profiles')</h1>

        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{route('dashboard.profiles.index')}}"> @lang('site.profiles')</a></li>
            <li class="active"> @lang('site.add')</li>
            
        </ol>
        </section>

        <section class="content">

           <div class="box box-primary">
               <div class="box-header">
                   <h3 class="box-title">@lang('site.add')</h3>
               </div>
               <div class="box-body">
                @include('partials._errors')
                
               <form action="{{route('dashboard.profiles.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('post')}}

                    @foreach (config('translatable.locales') as $locale)
                
                        <div class="form-group">
                            <label>@lang('site.' .$locale. '.title')</label>
                            <input type="text" name="{{$locale}}[title]"  class="form-control" value="{{old($locale.'.title')}}">
                        </div>
                
                        <div class="form-group">
                            <label>@lang('site.' .$locale.'.bio')</label>
                            <textarea  name="{{$locale}}[bio]"  class="form-control ckeditor" >{{old($locale.'.bio')}}</textarea>
                        </div>
                        
                    @endforeach

                    <div class="form-group">
                        <label>@lang('site.image')</label>
                        <input type="file" name="image" placeholder="@lang('site.image')" class="form-control image">
                    </div>

                    <div class="form-group">
                        <img src="{{asset('uploads/profiles_images/default.jpg')}}" style="width: 100px;" class="img-thumbnail image-preview" alt=""> 
                    </div>
                
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</button>
                    </div>
              
                </form>


                </div> <!--end of body-->
           </div>
        </section>
    </div>


@endsection