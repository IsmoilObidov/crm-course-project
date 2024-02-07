@extends('backend')
@section('main')
    <style>
        .img-flag {
            width: 30px;
            height: 30px;
            margin-right: 5px;
        }

        #mySelect {
            width: 100%;
            display: block;
        }
    </style>
    <h4 style="text-align: center;">Изменить информацию учителя</h4>
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('success') }}</span>
        </div>
    @endif
    <form role="form" class="text-start" action="{{ route('registrator.edit_save_create', $staff->id) }}" method="POST"
        enctype="multipart/form-data">
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
        @csrf
        <div class="input-group input-group-outline my-3 is-filled">
            <label class="form-label">Имя</label>
            <input type="text" name="name" class="form-control" value="{{ $staff->name }}">
        </div>
        <div class="input-group input-group-outline my-3 is-filled">
            <label class="form-label">Почта</label>
            <input type="text" name="email" class="form-control" value="{{ $staff->email }}">
        </div>
        <div class="input-group input-group-outline mb-3">
            <img id="blah" src="{{ asset($staff->photo) }}" width="300px" height="200px" />
            <input accept="image/*" type='file' name="photo" id="imgInp" class="form-control" />
        </div>
        <div class="input-group input-group-outline mb-3">
            <select name="role" class="form-control" id="role" onchange="change_disp()">
                <option value="3">Регистратор</option>
                <option value="4">Учитель</option>
            </select>
        </div>

        <div class="input-group input-group-outline mb-3 select2-div" style="display: none;">
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
            <input type="text" id='password' name="password" class="form-control" style="height: 45px;">
            <button class="btn btn-outline-info" type="button" onclick="generate_pass()" style="height: 45px;">
                <svg style="fill: white !important" xmlns="http://www.w3.org/2000/svg"
                    class="icon icon-tabler icon-tabler-windmill-filled" width="44" height="44" viewBox="0 0 24 24"
                    stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path
                        d="M12 2c3.292 0 6 2.435 6 5.5c0 1.337 -.515 2.554 -1.369 3.5h4.369a1 1 0 0 1 1 1c0 3.292 -2.435 6 -5.5 6c-1.336 0 -2.553 -.515 -3.5 -1.368v4.368a1 1 0 0 1 -1 1c-3.292 0 -6 -2.435 -6 -5.5c0 -1.336 .515 -2.553 1.368 -3.5h-4.368a1 1 0 0 1 -1 -1c0 -3.292 2.435 -6 5.5 -6c1.337 0 2.554 .515 3.5 1.369v-4.369a1 1 0 0 1 1 -1z"
                        stroke-width="0" fill="currentColor" />
                </svg>
            </button>
        </div>
        <div class="text-center">
            <button type="submit" class="btn bg-gradient-primary w-100"
                style="position: relative !important;top:-20px;">Сохранить</button>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            var staffData = {!! json_encode($staff) !!};
            $('#role').val(staffData.role_id);
            if (staffData.role_id == 4) {
                $('.select2-div').css({
                    'display': 'block'
                })
            }


            var staffData = {!! json_encode($staff) !!};
            $('#mySelect').select2({
                templateResult: formatOption,
                escapeMarkup: function(m) {
                    return m;
                }
            });

            // Set the default value
            $('#mySelect').val(staffData.subject_id).trigger('change');


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
    </script>
@endsection
