<h1 class="text-center pt-3">COGIT: Invoice Details</h1></br>

<h2 class="text-center">Invoice: <?= $company->getNumberInvoice()?></h2></br>

<table class="table mt-3">
  <h3>Company linked to the invoice</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Tva</th>
      <th scope="col">Company Type</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
          <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
        <tr>
            <td><a href="/companies/details/<?= $company->getCompany()->getId() ?>"><?= $company->getCompany()->getName() ?></a></td>
            <td><?= $company->getCompany()->getTva() ?></td>
            <td><?= $company->getCompany()->getType()->getType() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/contacts/delete/<?= $line->id ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a></td>
            <?php endif;?>
        </tr>

  </tbody>
</table>

<table class="table mt-3">
  <h3>Contact</h3>
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email </th>
      <th scope="col">Phone</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
          <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($contacts as $line) : ?>
        <tr>
            <td><a href="/contacts/details/<?= $line->id ?>"><?= $line->LastName . ' ' . $line->FirstName?></a></td>
            <td><?= $line->Email ?></td>
            <td><?= $line->Phone ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/contacts/delete/<?= $line->id ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a></td>
            <?php endif;?>
        </tr>

    <?php endforeach; ?>

  </tbody>
</table>