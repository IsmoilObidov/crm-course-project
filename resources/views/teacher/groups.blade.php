@extends('backend')
@section('main')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div id="myModal" class="modal" >
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <form role="form" class="text-start" action="{{ route('teacher.create_group') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Имя</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                <label class="form-label">Число</label>
                                {{-- <input type="text" name="email" class="form-control"> --}}
                                <select class="smartsearch_keyword" name="days[]" id="keyword" style="width:100%;">
                                    <option value="1">Понедельник</option>
                                    <option value="2">Вторник</option>
                                    <option value="3">Среда</option>
                                    <option value="4">Четверг</option>
                                    <option value="5">Пятница</option>
                                    <option value="6">Суббота</option>
                                    <option value="7">Воскресенье</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="">От</label>
                                        <input type="text" class="form-control subject_start" name="subject_start"
                                            value="00:00">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="">До</label>
                                        <input type="text" class="form-control subject_end" name="subject_end"
                                            value="00:00">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="">Начало</label>
                                        <input type="text" class="form-control group_start" name="group_start">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="input-group input-group-outline my-3">
                                        <label for="">Конец</label>
                                        <input type="text" class="form-control group_end" name="group_end">
                                    </div>
                                </div>
                            </div>

                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Цена</label>
                                <input type="text" name="price" class="form-control">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2">Сохранить</button>
                            </div>

                        </form>
                    </div>
                </div>





                @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible text-white" role="alert">
                        <span class="text-sm">{{ Session::get('success') }}</span>
                    </div>
                @endif
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Таблица группы <button
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
                                            Имя</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Дни</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Время</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Цена</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Период </th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($groups as $gr)
                                        <tr>
                                            <td>
                                                <p class="text-xs font-weight-bold mb-0" style="text-transform:uppercase;">
                                                    {{ $gr->name }}</p>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $gr->days ? formatDays($gr->days) : '' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $gr->start_time ? \Carbon\Carbon::parse($gr->start_time)->format('H:i') : '' }}
                                                    -
                                                    {{ $gr->end_time ? \Carbon\Carbon::parse($gr->end_time)->format('H:i') : '' }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span class="badge badge-sm bg-gradient-success">{{ $gr->price }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-xs font-weight-bold mb-0">{{ $gr->start_group ? \Carbon\Carbon::parse($gr->start_group)->format('d.m.Y') : '' }}
                                                    -
                                                    {{ $gr->end_group ? \Carbon\Carbon::parse($gr->end_group)->format('d.m.Y') : '' }}</span>
                                            </td>
                                            <td class="align-middle">
                                                <a class="btn btn-info btn-sm"
                                                    href="{{ route('teacher.pupil', $gr->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20"
                                                        viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                        <path fill="#ffffff"
                                                            d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                                                    </svg></a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @php
                                        function formatDays($days)
                                        {
                                            $daysOfWeek = [ 
                                                '1' => 'Понедельник',
                                                '2' => 'Вторник',
                                                '3' => 'Среда',
                                                '4' => 'Четверг',
                                                '5' => 'Пятница',
                                                '6' => 'Суббота',
                                                '7' => 'Воскресенье',
                                            ];

                                            $selectedDays = json_decode($days);

                                            return implode(
                                                ' - ',
                                                array_map(function ($day) use ($daysOfWeek) {
                                                    return $daysOfWeek[$day];
                                                }, $selectedDays),
                                            );
                                        }
                                    @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $(".smartsearch_keyword").select2({
                    multiple: true
                });
                new Picker(document.querySelector('.subject_start'), {
                    format: 'HH:mm',
                    headers: true,
                    text: {
                        title: 'Pick a time',
                    },
                });

                new Picker(document.querySelector('.subject_end'), {
                    format: 'HH:mm',
                    headers: true,
                    text: {
                        title: 'Pick a time',
                    },
                });

                new Picker(document.querySelector('.group_start'), {
                    format: 'YYYY-MM-D',
                    headers: true,
                    text: {
                        title: 'Pick a time',
                    },
                });

                new Picker(document.querySelector('.group_end'), {
                    format: 'YYYY-MM-D',
                    headers: true,
                    text: {
                        title: 'Pick a time',
                    },
                });

            });
        </script>
    </div>
@endsection
