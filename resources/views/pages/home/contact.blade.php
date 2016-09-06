<div id="wrainbo-home-contactus">
  <div class="row">
      <div class="large-12 columns">
        <h5>Get a demo of Magitech</h5>
        <form>
          <img class="contactus-goblin" src="image/home/edmond.png" />
          <input name="name" type="text"  placeholder="Name"></input>
          <input name="email" type="email"  placeholder="Email"></input>
          <br />
          <input type="submit" value="SUBMIT"/>
          <img class="contactus-alvina" src="image/home/alvina.png" />
        </form>
        </div>
  </div>
</div>

<script>
  $( "#wrainbo-home-contactus form" ).submit(function( event ) {
    event.preventDefault();
    var email = $("#wrainbo-home-contactus form input[type='email']"),
        name = $("#wrainbo-home-contactus form input[type='text']");

    if (email.val() == "") {
        alert("No Empty");
      } else {
        var googleFormID="1BkZ-z9URb8hloY3O4ATzfqaDDoBUkn2hTH3hbtaXe2E";
        $.ajax({
          url: "https://docs.google.com/forms/d/"+googleFormID+"/formResponse",
          data: {"entry.1505027198": email.val(),
                  "entry.88640844" : name.val() },
          type: "POST",
          dataType: "xml"})
          .done(function() {
         });
         alert("Thank you for your interest. We will be in touch shortly");
         email.val("");
      }
  });
</script>
