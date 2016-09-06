@extends('template')
@section('content')
<div class="row" id="wrainbo-cms-level">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>

  <div class="medium-10 columns">
    <h2>Level Editor</h2>
    <ul class="tabs" data-tabs id="wrainbo-switch-tabs">
      @for ($i = 0; $i < count($raw); $i++)
        <li class="tabs-title">
          <a href="#panel{{$i}}" data-index="{{$i}}">Level{{$i+1}}</a>
        </li>
      @endfor
      <li>
        <img src="../image/icon/ic-add.png"/>
      </li>
    </ul>

    <div class="tabs-content" data-tabs-content="wrainbo-switch-tabs">
        @for ($i = 0; $i < count($raw); $i++)
          <div class="tabs-panel" id="panel{{ $i }}">
          @include('cms.level.levelTemplate', (array)$raw[$i])
          </div>
        @endfor
    </div>
  </div>
</div>
<script type="text/javascript">
  <?php echo "var rawLevelData = ".json_encode($raw).";"; ?>
</script>
<script type="text/javascript" src="../js/cms/level/levelManager.js"></script>
@stop
