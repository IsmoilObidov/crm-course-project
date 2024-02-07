@extends('backend')
@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div id="myModal" class="modal">
                    <div class="modal-content" style="width:60%;right:10%;">
                        <div class="close">&times;</div>
                        <form class="text-start" action="{{ route('registrator.save_pupil') }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            <input type="text" name="group_id" value="{{ $group_id }}" style="display: none">
                            <input type="text" name="teacher_id" value="{{ $teacher_id }}" style="display: none">
                            <div class="row">
                                <div class="col">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Логин</label>
                                                <input type="text" name="name" class="form-control ">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="input-group input-group-outline mb-3">

                                                <label class="form-label">Почта</label>
                                                <input type="text" name="email" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group input-group-outline mb-3">
                                        <a id="img_url" style="cursor: zoom-in" target="_blank"><img id="blah"
                                                src="#" width="200px" height="100px" style="display: none;" /></a>
                                        <input accept="image/*" type='file' name="photo" id="imgInp"
                                            class="form-control" />
                                    </div>

                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Пароль</label>
                                        <input type="text" id='password' name="password" class="form-control"
                                            style="height:45px">
                                        <button class="btn btn-outline-info" type="button" onclick="generate_pass()"
                                            style="height:45px">
                                            <svg style="fill: white !important" xmlns="http://www.w3.org/2000/svg"
                                                class="icon icon-tabler icon-tabler-windmill-filled" width="44"
                                                height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff"
                                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M12 2c3.292 0 6 2.435 6 5.5c0 1.337 -.515 2.554 -1.369 3.5h4.369a1 1 0 0 1 1 1c0 3.292 -2.435 6 -5.5 6c-1.336 0 -2.553 -.515 -3.5 -1.368v4.368a1 1 0 0 1 -1 1c-3.292 0 -6 -2.435 -6 -5.5c0 -1.336 .515 -2.553 1.368 -3.5h-4.368a1 1 0 0 1 -1 -1c0 -3.292 2.435 -6 5.5 -6c1.337 0 2.554 .515 3.5 1.369v-4.369a1 1 0 0 1 1 -1z"
                                                    stroke-width="0" fill="currentColor" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>



                                <div class="col" id="zur">
                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Фамилия</label>
                                                <input type="text" name="last_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Имя</label>
                                                <input type="text" name="first_name" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">

                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label for="" class="form-label">День рождение</label>
                                                <input type="text" class="form-control group_start" name="birth_date">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Адрес</label>
                                                <input type="text" name="address" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Телефон</label>
                                        <input type="text" name="phone" class="form-control">
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Имя(отец)</label>
                                                <input type="text" name="father_name" class="form-control">
                                            </div>
                                        </div>

                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Телефон(отец)</label>
                                                <input type="text" name="father_phone" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Имя(мама)</label>
                                                <input type="text" name="mother_name" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="input-group input-group-outline mb-3">
                                                <label class="form-label">Телефон(мама)</label>
                                                <input type="text" name="mother_phone" class="form-control">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-2 mb-2">Сохранить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>




            <div class="col-12">
                <div id="myModal1" class="modal">
                    <div class="modal-content" style="width: 1150px; right:220px;">
                        <div class="container-fluid px-2 px-md-4">
                            <div class="page-header min-height-300 border-radius-xl mt-4"
                                style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
                                {{-- <span class="mask  bg-gradient-primary  opacity-6"></span> --}}
                            </div>
                            <div class="card card-body mx-3 mx-md-4 mt-n6" id="pupil_data">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Таблица учеников
                        <button class="btn btn-outline-primary btn-sm mb-0 modal-button"
                            onclick="open_modal('myModal','modal-button')"
                            style="float: right; margin-right:20px;z-index: 999 !important; background-color:white">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20"
                                viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                <path fill="#e91e63"
                                    d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM504 312V248H440c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V136c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H552v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z" />
                            </svg></button>
                    </h6>

                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ученик</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Роль</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Статус</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Дата рег.</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Данные</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Действие</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pupil as $st)
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
                                            <span class="badge badge-sm bg-gradient-success">Online</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span
                                                class="text-secondary text-xs font-weight-bold">{{ \Carbon\Carbon::parse($st->created_at)->format('d/m/Y') }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <button class="btn btn-info btn-sm modal-button{{ $st->id }}"
                                                onclick="open_modal('myModal1','modal-button{{ $st->id }}');set_data({{ $st->id }})">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="22.5"
                                                    viewBox="0 0 576 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path fill="#ffffff"
                                                        d="M512 80c8.8 0 16 7.2 16 16V416c0 8.8-7.2 16-16 16H64c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16H512zM64 32C28.7 32 0 60.7 0 96V416c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H64zM208 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16H304c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80H176zM376 144c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376zm0 96c-13.3 0-24 10.7-24 24s10.7 24 24 24h80c13.3 0 24-10.7 24-24s-10.7-24-24-24H376z" />
                                                </svg>
                                            </button>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a class="btn btn-info btn-sm modal-button1"
                                                href="{{ route('registrator.edit_pupil', $st->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16"
                                                    viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path fill="#ffffff"
                                                        d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                                </svg>
                                            </a>
                                            <a class="btn btn-danger btn-sm modal-button1"
                                                href="{{ route('registrator.delete_pupil', $st->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14"
                                                    viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                    <path fill="#ffffff"
                                                        d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                                </svg>
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
    </div>
    </div>
    <script>
        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                blah.src = URL.createObjectURL(file);
                $('#blah').show();
                document.getElementById('img_url').href = URL.createObjectURL(file);
            }
        }

        function reloadPageAfterDelay() {
            setTimeout(function() {
                location.reload();
            }, 2000); // 2000 milliseconds = 2 secondsа
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
            new Picker(document.querySelector('.group_start'), {
                format: 'YYYY-MM-D',
                headers: true,
                text: {
                    title: 'Pick a time',
                },
            });
        });


        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#mytable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        function set_data(id) {
            var settings = {
                "url": "{{ env('APP_URL') }}/registrator/pupil_data/" + id,
                "method": "GET",
                "timeout": 0
            };

            $.ajax(settings).done(function(response) {
                $('#pupil_data').html('');

                let user = response.data.user;
                let pupil = response.data.pupil_data;


                $('#pupil_data').html(`
                
                <div class="row gx-4 mb-2">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('${user.photo}') }}" alt="profile_image"
                                class="w-100 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                ${pupil.last_name} ${pupil.first_name}
                            </h5>
                            <p class="mb-0 font-weight-normal text-sm">
                                ${user.name}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row"> 
                    <div class="col-12">
                        <div class="card card-plain h-100">
                            <div class="card-body p-3">
                                <p class="text-sm">
                                    Hi, I’m Alec Thompson, Decisions: If you can’t decide, the answer is
                                    no. If two equally difficult paths, choose the one more painful in
                                    the short term (pain avoidance is creating an illusion of equality).
                                </p>
                                <hr class="horizontal gray-light my-4">
                                <ul class="list-group">
                                    <li class="list-group-item border-0 ps-0 pt-0 text-sm"><strong
                                            class="text-dark">Full Name:</strong> &nbsp;  ${pupil.last_name} ${pupil.first_name}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Mobile:</strong> &nbsp; ${pupil.phone}
                                    </li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Email:</strong> &nbsp;  ${user.email}</li>
                                    <li class="list-group-item border-0 ps-0 text-sm"><strong
                                            class="text-dark">Location:</strong> &nbsp;  ${pupil.address}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                `);
            });
        }
    </script>

    </div>
@endsection
