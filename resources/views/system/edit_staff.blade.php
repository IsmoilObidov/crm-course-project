@extends('backend')
@section('main')
    <div class="card">
        <div class="card-body px-0 pb-2">
            <div class="container-fluid">
                <form role="form" class="text-start" action="{{ route('system.edit_save_create', $staff->id) }}"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            @if ($errors->has('email'))
                            @endif
                        </div>
                    @endif
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                            <span class="text-sm">{{ Session::get('success') }}</span>
                        </div>
                    @endif
                    <div style="float: left;width:50%; ">
                        <div class="input-group input-group-outline my-3 ">
                            <label class="form-label">Имя</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $staff->name }}">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Почта</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ $staff->email }}">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Пароль</label>
                            <input type="text" id='password' name="password" class="form-control" style="height: 42px">
                            <button class="btn btn-outline-secondary" type="button" onclick="generate_pass()"
                                style="height: 42px">
                                <svg style="fill: white !important" xmlns="http://www.w3.org/2000/svg"
                                    class="icon icon-tabler icon-tabler-windmill-filled" width="30" height="30"
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
                            <input type="text" name="number" class="form-control"
                                value="{{ $staff->get_admin->number }}">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Адрес</label>
                            <input type="text" name="address" class="form-control"
                                value="{{ $staff->get_admin->adress }}">
                        </div>
                        <div class="input-group input-group-outline my-3">
                            <label class="form-label">Оплата</label>
                            <input type="text" name="bill" class="form-control" value="{{ $staff->get_admin->bill }}">
                        </div>
                    </div>
                    <div style="float: right;width:50%; padding-left:25px;margin-top:10px;">
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Инстаграм</label>
                            <input type="text" name="instagram" class="form-control"
                                value="{{ $staff->get_admin->instagram }}">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">Телеграм</label>
                            <input type="text" name="telegram" class="form-control"
                                value="{{ $staff->get_admin->telegram }}">
                        </div>
                        <div class="input-group input-group-outline mb-3">
                            <label class="form-label">последний оплата</label>
                            <input type="date" name="finish_billing" class="form-control"
                                value="{{ $staff->get_admin->finish_billing }}">
                        </div>
                        <a id="img_url" style="cursor: zoom-in" target="_blank"><img id="blah" src="#"
                                width="200px" height="100px" style="display: none;" /></a>
                        <div class="input-group input-group-outline mb-3">
                            <input accept="image/*" type='file' name="photo" id="imgInp" class="form-control" />
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Сохранить</button>
                    </div>

                </form>

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
    </script>
@endsection
