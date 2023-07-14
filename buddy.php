<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>StudyBuddy | Buddy Page</title>
    <link rel="shortcut icon" type="icon" href="img">
	<link rel="icon" type="image/x-icon" href="css/img/StudyBuddy.ico">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/buddy.css">
  	<script src="https://kit.fontawesome.com/8ef5e4d9da.js"></script>
  	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body onload="Online()">
<?php
	include 'nav.php';
?>
	<section>
		<div class="groupCol">

		</div>
		<div class="messageCol">
			<h1>Group Name</h1>
			<div id="messages"></div>

			<div id="sendMsg">
				<input type="text" id="msgTxt" placeholder="Send message...">
				<input type="submit" id="msgBtn" value="Send" onclick="module.sendMsg()" style="display:none">
				<i class="fa-solid fa-share-from-square" id="msgIcon" for="msgBtn" onclick="clickSend_B()"></i>
			</div>
		</div>
		<div class="profileCol">
			<div class="profileWrapper">
			<?php
				$sql = "SELECT * FROM `account`";
	
				$result = mysqli_query($conn, $sql);
	
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						$username = $row['username'];
						$image = $row['profile'];
	
						echo '
						<div class="profileCon">
							<img src="documents/profile/'.$image.'" class="productImage">
							<label id="profileName">'.$username.'</label>
						</div>';
					}
				}
			?>
			</div>
		</div>
	</section>


	<script src="js/buddy.js"></script>
	<script src="js/main.js"></script>
	<script>
		module = {};
	</script>
	<script type="module">
	
	import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-app.js";
	import { getDatabase, ref, set, remove, onChildAdded, onChildRemoved } from "https://www.gstatic.com/firebasejs/9.22.0/firebase-database.js";
	
	const firebaseConfig = {
		apiKey: "AIzaSyANyCnSqg_b22wKuv-8DfoztKr2yrfAq34",
		authDomain: "studybuddy-acc91.firebaseapp.com",
		databaseURL: "https://studybuddy-acc91-default-rtdb.asia-southeast1.firebasedatabase.app",
		projectId: "studybuddy-acc91",
		storageBucket: "studybuddy-acc91.appspot.com",
		messagingSenderId: "933625820871",
		appId: "1:933625820871:web:6cd398be13a9f93d64b0e2",
		measurementId: "G-4J3BT5636J"
	};

	// Initialize Firebase
	const app = initializeApp(firebaseConfig);
	const db = getDatabase(app);

	var msgTxt = document.getElementById("msgTxt");
	var sender;

	if(localStorage.getItem("userOnline")){
		sender = localStorage.getItem("userOnline");
	} else {
		alert("You need to be logged in to access Buddy Chat");
		location.href = "login.php";
	}

	module.sendMsg = function sendMsg(){
		var msg = msgTxt.value;
		var timestamp = new Date().getTime();
		set(ref(db,"messages/"+timestamp),{
			msg: msg,
			sender: sender
		})
	}

	onChildAdded(ref(db,"messages"), (data)=>{
		if(data.val().sender == sender){
			messages.innerHTML += "<div style=justify-content:end id=outer class="+data.key+"><div id=inner class=me>"+data.val().msg+"<button id='dltMsg' onclick='module.dltMsg("+data.key+")' style=display:none></button><i class='fa-solid fa-trash-can' onclick='clickRemove_B()' style=display:none></i></div></div>"
		} else {
			messages.innerHTML += "<div id=outer class="+data.key+"><div id=inner class=notMe>"+data.val().sender+" : "+data.val().msg+"</div></div>"
		}
	})

	module.dltMsg = function dltMsg(key){
		remove(ref(db,"messages/"+key));
	}

	onChildRemoved(ref(db,"messages"), (data)=>{
		var msgBox = document.getElementById("."+data.key);
		messages.removeChild(msgBox);
	})
</script>
</body>
</html>