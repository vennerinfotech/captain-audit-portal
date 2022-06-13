<script type="text/javascript">
var id = btoa( Math.random() + navigator.userAgent + Date() );
function id() {
document.getElementById('code').insertAdjacentHTML('beforeend',( btoa( Math.random() + navigator.userAgent + Date() ) ) + '<br>' );
}
document.getElementById('click').addEventListener('click',id,false);	
</script>
<input id='click' type='button' value='click'><br>
<div id='code'></div>