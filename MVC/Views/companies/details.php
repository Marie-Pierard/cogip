<h1>Company : <?= $company->getName() ?></h1>

<table>
    <tr>
        <td>VAT</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $company->getTva() ?></td>
    </tr>
    <tr>
        <td>Type</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $company->getType()->getType() ?></td>
    </tr>
</table>

<h5 class="mt-3">Contact persons</h5>

<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
  <?php foreach($contacts as $line) : ?>
        <tr>
            <td><a href="/contacts/details/<?= $line->id ?>"><?= $line->LastName . ' ' . $line->FirstName?></a></td>
            <td><?= $line->Phone ?></td>
            <td><?= $line->Email ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td>
                  <a href="/contacts/update/<?= $line->id ?>"><img src="/assets/images/update.png" alt="update contact" class="icone"></a>
                  <a href="/contacts/delete/<?= $line->id ?>"><img src="/assets/images/delete.png" alt="Delete contact" class="icone"></a>
                </td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<h5 class="mt-3">Invoices</h5>

<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice Number</th>
      <th scope="col">Date</th>
      <th scope="col">Contact person</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
  <?php foreach($invoice as $line) : ?>
        <tr>
            <td><a href="/invoices/details/<?= $line->getId() ?>"><?= $line->getNumberInvoice()?></a></td>
            <td><?= $line->getDate() ?></td>
            <td><a href="/contacts/details/<?= $line->getContact()->getId()?>"><?= $line->getContact()->getLastName() . ' ' . $line->getContact()->getFirstName() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td>
                  <a href="/invoices/update/<?= $line->getId() ?>"><img src="/assets/images/update.png" alt="update invoice" class="icone"></a>
                  <a href="/invoices/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a>
                </td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>
