function openAppleForm($id, $status, $reminder) {
	let $appRem = document.getElementById("appRemind");
	let $appStat = document.getElementById("appStat");

	$appRem.value = 0;
	// document.getElementById("appleForm").style.display = "block";
	if ($reminder == 0) {
		alert('Яблоко ' + $id + ' съедено полностью!');
		return;
	}
	if ($status == 2) {
		alert('Яблоко ' + $id + ' испорчено!');
		return;
	}

	document.getElementById("appleID").innerHTML = $id;
	document.getElementById("appID").value = $id;
	document.getElementById("appID").innerHTML = $id;
	$appRem.setAttribute('max', $reminder);
	if ($status == 0) {
		$appRem.setAttribute('readonly','readonly');
	} else {
		$appRem.removeAttribute('readonly');
	}

	// отображаем форму
	document.getElementById("appleForm").style.display = "block";
}

function closeAppleForm() {
	// скрываем форму
	document.getElementById("appleForm").style.display = "none";
}
