/*jslint browser: true, es5: true, indent: 2, nomen: true, todo: true */

/**
 * Sapful - Client JavaScript
 * @author David Christ <dch_dev@genitopia.org>
 * @version 1.1
 */

(function () {
	'use strict';

	var cancel, infoElements, progress, showInfo, upload, xhr;

	// The span elements in the HTML snippet containing the status messages.
	infoElements = [
		'sapfulInfoPHPStatus',
		'sapfulInfoCancled',
		'sapfulInfoError',
		'sapfulInfoFinished',
		'sapfulInfoUploading',
		'sapfulInfoReady'
	];

	// The dynamic progress bar.
	progress = document.getElementById('sapfulProgress');

	// If JavaScript is executed, show the dynamic progress bar.
	progress.style.display = '';
	progress.style.visibility = '';

	// Function associated to the cancel button in the HTML snippet.
	cancel = function () {
		if (xhr instanceof XMLHttpRequest) {
			xhr.abort();
			// Reset XHR, so abort does nothing anymore.
			xhr = null;
		}
		progress.value = 0;
		showInfo('sapfulInfoCancled');
	};

	// This function makes one of the status messages in the HTML snippet visible.
	showInfo = function(elementName) {
		var element;

		element = document.getElementById(elementName);

		for (e in infoElements) {
			if infoElements.hasOwnProperty(e) {
				if (elementName === infoElements[e]) {
					element.style.display = '';
					element.style.visibility = '';
				}
				else {
					element.style.display = 'none';
					element.style.visibility = 'hidden';
				}
			}
		}
	};

	// The function assiciated with the submit button.
	upload = function () {
		var file, form;

		file = document.getElementById('sapfulUploadFiles').files[0];
		if (!file) {
			showInfo('sapfulInfoError');
			return false;
		}

		showInfo('sapfulInfoUploading');

		form = new FormData();
		form.append('sapfulUploadFiles', file);

		xhr = new XMLHttpRequest();

		xhr.onabort = function (e) {
			cancel();
			showInfo('sapfulInfoCancled');
		}

		xhr.onerror = function (e) {
			cancel();
			showInfo('sapfulInfoError');
		}

		xhr.onload = function (e) {
			showInfo('sapfulInfoFinished');
			progress.value = 0;
			// Reset XHR, so the cancel function does nothing anymore.
			xhr = null;
		}

		xhr.upload.onprogress = function (e) {
			// someTextStatus.innerHTML = Math.round(100 * e.loaded / e.total) + ' %';
			progress.value = e.loaded / e.total;
		}

		xhr.open('POST', document.getElementById('sapful').action);
		xhr.send(form);

		// Prevent the form from being submited.
		// If JavaScript is enabled, the upload is done via XMLHttpRequest.
		// If it is disabled, the original form gets submitted.
		return false;
	};

	// Register event handlers.
	document.getElementById('sapfulAbortButton').onclick = cancel;
	document.getElementById('sapfulUploadButton').onclick = upload;
}());

