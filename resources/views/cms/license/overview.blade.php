<div class="wrainbo-cms-license-overview">
  <h2>Licenses</h2>

  <div class="chart-holder">
    <div class="licenseDonutChart">
    </div>
    <p>
      <span class="licenseDonutChart-title">Available</span>
      <span class="licenseDonutChart-remaining">{{$available_licenses}}</span>
      <span class="licenseDonutChart-total">{{$active_licenses}}/{{$total_licenses}} Active</span>
    </p>
  </div>
  <br />

  <div>
      <table>
        <tr>
          <td>
            Total licenses :
          </td>
          <td>
            {{$total_licenses}}
          </td>
        </tr>
        <tr>
          <td>
            Number of Licensed Used :
          </td>
          <td>
            {{$active_licenses}}
          </td>
        </tr>
        <tr>
          <td>
            Number of Licenses Available :
          </td>
          <td>
            {{$available_licenses}}
          </td>
        </tr>
      </table>
  </div>
</div>
