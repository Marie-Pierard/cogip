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
  <p>Suppliers</p>
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
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/companies/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete country" class="icone"></a>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>