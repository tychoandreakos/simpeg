<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div class="container mt-5 col-md-5">
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
      </button>
      
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="addform">
                    {{ csrf_field() }}
            <div class="modal-body">
                    <div class="form-group">
                            <label for="exampleFormControlSelect1">Cari Pegawai</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="nip">
                              @foreach ($pegawai as $pegawai) 
                            <option value="{{ $pegawai->nip_pegawai }}">{{ "$pegawai->nip_pegawai - $pegawai->nama" }}</option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                              <label for="exampleFormControlInput1">Nama Anak</label>
                              <input type="text" class="form-control" name="nama" id="exampleFormControlInput1" placeholder="name@example.com">
                            </div>
                          <div class="form-group">
                            <label for="exampleFormControlSelect2">Example multiple select</label>
                            <select multiple class="form-control" id="exampleFormControlSelect2">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleFormControlTextarea1">Example textarea</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                          </div>
            </div>
   
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.4.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function () {

            $('#addform').on('submit', function (e) {
                e.preventDefault();

                $.ajax({
                    method: "POST",
                    url: "test/create",
                    data: $('#addform').serialize(),
                    success: function (response) {
                        console.log(response)
                        $('#exampleModal').modal('hide')
                        alert('Data saved');
                    },
                    error: function (error) {
                        console.log(error)
                        alert('Data gagal disimpan')
                    }
                });
            });

        });
    </script>
</body>

</html>