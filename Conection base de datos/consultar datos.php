<?php
include 'funciones.php';
// Connect to MySQL database
$pdo = panne_e_cafe();
// Get the page via GET request (URL param: page), if non exists default the page to 1
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// Number of records to show on each page
$records_per_page = 15;
// Prepare the SQL statement and get records from our contacts table, LIMIT will determine the page
$stmt = $pdo->prepare('SELECT * FROM contacto ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the records so we can display them in our template.
$contactos = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of contacts, this is so we can determine whether there should be a next and previous button
$num_contactos = $pdo->query('SELECT COUNT(*) FROM contacto')->fetchColumn();
?>

<?=template_header('Read')?>

<div class="content read">
	<h2>CONTACTOS</h2>
	<a href="adicionar.php" class="create-contact">Crear Contactos</a>
	<table>
        <thead>
            <tr>
                <td>#</td>
                <td>Nombres</td>
                <td>Email</td>
                <td>Celular</td>
                <td>Profesión</td>
                <td>Creado</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contact): ?>
            <tr>
                <td><?=$contact['id']?></td>
                <td><?=$contact['nombre']?></td>
                <td><?=$contact['email']?></td>
                <td><?=$contact['celular']?></td>
                <td><?=$contact['profesion']?></td>
                <td><?=$contact['creado']?></td>
                <td class="actions">
                    <a href="modificar.php?id=<?=$contact['id']?>" class="edit"><i class="fas fa-pen fa-xs"></i></a>
                    <a href="eliminar.php?id=<?=$contact['id']?>" class="trash"><i class="fas fa-trash fa-xs"></i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm"></i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_contactos): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm"></i></a>
		<?php endif; ?>
	</div>
</div>

<?=template_footer()?>