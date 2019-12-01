<?php $messageSent = false;
?>
<div class="container">
<h1 style="text-align:center;">Prendre contact avec nous</h1>
    <form id="frm">
        <div class="form-group">
            <label for="exampleFormControlInput1">Veuillez indiquer votre nom</label>
            <input type="text" name="nom" class="form-control" placeholder="Pennywise">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Veuillez indiquer votre prénom</label>
            <input type="text" name="prenom" class="form-control" placeholder="Pennywise">
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Veuillez indiquer votre adresse mail</label>
            <input type="email" name="email" class="form-control" placeholder="Pennywise@example.com">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Entrez votre message</label>
            <textarea class="form-control" name="message" rows="3"></textarea>
        </div>
        
        <div class="form-group form-check">
            <input type="checkbox" name="rgpd" value = "rgpd" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">En cochant cette case je prends conscience que mes données personnelles ne seront ni revendues, ni utilisées à des fins commerciales</label>
        </div>
        <img id="loading" style="display:none;" src="assets/img/loader.gif"/>
        <div class="g-recaptcha" data-sitekey="6LdWZMUUAAAAAPQOLzURrmIAJZnPsFiccS5iI6WF"></div>
        
        <input class="btn btn-success float-right" type="button" value="Envoyer" id="send"/>
    </form>
        <div style="display:none;" id ="success">
            <p style="color:green;">Votre message a bien été envoyé !</p>
        </div>
    
    



</div>

<?php createSeparator(); ?>