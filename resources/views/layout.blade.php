<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SPK SMART - Gaya Hidup Sehat</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}">SPK SMART</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item"><a href="{{ route('kriterias.index') }}" class="nav-link">Kriteria</a></li>
          <li class="nav-item"><a href="{{ route('alternatifs.index') }}" class="nav-link">Alternatif</a></li>
          <li class="nav-item"><a href="{{ route('hasil.index') }}" class="nav-link">Hasil</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container mt-4">
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @yield('content')
  </div>
  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>