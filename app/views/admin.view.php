<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>

    <div class="container-fluid">
      <!-- This content contains title and logo for data admin.-->
      <div class="row mt-4">
        <div class="col text-center">
          <img src="public/images/gear-logo.png" alt="crystal-logo" width="100" />
          <span class="store-font align-middle">Data Admin Panel</span>
        </div>
      </div>
      <!-- End of data admin title and logo. -->
      <!-- Display of transactions and customer information content.-->
      <div class="row">
        <div class="col-lg-6 m-auto p-4">
          <div class="rounded p-4 shadow bg-white" style="overflow-x: auto">
            <ul class="nav nav-pills nav-justified gap-5 mb-4">
              <li class="nav-item">
                <button
                  class="nav-link active active-dark"
                  data-bs-toggle="pill"
                  data-bs-target="#transTable"
                >
                  View Transactions
                </button>
              </li>
              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="pill"
                  data-bs-target="#custTable"
                >
                  View Customers
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="transTable">
                <table class="table table-hover table-responsive-lg">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Customer ID</th>
                      <th scope="col">Total Price</th>
                      <th scope="col">Order Time</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($orders as $order) :?>
                    <tr>
                      <td><?= $order["id"] ?></td>
                      <td><?= $order["person_id"] ?></td>
                      <td>$<?=$order["total_price"] ?></td>
                      <td><?= $order["ordered_at"] ?></td>
                    </tr>
                    <?php endforeach ?>
                    
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade collapse" id="custTable">
                <table class="table table-hover table-responsive-lg">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Customer ID</th>
                      <th scope="col">Username</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($customers as $customer) :?>
                        <tr>
                        <td scope="col"><?= $customer["id"] ?></td>
                        <td scope="col"><?= $customer["username"] ?></td>
                        <td scope="col"><?= $customer["fname"] ?></td>
                        <td scope="col"><?= $customer["lname"] ?></td>
                        </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of transaction and customer information.-->
      <!-- Customer removal form for data admin. -->
      <div class="row">
        <div class="col-lg-6 m-auto p-4">
          <div class="rounded p-4 shadow bg-white">
            <form action="/user/remove" method="POST">
              <div class="form-floating mb-4">
                <input
                  type="text"
                  class="form-control"
                  id="cust_ID"
                  name="id"
                  placeholder="Customer ID:"
                  required
                />
                <label for="cust_ID">Customer ID:</label>
              </div>
              <div class="row">
                <div class="form-floating col-6">
                  <input
                    type="text"
                    class="form-control"
                    id="f_name"
                    placeholder="First Name:"
                    required
                  />
                  <label for="f_name" class="ps-4">First Name:</label>
                </div>
                <div class="form-floating col-6">
                  <input
                    type="text"
                    class="form-control"
                    id="l_name"
                    placeholder="Last Name:"
                    required
                  />
                  <label for="l_name" class="ps-4">Last Name:</label>
                </div>
                <div class="d-grid col-6 mt-4 m-auto">
                  <button type="submit" class="btn btn-outline-warning">
                    Remove Customer
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <!-- End of customer removal form. -->
      <!-- Log out button. -->
      <div class="row">
        <div class="col mb-3 text-center">
          <a type="button" class="btn btn-danger" href="/logout">Logout</a>
        </div>
      </div>
      <!-- End of log out button. -->
    </div>
  </body>



  <?php require 'components/flash.php' ?>
<script src="public/js/flash.js"></script>
<?php require 'partials/closing.php' ?>