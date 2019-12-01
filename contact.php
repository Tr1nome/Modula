<?php
session_name("ClubStephenKing");
    session_start();
    $page = "contact";
    require "./requires/functions.php";
    include "./includes/head.php";
    createHeader($page);
    createContent($page);
    include "./includes/footer.php";?>
    <script>
  function checkform() {
    var f = document.forms["frm"].elements;
    var cansubmit = true;

    for (var i = 0; i < f.length - 1; i++) {
      if (f[i].value.length == 0) cansubmit = false;
    }

    document.getElementById('send').disabled = !cansubmit;
  }
  $(document).ready(function() {
    setInterval(()=> {
      checkform();
    }, 100);

    console.log("test");
    $("#send").click(function() {
      console.log("click");
      $.ajax({
        url: "sendmail.php",
        type: "post",
        data: $("#frm").serialize(),
        success: function(d) {
          $("#loading").show();
          setTimeout(()=>{
            $("#loading").hide();
            $("#success").show();
            $("#frm")[0].reset();
          },1000);
          
        },
        error: function(e) {
          alert(e);
        }
      });
    });
  });
</script>