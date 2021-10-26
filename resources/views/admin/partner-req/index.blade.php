@extends('layouts.master-admin')
@section('title')
Admin Dashboard
@endsection
@section('main-content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                    <strong>{{session('success')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mt-2" role="alert">
                    <strong>{{session('error')}}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <div class="card">
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-sm-flex align-items-baseline report-summary-header">
                                    <h3>Partner Requirements For Registration</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row card-header p-0 bg-white" style="border-top: 1px solid">
            <div class="col-md-12 pt-4 grid-margin stretch-card">
                <div class="card" id="bookings-list-table">
                    <div class="container">
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <form method="post" action="{{url('partner-reg-req-save')}}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">City:</label>
                                        <select class="form-control" name="city_id" required>
                                            <option value="">Select City</option>
                                            @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->location_city}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Requirement Heading:</label>
                                        <input type="text" name="main_heading" class="form-control" id="req-heading" placeholder="Enter Requirement Heading" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Requirements:(Please Enter requirements comma seprated)</label>
                                        <textarea class="form-control" name="requirements" rows="5" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-responsive table-hover">
                                    <thead>
                                        <tr>
                                            <th>#No</th>
                                            <th>City Name</th>
                                            <th>Main Heading</th>
                                            <th>Requirements</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($city_req)
                                        @foreach($city_req as $req)
                                        <tr>
                                            <td>{{$loop->index+1}}</td>
                                            <td>{{$req->location_city}}</td>
                                            <td>{{$req->main_heading}}</td>
                                            <td>
                                                {{$req->requirements}}
                                            </td>
                                            <td>
                                                <span class="fa fa-trash"></span>
                                                <span class="fa fa-pencil"></span>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2020 </span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Moray-Limousines <i class="fa fa-car text-danger"></i></span>
        </div>
    </footer>
    <!-- partial -->
</div>

@endsection