<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Grateful Pizza</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i|Roboto:500" rel="stylesheet">
    <!--<link rel="stylesheet" href="dist/css/style.css">-->
	<link rel="stylesheet" href="RevisedCSS.css">
	<link rel="stylesheet" href="input.css">
	<link rel="stylesheet" href="circle.css">
	<!--Favicon-->
	<link rel="icon" href="PizzaMan.jpg">
	
    <script src="https://unpkg.com/scrollreveal@4.0.0/dist/scrollreveal.min.js"></script>
	
	<script src="https://kit.fontawesome.com/faf8bc8e90.js"></script>
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap boxed-container">
        <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <h1 class="m-0">
                            <a href="#">
                                <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                    <title>Grateful Pizza</title>
                                    <defs>
                                        <linearGradient x1="100%" y1="0%" x2="0%" y2="100%" id="logo-gradient-b">
                                            <stop stop-color="#39D8C8" offset="0%"/>
                                            <stop stop-color="#BCE4F4" offset="47.211%"/>
                                            <stop stop-color="#838DEA" offset="100%"/>
                                        </linearGradient>
                                        <path d="M32 16H16v16H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v14z" id="logo-gradient-a"/>
                                        <linearGradient x1="23.065%" y1="25.446%" y2="100%" id="logo-gradient-c">
                                            <stop stop-color="#1274ED" stop-opacity="0" offset="0%"/>
                                            <stop stop-color="#1274ED" offset="100%"/>
                                        </linearGradient>
                                    </defs>
                                    <g fill="none" fill-rule="evenodd">
                                        <mask id="logo-gradient-d" fill="#fff">
                                            <use xlink:href="#logo-gradient-a"/>
                                        </mask>
                                        <use fill="url(#logo-gradient-b)" xlink:href="#logo-gradient-a"/>
                                        <path fill="url(#logo-gradient-c)" mask="url(#logo-gradient-d)" d="M-16-16h32v32h-32z"/>
                                    </g>
                                </svg>
                            </a>
                        </h1>
                    </div>
                </div>
            </div>
        </header>

        <main>
            <section class="hero text-center">
                <div class="container-sm">
                    <div class="hero-inner">
                        <img src="Final.png" alt="PizzaMan" class="Center logo">
						<!--<p class="hero-paragraph is-revealing">Bringing food to those less fortunate</p>-->
						</div>
					</div>
					<img src="arrow.png" alt="BottomArrow" class="Center arrow" onClick="document.getElementById('Scrolled').scrollIntoView();">
                </div>
            </section>

			<section class="hero text-center" id="Scrolled">
				<div class = "Center">
					<h1 class="Center text-center" style="margin-bottom:275px">- Donations -</h1>
					<div class="c100 p50 big" style="margin-left:41%;margin-bottom:-500px;margin-top:-250px">
						<span>50%</span>
						<div class="slice">
							<div class="bar"></div>
							<div class="fill"></div>
						</div>
					</div>
				</div>
				<div class="container-sm">
					
					<p class="text-center">Grateful pizza brings together the community to help those in poverty! By donating a choice amount, you work towards a common goal of purchasing a pizza for a local homeless shelter.</p>
					
					<script src="https://www.paypal.com/sdk/js?client-id=AfOjaOBCUlGZGLLLH2CgWCO1XFAOYAfcBNAu5u-F80nTrfry10XqOPn-eOOiaXhptiBrnLnDMCEecHlq"></script>
							
					<div class="money" id="input-div">
						<script>
							
							function validateFloatKeyPress(el) {
								var v = parseFloat(el.value);
								el.value = (isNaN(v)) ? '' : v.toFixed(2);
							}
							
						</script>
						
						<div class="box box-input">
							<span>I would like to donate  </span><span class="number-container"><span class="hash">$</span>
							<input class="number-input" id="paymentAmount"  pattern="^\d*(\.\d{0,2})?$"  type="number" min="1.00" step="0.50" placeholder="10.00" onClick="this.select();" onchange="validateFloatKeyPress(this);"/>
							<span>towards grateful pizza!</span>
						</div>
						
					</div>
						  
								
					<script>
					  paypal.Buttons({
						createOrder: function(data, actions) {
						  // Set up the transaction
						  var amount = document.getElementById("paymentAmount").value;
						  
						  return actions.order.create({
							purchase_units: [{
							  amount: {
								value: amount
							  }
							}]
						  });
					  },
						onApprove: function(data, actions) {
							  return actions.order.capture().then(function(details) {
								alert('Transaction completed by ' + details.payer.name.given_name);
								// Call your server to save the transaction
								return fetch('/PHP', {
								  method: 'post',
								  headers: {
									'content-type': 'application/json'
								  },
								  body: JSON.stringify({
									orderID: data.orderID
								  })
								});
							  });
							}
						  }).render('#paypal-button-container');	
					</script>
				  
				  <div id="paypal-button-container"></div>
				</div>
			</section>
			
			<section class="hero text-center payment-log white">
				<h1 class="Center">- Statistics -</h1>
				<div class="container-sm">
					<p>We are <span class="money-remaining">$<?php
					$link = mysqli_connect("localhost", "root", "PASSWORD_HERE", "payments");
	 
					// Check connection
					if($link === false){
						
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}

					// Attempt insert query execution
					$sql = "SELECT SUM(amount) FROM donations";
					$result = mysqli_query($link, $sql);
					$row = mysqli_fetch_array($result, MYSQLI_NUM);
					
					$amount = $row[0];
					$output = 15-($amount%15);
					echo $output;
					// Free resultset
					mysqli_free_result($result);
					// Close connection
					mysqli_close($link);
					
					?>
					
					</span> away from Pizza! <i class="fas fa-pizza-slice"></i></p>
					
					<table>
						<tr class="table-header">
							<th><strong>Date</th>
							<th><strong>Name</th>
							<th><strong>Amount</th>
							<th><strong>Location</th>
						</tr>
					
					<?php
					$link = mysqli_connect("localhost", "root", "PASSWORD_HERE", "payments");
					// Check connection
					if($link === false){
						
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}

					// Attempt insert query execution
					$sql = "SELECT * FROM donations ORDER BY date ASC LIMIT 10";
					$result = mysqli_query($link, $sql);
					
					
					while($row = $result->fetch_array())
					{
						$rows[] = $row;
					}
					
					foreach($rows as $row)
					{
						echo '<tr>';
						echo '	<th> '.date("m-d-Y, g:i A", strtotime($row['date'])).' </th>';
						echo '	<th> '.explode(" ", $row['name'])[0].' </th>';
						echo '	<th> '.$row['amount'].' </th>';
						echo '	<th> '.$row['country'].' </th>';
						echo '</tr>';
						
					}	
					
					 
					//Free resultset
					mysqli_free_result($result);
					 
					// Close connection
					mysqli_close($link);
					
					?>
					</table>
				</div>
				<div class="container-sm purchased-margins">
					<p>We've purchased <span class="pizzas-purchased"><?php
					$link = mysqli_connect("localhost", "root", "PASSWORD_HERE", "payments");
	 
					// Check connection
					if($link === false){
						
						die("ERROR: Could not connect. " . mysqli_connect_error());
					}

					// Attempt insert query execution
					$sql = "SELECT SUM(amount) FROM donations";
					$result = mysqli_query($link, $sql);
					$row = mysqli_fetch_array($result, MYSQLI_NUM);
					
					$amount = $row[0];
					$output = floor($amount/15);
					echo $output;
					// Free resultset
					mysqli_free_result($result);
					// Close connection
					mysqli_close($link);
					
					?>
					</span> Pizza Gift Cards! <i class="fas fa-gift"></i></p>
					<table>
						<tr class="table-header">
							<th><strong>Date</th>
							<th><strong>Shelter</th>
						</tr>
						<tr>
							<th>6/9/2019</th>
							<th>Shelters of Saratoga</th>
						</tr>
					</table>
				</div>
			</section>
			
			<section class="hero text-center payment-log">
				<h1 class="Center">- Merch -</h1>
				<div class="container Center">
					<p class="text-center">All proceeds from merch go directly towards purchasing a pizza for a local shelter.</p>
					
					<div class="text-center Center" style="margin-top:20px">
						<div class="gallery">
						  <a target="_blank" href="https://shop.spreadshirt.com/grateful-pizza/grateful+pizza-A5cfe73692051764f5ff9a1ee?productType=491&sellable=jw2YVBwvV3SnlQXpEB4w-491-7&appearance=253">
							<img src="blueshirt.webp" alt="Mug" width="600">
						  </a>
						</div>

						<div class="gallery">
						  <a target="_blank" href="https://shop.spreadshirt.com/grateful-pizza/grateful+pizza-A5cfe73692051764f5ff9a1ee?productType=460&sellable=jw2YVBwvV3SnlQXpEB4w-460-7&appearance=1">
							<img src="whiteshirt.webp" alt="Mug" width="600" >
						  </a>
						</div>
						
						<div class="gallery">
						  <a target="_blank" href="https://shop.spreadshirt.com/grateful-pizza/grateful+pizza-A5cfe73692051764f5ff9a1ee?productType=288&sellable=jw2YVBwvV3SnlQXpEB4w-288-8&appearance=99">
							<img src="pinkshirt.webp" alt="Mug Lights" width="600">
						  </a>
						</div>

						<div class="gallery">
						  <a target="_blank" href="https://shop.spreadshirt.com/grateful-pizza/grateful+pizza-A5cfe73692051764f5ff9a1ee?productType=31&sellable=jw2YVBwvV3SnlQXpEB4w-31-32&appearance=1&size=29">
							<img src="mug.webp" alt="Mug">
						  </a>
						</div>
					</div>
