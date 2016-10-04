@extends('template')
@section('content')
@include('cms.header')

<style>
.metric-block, .metric-title  {
  text-align: center;
  font-family: 'LatoWebLight', Calibri, Candara, Optima, Arial, sans-serif;
}
.metric-title {
  font-weight: bold;
  margin-bottom: 1%;
  margin-top: 1%;
}
.metric-column {
  border-bottom: solid black;
  border-bottom-width: 2px;
  margin-left: 3%;
  margin-right: 3%;
  width: 27%;
  font-weight: bold;
}
.metric-block {
  margin-top: 4%;
  margin-bottom: 4%;
}
.metric-big {
  font-size: larger;
  font-weight: bold;
}
.metric-small {
  color: green;
  font-weight: bold;
  font-size: small;
}
.tabs-content {
  padding: 1.5%;
  margin-bottom: 1%;
}
.chart-title {
  margin-left: 8%;
  font-size: large;
  font-weight: bold;
}
.star {
  font-size: large;
}
.learningRow {
  min-height: 200px;
}
</style>

<div id="wrainbo-cms-assessment" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.bundle.min.js"></script>
<script src="{{ url('js/cms/assessment/gauge.min.js') }}"></script>
  <div class="medium-10 columns">

    <ul class="tabs" data-tabs id="wrainbo-cms-assessment-tabs">
      <li class="tabs-title"><a href="#none"><i class="step fi-align-center"></i></a></li>
      <li class="tabs-title is-active"><a href="#panel1" aria-selected="true">Usage</a></li>
      <li class="tabs-title"><a href="#panel2">Functional Skills</a></li>
      <li class="tabs-title"><a href="#panel3">Core Competency</a></li>
      <li class="tabs-title"><a href="#panel4">Learning Style</a></li>
    </ul>


    <div data-tabs-content="wrainbo-cms-assessment-tabs">
      <div class="tabs-panel is-active" id="panel1">
        @include('cms.assessment.usage')
      </div>
      <div class="tabs-panel" id="panel2">
        @include('cms.assessment.functional')
      </div>
      <div class="tabs-panel" id="panel3">
        @include('cms.assessment.competency')
      </div>
      <div class="tabs-panel" id="panel4">
        @include('cms.assessment.learning')
      </div>
    </div>
  </div>
</div>
<script src="{{ url('js/cms/assessment/AssessmentManager.js') }}"></script>
@stop
