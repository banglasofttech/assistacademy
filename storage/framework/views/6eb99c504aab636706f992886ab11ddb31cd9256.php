<!DOCTYPE html>
<html>
<head>
  <title>Rating</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="content/style/test.css">
</head>
<body>

<div class="container mt-5">
  <div class="form-group">
    <select id="product-select" class="form-control custom-select">
        <option value="0" disabled selected>Select Product</option>
        <option value="sony">Sony 4K TV</option>
        <option value="samsung">Samsung 4K TV</option>
        <option value="vizio">Vizio 4K TV</option>
        <option value="panasonic">Panasonic 4K TV</option>
        <option value="phillips">Phillips 4K TV</option>
      </select>
  </div>
  <div class="form-group">
    <input type="number" id="rating-control" class="form-control" step="0.1" max="5" placeholder="Rate 1 - 5" disabled>
  </div>

  <table class="table table-striped">
    <thead>
      <tr>
        <th>4K Television</th>
        <th>Rating</th>
      </tr>
    </thead>
    <tbody>
      <tr class="sony">
        <td>Sony 4K TV</td>
        <td>
          <div class="stars-outer">
            <div class="stars-inner"></div>
          </div>
          <span class="number-rating"></span>
        </td>
      </tr>
      <tr class="samsung">
        <td>Samsung 4K TV</td>
        <td>
          <div class="stars-outer">
            <div class="stars-inner"></div>
          </div>
          <span class="number-rating"></span>
        </td>
      </tr>
      <tr class="vizio">
        <td>Vizio 4K TV</td>
        <td>
          <div class="stars-outer">
            <div class="stars-inner"></div>
          </div>
          <span class="number-rating"></span>
        </td>
      </tr>
      <tr class="panasonic">
        <td>Panasonic 4K TV</td>
        <td>
          <div class="stars-outer">
            <div class="stars-inner"></div>
          </div>
          <span class="number-rating"></span>
        </td>
      </tr>
      <tr class="phillips">
        <td>Phillips 4K TV</td>
        <td>
          <div class="stars-outer">
            <div class="stars-inner"></div>
          </div>
          <span class="number-rating"></span>
        </td>
      </tr>
    </tbody>
  </table>
</div>

<script type="text/javascript">
  // Initial Ratings
    const ratings = {
      sony: 4.7,
      samsung: 3.4,
      vizio: 2.3,
      panasonic: 3.6,
      phillips: 4.1
    }

    // Total Stars
    const starsTotal = 5;

    // Run getRatings when DOM loads
    document.addEventListener('DOMContentLoaded', getRatings);

    // Form Elements
    const productSelect = document.getElementById('product-select');
    const ratingControl = document.getElementById('rating-control');

    // Init product
    let product;

    // Product select change
    productSelect.addEventListener('change', (e) => {
      product = e.target.value;
      // Enable rating control
      ratingControl.disabled = false;
      ratingControl.value = ratings[product];
    });

    // Rating control change
    ratingControl.addEventListener('blur', (e) => {
      const rating = e.target.value;

      // Make sure 5 or under
      if (rating > 5) {
        alert('Please rate 1 - 5');
        return;
      }

      // Change rating
      ratings[product] = rating;

      getRatings();
    });

    // Get ratings
    function getRatings() {
      for (let rating in ratings) {
        // Get percentage
        const starPercentage = (ratings[rating] / starsTotal) * 100;

        // Round to nearest 10
        const starPercentageRounded = `${Math.round(starPercentage / 10) * 10}%`;

        // Set width of stars-inner to percentage
        document.querySelector(`.${rating} .stars-inner`).style.width = starPercentageRounded;

        // Add number rating
        document.querySelector(`.${rating} .number-rating`).innerHTML = ratings[rating];
      }
    }
</script>


</body>
</html>