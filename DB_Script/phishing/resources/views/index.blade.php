@extends('layouts.master')

@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i>&nbsp;Database Management</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="#">Database Management</a></li>
        </ul>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                {{-- @include('admin.user.filter') --}}
            </div>
            <div class="col-md-12">                
                <div class="tile">
                    <div class="btn-group float-right mb-2">
                        <a class="btn btn-primary" href="#" id="btn_add" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Import"><i class="fa fa-lg fa-file-excel-o"></i>Import</a>
                    </div>
                    <div class="tile-body">
                        <table class="table table-hover table-bordered" id="customerTable">
                            <thead>
                                <tr>
                                    <th class="no-sort" style="width:50px;">No</th>
                                    <th style="width:400px;">Email</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($data as $item)
                                    <tr>
                                        <td>{{ (($data->currentPage() - 1 ) * $data->perPage() ) + $loop->iteration }}</td>
                                        <td class="email">{{$item->email}}</td>
                                        <td class="url">{{$item->url}}</td>
                                        <td class="py-2">
                                            <a href="{{route('url.delete', $item->id)}}" onclick="return window.confirm('Are you sure?')" class="btn btn-primary btn-sm btn-delete" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"><i class="fa fa-trash"></i>Delete</a>
                                            {{-- <a href="#" class="btn btn-success btn-sm btn-edit" data-id="{{$item->id}}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Edit"><i class="fa fa-edit"></i>{{__('page.edit')}}</a>                                            --}}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" align="center">No Data</td>
                                    </tr>
                                @endforelse                 
                            </tbody>
                        </table>
                        <div class="clearfix">
                            <div class="float-left" style="margin: 0;">
                                <p>Total <strong style="color: red">{{ $data->total() }}</strong> Items</p>
                            </div>
                            <div class="float-right" style="margin: 0;">
                                {!! $data->appends([])->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

    <div class="modal fade" id="importModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('excel.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h4 class="modal-title">Import From XLS</h4>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Please select your excel file.</label>
                            <input class="form-control" type="file" name="url" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel" required />
                        </div>
                    </div>
                    
                    <div class="modal-footer">    
                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>&nbsp;Import</button>                       
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>&nbsp;Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $("#btn_add").click(function(){
                $("#importModal").modal();
            });
        });
    </script>
@endsection