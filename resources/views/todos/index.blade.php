<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../todos/../../css/reset.css">
  <title>Document</title>
  <style>
    body {
      background-color: #000080;
    }

    .container {
      width: 50%;
      margin: 300px auto;
      background-color: white;
      padding: 20px;
      border-radius: 10px;
    }

    .content {
      width: 75%;
      height: 30px;
    }


    .container-list {
      width: 100%;
    }

    /* ボタンカラー */
    .addbtn {
      margin-left: 50px;
      border-radius: 5px;
      background-color: white;
      color: #FF99FF;
      padding: 8px;
      font-size: 16px;
      border-color: #FF99FF;
      transition: all 0.3s ease;
    }

    .addbtn:hover {
      background-color: #FF99FF;
      color: white;
      cursor: pointer;
    }

    .updatebtn {
      border-radius: 5px;
      background-color: white;
      color: #FF9933;
      padding: 8px;
      border: solid 1px;
      border-color: #FF9933;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .updatebtn:hover {
      background-color: #FF9933;
      color: white;
      cursor: pointer;
    }

    .deletebtn {
      border-radius: 5px;
      background-color: white;
      color: #33CC33;
      padding: 8px;
      border: solid 1px;
      border-color: #33CC33;
      transition: all 0.3s ease;
      text-decoration: none;
    }

    .deletebtn:hover {
      background-color: #33CC33;
      color: white;
      cursor: pointer;
    }

    .content-mini {
      width: 100%;
      height: 20px;
    }

    .table {
      border-spacing: 0px 30px;
      width: 100%;
    }

    input {
      border-radius: 5px;
      border: solid 1px #C0C0C0;

    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Todo List</h1>
    <div class="container-edit">
      <form action="/todo/create" method="POST">
        @csrf
        <!-- エラー表示 -->
        @if($errors->has("content"))
        <p>{{$errors->first("content")}}</p>
        @endif
        <input type="text" name="content" value="{{old('content')}}" class="content">
        <input type="submit" name="newAdd" value="追加" class="addbtn">
      </form>
    </div>
    <div class="container-list">
      <table class="table" cellpadding="10">
        <thead>
          <tr>
            <th>作成日</th>
            <th>タスク名</th>
            <th>更新</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          @foreach($todos as $todo)
          <tr>
            <td>{{$todo->created_at}}</td>
            <td><input type=" text" name="content" value="{{$todo->content}}" class="content-mini">
            </td>
            <td><a href="{{ route('todos.update', $todo->id) }}" class="updatebtn">更新</a></td>
            <td><a href="{{ route('todos.delete', $todo->id) }}" class="deletebtn">削除</a></td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>