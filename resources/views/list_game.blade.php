<!DOCTYPE html>
<html>
<head>
    <title>Game Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
        p {
            font-size: 12pt;
        }
        .status1{
            color: green;
        }
        .status0{
            color: orange;
        }
        .status-1{
            color: red;
        }
        .handling{
            display: flex;
        }
        .handling i{
            margin: 0 5px;
        }
        .handling .fa-edit:hover{
            color: dodgerblue;
            cursor: pointer;
        }
        .handling .fa-ban:hover{
            color: red;
            cursor: pointer;
        }
        a{
            color: black;
        }
    </style>
</head>
<body style="background-color: rgba(255,153,51,0.2)">
<div class="container mt-5">
    <h2 class="text-uppercase">Game Management</h2>
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h4>List Game</h4>
                </div>
                <div class="col-md-6 text-right">
                    <button class="btn btn-success text-uppercase" id="add">Add</button>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                <tr class="text-uppercase font-weight-bold">
                    <td>No.</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Status</td>
                    <td>Public at</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $item)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{number_format($item->price)}} VNĐ</td>
                        <td class="status{{$item->status}} text-uppercase">{{\App\Enums\GameStatus::getKey($item->status)}}</td>
                        <td>{{$item->created_at}}</td>
                        <td class="handling">
                           <a href="/edit?edit=1&id={{$item->id}}"><i class="fas fa-edit"></i></a>
                            <form action="delete/{{$item->id}}" method="post">
                                @method('DELETE')
                                @csrf
                                <button style="border: none;background-color: transparent;outline: none"><i class="fas fa-ban"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#add').click(function () {
            window.location.href = "/create"
        });
    });
</script>
</body>
</html>
