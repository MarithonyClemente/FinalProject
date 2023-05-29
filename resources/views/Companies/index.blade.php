<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel 9 CRUD Tutorial Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <style>
    
    body{
        color: black;
    }
    .search{
        float: right;
    }
    button {
    color: #fff;
    background-color: #28a745;
    border-color: #28a745;
    }
    button [type=delete]{
        float: left;

    }
    .row {
        background: yellow;
    }
    th{
            background:black;
            color: white;
            text-align: center;
    }
    </style>
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Laravel 9 CRUD Example Tutorial</h2>
                </div>
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('companies.create') }}"> Create Company</a>
                
                    <form action="{{ route('companies.search') }}" method="GET" class="float-right">    
                        <div class="search">
                            <input type="search" id="query" name="q" placeholder="Search...">
                            <button>Search</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Company Name</th>
                    <th>Company Email</th>
                    <th>Company Address</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($companies as $company)
                    <tr>
                        <td>{{ $company->id }}</td>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->address }}</td>
                        <td>
                            <form action="{{ route('companies.destroy',$company->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('companies.edit',$company->id) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    
                    @endforeach
            </tbody>
        </table>
        {!! $companies->links() !!}
    
    </div>
</body>
</html>