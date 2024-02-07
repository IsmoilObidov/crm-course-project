@extends('backend')
@section('main')
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible text-white" role="alert">
            <span class="text-sm">{{ Session::get('success') }}</span>
        </div>
    @endif

    <div class="card">
        <div class="card-body px-0 pb-2">
            <div class="container-fluid">
                <form class="text-start" action="{{ route('registrator.edit_save_pupil', $pupil->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="text" name="group_id" value="" style="display: none">
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label class="form-label">Login</label>
                                        <input type="text" name="name" class="form-control "
                                            value="{{ $pupil->name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control"
                                            value="{{ $pupil->email }}">
                                    </div>
                                </div>
                            </div>


                            <div class="input-group input-group-outline mb-3 focus is-focused">
                                <img id="blah" src="{{ asset($pupil->photo) }}" width="300px" height="200px" />
                                <input accept="image/*" type='file' name="photo" id="imgInp" class="form-control" />
                            </div>
                            <div class="input-group input-group-outline mb-3 focus is-focused">
                                <label class="form-label">Password</label>
                                <input type="text" id='password' name="password" class="form-control"
                                    style="height:45px">
                                <button class="btn btn-outline-info" type="button" onclick="generate_pass()"
                                    style="height:45px">
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
                        </div>

                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label class="form-label">Last Name</label>
                                        <input type="text" name="last_name" class="form-control"
                                            value="{{ $pupil->get_pupil->last_name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label class="form-label">First Name</label>
                                        <input type="text" name="first_name" class="form-control"
                                            value="{{ $pupil->get_pupil->first_name }}">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label for="" class="form-label">Birthday</label>
                                        <input type="text" class="form-control group_start" name="birth_date"
                                            value="{{ $pupil->get_pupil->birth_date }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $pupil->get_pupil->address }}">
                                    </div>
                                </div>
                            </div>


                            <div class="col-sm-12">
                                <div class="input-group input-group-outline mb-3 focus is-focused">
                                    <label class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control"
                                        value="{{ $pupil->get_pupil->phone }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 is-filled">
                                        <label class="form-label">Father Name</label>
                                        <input type="text" name="father_name" class="form-control"
                                            value="{{ $pupil->get_pupil->father_name }}">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 is-filled">
                                        <label class="form-label">Father Phone</label>
                                        <input type="text" name="father_phone" class="form-control"
                                            value="{{ $pupil->get_pupil->father_phone }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline mb-3 focus is-focused">
                                        <label class="form-label">Mother Name</label>
                                        <input type="text" name="mother_name" class="form-control"
                                            value="{{ $pupil->get_pupil->mother_name }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="input-group input-group-outline is-filled">
                                        <label class="form-label">Mother Phone</label>
                                        <input type="text" name="mother_phone" class="form-control"
                                            value="{{ $pupil->get_pupil->mother_phone }}">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn bg-gradient-primary w-100 my-2 mb-2">Save</button>
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
                            new Picker(document.querySelector('.group_start'), {
                                format: 'YYYY-MM-D',
                                headers: true,
                                text: {
                                    title: 'Pick a time',
                                },
                            });
                        });
                    </script>

                </form>
            </div>
        </div>
    </div>
@endsection
