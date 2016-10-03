@extends('template')
@section('content')
@include('cms.header')

<div id="wrainbo-cms-assessment" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>

  <div class="medium-10 columns">

    <ul class="tabs" data-tabs id="wrainbo-cms-assessment-tabs">
      <li class="tabs-title"><a href="#none"><i class="step fi-align-center"></i></a></li>
      <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Usage</a></li>
      <li class="tabs-title"><a href="#panel2">Functional Skills</a></li>
      <li class="tabs-title"><a href="#panel2">Core Competency</a></li>
      <li class="tabs-title"><a href="#panel2">Learning Style</a></li>
    </ul>


      <div class="tabs-content" data-tabs-content="wrainbo-cms-assessment-tabs">
      <div class="tabs-panel is-active" id="panel1">
        @include('cms.assessment.usage')
      </div>
      <div class="tabs-panel" id="panel2">
        <p>Suspendisse dictum feugiat nisl ut dapibus.  Vivamus hendrerit arcu sed erat molestie vehicula. Ut in nulla enim. Phasellus molestie magna non est bibendum non venenatis nisl tempor.  Sed auctor neque eu tellus rhoncus ut eleifend nibh porttitor.</p>
      </div>
    </div>
  </div>
</div>
<script src="{{ url('js/cms/assessment/AssessmentManager.js') }}"></script>
@stop
