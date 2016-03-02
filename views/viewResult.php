<table class="table">
    <thead>
    <tr>
        <th>Name</th>
        <th>Price</th>
        <th>In stock</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($res as $value){ ?>
    <tr>
        <td><?=$value['name'] ?></td>
        <td><?=$value['price'] ?></td>
        <td><?=$value['in_stock'] ?></td>
    </tr>
    <?php } ?>
    </tbody>
    </table>