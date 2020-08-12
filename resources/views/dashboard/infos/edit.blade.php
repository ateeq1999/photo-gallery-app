@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.infos')</h1>

        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{route('dashboard.infos.index')}}"> @lang('site.infos')</a></li>
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
               <form action="{{route('dashboard.infos.update',$info->id)}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('put')}}

                    @foreach (config('translatable.locales') as $locale)
                
                        <div class="form-group">
                            <label>@lang('site.' .$locale. '.bio')</label>
                            <input type="text" name="{{$locale}}[bio]"  class="form-control" value="{{$info->bio}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.' .$locale.'.description')</label>
                            <textarea  name="{{$locale}}[description]"  class="form-control ckeditor" >{{$info->description}}</textarea>
                        </div>
                            
                    @endforeach

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>@lang('site.edit')</button>
                    </div>
              
                </form>





                </div> <!--end of body-->
           </div>
        </section>
    </div>


@endsection