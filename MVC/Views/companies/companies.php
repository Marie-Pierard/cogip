<h1 class="text-center pt-3">COGIP: Companies Directory</h1>

<table class="table mt-3">
  <h3>Clients</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">VAT</th>
      <th scope="col">Country</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allclients as $line) : ?>
        <tr>
            <td><a href="/companies/details/<?= $line->getId() ?>"><?= $line->getName() ?></a></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td>
                  <a href="/companies/update/<?= $line->getId() ?>"><img src="/assets/images/update.png" alt="Update country" class="icone"></a>
                  <a href="/companies/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete country" class="icone"></a>
                </td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<table class="table mt-3">
  <h3>Suppliers</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">VAT</th>
      <th scope="col">Country</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($allsuppliers as $line) : ?>
        <tr>
            <td><a href="/companies/details/<?= $line->getId() ?>"><?= $line->getName() ?></a></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td>
                <a href="/companies/update/<?= $line->getId() ?>"><img src="/assets/images/update.png" alt="update country" class="icone"></a>
                  <a href="/companies/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete country" class="icone"></a>
                  </td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>