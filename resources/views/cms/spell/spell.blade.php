@extends('template')
@section('content')
<div class="row" id="wrainbo-cms-spell">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>

  <div class="medium-10 columns">
    <h2>Spell Editor</h2>
    <ul class="tabs" data-tabs id="example-tabs">
      <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Spell 1</a></li>
      <li class="tabs-title"><a href="#panel2">Spell 2</a></li>
    </ul>

    <div class="tabs-content" data-tabs-content="example-tabs">
      <div class="tabs-panel is-active" id="panel1">
        <div class="row">
          <div class="medium-6 columns">
            @include('cms.spell.basicInfo')
          </div>
          <div class="medium-6 columns">
            @include('cms.spell.cost')
          </div>
        </div>
            @include('cms.spell.ability')
        </div>
    </div>

  </div>
</div>
@stop
