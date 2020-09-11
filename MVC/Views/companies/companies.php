<h1 class="text-center">COGIT: Companies Directory</h1>

<h3>Bonjour <?= isset($_SESSION['user']['login']) ? $_SESSION['user']['login'] : '' ?>!</h3>

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
            <td><?= $line->getName() ?></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>