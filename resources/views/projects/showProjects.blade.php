@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Projects Table</h1>

    <div class="col-sm-12">

        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}  
          </div>
        @endif
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Project Name </th>
                <th scope="col">Project ID </th>
                <th scope="col">Start Date  </th>
                <th scope="col">End  Date  </th>
                <th scope="col">Department</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td><a href="{{route('viewProjectItem',$project->id)}}">{{ $project->project_name }}</a></td>
                    <td>{{ $project->id}}</td>
                    <td>{{ $project->start_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>{{ $project->end_date }}</td>
                    <td>
                        <a href="{{route('deleteProject',$project->id)}}"><i class="fas fa-trash"></i></a>
                        <i class="fas fa-pen fa-sm"></i>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
@endsection
