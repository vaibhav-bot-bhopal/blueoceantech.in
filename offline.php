<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Basic -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- Favicon -->
	<link rel="shortcut icon" href='img/logo/favicon.png' type="image/x-icon" />
	<link rel="apple-touch-icon" href='img/logo/favicon.png'>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, shrink-to-fit=no">

	<link rel="stylesheet" href='assets/css/bootstrap.min.css'>
	<title>Network Offline</title>

	<style>
		.card {
		  box-shadow: 0 10px 20px rgba(0,0,0,0.15), 0 6px 6px rgba(0,0,0,0.15);
		}
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	  <a class="navbar-brand" href="#">
	  	<img src="img/mylogo.png" alt="Logo" class="img-fluid" width="250" height="150">
	  </a>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-12 min-vh-100 d-flex align-items-center">
				<div class="card bg-light rounded-0 mx-auto" style="max-width: 30rem;">
				  <div class="card-header pl-3 pr-3 pt-2 pb-2">
				  	<h5 class="my-auto">
				  		<svg viewBox="0 0 24 24" fill="" width="30"><path d="M19.35 10.04A7.49 7.49 0 0012 4c-1.48 0-2.85.43-4.01 1.17l1.46 1.46a5.497 5.497 0 018.05 4.87v.5H19c1.66 0 3 1.34 3 3 0 1.13-.64 2.11-1.56 2.62l1.45 1.45C23.16 18.16 24 16.68 24 15c0-2.64-2.05-4.78-4.65-4.96zM3 5.27l2.75 2.74C2.56 8.15 0 10.77 0 14c0 3.31 2.69 6 6 6h11.73l2 2L21 20.73 4.27 4 3 5.27zM7.73 10l8 8H6c-2.21 0-4-1.79-4-4s1.79-4 4-4h1.73z" fill="#909090"></path></svg>
				  		You're Offline
				  	</h5>
				  </div>
				  <div class="card-body pl-3 pr-3 pt-4 pb-4">
				    <p class="card-text">Please refresh this page after re-connecting to the internet.</p>
				    <button type="button" class="btn btn-danger pl-5 pr-5 mt-2">Retry</button>
				  </div>
				</div>
			</div>
		</div>
	</div>

	<!-- Inline the page's JavaScript file. -->
    <script>
      document.querySelector('button').addEventListener('click', () => {
        window.location.reload();
      });
    
      // Listen to changes in the network state, reload when online.
      // This handles the case when the device is completely offline.
      window.addEventListener('online', () => {
        window.location.reload();
      });

      // Check if the server is responding & reload the page if it is.
      // This handles the case when the device is online, but the server
      // is offline or misbehaving.
      async function checkNetworkAndReload() {
        try {
          const response = await fetch('.');
          // Verify we get a valid response from the server
          if (response.status >= 200 && response.status < 500) {
            window.location.reload();
            return;
          }
        } catch {
          // Unable to connect to the server, ignore.
        }
        window.setTimeout(checkNetworkAndReload, 2500);
      }

      checkNetworkAndReload();

    </script>
</body>
</html>