<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Selamat Datang</title>
    <style>
      
      @media print {
        body * {
          visibility: hidden;
        }
        
        .modal-content * {
          visibility: visible;
          overflow: visible;
        }
        .main-page * {
          display: none;
        }
        .modal {
          position: absolute;
          left: 0;
          top: 0;
          margin: 0;
          padding: 0;
          min-height: 550px;
          visibility: visible;
          overflow: visible !important; /* Remove scrollbar for printing. */
        }
        .modal-dialog {
          visibility: visible !important;
          overflow: visible !important; /* Remove scrollbar for printing. */
        }
        
      }
      
      </style>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
  </head>
  <body class="d-flex flex-column min-vh-100">
    {{-- header --}}
    @include('dashboard.layouts.navbar')
      {{-- container --}}

    <div class="mt-3">
        @yield('container')
    </div>
      {{-- footer --}}
      
      <footer class="mt-auto bg-dark text-white">
       
        <div class="d-flex justify-content-center border-top">
          <p>&copy; 2022 Rizal Ramadhan Laundry.</p>
         
        </div>
      </footer>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>