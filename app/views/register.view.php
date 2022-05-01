<?php require 'partials/head.php' ?>
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col text-center">
          <img
            src="public/images/crystal-logo.png"
            alt="crystal-logo"
            width="100"
          />
          <span class="store-font align-middle">Krizia's Krystals</span>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 m-auto p-4">
          <div class="rounded p-4 shadow bg-white">
            <form action="#!" method="GET">
              <div class="row">
                <div class="col-6 form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="fname"
                    placeholder="First Name:"
                    required
                  />
                  <label for="fname" class="ps-4">First Name:</label>
                </div>
                <div class="col-6 form-floating">
                  <input
                    type="text"
                    class="form-control"
                    id="lname"
                    placeholder="Last Name:"
                    required
                  />
                  <label for="lname" class="ps-4">Last Name:</label>
                </div>
              </div>
              <div class="form-floating mt-4">
                <input
                  type="text"
                  class="form-control"
                  id="user"
                  placeholder="Username:"
                  required
                />
                <label for="user">Username:</label>
              </div>
              <div class="form-floating mt-4">
                <input
                  type="password"
                  class="form-control"
                  id="pass"
                  placeholder="Password"
                  required
                />
                <label for="pass">Password:</label>
              </div>
              <div class="form-floating mt-4">
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  placeholder="Email:"
                  required
                />
                <label for="email">Email:</label>
              </div>
              <div class="d-grid col-6 mt-4 m-auto">
                <button type="submit" class="btn btn-outline-success">
                  Sign Up
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
<?php require 'partials/closing.php' ?>