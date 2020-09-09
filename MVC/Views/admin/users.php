<table class="table mt-3">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Email</th>
      <th scope="col">Rôle</th>
      <th scope="col">Gestion</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $line) : ?>
        <tr>
            <td><?= $line->email ?></td>
            <td><?= $line->role ?></td>
            <td><a href="/admin/edit/<?= $line->id ?>">Modifier rôle</a></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>