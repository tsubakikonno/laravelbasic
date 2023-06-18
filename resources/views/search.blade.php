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



</style>
<table>
  

<tr>@section('title', '検索リスト')</tr>
 
@section('content')
@if (count($errors) > 0)
 
    @foreach ($errors->all() as $error)
     <tr><td>{{$error}}</td></tr>
    @endforeach
  
  @endif

  <td><button style="border-color:#ea553a; color:#ea553a;" onMouseOut="this.style.background='#ffffff';this.style.color='#ea553a';" onMouseOver="this.style.background='#ea553a';this.style.color='#ffffff';">ログアウト</button></td></tr>
   <form action="/search" method="post">
        @csrf
      <td><select class="search-form__item-select" name="tag_id">
          
          
          <option></option>
          @foreach ($tags as $tag)
          <option value="{{ $tag['id'] }}">{{ $tag['name'] }}</option>
          
          @endforeach
        </select></td>
     <tr><td><input type="text" size="60px," name="keyword" value="{{ old('keyword') }}"></td>
     
     <td><button style="border-color:#ee82ee; color:#ee82ee;" onMouseOut="this.style.background='#ffffff';this.style.color='#ee82ee';" onMouseOver="this.style.background='#ee82ee';this.style.color='#ffffff';">検索</button></td>
     
</form>
</tr>
      <tr>
      <th>作成日</th>
      <th>タスク名</th>
      <th>更新</th>
      <th>削除</th>
    </tr>
   
    <td class = "login_user">@if (Auth::check())
  <p> {{$user->name . ' でログイン中'}}</p>
@else
@endif
    

   
</td> 
    



      


      @foreach ($todos as $todo)
      
     <tr><td width="30px,">{{ $todo->created_at }}</td><td><select name="example">
@foreach ($tags as $tag)<option>{{$tag->name}}</option>@endforeach
</select>
</td> 
     
    
    <form action="/update" method="post">
      @csrf     
      <td><input type="text" name="content" value="{{$todo->content}}"></td>
      <input type="hidden" name="id" value="{{$todo->id}}">

   
  <td><button style= "border-color:#ff7f7f; color:#ff7f7f;"onMouseOut="this.style.background='#ffffff';this.style.color='#ff7f7f';" onMouseOver="this.style.background='#ff7f7f';this.style.color='#ffffff';">更新</button></td>
  
      </form>
      
      
      <form action="/delete" method="post">
     @csrf
<input type="hidden" name="id" value="{{$todo->id}}"></td>
<td><button style="border-color:#7fffbf; color:#7fffbf;"onMouseOut="this.style.background='#ffffff';this.style.color='#7fffbf';" onMouseOver="this.style.background='#7fffbf';this.style.color='#ffffff';">削除</button>
</td></form>
</tr>

@endforeach
<form action="/" method="get">
  
<tr><td><button style="border-color:#a9a9a9; color:#a9a9a9;" onMouseOut="this.style.background='#ffffff';this.style.color='#a9a9a9';" onMouseOver="this.style.background='#a9a9a9';this.style.color='#ffffff';">戻る</button></td></tr>
</form></table>
@endsection