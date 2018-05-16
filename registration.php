#!/usr/local/php5/bin/php-cgi

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Long Beach Japanese Language School</title>
    <link href = "css/reset.css" rel="stylesheet"/>
    <link href = "css/main.css" rel="stylesheet"/>
	<link href = "css/registration.css" rel= "stylesheet"/>
     <script src="js/registration.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Libre+Baskerville|Roboto+Condensed|Roboto|Arvo" rel="stylesheet">

    <script src="js/functions.js"></script>
</head>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$validated = True;
	if(empty($_POST["first_name"])){
		$error_first_name = "First name required";
		$validated = False;
	}
	else {
		$first_name = test_input($_POST["first_name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $first_name)) {
  			$error_first_name = "Only letters allowed"; 
			$validated = False;
		}
	}

	if(empty($_POST["last_name"])){
		$error_last_name = "Last name required";
		$validated = False;
	}
	else {
		$last_name = test_input($_POST["last_name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $last_name)) {
  			$error_last_name = "Only letters allowed"; 
			$validated = False;
		}
	}

	$middle_name = test_input($_POST["middle_name"]);
	if (!preg_match("/^[a-zA-Z]*$/", $middle_name)) {
  		$error_middle_name = "Only letters allowed"; 
		$validated = False;
	}

	if(empty($_POST["gender"])){
		$error_gender = "Required";
		$validated = False;
	}
	else {
		$gender = test_input($_POST["gender"]);
	}

	if(empty($_POST["birthdate"])){
		$error_birthdate = "Required";
		$validated = False;
	}
	else {
		$birthdate = test_input($_POST["birthdate"]);
	}

	if(empty($_POST["home_address"])){
		$error_home_address = "Address required";
		$validated = False;
	}
	else {
		$home_address = test_input($_POST["home_address"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/", $home_address)) {
  			$error_home_address = "Only letters, numbers, and spaces allowed."; 
			$validated = False;
		}
	}

	if(empty($_POST["city"])){
		$error_city = "City required";
		$validated = False;
	}
	else {
		$city = test_input($_POST["city"]);
		if (!preg_match("/^[a-zA-Z ]*$/", $city)) {
  			$error_city = "Only letters and spaces allowed."; 
			$validated = False;
		}
	}
	
	if(empty($_POST["zipcode"])){
		$error_zipcode = "Zipcode required";
		$validated = False;
	}
	else {
		$zipcode = test_input($_POST["zipcode"]);
		if (!preg_match("/^[0-9]*$/", $zipcode)) {
  			$error_zipcode = "Invalid format. Only numbers allowed."; 
			$validated = False;
		}
	}

	if(empty($_POST["email"])){
		$error_email = "Email required";
		$validated = False;
	}
	else {
		$email = test_input($_POST["email"]);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error_email = "Invalid email";
			$validated = False;
		}
	}

	if(empty($_POST["primary_phone"])){
		$error_primary_phone = "Phone required";
		$validated = False;
	}
	else {
		$primary_phone= test_input($_POST["primary_phone"]);
		if (!preg_match("/^[0-9\-]*$/", $primary_phone)) {
  			$error_primary_phone = "Invalid phone format"; 
			$validated = False;
		}
	}


	if(empty($_POST["contact_first_name"])){
		$error_contact_first_name = "First name required";
		$validated = False;
	}
	else {
		$contact_first_name = test_input($_POST["contact_first_name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $contact_first_name)) {
  			$error_contact_first_name = "Only letters allowed"; 
			$validated = False;
		}
	}

	if(empty($_POST["contact_last_name"])){
		$error_contact_last_name = "Last name required";
		$validated = False;
	}
	else {
		$contact_last_name = test_input($_POST["contact_last_name"]);
		if (!preg_match("/^[a-zA-Z]*$/", $contact_last_name)) {
  			$error_contact_last_name = "Only letters allowed"; 
			$validated = False;
		}
	}

	$contact_middle_name = test_input($_POST["contact_middle_name"]);
	if (!preg_match("/^[a-zA-Z]*$/", $contact_middle_name)) {
  		$error_contact_middle_name = "Only letters allowed"; 
		$validated = False;
	}

	if(empty($_POST["contact_phone"])){
		$error_contact_phone = "Phone required";
		$validated = False;
	}
	else {
		$contact_phone = test_input($_POST["contact_phone"]);
		if (!preg_match("/^[0-9\-]*$/", $contact_phone)) {
  			$error_contact_phone = "Invalid phone format"; 
			$validated = False;
		}
	}

	if(empty($_POST["contact_relation"])){
		$error_contact_relation = "Contact relation required";
		$validated = False;
	}
	else {
		$contact_relation = test_input($_POST["contact_relation"]);
		if (!preg_match("/^[a-zA-Z0-9 ]*$/", $contact_relation)) {
  			$error_contact_relation = "Only letters, numbers and spaces allowed"; 
			$validated = False;
		}
	}


	$general_school_name = test_input($_POST["general_school_name"]);
	if (!preg_match("/^[a-zA-Z ]*$/", $general_school_name)) {
  		$error_general_school_name = "Only letters and spaces allowed"; 
		$validated = False;
	}

	if(empty($_POST["education"])){
		$error_education = "Required";
		$validated = False;
	}
	else {
		$education = test_input($_POST["education"]);
	}

	$education_duration = test_input($_POST["education_duration"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/", $education_duration)) {
  		$error_education_duration = "Only letters, numbers, and spaces allowed"; 
		$validated = False;
	}
	
	$japanese_school_name = test_input($_POST["japanese_school_name"]);
	if (!preg_match("/^[a-zA-Z ]*$/", $japanese_school_name)) {
  		$error_japanese_school_name = "Only letters and spaces allowed"; 
		$validated = False;
	}

	$education_time = test_input($_POST["education_time"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/", $education_time)) {
  		$error_education_time = "Only letters, numbers, and spaces allowed"; 
		$validated = False;
	}

	$reference = test_input($_POST["reference"]);
	if (!preg_match("/^[a-zA-Z ]*$/", $reference)) {
  		$error_reference = "Only letters and spaces allowed"; 
		$validated = False;
	}

	$objective = test_input($_POST["objective"]);
	if (!preg_match("/^[a-zA-Z ]*$/", $objective)) {
  		$error_objective = "Only letters and spaces allowed"; 
		$validated = False;
	}

	$medication_allergy = test_input($_POST["medication_allergy"]);

	$medication_allergy_list = test_input($_POST["medication_allergy_list"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/", $medication_allergy_list)) {
  		$medication_allergy_list = "Only letters, numbers, and spaces allowed"; 
		$validated = False;
	}

	$food_allergy = test_input($_POST["food_allergy"]);

	$food_allergy_list = test_input($_POST["food_allergy_list"]);
	if (!preg_match("/^[a-zA-Z0-9 ]*$/", $food_allergy_list)) {
  		$food_allergy_list = "Only letters, numbers, and spaces allowed"; 
		$validated = False;
	}

	if(empty($_POST["model_release"])){
		$error_model_release = "Required";
		$validated = False;
	}
	else {
		$model_release = test_input($_POST["model_release"]);
	}

	$first_name = $_POST["first_name"];
	$last_name = $_POST["last_name"];
	$middle_name = $_POST["middle_name"];
	$gender = $_POST["gender"];
	$birthdate = $_POST["birthdate"];
	$home_address = $_POST["home_address"];
	$city = $_POST["city"];
	$zipcode = $_POST["zipcode"];
	$email = $_POST["email"];
	$primary_phone = $_POST["primary_phone"];

	$contact_first_name = $_POST["contact_first_name"];
	$contact_last_name = $_POST["contact_last_name"];
	$contact_middle_name = $_POST["contact_middle_name"];
	$contact_phone = $_POST["contact_phone"];
	$contact_relation = $_POST["contact_relation"];

	$general_school_name = $_POST["general_school_name"];
	$education = $_POST["education"];
	$education_duration = $_POST["education_duration"];
	$japanese_school_name = $_POST["japanese_school_name"];
	$education_time = $_POST["education_time"];
	$reference = $_POST["reference"];
	$objective = $_POST["objective"];

	$minor_registration = $_POST["minor_registration"];
	$medication_allergy = $_POST["medication_allergy"];
	$medication_allergy_list = $_POST["medication_allergy_list"];
	$food_allergy = $_POST["food_allergy"];
	$food_allergy_list = $_POST["food_allergy_list"];

	$model_release = $_POST["model_release"];
	
	if($validated == "True")
	{
		header("Location: homepage.html");
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<body>
<header>
    <p id="studentproject">Student Project - Not a commercial site</p>
    <h1><a href="homepage.html">Long Beach Japanese Language School</a></h1>
    <p id="lowertext"> "Serving the Greater Long Beach-Los Angeles Area for over 60 years"</p>
    <nav id="navigation">
        <table>
        <tr>
            <td><a href="about.html">About Us</a></td>
            <td><a href="schedule.html">Class Schedule</a></td>
            <td><a href="divisions.html">Divisions</a></td>
            <td><a href="registration.php">Registration</a></td>
        </tr>
        </table>
    </nav>
</header>
<main>
    <div id="about">
    <form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	<h1> Registration </h1>
	<fieldset class="form_panel">
		<legend class="form_heading">Student Information </legend>
		<div class="form_row">
			<div class="form_label">
				<label for="first_name">First Name</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="first_name" id="first_name" value="<?php echo $first_name; ?>" required="true"/>
			<span class="form_error"><?php echo $error_first_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="last_name">Last Name</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="last_name" id="last_name" value="<?php echo $last_name; ?>" required="true"/>
			<span class="form_error"><?php echo $error_last_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="middle_name">Middle Name</label>
			</div>
			<input class="form_field" type="text" name="middle_name" id="middle_name" value="<?php echo $middle_name; ?>"/>
			<span class="form_error"><?php echo $error_middle_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="birthdate">Date of Birth</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="date" name="birthdate" id="birthdate" value="<?php echo $birthdate; ?>"/>
			<span class="form_error"><?php echo $error_birthdate; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="gender">Gender: </label>
				<span style="color:red;">*</span>
			</div>
			<div class="form_field">
        			<input type="radio" name="gender" value="female">Female
				<input type="radio" name="gender" value="male">Male
			</div>
			<span class="form_error"><?php echo $error_gender; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="home_address">Home address</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="home_address" id="home_address" value="<?php echo $home_address; ?>"/>
			<span class="form_error"><?php echo $error_home_address; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="city">City</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="city" id="city" value="<?php echo $city; ?>"/>
			<span class="form_error"><?php echo $error_city; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="zipcode">Zipcode</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="zipcode" id="zipcode" value="<?php echo $zipcode; ?>"/>
			<span class="form_error"><?php echo $error_zipcode; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="email">Email Address</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="email" name="email" id="email" value="<?php echo $email; ?>"/>
			<span class="form_error"><?php echo $error_email; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="primary_phone">Phone Number</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="primary_phone" id="primary_phone" value="<?php echo $primary_phone; ?>"/>
			<span class="form_error"><?php echo $error_primary_phone; ?> </span>
		</div>
	</fieldset>
	<fieldset class="form_panel">
		<legend class="form_heading">Emergency Contact Information</legend>
		<div class="form_row">
			<div class="form_label">
				<label for="contact_first_name">First Name</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="contact_first_name" id="contact_first_name" value="<?php echo $contact_first_name; ?>" required="true"/>
			<span class="form_error"><?php echo $error_contact_first_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="contact_last_name">Last Name</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="contact_last_name" id="contact_last_name" value="<?php echo $contact_last_name; ?>" required="true"/>
			<span class="form_error"><?php echo $error_contact_last_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="contact_middle_name">Middle Name</label>
            		</div>
			<input class="form_field" type="text" name="contact_middle_name" id="contact_middle_name" value="<?php echo $contact_middle_name; ?>"/>
			<span class="form_error"><?php echo $error_contact_middle_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="contact_phone">Phone Number</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="contact_phone" id="contact_phone" required="true" value="<?php echo $contact_phone; ?>"/>
			<span class="form_error"><?php echo $error_contact_phone; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="contact_relation">Relation to Student</label>
				<span style="color:red;">*</span>
			</div>
			<input class="form_field field_required" type="text" name="contact_relation" id="contact_relation" required="true" value="<?php echo $contact_relation; ?>"/>
			<span class="form_error"><?php echo $error_contact_relation; ?> </span>
		</div>
	</fieldset>
	
	<fieldset class="form_panel">
		<legend class="form_heading">Student Background</legend>
		<div class="form_row">
			<div class="form_label">
				<label for="general_school_name">Name of High School/College</label>
			</div>
			<input class="form_field" type="text" name="general_school_name" id="general_school_name" value="<?php echo $general_school_name; ?>"/>
			<span class="form_error"><?php echo $error_general_school_name; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="education">Have you studied Japanese?</label>
				<span style="color:red;">*</span>
			</div>
			<div class="form_field">
				<input type="radio" name="education" value="yes" onclick="alertExperienceCheck()">Yes
				<input type="radio" name="education" value="no" onclick="alertExperienceCheck()">No
			</div>
			<span class="form_error"><?php echo $error_education; ?> </span>
		</div>
		<div class="form_row education_only">
			<div class="form_label">
				<label for="education_duration">How long?</label>
			</div>
			<input class="form_field" type="text" name="education_duration" id="education_duration"/>
			<span class="form_error"><?php echo $error_education_duration; ?> </span>
		</div>
		<div class="form_row education_only">
			<div class="form_label">
				<label for="japanese_school_name">Name of School</label>
			</div>
			<input class="form_field" type="text" name="japanese_school_name" id="japanese_school_name" />
			<span class="form_error"><?php echo $error_japanese_school_name; ?> </span>
		</div>
		<div class="form_row education_only">
			<div class="form_label">
				<label for="education_time">When?</label>
			</div>
			<input class="form_field" type="text" name="education_time" id="education_time"/>
			<span class="form_error"><?php echo $error_education_time; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="reference">How did you hear about us?</label>
			</div>
			<input class="form_field" type="text" name="reference" id="reference" value="<?php echo $reference; ?>"/>
			<span class="form_error"><?php echo $error_reference; ?> </span>
		</div>
		<div class="form_row">
			<div class="form_label">
				<label for="objective">Your objective, goal, expectation to study Japanese language?</label>
			</div>
			<input class="form_field" type="text" name="objective" id="objective" value="<?php echo $objective; ?>"/>
			<span class="form_error"><?php echo $error_objective; ?> </span>
		</div>
	</fieldset>
		
	<fieldset class="form_panel">
		<legend class="form_heading">Emergency Treatment Consent (for students under 18)</legend>
		<div class="form_minor_check">
			<input type="checkbox" id="minor_registration" name="minor_registration" value="minor_registration" onchange="alertMinorCheck(this)">
			<label for="minor_registration"> The person registering is a minor </label>
		</div>
		<p class="consent_statement minor_only">
			<br>
			AS THE PARENT OR AUTHORIZED REPRESENTATIVE, I HEREBY GIVE CONSENT TO LBJLS TO 
			OBTAIN ALL EMERGENCY MEDICAL OR DENTAL CARE PRESCRIBED BY A DULY LICENSED 
			PHYSICIAN (M.D.),  DENTIST (D.D.S.) OR QUALIFIED MEDICAL PERSONNEL. FOR .  THIS 
			CARE MAY BE GIVEN UNDER WHATEVER CONDITIONS ARE NECESSARY TO PRESERVE THE LIFE, 
			LIMB OR WELL BEING OF THE CHILD NAMED ABOVE.
		</p>
		<br>
		<div class="form_row minor_only" disabled="true">
			<div class="form_label">
				<label for="medication_allergy">Does your child have any medication allergies?</label>
			</div>
			<div class="form_field">
				<input type="radio" name="medication_allergy" value="yes">Yes
				<input type="radio" name="medication_allergy" value="no">No
			</div>
			<span class="form_error"><?php echo $error_medication_allergy; ?> </span>
		</div>
		<div class="form_row minor_only">
			<div class="form_label">
				<label for="medication_allergy_list">List medication allergies (if any)</label>
			</div>
			<input class="form_field" type="text" name="medication_allergy_list" id="medication_allergy_list"/>
			<span class="form_error"><?php echo $error_medication_allergy_list; ?> </span>
		</div>
		<div class="form_row minor_only">
			<div class="form_label">
				<label for="food_allergy">Does your child have any food allergies?</label>
			</div>
			<div class="form_field">
				<input type="radio" name="food_allergy" value="yes">Yes
				<input type="radio" name="food_allergy" value="no">No
			</div>
			<span class="form_error"><?php echo $error_food_allergy; ?> </span>
		</div>
		<div class="form_row minor_only">
			<div class="form_label">
				<label for="food_allergy_list">List food allergies (if any)</label>
			</div>
			<input class="form_field" type="text" name="food_allergy_list" id="food_allergy_list"/>
			<span class="form_error"><?php echo $error_food_allergy_list; ?> </span>
		</div>
	</fieldset>
	<div class="form model_release_check">
			<input type="checkbox" id="model_release" name="model_release" value="model_release">
			<label for="minor_registration"> 
				I hereby grant and assign Long Beach Japanese Language School and its 
				legal representatives the unrestricted right to use and publish for editorial, trade, advertising or 
				any other purpose and in any manner and medium, including website and internet promotion, all photographic, 
				video, and digital images involving the Minor Child and/or Adult designated above. These pictures are, 
				usually obtained during our schools participation at the Long Beach Japanese Cultural Center Festival in 
				June, the summer program in July and August, the international Food Fair during Labor Day weekend, normal 
				classroom time and other like events and activities held on campus. By signing this,  I hereby Long Beach 
				Japanese Language School, and its representatives from all claims and liability relating to said photographs, 
				video, and digital images.
			</label> 
			<span style="color:red;">*<?php echo $error_model_release; ?></span>
		</div>
		<input type="submit" name="submit" value="Submit"> <button type="reset" value="reset">Reset</button>
	</form>
    </div>
</main>
<footer id="contactinfo">
    <table>
    <tr>
        <td colspan="2">
            <h3 class="sub">Contact Us:</h3>
        </td>
    </tr>
    <tr>
        <td rowspan="2">
            <p>Address:</p>
            <p class="sub">Long Beach Japanese Language School</p>
            <p class="sub">1766 Seabright Avenue</p>
            <p class="sub">Long Beach, CA 90813</p>
        </td>
        <td>
            <p>Telephone:</p>
            <p class="sub">(562) 598-4539</p>
        </td>
    </tr>
    <tr>
        <td>
            <p>Email:</p>
            <p class="sub"><a href="mailto:info@lbjls.org">info@lbjls.org</a></p>
        </td>
    </tr>
    </table>
</footer>
<footer id="created">
    <div><p>Contact Information:</p>
    <p>Kevin Kobata: <a href="mailto:kobatakevin@gmail.com">kobatakevin@gmail.com</a></p>
    <p>Anthony Lopez: <a href="mailto:alopezz217@gmail.com">alopezz217@gmail.com</a></p>
    <p>Austin Cheng: <a href="mailto:austinjcheng@gmail.com">austinjcheng@gmail.com</a></p>
    <p>Justin Le: <a href="mailto:Justin.Le825@gmail.com">Justin.Le825@gmail.com</a></p>
    <br>
    <p>Latest Update: <!--#echo var="LAST_MODIFIED"--></p>
    </div>
</footer>
</body>
</html>