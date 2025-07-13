{{-- Isi diambil dari halaman page-blank.html --}}

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Components / Accordion - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  {{-- berfungsi untuk mengambil css dari folder views->resources->css.blade.php --}}
  @include('resources.css')
</head>

<body>
{{-- berfungsi untuk mengambil header dari views->resources->header.blade.php --}}
  @include('resources.header')

  {{-- berfungsi untuk mengambil sidebar dari views->resources->sidebar.blade.php --}}
  @include('resources.sidebar')

  <main id="main" class="main">
    @include('sweetalert::alert')
    <div class="pagetitle">
      <h1>Blank Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <div class="content">
        @yield('main')
    </div>

  </main><!-- End #main -->



  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  {{-- mengambil fungsi dengan js dari views->resources->js.blade.php --}}
  @include('resources.js')
  @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@11"])

</body>

</html>
