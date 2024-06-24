<?php
$title = 'Admin - Profile';
$active_profile = 'active';
include_once('header.php');
?>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Admin Profile</h1>
        </div>
      </div>
      <div id="user_info">
        
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      loadProfile();

      function loadProfile() {
        var user_id = <?php echo $_SESSION['user_id']; ?>;
        console.log(user_id);
        $.ajax({
          type: 'POST',
          data: { user_id: user_id },
          dataType: 'json',
          url: 'handles/profile/read_profile.php',
          success: function(response) {
            console.log(response);
            $('#user_info').empty();
            var data = response.data[0];
            var read_profile_html = `
            <h4>Username: ${data.username}</h4>
            <h4>First Name: ${data.first_name}</h4>
            <h4>Last Name: ${data.last_name}</h4>
            <h4>Email: ${data.email}</h4>
            <h4>Contact: ${data.contact}</h4>
            `;

            $('#user_info').append(read_profile_html);
          },
          error: function(error) {
            console.error(error);
          }
        });
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
