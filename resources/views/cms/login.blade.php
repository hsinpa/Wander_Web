@extends('main')
@section('content')
  <div id="wrainbo-cms-login">
    <form action="/cms/login" method="post">

      <h2>LOGIN TO WRAINBO CONSOLE</h2>
      <hr />
      <label>Username
      <input type="text" name="username"/></label>

      <label>Password
      <input type="password" name="password"/></label>

      <div class="wrainbo-cms-login-submitHolder">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="submit" value="LOGIN" class="button" />
      </div>

    </form>
  </div>
  @include('pages.home.contact')
@stop
