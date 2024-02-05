@extends('backend')
@section('main')
    <div class="card my-4">
        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">Pupils table
                </h6>

            </div>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0" style="text-align:center;">
                        <thead>
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                    Name</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Group Id</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pupils as $st)
                                <tr>
                                    <td class="align-middle text-center text-sm">
                                        <h6 class="mb-0 text-sm">{{ $st->pupil->name }}</h6>
                                    </td>
                                    <td class="align-middle text-center text-sm">
                                        <h6 class="mb-0 text-sm">{{ $st->pupil->get_pupil->user_group->name }}</h6>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
