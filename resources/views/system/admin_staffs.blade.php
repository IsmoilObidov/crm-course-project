@extends('backend')
@section('main')

<input class="form-control" id="myInput" type="text" placeholder="Search.." style="border: 1px solid black; border-radius:10px">

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Пользователи {{ $user->name }} </h6>

                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Автор</th>
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Функция</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Положение дел</th>
                                        <th
                                        
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Трудоустроен</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody id="mytable">
                                    @foreach ($staffs as $st)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset($st->photo) }}"
                                                            class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $st->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $st->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0" style="text-transform:uppercase;">
                                                    {{ $st->role->name }}</p>
                                                <p class="text-xs text-secondary mb-0">
                                                    {{ $st->course->name }}
                                                </p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">В сети</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($st->created_at)->format('d/m/Y') }}</span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#1nput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#table1 tr,name").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file)
            }
        }

        function reloadPageAfterDelay() {
            setTimeout(function() {
                location.reload();
            }, 2000); // 2000 milliseconds = 2 seconds
        }

        function generate_pass() {
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            let password = "";

            for (let i = 0; i < 8; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset.charAt(randomIndex);
            }
            $('#password').focus();
            $('#password').val(password);
        }



    
        $(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#mytable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
    </script>
@endsection
