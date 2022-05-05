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
            <form action="login" method="POST">
              <div class="form-floating">
                <input
                  type="text"
                  class="form-control"
                  id="user"
                  name="username"
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
                  name="password"
                  placeholder="Password:"
                  required
                />
                <label for="pass">Password:</label>
              </div>
              <div class="d-grid col-6 mt-4 m-auto">
                <button type="submit" class="btn btn-outline-dark">
                  Log In
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col text-end my-auto">
          <span>Not a member?</span>
        </div>
        <div class="col">
          <a type="button" class="btn btn-danger" href="register">Register</a>
        </div>
      </div>
    </div>
<?php require 'partials/closing.php' ?>