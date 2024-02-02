@extends('backend')
@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form role="form" class="text-start" action="{{ route('create_admin') }}" method="POST"
                            enctype="multipart/form-data" >
                            @csrf
                            @if (Session::has('success'))
                                <div class="alert alert-success alert-dismissible text-white" role="alert">
                                    <span class="text-sm">{{ Session::get('success') }}</span>
                                </div>
                            @endif
                     <div style="float: left;width:50%; ">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Имя</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Почта</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Пароль</label>
                                <input type="text" id='password' name="password" class="form-control"
                                    style="height: 45px;">
                                <button class="btn btn-outline-info" type="button" onclick="generate_pass()"
                                    style="height: 45px;">
                                    <svg style="fill: white !important" xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-windmill-filled" width="44" height="44"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path
                                            d="M12 2c3.292 0 6 2.435 6 5.5c0 1.337 -.515 2.554 -1.369 3.5h4.369a1 1 0 0 1 1 1c0 3.292 -2.435 6 -5.5 6c-1.336 0 -2.553 -.515 -3.5 -1.368v4.368a1 1 0 0 1 -1 1c-3.292 0 -6 -2.435 -6 -5.5c0 -1.336 .515 -2.553 1.368 -3.5h-4.368a1 1 0 0 1 -1 -1c0 -3.292 2.435 -6 5.5 -6c1.337 0 2.554 .515 3.5 1.369v-4.369a1 1 0 0 1 1 -1z"
                                            stroke-width="0" fill="currentColor" />
                                    </svg>
                                </button>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Телефон</label>
                                <input type="number" name="number" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Адрес</label>
                                <input type="text" name="adress" class="form-control"
                                    style="height: 45px;">
                            </div>
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Оплата</label>
                                <input type="text" name="bill" class="form-control">
                            </div>
                    </div>
                    <div style="float: right;width:50%; padding-left:25px;margin-top:10px;">
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Инстаграм</label>
                                <input type="text" name="instagram" class="form-control"
                                    style="height: 45px;">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Телеграм</label>
                                <input type="text" name="telegram" class="form-control"
                                    style="height: 45px;">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">последний оплата</label>
                                <input type="date" name="finish_billing" class="form-control"
                                    style="height: 45px;">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <img id="blah" src="#" width="300px" height="200px" />
                                <input accept="image/*" type='file' name="photo" id="imgInp" class="form-control" />
                            </div>
                    </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                    onclick="reloadPageAfterDelay()">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">таблица админов <button
                                    class="btn btn-outline-primary btn-sm mb-0 modal-button"
                                    onclick="open_modal('myModal','modal-button')"
                                    style="float: right; margin-right:20px;z-index: 999 !important; background-color:white">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20"
                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                        <path fill="#e91e63"
                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                                    </svg></button></h6>

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
                                <tbody id="admin_table">
                                    @foreach ($admins as $st)
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
                                                <p class="text-xs text-secondary mb-0">{{ Auth::user()->name }}</p>
                                            </td>
                                            <td class="align-middle text-center text-sm">
                                                <span class="badge badge-sm bg-gradient-success">В сети</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($st->created_at)->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('system.edit_staff', $st->id) }}">Изменить</a>
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('system.admin_staff', $st->id) }}"><svg
                                                        xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                        viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path fill="#ffffff"
                                                            d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
                                                    </svg></a>
                                                @if ($st->is_blocked == 1)
                                                    <button class="btn btn-warning btn-sm"
                                                        onclick="change_block_status(0,{{ $st->id }})"><svg
                                                            xmlns="http://www.w3.org/2000/svg" height="16"
                                                            width="14"
                                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                            <path fill="#ffffff"
                                                                d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                                                        </svg></button>
                                                @else
                                                    <button class="btn btn-success btn-sm"
                                                        onclick="change_block_status(1,{{ $st->id }})"><svg
                                                            xmlns="http://www.w3.org/2000/svg" height="16"
                                                            width="14"
                                                            viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                            <path fill="#ffffff"
                                                                d="M144 144c0-44.2 35.8-80 80-80c31.9 0 59.4 18.6 72.3 45.7c7.6 16 26.7 22.8 42.6 15.2s22.8-26.7 15.2-42.6C331 33.7 281.5 0 224 0C144.5 0 80 64.5 80 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H144V144z" />
                                                        </svg></button>
                                                @endif
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

        function change_block_status(type, id) {
            var form = new FormData();
            form.append("admin", id);
            form.append("_token", '{{ csrf_token() }}');
            form.append("type", type);

            var settings = {
                "url": "{{ route('system.change_block_status') }}",
                "method": "POST",
                "timeout": 0,
                "processData": false,
                "contentType": false,
                "data": form
            };

            $.ajax(settings).done(function(response) {
                $('#admin_table').html('');
                let data = response.data;

                for (const i of data) {

                    let status, date;

                    const inputDate = new Date(i.created_at);

                    const day = inputDate.getDate().toString().padStart(2, '0');
                    const month = (inputDate.getMonth() + 1).toString().padStart(2,
                        '0'); // Note: Months are zero-based in JavaScript, so we add 1.
                    const year = inputDate.getFullYear();

                    if (i.is_blocked == 1) {
                        status = `
                        <button class="btn btn-warning btn-sm"
                            onclick="change_block_status(0,${i.id})"><svg
                                xmlns="http://www.w3.org/2000/svg" height="16"
                                width="14"
                                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#ffffff"
                                    d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                        </svg></button>
                        `;
                    } else {
                        status = `
                        <button class="btn btn-success btn-sm"
                                onclick="change_block_status(1,${i.id})"><svg
                                    xmlns="http://www.w3.org/2000/svg" height="16"
                                    width="14"
                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                    <path fill="#ffffff"
                                        d="M144 144c0-44.2 35.8-80 80-80c31.9 0 59.4 18.6 72.3 45.7c7.6 16 26.7 22.8 42.6 15.2s22.8-26.7 15.2-42.6C331 33.7 281.5 0 224 0C144.5 0 80 64.5 80 144v48H64c-35.3 0-64 28.7-64 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V256c0-35.3-28.7-64-64-64H144V144z" />
                                </svg></button>
                        `;
                    }

                    $('#admin_table').append(`
                <tr>
                    <td>
                        <div class="d-flex px-2 py-1">
                            <div>
                                <img src="{{ env('APP_URL') }}/${i.photo}"
                                    class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </div>
                            <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm">${i.name}</h6>
                                <p class="text-xs text-secondary mb-0">${i.email}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-xs font-weight-bold mb-0" style="text-transform:uppercase;">
                            ${i.role.name}</p>
                        <p class="text-xs text-secondary mb-0">{{ Auth::user()->name }}</p>
                    </td>
                    <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">В сети</span>
                    </td>
                    <td class="align-middle text-center">
                        <span
                            class="text-secondary text-xs font-weight-bold">${day}/${month}/${year}</span>
                    </td>
                    <td class="align-middle">
                        <a class="btn btn-danger btn-sm"
                            href="/system/edit_staff/${i.id}">Изменить</a>
                        <a class="btn btn-info btn-sm"
                            href="/system/admin_staff/${i.id}"><svg
                                xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#ffffff"
                                    d="M336 352c97.2 0 176-78.8 176-176S433.2 0 336 0S160 78.8 160 176c0 18.7 2.9 36.8 8.3 53.7L7 391c-4.5 4.5-7 10.6-7 17v80c0 13.3 10.7 24 24 24h80c13.3 0 24-10.7 24-24V448h40c13.3 0 24-10.7 24-24V384h40c6.4 0 12.5-2.5 17-7l33.3-33.3c16.9 5.4 35 8.3 53.7 8.3zM376 96a40 40 0 1 1 0 80 40 40 0 1 1 0-80z" />
                            </svg></a>
                            ${status}
                    </td>
                </tr>
                `);

                }

            });
        }
    </script>
@endsection
