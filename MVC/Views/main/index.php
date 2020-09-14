<h1 class="text-primary">Welcome to COGIP</h1>

<h3>Bonjour <?= isset($_SESSION['user']['login']) ? $_SESSION['user']['login'] : '' ?>!</h3>

<h5 class="text-success mt-5">5 Last Invoice</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice number</th>
      <th scope="col">Dates</th>
      <th scope="col">Company</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($invoice as $line) : ?>
        <tr>
            <td class="font-weight-bold"><a href="/invoices/details/<?= $line->getId() ?>"><?= $line->getNumberInvoice() ?></a></td>
            <td><?= $line->getDate() ?></td>
            <td class="font-weight-bold"><a href="/companies/details/<?= $line->getCompany()->getId() ?>"><?= $line->getCompany()->getName() ?></a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h5 class="text-success mt-5">5 Last Contact</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone</th>
      <th scope="col">Company</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($contact as $line) : ?>
        <tr>
            <td class="font-weight-bold"><a href="/contacts/details/<?= $line->getId() ?>"><?= $line->getFirstName() . ' ' . $line->getLastName() ?></a></td>
            <td><?= $line->getEmail() ?></td>
            <td><?= $line->getPhone() ?></td>
            <td class="font-weight-bold"><a href="/companies/details/<?= $line->getCompany()->getId() ?>"><?= $line->getCompany()->getName() ?></a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h5 class="text-success mt-5">5 Last Company</h5>
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">N° TVA</th>
      <th scope="col">Country</th>
      <th scope="col">Type</th>
    </tr>
  </thead>
  <tbody>
      <?php foreach ($company as $line) : ?>
        <tr>
            <td class="font-weight-bold"><a href="/companies/details/<?= $line->getId() ?>"><?= $line->getName() ?></a></td>
            <td><?= $line->getTva() ?></td>
            <td><?= $line->getCountry()->getCountry() ?></td>
            <td><?= $line->getType()->getType() ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>