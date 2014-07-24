<?php
echo $this->Html->script("jquery-2.1.1.min.js");
echo $this->Html->script("sprintf.js");
?>
<button onclick="test()">haha</button>
<script type="text/javascript">
function test() {
	d = 10;
	s = sprintf('haha%d',d);
	console.log(s);
}
</script>
<?php
echo $data['c'];
?>
