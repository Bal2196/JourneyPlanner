<!DOCTYPE html>
<html>
<head>
  <title>@yield('title', 'Brando Travel')</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/app.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datejs/1.0/date.min.js"></script>
</head>
<body>
<div class="width-40">
  <div class="planner">
    <a href="/"><h1>Brando Travel</h1></a>
    <div>
      <form method="post" action="/search">
        @csrf
        <label for="start_code">Starting postcode</label>
        <input type="text" name="start_code" value="@isset($start_code) {{ $start_code }} @endisset" placeholder="Enter postcode" required>
        <label for="end_code">Destination postcode</label>
        <input type="text" name="end_code" value="@isset($end_code) {{ $end_code }} @endisset"placeholder="Enter postcode" required>
    </div>
        <input type="submit" value="Search">
      </form>
  </div>
</div>
<div class="content">
@yield('content')
</div>
</body>
</html>