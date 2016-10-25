@extends('main')
@section('content')
<div id="wrainbo-demo">
  <div class="row">
      <div class="large-12 columns">
        <h5>Get a demo of Wrainbo Platform</h5>
        <form>
          <img class="contactus-goblin" src="{{ url('image/home/img-magitech_theme.png')}}" />

          <input name="organization" type="text"  placeholder="Organization"></input>
          <input name="job" type="text"  placeholder="Job Position"></input>
          <input name="name" type="text"  placeholder="Name"></input>
          <input name="email" type="email"  placeholder="Email"></input>
          <input name="phone" type="number"  placeholder="Phone"></input>

          <br />
          <input type="submit" value="GET DEMO"/>
          <p>
            Already have an account? <a href="{{ url('cms') }}">Click here to Log in</a>
          </p>

          <img class="contactus-alvina" src="{{ url('image/home/img-modern_theme.png')}}" />
        </form>
        </div>
  </div>
</div>

@include('layouts.footer')

<script>
  utilityModule.SetToScreenHeight($("#wrainbo-demo"));

  $( "#wrainbo-demo form" ).submit(function( event ) {
    event.preventDefault();
    var email = $("#wrainbo-demo form input[name='email']"),
        name = $("#wrainbo-demo form input[name='name']"),
        job = $("#wrainbo-demo form input[name='job']")
        organization = $("#wrainbo-demo form input[name='organization']"),
        phone = $("#wrainbo-demo form input[name='phone']");


    if (email.val() == "" || name.val() == "" ||
        organization.val() == "") {
        alert("Please fill up the inputs");
      } else {
        var googleFormID="1BkZ-z9URb8hloY3O4ATzfqaDDoBUkn2hTH3hbtaXe2E";
        $.ajax({
          url: "https://docs.google.com/forms/d/"+googleFormID+"/formResponse",
          data: {"entry.1505027198": email.val(),
                  "entry.88640844" : name.val() ,
                  "entry_348431635" : organization.val(),
                  "entry_1577448286" : job.val(),
                  "entry.1708932502" : phone.val(),
                },
          type: "POST",
          dataType: "xml"})
          .done(function() {
         });
         alert("Thank you for your interest. We will be in touch shortly");
         email.val("");
         name.val("");
         job.val("");
         organization.val("");
         phone.val("");
      }

  });
</script>
@stop
