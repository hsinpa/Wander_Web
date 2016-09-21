<div id="wrainbo-home-contactus">
  <div class="row">
      <div class="large-12 columns">
        <h5>Get a demo of Magitech</h5>
        <form>
          <img class="contactus-goblin" src="{{ url('image/home/edmond.png')}}" />

          <input name="organization" type="text"  placeholder="Organization"></input>
          <input name="job" type="text"  placeholder="Job Position"></input>
          <input name="name" type="text"  placeholder="Name"></input>
          <input name="email" type="email"  placeholder="Email"></input>
          <input name="phone" type="number"  placeholder="Phone"></input>

          <br />
          <input type="submit" value="SUBMIT"/>
          <img class="contactus-alvina" src="{{ url('image/home/alvina.png')}}" />
        </form>
        </div>
  </div>
</div>

<script>
  $( "#wrainbo-home-contactus form" ).submit(function( event ) {
    event.preventDefault();
    var email = $("#wrainbo-home-contactus form input[name='email']"),
        name = $("#wrainbo-home-contactus form input[name='name']"),
        job = $("#wrainbo-home-contactus form input[name='job']")
        organization = $("#wrainbo-home-contactus form input[name='organization']"),
        phone = $("#wrainbo-home-contactus form input[name='phone']");


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
