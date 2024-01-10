@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body bg-dark text-white">
                    <h3 class="card-title">Daftar Akun</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 mb-5">
        <div class="col-12">
            <div class="card" style="width: 100%;">
                <div class="card-body table-responsive">
                    <table class="table table-hover text-center">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Tipe</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($karyawan as $key => $d)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->account_type == 1 ? "Admin" : "Karyawan" }}</td>
                                    <td>
                                        <a href="#" class="btn edit-btn" data-id="{{ $d->id }}" data-toggle="modal" data-target="#formModal">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="#" class="btn hapus-btn" data-id="{{ $d->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="formModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Edit akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.akun') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <select class="form-control" id="username" name="username">
                            @foreach($karyawan as $d)
                                 <option value="{{ $d->username }}">{{ $d->username }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your password.."
                            name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="account_type">Account Type</label>
                        <select class="form-control" id="account_type" name="account_type">
                            <option value="1">Admin</option>
                            <option value="2">Karyawan</option>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" name="ubah" id="buttonSubmit">Edit</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
      $(".edit-btn").on("click", function() {
        var id = $(this).data("id");
        $("#id").val(id);

        $.ajax({
          url: '{{ route('admin.akun') }}',
          type: 'POST',
          dataType: 'json',
          data: ({
            id: id
          }),
          success: function(data) {
            console.log(data);
            $("#username").val(data.username);
            $("#account_type").val(data.account_type);
          }
        })
      })

      $(".hapus-btn").on("click", function() {
        alert('Anda akan menghapus data di tabel karyawan!');
        if (confirm('Anda yakin untuk menghapus data ini?')) {
          var id = $(this).data("id");

                $.ajax({
            url: '{{ route('admin.akun') }}', // Pastikan URL ini benar
            type: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(data) {
              alert(data);
            },
            error: function(error) {
              alert(data);
            }
          })
        }
      })
    });
  </script>

@endsection
