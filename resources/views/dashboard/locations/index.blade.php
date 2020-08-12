@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1 >@lang('site.locations')</h1>

            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active"> @lang('site.locations')</li>

            </ol>
        </section>

        <section class="content">

                <div class="box box-primary">
                    <div class="box-header with border">
                        <h3 class="box-title" style="margin-bottom:15px">@lang('site.locations')</h3>
                    <form action="{{route('dashboard.locations.index')}}" method="get" >
                            <div class="row ">
                                <div class="col-md-4">
                                 <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                                </div>

                                <div class="col-md-4">
                            <select name="category_id" class="form-control">
                            <option value="">@lang('site.all.infos')</option>
                                    @foreach ($infos as $info )
                           <option value="{{$info->id}}">{{$info->bio}}</option>
                                      
                                    @endforeach
                            </select>
                                 </div>

                                <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                                    @if (auth()->user()->hasPermission('create_users'))
                                        <a href="{{route('dashboard.locations.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>
    
                                     @else 
                                        <a href="#" class="btn btn-info btn-sm disabled">@lang('site.create')</a>
        
                                    @endif
                               
                               
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        @if($locations->count()>0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.fax')</th>
                                    <th>@lang('site.name')</th>
                                    <th>@lang('site.address')</th>
                                    <th>@lang('site.info')</th>
                                    <th>@lang('site.email')</th>
                                    <th>@lang('site.phone')</th>
                                    <th>@lang('site.map')</th>
                                
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locations as $index=>$location )
                                    <tr>
                                    <td>{{$index + 1}}</td>
                                    <td>{{$location->fax}}</td>
                                    <td>{{$location->name}}</td>
                                    <td>{!!$location->address!!}</td>
                                    <td>{{$location->info->name}}</td>
                                    <td>{{$location->email}}</td>
                                    <td>{{$location->phone}}</td>
                                    <td>{{$location->map}}</td>

                                    <td>
                                    @if (auth()->user()->hasPermission('update_locations'))
                                    <a href="{{route('dashboard.locations.edit',$location->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>

                                    @else 
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>@lang('site.edit')</a>
    
                                         @endif
                                    
                                    @if (auth()->user()->hasPermission('delete_locations'))
                                       <form action="{{route('dashboard.locations.destroy',$location->id)}}"  method="POST" style="display:inline">
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
                        {{$locations->links()}}
                        @else
                    <h2>@lang('site.data_not_location_found')</h2>
                    @endif
                     </div>
                </div>
        </section>
    </div>
    

@endsection