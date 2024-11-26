@extends('admin.layout.app')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <form action="{{ route('question.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="content">Question</label>
                            <textarea name="question" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="content">Option A</label>
                                <textarea name="option_a" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group col-6">
                                <label for="content">Option B</label>
                                <textarea name="option_b" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group  col-6">
                                <label for="content">Option C</label>
                                <textarea name="option_c" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="form-group  col-6">
                                <label for="content">Option D</label>
                                <textarea name="option_d" class="form-control" rows="3"></textarea>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="content">Correct choice</label>
                            <select class="form-select ml-2" aria-label="Default select example" name="correct_option">
                                <option>Open this select menu</option>
                                <option value="1">Option A</option>
                                <option value="2">Option B</option>
                                <option value="3">Option C</option>
                                <option value="4">Option D</option>
                              </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 my-3">Create</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
