<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link href="images/favicon.png" rel="icon" type="image/vnd.microsoft.icon"/>
    <link href="css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/fontawesome/css/all.css" rel="stylesheet"/>    
    <title>Calidad Cloud</title>
  </head>
    <body style="background: #efefef">
        <div id="app">
            <home-component></home-component>
        </div>
        <script src="{{ mix('/js/app.js') }}"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>