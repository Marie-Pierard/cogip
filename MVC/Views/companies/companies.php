<h1 class="text-center pt-3">COGIT: Companies Directory</h1>

<table class="table mt-3">
  <h3>Clients</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Tva</th>
      <th scope="col">Country</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allclients as $line) : ?>
        <tr>
            <td><a href="/companies/details/<?= $line->getId() ?>"><?= $line->getName() ?></a></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table class="table mt-3">
  <h3>Suppliers</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Tva</th>
      <th scope="col">Country</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allsuppliers as $line) : ?>
        <tr>
            <td><a href="/companies/details/<?= $line->getId() ?>"><?= $line->getName() ?></a></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>