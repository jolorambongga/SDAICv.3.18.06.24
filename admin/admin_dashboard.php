<?php
$title = 'Admin - Dashboard';
$active_dashboard = 'active';
include_once('header.php');
?>

<style>
  /* Add this CSS to your existing stylesheet or a new stylesheet */
/* Add this CSS to your existing stylesheet or a new stylesheet */
.dashboard-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 20px;
  margin-bottom: 45px;
}

.big-box {
  background-color: #ffd95a; /* Light yellow */
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
}

.green-box {
  background-color: #c07f00; /* Dark yellow */
}

.box {
  background-color: #4c3d3d; /* Dark brown */
  padding: 20px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  color: #fff; /* Text color for contrast */
}

.pink-box {
  flex: 1;
}

.lightblue-box {
  background-color: #fff7d4; /* Light brown */
  color: #4c3d3d; /* Dark brown text */
}


</style>

<body>

  <div class="my-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-4">
          <h1>Admin Dashboard</h1>
        </div>
      </div>
    </div>
  </div>
  
  <div class="container dashboard-grid">
    <div class="big-box yellow-box">
      <!-- Placeholder content -->
      <h3>Appointment Today</h3>
      <p id="appointment_today" style="font-size: 50px; float: right;">Content for appointment today</p>
    </div>
    <div class="big-box green-box">
      <!-- Placeholder content -->
      <h3>Appointment This Week</h3>
      <p id="appointment_week" style="font-size: 50px; float: right;">Content for appointment this week</p>
    </div>
    <div class="box pink-box">
      <!-- Placeholder content -->
      <h3>Registered Users</h3>
      <p id="registered_users" style="font-size: 50px; float: right;">Info 1 details here</p>
    </div>
    <!-- <div class="box pink-box">
      <h2>Info 2</h2>
      <p>Info 2 details here</p>
    </div>
    <div class="box pink-box">
      <h2>Pie Chart</h2>
      <p>Pie chart or other content</p>
    </div>
    <div class="box lightblue-box">
      <h2>Graph 1</h2>
      <p>Graph 1 details here</p>
    </div>
    <div class="box lightblue-box">
      <h2>Graph 2</h2>
      <p>Graph 2 details here</p>
    </div> -->
  </div>

  <script>
    $(document).ready(function() {
      loadToday();
      loadWeek();
      loadRegisteredUsers();
      function loadToday() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: 'handles/appointments/read_appointments_today.php',
          success: function(response) {
            console.log(response);
            var count = response.appointment_count;
            $('#appointment_today').empty();
            $('#appointment_today').append(count);
          },
          error: function(error) {
            console.log(error);
          }
        });
      }

      function loadWeek() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: 'handles/appointments/read_appointments_week.php',
          success: function(response) {
            console.log(response);
            var count = response.appointment_count;
            $('#appointment_week').empty();
            $('#appointment_week').append(count);
          },
          error: function(error) {
            console.log(error);
          }
        });
      }

      function loadRegisteredUsers() {
        $.ajax({
          type: 'GET',
          dataType: 'JSON',
          url: 'handles/users/read_registered_users.php',
          success: function(response) {
            console.log(response);
            var count = response.user_count;
            $('#registered_users').empty();
            $('#registered_users').append(count);
          },
          error: function(error) {
            console.log(error);
          }
        });
      }
    });
  </script>

  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>
