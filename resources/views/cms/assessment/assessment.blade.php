@extends('template')
@section('content')
@include('cms.header')

<div id="wrainbo-analytics" class="wrainbo-cms-globalSetting">
  <div class="medium-2 columns">
    @include('cms.menu')
  </div>

  <div class="medium-10 columns">
    <div class="wrainbo-analytics-main">
      <h2 class="wrainbo-cms-title">Magitech Capability Assessment</h2>
      <form class="row">
        <select class="menuSelecter">
          <option value="overall">Overall</option>
          <option value="marketing">Marketing acumen</option>
          <option value="operation">Operation acumen</option>
          <option value="financial">Financial acumen</option>
        </select>
        <select class="userSelecter">
          <option value="">Pick One</option>
        </select>

        <div class="functionGroup">
          <button class="secondary tiny button" value="halfDonut">Summary</button>
          <button class="secondary tiny button" value="bar">Trend</button>
        </div>
      </form>

      <!-- <label>X Axis<select class="AxisSelect" axis="x"></select></label>
      <label>Y Axis<select class="AxisSelect" axis="y"></select></label> -->

      <div id="vizcontainer" class="row" data-equalizer data-equalize-on="medium" >
        <section class="medium-8 columns" >
          <svg class="chart" />
          <div class="textGroup">
            <h3>75</h3>
            <h5></h5>
            <h4>Level 5</h4>
          </div>
        </section>

        <section class="medium-4 columns" >
            <div class="positive_element" class="row">
              <img src="{{ url('image/accessment/gogo.png') }}" class="medium-2 columns"/>
              <div class="medium-10 columns">

              </div>
            </div>

            <hr />

            <div class="negative_element" class="row">
              <img src="{{ url('image/accessment/chacha.png') }}" class="medium-2 columns"/>
              <div class="medium-10 columns">

              </div>
            </div>
        </section>
      </div>
    </div>
  </div>
</div>
@stop
