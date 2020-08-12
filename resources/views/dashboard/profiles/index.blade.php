@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1 >@lang('site.profiles')</h1>

            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active"> @lang('site.profiles')</li>

            </ol>
        </section>

        <section class="content">

                <div class="box box-primary">
                    <div class="box-header with border">
                        <h3 class="box-title" style="margin-bottom:15px">@lang('site.profiles')</h3>
                    <form action="{{route('dashboard.profiles.index')}}" method="get" >
                            <div class="row ">
                                <div class="col-md-4">
                                 <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                                </div>
                                <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                                    @if (auth()->user()->hasPermission('create_users'))
                                        <a href="{{route('dashboard.profiles.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>
    
                                     @else 
                                        <a href="#" class="btn btn-info btn-sm disabled">@lang('site.create')</a>
        
                                    @endif
                               
                               
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        @if($profiles->count()>0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.title')</th>
                                    <th>@lang('site.bio')</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.settiongs_count')</th>
                                    <th>@lang('site.related_settiongs')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($profiles as $index=>$profile )
                                    <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$profile->title}}</td>
                                    <td>{!!$profile->bio!!}</td>
                                    <td><img src="{{$profile->image_path}}" style="width: 100px;" class="img-thumbnail"></td>
                                    <td>{{$profile->settings->count()}}</td>
                                    <td><a href="{{route('dashboard.settings.index',['profile_id'=>$profile->id])}}" class="btn btn-info btn-sm">@lang('site.related_settiongs')</a></td>

                                   
                                    <td>
                                    @if (auth()->user()->hasPermission('update_profiles'))
                                    <a href="{{route('dashboard.profiles.edit',$profile->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>
                                    @else 
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>@lang('site.edit')</a>
    
                                         @endif
                                    
                                    @if (auth()->user()->hasPermission('delete_profiles'))
                                       <form action="{{route('dashboard.profiles.destroy',$profile->id)}}"  method="POST" style="display:inline">
                                            {{csrf_field()}}
                                            {{method_field('delete')}}
                                            <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>@lang('site.delete')</button>
    
                                        </form>
                                    @else 
                                        <button class="btn btn-danger disabled"><i class="fa fa-trash"></i>@lang('site.delete')</button>
                                        
                                    @endif
                                   
                                    </td>
                                    </tr>
                                    
                                @endforeach
                            </tbody>
                            
                        </table>
                        {{$profiles->links()}}
                        @else
                    <h2>@lang('site.data_not_profiles_found')</h2>
                    @endif
                     </div>
                </div>
        </section>
    </div>
    

@endsection