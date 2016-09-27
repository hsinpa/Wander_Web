@extends('template')
<link rel="stylesheet" src="{{ url('css/foundation/foundation-select.css') }}">
<script lang="text/javascript">
  $('select').foundationSelect();
</script>
@section('content')
@include('cms.header')


<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>

  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Game Editor</h2>
    <div class="row">
      <div class="medium-12">
        @include('cms.editor.gameEditor')
      </div>
    </div>
    <div class="row">
      <div class="medium-12">
        @include('cms.editor.viewer')
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="{{ url('js/cms/editor/foundation-select.js') }}"></script>
@stop
