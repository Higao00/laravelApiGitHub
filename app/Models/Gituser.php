<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gituser extends Model
{
    protected $fillable = [
        'login',
        'idGit',
        'node_id',
        'avatar_url',
        'gravatar_id',
        'url',
        'html_url',
        'followers_url',
        'following_url',
        'gists_url',
        'starred_url',
        'subscriptions_url',
        'organizations_url',
        'repos_url',
        'events_url',
        'received_events_url',
        'type',
        'site_admin',
        'name',
        'company',
        'blog',
        'location',
        'email',
        'hireable',
        'bio',
        'twitter_username',
        'public_repos',
        'public_gists',
        'followers',
        'following',
        'git_created_at',
        'git_updated_at',
        'created_at',
        'updated_at'
    ];

    use HasFactory;
}
