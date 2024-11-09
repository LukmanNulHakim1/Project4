<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <title>Homepage</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="/">Politeknik Negeri Bengkalis | D-IV Keamanan Sistem Informasi</a>
            <div class="d-flex">
                <h5 class="text-white mb-0">Selamat Datang, {{ Auth::user()->name }}</h5>
                <a href="{{ route('logout') }}" class="btn btn-light btn-sm ms-3">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Navigation Links -->
    <div class="container mt-4">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
            <div class="container-fluid">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.home') }}">Home</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="{{ route('admin.buku') }}">Buku</a>
                    </li>
                    <li class="nav-item ms-3">
                        <a class="nav-link" href="{{ route('admin.peminjaman') }}">Peminjaman</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

    <!-- Flash Messages -->
    <div class="container mt-4">
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    </div>

    <!-- Search Form -->
    <div class="container mt-4">
        <form action="{{ route('admin.home') }}" method="GET">
            @csrf
            <div class="input-group">
                <input type="search" name="search" class="form-control" placeholder="Cari nama admin" aria-label="Search" />
                <button type="submit" class="btn btn-outline-primary">Search</button>
            </div>
        </form>
    </div>

    <!-- Add New Button -->
    <div class="container mt-4">
        <div class="d-flex justify-content-end">
            <a class="btn btn-success" href="{{ route('admin.tambah') }}">Tambah Data +</a>
        </div>
    </div>

    <!-- Data Table -->
    <div class="container mt-4">
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Jabatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $index => $userAdmin)
                <tr>
                    <td>{{ $index + $data->firstItem() }}</td>
                    <td>{{ $userAdmin->name }}</td>
                    <td>{{ $userAdmin->email }}</td>
                    <td>{{ $userAdmin->jenis_kelamin }}</td>
                    <td>{{ $userAdmin->level }}</td>
                    <td>
                        <a class="btn btn-warning btn-sm" href="/editAdmin/{{ $userAdmin->id }}">Edit</a>
                        <a class="btn btn-danger btn-sm" href="/deleteAdmin/{{ $userAdmin->id }}">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination Links -->
        <div class="d-flex justify-content-center">
            {{ $data->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
