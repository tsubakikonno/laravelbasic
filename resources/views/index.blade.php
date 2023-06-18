@extends('layouts.default')
<style>

body {
      background-color:#423880;

    }

    table {
    background-color: #ffffff;
    margin: 150px auto;
    width: 900px;
    height: auto;
 
  }

  tr{

  }


  th {
      color: Black;
      font-size: 20px;
      text-align: center;
      
    }

    td {
     
      color: Black;
      font-size: 20px;
      border-radius:20px;
      text-align: center;
    }
    button {
      border-radius:5px;
     
      height:33px;
      background: #ffffff;
      padding-left: 1em;
  padding-right: 1em;
  
    }
    


    .login_user {

      font-size: 15px;
    }
</style>

@section('content')
<table>
<tr>@section('title', 'Todo list')</tr>

@section('content')


@if (count($errors) > 0)
 
    @foreach ($errors->all() as $error)
     <tr><td>{{$error}}</td></tr>
    @endforeach
  
  @endif
  <form action="/search" method="get">
  <tr><td><button style="border-color:#7fff00; color:#7fff00;" onMouseOut="this.style.background='#ffffff';this.style.color='#7fff00';" onMouseOver="this.style.background='#7fff00';this.style.color='#ffffff';">タスク検索</button></td>
  </form>

  
<td class = "login_user">@if (Auth::check())
  <p> {{$user->name . ' でログイン中'}}</p>
@else
@endif
</td>
  <form action="/logout" method="post">
    @csrf
  <td><button style="border-color:#ea553a; color:#ea553a;" onMouseOut="this.style.background='#ffffff';this.style.color='#ea553a';" onMouseOver="this.style.background='#ea553a';this.style.color='#ffffff';">ログアウト</button></td></tr>
  </form>

 

  <form action="/create" method="post">
        @csrf
     <tr><td><input type="text" size="60px," name="content" value="{{ old('content') }}">
     <input type="text" name="user_id" value="{{'user_id' }}"></td>
     <input type="hidden" name="name" value="{{ old('name') }}"></td>

     <td><button style="border-color:#bf7fff; color:#bf7fff;" onMouseOut="this.style.background='#ffffff';this.style.color='#bf7fff';" onMouseOver="this.style.background='#bf7fff';this.style.color='#ffffff';">追加</button></td>
     
     <td><select class="create-form__item-select" name="tag_id">
          @foreach ($tags as $tag)
              <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
          @endforeach

  
    </select></td>
</form>
</tr>

      <tr>
      <th size= "20px">作成日</th>
      <th >タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>


    @foreach ($todos as $todo)
      
       
<form action="/update" method="post">
     <tr><td width="30px,">{{ $todo->created_at }}</td><td>
      <select name="tag_id" value="{{ $todo['tag_id'] }}">
    
<option>{{ $todo['tag']['name'] }}
  
</option>
@foreach ($tags as $tag)
              <option value="{{ $tag['id'] }}">{{ $tag['name'] }}

              </option> 

                @endforeach
                @csrf
                
            </select>

</td> 

      <td><input type="text" name="content" value="{{ $todo['content'] }}">
      <input type="hidden" name="id" value="{{ $todo['id'] }}">
      </td>

  <td><button style= "border-color:#ff7f7f; color:#ff7f7f;"onMouseOut="this.style.background='#ffffff';this.style.color='#ff7f7f';" onMouseOver="this.style.background='#ff7f7f';this.style.color='#ffffff';">更新</button></td>

      </form>
      
      
      <form action="/delete" method="post">
      @method('DELETE')
      @csrf
<input type="hidden" name="id" value="{{ $todo['id'] }}"></td>
<td><button style="border-color:#7fffbf; color:#7fffbf;"onMouseOut="this.style.background='#ffffff';this.style.color='#7fffbf';" onMouseOver="this.style.background='#7fffbf';this.style.color='#ffffff';">削除</button>
</td></form>
</tr>
@endforeach

</table>
@endsection