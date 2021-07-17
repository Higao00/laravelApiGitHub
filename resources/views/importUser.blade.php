@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-light">{{ __('Importar Usuarios') }}</div>

                    <div class="card-body">
                        <form name="importUsers" method="get" id="importUsers">
                            @csrf
                            <div class="form-group">
                                <label for="username" class="form-label">Username do Github</label>
                                <input type="text" id="username" name="username" class="form-control"
                                    placeholder="Digite o username" required>
                            </div>

                            <div class="form-group">
                                <button type="submit" form="importUsers" class="btn btn-primary">Procurar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="table_users_researcher">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header bg-light">{{ __('Usuario Encontrado') }}</div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped text-center" id="table_users_researcher">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">LOGIN</th>
                                            <th scope="col">NOME</th>
                                            <th scope="col">LOCALIZAÇÃO</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="button" id="addUsersSelected" class="btn btn-primary">Add
                                Usuarios Selecionados</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('scripts')

        <script>
            var allUsers = new Array();

            //  Requisição para buscar os usuários que corresponderem ao texto digitado.
            $('#importUsers').submit(function(event) {
                event.preventDefault(); //Cancela o evento, se for cancelável. Sem parar a propagação do mesmo obs.
                var username = $('#username').val();

                if (username) {
                    $('.load_global').removeClass('no_active');
                    $('.load_global').toggleClass('yes_active');

                    $.ajax({
                        method: "GET",
                        url: "https://api.github.com/users/" + username,
                        dataType: "json",
                        success: function(result) {
                            if (!$('#' + result["id"]).length) {
                                $.ajax({
                                    method: "GET",
                                    url: "{{ route('import-users.show', '') }}" + "/" + result[
                                        "id"],
                                    dataType: "json",
                                    success: function(dados) {
                                        var existes = '';
                                        var style_tr = '#bef6ff';
                                        if (dados['dados'].length > 0) {
                                            existes = 'disabled';
                                            style_tr = '#ffbebe';
                                        }

                                        var newRow = $('<tr style="background: ' + style_tr +
                                            '" id="' + result["id"] +
                                            '" >');
                                        var cols = "";
                                        cols +=
                                            '<td><div class="form-check"><input class="form-check-input" name="users[]" value="' +
                                            result["id"] + '"type="checkbox" id="user' +
                                            result["id"] + '" ' + existes + '></div></td>';

                                        if (result["login"] != null) {
                                            cols += '<td>' + result["login"] + '</td>';
                                        } else {
                                            cols += '<td> Não informado </td>';
                                        }

                                        if (result["name"] != null) {
                                            cols += '<td>' + result["name"] + '</td>';
                                        } else {
                                            cols += '<td> Não informado </td>';
                                        }

                                        if (result["location"] != null) {
                                            cols += '<td>' + result["location"] + '</td>';
                                        } else {
                                            cols += '<td> Não informado </td>';
                                        }

                                        newRow.append(cols);
                                        $("#table_users_researcher").append(newRow);
                                    }
                                });
                            }

                            $('.table_users_researcher').css('display', 'block');
                            $(
                                '.load_global').removeClass('yes_active');
                            $('.load_global')
                                .toggleClass('no_active');
                            allUsers.push(result);
                        },
                        error: function(result) {
                            $('.load_global').removeClass('yes_active');
                            $('.load_global').toggleClass('no_active');

                            swal('Oops!',
                                'Alguma coisa aconteceu, aguarde alguns minutos e tenta novamente!!',
                                "error");
                        }
                    });
                }

            });

            // Adicionar os usuarios selecionados.
            $('#addUsersSelected').click(function() {
                var checkeds = new Array();
                var allUsersCheckeds = new Array();
                var userExists = '';

                $("input[name='users[]']:checked").each(function() {
                    checkeds.push($(this).val());
                });

                if (checkeds.length > 0) {
                    $('.load_global').removeClass('no_active');
                    $('.load_global').toggleClass('yes_active');

                    allUsers.forEach(user => {
                        checkeds.forEach(idUser => {
                            if (user['id'] == idUser) {
                                allUsersCheckeds.push(user);
                            }
                        });
                    });

                    allUsersCheckeds.forEach(allUsersFinal => {
                        $.ajax({
                            method: "POST",
                            url: "{{ route('import-users.store') }}",
                            data: allUsersFinal,
                            dataType: "json",
                            success: function(result) {
                                $("#" + allUsersFinal['id']).remove();
                            }
                        });
                    });

                    $('.load_global').removeClass('yes_active');
                    $('.load_global').toggleClass('no_active');

                    if (userExists == '') {
                        swal('Sucesso!',
                            'Os usuarios foram inseridos com sucesso !!',
                            "success");
                    }

                } else {
                    swal('Oops!',
                        'Para prosseguir marque algum usuário !!',
                        "error");
                }
            });
        </script>

    @endpush
@endsection
