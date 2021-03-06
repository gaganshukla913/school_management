@extends('backend.backend',['title'=>'Student |  view all students'])

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-plain"> 
          <div class="card-header card-header-primary">
            <h4 class="card-title mt-0">Student Table
            <p class="card-category"> View All Student Details</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead class="">
                  <tr>
                    <th>ID</th>
                    <th>Student Name</th>
                    <th>Class</th>
                    <th>Created At</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($students as $student)
                    <tr>
                      <td> {{'#'.$student->id ?? '-'}}</td>
                      <td> 
                        <a href="{{'admin.student.show',$student->id}}">
                          <div class="row">
                            <div class="col-md-2">
                              <img class="rounded-circle" src="{{'/storage/images/'.$student->file->filepath ?? ''}}" height="100%" width="55px" alt="">
                            </div>
                            <div class="col-md-10">
                              <h6 class="mb-0 text-capitalize">{{$student->name ?? ''}}</h6>
                              <p class="text-lowercase">{{$student->email ?? ''}}</p>
                            </div>
                          </div>
                        </a>
                      </td>
                      <td> {{$student->studentclass->name ?? '-'}} </td>
                      <td> {{$student->created_at->format('d M Y, H:i A') ?? '-'}} </td>
                      <td>  
                        @can('student-edit')
                          <a href="{{route('admin.student.edit',$student->id)}}"><i class="material-icons">edit</i></a>  
                        @endcan  
                          <a href=""><i class="material-icons">delete</i></a>  
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td> 1</td>
                      <td>    Dakota Rice </td>
                      <td> Niger </td>
                      <td> Oud-Turnhout </td>
                      <td>  $36,738 </td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection