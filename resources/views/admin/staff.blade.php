@extends('backend')
@section('main')
    <style>
        .img-flag {
            width: 30px;
            height: 30px;
            margin-right: 5px;
        }

        #mySelect {
            width: 98vh;
            display: block;

        }
    </style>

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div id="myModal" class="modal">
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form role="form" class="text-start" action="{{ route('admin.create_user') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Имя</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Почта</label>
                                <input type="text" name="email" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <img id="blah" src="#" width="300px" height="200px" />
                                <input accept="image/*" type='file' name="photo" id="imgInp" class="form-control" />
                            </div>


                            <div class="input-group input-group-outline mb-3">
                                <select name="role" class="form-control" id="" onchange="change_disp()">
                                    <option value="3">Регистратор</option>
                                    <option value="4">Учитель</option>
                                </select>
                            </div>

                            <div class="input-group input-group-outline mb-3 select2-div" style="display: none">
                                <select id="mySelect" class="form-control" name="subject">
                                    <option value=""></option>
                                    @foreach ($subjects as $item)
                                        <option value="{{ $item->id }}" data-image="{{ asset($item->img) }}">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
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
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2"
                                    onclick="reloadPageAfterDelay()">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>

                <input class="form-control" id="myInput" type="text" placeholder="Search.."
                    style="border: 1px solid black; border-radius:10px">

                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Таблица Персонала <button
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
                            <table class="table align-items-center mb-0" style="text-align:center">
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
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Group</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody id="mytable">
                                    @foreach ($staff as $st)
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
                                                <p class="text-xs font-weight-bold mb-0"
                                                    style="text-transform:uppercase;">
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
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('admin/view_pupils', $st->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20"
                                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path fill="#ffffff"
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                                    </svg></a>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ route('admin.edit_staff', $st->id) }}">Изменить</a>
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
        <script>
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

            $(document).ready(function() {
                $('#mySelect').select2({
                    templateResult: formatOption,
                    escapeMarkup: function(m) {
                        return m;
                    }
                });

                function formatOption(option) {
                    if (!option.id) {
                        return option.text;
                    }

                    var $option = $(
                        '<span class="selected-option"><img src="' + option.element.dataset.image +
                        '" class="img-flag" /> ' + option.text + '</span>'
                    );

                    return $option;
                }
            });

            function change_disp() {
                if (event.target.value == '4') {
                    $('.select2-div').css({
                        'display': 'block'
                    });
                } else {
                    $('.select2-div').css({
                        'display': 'none'
                    });
                    $('.select2-div select').val(0)
                }
            }


            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#mytable tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>

    </div>
@endsection
