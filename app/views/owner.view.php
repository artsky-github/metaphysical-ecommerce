<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>



<div class="container-fluid">
      <!-- This content contains title and logo for owner.-->
      <div class="row mt-4">
        <div class="col text-center">
          <img src="public/images/crown-logo.png" alt="crystal-logo" width="100" />
          <span class="store-font align-middle">Owner Panel</span>
        </div>
      </div>
      <!-- End of owner title and logo. -->
      <!-- Display of total sales, products sold, and employees content.-->
      <div class="row">
        <div class="col-lg-6 m-auto p-4">
          <div class="rounded p-4 shadow bg-white" style="overflow-x: auto">
            <ul class="nav nav-pills nav-justified gap-5 mb-4">
              <li class="nav-item">
                <button
                  class="nav-link active"
                  data-bs-toggle="pill"
                  data-bs-target="#soldTable"
                >
                  Products Sold
                </button>
              </li>
              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="pill"
                  data-bs-target="#empTable"
                >
                  Employees
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="soldTable">
                <table class="table table-hover table-responsive-lg">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">SKU</th>
                      <th scope="col">Product Name</th>
                      <th scope="col">Category</th>
                      <th scope="col">Total Sold</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($products_sold as $product) :?>
                    <tr>
                      <td><?= $product["sku"] ?></td>
                      <td><?= $product["name"] ?></td>
                      <td><?= $product["category"] ?></td>
                      <td><?= $product["sold_count"] ?></td>
                    </tr>
                     <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="empTable">
                <table class="table table-hover table-responsive-lg">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Employee ID</th>
                      <th scope="col">Email</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Last Name</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php foreach($employees as $employee) :?>
                    <tr>
                      <td><?= $employee["person_id"] ?></td>
                      <td><?= $employee["email"] ?></td>
                      <td><?= $employee["fname"] ?></td>
                      <td><?= $employee["lname"] ?></td>
                    </tr>

                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End of total sales, products sold, and employees.-->
      <!-- Display of add and remove employee forms. -->
      <div class="row">
        <div class="col-lg-6 m-auto p-4">
          <div class="rounded p-4 shadow bg-white" style="overflow-x: auto">
            <ul class="nav nav-pills nav-justified gap-5 mb-4">
              <li class="nav-item">
                <button
                  class="nav-link active active-dark"
                  data-bs-toggle="pill"
                  data-bs-target="#addEmpForm"
                >
                  Add Employee
                </button>
              </li>
              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="pill"
                  data-bs-target="#removeEmpForm"
                >
                  Remove Employee
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Create an employee form. -->
              <div class="tab-pane fade show active" id="addEmpForm">
                <form method="post" action="/employee/add" >
                  <div class="form-floating">
                    <input
                      type="text"
                      class="form-control"
                      id="user"
                      placeholder="Username:"
                      name="username"
                      required
                    />
                    <label for="user">Username:</label>
                  </div>
                  <div class="row mt-4">
                    <div class="col-6 form-floating">
                      <input
                        type="text"
                        class="form-control"
                        id="fname"
                        name="fname"
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
                        name="lname"

                        placeholder="Last Name:"
                        required
                      />
                      <label for="lname" class="ps-4">Last Name:</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6 form-floating mt-4">
                      <input
                        type="password"
                        class="form-control"
                        id="pass"
                        name="password"
                        placeholder="Password"
                        required
                      />
                      <label for="pass" class="ps-4">Password:</label>
                    </div>
                    <div class="col-6 form-floating mt-4">
                      <input
                        type="password"
                        class="form-control"
                        id="ssn" 
                        name="ssn"
                        placeholder="SSN:"
                        required
                      />
                      <label for="pass" class="ps-4">SSN:</label>
                    </div>
                  </div>
                  <div class="row mt-4">
                    <div class="col-6">
                      <div class="input-group">
                        <input
                          type="text"
                          class="form-control py-3"
                          id="email"
                          placeholder="Email Header:"
                          step="0.01"
                          min="0"
                          name="email"
                          required
                        />
                        <span class="input-group-text" for="email"
                          >@kkrystals.com</span
                        >
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input
                          type="number"
                          class="form-control py-3"
                          id="salary"
                          placeholder="Salary"
                          step="0.01"
                          min="0"
                          name="salary"
                          required
                        />
                      </div>
                    </div>
                  </div>
                  <input type="hidden" value="true" name="employee"/>
                  <div class="d-grid col-6 mt-4 m-auto">
                    <button type="submit" class="btn btn-outline-success">
                      Create Employee
                    </button>
                  </div>
                </form>
              </div>
              <!-- End of create employee form. -->
              <!-- Remove an employee form. -->
              <div class="tab-pane fade" id="removeEmpForm">
                <form action="/employee/remove" method="POST">
                  <div class="row">
                    <div class="form-floating col-6">
                      <input
                        type="text"
                        class="form-control"
                        id="emp_id"
                        name="id"
                        placeholder="Employee ID:"
                        required
                      />
                      <label for="emp_id" class="ps-4">Employee ID:</label>
                    </div>
                    <div class="form-floating col-6">
                      <input
                        type="email"
                        class="form-control"
                        id="emp_email"
                        placeholder="Employee Email:"
                        required
                      />
                      <label for="emp_email" class="ps-4"
                        >Employee Email:</label
                      >
                    </div>
                    <input type="hidden" value="true" name="employee"/>
                    <div class="d-grid col-6 mt-4 m-auto">
                      <button type="submit" class="btn btn-outline-warning">
                        Remove Employee
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End of remove employee form. -->
            </div>
          </div>
        </div>
      </div>
      <!-- End of add and remove employee forms. -->
      <!-- Log out button. -->
      <div class="row">
        <div class="col mb-3 text-center">
          <a href="/logout" type="button" class="btn btn-danger">Logout</a>
        </div>
      </div>
      <!-- End of log out button. -->
    </div>




<?php require 'components/flash.php' ?>
<script src="public/js/flash.js"></script>
<?php require 'partials/closing.php' ?>