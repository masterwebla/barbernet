<!DOCTYPE html>
<html>
<head>
	<title>Vuejs</title>
</head>
<body>
	<div id="appvue">
	    <input type="text" name="mensaje" v-model="mensajevue">
	</div>	
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script> 
	new Vue ({
	    el: '#appvue',
	    data: {
	     mensajevue: 'hellow world' 
	    }
	});
</script>
</body>
</html>