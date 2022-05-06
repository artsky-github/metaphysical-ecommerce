<?php require 'partials/session.php' ?>
<?php require 'partials/head.php' ?>
<div class="container-fluid">
      <!-- This content contains the title and logo of the website. -->
      <div class="row mt-4">
        <div class="col text-center">
          <a href="home" class="text-decoration-none text-dark">
          <img
            src="public/images/crystal-logo.png"
            alt="crystal-logo"
            width="100"
          />
          <span class="store-font align-middle">Krizia's Krystals</span>
          </a>
        
        </div>
      </div>
      <!-- End of title and logo for customer. -->
      <!-- Cart Table for the customer. -->
      <form action="" method="POST" id="form">
        <div class="row">
          <div class="col-lg-6 m-auto p-4">
            <div class="rounded p-4 shadow bg-white" style="overflow-x: auto">

              <table class="table table-hover table-responsive-lg" >
                
                <thead class="table-dark">
                  <tr>
                    <th scope="col">SKU</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                  </tr>
                </thead>
                <tbody id="items">
                
                </tbody>
              </table>
              <table
                class="table table-responsive-lg mb-0 ms-auto table-borderless"
                style="width: 34%;"
              >
                <thead class="table-dark">
                  <tr>
                    <th scope="col">Total Cost</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td id="total"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <!-- End of Cart table for customer.  -->
        <!-- Order form for the customer.  -->
        <div class="row">
          <div class="col-lg-6 m-auto p-4">
            <div class="rounded p-4 shadow bg-white">
                <div class="row">
                  <div class="form-floating col-6">
                    <input
                      type="text"
                      class="form-control"
                      id="city"
                      placeholder="City"
                      name="city"
                      required
                    />
                    <label for="city" class="ps-4">City:</label>
                  </div>
                  <div class="col-6">
                    <select class="form-select py-3" id="category" name="city">
                      <option selected disabled>State:</option>
                      <option value="AL">Alabama</option>
                      <option value="AK">Alaska</option>
                      <option value="AZ">Arizona</option>
                      <option value="AR">Arkansas</option>
                      <option value="CA">California</option>
                      <option value="CO">Colorado</option>
                      <option value="CT">Connecticut</option>
                      <option value="DE">Delaware</option>
                      <option value="DC">District Of Columbia</option>
                      <option value="FL">Florida</option>
                      <option value="GA">Georgia</option>
                      <option value="HI">Hawaii</option>
                      <option value="ID">Idaho</option>
                      <option value="IL">Illinois</option>
                      <option value="IN">Indiana</option>
                      <option value="IA">Iowa</option>
                      <option value="KS">Kansas</option>
                      <option value="KY">Kentucky</option>
                      <option value="LA">Louisiana</option>
                      <option value="ME">Maine</option>
                      <option value="MD">Maryland</option>
                      <option value="MA">Massachusetts</option>
                      <option value="MI">Michigan</option>
                      <option value="MN">Minnesota</option>
                      <option value="MS">Mississippi</option>
                      <option value="MO">Missouri</option>
                      <option value="MT">Montana</option>
                      <option value="NE">Nebraska</option>
                      <option value="NV">Nevada</option>
                      <option value="NH">New Hampshire</option>
                      <option value="NJ">New Jersey</option>
                      <option value="NM">New Mexico</option>
                      <option value="NY">New York</option>
                      <option value="NC">North Carolina</option>
                      <option value="ND">North Dakota</option>
                      <option value="OH">Ohio</option>
                      <option value="OK">Oklahoma</option>
                      <option value="OR">Oregon</option>
                      <option value="PA">Pennsylvania</option>
                      <option value="RI">Rhode Island</option>
                      <option value="SC">South Carolina</option>
                      <option value="SD">South Dakota</option>
                      <option value="TN">Tennessee</option>
                      <option value="TX">Texas</option>
                      <option value="UT">Utah</option>
                      <option value="VT">Vermont</option>
                      <option value="VA">Virginia</option>
                      <option value="WA">Washington</option>
                      <option value="WV">West Virginia</option>
                      <option value="WI">Wisconsin</option>
                      <option value="WY">Wyoming</option>
                    </select>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="form-floating col-6">
                    <input
                      type="text"
                      class="form-control"
                      id="zip"
                      placeholder="ZIP:"
                      name="zip"
                      required
                    />
                    <label for="zip" class="ps-4">ZIP:</label>
                  </div>
                  <div class="form-floating col-6">
                    <input
                      type="number"
                      class="form-control"
                      id="house_numb"
                      placeholder="House #:"
                      min="0"
                      name="house_num"
                      required
                    />
                    <label for="house_numb" class="ps-4">House #:</label>
                  </div>
                </div>
                <div class="form-floating mt-4">
                  <input
                    type="text"
                    class="form-control"
                    id="street"
                    placeholder="Street Name:"
                    min="0"
                    name="street_name"
                    required
                  />
                  <label for="street">Street Name:</label>
                </div>
                <div class="d-grid col-6 mt-4 m-auto">
                  <button type="submit" class="btn btn-outline-dark">
                    Submit Order
                  </button>
                </div>
            </div>

          </div>
        </div>
      </form>
      <?php require 'components/flash.php' ?>
      <!-- End of order form for employee. -->
      <script src="public/js/load.js"></script>
    </div>
    <?php require 'partials/closing.php' ?>