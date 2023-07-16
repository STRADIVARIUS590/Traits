<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{route('post.add')}}" method="POST">
        @csrf
        <input type="text" name="title">
        @error('title')
            <p>{{$message}}</p>   
        @enderror
        <input type="text" name="body">
        @error('body')
        <p>{{$message}}</p>    
        @enderror
        <input type="text" name="user_id" value="1">
        @error('user_id')
        <p>{{$message}}</p>    
        @enderror
        <input type="submit" name="asd">
    </form>
</body>
</html>