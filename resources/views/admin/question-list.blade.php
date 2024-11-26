@extends('admin.layout.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Question Management</h6>
                <div class="d-flex">
                    <div class="ml-auto p-2">
                        <a href="{{ route('question.create') }}" class="btn btn-success ml-auto p-2">Create Question</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Question</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionList as $question)
                                <tr>
                                    <td>{{ $question->id }}</td>
                                    <td>
                                        <span class="d-inline-block text-truncate"
                                            style="max-width: 250px;">{{ $question->question }}</span>
                                    </td>
                                    <td>{{ $question->created_at }}</td>
                                    <td>{{ $question->updated_at }}</td>
                                    <th>
                                        <a href="{{route('question.edit', $question->id)}}">
                                            <button class="btn btn-info">Edit</button>
                                        </a>
                                        <a href="{{route('question.delete', $question->id)}}">
                                            <button class="btn btn-danger">Delete</button>
                                        </a>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
