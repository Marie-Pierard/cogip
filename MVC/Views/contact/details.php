<h1>Contact : <?= $contact->getFirstName() . ' ' . $contact->getLastName() ?></h1>

<table>
    <tr>
        <td>Contact</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $contact->getFirstName() . ' ' . $contact->getLastName() ?></td>
    </tr>
    <tr>
        <td>Company</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $contact->getCompany()->getName() ?></td>
    </tr>
    <tr>
        <td>Email</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $contact->getEmail() ?></td>
    </tr>
    <tr>
        <td>Phone</td>
        <td class="pl-2 pr-2">:</td>
        <td><?= $contact->getPhone() ?></td>
    </tr>
</table>

<h5 class="mt-3">Contact person for these invoices :</h5>

<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Invoice Number</th>
      <th scope="col">Date</th>
      <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
        <th scope="col"></th>
      <?php endif;?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($invoices as $line) : ?>
        <tr>
            <td><a href="/invoices/details/<?= $line->getId() ?>"><?= $line->getNumberInvoice() ?></a></td>
            <td><?= $line->getDate() ?></td>
            <?php if(isset($_SESSION['user']['role']) && $_SESSION['user']['role'] === 'admin'): ?>
                <td><a href="/invoices/delete/<?= $line->getId() ?>"><img src="/assets/images/delete.png" alt="Delete invoice" class="icone"></a>
              </td>
            <?php endif;?>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>