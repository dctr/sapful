/*jslint browser: true, es5: true, indent: 2, node: true, nomen: true, todo: true */
/*global define, console */

/**
 * @author David Christ <dch_dev@genitopia.org>
 * @version 1.0
 */

(function () {
	'use strict';

	var abort, info, progress, upload, xhr;

	info = document.getElementById('sapfulInfo');
	progress = document.getElementById('sapfulProgress');

	// If JavaScript is execudet, show dynamic elements.
	progress.className= '';

	abort = function () {
		if (xhr instanceof XMLHttpRequest) {
			xhr.abort();
			// Reset XHR, so abort does nothing anymore.
			xhr = null;
		}
		progress.value = 0;
		info.innerHTML = 'Ready';
	};

	upload = function () {
		var file, form;

		file = document.getElementById('sapfulUploadFiles').files[0];
		if (!file) {
			info.innerHTML = 'File not found';
			return false;
		}

		info.innerHTML = 'Uploading';

		form = new FormData();
		form.append('sapfulUploadFiles', file);

		xhr = new XMLHttpRequest();

		xhr.onabort = function (e) {
			info.innerHTML = 'Aborted';
			abort();
		}

		xhr.onerror = function (e) {
			info.innerHTML = 'Error';
			abort();
		}

		xhr.onload = function (e) {
			info.innerHTML = 'Done';
			progress.value = 0;
			// Reset XHR, so abort does nothing anymore.
			xhr = null;
		}

		xhr.upload.onprogress = function (e) {
			info.innerHTML = Math.round(100 * e.loaded / e.total) + ' %';
			progress.value = e.loaded / e.total;
		}

		xhr.open('POST', document.getElementById('sapful').action);
		xhr.send(form);

		// Prevent form from being submited.
		// If JavaScript is enabled, the upload is done via XHR, if it is disabled, this never gets executed.
		return false;
	};

	document.getElementById('sapfulAbortButton').onclick = abort;
	document.getElementById('sapfulUploadButton').onclick = upload;
}());

