@extends('backend.layouts.master')
@section('content')
    <!-- Content Header (Page header) -->
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Mange Student </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">CLass</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title"> 
                     @if(isset($editData) )
                    Edit Student 
                    @else
                    Mange Student 
                    @endif
                  </h3>
                  <a href="{{ route('student.class.view') }}" class="btn btn-success float-right btn-sm"><i class="fa fa-list"></i> Student List</a> 
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="POST" action="{{ (@$editData) ? route('student.class.update',$editData->id):route('student.class.store') }}" role="form" id="MyForm" enctype="multipart/form-data">
                  @csrf
                  <div class="card-body">
                    <div class="form-group col-md-6">
                      <label>Student Name</label>
                      <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ @$editData->name }}" value="{{ old('name') }}" placeholder="Enter Student Name">
                      @error('name')<font style="color: red">{{ $message }}</font>@enderror
                    </div>
              
                    <div class="form-group col-md-6">
                      <label>Roll</label>
                      <input type="number" name="roll" class="form-control @error('roll') is-invalid @enderror" value="{{ @$editData->roll }}" value="{{ old('roll') }}" placeholder="Enter Student Roll">
                      @error('roll')<font style="color: red">{{ $message }}</font>@enderror
                    </div>
                  
                    <div class="form-group col-md-6">
                      <label>Student class</label>
                      <input type="text" name="class" class="form-control @error('class') is-invalid @enderror" value="{{ @$editData->class }}" value="{{ old('class') }}" placeholder="Enter Student Class">
                      @error('class')<font style="color: red">{{ $message }}</font>@enderror
                    </div>
                  
                    <div class="form-group col-md-6">
                      <label>Student Address</label>
                      <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ @$editData->address }}" value="{{ old('address') }}" placeholder="Enter Student address">
                      @error('address')<font style="color: red">{{ $message }}</font>@enderror
                    </div>
               

                    <div class="form-group col-md-3">
                      <label>Image</label> 
                      <input type="file" name="image"  id="imgInput" class="form-control form-control-sm" value="{{ @$editData->image }}">
                    </div>
                    <div class="form-group col-md-1">
                      <img id="imgpreview" class="imgpreview mt-2 p-1" style="height:79px; width: 96px" 
                      src="{{ (!empty(@$editData->image))?url('Backend/images/student/'.$editData->image):url('Backend/images/student/default_image.jpg') }}">
                    </div>

                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary ">{{ (@$editData)?'Update':'Submit' }}</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
              </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">
  
            </div>
            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
   
      <!-- /.content -->
@endsection

<!--javascript validator-->
@push('script')
<script type="text/javascript">
    $(document).ready(function () {
      $('#MyForm').validate({
        rules: {
          name: {
            required: true
          },
        },
        messages: {
          name: "The name field is required."
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
    </script> 
@endpush

