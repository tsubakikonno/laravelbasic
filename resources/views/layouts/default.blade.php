<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      background-color:#423880;
      
     
    }
    table {
    background-color: #ffffff;
    margin: 150px auto;
    width: 900px;
    height: auto;
    border-radius:10px;

  }
  
    h1 {
      
    }


    td {
      
      color: Black;
      font-size: 20px;
      border-radius:30px;
      text-align: center;
      
    }
    
    th {
      color: Black;
      font-size: 20px;
      
      
    }
    button {
      border-radius:5px;
      
      height:33px;
      background: #ffffff;
      padding-left: 1em;
  padding-right: 1em;
  }
  </style>
</head>
<body>
    

  <table>
    <tr><th>@yield('title')
</th></tr>
 
   

    @yield('content')

 </table>
</body>
</html>