
<?php
	global $response;
  $response = '';

  function gen_response($type, $uzi){
    if($type == 'success') {
      return $response = '<div id="contacresponse" class="contact-response"><p class="success">'.$uzi.'</p></div>';
    } else {
      return $response = '<div id="contacresponse" class="contact-response"><p class="error">'.$uzi.'</p></div>';
    }
  }
  $not_human       = 'Authentication failed';
  $missing_content = 'Missing fields are required';
  $email_invalid   = 'Invalid e-mail address';
  $message_unsent  = 'Error message';
  $message_sent    = '<strong>Köszönjük.</strong><br>Munkatársunk hamarosan jelentkezik.';
  $contact_name = isset($_POST['contact_name'])?$_POST['contact_name']:'';
  $contact_email = isset($_POST['contact_email'])?$_POST['contact_email']:'';
  $contact_tel = isset($_POST['contact_tel'])?$_POST['contact_tel']:'';
  $contact_message = isset($_POST['contact_message'])?$_POST['contact_message']:'';
  $contact_human = isset($_POST['contact_human'])?$_POST['contact_human']:'';
  //$to = 'szabogabor@hydrogene.hu';
  $to=get_post_meta( $post->ID, '_addr_email', true );
  $subject = "Webes jelentkezes - ".get_bloginfo('name');
  
  $headers = "From: " . strip_tags($contact_email) . "\r\n";
  $headers .= "Reply-To: ". strip_tags($contact_email) . "\r\n";
  $headers .= "CC: szabogabi@gmail.com\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
  
if(!$contact_human == 0){
    if($contact_human != 2) gen_response('error', $not_human);
    else {
      
      //validate email
      if(!filter_var($contact_email, FILTER_VALIDATE_EMAIL))
        $response = gen_response('error', $email_invalid);
      else 
      {
        if(empty($contact_name) || empty($contact_message) || empty($contact_tel)){
          $response = gen_response('error', $missing_content);
        }
        else //ready to go!
        {
          $contact_message='Név: '.$contact_name.'<br/>'.'Tel: '.$contact_tel.'<br />'.'Üzenet: <br />'.$contact_message.'<br>---<br>'.$message_sent;
          $sent = wp_mail($to, $subject, $contact_message, $headers);
            if($sent) {
              $sent = wp_mail($contact_email, $subject, $contact_message, $headers);
              $response = gen_response('success', $message_sent);
            } else {
                $response = gen_response('error', $message_unsent);
              }
        }
      }
    }
  } 
  else 
    if (isset($_POST['submitted']) && $_POST['submitted']) { $response = gen_response('error', $missing_content);}
?>

<h4 class="side__intezmeny"><?php the_title(); ?></h4>
<h3 class="side__title">Jelentkezés vizsgálatra</h3>
<p class="side__discl">
Adja meg elérhetőségeit, kollégánk felveszi Önnel a kapcsolatot. Vagy hívja közvetlenül a
  <?php foreach ( (array) get_post_meta( $post->ID, '_addr_telefon', true ) as $key => $telszam ) {  ?>
    <?php if ($key>0) {echo ', ';} ?><a href="tel:<?php echo $telszam; ?>"><?php echo $telszam; ?></a><?php } ?> telefonszámot.
</p>

		<div class="contactformwrap" aria-labelledby="contactformwrap">
			<form id="contactform" class="contactform" action="<?php the_permalink(); ?>#contacresponse" method="post">
				
				<div class="formitem">
					<label for="contact_name">Név*</label>
					<input type="text" name="contact_name" id="contact_name" required placeholder="Adja meg nevét*">
				</div>

				<div class="formitem">
					<label for="contact_email">Email*</label>
					<input type="email" name="contact_email" id="contact_email" required placeholder="E-mail címét*">
				</div>

				<div class="formitem">
					<label for="contact_tel">Telefon*</label>
					<input type="text" name="contact_tel" id="contact_tel" placeholder="Telefonszámát*">
				</div>

				<div class="formitem">
					<label for="contact_message">Kérdése van? Itt felteheti &hellip;</label>
					<textarea name="contact_message" id="contact_message" placeholder="Kérdése van? Itt felteheti &hellip;"></textarea>
				</div>
				<div class="formitem formitem--actions">
				  <input type="hidden" name="contact_human" value="2">
        	<input type="hidden" name="submitted" value="1">
					<input id="submitform" type="submit" class="btn btn--submit" value="Jelentkezés elküldése">
				</div>
			</form>
		</div>