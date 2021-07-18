@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div style="display: flex; flex-direction: row; justify-content: space-between; align-items: center;"
                        class="card-header text-center">
                        <p style="margin: 0">{{ __('Todos Usuarios') }}</p>
                        <a href="{{ route('import-user') }}" class="btn btn-success">Adicionar</a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tableUsers">

                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Avatar</th>
                                        <th scope="col">Login</th>
                                        <th scope="col">Nome</th>
                                        <th scope="col">Localização</th>
                                        <th scope="col">Ações</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($data as $user)
                                        <tr id="{{ $user->idGit }}">
                                            <td><img style="border: 0" width="40" height="40"
                                                    src="{{ $user->avatar_url }}" class="img-thumbnail"> </td>
                                            <td>
                                                @if ($user->login != null)
                                                    {{ $user->login }}
                                                @else
                                                    Não informado
                                                @endif
                                            </td>

                                            <td>
                                                @if ($user->name != null)
                                                    {{ $user->name }}
                                                @else
                                                    Não informado
                                                @endif
                                            </td>

                                            <td>
                                                @if ($user->location != null)
                                                    {{ $user->location }}
                                                @else
                                                    Não informado
                                                @endif
                                            </td>

                                            <td>
                                                <button type="button" value="{{ $user->id }}"
                                                    value-idGit="{{ $user->idGit }}"
                                                    class="btn btn-danger deleteUser">Excluir</button>

                                                <button type="button" value="{{ $user->idGit }}"
                                                    class="btn btn-info viewAllUser">Dados</button>
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

    <!-- Modal -->
    <div class="modal fade" id="modalViewUsers" tabindex="-1" aria-labelledby="modalUsers" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModalViewUsers"></h5>
                    <button type="button" class="btn-close" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label for="loginUser"> <strong>Login: </strong> </label>
                        <span id="loginUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="idUser"> <strong>id: </strong></label>
                        <span id="idUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="nodeIdUser"><strong>node_id: </strong></label>
                        <span id="nodeIdUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="avatarUser"><strong>avatar_url: </strong></label>
                        <span id="avatarUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="gravatarIdUser"><strong>gravatar_id: </strong></label>
                        <span id="gravatarIdUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="htmlUrlUser"><strong>html_url: </strong></label>
                        <span id="htmlUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="followersUrlUser"><strong>followers_url: </strong></label>
                        <span id="followersUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="followingUrlUser"><strong>following_url: </strong></label>
                        <span id="followingUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="gistsUrlUser"><strong>gists_url: </strong></label>
                        <span id="gistsUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="starredUrlUser"><strong>starred_url: </strong></label>
                        <span id="starredUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="subscriptionsUrlUser"><strong>subscriptions_url: </strong></label>
                        <span id="subscriptionsUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="organizationsUrlUser"><strong>organizations_url: </strong></label>
                        <span id="organizationsUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="reposUrlUser"><strong>repos_url: </strong></label>
                        <span id="reposUrlUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="eventsUrlUser"><strong>events_url: </strong></label>
                        <span id="eventsUrlUser"><span>
                    </div>
                    <div class="form-group">
                        <label for="receivedEventsUrlUser"><strong>received_events_url: </strong></label>
                        <span id="receivedEventsUrlUser"><span>
                    </div>
                    <div class="form-group">
                        <label for="typeUser"><strong>type: </strong></label>
                        <span id="typeUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="siteAdminUser"><strong>site_admin: </strong></label>
                        <span id="siteAdminUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="companyUser"><strong>company: </strong></label>
                        <span id="companyUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="blogUser"><strong>blog: </strong></label>
                        <span id="blogUser"><span>
                    </div>


                    <div class="form-group">
                        <label for="locationUser"><strong>location: </strong></label>
                        <span id="locationUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="emailUser"><strong>email: </strong></label>
                        <span id="emailUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="hireableUser"><strong>hireable: </strong></label>
                        <span id="hireableUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="bioUser"><strong>bio: </strong></label>
                        <span id="bioUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="twitterUsernameUser"><strong>twitter_username: </strong></label>
                        <span id="twitterUsernameUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="publicReposUser"><strong>public_repos: </strong></label>
                        <span id="publicReposUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="publicGistsUser"><strong>public_gists: </strong></label>
                        <span id="publicGistsUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="followersUser"><strong>followers: </strong></label>
                        <span id="followersUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="followingUser"><strong>following: </strong></label>
                        <span id="followingUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="createdAtUser"><strong>created_at: </strong></label>
                        <span id="createdAtUser"><span>
                    </div>

                    <div class="form-group">
                        <label for="updatedAtUser"><strong>updated_at: </strong></label>
                        <span id="updatedAtUser"><span>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')

        <script>
            $('.deleteUser').click(function(event) {
                var idUser = $(this).val();
                var idUserGit = $(this).attr('value-idGit');

                if (idUser != '') {
                    $.ajax({
                        method: "DELETE",
                        url: "{{ route('import-users.destroy', '') }}" + "/" + idUser,
                        dataType: "json",
                        success: function(result) {
                            $("#" + idUserGit).remove();
                            swal('Sucesso!',
                                'O usuario foi removido com sucesso !!',
                                "success");
                        }
                    });
                }
            });

            $('.viewAllUser').click(function() {
                var idUser = $(this).val();

                if (idUser != '') {
                    $.ajax({
                        method: "GET",
                        url: "{{ route('import-users.show', '') }}" + "/" + idUser,
                        dataType: "json",
                        success: function(result) {
                            // console.log(result);
                            $('#titleModalViewUsers').html(result['dados'][0]['name']);

                            $('#loginUser').html(result['dados'][0]['login']);

                            $('#idUser').html(result['dados'][0]['idGit']);
                            $('#nodeIdUser').html(result['dados'][0]['node_id']);
                            $('#avatarUser').html(result['dados'][0]['avatar_url']);
                            $('#gravatarIdUser').html(result['dados'][0]['gravatar_id']);
                            $('#htmlUrlUser').html(result['dados'][0]['html_url']);
                            $('#followersUrlUser').html(result['dados'][0]['followers_url']);
                            $('#followingUrlUser').html(result['dados'][0]['following_url']);
                            $('#gistsUrlUser').html(result['dados'][0]['gists_url']);
                            $('#starredUrlUser').html(result['dados'][0]['starred_url']);
                            $('#subscriptionsUrlUser').html(result['dados'][0]['subscriptions_url']);
                            $('#organizationsUrlUser').html(result['dados'][0]['organizations_url']);
                            $('#reposUrlUser').html(result['dados'][0]['repos_url']);
                            $('#eventsUrlUser').html(result['dados'][0]['events_url']);
                            $('#receivedEventsUrlUser').html(result['dados'][0]['received_events_url']);
                            $('#typeUser').html(result['dados'][0]['type']);
                            $('#siteAdminUser').html(result['dados'][0]['site_admin']);
                            $('#companyUser').html(result['dados'][0]['company']);
                            $('#blogUser').html(result['dados'][0]['blog']);
                            $('#locationUser').html(result['dados'][0]['location']);
                            $('#emailUser').html(result['dados'][0]['email']);
                            $('#hireableUser').html(result['dados'][0]['hireable']);
                            $('#bioUser').html(result['dados'][0]['bio']);
                            $('#twitterUsernameUser').html(result['dados'][0]['twitter_username']);
                            $('#publicReposUser').html(result['dados'][0]['public_repos']);
                            $('#publicGistsUser').html(result['dados'][0]['public_gists']);
                            $('#followersUser').html(result['dados'][0]['followers']);
                            $('#followingUser').html(result['dados'][0]['following']);
                            $('#createdAtUser').html(result['dados'][0]['git_created_at']);
                            $('#updatedAtUser').html(result['dados'][0]['git_updated_at']);
                            $('#modalViewUsers').modal('toggle');
                        }
                    });
                }
            });
        </script>

    @endpush
@endsection
