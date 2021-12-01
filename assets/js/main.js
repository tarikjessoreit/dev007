
// for disable go btn
var count = 0;
function is_disable(btn){
	count++;
	if (count>=3) {
		btn.disabled = true;
	}
	console.log(count);

}