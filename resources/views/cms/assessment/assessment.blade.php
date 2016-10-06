@extends('template')
@section('content')
@include('cms.header')

<script src="{{ url('js/cms/assessment/Assessment-UsageManager.js') }}"></script>
<script src="{{ url('js/cms/assessment/Assessment-FunctionManager.js') }}"></script>

<div id="wrainbo-cms-assessment" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>

  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Assessment</h2>

    <ul class="tabs" data-tabs id="wrainbo-cms-assessment-tabs">
      <li class="tabs-title"><a href="#none"><i class="step fi-align-center"></i></a></li>
      <li class="tabs-title is-active"><a href="#p_usage" aria-selected="true">Usage</a></li>
      <li class="tabs-title "><a href="#p_function">Functional Skills</a></li>
      <li class="tabs-title"><a href="#p_competency">Core Competency</a></li>
      <li class="tabs-title"><a href="#p_style">Learning Style</a></li>
    </ul>


      <div class="tabs-content" data-tabs-content="wrainbo-cms-assessment-tabs">
      <div class="tabs-panel is-active" id="p_usage">
        @include('cms.assessment.usage')
      </div>
      <div class="tabs-panel" id="p_function">
        @include('cms.assessment.functionalSkill')
      </div>
      <div class="tabs-panel" id="p_competency">
        @include('cms.assessment.coreCompetency')
      </div>
      <div class="tabs-panel" id="p_style">
        @include('cms.assessment.learningStyle')
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    UsageManager.Init();

    $(".tabs-title a").on("click", function() {
      var self = $(this);
      setTimeout(function(){
          switch (self.attr("href")) {
            case "#p_usage":
              UsageManager.Load();
            break;
            case "#p_function":
              FunctionManager.Load(".functionalSkill", 82, 40, 89);
            break;
            case "#p_competency":
              FunctionManager.Load(".competency", 20, 80, 83);
            break;
            case "#p_style":
              FunctionManager.Load(".style", 23, 58, 63);
            break;
            default:
            break;
          }
        }, 100);

    });
});
</script>
@stop
