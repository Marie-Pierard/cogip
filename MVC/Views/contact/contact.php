
<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Phone</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $line) : ?>
        <tr>
            <td><?= $line->FirstName ?></td>
            <td><?= $line->LastName ?></td>
            <td><?= $line->Phone ?></td>
            <td><?= $line->Email ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>