<!--
					<div class="text-center Center">
						<div class="gallery">
						  <a target="_blank" href="pinkshirt.png">
							<img src="pinkshirt.png" alt="Mug Lights" width="600">
						  </a>
						</div>

						<div class="gallery">
						  <a target="_blank" href="mug.png">
							<img src="mug.png" alt="Mug">
						  </a>
						</div>
					</div>
-->
				</div>
			</section>
			
            <section class="newsletter section boxed-container white body-wrap">
				<h1 class="Center text-center">- Poverty & Class -</h1>
                <div class="container-sm">
                    <div class="newsletter-inner section-inner">
                        <div class="newsletter-header text-center is-revealing">
                         <!--   <h2 class="section-title mt-0" class="Center logo">Poverty & Class</h2> -->
                            <p class="section-paragraph" class="Center logo">Exploring economic and social differences within our community</p>
                        </div>
                        <div class="footer-form newsletter-form field field-grouped is-revealing">
                        
                        </div>
                    </div>
                </div>
            </section>
        </main>

        <footer class="site-footer text-light">
            <div class="container">
                <div class="site-footer-inner">
                    <div class="brand footer-brand">
                        <a href="#">
                            <svg width="32" height="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
                                <title>Grateful Pizza</title>
                                <defs>
                                    <path d="M32 16H16v16H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h28a2 2 0 0 1 2 2v14z" id="logo-gradient-footer-a"/>
                                    <linearGradient x1="50%" y1="50%" y2="100%" id="logo-gradient-footer-b">
                                        <stop stop-color="#FFF" stop-opacity="0" offset="0%"/>
                                        <stop stop-color="#FFF" offset="100%"/>
                                    </linearGradient>
                                </defs>
                                <g fill="none" fill-rule="evenodd">
                                    <mask id="logo-gradient-footer-c" fill="#fff">
                                        <use xlink:href="#logo-gradient-footer-a"/>
                                    </mask>
                                    <use fill-opacity=".32" fill="#FFF" xlink:href="#logo-gradient-footer-a"/>
                                    <path fill="url(#logo-gradient-footer-b)" mask="url(#logo-gradient-footer-c)" d="M-16-16h32v32h-32z"/>
                                </g>
                            </svg>

                        </a>
                    </div>
                    <ul class="footer-links list-reset">
                        <li>
                            <a href="#">Contact</a>
                        </li>
                        <li>
                            <a href="#">About us</a>
                        </li>
                        <li>
                            <a href="https://shop.spreadshirt.com/grateful-pizza">Merch</a>
                        </li>
                    </ul>
                    <ul class="footer-social-links list-reset">
                        <li>
                            <a href="https://github.com/NickkTMD/GratefulPizza">
                                <span class="screen-reader-text">GitHub</span>
                                <i class="fab fa-github" style="font-size: 20px"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://shop.spreadshirt.com/grateful-pizza">
                                <span class="screen-reader-text">Merch</span>
                                <i class="fas fa-tshirt" style="font-size: 20px"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <span class="screen-reader-text">Google</span>
                                <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M7.9 7v2.4H12c-.2 1-1.2 3-4 3-2.4 0-4.3-2-4.3-4.4 0-2.4 2-4.4 4.3-4.4 1.4 0 2.3.6 2.8 1.1l1.9-1.8C11.5 1.7 9.9 1 8 1 4.1 1 1 4.1 1 8s3.1 7 7 7c4 0 6.7-2.8 6.7-6.8 0-.5 0-.8-.1-1.2H7.9z" fill="#FFFFFF"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="footer-copyright">&copy; 2019 Grateful Pizza, all rights reserved</div>
                </div>
            </div>
        </footer>
    </div>

    <script src="dist/js/main.min.js"></script>
</body>
</html>
