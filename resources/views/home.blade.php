@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card border-secondary mb-3">
                <div class="card-header text-white bg-primary">Todo List Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
										<div id="user-data" data-user-id="{{ Auth::user()->id }}"></div>
										<div id="todo">
											
										</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
