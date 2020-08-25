@extends('layouts.dashboard.app')

@section('content')

    <div class="content-wrapper">

        <section class="content-header">

            <h1 >@lang('site.awards')</h1>

            <ol class="breadcrumb">
            <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
                <li class="active"> @lang('site.awards')</li>

            </ol>
        </section>

        <section class="content">

                <div class="box box-primary">
                    <div class="box-header with border">
                        <h3 class="box-title" style="margin-bottom:15px">@lang('site.awards')</h3>
                    <form action="{{route('dashboard.awards.index')}}" method="get" >
                            <div class="row ">
                                <div class="col-md-4">
                                 <input type="text" name="search" class="form-control" placeholder="@lang('site.search')">

                                </div>
                                <div class="col-md-4">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>@lang('site.search')</button>
                                    @if (auth()->user()->hasPermission('create_users'))
                                        <a href="{{route('dashboard.awards.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i>@lang('site.add')</a>
    
                                     @else 
                                        <a href="#" class="btn btn-info btn-sm disabled">@lang('site.create')</a>
        
                                    @endif
                               
                               
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="box-body">
                        @if($awards->count()>0)
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>@lang('site.image')</th>
                                    <th>@lang('site.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($awards as $index=>$award )
                                    <tr>
                                    <td>{{$index + 1}}</td>
                                    <td><img src="{{$award->image_path}}" style="width: 100px;" class="img-thumbnail"></td>
                                    <td>
                                        @if (auth()->user()->hasPermission('update_awards'))
                                        <a href="{{route('dashboard.awards.edit',$award->id)}}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i>@lang('site.edit')</a>

                                        @else 
                                        <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i>@lang('site.edit')</a>
        
                                            @endif
                                        
                                        @if (auth()->user()->hasPermission('delete_awards'))
                                        <form action="{{route('dashboard.awards.destroy',$award->id)}}"  method="POST" style="display:inline">
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
                        {{$awards->links()}}
                        @else
                    <h2>@lang('site.data_not_awards_found')</h2>
                    @endif
                     </div>
                </div>
        </section>
    </div>
    

@endsection