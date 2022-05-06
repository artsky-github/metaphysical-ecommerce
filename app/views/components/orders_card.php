<div class="row">
<div class="col-lg-6 m-auto p-4">
    <div class="rounded p-4 shadow bg-white" style="overflow-x: auto">
    <table class="table table-hover table-responsive-lg">
        <thead class="table-dark">
        <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Total Price</th>
            <th scope="col">Order Time</th>
        </tr>
        </thead>
        <tbody>
        <tr id="">
            <td><?= $order['id'] ?></td>
            <td><?= $order['total_price'] ?></td>
            <td><?= $order['ordered_at'] ?></td>
        </tr>
        </tbody>
    </table>
    </div>
</div>
</div>