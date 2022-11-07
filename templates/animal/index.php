<br>
  <h1 class="text-center">Animal </h1>
  <table class="table table-striped table-hover">
    <thead><br>
      <tr>
        <th>Surnom </th>
        <th>Espece</th>
        <th>Race</th>
        <th>Age</th>
        <th>Couleur </th>
        <th>Description </th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($animals as $animal) : ?>
        <tr>
          <td><?= $animal->getSurnomAnimal() ?></td>
          <td><?= $animal->getEspeceAnimal() ?></td>
          <td><?= $animal->getRaceAnimal() ?></td>
          <td><?= $animal->getAgeAnimal() ?></td>
          <td><?= $animal->getCouleurAnimal() ?></td>
          <td><?= $animal->getDescriptionAnimal() ?></td>
          <td><a href="?page=infoanimal&id=<?= $animal->getId() ?>"><button class="btn btn-info">Voir plus</button></a></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</section>
<br><br> <br><br> <br><br>



