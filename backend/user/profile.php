<?php 
    include("functions/init.php"); 
    if(!logged_in()){
        redirect("signup.php");
    }
    $anweshaid; $imgsrc;$rank = 1;$hpoint;
    if(isset($_SESSION['anweshaid'])){
        $anweshaid = $_SESSION['anweshaid'];
        $imgsrc = $_SESSION['qrcode'];
        $access_token=$_SESSION['access_token'];
	}
	$data = ca_leaderboard();
	$hpoint = $data[0]['score'];
	foreach($data as $ca){
		if($ca['anweshaid'] == $anweshaid){
			break;
		}else{
			$rank = $rank +1;
		}
	}
    $profile = user_details($anweshaid);
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Anwesha | Profile</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> -->
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel="stylesheet" href="./css/profile.css">
	<link href="./images/favicon.ico" rel="shortcut icon" type="image/x-icon">
	<link href="./images/favicon.ico" rel="apple-touch-icon">
</head>

<body>
	<!-- partial:index.partial.html -->
	<div class="card">
		<section class="card-info card-section">
			<!-- <i class="ion-navicon menu"></i> -->
			<a style="color: #fff;" href="../../ca/ca.php"><i class="ion-ios-home menu"></i></a>
			<a style="color: #fff;" href="./ca_logout.php"><i class="ion-log-out search"></i></a>
			<div class="avatar row">
			</div>

			<section class="user row">
				<h1 class="user-header">
				<?php echo $profile['first_name'] ." ". $profile['last_name'] ?>
					<h2 class="sub header">
					AnweshaID: <?php echo $anweshaid ?><br><br>
					<a href="./assets/qrcodes/<?php echo $anweshaid; ?>.png" download="<?php echo $anweshaid;?>.png" target="_blank" style="text-decoration:none;color:#fff;">
					DOWNLOAD QR CODE</a>
					</h2>
				</h1>
			</section>
			<?php if($profile['isCA']){ ?>
			<section class="statistics">
				<article class="statistic">
					<h4 class="statistic-title">
						Rank
					</h4>
					<h3 class="statistic-value">
						<?php echo $rank; ?>
					</h3>
				</article>

				<article class="statistic">
					<h4 class="statistic-title">
						Score
					</h4>
					<h3 class="statistic-value">
						<?php echo $profile['ca']['score']; ?>
					</h3>
				</article>
			</section>

			<div class="dial">
				<h2 class="dial-title">
				<?php echo $profile['ca']['score']/100; ?>
				</h2>
				<h3 class="dial-value">
					Level
				</h3>
			</div>
			<?php } ?>
		</section>
		<section class="card-details card-section">

			<nav class="menu">
				<article class="menu-item menu-item-active">
					Ranking (Top 5)
				</article>
			</nav>

			<dl class="leaderboard">
				<?php foreach($data as $ca){ ?>
				<dt>
					<article class="progress">
						<section class="progress-bar" style="width: <?php echo ($ca['score']*100)/$hpoint;?>%;"></section>
					</article>
				</dt>
				<dd>
					<div class="leaderboard-name"><?php echo $ca['first_name']." ".$ca['last_name']." : ". $ca['anweshaid']; ?></div>
					<div class="leaderboard-value"><?php echo $ca['score']; ?></div>
				</dd>
				<?php } ?>
				
				<!-- <dt>
					<article class="progress">
						<section class="progress-bar" style="width: 65%;"></section>
					</article>
				</dt>
				<dd>
					<div class="leaderboard-name">Kevin Johnson</div>
					<div class="leaderboard-value">16.354</div>
				</dd>
				<dt>
					<article class="progress">
						<section class="progress-bar" style="width: 60%;"></section>
					</article>
				</dt>
				<dd>
					<div class="leaderboard-name">Glen Howie</div>
					<div class="leaderboard-value">15.873</div>
				</dd>
				<dt>
					<article class="progress">
						<section class="progress-bar" style="width: 55%;"></section>
					</article>
				</dt>
				<dd>
					<div class="leaderboard-name">Mark Desa</div>
					<div class="leaderboard-value">12.230</div>
				</dd>
				<dt>
					<article class="progress">
						<section class="progress-bar" style="width: 35%;"></section>
					</article>
				</dt>
				<dd>
					<div class="leaderboard-name">Martin Geiger</div>
					<div class="leaderboard-value">10.235</div>
				</dd> -->
			</dl>
		</section>
	</div>
	<!-- partial -->

</body>

</html>