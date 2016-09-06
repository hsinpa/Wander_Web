@extends('template')
@section('content')
  <form id="wrainbo-cms-login" action="/cms/login" method="post">
    <h2>Login Wrainbo CSM</h2>
    <label>Username</label>
    <input type="text" name="username"/>
    <label>Password</label>
    <input type="password" name="password"/>
    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
    <input type="submit" value="Submit" class="button" />
  </form>
@stop
