@extends('template')
@section('content')
@include('cms.header')

<div id="wrainbo-cms-level" class="wrainbo-cms-globalSetting">

  <style>
    #spell-sidebar {
      position: absolute;
      left: 16.66667%;
      height: 95%;
      background-color: #444;
      top: 57px;
      border-left: 2px solid #5a5959;
      border-top-right-radius: 75px;
      border-bottom-right-radius: 75px;
      transition: width 300ms linear, left 300ms linear, transform 300ms linear;
    }
    .spell-sidebar-open {
    width: 10%;
    }
    .spell-sidebar-open:after {
      content: "➔";
      color: white;
      top: 50%;
      position: absolute;
      left: 90%;
      -moz-transform: scale(-1, 1);
      -webkit-transform: scale(-1, 1);
      -o-transform: scale(-1, 1);
      -ms-transform: scale(-1, 1);
      transform: scale(-1, 1);
    }
    .spell-sidebar-closed {
      position: absolute;
      width: 2%;
      border-top-right-radius: 50px;
      border-bottom-right-radius: 50px;
    }
    .spell-sidebar-closed:after {
      content: "➔";
      color: white;
      top: 50%;
      position: absolute;
      left: 50%;
    }
  </style>
  <script type="text/javascript" src="{{ url('js/cms/editor/adapttext.js') }}"></script>
  <script lang="text/javascript">
    $(document).ready(function() {
      function sidebarSlide() {
        var open = document.querySelector(".spell-sidebar-open");
        var closed = document.querySelector(".spell-sidebar-closed");
        var el = document.querySelector("#spell-sidebar");

        if (open) {
          el.className = "spell-sidebar-closed";
        } else if (closed) {
          el.className = "spell-sidebar-open";
        }

        return el;
      }

      document.addEventListener("click", sidebarSlide);

    });
  </script>

  <div class="medium-2 columns">
    @include('cms.menu')
  </div>
  <div class="medium-10 columns">
    <h2 class="wrainbo-cms-title">Spell Editor</h2>
  </div>
  <div class="medium-2 columns">
    <div class="spell-sidebar-open" id="spell-sidebar">
      <div class="spell-sidebar-storage">
      </div>
    </div>
  </div>
  <div class="medium-8 columns">
    <h2 class="wrainbo-cms-title">Spell Editor</h2>
  </div>

</div>

</form>

@stop
