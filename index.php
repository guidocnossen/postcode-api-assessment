<!doctype html>
<html lang="nl">
    <head>
        <title>Postcode API</title>
        <link rel="stylesheet" href="css/main.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
        <script src="js/main.js"></script>
    </head>

    <body>
		<h1>Postcode-Api Assessment</h1>

		<div class="container api-form">

	        <form class="zipcode-form" action="" method="post">
			    <label for="email">E-mailadres</label>
			    <input type="email" name="mail" placeholder="example@email.com" required>

			    <label for="name">Voornaam</label>
			    <input type="text" name="naam" placeholder="Guido" required>

			   	<label for="lname">Achternaam</label>
			    <input type="text" name="achternaam" placeholder="Cnossen" required>
			
			    <div class="adress">
			    	<div class="adress-item">
					    <label for="zip">Postcode</label>
					    <input type="text" name="zip" placeholder="1234AB" required>
					</div>

					<div class="adress-item">
					   	<label for="number">Huisnummer</label>
					    <input type="text" name="number" placeholder="10" required>
					</div>
			   </div>

			   <div class="api-error">
			   </div>

			   <input type="submit" value="Verzenden">
	        </form>

	    </div>

	    <div class="container api-result">
	    	<h2>Bedankt uw inzending!</h2>
	    	<p id="mail"></p>
	    	<p id="name"></p>
	    	<p id="zip"></p>
	    	<p id="number"></p>
	    	<p id="address"></p>
	    </div>
    </body>

</html>