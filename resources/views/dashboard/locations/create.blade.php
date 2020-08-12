@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1>@lang('site.locations')</h1>

        <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
            <li><a href="{{route('dashboard.locations.index')}}"> @lang('site.locations')</a></li>
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
                
               <form action="{{route('dashboard.locations.store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    {{method_field('post')}}

                    <div class="form-group">
                        <label>@lang('site.infos')</label>
                        <select name="info_id" class="form-control">
                            <option value="">@lang('site.all.infos')</option>
                        
                            @foreach ($infos as $info )
                                <option value="{{$info->id}}" {{old('info_id')==$info->id ? 'selected' : ''}}>{{$info->bio}}</option>
                            @endforeach
                        </select>
                    </div>

                    @foreach (config('translatable.locales') as $locale)

                        <div class="form-group">
                            <label>@lang('site.' .$locale. '.name')</label>
                            <input type="text" name="{{$locale}}[name]"  class="form-control" value="{{old($locale.'.name')}}">
                        </div>

                        <div class="form-group">
                            <label>@lang('site.' .$locale.'.address')</label>
                            <textarea  name="{{$locale}}[address]"  class="form-control ckeditor" >{{old($locale.'.address')}}</textarea>
                        </div>
                        
                    @endforeach
                    </div>
                    <div class="form-group">
                        <label>@lang('site.email')</label>
                        <input type="email" name="email" step="0.01"  class="form-control" value="{{old('email')}}">
                    </div>
                    <div class="form-group">
                        <label>@lang('site.phone')</label>
                        <input type="text" name="phone" step="0.01" value="{{old('phone')}}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>@lang('site.fax')</label>
                        <input type="text" name="fax"  class="form-control" value="{{old('fax')}}">
                    </div>

                    <div class="form-group">
                        <label>@lang('site.map')</label>
                        <input type="text" name="map"  class="form-control" value="{{old('map')}}">
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