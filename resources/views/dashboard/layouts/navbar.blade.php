<nav class="navbar navbar-expand-lg navbar-light bg-warning text-white">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">My laundry</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      @auth
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/transaksi">transaksi</a>
          </li>
          @can('admin')
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admin
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="/dataUser">Data Users</a></li>
              <li><a class="dropdown-item" href="/dataPesanan">Data Pesanan</a></li>
              <li><a class="dropdown-item" href="/dataDetergen">Data Detergen</a></li>
              <li><a class="dropdown-item" href="/dataBulanan">Data Bulanan</a></li>
              
            </ul>
          </li>
          @endcan
          
        </ul>
        <form class="d-flex" method="post" action="/logout">
            @csrf
          <button class="dropdown-item" type="submit">Logout</button>
        </form>
      </div>
      @endauth
    </div>
  </nav>