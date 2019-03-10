<?php 
use MicroForce\Model\Student;

/**
 * @var Symfony\Component\Templating\PhpEngine $view
 */
$view;
?>
<!DOCTYPE>
<html>
	<head>
		<title>Hello world</title>
	</head>
	<body>
		<h1>Hello everybody</h1>
		
		<p>
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ante turpis, tempor quis pulvinar nec, varius sed dolor. Vestibulum venenatis tempus ultrices. Praesent ac fermentum lectus. Integer vitae velit ut diam sagittis scelerisque vel sed ipsum. Aliquam convallis ultrices feugiat. Cras in volutpat felis. Vivamus tincidunt tellus aliquet lacinia pharetra. Fusce in diam ac leo porta rhoncus. Maecenas velit quam, sagittis non maximus hendrerit, maximus et lacus.
			<br/>
            Praesent pretium vel turpis ut aliquet. Mauris non tristique dolor, eu vehicula libero. Aliquam ante sapien, varius sed lorem vel, fringilla congue leo. Vivamus pretium dolor non dui faucibus pharetra. Nam turpis enim, laoreet quis cursus ut, interdum ac neque. Duis non posuere arcu. Nulla velit felis, hendrerit pulvinar tortor a, faucibus egestas dui. Quisque nibh augue, rutrum ac blandit ut, congue sagittis nunc. Etiam eu orci velit. Integer quis mauris consequat, euismod elit non, convallis elit. Proin consequat, lacus ac pretium tempor, leo libero lobortis sapien, vitae commodo mauris lacus non ipsum. Sed quis imperdiet lectus. Nullam varius, orci non semper vulputate, lectus leo laoreet tortor, at consectetur odio enim eu urna.
            <br/>
            Curabitur lacinia, arcu elementum porta euismod, nisi nibh aliquam nulla, at luctus libero sapien eget metus. Vivamus efficitur ante vitae libero pellentesque vehicula. Ut velit sapien, fringilla quis commodo sit amet, ullamcorper nec lacus. Vivamus interdum non ante sed iaculis. Vivamus et venenatis augue. Vivamus scelerisque ultrices nisi quis vulputate. Fusce ullamcorper justo in dapibus finibus. Nullam vulputate turpis et quam aliquet, in dictum diam convallis.
            <br/>
            Aenean ac nulla porta, imperdiet ligula sed, imperdiet massa. Nam vehicula sapien ut orci lacinia, elementum iaculis leo eleifend. Suspendisse condimentum nibh sit amet lorem malesuada scelerisque. Proin ut massa commodo, fermentum orci ac, dapibus nisl. Aliquam vulputate sollicitudin enim vitae volutpat. Nullam in erat quis diam ultricies fringilla ut in eros. Praesent dapibus, arcu at condimentum hendrerit, dolor elit consectetur nibh, eget pulvinar enim risus nec dui. Nullam id faucibus ligula. Aliquam rhoncus libero quis massa finibus faucibus facilisis eu ipsum. In at semper risus, in sodales ligula. Proin eget odio eget risus fringilla sagittis. Curabitur sollicitudin cursus dictum. Quisque tempor vel mauris vel tincidunt. Sed blandit tempor sapien in faucibus.
            <br/>
            Curabitur tincidunt erat sit amet tellus elementum, pulvinar interdum odio commodo. Phasellus feugiat sed elit et tempor. Maecenas vulputate blandit dolor eu condimentum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec molestie sem tortor, vitae imperdiet est fringilla sed. Nulla nec tortor nec dui dapibus commodo. Curabitur id sapien libero.
		</p>
		<?php
		  var_dump($students);
		?>
		
		<table>
			<thead>
				<tr>
					<th>Firstname :</th>
					<th>Lastname :</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($students as $student){?>
					<tr>
						<td><?= $view->escape($student->getFirstname());?></td>
						<td><?= $view->escape($student->getLastname());?></td>
						<!--<td> <?= $student->getLastname(); ?></td>  -->
					</tr>
					<?php }?>
			</tbody>
		</table>
		
	</body>
</html>