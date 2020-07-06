<!DOCTYPE html>
<html>
<head>
    <title>Game Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"
            type="text/javascript"></script>
    <style>
        p {
            font-size: 12pt;
        }

        .status1 {
            color: green;
        }

        .status0 {
            color: orange;
        }

        .status-1 {
            color: red;
        }

        a {
            color: black;
        }
        label.error{
            color: red;
        }
        input.error{
            border-color: red;
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
                    @if($type == 'add')
                        <h4>Add Game</h4>
                    @else
                        <h4>Edit Game</h4>
                    @endif
                </div>
            </div>
        </div>
        <div class="card-body">
            <form method="post" action="/save" id="form">
                @csrf
                @if($type == 'add')
                    <input type="hidden" name="edit" value="0">
                    <div class="form-group">
                        <label>Name<span style="color: red"> * </span>:</label>
                        <input id="name" type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" name="description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Price<span style="color: red"> * </span>:</label>
                        <input id="price" type="text" name="price" class="form-control">
                    </div>
                @else
                    <input type="hidden" name="edit" value="1">
                    <input type="hidden" name="id" value="{{$data->id}}">
                    <div class="form-group">
                        <label>Name<span style="color: red"> * </span>:</label>
                        <input id="name" type="text" name="name" class="form-control" value="{{$data->name}}">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <input type="text" name="description" class="form-control" value="{{$data->description}}">
                    </div>
                    <div class="form-group">
                        <label>Price<span style="color: red"> * </span>:</label>
                        <input id="price" type="text" name="price" class="form-control" value="{{$data->price}}">
                    </div>
                    <div class="form-group">
                        <label>Status:</label>
                        <input id="data-status" type="hidden" value="{{$data->status}}">
                        <select name="status" id="status">
                            <option value="-1">{{\App\Enums\GameStatus::getDescription(-1)}}</option>
                            <option value="0">{{\App\Enums\GameStatus::getDescription(0)}}</option>
                            <option value="1">{{\App\Enums\GameStatus::getDescription(1)}}</option>
                        </select>
                    </div>
                @endif
                <div class="form-group">
                    <button class="btn btn-primary text-uppercase" id="back" type="button">Back</button>
                    <button class="btn btn-success text-uppercase" id="save">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#back').click(function () {
            window.location.href = "/";
        });

        $("#form").validate({
            onfocusout: true,
            onkeyup: false,
            onclick: false,
            rules: {
                "name": {
                    required: true,
                },
                "price": {
                    required: true,
                    number: true
                },
            },
            messages: {
                "name": {
                    required: "Name is required!!",
                },
                "price": {
                    required: "Price is required",
                    number: "Enter number!!"
                },
            }
        });
    });
</script>
</body>
</html>
