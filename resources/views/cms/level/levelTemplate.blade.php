<div class="row">
  <form action="saveLevel" method="post">
    <section class="level-shortConfig">
    <h6>Quick Config</h6>
    <label>Level Name</label>
    <input type="text" name="level_name" value="{{ $name or '' }}">

    <label>Competitor AI</label>
    <select name="competitor">
        <option value="Average-bot">Easy</option>
        <option value="Random-bot">Neutral</option>
        <option value="Smart-bot">Smart</option>
    </select>

    <label>Map</label>
    <select name="map">
        <option value="Plain">Plain</option>
        <option value="Winter">Winter</option>
    </select>
  </section>

  <section class="level-numGroup">
    <h6>Number Config</h6>
    <label>Gold</label>
    <input type="number" name="gold" value="{{ $gold or '' }}">

    <label>Mana</label>
    <input type="number" name="mana" value="{{ $mana or '' }}">

    <label>Labor</label>
    <input type="number" name="labor" value="{{ $labor or '' }}">

    <label>Gold Target</label>
    <input type="number" name="gold_target" value="{{ $gold_target or '' }}">
  </section>

  <section class="level-multiSelect">
    <h6>Multi Select Config</h6>
    <div class="level-multiSelect-item">
      <label>Villagers</label>
      <select name="villager[]"  multiple="multiple">
          <option value="Human_Male" selected>Male Human</option>
          <option value="Human_Female">Female Human</option>
          <option value="Orc_Poor">Poor Orc</option>
          <option value="Orc_Rich">Rich Orc</option>
      </select>
    </div>

    <div class="level-multiSelect-item">
      <label>Rounds</label>
      <input type="number" class="level-numGroup-round" name="round" value="{{ $round or '0' }}">
      <label>Events</label>
      <div class="eventGroup">
        @for ($i = 0; $i < ((isset($round)) ? $round:0); $i++)
          @include('cms.level.eventTemplate')
        @endfor
      </div>
    </div>

    <div class="level-multiSelect-item">
      <label>Preset product
        <img class="templateAdd" target="preset" src="../image/icon/ic-add.png"></label>

      <div class="presetGroup">
        <?php
          if (isset($preset) && $preset != "") {
            $pieces = explode("&", $preset);
            for ($k =0; $k < count($pieces); $k++) { ?>
              @include('cms.level.presetTemplate')
            <?php
            }
          }
        ?>
      </div>
    </div>
  </section>


  <section class="level-unlockGroup">
    <h6>Unlock Config</h6>
    @include('cms.level.unlockTemplate')
  </section>

  <section class="level-description">
    <h6>Detail Description</h6>
    <textarea rows="4" name="description">{{ $description or '' }}</textarea>
  </section>
  <input type="hidden" name="level_id" value="{{ $_id or '-1' }}">
  <input type="hidden" name="cms_token" value="<?php echo session('cms.token'); ?>">
  <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
  @if (isset($_id) )
    <input type="button" class="button expanded alert level_delete" value="Delete" />
  @endif
  <input type="submit" class="button expanded" />
</form>
</div>
