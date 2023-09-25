@extends('backend.layouts.master')
@section('content')
        <!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Student List</h3>
            <a href="{{ route('student.class.add') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-plus-circle"></i>Add Student</a> 
          </div>

          @if(session()->has('message'))
    <div class="alert alert-success">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
      {{session()->get('message')}}
    </div>
    @endif
    @if(session()->has('error'))
    <div class="alert alert-danger">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-hidden="true" aria-label="Close"></button>
      {{session()->get('error')}}
    </div>
    @endif
          <!-- /.card-header -->
          <div class="card-body">
            <table id="datatable" class="table table-bordered table-striped">
              <thead>        
              <tr>
                <th>SL.</th>
                <th>Student Name</th>
                <th>Roll</th>
                <th>Class</th>
                <th>Address</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($alldata as $key=>$value)   
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $value->name }}</td>
                <td>{{ $value->roll }}</td>
                <td>{{ $value->class }}</td>
                <td>{{ $value->address }}</td>
                <td>
                  <img src="{{ (!empty($value->image))?url('Backend/images/student/'.$value->image):url('Backend/images/default_image/default_image.jpg') }}" 
                  alt="" style="width:60px;height:65px;border:1px solid #000">
              </td>
                <td>
                  <a href="{{ route('student.class.edit',$value->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fa fa-edit"></i></a>
                  <a href="{{ route('student.class.delete',$value->id) }}" id="delete" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card --> 
@endsection
