<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>



<div class="container-fluid">
      <!-- This content contains the logo and title for employee. -->
      <div class="row mt-4">
        <div class="col text-center">
          <img src="public/images/task-logo.png" alt="crystal-logo" width="100" />
          <span class="store-font align-middle">Employee Panel</span>
        </div>
      </div>
      <!-- End of Employee logo and title. -->
      <!-- Display table for products for employee. -->
      <div class="row">
        <div class="col-lg-6 m-auto p-4">
          <div class="rounded p-4 shadow bg-white" style="overflow-x: auto">
            <table class="table table-hover table-responsive-lg">
              <thead class="table-dark">
                <tr>
                  <th scope="col">SKU</th>
                  <th scope="col">Name</th>
                  <th scope="col">Description</th>
                  <th scope="col">Category</th>
                  <th scope="col">Price</th>
                  <th scope="col">Quantity</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($products as $product) :?>

                <tr>
                  <td><?= $product["sku"] ?></td>
                  <td><?= $product["name"] ?></td>
                  <td>
                  <?= $product["description"] ?>
                  </td>
                  <td><?= $product["category"] ?></td>
                  <td>$<?= $product["price"]?></td>
                  <td><?= $product["total_quantity"] ?></td>
                </tr>
            
                <?php endforeach ?>

                <!-- PHP CONTENT SHOULD GOES HERE -->
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- End of display of products for employee. -->
      <!-- Add, Update, Delete Products Forms. -->
      <div class="row">
        <div class="col-lg-6 m-auto p-4">
          <div class="rounded p-4 shadow bg-white">
            <ul class="nav nav-pills nav-justified gap-5 mb-4">
              <li class="nav-item">
                <button
                  class="nav-link active active-dark"
                  data-bs-toggle="pill"
                  data-bs-target="#addForm"
                >
                  Add
                </button>
              </li>
              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="pill"
                  data-bs-target="#updateForm"
                >
                  Update
                </button>
              </li>
              <li class="nav-item">
                <button
                  class="nav-link"
                  data-bs-toggle="pill"
                  data-bs-target="#removeForm"
                >
                  Delete
                </button>
              </li>
            </ul>
            <div class="tab-content">
              <!-- Add new product form for employee. -->
              <div class="tab-pane fade show active" id="addForm">
                <form action="/product/add" method="POST">
                  <div class="row">
                    <div class="form-floating col-6">
                      <input
                        type="text"
                        class="form-control"
                        id="p_name"
                        name="name"
                        placeholder="Product Name:"
                        required
                      />
                      <label for="p_name" class="ps-4">Product Name:</label>
                    </div>
                    <div class="col-6">
                      <select class="form-select py-3" id="category" name="category">
                        <option selected disabled>Category:</option>
                        <option value="crystal">Crystals</option>
                        <option value="book">Books</option>
                        <option value="tarot">Tarot Cards</option>
                        <option value="incense">Incense</option>
                        <option value="jewerly">Jewerly</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-floating mt-4">
                    <textarea
                      class="form-control"
                      id="p_desc"
                      placeholder="Product Description:"
                      style="height: 130px; resize: none"
                      name="description"
                    ></textarea>
                    <label for="p_desc">Product Description:</label>
                  </div>
                  <div class="row mt-4">
                    <div class="col-6">
                      <div class="input-group">
                        <span class="input-group-text">$</span>
                        <input
                          type="number"
                          class="form-control py-3"
                          id="price"
                          placeholder="Price"
                          step="0.01"
                          min="0"
                          required
                          name="price"
                        />
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <span class="input-group-text">#</span>
                        <input
                          type="number"
                          class="form-control py-3"
                          id="quantity"
                          placeholder="Quantity"
                          min="0"
                          required
                          name="total_quantity"
                        />
                      </div>
                    </div>
                  </div>
                  <div class="d-grid col-6 mt-4 m-auto">
                    <button type="submit" class="btn btn-outline-dark">
                      Submit Product
                    </button>
                  </div>
                </form>
              </div>
              <!-- End of add new form for employee. -->
              <!-- Update product quantity form for employee. -->
              <div class="tab-pane fade" id="updateForm">
                <form action="/product/update" method="POST">
                  <div class="row">
                    <div class="form-floating col-6">
                      <input
                        type="text"
                        class="form-control"
                        id="p_name"
                        placeholder="SKU:"
                        name="sku"
                        required
                      />
                      <label for="p_name" class="ps-4">SKU:</label>
                    </div>
                    <div class="col-6">
                      <div class="input-group">
                        <span class="input-group-text">#</span>
                        <input
                          type="number"
                          class="form-control py-3"
                          id="p_name"
                          name="total_quantity"
                          placeholder="Quantity"
                          min="0"
                          required
                        />
                      </div>
                    </div>
                    <div class="d-grid col-6 mt-4 m-auto">
                      <button type="submit" class="btn btn-outline-dark">
                        Update Product
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End of update product form for employee. -->
              <!-- Remove product form for employee. -->
              <div class="tab-pane fade" id="removeForm">
                <form action="/product/delete" method="POST">
                  <div class="row">
                    <div class="form-floating col-6">
                      <input
                        type="text"
                        class="form-control"
                        id="sku"
                        name="sku"
                        placeholder="SKU:"
                        required
                      />
                      <label for="sku" class="ps-4">SKU:</label>
                    </div>
                    <div class="form-floating col-6">
                      <input
                        type="text"
                        class="form-control"
                        id="p_name"
                        name="name"
                        placeholder="Product Name:"
                        required
                      />
                      <label for="p_name" class="ps-4">Product Name:</label>
                    </div>
                    <div class="d-grid col-6 mt-4 m-auto">
                      <button type="submit" class="btn btn-outline-warning">
                        Remove Product
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- End of remove product form for employee.-->
            </div>
          </div>
        </div>
      </div>
      <!-- End of Add, Update, and Delete forms. -->
      <!-- Log out button -->
      <div class="row">
        <div class="col mb-3 text-center">
          
          <a type="button" class="btn btn-danger" href="/logout">Logout</a>
        </div>
      </div>
      <!-- End of logout button-->
    </div>


<?php require 'components/flash.php' ?>
<script src="public/js/flash.js"></script>
<?php require 'partials/closing.php' ?>