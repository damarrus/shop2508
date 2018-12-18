<?php require_once '../templates/admin_header.php'; ?>

<h1 class="text-center">Список товаров</h1>
<button type="button" class="btn btn-dark" id="btn-product-create">Создать товар</button>
<div class="col-6" id="div-product-create">
  <form method="POST" id="product-create">
    <div class="form-group">
      <label for="exampleFormControlInput1">Название</label>
      <input class="form-control" type="text" id="title" placeholder="Введите название товара">
      <label for="exampleFormControlTextarea1">Описание</label>
      <textarea class="form-control" id="description" placeholder="Введите описание товара" rows="3"></textarea>
      <label for="exampleFormControlInput1">Цена</label>
      <input class="form-control" type="number" id="price" placeholder="Введите цену товара">
      <label for="exampleFormControlSelect1">Коллекция</label>
      <select class="form-control" name="collection" id="collection">
        <?php 
          foreach ($collections as $collection) {
            echo '<option value="'.$collection->id.'">'.$collection->title.'</option>';
          };
        ?>
      </select>
      <label for="exampleFormControlSelect1">Категория</label>
      <select class="form-control" name="category" id="category">
        <?php 
        foreach ($categories as $category) {
          echo '<option value="'.$category->id.'">'.$category->title.'</option>';
        };
        ?>
      </select>
    </div>
  </form>
</div>
<table class="table table-hover products-table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Наименование</th>
      <th scope="col">Описание</th>
      <th scope="col">Цена</th>
      <th scope="col">Категория</th>
      <th scope="col">Коллекция</th>
    </tr>
  </thead>
  <tbody>
  <?php 
    foreach($products as $product) {
      foreach ($categories as $category) {
        if ($product->category_id == $category->id) {
          $category_title = $category->title;
        };
      };
      foreach ($collections as $collection) {
        if ($product->collection == $collection->id) {
          $collection_title = $collection->title;
        };
      };
        echo '<tr>
            <th scope="row">'.$product->id.'</th>
            <td><a href="../controllers/admin_product.php?product_id='.$product->id.'">'.$product->title.'</a></td>
            <td>'.$product->description.'</td>
            <td>'.$product->price.'</td>
            <td>'.$category_title.'</td>
            <td>'.$collection_title.'</td>
        </tr>';
    };
  ?>
  </tbody>
</table>

<?php require_once '../templates/admin_footer.php'; ?>
