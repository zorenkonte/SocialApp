@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Create Post</strong></div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <create-post></create-post>
                </div>
            </div>
            <posts-list ref="postref" :user="{{Auth::user()}}"></posts-list>
        </div>
    </div>
</div>
@endsection
<style>
    .post {
        display: block;
    }

    .post-img,
    .comment-img {
        border-radius: 50%;
        float: left;
        height: 40px;
        width: 40px;
    }

    .post-msg {
        position: relative;
        margin: -10px 0 0 45px;
        padding: 0px 10px;
        display: block;
    }

    ::placeholder {
        opacity: .8;
    }

    textarea {
        width: 100%;
        border: none;
        border-radius: 20px;
        outline: none;
        padding: 10px;
        font-size: 1em;
        color: #676767;
        transition: border 0.5s;
        -webkit-transition: border 0.5s;
        -moz-transition: border 0.5s;
        -o-transition: border 0.5s;
        border: solid 3px #98d4f3;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;

    }

    textarea:focus {
        border: solid 3px #77bde0;
    }

    textarea {
        height: 100px;
        resize: none;
        overflow: auto;
    }

    .moment-ago {
        font-size: 75%;
    }

    .comment-msg {
        margin-bottom: 10px;
    }

    .comment-msg,
    .comment-text {
        display: block;
    }

    .comment-infos {
        display: block;
        font-size: .875rem;
        margin-bottom: 2px;
    }

    .comment-name {
        font-weight: 600;
    }

    .comment-timestamp {
        color: #697582;
    }

    .comment-text {
        border-radius: .3rem;
        background: #d2d6de;
        border: 1px solid #d2d6de;
        color: #444;
        margin: 5px 0 0 50px;
        padding: 5px 10px;
        position: relative;
    }

    .write-comment {
        position: relative;
        margin-bottom: -3px;
        z-index: 99;
        margin-top: -2px;
    }

    .comment-input {
        margin-left: 10px;
    }

</style>
