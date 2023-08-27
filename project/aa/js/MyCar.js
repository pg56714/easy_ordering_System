
function del(id) {
	this.id = id;
	new Ajax.Request('DelItem.php?sn=' + id, {
		method : 'GET',
		onCreate : function() {

		},
		onFailure : function() {

		},
		onSuccess : function(t) {
			if (t.responseText.blank()) {
				$("item_" + id).remove();

			} else {
				alert(t.responseText);
			}
		}.bind(this),
		onComplete : function() {

			amount();
		}
	});

	return false;
}
function amount() {

	var sum = 0;
	try {
		var first = $("mytable").down("tr", 2);
		if ($("mytable").down("tr", 2).down("select")) {
			
			do {
				sum += first.down("select").getValue()
						* parseInt(first.down("td", 1).innerHTML);

			} while ((first = first.next()))
		}
	} catch (e) {
	}
	$("amount").update(sum);
}
function checkForm() {

	return true;
}