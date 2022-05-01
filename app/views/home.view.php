<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required Meta Tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <!-- Custom CSS -->
    <link href="global.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="public/images/favicon.ico" />
    <title>Krizia's Krystals - Home Page</title>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col text-center">
          <nav
            class="navbar navbar-light navbar-expand-lg rounded bg-white shadow p-4 justify-content-center"
          >
            <a class="navbar-brand mx-4" href="#!">
              <img
                src="public/images/crystal-logo.png"
                alt="crystal-logo"
                width="100"
              />
              <span class="store-font align-middle">Krizia's Krystals</span>
            </a>
            <div
              class="navbar-nav navbar-collapse justify-content-end gap-3 mx-4"
            >
              <a class="nav-link active" aria-current="page" href="#!">
                <img src="public/images/home-icon.png" alt="home-icon" width="30" />
                <span>Home</span>
              </a>
              <a class="nav-link" href="#!">
                <img
                  src="public/images/account-icon.png"
                  alt="account-icon"
                  width="30"
                />
                <span>Account</span>
              </a>
              <a class="nav-link" href="#!">
                <img src="public/images/cart-icon.png" alt="cart-icon" width="30" />
                <span>Cart</span>
              </a>
              <form class="gap-3 navbar-nav">
                  <input class="form-control" type="search"/>
                  <select class="form-select" style = "max-width: 130px">
                    <option selected></option>
                    <option value="crystal">Crystals</option>
                    <option value="book">Books</option>
                    <option value="tarot">Tarot Cards</option>
                    <option value="incense">Incense</option>
                    <option value="jewerly">Jewerly</option>
                  </select>
                  <button type="submit" class="btn btn-outline-success btn">
                    Search
                  </button>
                </div>
              </form>
            </div>
          </nav>
        </div>
      </div>
    </div>
  </body>
</html>
