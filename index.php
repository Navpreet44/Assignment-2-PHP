<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Subscriber Form</title>
  <!-- Replace Bootstrap CSS with Bulma CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
</head>
<body>
  <header>
    <?php include 'nav.php'; ?>
    <?php
      if (isset($_SESSION['user_name']) ){
        echo "<div class='notification is-success'>
              <button class='delete'></button>
              You have successfully logged in.
            </div>";
      }
      if (isset($_GET['logout'] )){
        echo "<div class='notification is-success'>
              <button class='delete'></button>
              You have successfully logged out.
            </div>";
      }
    ?>
  </header>

  <main>
    <form id="subscriber-form" method="POST" action="process-subscriber.php">
      <fieldset>

        <div class="field">
          <label class="label" for="fname">Name</label>
          <div class="control">
            <input class="input" type="text" id="fname" name="name" required placeholder="Enter name">
          </div>
        </div>
        <div class="field">
          <label class="label" for="mail">Email</label>
          <div class="control">
            <input class="input" type="email" id="mail" name="email" required placeholder="Your email">
          </div>
        </div>
        <div class="field">
          <label class="label" for="phone">Phone Number</label>
          <div class="control">
            <input class="input" type="tel" id="phone" name="phone" required placeholder="Your phone number">
          </div>
        </div>

        <input class="button is-primary" type="submit" name="subscribe" value="Subscribe" id="subbt">
        
        <div class="form-group submit-message">
          <?php
          require_once('database.php');
          require_once('validate.php');
          $valid = new validate();
          if (isset($_POST['subscribe'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            
            $res = $database->createSubscriber($name, $email, $phone);

            if ($res && $valid->validEmail($email) && $valid->validNumber($phone)) {
              echo "<p>Successfully subscribed</p>";
            } else {
              echo "<p>Subscription failed</p>";
            }
          }
          ?>

          <!-- JavaScript for Bulma notification close buttons -->
          <script>
            document.addEventListener('DOMContentLoaded', () => {
              const deleteButtons = document.querySelectorAll('.delete');
              deleteButtons.forEach(button => {
                button.addEventListener('click', () => {
                  const notification = button.closest('.notification');
                  if (notification) {
                    notification.style.display = 'none';
                  }
                });
              });
            });
          </script>
        </div>
      </fieldset>
    </form>
  </main>

  <footer>
    <small>Stay updated with our latest offers.</small>
  </footer>
</body>
</html>
