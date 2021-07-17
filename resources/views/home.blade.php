@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header text-center">{{ __('Todos os Usuarios Importados') }}</div>

                    <div class="card-body">
                        <table class="table" id="tableUsers">

                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Avatar</th>
                                    <th scope="col">Login</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Localização</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach (app(App\Http\Controllers\userGithubController::class)->index() as $user)
                                    <tr id="{{ $user->idGit }}">
                                        <td><img src="{{ $user->avatar_url }}" class="img-thumbnail"> </td>
                                        <td>{{ $user->login }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->location }}</td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

        <script>

        </script>

    @endpush
@endsection
