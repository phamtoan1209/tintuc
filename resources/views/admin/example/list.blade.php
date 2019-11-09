@extends('admin._partials.master')
@section('title','Admin - Example List')
@section('content')
    <section class="content">
        <div class="row">
            <div class="col-lg-12 ">
                <div class="box box-success">
                    <div class="box-header">
                        <h3 class="box-title">
                            List Data
                        </h3>
                        <div class="pull-right">
                            <button class="btn btn-xs btn-primary btn-flat">
                                <i class="fa fa-plus fa-xs"></i>
                                Plus Item
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-lg-12">
                                Search Form
                            </div>
                        </div>
                        <div class="row">
                            <form action="">
                                <div class="col-sm-3 col-xs-12 form-group">
                                    <input type="text" class="form-control" placeholder="Enter name">
                                </div>
                                <div class="col-sm-4 col-xs-12  form-group">
                                    <select class="form-control">
                                        <option value="0">-- Choose option --</option>
                                        <option value="1">Option 1</option>
                                        <option value="1">Option 2</option>
                                        <option value="1">Option 3</option>
                                        <option value="1">Option 4</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-xs-12 form-group">
                                    <select class="form-control">
                                        <option value="0">-- Choose option --</option>
                                        <option value="1">Yes</option>
                                        <option value="1">No</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 col-xs-4">
                                    <button type="button" class="btn btn-sm btn-success form-control btn-flat">
                                        <i class="fa fa-search fa-xs"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Rendering engine</th>
                                <th>Browser</th>
                                <th>Platform(s)</th>
                                <th>Engine version</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Misc</td>
                                <td>Links</td>
                                <td>Text only</td>
                                <td>-</td>
                                <td>
                                    <div class="rơw">
                                        <div class="form-group">
                                            <label for="">
                                                <a href="#" class="btn btn-xs btn-warning btn-flat">
                                                    <i class="fa fa-cogs"></i> Edit
                                                </a>
                                            </label>
                                            <label for="">
                                                <form action="">
                                                    <a href="#" class="btn btn-xs btn-danger btn-flat">
                                                        <i class="fa fa-times"></i> Delete
                                                    </a>
                                                </form>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Misc</td>
                                <td>Lynx</td>
                                <td>Text only</td>
                                <td>-</td>
                                <td>
                                    <div class="rơw">
                                        <div class="form-group">
                                            <label for="">
                                                <a href="#" class="btn btn-xs btn-warning btn-flat">
                                                    <i class="fa fa-cogs"></i> Edit
                                                </a>
                                            </label>
                                            <label for="">
                                                <form action="">
                                                    <a href="#" class="btn btn-xs btn-danger btn-flat">
                                                        <i class="fa fa-times"></i> Delete
                                                    </a>
                                                </form>
                                            </label>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <div class="box-tools">
                                        <ul class="pagination pagination-sm inline">
                                            <li><a href="#">&laquo;</a></li>
                                            <li><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li><a href="#">&raquo;</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@stop
