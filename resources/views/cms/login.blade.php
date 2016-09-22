@extends('main')
@section('content')
  <div id="wrainbo-cms-login">
    <form action="/cms/login" method="post">

      <h2>Log In</h2>
      <hr />
      <input type="text" placeholder="Username" name="username"/>

      <input type="password" placeholder="Password" name="password"/>

      <div class="wrainbo-cms-login-submitHolder">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input type="submit" value="LOGIN" class="button expand radius" />
      </div>

    </form>
  </div>
  <!-- @include('layouts.footer') -->

  <script>
    utilityModule.SetToScreenHeight($("#wrainbo-cms-login"));
  </script>
@stop
