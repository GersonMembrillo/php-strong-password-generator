<?php

// Descrizione
// Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.
// L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

// Milestone 1
// Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
// Scriviamo tutto (logica e layout) in un unico file index.php

// Milestone 2
// Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

// Milestone 3 (BONUS)
// Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

include __DIR__ . '/functions.php';

if (isset($_GET['length'])) {
	// echo $_GET['length'];
	$passwordLength = $_GET['length'];
	$response = generatePassword($passwordLength);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous" />
	<link rel="stylesheet" href="./css/style.css" />
	<title>Password Generator</title>
</head>

<body class="bg-primary">

	<div class="container mb-3 pt-3">
		<div class="row justify-content-center">
			<div class="col-12 text-center">
				<h1 class="text-white-50">Password Generator</h1>
				<h2 class="text-white">Generatore di password sicure</h2>
			</div>

			<?php if (isset($response)) { ?>
				<div class="col-7">
					<div class="alert alert-info" role="alert">
						<?php echo $response; ?>
					</div>
				</div>
			<?php } ?>

			<div class="col-7">
				<form class="p-3 border border-1 rounded-2 bg-light" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET">
					<div class="text-center mb-3">
						<label for="length" class="col-sm-7 col-form-label">Lunghezza della password</label>
						<div class="row d-flex justify-content-center">
							<div class="col-sm-3">
								<input type="number" name="length" id="length" class="form-control">
							</div>
						</div>
					</div>
					<div class="mb-3 text-center">
						<button type="submit" class="btn btn-primary">Invia</button>
						<button type="reset" class="btn btn-secondary">Annulla</button>
					</div>
				</form>
			</div>
		</div>

	</div>

	<script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
	<script type="text/javascript" src="./js/script.js"></script>
	<script type="text/javascript" src="./js/utility.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>

</html>