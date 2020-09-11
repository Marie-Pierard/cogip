<h1 class="text-center">COGIT: Companies Directory</h1>
<table class="table mt-3">
  <p>Clients</p>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Tva</th>
      <th scope="col">Country</th>

    </tr>
  </thead>
  <tbody>
    <?php foreach($clients as $line) : ?>
        <tr>
            <td><?= $line->Name ?></td>
            <td><?= $line->Tva ?></td>
            <td><?= $line->idCountry ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<br>
<table class="table mt-3">
  <p>Suppliers</p>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Tva</th>
      <th scope="col">Country</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($suppliers as $line) : ?>
        <tr>  
            <td><?= $line->Name ?></td>
            <td><?= $line->Tva ?></td>
            <td><?= $line->idCountry ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>