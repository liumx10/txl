<style>.tr{
	padding: 20px;
}
</style>
<table width="100%" style="margin:20px;">
	<?php foreach ($Person as $info ): ?>
	<tr>
		<td style="font-size: 1.1em; font-style:bold; color:gray; font-family: Georgia" >name:</td>   
		<td style="font-size: 1.1em; font-style:bold; color:black; font-family: Georgia"><?php echo $info['Person']['name']; ?></td>
	</tr>
	<tr>
		<td style="font-size: 1.1em; font-style:bold; color:gray; font-family: Georgia">age:</td>
		<td><?php echo $info['Person']['age']; ?></td>
	</tr>
	<tr>
		<td style="font-size: 1.1em; font-style:bold; color:gray; font-family: Georgia">id:</td>
		<td><?php echo $info['Person']['id']; ?></td>
	</tr>
	<tr>
		<td style="font-size: 1.1em; font-style:bold; color:gray; font-family: Georgia">position:</td>
		<td><?php echo $info['Person']['position']; ?></td>
	</tr>
	<tr>	
		<td style="font-size: 1.1em; font-style:bold; color:gray; font-family: Georgia">tel:</td>
		<td><?php echo $info['Person']['tel']; ?></td>
	</tr>
	<tr>	
		<td style="font-size: 1.1em; font-style:bold; color:gray; font-family: Georgia">email:</td>
		<td><?php echo $info['Person']['email']; ?></td>
	</tr>
<?php endforeach; ?>
</table>