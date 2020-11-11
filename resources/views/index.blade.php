<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link rel="stylesheet" href="{{ asset('assets/css/uikit.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/uikit-rtl.min.css') }}">
  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">

</head>
<body>

  <div id="app">
    <v-header></v-header>
    <main>
      <div class="uk-container">
        <router-view></router-view>
      </div>
    </main>
  </div>

    <script src="{{ asset('assets/js/uikit.min.js') }}"></script>
    <script src="{{ asset('assets/js/uikit-icons.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
