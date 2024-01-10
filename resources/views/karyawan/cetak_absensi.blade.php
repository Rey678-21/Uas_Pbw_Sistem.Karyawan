<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Absensi {{ $nama }}</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Tambahkan link CSS Bootstrap jika diperlukan -->
</head>
<body>
    <h3 class="text-center">Laporan Absensi {{ $nama }}</h3>
    <div class="container-fluid">
        <div class="row mt-3">
            <div class="col-12">
                <table class="table table-hover text-center">
                    <!-- ... Tabel data absensi ... -->
                </table>
            </div>
        </div>
    </div>

    <script>
        window.print();
    </script>
</body>
</html>
